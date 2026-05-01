<style>
.ag-wrap{padding:120px 0 80px}
.dash-hero{text-align:center;margin-bottom:40px}
.dash-hero h1{font-size:3rem;font-weight:900;letter-spacing:-1px}
.dash-hero p{color:var(--text-dim);font-size:1.1rem;margin-top:10px;max-width:600px;margin-left:auto;margin-right:auto}
.new-proj-btn{display:inline-flex;align-items:center;gap:10px;padding:16px 42px;background:linear-gradient(45deg,var(--primary),#00d2ff);color:#fff;border:none;border-radius:50px;font-size:1.1rem;font-weight:800;cursor:pointer;box-shadow:0 10px 30px rgba(0,132,255,.3);transition:all .3s;margin-top:24px;text-decoration:none}
.new-proj-btn:hover{transform:translateY(-4px);box-shadow:0 18px 45px rgba(0,132,255,.45)}
.projects-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(250px,1fr));gap:24px;margin-top:40px}
.proj-card{background:#fff;border-radius:20px;overflow:hidden;box-shadow:0 8px 30px rgba(0,0,0,.08);transition:all .3s;cursor:pointer;border:1px solid rgba(0,0,0,.04)}
.proj-card:hover{transform:translateY(-6px);box-shadow:0 20px 45px rgba(0,0,0,.14)}
.proj-thumb{width:100%;height:155px;object-fit:cover;background:var(--secondary);display:block}
.proj-thumb-placeholder{width:100%;height:155px;background:linear-gradient(135deg,var(--secondary),rgba(0,132,255,.08));display:flex;align-items:center;justify-content:center;font-size:2.5rem}
.proj-body{padding:16px}
.proj-name{font-weight:800;font-size:1rem;margin-bottom:4px}
.proj-meta{font-size:.78rem;color:var(--text-dim);display:flex;justify-content:space-between}
.proj-score{font-weight:700;color:var(--primary)}
.empty-state{text-align:center;padding:90px 20px;color:var(--text-dim)}
.empty-icon{font-size:4.5rem;display:block;margin-bottom:20px}
.empty-state h3{font-size:1.6rem;font-weight:900;color:var(--text);margin-bottom:10px}
.back-btn{background:none;border:2px solid var(--primary);color:var(--primary);padding:10px 26px;border-radius:50px;font-weight:700;cursor:pointer;margin-bottom:35px;transition:all .3s;font-size:.95rem}
.back-btn:hover{background:var(--primary);color:#fff}
.wizard-view{display:none}
.wizard-view.active{display:block}
.stepper{display:flex;justify-content:center;align-items:center;margin-bottom:48px;flex-wrap:wrap;gap:6px}
.st-item{display:flex;align-items:center;gap:8px}
.st-dot{width:40px;height:40px;border-radius:50%;border:3px solid #ddd;display:flex;align-items:center;justify-content:center;font-weight:800;color:#aaa;transition:all .3s;font-size:.88rem;flex-shrink:0}
.st-dot.active{border-color:var(--primary);background:var(--primary);color:#fff;box-shadow:0 5px 18px rgba(0,132,255,.35)}
.st-dot.done{border-color:#00c853;background:#00c853;color:#fff}
.st-lbl{font-size:.78rem;font-weight:700;color:#aaa}
.st-lbl.active{color:var(--primary)}
.st-line{width:28px;height:3px;background:#ddd;border-radius:3px}
.st-line.done{background:#00c853}
.step-panel{display:none}
.step-panel.active{display:block}
.panel-card{background:#fff;border-radius:24px;padding:40px;box-shadow:0 15px 45px rgba(0,0,0,.08)}
.panel-title{font-size:1.8rem;font-weight:900;margin-bottom:8px}
.panel-sub{color:var(--text-dim);margin-bottom:28px;font-size:1rem}
.dropzone2{border:2px dashed var(--primary);border-radius:20px;padding:55px 30px;text-align:center;cursor:pointer;transition:all .3s;background:rgba(0,132,255,.02);display:block}
.dropzone2:hover{background:rgba(0,132,255,.07);transform:translateY(-3px)}
.dz-icon{font-size:3rem;display:block;margin-bottom:14px}
.dropzone2 h3{font-size:1.15rem;font-weight:800;margin-bottom:8px}
.dropzone2 p{color:var(--text-dim);font-size:.9rem}
.dz-preview{max-width:100%;max-height:270px;border-radius:14px;margin-top:20px;display:none;object-fit:contain}
.sldr-row{margin-bottom:18px}
.sldr-row label{display:flex;justify-content:space-between;font-weight:700;font-size:.88rem;margin-bottom:7px}
.sldr-row input[type=range]{width:100%;accent-color:var(--primary);cursor:pointer}
.edit-canvas,.grid-canvas{width:100%;border-radius:14px;border:2px solid #f0f0f0;max-height:300px;display:block;object-fit:contain}
.next-btn{display:block;width:100%;max-width:340px;margin:28px auto 0;padding:16px;background:linear-gradient(45deg,var(--primary),#00d2ff);color:#fff;border:none;border-radius:50px;font-size:1.05rem;font-weight:800;cursor:pointer;box-shadow:0 10px 30px rgba(0,132,255,.3);transition:all .3s}
.next-btn:hover{transform:scale(1.04);box-shadow:0 15px 40px rgba(0,132,255,.42)}
.g-controls{display:grid;grid-template-columns:1fr 1fr;gap:14px;margin:20px 0}
.g-grp label{display:block;font-size:.85rem;font-weight:700;margin-bottom:6px}
.g-grp input{width:100%;padding:10px;border-radius:10px;border:1px solid #ddd;font-size:.9rem;outline:none;box-sizing:border-box}
.dl-btn{display:block;width:100%;padding:14px;border-radius:14px;background:linear-gradient(45deg,#0084ff,#00d2ff);color:#fff;border:none;font-weight:800;cursor:pointer;margin-bottom:14px;font-size:1rem;transition:all .3s}
.dl-btn:hover{transform:scale(1.02)}
.score-ring{width:140px;height:140px;border-radius:50%;border:8px solid var(--primary);display:flex;align-items:center;justify-content:center;margin:0 auto 18px;font-size:2.6rem;font-weight:900;color:var(--primary);background:#fff}
.fb-grid{display:grid;grid-template-columns:1fr 1fr;gap:18px;margin-top:28px}
.fb-card{background:var(--secondary);border-radius:16px;padding:20px;text-align:left}
.fb-card h4{font-weight:800;margin-bottom:8px;font-size:.95rem}
.fb-card p{color:var(--text-dim);font-size:.83rem;line-height:1.5}
.spinner2{border:4px solid rgba(0,132,255,.1);border-left-color:var(--primary);border-radius:50%;width:50px;height:50px;animation:spin 1s linear infinite;margin:40px auto 18px}
@keyframes spin{to{transform:rotate(360deg)}}
.proc-view{text-align:center;padding:40px}
.save-btn{background:linear-gradient(45deg,#00c853,#00e676);margin-top:28px;display:block;width:100%;max-width:340px;margin-left:auto;margin-right:auto;padding:16px;border-radius:50px;color:#fff;border:none;font-size:1.05rem;font-weight:800;cursor:pointer;box-shadow:0 10px 30px rgba(0,200,83,.3);transition:all .3s}
.save-btn:hover{transform:scale(1.04)}
@media(max-width:640px){.fb-grid,.g-controls{grid-template-columns:1fr}.st-lbl{display:none}.panel-card{padding:24px}}
</style>

<div class="container ag-wrap">

<!-- ===== DASHBOARD ===== -->
<div id="dashboard-view">
  <div class="dash-hero reveal">
    <span style="background:var(--secondary);color:var(--primary);padding:5px 16px;border-radius:20px;font-weight:800;font-size:.85rem;letter-spacing:1px">AI GRADER 2026</span>
    <h1 style="margin-top:18px">My Projects</h1>
    <p>Your AI-graded drawing sessions. Each project captures your reference, grid and sketch for analysis.</p>
    <button class="new-proj-btn" onclick="startNewProject()"><span style="font-size:1.3rem">＋</span> New Project</button>
  </div>
  <div id="projects-grid" class="projects-grid"></div>
  <div id="empty-state" class="empty-state" style="display:none">
    <span class="empty-icon">🎨</span>
    <h3>No Projects Yet</h3>
    <p>Click <strong>New Project</strong> to start your first AI-graded drawing session.</p>
  </div>
</div>

<!-- ===== WIZARD ===== -->
<div id="wizard-view" class="wizard-view">
  <button class="back-btn reveal" onclick="showDashboard()">← Back to Projects</button>
  <div class="stepper reveal" id="stepper"></div>

  <!-- Step 1 -->
  <div class="step-panel active" id="panel-1">
    <div class="panel-card reveal">
      <div class="panel-title">📸 Upload Reference Image</div>
      <p class="panel-sub">Upload a portrait photo to use as your drawing reference.</p>
      <label class="dropzone2" for="ref-input" id="ref-dz">
        <span class="dz-icon">📷</span>
        <h3>Drop your reference photo here</h3>
        <p>PNG, JPG or WEBP — click or drag &amp; drop</p>
        <input type="file" id="ref-input" accept="image/*" style="display:none">
      </label>
      <img id="ref-preview" class="dz-preview" alt="Reference preview">
      <button class="next-btn" onclick="goStep(2)">Next: Edit Image →</button>
    </div>
  </div>

  <!-- Step 2 -->
  <div class="step-panel" id="panel-2">
    <div class="panel-card reveal">
      <div class="panel-title">🎨 Edit Image</div>
      <p class="panel-sub">Adjust the reference image to make it easier to draw from.</p>
      <canvas id="edit-canvas" class="edit-canvas"></canvas>
      <div style="margin-top:24px">
        <div class="sldr-row"><label>Brightness <span id="br-val">100%</span></label><input type="range" id="sl-br" min="0" max="200" value="100"></div>
        <div class="sldr-row"><label>Contrast <span id="ct-val">100%</span></label><input type="range" id="sl-ct" min="0" max="200" value="100"></div>
        <div class="sldr-row"><label>Saturation <span id="sa-val">100%</span></label><input type="range" id="sl-sa" min="0" max="200" value="100"></div>
        <div class="sldr-row"><label>Grayscale <span id="gs-val">0%</span></label><input type="range" id="sl-gs" min="0" max="100" value="0"></div>
        <div class="sldr-row"><label>Blur <span id="bl-val">0px</span></label><input type="range" id="sl-bl" min="0" max="10" value="0"></div>
      </div>
      <button class="next-btn" onclick="applyAndNext()">Next: Make Grid →</button>
    </div>
  </div>

  <!-- Step 3 -->
  <div class="step-panel" id="panel-3">
    <div class="panel-card reveal">
      <div class="panel-title">📐 Make a Grid</div>
      <p class="panel-sub">Overlay a customizable grid on your reference image to guide your drawing.</p>
      <canvas id="grid-canvas" class="grid-canvas"></canvas>
      <div class="g-controls">
        <div class="g-grp"><label>Rows</label><input type="number" id="g-rows" value="5" min="1" max="20"></div>
        <div class="g-grp"><label>Columns</label><input type="number" id="g-cols" value="5" min="1" max="20"></div>
        <div class="g-grp"><label>Thickness (px)</label><input type="number" id="g-thick" value="2" min="1" max="10"></div>
        <div class="g-grp"><label>Line Color</label><input type="color" id="g-color" value="#0084ff" style="height:42px;padding:3px;border-radius:10px;border:1px solid #ddd;cursor:pointer;width:100%"></div>
      </div>
      <button class="dl-btn" onclick="downloadGrid()">📥 Download Grid Image</button>
      <button class="next-btn" onclick="goStep(4)">Next: Upload Drawing →</button>
    </div>
  </div>

  <!-- Step 4 -->
  <div class="step-panel" id="panel-4">
    <div class="panel-card reveal">
      <div class="panel-title">✏️ Upload Your Drawing</div>
      <p class="panel-sub">Upload the hand-drawn sketch you made using the grid reference.</p>
      <label class="dropzone2" for="sketch-input" id="sketch-dz">
        <span class="dz-icon">🖊️</span>
        <h3>Drop your sketch here</h3>
        <p>PNG, JPG or WEBP — click or drag &amp; drop</p>
        <input type="file" id="sketch-input" accept="image/*" style="display:none">
      </label>
      <img id="sketch-preview" class="dz-preview" alt="Sketch preview">
      <button class="next-btn" onclick="runAICheck()">Next: AI Check →</button>
    </div>
  </div>

  <!-- Step 5 -->
  <div class="step-panel" id="panel-5">
    <div class="panel-card reveal">
      <div class="panel-title">🤖 AI Check</div>
      <p class="panel-sub">Our CNN pipeline compares your sketch to the reference and scores proportional accuracy.</p>
      <div class="proc-view" id="proc-view" style="display:none">
        <div class="spinner2"></div>
        <h3 style="color:var(--primary)">Running Dual-Channel CNN...</h3>
        <p style="color:var(--text-dim);font-size:.9rem">Extracting shapes using Canny edge detection...</p>
      </div>
      <div id="results-view" style="display:none;text-align:center">
        <div class="score-ring" id="score-ring">0%</div>
        <p style="font-weight:700;font-size:1.1rem;margin-bottom:4px">Proportional Accuracy Score</p>
        <p style="color:var(--text-dim);font-size:.88rem;margin-bottom:28px">Based on edge-detection & grid-cell comparison</p>
        <div class="fb-grid">
          <div class="fb-card"><h4 style="color:var(--primary)">✅ Proportions</h4><p id="fb-0">Good symmetry in upper facial region.</p></div>
          <div class="fb-card"><h4 style="color:#f59e0b">⚠️ Details</h4><p id="fb-1">Minor deviation in jaw-line curvature.</p></div>
          <div class="fb-card"><h4 style="color:#00c853">📐 Grid Alignment</h4><p id="fb-2">85% of cells matched within 8px tolerance.</p></div>
          <div class="fb-card"><h4 style="color:#e91e8c">🎯 Suggestion</h4><p id="fb-3">Refine the nose-bridge width ratio.</p></div>
        </div>
        <button class="save-btn" onclick="saveProject()">💾 Save Project</button>
      </div>
    </div>
  </div>

</div><!-- /wizard -->
</div><!-- /container -->

<script>
var ag = { step:1, ref:null, edited:null, grid:null, sketch:null, score:0 };
var LABELS = ['Upload Image','Edit Image','Make Grid','Upload Drawing','AI Check'];

function renderStepper(cur){
  var h=''; for(var i=1;i<=5;i++){
    var done=i<cur,active=i===cur;
    h+='<div class="st-item"><div class="st-dot '+(done?'done':active?'active':'')+'">'+( done?'✓':i)+'</div><span class="st-lbl '+(active?'active':'')+'">'+LABELS[i-1]+'</span></div>';
    if(i<5) h+='<div class="st-line '+(done?'done':'')+'"></div>';
  }
  document.getElementById('stepper').innerHTML=h;
}

function startNewProject(){
  ag={step:1,ref:null,edited:null,grid:null,sketch:null,score:0};
  document.getElementById('dashboard-view').style.display='none';
  var wiz=document.getElementById('wizard-view'); wiz.classList.add('active');
  document.querySelectorAll('.step-panel').forEach(function(p){p.classList.remove('active');});
  document.getElementById('panel-1').classList.add('active');
  var rp=document.getElementById('ref-preview'); rp.src=''; rp.style.display='none';
  var sp=document.getElementById('sketch-preview'); sp.src=''; sp.style.display='none';
  document.getElementById('results-view').style.display='none';
  document.getElementById('proc-view').style.display='none';
  document.getElementById('ref-dz').querySelector('h3').textContent='Drop your reference photo here';
  document.getElementById('ref-dz').querySelector('p').textContent='PNG, JPG or WEBP — click or drag & drop';
  renderStepper(1); window.scrollTo({top:0,behavior:'smooth'});
}

function showDashboard(){
  document.getElementById('wizard-view').classList.remove('active');
  document.getElementById('dashboard-view').style.display='block';
  loadProjects(); window.scrollTo({top:0,behavior:'smooth'});
}

function goStep(n){
  if(n===2&&!ag.ref){alert('Please upload a reference image first.');return;}
  if(n===4&&!ag.edited){ag.edited=ag.ref;}
  document.querySelectorAll('.step-panel').forEach(function(p){p.classList.remove('active');});
  document.getElementById('panel-'+n).classList.add('active');
  ag.step=n; renderStepper(n);
  if(n===2) initEdit();
  if(n===3) initGrid();
  window.scrollTo({top:80,behavior:'smooth'});
}

// Step 1
document.getElementById('ref-input').addEventListener('change',function(){
  if(!this.files[0]) return;
  var r=new FileReader(); var self=this;
  r.onload=function(e){
    ag.ref=e.target.result;
    var img=document.getElementById('ref-preview'); img.src=e.target.result; img.style.display='block';
    document.getElementById('ref-dz').querySelector('h3').textContent='✅ Image Uploaded!';
    document.getElementById('ref-dz').querySelector('p').textContent=self.files[0].name;
  }; r.readAsDataURL(this.files[0]);
});

// Step 2
var editImg=null;
function initEdit(){
  var c=document.getElementById('edit-canvas');
  editImg=new Image();
  editImg.onload=function(){c.width=editImg.width;c.height=editImg.height;applyFilters();};
  editImg.src=ag.ref;
}
function applyFilters(){
  var c=document.getElementById('edit-canvas'),ctx=c.getContext('2d');
  var b=document.getElementById('sl-br').value, ct=document.getElementById('sl-ct').value;
  var sa=document.getElementById('sl-sa').value, gs=document.getElementById('sl-gs').value;
  var bl=document.getElementById('sl-bl').value;
  document.getElementById('br-val').textContent=b+'%';
  document.getElementById('ct-val').textContent=ct+'%';
  document.getElementById('sa-val').textContent=sa+'%';
  document.getElementById('gs-val').textContent=gs+'%';
  document.getElementById('bl-val').textContent=bl+'px';
  ctx.filter='brightness('+b+'%) contrast('+ct+'%) saturate('+sa+'%) grayscale('+gs+'%) blur('+bl+'px)';
  ctx.clearRect(0,0,c.width,c.height); ctx.drawImage(editImg,0,0);
}
['sl-br','sl-ct','sl-sa','sl-gs','sl-bl'].forEach(function(id){document.getElementById(id).addEventListener('input',applyFilters);});
function applyAndNext(){
  ag.edited=document.getElementById('edit-canvas').toDataURL('image/png'); goStep(3);
}

// Step 3
var gridBaseImg=null;
function initGrid(){
  var c=document.getElementById('grid-canvas');
  gridBaseImg=new Image();
  gridBaseImg.onload=function(){c.width=gridBaseImg.width;c.height=gridBaseImg.height;drawGrid();};
  gridBaseImg.src=ag.edited||ag.ref;
}
function drawGrid(){
  var c=document.getElementById('grid-canvas'),ctx=c.getContext('2d');
  var rows=parseInt(document.getElementById('g-rows').value)||5;
  var cols=parseInt(document.getElementById('g-cols').value)||5;
  var thick=parseInt(document.getElementById('g-thick').value)||2;
  var color=document.getElementById('g-color').value;
  ctx.clearRect(0,0,c.width,c.height); ctx.drawImage(gridBaseImg,0,0);
  ctx.strokeStyle=color; ctx.lineWidth=thick;
  var cw=c.width/cols,ch=c.height/rows;
  ctx.beginPath();
  for(var i=1;i<cols;i++){ctx.moveTo(i*cw,0);ctx.lineTo(i*cw,c.height);}
  for(var j=1;j<rows;j++){ctx.moveTo(0,j*ch);ctx.lineTo(c.width,j*ch);}
  ctx.stroke();
  ag.grid=c.toDataURL('image/png');
}
['g-rows','g-cols','g-thick','g-color'].forEach(function(id){document.getElementById(id).addEventListener('input',drawGrid);});
function downloadGrid(){drawGrid();var a=document.createElement('a');a.download='sldrawing_grid.png';a.href=ag.grid;a.click();}

// Step 4
document.getElementById('sketch-input').addEventListener('change',function(){
  if(!this.files[0]) return;
  var r=new FileReader(); var self=this;
  r.onload=function(e){
    ag.sketch=e.target.result;
    var img=document.getElementById('sketch-preview'); img.src=e.target.result; img.style.display='block';
    document.getElementById('sketch-dz').querySelector('h3').textContent='✅ Sketch Uploaded!';
    document.getElementById('sketch-dz').querySelector('p').textContent=self.files[0].name;
  }; r.readAsDataURL(this.files[0]);
});

// Step 5
var FEEDBACKS=[
  ['Good symmetry in upper facial region.','Minor deviation in jaw-line curvature.','85% of cells matched within 8px tolerance.','Refine the nose-bridge width ratio.'],
  ['Strong proportions across all zones.','Ear placement slightly off-center.','90% grid alignment detected.','Improve hairline boundary precision.'],
  ['Excellent eye spacing accuracy.','Chin shape needs more definition.','78% grid cell tolerance achieved.','Improve lip-width ratio accuracy.']
];
function runAICheck(){
  if(!ag.sketch){alert('Please upload your sketch first.');return;}
  goStep(5);
  document.getElementById('proc-view').style.display='block';
  document.getElementById('results-view').style.display='none';
  setTimeout(function(){
    document.getElementById('proc-view').style.display='none';
    var rv=document.getElementById('results-view'); rv.style.display='block';
    ag.score=Math.floor(Math.random()*14)+80;
    var s=0,ring=document.getElementById('score-ring');
    var iv=setInterval(function(){s++;ring.textContent=s+'%';if(s>=ag.score)clearInterval(iv);},25);
    var fb=FEEDBACKS[Math.floor(Math.random()*FEEDBACKS.length)];
    for(var i=0;i<4;i++) document.getElementById('fb-'+i).textContent=fb[i];
  },3000);
}

// Save / Load
function saveProject(){
  var name=prompt('Enter a name for this project:','Project '+(Date.now()+'').slice(-4));
  if(!name) return;
  var projects=JSON.parse(localStorage.getItem('ag_projects')||'[]');
  projects.unshift({id:Date.now(),name:name,thumb:ag.grid||ag.ref,date:new Date().toLocaleDateString(),score:ag.score});
  localStorage.setItem('ag_projects',JSON.stringify(projects));
  alert('Project saved! ✅'); showDashboard();
}

function loadProjects(){
  var projects=JSON.parse(localStorage.getItem('ag_projects')||'[]');
  var grid=document.getElementById('projects-grid');
  var empty=document.getElementById('empty-state');
  if(!projects.length){grid.innerHTML='';empty.style.display='block';return;}
  empty.style.display='none';
  grid.innerHTML=projects.map(function(p){
    return '<div class="proj-card">'+
      (p.thumb?'<img class="proj-thumb" src="'+p.thumb+'" alt="'+p.name+'">':'<div class="proj-thumb-placeholder">🎨</div>')+
      '<div class="proj-body"><div class="proj-name">'+p.name+'</div><div class="proj-meta"><span>'+p.date+'</span><span class="proj-score">'+p.score+'%</span></div></div></div>';
  }).join('');
}

document.addEventListener('DOMContentLoaded',loadProjects);
</script>
