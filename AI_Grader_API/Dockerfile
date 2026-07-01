FROM python:3.11-slim

# Set the working directory to /code
WORKDIR /code

# Copy the requirements file into the container
COPY ./requirements.txt /code/requirements.txt

# Install system dependencies needed for OpenCV and Mediapipe
RUN apt-get update && apt-get install -y \
    libgl1 \
    libglib2.0-0 \
    libgles2 \
    libegl1 \
    && rm -rf /var/lib/apt/lists/*

# Install the Python dependencies
RUN pip install --no-cache-dir --upgrade -r /code/requirements.txt

# Copy the rest of the application code
COPY . .

# Create the temp directory with open permissions
RUN mkdir -p /code/temp_uploads && chmod 777 /code/temp_uploads

# Hugging Face Spaces exposes port 7860
CMD ["uvicorn", "main:app", "--host", "0.0.0.0", "--port", "7860"]
