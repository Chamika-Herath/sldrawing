import cv2
import numpy as np
import mediapipe as mp
from mediapipe.tasks import python
from mediapipe.tasks.python import vision
import os

print("Initializing MediaPipe Tasks API for Advanced Contours...")
base_options = python.BaseOptions(model_asset_path='face_landmarker.task')
options = vision.FaceLandmarkerOptions(
    base_options=base_options,
    output_face_blendshapes=False,
    output_facial_transformation_matrixes=False,
    num_faces=1)
detector = vision.FaceLandmarker.create_from_options(options)
print("MediaPipe Ready!")

# Standard MediaPipe Face Mesh Contour Connections
CONTOURS = {
    'face_oval': [10, 338, 297, 332, 284, 251, 389, 356, 454, 323, 361, 288, 397, 365, 379, 378, 400, 377, 152, 148, 176, 149, 150, 136, 172, 58, 132, 93, 234, 127, 162, 21, 54, 103, 67, 109],
    'left_eye': [33, 7, 163, 144, 145, 153, 154, 155, 133, 173, 157, 158, 159, 160, 161, 246],
    'right_eye': [362, 382, 381, 380, 374, 373, 390, 249, 263, 466, 388, 387, 386, 385, 384, 398],
    'lips': [61, 146, 91, 181, 84, 17, 314, 405, 321, 375, 291, 409, 270, 269, 267, 0, 37, 39, 40, 185],
    'nose_bridge': [168, 6, 197, 195, 5, 4, 1]
}

def get_landmarks(image):
    rgb_image = cv2.cvtColor(image, cv2.COLOR_BGR2RGB)
    mp_image = mp.Image(image_format=mp.ImageFormat.SRGB, data=rgb_image)
    
    detection_result = detector.detect(mp_image)
    
    if not detection_result.face_landmarks:
        return None
        
    landmarks = detection_result.face_landmarks[0]
    h, w, _ = image.shape
    
    # Extract all 478 points
    points = {}
    for idx, lm in enumerate(landmarks):
        points[idx] = (int(lm.x * w), int(lm.y * h))
        
    return points

def get_contour_dims(points, contour_indices):
    xs = [points[i][0] for i in contour_indices]
    ys = [points[i][1] for i in contour_indices]
    width = max(xs) - min(xs)
    height = max(ys) - min(ys)
    return width, height

def extract_ratios(points):
    oval_w, oval_h = get_contour_dims(points, CONTOURS['face_oval'])
    left_eye_w, left_eye_h = get_contour_dims(points, CONTOURS['left_eye'])
    right_eye_w, right_eye_h = get_contour_dims(points, CONTOURS['right_eye'])
    lips_w, lips_h = get_contour_dims(points, CONTOURS['lips'])
    
    # Avoid division by zero
    if oval_w == 0 or left_eye_h == 0 or right_eye_h == 0 or lips_h == 0:
        return None
        
    # Scale invariant shape ratios
    ratios = {
        'face_shape': oval_h / oval_w,
        'left_eye_shape': left_eye_w / left_eye_h,
        'right_eye_shape': right_eye_w / right_eye_h,
        'lips_shape': lips_w / lips_h,
        'nose_length_ratio': get_contour_dims(points, CONTOURS['nose_bridge'])[1] / oval_h
    }
    return ratios

def draw_colored_contour(image, points, contour_indices, error_percentage, label, is_closed=True):
    # Green if error < 6%, Yellow if < 15%, Red if > 15%
    if error_percentage < 0.06:
        color = (0, 255, 0) # Green
    elif error_percentage < 0.15:
        color = (0, 255, 255) # Yellow
    else:
        color = (0, 0, 255) # Red
        
    contour_pts = np.array([points[i] for i in contour_indices], np.int32)
    contour_pts = contour_pts.reshape((-1, 1, 2))
    
    # Draw polygon
    cv2.polylines(image, [contour_pts], is_closed, color, 2)
    
    # Draw label if there's an error
    if error_percentage >= 0.06:
        # Find top-left most point to place the text
        tx = min([p[0] for p in contour_pts[:,0]])
        ty = min([p[1] for p in contour_pts[:,0]])
        
        error_text = f"err: {int(error_percentage*100)}%"
        cv2.putText(image, error_text, (tx - 10, ty - 10), cv2.FONT_HERSHEY_SIMPLEX, 0.5, color, 2)

def process_images(ref_img_path, sketch_img_path):
    ref_img = cv2.imread(ref_img_path)
    sketch_img = cv2.imread(sketch_img_path)
    
    ref_points = get_landmarks(ref_img)
    sketch_points = get_landmarks(sketch_img)
    
    feedback = []
    
    if not ref_points:
        feedback.append("Error: Could not detect a human face in the Reference Image.")
        return {"score": 0, "feedback": feedback, "heatmap_bytes": b''}
        
    if not sketch_points:
        feedback.append("Error: Could not recognize a facial structure in your sketch.")
        feedback.append("Ensure your proportions loosely resemble a human face so the AI can scan it.")
        _, buffer = cv2.imencode('.png', sketch_img)
        return {"score": 0, "feedback": feedback, "heatmap_bytes": buffer.tobytes()}
        
    # Extract ratios
    ref_ratios = extract_ratios(ref_points)
    sketch_ratios = extract_ratios(sketch_points)
    
    if not ref_ratios or not sketch_ratios:
        feedback.append("Error calculating geometry (division by zero).")
        return {"score": 0, "feedback": feedback, "heatmap_bytes": b''}
    
    # Compare ratios
    total_error = 0
    errors = {}
    
    for key in ref_ratios.keys():
        diff = abs(ref_ratios[key] - sketch_ratios[key])
        perc_error = diff / ref_ratios[key] if ref_ratios[key] != 0 else 1
        errors[key] = perc_error
        total_error += min(perc_error, 1.0)
        
    avg_error = total_error / 5.0
    
    # Score formula
    score = int(max(0, 100 - (avg_error * 300))) 
    
    # --- Advanced Visual Feedback ---
    feedback_img = sketch_img.copy()
    
    # Face Oval
    draw_colored_contour(feedback_img, sketch_points, CONTOURS['face_oval'], errors['face_shape'], "Face Shape", is_closed=True)
    # Left Eye
    draw_colored_contour(feedback_img, sketch_points, CONTOURS['left_eye'], errors['left_eye_shape'], "L-Eye Shape", is_closed=True)
    # Right Eye
    draw_colored_contour(feedback_img, sketch_points, CONTOURS['right_eye'], errors['right_eye_shape'], "R-Eye Shape", is_closed=True)
    # Lips
    draw_colored_contour(feedback_img, sketch_points, CONTOURS['lips'], errors['lips_shape'], "Lip Shape", is_closed=True)
    # Nose Bridge
    draw_colored_contour(feedback_img, sketch_points, CONTOURS['nose_bridge'], errors['nose_length_ratio'], "Nose", is_closed=False)
    
    # Feedback Strings
    if score >= 90:
        feedback.append("Outstanding Advanced Proportions!")
        feedback.append("Your eye shapes and face contours perfectly match.")
    else:
        worst_feature = max(errors, key=errors.get)
        worst_error_perc = int(errors[worst_feature] * 100)
        
        feature_names = {
            'face_shape': "Face Outline (Jawline)",
            'left_eye_shape': "Left Eye Shape",
            'right_eye_shape': "Right Eye Shape",
            'lips_shape': "Lip Thickness/Shape",
            'nose_length_ratio': "Nose Bridge Length"
        }
        
        feedback.append(f"Major deviation in: {feature_names[worst_feature]}.")
        feedback.append(f"It is off by approx {worst_error_perc}%. Check the Red/Yellow contours on your sketch.")
        
    _, buffer = cv2.imencode('.png', feedback_img)
    
    return {
        "score": score,
        "feedback": feedback,
        "heatmap_bytes": buffer.tobytes()
    }
