# AI Grader API

This is the Python microservice for evaluating the proportional accuracy of hand-drawn sketches against reference images. It uses OpenCV for image preprocessing, Canny edge detection, and Structural Similarity Index (SSIM) to generate a score and a visual heatmap.

## Requirements
- Python 3.8+

## Setup

1. Open your terminal/command prompt and navigate to this folder:
   ```bash
   cd AI_Grader_API
   ```

2. (Optional but recommended) Create a virtual environment:
   ```bash
   python -m venv venv
   # Windows:
   venv\Scripts\activate
   # Mac/Linux:
   source venv/bin/activate
   ```

3. Install the dependencies:
   ```bash
   pip install -r requirements.txt
   ```

## Running the Server

Start the API by running:
```bash
python main.py
```

The server will start on `http://localhost:8000`.

## API Endpoints

### `POST /grade`
Accepts `multipart/form-data` with two file fields:
- `reference_image`: The original image file
- `sketch_image`: The user's uploaded sketch file

**Returns:**
```json
{
    "status": "success",
    "score": 85,
    "feedback": ["Good proportions...", "Check spatial distance..."],
    "heatmap_url": "data:image/png;base64,iVBORw0K..."
}
```
