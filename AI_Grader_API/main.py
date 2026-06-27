from fastapi import FastAPI, UploadFile, File, HTTPException
from fastapi.middleware.cors import CORSMiddleware
from pydantic import BaseModel
import uvicorn
import shutil
import os
import base64
from grader import process_images

app = FastAPI(title="AI Grader API", description="Scores portrait sketches against reference images using OpenCV edge detection.")

# Enable CORS so the PHP/JS frontend can communicate with this API
app.add_middleware(
    CORSMiddleware,
    allow_origins=["*"],
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)

TEMP_DIR = "temp_uploads"
os.makedirs(TEMP_DIR, exist_ok=True)

@app.get("/")
def read_root():
    return {"status": "AI Grader API is running!"}

@app.post("/grade")
async def grade_sketch(reference_image: UploadFile = File(...), sketch_image: UploadFile = File(...)):
    if not reference_image.filename or not sketch_image.filename:
        raise HTTPException(status_code=400, detail="Both reference and sketch images must be provided.")

    ref_path = os.path.join(TEMP_DIR, f"ref_{reference_image.filename}")
    sketch_path = os.path.join(TEMP_DIR, f"sketch_{sketch_image.filename}")

    try:
        # Save uploaded files temporarily
        with open(ref_path, "wb") as buffer:
            shutil.copyfileobj(reference_image.file, buffer)
        
        with open(sketch_path, "wb") as buffer:
            shutil.copyfileobj(sketch_image.file, buffer)

        # Process the images using OpenCV
        result = process_images(ref_path, sketch_path)

        # Convert the heatmap bytes to a base64 string so it can be sent via JSON
        b64_heatmap = base64.b64encode(result["heatmap_bytes"]).decode('utf-8')
        heatmap_data_url = f"data:image/png;base64,{b64_heatmap}"

        return {
            "status": "success",
            "score": result["score"],
            "feedback": result["feedback"],
            "heatmap_url": heatmap_data_url,
            "ref_eyes": result.get("ref_eyes"),
            "sketch_eyes": result.get("sketch_eyes")
        }

    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))
    finally:
        # Clean up temporary files
        if os.path.exists(ref_path):
            os.remove(ref_path)
        if os.path.exists(sketch_path):
            os.remove(sketch_path)

if __name__ == "__main__":
    # Start the server on port 8000
    uvicorn.run("main:app", host="0.0.0.0", port=8000, reload=True)
