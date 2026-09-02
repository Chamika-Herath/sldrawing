import sys
from grader import process_images
import math

image_path = "../assets/images/tutorial_portrait_1773936991179.png" # Updated to valid image

res = process_images(image_path, image_path)

ref_eyes = res['ref_eyes']
sketch_eyes = res['sketch_eyes']

print(f"Ref Left Eye: {ref_eyes['left']}, Ref Right Eye: {ref_eyes['right']}")
print(f"Sketch Left Eye: {sketch_eyes['left']}, Sketch Right Eye: {sketch_eyes['right']}")

rLx, rLy = ref_eyes['left']
rRx, rRy = ref_eyes['right']
sLx, sLy = sketch_eyes['left']
sRx, sRy = sketch_eyes['right']

ar = math.atan2(rRy - rLy, rRx - rLx)
ast = math.atan2(sRy - sLy, sRx - sLx)

print(f"Ref Angle (rad): {ar}, Sketch Angle (rad): {ast}, Diff: {ast - ar}")
