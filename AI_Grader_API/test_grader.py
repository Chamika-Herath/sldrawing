import sys
import os
from grader import process_images
import json
import base64

image_path = "../assets/images/tutorial_portrait_1773936991179.png"

print("--- Testing IDENTICAL image (same file) ---")
res = process_images(image_path, image_path)
print(f"Score: {res['score']}")
print(f"Feedback: {res['feedback']}")
assert res['score'] == 100, f"Expected 100 for identical images, but got {res['score']}"

import cv2
img = cv2.imread(image_path)
cv2.imwrite("temp_simulated.jpg", img, [cv2.IMWRITE_JPEG_QUALITY, 90])
print("--- Testing SLIGHTLY MODIFIED image (JPEG re-encode) ---")
res2 = process_images(image_path, "temp_simulated.jpg")
print(f"Score: {res2['score']}")
print(f"Feedback: {res2['feedback']}")

print("All tests passed.")
