@echo off
echo Starting AI Grader API...
echo Server will be available at http://localhost:8000
echo Do not close this window while testing.
call .venv312\Scripts\activate.bat
python main.py
pause
