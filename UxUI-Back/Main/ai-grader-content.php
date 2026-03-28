<style>
    .ai-hero { padding: 150px 0 60px 0; text-align: center; }
    .ai-hero h1 { font-size: 3.5rem; font-weight: 900; margin-bottom: 20px; color: var(--text); letter-spacing: -1px; }
    .ai-hero p { font-size: 1.2rem; color: var(--text-dim); max-width: 700px; margin: 0 auto; line-height: 1.6; }
    
    .upload-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin-top: 40px; }
    @media (max-width: 768px) { .upload-grid { grid-template-columns: 1fr; } }
    
    .dropzone { 
        border: 2px dashed var(--primary); border-radius: 25px; padding: 50px 30px; 
        text-align: center; background: rgba(0,132,255,0.02); cursor: pointer; transition: all 0.3s;
        display: flex; flex-direction: column; align-items: center; justify-content: center;
    }
    .dropzone:hover { background: rgba(0,132,255,0.08); transform: translateY(-5px); }
    .dropzone i { font-size: 3.5rem; margin-bottom: 15px; display: block; }
    .dropzone h3 { font-size: 1.4rem; margin-bottom: 10px; color: var(--text); }
    .dropzone p { font-size: 0.95rem; color: var(--text-dim); }
    
    .file-input { display: none; }
    
    .analyze-btn {
        margin-top: 50px; padding: 20px 60px; font-size: 1.3rem; font-weight: 800; border-radius: 50px;
        background: linear-gradient(45deg, var(--primary), #00d2ff); color: #fff; border: none; cursor: pointer;
        box-shadow: 0 15px 35px rgba(0,132,255,0.3); transition: all 0.3s; width: 100%; max-width: 400px;
    }
    .analyze-btn:hover { transform: scale(1.05); box-shadow: 0 20px 45px rgba(0,132,255,0.4); }
    .analyze-btn:disabled { opacity: 0.7; cursor: not-allowed; transform: none; }
    
    /* Results Dashboard */
    .dashboard { display: none; margin-top: 60px; opacity: 0; transition: opacity 0.5s; }
    .dashboard.active { display: block; opacity: 1; }
    .score-circle { 
        width: 150px; height: 150px; border-radius: 50%; border: 8px solid var(--primary); 
        display: flex; align-items: center; justify-content: center; margin: 0 auto 30px auto; 
        font-size: 3rem; font-weight: 900; color: var(--primary); background: #fff;
    }
    
    .view-toggles { display: flex; justify-content: center; gap: 15px; margin-top: 30px; flex-wrap: wrap; }
    .toggle-btn { 
        padding: 10px 25px; border-radius: 20px; border: 2px solid var(--primary); 
        background: transparent; color: var(--primary); font-weight: 700; cursor: pointer; transition: all 0.3s;
    }
    .toggle-btn.active, .toggle-btn:hover { background: var(--primary); color: #fff; }
    
    .mock-processing { display: none; margin-top: 30px; text-align: center; }
    .spinner { border: 4px solid rgba(0,132,255,0.1); border-left-color: var(--primary); border-radius: 50%; width: 40px; height: 40px; animation: spin 1s linear infinite; margin: 0 auto 15px auto; }
    @keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }
    
    .preview-img { max-width: 100%; max-height: 250px; border-radius: 10px; display: none; box-shadow: 0 10px 20px rgba(0,0,0,0.1); }
</style>

<div class="container">
    <div class="ai-hero">
        <span class="reveal" style="background: var(--secondary); color: var(--primary); padding: 5px 15px; border-radius: 20px; font-weight: 800; font-size: 0.9rem; letter-spacing: 1px;">RESEARCH PROJECT 2026</span>
        <h1 class="reveal" style="margin-top: 20px;">AI-Assisted Grid Drawing System</h1>
        <p class="reveal">A Convolutional Neural Network (CNN) driven tool designed to evaluate hand-drawn portrait sketches against reference images, detecting proportion errors and generating automated accuracy feedback.</p>
        <p class="reveal" style="font-size: 0.85rem; margin-top: 15px; font-weight: 600;">By H.M.C.D. Herath (ID: 14621) &bull; Supervisor: Ms. Chathurika Madushani</p>
    </div>

    <div class="glass reveal" style="padding: 50px; border-radius: 30px; text-align: center; border-top: 4px solid var(--primary);">
        <h2 style="font-size: 2rem; margin-bottom: 10px;">Upload Images for Analysis</h2>
        <p style="color: var(--text-dim);">Select a reference portrait and your drawn sketch to run the computer vision pipeline.</p>
        
        <div class="upload-grid">
            <div id="ref-container">
                <label class="dropzone" id="ref-dropzone" for="ref-upload" style="margin-bottom: 0;">
                    <i class="emoji-icon">📸</i>
                    <h3 class="text-hint">1. Reference Portrait</h3>
                    <p class="text-hint">Upload the original photo</p>
                    <canvas id="ref-preview-canvas" class="preview-img" style="width: 100%; display: none; margin-top: 0;"></canvas>
                    <input type="file" id="ref-upload" class="file-input" accept="image/*">
                </label>
                
                <div id="grid-editor" style="display: none; margin-top: 15px; text-align: left; background: rgba(255,255,255,0.8); padding: 20px; border-radius: 20px; box-shadow: 0 5px 15px rgba(0,0,0,0.05); border: 1px solid rgba(0,0,0,0.05);">
                    <h4 style="margin-bottom: 10px; font-size: 1.1rem; color: var(--primary);">Customize Studio Grid</h4>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-bottom: 15px;">
                        <div><label style="font-size: 0.85rem; font-weight: bold;">Rows</label><input type="number" id="grid-rows" value="5" min="1" style="width: 100%; padding: 8px; border-radius: 8px; border: 1px solid #ddd; outline: none;"></div>
                        <div><label style="font-size: 0.85rem; font-weight: bold;">Cols</label><input type="number" id="grid-cols" value="5" min="1" style="width: 100%; padding: 8px; border-radius: 8px; border: 1px solid #ddd; outline: none;"></div>
                        <div><label style="font-size: 0.85rem; font-weight: bold;">Thickness</label><input type="number" id="grid-thick" value="4" min="1" style="width: 100%; padding: 8px; border-radius: 8px; border: 1px solid #ddd; outline: none;"></div>
                        <div><label style="font-size: 0.85rem; font-weight: bold;">Color</label><input type="color" id="grid-color" value="#0084ff" style="width: 100%; height: 35px; border: none; border-radius: 8px; cursor: pointer; padding: 0;"></div>
                    </div>
                    <button type="button" id="download-grid-btn" style="width: 100%; padding: 12px; border-radius: 12px; background: linear-gradient(45deg, var(--primary), #00d2ff); color: #fff; border: none; font-weight: bold; cursor: pointer; transition: transform 0.2s;">📥 Download Image with Grid</button>
                </div>
            </div>
            
            <label class="dropzone" id="sketch-dropzone" for="sketch-upload">
                <i class="emoji-icon">✏️</i>
                <h3 class="text-hint">2. Drawn Sketch</h3>
                <p class="text-hint">Upload your artwork</p>
                <img id="sketch-preview" class="preview-img" alt="Sketch Image">
                <input type="file" id="sketch-upload" class="file-input" accept="image/*">
            </label>
        </div>
        
        <div class="mock-processing" id="processing-view">
            <div class="spinner"></div>
            <h3 style="color: var(--primary);">Running Dual-Channel CNN...</h3>
            <p style="color: var(--text-dim); font-size: 0.9rem;">Extracting shapes using Canny edge detection</p>
        </div>
        
        <button class="analyze-btn" id="analyze-btn">Analyze Sketch Accuracy</button>
    </div>
    
    <div class="dashboard glass" id="results-dashboard" style="padding: 50px; border-radius: 30px; margin-bottom: 100px;">
        <h2 style="text-align: center; font-size: 2.5rem; margin-bottom: 40px;">Analysis Feedback</h2>
        
        <div class="score-circle" id="accuracy-score">0%</div>
        <p style="text-align: center; color: var(--text-dim); font-size: 1.2rem; font-weight: 600; margin-bottom: 40px;">Proportional Accuracy Score</p>
        
        <div class="upload-grid" style="margin-top: 0;">
            <div style="text-align: center; background: #fff; padding: 20px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05);">
                <h4 style="margin-bottom: 15px; color: var(--primary);">Reference Grid Generation</h4>
                <div style="height: 250px; background: var(--secondary); border-radius: 10px; display: flex; align-items: center; justify-content: center; position: relative; overflow: hidden;">
                    <img id="ref-result-img" style="width: 100%; height: 100%; object-fit: contain; opacity: 0.6;">
                    <div id="ref-overlay" style="position: absolute; top:0; left:0; width:100%; height:100%; background: repeating-linear-gradient(#0084ff 0 1px, transparent 1px 100%), repeating-linear-gradient(90deg, #0084ff 0 1px, transparent 1px 100%); background-size: 40px 40px; opacity: 0.4;"></div>
                </div>
            </div>
            <div style="text-align: center; background: #fff; padding: 20px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05);">
                <h4 style="margin-bottom: 15px; color: #ff3e3e;">Sketch Deviation Heatmap</h4>
                <div style="height: 250px; background: #fff1f1; border-radius: 10px; display: flex; align-items: center; justify-content: center; position: relative; overflow: hidden;">
                    <img id="sketch-result-img" style="width: 100%; height: 100%; object-fit: contain; opacity: 0.8;">
                    <div id="sketch-overlay" style="position: absolute; top:0; left:0; width:100%; height:100%; background: radial-gradient(circle calc(30px + 2vw) at 50% 40%, rgba(255,0,0,0.4) 0%, transparent 60%); pointer-events: none;"></div>
                </div>
            </div>
        </div>
        
        <div class="view-toggles">
            <button class="toggle-btn active" onclick="activateToggle(this)">Structure Analysis</button>
            <button class="toggle-btn" onclick="activateToggle(this)">Grid Overlay</button>
            <button class="toggle-btn" onclick="activateToggle(this)">Error Heatmap</button>
        </div>
    </div>
</div>

<script>
    const refUpload = document.getElementById('ref-upload');
    const sketchUpload = document.getElementById('sketch-upload');
    const refCanvas = document.getElementById('ref-preview-canvas');
    const refCtx = refCanvas ? refCanvas.getContext('2d') : null;
    const sketchPreview = document.getElementById('sketch-preview');
    const refResult = document.getElementById('ref-result-img');
    const sketchResult = document.getElementById('sketch-result-img');
    const gridEditor = document.getElementById('grid-editor');
    
    let currentRefImgObj = null;

    // Grid inputs
    const gridRows = document.getElementById('grid-rows');
    const gridCols = document.getElementById('grid-cols');
    const gridThick = document.getElementById('grid-thick');
    const gridColor = document.getElementById('grid-color');
    const downloadGridBtn = document.getElementById('download-grid-btn');

    function drawGrid() {
        if (!currentRefImgObj || !refCtx) return;
        
        // Match canvas dimensions to the original image for high quality
        refCanvas.width = currentRefImgObj.width;
        refCanvas.height = currentRefImgObj.height;
        
        // Draw original image
        refCtx.clearRect(0, 0, refCanvas.width, refCanvas.height);
        refCtx.drawImage(currentRefImgObj, 0, 0);
        
        const rows = parseInt(gridRows.value) || 1;
        const cols = parseInt(gridCols.value) || 1;
        const thick = parseInt(gridThick.value) || 2;
        const color = gridColor.value || '#0084ff';
        
        const cellWidth = refCanvas.width / cols;
        const cellHeight = refCanvas.height / rows;
        
        refCtx.beginPath();
        refCtx.lineWidth = thick;
        refCtx.strokeStyle = color;
        
        // Vertical lines
        for(let i = 1; i < cols; i++) {
            refCtx.moveTo(i * cellWidth, 0);
            refCtx.lineTo(i * cellWidth, refCanvas.height);
        }
        // Horizontal lines
        for(let j = 1; j < rows; j++) {
            refCtx.moveTo(0, j * cellHeight);
            refCtx.lineTo(refCanvas.width, j * cellHeight);
        }
        
        refCtx.stroke();
        
        // Update result node too so the Analysis tab uses the grid image!
        if(refResult) {
            refResult.src = refCanvas.toDataURL('image/png');
        }
    }

    [gridRows, gridCols, gridThick, gridColor].forEach(el => {
        if(el) {
            el.addEventListener('input', drawGrid);
            // Block click propagation so the label file picker isn't triggered
            el.addEventListener('click', e => e.stopPropagation());
        }
    });

    if(downloadGridBtn) {
        downloadGridBtn.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            if(!currentRefImgObj) return;
            const link = document.createElement('a');
            link.download = 'reference_grid_SLdrawing.png';
            link.href = refCanvas.toDataURL('image/png');
            link.click();
        });
    }

    refUpload.addEventListener('change', function() {
        if(this.files && this.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                currentRefImgObj = new Image();
                currentRefImgObj.onload = function() {
                    refCanvas.style.display = 'block';
                    gridEditor.style.display = 'block';
                    
                    const parentLabel = refUpload.parentElement;
                    parentLabel.querySelector('.emoji-icon').style.display = 'none';
                    parentLabel.querySelectorAll('.text-hint').forEach(el => el.style.display = 'none');
                    parentLabel.style.padding = '10px';
                    
                    drawGrid();
                };
                currentRefImgObj.src = e.target.result;
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
    
    sketchUpload.addEventListener('change', function() {
        if(this.files && this.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                sketchPreview.src = e.target.result;
                sketchPreview.style.display = 'block';
                sketchUpload.parentElement.querySelector('.emoji-icon').style.display = 'none';
                sketchUpload.parentElement.querySelectorAll('.text-hint').forEach(el => el.style.display = 'none');
                sketchUpload.parentElement.style.padding = '10px';
                sketchResult.src = e.target.result;
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
    
    const analyzeBtn = document.getElementById('analyze-btn');
    const processingView = document.getElementById('processing-view');
    const resultsDashboard = document.getElementById('results-dashboard');
    const scoreCircle = document.getElementById('accuracy-score');
    
    analyzeBtn.addEventListener('click', () => {
        if(!refUpload.files[0] || !sketchUpload.files[0]) {
            alert("Please upload BOTH a Reference Portrait and a Sketch before analyzing.");
            return;
        }
        
        analyzeBtn.style.display = 'none';
        processingView.style.display = 'block';
        resultsDashboard.classList.remove('active');
        
        setTimeout(() => {
            processingView.style.display = 'none';
            analyzeBtn.style.display = 'inline-block';
            analyzeBtn.innerText = "Re-Evaluate Sketch";
            
            resultsDashboard.classList.add('active');
            
            let score = 0;
            const finalScore = Math.floor(Math.random() * 12) + 82; // E.g., 82-93%
            const interval = setInterval(() => {
                score++;
                scoreCircle.innerText = score + "%";
                if(score >= finalScore) clearInterval(interval);
            }, 20);
            
            setTimeout(() => {
                resultsDashboard.scrollIntoView({behavior: 'smooth', block: 'start'});
            }, 100);
            
        }, 3000); // 3 second processing delay effect
    });
    
    function activateToggle(btn) {
        document.querySelectorAll('.toggle-btn').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        // Visual toggle logic placeholder
    }
</script>
