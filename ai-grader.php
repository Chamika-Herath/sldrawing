<?php include_once './imports/need/session_setup.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once './Meta_Tag/Meta_Tag.php'; ?>
    <title>AI Grid Drawing System | H.M.C.D. Herath</title>
</head>
<body>
    <?php 
    include_once './UxUI-Back/Needs/header.php';
    //include_once './UxUI-Back/Main/ai-grader-content.php';
    include_once './UxUI-Back/Needs/Submit_Pre_loader.php';
    ?>
    

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
    include_once './UxUI-Back/Needs/header.php';
    
    ?>


    <!--  -->
     <?php



            include_once './UxUI-Back/AIGrader/step1-upload.php';
            include_once './UxUI-Back/AIGrader/step2-edit.php';
            include_once './UxUI-Back/AIGrader/step3-grid.php';
            include_once './UxUI-Back/AIGrader/step4-drawing.php';
            include_once './UxUI-Back/AIGrader/step5-ai-check.php';




            ?>
            

  </div><!-- /wizard -->
</div><!-- /container -->
<?php
include_once './UxUI-Back/AIGrader/JS/AIGrader_JS.php';
include_once './UxUI-Back/AIGrader/JS/step1-JS.php';
include_once './UxUI-Back/AIGrader/JS/step2-JS.php';
include_once './UxUI-Back/AIGrader/JS/step3-JS.php';
include_once './UxUI-Back/AIGrader/JS/step4-JS.php';
include_once './UxUI-Back/AIGrader/JS/step5-JS.php';
?>
<?php include_once './UxUI-Back/Needs/footer.php'; ?>
</body>
</html>
