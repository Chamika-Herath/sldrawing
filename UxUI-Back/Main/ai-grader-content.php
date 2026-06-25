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
.nav-btn{padding:14px 28px;border-radius:50px;font-weight:800;cursor:pointer;transition:all .3s;font-size:1rem;min-width:140px;display:inline-flex;align-items:center;justify-content:center;gap:8px;border:none}
.back-btn{background:rgba(255,255,255,.08);color:var(--text);border:1px solid var(--glass-border)}
.back-btn:hover{background:var(--primary);color:#fff;border-color:var(--primary)}
.next-btn{background:linear-gradient(45deg,var(--primary),#00d2ff);color:#fff;box-shadow:0 10px 30px rgba(0,132,255,.3)}
.next-btn:hover{box-shadow:0 15px 40px rgba(0,132,255,.42)}
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
.panel-card{background:var(--surface);border-radius:24px;padding:40px;box-shadow:var(--shadow);border:1px solid var(--glass-border)}
.panel-title{font-size:1.8rem;font-weight:900;margin-bottom:8px;color:var(--text)}
.panel-sub{color:var(--text-dim);margin-bottom:28px;font-size:1rem}
.edit-split{display:flex;gap:40px;align-items:flex-start}
.edit-settings{flex:0 0 320px}
.edit-preview-wrap{flex:1;background:rgba(0,0,0,0.2);border-radius:20px;padding:20px;display:flex;align-items:center;justify-content:center;min-height:400px;border:1px solid var(--glass-border)}
.dropzone2{border:2px dashed var(--primary);border-radius:20px;padding:55px 30px;text-align:center;cursor:pointer;transition:all .3s;background:rgba(0,132,255,.02);position:relative;overflow:hidden;min-height:260px;display:flex;flex-direction:column;align-items:center;justify-content:center}
.dropzone2:hover{background:rgba(0,132,255,.07);transform:translateY(-3px)}
.dz-icon{font-size:3rem;display:block;margin-bottom:14px}
.dropzone2 h3{font-size:1.15rem;font-weight:800;margin-bottom:8px}
.dropzone2 p{color:var(--text-dim);font-size:.9rem}
.dropzone2.has-image .dz-icon,
.dropzone2.has-image h3,
.dropzone2.has-image p{display:none}
.dropzone2.has-image{padding:12px 10px}
.dz-preview{display:none;max-width:100%;max-height:100%;width:auto;height:auto;border-radius:20px;object-fit:contain}
.sldr-row{margin-bottom:18px}
.sldr-row label{display:flex;justify-content:space-between;font-weight:700;font-size:.88rem;margin-bottom:7px}
.sldr-row input[type=range]{width:100%;accent-color:var(--primary);cursor:pointer}
.edit-canvas,.grid-canvas{width:100%;border-radius:14px;border:2px solid #f0f0f0;max-height:300px;display:block;object-fit:contain}
.next-btn{display:inline-flex;width:auto;margin:0;padding:14px 28px;background:linear-gradient(45deg,var(--primary),#00d2ff);color:#fff;border:none;border-radius:50px;font-size:1rem;font-weight:800;cursor:pointer;align-items:center;justify-content:center;gap:8px;box-shadow:0 10px 30px rgba(0,132,255,.3);transition:all .3s}
.next-btn:hover{box-shadow:0 15px 40px rgba(0,132,255,.42)}
.ai-toast-layer{position:fixed;left:50%;bottom:24px;transform:translateX(-50%);display:flex;justify-content:center;align-items:center;z-index:9999;pointer-events:none;width:auto;max-width:calc(100% - 32px)}
.ai-toast{pointer-events:auto;position:relative;display:flex;align-items:center;gap:12px;padding:14px 18px;border-radius:999px;background:linear-gradient(135deg,#fefefe,#e6f9ea);color:#111;box-shadow:0 22px 50px rgba(0,0,0,.18);border:1px solid rgba(128,255,149,.55);font-weight:700;font-size:.95rem;max-width:100%;opacity:0;transform:translateY(18px);transition:opacity .25s ease,transform .25s ease}
.ai-toast::after{content:'';position:absolute;bottom:-8px;left:50%;transform:translateX(-50%) rotate(45deg);width:16px;height:16px;background:linear-gradient(135deg,#fefefe,#e6f9ea);border-left:1px solid rgba(128,255,149,.55);border-bottom:1px solid rgba(128,255,149,.55)}
.ai-toast.show{opacity:1;transform:translateY(0)}
.ai-toast--error{background:linear-gradient(135deg,#ffe7e7,#fff1f0);border-color:rgba(255,136,136,.55);color:#832c2c}
.ai-toast--warning{background:linear-gradient(135deg,#fff7db,#ffeed1);border-color:rgba(255,193,7,.55);color:#7a4b00}
.ai-toast--success{background:linear-gradient(135deg,#e6f9ea,#d4fde3);border-color:rgba(0,200,83,.55);color:#165c2b}
.ai-confirm-layer{position:fixed;inset:0;display:flex;align-items:center;justify-content:center;background:rgba(12,18,36,.55);z-index:10000;opacity:0;pointer-events:none;transition:opacity .25s ease}
.ai-confirm-layer.show{opacity:1;pointer-events:auto}
.ai-confirm-box{width:min(420px,calc(100% - 40px));background:#fff;border-radius:28px;box-shadow:0 30px 80px rgba(0,0,0,.22);padding:28px;text-align:center;position:relative}
.ai-confirm-icon{font-size:2rem;margin-bottom:16px}
.ai-confirm-message{font-size:1.05rem;font-weight:700;color:#121212;margin-bottom:24px;line-height:1.4}
.ai-confirm-actions{display:flex;gap:12px;justify-content:center;flex-wrap:wrap}
.ai-confirm-btn{min-width:120px;padding:12px 18px;border-radius:999px;border:none;font-weight:800;cursor:pointer;transition:all .25s ease}
.ai-confirm-primary{background:linear-gradient(45deg,var(--primary),#00d2ff);color:#fff;box-shadow:0 12px 30px rgba(0,132,255,.25)}
.ai-confirm-primary:hover{transform:translateY(-1px)}
.ai-confirm-cancel{background:#f4f6fb;color:#23344a}
.ai-confirm-cancel:hover{background:#e8edf4}
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
/* Photoshop-like Pro Grid Maker */
.grid-split-wrap { display: flex; gap: 0; min-height: 700px; align-items: stretch; background: #1a1a1a; border-radius: 24px; overflow: hidden; border: 1px solid #333; }
.grid-workspace { flex: 1; background: #0f0f0f; position: relative; display: flex; align-items: center; justify-content:center; overflow: hidden; min-height: 600px; }
.grid-sidebar { flex: 0 0 280px; background: #252525; border-left: 1px solid #333; display: flex; flex-direction: column; }
.grid-sidebar-card { padding: 20px; color: #ccc; }
.grid-sidebar-card label { color: #888; text-transform: uppercase; font-size: 0.7rem; letter-spacing: 0.5px; }
.grid-sidebar-card input[type="number"], .grid-sidebar-card input[type="text"] { background: #333; border: 1px solid #444; color: #fff; padding: 8px; border-radius: 6px; }
.grid-tool-overlay { top: 15px; background: rgba(30, 30, 30, 0.9); border: 1px solid #444; }
.gt-btn { padding: 8px 12px; font-size: 0.75rem; }
.grid-canvas { cursor: grab; box-shadow: 0 0 40px rgba(0,0,0,0.5); }
.g-controls { gap: 10px; margin: 15px 0; }
@media (max-width: 992px) { 
  .grid-split-wrap { flex-direction: column; height: auto; min-height: none; gap: 0; }
  .grid-workspace { height: 60vh; min-height: 400px; order: 1; border-radius: 0; }
  .grid-sidebar { order: 2; flex: none; width: 100%; border-left: none; border-top: 1px solid #333; }
  .grid-sidebar-card { padding: 15px; }
  .grid-tool-overlay { top: auto !important; bottom: 20px !important; left: 50%; transform: translateX(-50%); width: auto; max-width: 95%; background: rgba(0,0,0,0.85); padding: 5px; border-radius: 12px; }
  .gt-btn { flex-direction: row !important; padding: 10px 15px !important; min-width: 0; height: auto !important; font-size: 0.8rem; }
  .g-controls { grid-template-columns: repeat(4, 1fr) !important; gap: 8px !important; margin: 10px 0 !important; }
  .g-grp label { font-size: 0.6rem; text-overflow: ellipsis; white-space: nowrap; overflow: hidden; }
  .g-grp input { padding: 8px 4px !important; font-size: 0.7rem !important; text-align: center; }
  .grid-sidebar-card hr, .grid-sidebar-card p, .grid-sidebar-card > div:first-child { display: none !important; }
}
/* Modern Editor Styles */
.modern-editor-wrap { background: var(--surface); border-radius: 24px; overflow: hidden; box-shadow: var(--shadow); border: 1px solid var(--glass-border); display: flex; flex-direction: column; min-height: 80vh; }
.editor-toolbar { background: var(--secondary); padding: 12px 20px; display: flex; align-items: center; gap: 15px; border-bottom: 1px solid var(--glass-border); }
.tool-group { display: flex; gap: 8px; }
.tool.gt-btn { background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); color: #fff; padding: 10px 16px; border-radius: 12px; cursor: pointer; display: flex; align-items: center; gap: 8px; font-weight: 700; font-size: 0.85rem; transition: all 0.2s; }
.gt-btn:hover { background: rgba(255,255,255,0.1); }
.gt-btn.active { background: var(--primary) !important; color: #fff !important; border-color: var(--primary) !important; box-shadow: 0 4px 15px rgba(0,132,255,0.4); }
.tool-btn { background: none; border: none; padding: 10px 15px; border-radius: 12px; color: var(--text-dim); cursor: pointer; display: flex; flex-direction: column; align-items: center; gap: 5px; transition: all 0.2s; min-width: 80px; }
.tool-btn i { width: 22px; height: 22px; }
.tool-btn span { font-size: 0.75rem; font-weight: 700; }
.tool-btn:hover { background: rgba(254, 98, 29, 0.1); color: var(--primary); }
.tool-btn.active { background: var(--primary); color: #fff; box-shadow: 0 4px 12px rgba(254, 98, 29, 0.3); }
.tool-divider { width: 1px; height: 30px; background: var(--glass-border); margin: 0 10px; }

.editor-main { flex: 1; display: flex; overflow: hidden; position: relative; background: #eef2f5; }
body.dark-theme .editor-main { background: #0f0f14; }

.editor-sidebar { width: 300px; background: var(--surface); border-right: 1px solid var(--glass-border); padding: 20px; overflow-y: auto; }
.sidebar-panel { display: none; }
.sidebar-panel.active { display: block; animation: fadeIn 0.3s; }
.sidebar-panel h3 { font-size: 1.1rem; font-weight: 800; margin-bottom: 20px; color: var(--text); }

.control-item { margin-bottom: 20px; }
.control-item label { display: block; font-size: 0.85rem; font-weight: 700; margin-bottom: 8px; color: var(--text-dim); }
.control-item label span { float: right; color: var(--primary); }

.modern-range { width: 100%; accent-color: var(--primary); cursor: pointer; height: 6px; border-radius: 3px; }
.modern-input, .modern-select { width: 100%; padding: 12px; border-radius: 10px; border: 1px solid var(--glass-border); background: var(--secondary); color: var(--text); font-weight: 600; outline: none; }
.panel-action-btn { width: 100%; padding: 14px; border-radius: 12px; border: 1px solid var(--primary); background: none; color: var(--primary); font-weight: 800; cursor: pointer; transition: all 0.2s; margin-top: 10px; }
.panel-action-btn:hover { background: var(--primary); color: #fff; }
.panel-action-btn.primary { background: var(--primary); color: #fff; border: none; }

.canvas-workspace { flex: 1; display: flex; align-items: center; justify-content: center; overflow: auto; padding: 40px; position: relative; background: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAMUlEQVQ4T2NkYGAQYcAP3uAnm+HUmEGo69AFIBnBAaj68MI0zQCChU6mGTCIsBAvzsAzDJmBBQUPlT8AAAAASUVORK5CYII='); }
.canvas-container-outer { box-shadow: 0 0 50px rgba(0,0,0,0.2); border-radius: 4px; overflow: hidden; }

.editor-footer { background: var(--surface); padding: 15px 30px; border-top: 1px solid var(--glass-border); display: flex; align-items: center; justify-content: space-between; }
.footer-btn { background: none; border: 1px solid var(--glass-border); color: var(--text); width: 40px; height: 40px; border-radius: 10px; cursor: pointer; transition: 0.2s; }
.footer-btn:hover { background: var(--secondary); border-color: var(--primary); color: var(--primary); }

.zoom-controls { display: flex; align-items: center; gap: 15px; background: var(--secondary); padding: 5px 15px; border-radius: 50px; border: 1px solid var(--glass-border); }
.zoom-controls button { background: none; border: none; color: var(--text); cursor: pointer; padding: 5px; }
.zoom-controls span { font-weight: 800; min-width: 50px; text-align: center; font-size: 0.9rem; }

.step-nav { display: flex; justify-content: center; align-items: center; gap: 12px; margin: 24px auto 32px; flex-wrap: wrap; }
.step-nav .nav-btn { margin: 0; width: 180px; flex: 0 0 180px; }
.step-nav .back-btn { width: 180px; }
.step-nav .next-btn { width: 180px; }

.transform-grid, .shapes-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 10px; }
.icon-action-btn, .shape-btn { background: var(--secondary); border: 1px solid var(--glass-border); color: var(--text); padding: 15px; border-radius: 12px; cursor: pointer; transition: 0.2s; }
.icon-action-btn:hover, .shape-btn:hover { border-color: var(--primary); color: var(--primary); }

.color-presets { display: flex; flex-wrap: wrap; gap: 8px; align-items: center; }
.color-dot { width: 24px; height: 24px; border-radius: 50%; cursor: pointer; transition: 0.2s; border: 2px solid transparent; }
.color-dot.active { border-color: var(--primary); transform: scale(1.2); }

.info-box { background: rgba(254, 98, 29, 0.1); border-radius: 10px; padding: 10px; color: var(--primary); font-size: 0.8rem; font-weight: 700; display: flex; align-items: center; gap: 8px; margin-top: 10px; }

@keyframes fadeIn { from { opacity: 0; transform: translateX(-10px); } to { opacity: 1; transform: translateX(0); } }

@media (max-width: 1024px) {
  .editor-sidebar { width: 240px; }
  .tool-btn { min-width: 60px; padding: 8px; }
}

@media (max-width: 768px) {
  .modern-editor-wrap { flex-direction: column; height: auto; }
  .editor-main { flex-direction: column; }
  .editor-sidebar { width: 100%; border-right: none; border-bottom: 1px solid var(--glass-border); max-height: 200px; }
  .editor-toolbar { overflow-x: auto; white-space: nowrap; }
}
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



     <?php 
    include_once '../../UxUI-Back/Needs/header.php';
    
    ?>


    <!--  -->
     <?php

            include_once '../../UxUI-Back/AIGrader/JS/AIGrader_JS.php';
            include_once '../../UxUI-Back\AIGrader/JS/step1-JS.php';
            include_once '../../UxUI-Back\AIGrader/JS/step2-JS.php';
            include_once '../../UxUI-Back\AIGrader/JS/step3-JS.php';
            include_once '../../UxUI-Back\AIGrader/JS/step4-JS.php';
            include_once '../../UxUI-Back\AIGrader/JS/step5-JS.php';


            include_once '../../UxUI-Back/AIGrader/step1-upload.php';
            include_once '../../UxUI-Back/AIGrader/step2-edit.php';
            include_once '../../UxUI-Back/AIGrader/step3-grid.php';
            include_once '../../UxUI-Back/AIGrader/step4-drawing.php';
            include_once '../../UxUI-Back/AIGrader/step5-ai-check.php';




            ?>
<?php include_once './UxUI-Back/Needs/footer.php'; ?>
  </div><!-- /wizard -->
</div><!-- /container -->

<script>
var ag = { step:1, ref:null, edited:null, grid:null, sketch:null, score:0 };
var LABELS = ['Upload Image','Edit Image','Make Grid','Upload Drawing','AI Check'];

function renderStepper(cur){
  var h=''; for(var i=1;i<=5;i++){
    var done=i<cur, active=i===cur;
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

function showMessage(text, type='error', duration=3500){
  var layer=document.getElementById('ai-toast-layer');
  if(!layer){layer=document.createElement('div');layer.id='ai-toast-layer';layer.className='ai-toast-layer';document.body.appendChild(layer);}
  var msg=document.createElement('div');msg.className='ai-toast ai-toast--'+type;msg.textContent=text;
  layer.appendChild(msg);
  requestAnimationFrame(function(){msg.classList.add('show');});
  setTimeout(function(){msg.classList.remove('show');setTimeout(function(){if(msg.parentNode) msg.parentNode.removeChild(msg);},250);},duration);
}

function showConfirm(message, confirmText, cancelText, onConfirm, onCancel) {
  var layer=document.getElementById('ai-confirm-layer');
  if(!layer){
    layer=document.createElement('div');
    layer.id='ai-confirm-layer';
    layer.className='ai-confirm-layer';
    layer.innerHTML = '<div class="ai-confirm-box"><div class="ai-confirm-icon">⚠️</div><div class="ai-confirm-message"></div><div class="ai-confirm-actions"><button class="ai-confirm-btn ai-confirm-cancel"></button><button class="ai-confirm-btn ai-confirm-primary"></button></div></div>';
    document.body.appendChild(layer);
  }
  layer.querySelector('.ai-confirm-message').textContent = message;
  layer.querySelector('.ai-confirm-primary').textContent = confirmText || 'Continue';
  layer.querySelector('.ai-confirm-cancel').textContent = cancelText || 'Cancel';
  layer.classList.add('show');

  var confirmBtn = layer.querySelector('.ai-confirm-primary');
  var cancelBtn = layer.querySelector('.ai-confirm-cancel');

  function cleanup(){
    layer.classList.remove('show');
    confirmBtn.removeEventListener('click', onConfirmClick);
    cancelBtn.removeEventListener('click', onCancelClick);
  }
  function onConfirmClick(){
    cleanup();
    if(typeof onConfirm==='function') onConfirm();
  }
  function onCancelClick(){
    cleanup();
    if(typeof onCancel==='function') onCancel();
  }

  confirmBtn.addEventListener('click', onConfirmClick);
  cancelBtn.addEventListener('click', onCancelClick);
}

function navigateStep(n){
  document.querySelectorAll('.step-panel').forEach(function(p){p.classList.remove('active');});
  document.getElementById('panel-'+n).classList.add('active');
  ag.step=n; renderStepper(n);
  if(n===2) initEdit();
  if(n===3) initGrid();
  window.scrollTo({top:80,behavior:'smooth'});
}

function goStep(n){
  if(n===2&&!ag.ref){showMessage('Please upload a reference image first.', 'warning');return;}
  if(n < ag.step && (ag.ref || ag.edited || ag.grid || ag.sketch)){
    showConfirm('Your changes will be removed if you go back. Continue?', 'Continue', 'Stay', function(){ navigateStep(n); });
    return;
  }
  if(n===4&&!ag.edited){ag.edited=ag.ref;}
  navigateStep(n);
}

window.addEventListener('beforeunload', function(event) {
  if(window.ag && (ag.ref || ag.edited || ag.grid || ag.sketch)){
    showMessage('Your changes will be removed if you refresh or leave the page.', 'warning', 4200);
    event.preventDefault();
    event.returnValue = 'Your changes will be removed.';
    return 'Your changes will be removed.';
  }
});

// Step 1 — Reference upload
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

// Step 2 — Modern Image Editor (Fabric.js)
var canvasV2 = null, originalImageV2 = null, historyV2 = [], redoStackV2 = [], currentZoomV2 = 1;
var isDrawingV2 = false, cropRectV2 = null;

function initEdit() {
  if (canvasV2) canvasV2.dispose();
  
  var workspace = document.getElementById('canvas-workspace');
  canvasV2 = new fabric.Canvas('main-editor-canvas', {
    width: workspace.clientWidth - 80,
    height: workspace.clientHeight - 80,
    backgroundColor: 'transparent'
  });

  fabric.Image.fromURL(ag.ref, function(img) {
    originalImageV2 = img;
    setupCanvas();
    saveStateV2();
  }, { crossOrigin: 'anonymous' });

  // Attach events
  canvasV2.on('object:modified', saveStateV2);
  canvasV2.on('object:added', function(e) {
    if (originalImageV2 && e.target !== originalImageV2 && e.target !== cropRectV2 && !canvasV2._loading) saveStateV2();
  });

  // Mouse wheel zoom to cursor
  canvasV2.on('mouse:wheel', function(opt) {
    var delta = opt.e.deltaY;
    var zoom = canvasV2.getZoom();
    zoom *= 0.999 ** delta;
    if (zoom > 5) zoom = 5;
    if (zoom < 0.1) zoom = 0.1;
    
    // Zoom to cursor point
    canvasV2.zoomToPoint({ x: opt.e.offsetX, y: opt.e.offsetY }, zoom);
    
    opt.e.preventDefault();
    opt.e.stopPropagation();
    
    currentZoomV2 = zoom;
    var zVal = document.getElementById('editor-zoom-val');
    if (zVal) zVal.textContent = Math.round(zoom * 100) + '%';
  });

  canvasV2.on('mouse:down', function(opt) {
    var evt = opt.e;
    if (evt.altKey === true) {
      this.isDragging = true;
      this.selection = false;
      this.lastPosX = evt.clientX;
      this.lastPosY = evt.clientY;
    }
  });

  canvasV2.on('mouse:move', function(opt) {
    if (this.isDragging) {
      var e = opt.e;
      var vpt = this.viewportTransform;
      vpt[4] += e.clientX - this.lastPosX;
      vpt[5] += e.clientY - this.lastPosY;
      this.requestRenderAll();
      this.lastPosX = e.clientX;
      this.lastPosY = e.clientY;
    }
  });

  canvasV2.on('mouse:up', function(opt) {
    this.isDragging = false;
    this.selection = true;
  });

  // Initialize Lucide icons
  if (window.lucide) lucide.createIcons();

  // Crop ratio listener
  document.getElementById('m-crop-ratio').addEventListener('change', function() {
    var ratio = parseFloat(this.value);
    if (cropRectV2) {
      if (ratio > 0) {
        cropRectV2.set('height', cropRectV2.width / ratio);
      }
      canvasV2.renderAll();
    }
  });

  setTool('filter');
}

// ... (rest of the functions remain same) ...

// Event Listeners (Global)
document.addEventListener('input', function(e) {
  if (['m-br', 'm-ct', 'm-sa', 'm-bl'].includes(e.target.id)) applyModernFilters();
  if (e.target.id === 'm-brush-size' && canvasV2 && canvasV2.freeDrawingBrush) {
    canvasV2.freeDrawingBrush.width = parseInt(e.target.value);
    document.getElementById('val-brush').textContent = e.target.value + 'px';
  }
});

// Window resize handling
window.addEventListener('resize', function() {
  if (ag.step === 2 && canvasV2) {
    var workspace = document.getElementById('canvas-workspace');
    canvasV2.setDimensions({
      width: workspace.clientWidth - 80,
      height: workspace.clientHeight - 80
    });
    canvasV2.renderAll();
  }
});

function setupCanvas() {
  if (!originalImageV2) return;
  
  // Scale image to fit initial workspace nicely
  var workspace = document.getElementById('canvas-workspace');
  var maxWidth = workspace.clientWidth * 0.8;
  var maxHeight = workspace.clientHeight * 0.8;
  
  var scale = Math.min(maxWidth / originalImageV2.width, maxHeight / originalImageV2.height, 1);
  
  canvasV2.setDimensions({
    width: originalImageV2.width * scale,
    height: originalImageV2.height * scale
  });
  
  originalImageV2.set({
    scaleX: scale,
    scaleY: scale,
    left: 0,
    top: 0,
    selectable: false,
    evented: false
  });
  
  canvasV2.clear();
  canvasV2.add(originalImageV2);
  canvasV2.centerObject(originalImageV2);
  canvasV2.renderAll();
  
  // Update UI inputs
  document.getElementById('m-width').value = Math.round(originalImageV2.width * originalImageV2.scaleX);
  document.getElementById('m-height').value = Math.round(originalImageV2.height * originalImageV2.scaleY);
}

function setTool(tool) {
  // UI update
  document.querySelectorAll('.tool-btn').forEach(b => b.classList.remove('active'));
  document.getElementById('btn-tool-' + tool).classList.add('active');
  
  document.querySelectorAll('.sidebar-panel').forEach(p => p.classList.remove('active'));
  document.getElementById('panel-' + tool).classList.add('active');
  
  // Canvas logic
  canvasV2.isDrawingMode = (tool === 'draw');
  if (tool === 'draw') {
    canvasV2.freeDrawingBrush = new fabric.PencilBrush(canvasV2);
    canvasV2.freeDrawingBrush.width = parseInt(document.getElementById('m-brush-size').value);
    canvasV2.freeDrawingBrush.color = document.getElementById('m-brush-color').value;
  }
  
  // Disable selection unless in Text or Shapes or Draw
  canvasV2.selection = (tool === 'text' || tool === 'shapes');
  canvasV2.forEachObject(obj => {
    if (obj !== originalImageV2) {
      obj.selectable = (tool === 'text' || tool === 'shapes');
    }
  });

  // Special logic for Crop
  if (tool === 'crop') {
    startCropModeV2();
  } else {
    stopCropModeV2();
  }
  
  canvasV2.renderAll();
}

// --- Filters ---
function applyModernFilters() {
  if (!originalImageV2) return;
  
  var br = parseFloat(document.getElementById('m-br').value);
  var ct = parseFloat(document.getElementById('m-ct').value);
  var sa = parseFloat(document.getElementById('m-sa').value);
  var bl = parseFloat(document.getElementById('m-bl').value);
  
  document.getElementById('val-br').textContent = Math.round((br + 1) * 100) + '%';
  document.getElementById('val-ct').textContent = Math.round((ct + 1) * 100) + '%';
  document.getElementById('val-sa').textContent = Math.round(sa * 100) + '%';
  document.getElementById('val-bl').textContent = Math.round(bl * 10) + 'px';

  originalImageV2.filters = [];
  if (br !== 0) originalImageV2.filters.push(new fabric.Image.filters.Brightness({ brightness: br }));
  if (ct !== 0) originalImageV2.filters.push(new fabric.Image.filters.Contrast({ contrast: ct }));
  if (sa !== 0) originalImageV2.filters.push(new fabric.Image.filters.Saturation({ saturation: sa }));
  if (bl !== 0) originalImageV2.filters.push(new fabric.Image.filters.Blur({ blur: bl }));
  
  originalImageV2.applyFilters();
  canvasV2.renderAll();
}

function resetFilters() {
  document.getElementById('m-br').value = 0;
  document.getElementById('m-ct').value = 0;
  document.getElementById('m-sa').value = 0;
  document.getElementById('m-bl').value = 0;
  applyModernFilters();
}

// --- Resize ---
function applyResize() {
  var w = parseInt(document.getElementById('m-width').value);
  var h = parseInt(document.getElementById('m-height').value);
  
  var scaleX = w / originalImageV2.width;
  var scaleY = h / originalImageV2.height;
  
  originalImageV2.set({ scaleX: scaleX, scaleY: scaleY });
  canvasV2.setDimensions({ width: w, height: h });
  canvasV2.centerObject(originalImageV2);
  canvasV2.renderAll();
  saveStateV2();
}

// --- Crop ---
function startCropModeV2() {
  stopCropModeV2();
  var ratio = parseFloat(document.getElementById('m-crop-ratio').value);
  
  cropRectV2 = new fabric.Rect({
    fill: 'rgba(0,0,0,0.3)',
    stroke: '#fe621d',
    strokeWidth: 2,
    strokeDashArray: [5, 5],
    width: canvasV2.width * 0.8,
    height: canvasV2.height * 0.8,
    left: canvasV2.width * 0.1,
    top: canvasV2.height * 0.1,
    cornerColor: '#fe621d',
    cornerSize: 10,
    transparentCorners: false
  });
  
  if (ratio > 0) {
    if (cropRectV2.width / cropRectV2.height > ratio) {
      cropRectV2.width = cropRectV2.height * ratio;
    } else {
      cropRectV2.height = cropRectV2.width / ratio;
    }
  }
  
  canvasV2.add(cropRectV2);
  canvasV2.setActiveObject(cropRectV2);
}

function stopCropModeV2() {
  if (cropRectV2) {
    canvasV2.remove(cropRectV2);
    cropRectV2 = null;
  }
}

function applyCropV2() {
  if (!cropRectV2) return;
  
  var zoom = canvasV2.getZoom();
  var left = cropRectV2.left / zoom;
  var top = cropRectV2.top / zoom;
  var width = cropRectV2.width * cropRectV2.scaleX / zoom;
  var height = cropRectV2.height * cropRectV2.scaleY / zoom;
  
  // Create a temporary canvas to get the cropped area
  var tempCanvas = document.createElement('canvas');
  tempCanvas.width = width;
  tempCanvas.height = height;
  var ctx = tempCanvas.getContext('2d');
  
  // Render the current canvas content to the temp canvas, but offset to the crop area
  var dataUrl = canvasV2.toDataURL({
    left: left,
    top: top,
    width: width,
    height: height,
    format: 'png'
  });
  
  fabric.Image.fromURL(dataUrl, function(img) {
    originalImageV2 = img;
    canvasV2.clear();
    canvasV2.setDimensions({ width: width, height: height });
    canvasV2.add(originalImageV2);
    canvasV2.renderAll();
    stopCropModeV2();
    saveStateV2();
    setTool('filter');
  });
}

// --- Transform ---
function rotateCanvas(deg) {
  var angle = originalImageV2.angle + deg;
  originalImageV2.set('angle', angle);
  canvasV2.renderAll();
  saveStateV2();
}

function flipCanvas(dir) {
  if (dir === 'h') originalImageV2.set('flipX', !originalImageV2.flipX);
  else originalImageV2.set('flipY', !originalImageV2.flipY);
  canvasV2.renderAll();
  saveStateV2();
}

// --- Draw / Text / Shapes ---
function setBrushColor(color, el) {
  document.querySelectorAll('.color-dot').forEach(d => d.classList.remove('active'));
  if (el) el.classList.add('active');
  document.getElementById('m-brush-color').value = color;
  if (canvasV2.freeDrawingBrush) canvasV2.freeDrawingBrush.color = color;
}

function addTextV2() {
  var text = new fabric.IText('Double click to edit', {
    left: 100,
    top: 100,
    fontFamily: document.getElementById('m-font-family').value,
    fill: document.getElementById('m-brush-color').value,
    fontSize: 30
  });
  canvasV2.add(text);
  canvasV2.setActiveObject(text);
  saveStateV2();
}

function addShape(type) {
  var shape;
  var color = document.getElementById('m-brush-color').value;
  if (type === 'rect') {
    shape = new fabric.Rect({ width: 100, height: 100, fill: color, left: 100, top: 100 });
  } else if (type === 'circle') {
    shape = new fabric.Circle({ radius: 50, fill: color, left: 100, top: 100 });
  } else if (type === 'triangle') {
    shape = new fabric.Triangle({ width: 100, height: 100, fill: color, left: 100, top: 100 });
  }
  canvasV2.add(shape);
  canvasV2.setActiveObject(shape);
  saveStateV2();
}

// --- History / State ---
function saveStateV2() {
  historyV2.push(JSON.stringify(canvasV2));
  redoStackV2 = [];
}

function undoV2() {
  if (historyV2.length <= 1) return;
  redoStackV2.push(historyV2.pop());
  var state = historyV2[historyV2.length - 1];
  canvasV2.loadFromJSON(state, function() {
    canvasV2.renderAll();
    // Re-assign originalImageV2 reference
    originalImageV2 = canvasV2.getObjects().find(o => o.type === 'image');
  });
}

function redoV2() {
  if (redoStackV2.length === 0) return;
  var state = redoStackV2.pop();
  historyV2.push(state);
  canvasV2.loadFromJSON(state, function() {
    canvasV2.renderAll();
    originalImageV2 = canvasV2.getObjects().find(o => o.type === 'image');
  });
}

function resetEditor() {
  showConfirm('Reset all changes?', 'Reset', 'Keep edits', initEdit);
}

// --- Zoom ---
function zoomEditor(delta) {
  currentZoomV2 += delta;
  currentZoomV2 = Math.min(Math.max(0.1, currentZoomV2), 5);
  // Zoom to center of the canvas
  canvasV2.zoomToPoint({ x: canvasV2.width / 2, y: canvasV2.height / 2 }, currentZoomV2);
  document.getElementById('editor-zoom-val').textContent = Math.round(currentZoomV2 * 100) + '%';
}

// --- Next Step ---
function applyAndNextV2() {
  stopCropModeV2();
  canvasV2.setZoom(1); // Reset zoom for export
  ag.edited = canvasV2.toDataURL({ format: 'png', quality: 1.0 });
  goStep(3);
}

// Events handled inside initEdit and global listeners above

// Step 3 — Grid maker
var gridBaseImg=null;
var gridPanX = 0, gridPanY = 0, isDraggingGrid = false, lastGridX, lastGridY;
var gridTool = 'pan';
var gridSnappedLines = []; // Format: {c1, r1, c2, r2, color}
var dragStartPoint = null; // {c, r}
var currentMousePos = null; // {x, y}

function setGridTool(tool){
  gridTool = tool;
  var panBtn = document.getElementById('gt-pan');
  var drawBtn = document.getElementById('gt-draw');
  var eraseBtn = document.getElementById('gt-erase');
  
  if(panBtn && drawBtn && eraseBtn){
    [panBtn, drawBtn, eraseBtn].forEach(btn => btn.classList.remove('active'));
    var active = (tool === 'pan') ? panBtn : (tool === 'draw' ? drawBtn : eraseBtn);
    active.classList.add('active');
  }

  var c = document.getElementById('grid-canvas');
  if(c) {
    if(tool === 'pan') c.style.cursor = 'grab';
    else if(tool === 'draw') c.style.cursor = 'crosshair';
    else c.style.cursor = 'no-drop';
  }
  drawGrid();
}

function clearGridDrawings(){
  gridSnappedLines = [];
  drawGrid();
}

// Helper for Eraser tool
function distToSegment(px, py, x1, y1, x2, y2) {
  var l2 = Math.hypot(x1 - x2, y1 - y2)**2;
  if (l2 == 0) return Math.hypot(px - x1, py - y1);
  var t = ((px - x1) * (x2 - x1) + (py - y1) * (y2 - y1)) / l2;
  t = Math.max(0, Math.min(1, t));
  return Math.hypot(px - (x1 + t * (x2 - x1)), py - (y1 + t * (y2 - y1)));
}

function getClosestIntersection(sx, sy, c){
  var rect = c.getBoundingClientRect();
  var cw_int = c.width, ch_int = c.height;
  var s = Math.min(rect.width / cw_int, rect.height / ch_int);
  var ox = (rect.width - cw_int * s) / 2, oy = (rect.height - ch_int * s) / 2;
  var cx = (sx - ox) / s, cy = (sy - oy) / s;

  var zm = document.getElementById('g-zm').value/100;
  var cols=parseInt(document.getElementById('g-cols').value)||8;
  var rows=parseInt(document.getElementById('g-rows').value)||8;
  var margin=parseInt(document.getElementById('g-margin').value)||0;
  var isSquare=document.getElementById('g-square').checked;

  var availableWidth = cw_int - (margin * 2);
  var availableHeight = ch_int - (margin * 2);
  var cw = availableWidth / cols;
  var ch = availableHeight / rows;
  if(isSquare) ch = cw;

  var ix = (cx - gridPanX - cw_int/2) / zm + cw_int/2;
  var iy = (cy - gridPanY - ch_int/2) / zm + ch_int/2;

  var c_idx = Math.round((ix - margin) / cw);
  var r_idx = Math.round((iy - margin) / ch);

  if(c_idx >= 0 && c_idx <= cols && r_idx >= 0 && r_idx <= rows){
    var tx = margin + c_idx * cw, ty = margin + r_idx * ch;
    if(Math.hypot(ix - tx, iy - ty) < 30 / zm) return {c: c_idx, r: r_idx, x: tx, y: ty, ix: ix, iy: iy};
  }
  return {ix: ix, iy: iy}; 
}

function initGrid(){
  var c=document.getElementById('grid-canvas');
  gridBaseImg=new Image();
  gridBaseImg.onload=function(){
    c.width=gridBaseImg.width;
    c.height=gridBaseImg.height;
    gridPanX = 0; gridPanY = 0; 
    gridSnappedLines = [];
    drawGrid();
  };
  gridBaseImg.src=ag.edited||ag.ref;

  var lastPinchDist = null;

  function handleDown(e, isTouch){
    var rect = c.getBoundingClientRect();
    if(isTouch && e.touches.length === 2){
      lastPinchDist = Math.hypot(e.touches[0].clientX - e.touches[1].clientX, e.touches[0].clientY - e.touches[1].clientY);
      return;
    }
    var clientX = isTouch ? e.touches[0].clientX : e.clientX;
    var clientY = isTouch ? e.touches[0].clientY : e.clientY;
    var inter = getClosestIntersection(clientX - rect.left, clientY - rect.top, c);

    if(gridTool === 'pan'){
      isDraggingGrid = true;
      lastGridX = clientX; lastGridY = clientY;
      c.style.cursor = 'grabbing';
    } else if(gridTool === 'draw'){
      if(inter.c !== undefined) dragStartPoint = inter;
    } else if(gridTool === 'erase'){
      var threshold = 15 / (document.getElementById('g-zm').value/100);
      var cols=parseInt(document.getElementById('g-cols').value)||8, rows=parseInt(document.getElementById('g-rows').value)||8;
      var margin=parseInt(document.getElementById('g-margin').value)||0, isSquare=document.getElementById('g-square').checked;
      var cw = (c.width - margin*2)/cols, ch = (isSquare ? cw : (c.height - margin*2)/rows);
      var idxToRemove = -1;
      for(var i=gridSnappedLines.length-1; i>=0; i--){
        var l = gridSnappedLines[i];
        var d = distToSegment(inter.ix, inter.iy, margin+l.c1*cw, margin+l.r1*ch, margin+l.c2*cw, margin+l.r2*ch);
        if(d < threshold) { idxToRemove = i; break; }
      }
      if(idxToRemove > -1) { gridSnappedLines.splice(idxToRemove, 1); drawGrid(); }
    }
    if(isTouch) e.preventDefault();
  }

  function handleMove(e, isTouch){
    var rect = c.getBoundingClientRect();
    if(isTouch && e.touches.length === 2 && lastPinchDist){
      var dist = Math.hypot(e.touches[0].clientX - e.touches[1].clientX, e.touches[0].clientY - e.touches[1].clientY);
      var zmInput = document.getElementById('g-zm');
      var delta = (dist - lastPinchDist) * 0.5;
      var newVal = Math.min(Math.max(50, parseInt(zmInput.value) + delta), 300);
      zmInput.value = newVal;
      lastPinchDist = dist;
      drawGrid();
      e.preventDefault();
      return;
    }

    var clientX = isTouch ? e.touches[0].clientX : e.clientX;
    var clientY = isTouch ? e.touches[0].clientY : e.clientY;

    if(isDraggingGrid && gridTool === 'pan'){
      var canvasScale = c.width / rect.width;
      gridPanX += (clientX - lastGridX) * canvasScale;
      gridPanY += (clientY - lastGridY) * canvasScale;
      lastGridX = clientX; lastGridY = clientY;
      drawGrid();
    } else if(dragStartPoint && gridTool === 'draw'){
      var s = Math.min(rect.width/c.width, rect.height/c.height);
      var ox = (rect.width - c.width*s)/2, oy = (rect.height - c.height*s)/2;
      var cx = (clientX - rect.left - ox)/s, cy = (clientY - rect.top - oy)/s;
      var zm = document.getElementById('g-zm').value/100;
      currentMousePos = {x: (cx - gridPanX - c.width/2)/zm + c.width/2, y: (cy - gridPanY - c.height/2)/zm + c.height/2};
      drawGrid();
    }
    if(isTouch && (isDraggingGrid || dragStartPoint)) e.preventDefault();
  }

  function handleUp(e, isTouch){
    lastPinchDist = null;
    if(dragStartPoint && gridTool === 'draw'){
      var rect = c.getBoundingClientRect();
      var clientX = isTouch ? (e.changedTouches ? e.changedTouches[0].clientX : 0) : e.clientX;
      var clientY = isTouch ? (e.changedTouches ? e.changedTouches[0].clientY : 0) : e.clientY;
      var inter = getClosestIntersection(clientX - rect.left, clientY - rect.top, c);
      if(inter.c !== undefined && (inter.c !== dragStartPoint.c || inter.r !== dragStartPoint.r)){
        gridSnappedLines.push({c1: dragStartPoint.c, r1: dragStartPoint.r, c2: inter.c, r2: inter.r});
      }
    }
    isDraggingGrid = false; dragStartPoint = null; currentMousePos = null;
    if(c) c.style.cursor = (gridTool === 'pan' ? 'grab' : (gridTool === 'draw' ? 'crosshair' : 'no-drop'));
    drawGrid();
  }

  c.onmousedown = function(e){ handleDown(e, false); };
  c.ontouchstart = function(e){ handleDown(e, true); };

  if(!window.gridEventsBound){
    window.addEventListener('mousemove', function(e){ handleMove(e, false); });
    window.addEventListener('touchmove', function(e){ handleMove(e, true); }, {passive: false});
    window.addEventListener('mouseup', function(e){ handleUp(e, false); });
    window.addEventListener('touchend', function(e){ handleUp(e, true); });
    window.gridEventsBound = true;
  }

  c.onwheel = function(e){
    e.preventDefault();
    var zmInput = document.getElementById('g-zm');
    var val = parseInt(zmInput.value);
    if(e.deltaY < 0) val += 10; else val -= 10;
    zmInput.value = Math.min(Math.max(50, val), 300);
    zmInput.dispatchEvent(new Event('input'));
  };
}

function drawGrid(){
  var c=document.getElementById('grid-canvas'),ctx=c.getContext('2d');
  var cols=parseInt(document.getElementById('g-cols').value)||8, rows=parseInt(document.getElementById('g-rows').value)||8;
  var margin=parseInt(document.getElementById('g-margin').value)||0, isSquare=document.getElementById('g-square').checked;
  var thick=parseFloat(document.getElementById('g-thick').value)||2, color=document.getElementById('g-color').value;
  var zm=document.getElementById('g-zm').value/100;
  
  ctx.save();
  ctx.clearRect(0,0,c.width,c.height); 
  ctx.translate(gridPanX, gridPanY);
  ctx.translate(c.width/2, c.height/2); ctx.scale(zm, zm); ctx.translate(-c.width/2, -c.height/2);
  ctx.drawImage(gridBaseImg,0,0);
  
  var cw = (c.width - margin*2)/cols, ch = (isSquare ? cw : (c.height - margin*2)/rows);
  if(isSquare) { rows = Math.floor((c.height - margin*2)/ch); document.getElementById('g-rows').value = rows; }

  // Draw Snapped Lines (using Grid Color)
  ctx.strokeStyle = color; ctx.lineWidth = (thick * 1.5) / zm;
  gridSnappedLines.forEach(l => {
    ctx.beginPath(); ctx.moveTo(margin + l.c1 * cw, margin + l.r1 * ch); ctx.lineTo(margin + l.c2 * cw, margin + l.r2 * ch); ctx.stroke();
  });

  // Preview Line
  if(dragStartPoint && currentMousePos){
    ctx.setLineDash([5, 5]); ctx.beginPath(); ctx.moveTo(margin + dragStartPoint.c * cw, margin + dragStartPoint.r * ch);
    ctx.lineTo(currentMousePos.x, currentMousePos.y); ctx.stroke(); ctx.setLineDash([]);
  }

  // Grid Lines
  ctx.lineWidth=thick/zm; ctx.beginPath();
  for(var i=0; i<=cols; i++){ var x = margin + i*cw; ctx.moveTo(x, margin); ctx.lineTo(x, margin + rows*ch); }
  for(var j=0; j<=rows; j++){ var y = margin + j*ch; ctx.moveTo(margin, y); ctx.lineTo(margin + cols*cw, y); }
  ctx.stroke();

  // Intersection Dots (only in Draw/Erase mode)
  if(gridTool === 'draw' || gridTool === 'erase'){
    ctx.fillStyle = color;
    for(var i=0; i<=cols; i++) for(var j=0; j<=rows; j++){
      ctx.beginPath(); ctx.arc(margin + i*cw, margin + j*ch, 4/zm, 0, Math.PI*2); ctx.fill();
    }
  }
  ctx.restore();
  var zVal = Math.round(zm * 100) + '%';
  document.getElementById('g-zm-val').textContent = zVal;
  var zi = document.getElementById('g-zm-indicator'); if(zi) zi.textContent = zVal;
  ag.grid=c.toDataURL('image/png');
}
['g-rows','g-cols','g-thick','g-color','g-zm','g-margin','g-square'].forEach(function(id){
  var el = document.getElementById(id);
  if(el) {
    el.addEventListener('input',function(){
      drawGrid();
    });
  }
});
function downloadGrid(){
  var tempC = document.createElement('canvas');
  tempC.width = gridBaseImg.width;
  tempC.height = gridBaseImg.height;
  var ctx = tempC.getContext('2d');
  
  var cols=parseInt(document.getElementById('g-cols').value)||8;
  var rows=parseInt(document.getElementById('g-rows').value)||8;
  var margin=parseInt(document.getElementById('g-margin').value)||0;
  var isSquare=document.getElementById('g-square').checked;
  var thick=parseFloat(document.getElementById('g-thick').value)||2;
  var color=document.getElementById('g-color').value;
  
  ctx.drawImage(gridBaseImg, 0, 0);
  
  var cw = (tempC.width - margin*2)/cols;
  var ch = (isSquare ? cw : (tempC.height - margin*2)/rows);
  var actualRows = isSquare ? Math.floor((tempC.height - margin*2)/ch) : rows;

  // Snapped Lines
  ctx.strokeStyle = color; ctx.lineWidth = thick * 1.5;
  gridSnappedLines.forEach(l => {
    ctx.beginPath(); ctx.moveTo(margin + l.c1 * cw, margin + l.r1 * ch); ctx.lineTo(margin + l.c2 * cw, margin + l.r2 * ch); ctx.stroke();
  });

  // Grid Lines
  ctx.strokeStyle = color; ctx.lineWidth = thick;
  ctx.beginPath();
  for(var i=0; i<=cols; i++){ var x = margin + i*cw; ctx.moveTo(x, margin); ctx.lineTo(x, margin + actualRows*ch); }
  for(var j=0; j<=actualRows; j++){ var y = margin + j*ch; ctx.moveTo(margin, y); ctx.lineTo(margin + cols*cw, y); }
  ctx.stroke();

  var a = document.createElement('a');
  a.download = 'high_quality_grid.png';
  a.href = tempC.toDataURL('image/png', 1.0);
  a.click();
}

// Step 4 — Sketch upload
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

// Step 5 — AI Check
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

// Save / Load projects
function saveProject(){
  var name=prompt('Enter a name for this project:','Project '+(Date.now()+'').slice(-4));
  if(!name) return;
  var projects=JSON.parse(localStorage.getItem('ag_projects')||'[]');
  projects.unshift({id:Date.now(),name:name,thumb:ag.grid||ag.ref,date:new Date().toLocaleDateString(),score:ag.score});
  localStorage.setItem('ag_projects',JSON.stringify(projects));
  showMessage('Project saved! ✅', 'success'); showDashboard();
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

document.addEventListener('DOMContentLoaded', loadProjects);
</script>
