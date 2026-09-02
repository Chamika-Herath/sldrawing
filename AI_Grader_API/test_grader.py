import sys
from grader import process_images

man_path = "../assets/images/test_samples/ref_man.png"
woman_path = "../assets/images/test_samples/ref_woman.png"

print("--- Testing DIFFERENT Faces (Man vs Woman) ---")
res = process_images(woman_path, man_path)
print(f"Score: {res['score']}")
print(f"Feedback: {res['feedback']}")
