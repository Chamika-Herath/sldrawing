<!-- ===== STEP 1: Upload Reference Image ===== -->
<style>
.step-nav { display: flex; justify-content: center; align-items: center; gap: 12px; margin-top: 24px; flex-wrap: wrap; }
.nav-btn { padding: 14px 28px; border-radius: 50px; font-weight: 800; cursor: pointer; transition: all .3s; font-size: 1rem; min-width: 180px; display: inline-flex; align-items: center; justify-content: center; gap: 8px; border: none; }
.next-btn { background: linear-gradient(45deg, var(--primary), #00d2ff); color: #fff; box-shadow: 0 10px 30px rgba(0,132,255,.3); }
.next-btn:hover { box-shadow: 0 15px 40px rgba(0,132,255,.42); }
.dropzone2 { border: 2px dashed var(--primary); border-radius: 20px; padding: 55px 30px; text-align: center; cursor: pointer; transition: all .3s; background: rgba(0,132,255,.02); position: relative; overflow: hidden; min-height: 260px; display: flex; flex-direction: column; align-items: center; justify-content: center; }
.dropzone2:hover { background: rgba(0,132,255,.07); transform: translateY(-3px); }
.dz-icon { font-size: 3rem; display: block; margin-bottom: 14px; }
.dropzone2 h3 { font-size: 1.15rem; font-weight: 800; margin-bottom: 8px; }
.dropzone2 p { color: var(--text-dim); font-size: .9rem; }
.dropzone2.has-image .dz-icon,
.dropzone2.has-image h3,
.dropzone2.has-image p { display: none; }
.dropzone2.has-image { padding: 12px 10px; }
.dz-preview { display: none; max-width: 100%; max-height: 100%; width: auto; height: auto; border-radius: 20px; object-fit: contain; }
.project-input-wrapper { margin-bottom: 24px; text-align: left; }
.project-input-label { display: block; font-weight: 700; margin-bottom: 8px; font-size: 0.95rem; }
.project-input { width: 100%; padding: 14px 18px; border: 2px solid rgba(0,0,0,0.08); border-radius: 12px; font-size: 1rem; transition: all 0.3s; background: rgba(255,255,255,0.8); box-sizing: border-box; }
.project-input:focus { outline: none; border-color: var(--primary); box-shadow: 0 0 0 4px rgba(0, 132, 255, 0.1); }
</style>
<div class="step-panel active" id="panel-1">
  <div class="panel-card reveal">
    <div class="panel-title">📸 Upload Reference Image</div>
    <p class="panel-sub">Upload a portrait photo to use as your drawing reference.</p>
    
    <div class="project-input-wrapper">
      <label class="project-input-label" for="project-name">Project Name</label>
      <input type="text" id="project-name" class="project-input" placeholder="e.g. My Awesome Drawing">
    </div>

    <label class="dropzone2" for="ref-input" id="ref-dz">
      <span class="dz-icon">📷</span>
      <h3>Drop your reference photo here</h3>
      <p>PNG, JPG or WEBP — click or drag &amp; drop</p>
      <input type="file" id="ref-input" accept="image/*" style="display:none">
      <img id="ref-preview" class="dz-preview" alt="Reference preview" style="max-height: 400px; display:none">
      <div id="ref-change-btn" style="display: none; margin-top: 15px; padding: 10px 24px; background: rgba(0,132,255,0.1); color: #00d2ff; border: 1px solid rgba(0,132,255,0.4); border-radius: 50px; font-weight: 600; cursor: pointer; transition: all 0.3s; font-size: 0.95rem;">Change Photo</div>
    </label>
    <div class="step-nav">
      <button class="next-btn nav-btn" onclick="Prject_process_step_01_submit()">Next</button>
    </div>
  </div>
</div>

<script>
const dropzone = document.getElementById('ref-dz');
const input = document.getElementById('ref-input');
const preview = document.getElementById('ref-preview');

function handleFile(file) {
    if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.style.display = 'block';
            dropzone.classList.add('has-image');
            const changeBtn = document.getElementById('ref-change-btn');
            if(changeBtn) changeBtn.style.display = 'inline-block';
        };
        reader.readAsDataURL(file);
    }
}

input.addEventListener('change', function(event) {
    const file = event.target.files[0];
    handleFile(file);
});

dropzone.addEventListener('dragover', function(event) {
    event.preventDefault();
    dropzone.classList.add('dragover');
});

dropzone.addEventListener('dragleave', function(event) {
    event.preventDefault();
    dropzone.classList.remove('dragover');
});

dropzone.addEventListener('drop', function(event) {
    event.preventDefault();
    dropzone.classList.remove('dragover');
    const files = event.dataTransfer.files;
    if (files.length > 0) {
        const file = files[0];
        handleFile(file);
    }
});
</script>
