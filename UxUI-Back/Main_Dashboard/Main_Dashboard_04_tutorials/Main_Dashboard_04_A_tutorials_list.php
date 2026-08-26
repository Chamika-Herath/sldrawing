<?php 
    $pth = "../"; 
    $active_page = "tutorils"; /* Matches the ID created by the User in sidebar */
    $page_title = "Studio Tutorials · SLdrawing";
//include '../UxUI-Back/Includes/header.php'; 
?>

<style>
  /* ===================================================================
     SLdrawing Orange/Brown Premium UX - Tutorials List
     =================================================================== */
  :root{
    --sld-dark-950: #1c1917; /* stone bg */
    --sld-dark-800: #292524;
    --sld-dark-700: #44403c;
    --sld-orange-600: #ea580c;
    --sld-orange-500: #f97316;
    --sld-amber-500: #f59e0b;
    --sld-text-900: #fafaf9;
    --sld-text-600: #d6d3d1;
    --sld-text-400: #a8a29e;
    --sld-border: rgba(249, 115, 22, 0.25);
    --sld-success: #10b981;
    --sld-success-bg: rgba(16, 185, 129, 0.1);
    --sld-radius-sm: 8px;
    --sld-radius-md: 12px;
    --sld-radius-lg: 20px;
    --sld-shadow: 0 12px 32px rgba(249, 115, 22, 0.05);
    --sld-shadow-hover: 0 10px 25px rgba(249, 115, 22, 0.15);
    --sld-cubic: cubic-bezier(0.2, 0.8, 0.2, 1);
  }

  *{box-sizing:border-box;}
  html,body{margin:0;padding:0;}

  body{
    background:var(--sld-dark-950);
    font-family:'Inter',-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,sans-serif;
    color:var(--sld-text-900);
    -webkit-font-smoothing:antialiased;
  }

  .project-collection-app{
    display:grid;
    grid-template-columns:248px 1fr;
    grid-template-rows:64px 1fr;
    min-height:100vh;
    grid-template-areas:
      "sidebar topbar"
      "sidebar main";
  }

  /* ---------- Topbar ---------- */
  .project-collection-topbar{
    grid-area:topbar;
    background:rgba(28, 25, 23, 0.85); /* matching stone-950 */
    backdrop-filter: blur(12px);
    border-bottom:1px solid var(--sld-border);
    display:flex;align-items:center;justify-content:space-between;
    padding:0 30px;
    z-index: 10;
  }
  .project-collection-topbar-heading h1{
    font-family:'Poppins',Inter,sans-serif;
    font-size:19px;font-weight:600;margin:0;
    color:var(--sld-text-900);
  }
  .project-collection-topbar-heading p{margin:1px 0 0;font-size:11.5px;color:var(--sld-text-400);}
  .project-collection-topbar-actions{display:flex;align-items:center;gap:18px;}
  .project-collection-icon-btn{
    width:36px;height:36px;border-radius:50%;
    display:flex;align-items:center;justify-content:center;
    background:var(--sld-dark-800);color:var(--sld-text-600);
    border:1px solid var(--sld-border);
    cursor:pointer;transition:all .3s var(--sld-cubic);
  }
  .project-collection-icon-btn:hover{
    background:var(--sld-orange-500); transform:translateY(-2px) scale(1.05); color: var(--sld-dark-950);
    border-color:transparent;
    box-shadow: 0 0 15px rgba(249,115,22,0.4);
  }
  .project-collection-icon-btn svg{width:16px;height:16px;}

  /* ---------- Main App Window ---------- */
  .project-collection-main{
    grid-area:main;
    padding:30px 40px;
    display: flex; flex-direction: column;
    animation: fadeSlideUp 0.6s var(--sld-cubic) forwards;
  }

  @keyframes fadeSlideUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
  }

  .collection-dashboard-wrapper {
    display: flex;
    flex: 1;
    align-items: flex-start;
  }

  /* Main Panel Content */
  .collection-dashboard-content {
    flex: 1;
    background: var(--sld-dark-800);
    border-radius: var(--sld-radius-lg);
    box-shadow: var(--sld-shadow);
    overflow: hidden;
    border: 1px solid var(--sld-border);
    display: flex;
    flex-direction: column;
  }

  .collection-panel-header {
    background: linear-gradient(135deg, var(--sld-dark-700), var(--sld-dark-950));
    color: var(--sld-text-900);
    padding: 24px 34px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    position: relative;
    overflow: hidden;
    border-bottom: 1px solid var(--sld-border);
  }
  
  .collection-panel-header::before {
    content: ''; position: absolute; left: -50px; top: -50px;
    width: 250px; height: 250px; border-radius: 50%;
    background: var(--sld-orange-500); filter: blur(60px); opacity: 0.15;
    pointer-events: none;
  }

  .collection-panel-header h2 {
    margin: 0;
    font-family: 'Poppins', Inter, sans-serif;
    font-size: 22px;
    font-weight: 600;
    letter-spacing: 0.01em;
    position: relative;
    z-index: 2;
  }

  .collection-panel-close {
    width: 32px; height: 32px; border-radius: 50%;
    border: 1px solid rgba(255,255,255,0.1);
    background: transparent; color: var(--sld-text-600);
    display: flex; align-items: center; justify-content: center;
    cursor: pointer; transition: all .3s var(--sld-cubic);
    position: relative; z-index: 2;
  }

  .collection-panel-close:hover {
    background: rgba(255,255,255,0.1); transform: rotate(90deg) scale(1.1); color: #fff;
  }

  /* Inside panel body */
  .collection-panel-body {
    padding: 30px 40px 40px;
    background: var(--sld-dark-800);
    position: relative;
  }

  .collection-breadcrumb {
    font-size: 13px; color: var(--sld-text-400); margin-bottom: 30px;
    display: flex; gap: 8px; align-items: center; justify-content: space-between;
  }
  .breadcrumb-path {
    background: var(--sld-dark-700);
    padding: 10px 16px;
    border-radius: var(--sld-radius-sm);
    border: 1px solid rgba(255,255,255,0.05);
    display: flex; gap: 8px; align-items: center;
  }
  .breadcrumb-path span.active-crumb {
    color: var(--sld-orange-500); font-weight: 600;
  }

  /* Toolbar Actions */
  .tutorial-toolbar {
    display: flex;
    gap: 12px;
    align-items: center;
  }
  .filter-select {
    background: var(--sld-dark-950);
    border: 1px solid rgba(255,255,255,0.1);
    color: var(--sld-text-600);
    padding: 10px 16px;
    border-radius: 8px;
    font-size: 13px;
    outline: none;
    cursor: pointer;
    appearance: none;
  }
  .btn-primary {
    background: var(--sld-orange-500);
    color: var(--sld-dark-950);
    border: none;
    padding: 10px 20px;
    border-radius: 50px;
    font-weight: 700;
    font-size: 13px;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
  }
  .btn-primary:hover {
    background: var(--sld-orange-600);
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(249,115,22,0.3);
  }

  /* Tutorial List Layout (Horizontal video cards) */
  .tutorial-list-container {
    display: flex;
    flex-direction: column;
    gap: 16px;
  }

  .tutorial-card {
    display: flex;
    flex-direction: row;
    background: var(--sld-dark-950);
    border: 1px solid var(--sld-border);
    border-radius: var(--sld-radius-md);
    padding: 16px;
    gap: 24px;
    align-items: center;
    transition: all 0.3s var(--sld-cubic);
    animation: fadeSlideUp 0.4s var(--sld-cubic) both;
  }
  
  .tutorial-card:nth-child(1) { animation-delay: 0.1s; }
  .tutorial-card:nth-child(2) { animation-delay: 0.15s; }
  .tutorial-card:nth-child(3) { animation-delay: 0.2s; }
  
  .tutorial-card:hover {
    background: rgba(41, 37, 36, 0.9);
    border-color: var(--sld-orange-500);
    transform: translateX(4px);
    box-shadow: var(--sld-shadow-hover);
  }

  /* Thumbnail Area */
  .tutorial-thumb-container {
    width: 220px;
    height: 125px;
    border-radius: var(--sld-radius-sm);
    background-size: cover;
    background-position: center;
    position: relative;
    flex-shrink: 0;
    background-color: var(--sld-dark-700);
    overflow: hidden;
  }
  .tutorial-duration {
    position: absolute;
    bottom: 8px;
    right: 8px;
    background: rgba(0,0,0,0.8);
    color: #fff;
    padding: 3px 6px;
    border-radius: 4px;
    font-size: 11px;
    font-weight: 600;
    font-variant-numeric: tabular-nums;
  }
  
  /* Play overlay */
  .tutorial-play-overlay {
    position: absolute;
    top: 50%; left: 50%;
    transform: translate(-50%, -50%);
    width: 36px; height: 36px;
    border-radius: 50%;
    background: rgba(249, 115, 22, 0.85); /* orange */
    display: flex; align-items: center; justify-content: center;
    opacity: 0;
    transition: all 0.3s ease;
    backdrop-filter: blur(2px);
  }
  .tutorial-card:hover .tutorial-play-overlay {
    opacity: 1; transform: translate(-50%, -50%) scale(1.1);
  }
  .tutorial-play-overlay svg { width: 14px; height: 14px; color: #fff; fill: #fff; margin-left: 2px; }

  /* Info Area */
  .tutorial-info {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
  }
  .tutorial-title {
    font-size: 17px;
    font-weight: 700;
    color: var(--sld-text-900);
    margin-bottom: 6px;
    line-height: 1.3;
  }
  .tutorial-desc {
    font-size: 13px;
    color: var(--sld-text-400);
    margin-bottom: 14px;
    line-height: 1.5;
    max-width: 600px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;  
    overflow: hidden;
  }

  /* Info Meta Data */
  .tutorial-meta {
    display: flex;
    align-items: center;
    gap: 16px;
    font-size: 12px;
  }
  .tutorial-badge {
    padding: 4px 10px;
    border-radius: 50px;
    font-weight: 700;
    font-size: 10px;
    text-transform: uppercase;
    letter-spacing: 0.05em;
  }
  .badge-beginner { background: rgba(59, 130, 246, 0.15); color: #60a5fa; border: 1px solid rgba(59, 130, 246, 0.2); }
  .badge-intermediate { background: rgba(249, 115, 22, 0.15); color: var(--sld-orange-500); border: 1px solid rgba(249, 115, 22, 0.2); }
  
  .tutorial-stat {
    display: flex;
    align-items: center;
    gap: 4px;
    color: var(--sld-text-600);
  }
  .tutorial-stat svg { width: 14px; height: 14px; }

  /* Actions Area */
  .tutorial-actions {
    display: flex;
    flex-direction: column;
    gap: 8px;
    padding-left: 16px;
    border-left: 1px solid rgba(255,255,255,0.05);
  }
  .action-btn-circle {
    width: 38px; height: 38px;
    border-radius: 50%;
    background: var(--sld-dark-800);
    color: var(--sld-text-400);
    display: flex; align-items: center; justify-content: center;
    border: 1px solid rgba(255,255,255,0.05);
    cursor: pointer;
    transition: all 0.2s ease;
  }
  .action-btn-circle:hover {
    background: var(--sld-orange-500); color: var(--sld-dark-950);
    border-color: var(--sld-orange-500);
  }

  /* Responsive Cards */
  @media (max-width: 900px) {
    .tutorial-card { flex-direction: column; align-items: stretch; gap: 16px; }
    .tutorial-thumb-container { width: 100%; height: 180px; }
    .tutorial-actions { flex-direction: row; border-left: none; padding-left: 0; padding-top: 12px; border-top: 1px solid rgba(255,255,255,0.05); }
  }

</style>

<div data-page="project" id="Main_Dashboard_04_A">

<div class="project-collection-app">

  <!-- Uses Global Sidebar -->
  <?php include "../UxUI-Back/Includes/Main_dashboard_sidebar.php"; ?>
 

  <!-- ================= TOPBAR ================= -->
  <header class="project-collection-topbar">
    <div class="project-collection-topbar-heading">
      <h1>Studio Tutorials</h1>
      <p>Manage courses & guides</p>
    </div>
    <div class="project-collection-topbar-actions">
      <button class="project-collection-icon-btn" title="Notifications">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M6 10a6 6 0 1 1 12 0c0 4 1.5 5.5 1.5 5.5H4.5S6 14 6 10Z"/><path d="M10 19a2 2 0 0 0 4 0"/></svg>
      </button>
      <button class="project-collection-icon-btn" title="Sign out">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M9 4H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h3"/><path d="M15 8l4 4-4 4M19 12H9"/></svg>
      </button>
    </div>
  </header>

  <!-- ================= MAIN ================= -->
  <main class="project-collection-main">
    
    <div class="collection-dashboard-wrapper">

        <!-- Right Content Panel -->
        <section class="collection-dashboard-content">
            
            <div class="collection-panel-header">
                <h2 id="dashboard_summary_header">Learning Materials</h2>
                <button class="collection-panel-close" title="Close" onclick="window.history.back()">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                </button>
            </div>

            <div class="collection-panel-body">
                <div class="collection-breadcrumb">
                    <div class="breadcrumb-path">
                        Dashboard <span style="color:var(--sld-text-600)">/</span> <span class="active-crumb">Tutorials</span>
                    </div>
                    <div class="tutorial-toolbar">
                        <select class="filter-select">
                            <option>All Types</option>
                            <option>Grid Drawing</option>
                            <option>Digital Coloring</option>
                            <option>Anatomy Tips</option>
                        </select>
                        <button class="btn-primary" onclick="Main_Dashboard_04_B_OPEN()">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                            Upload Tutorial
                        </button>
                    </div>
                </div>

                <!-- Tutorials List Display -->
                <div class="tutorial-list-container">
                    
                    <!-- Tutorial Item 1 -->
                    <div class="tutorial-card">
                        <div class="tutorial-thumb-container" style="background-image: url('../../../assets/images/tutorial_portrait_1773936991179.webp');">
                            <div class="tutorial-play-overlay"><svg viewBox="0 0 24 24"><polygon points="5 3 19 12 5 21 5 3"/></svg></div>
                            <div class="tutorial-duration">45:20</div>
                        </div>
                        <div class="tutorial-info">
                            <div class="tutorial-title">Mastering Face Proportions</div>
                            <div class="tutorial-desc">Learn the classical Grid Drawing methods for achieving perfect facial proportions every time. A step-by-step masterclass with Chamika Herath.</div>
                            <div class="tutorial-meta">
                                <span class="tutorial-badge badge-beginner">Beginner</span>
                                <span class="tutorial-stat"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg> 2.4K views</span>
                                <span class="tutorial-stat" style="color:var(--sld-success);"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg> Published</span>
                            </div>
                        </div>
                        <div class="tutorial-actions">
                            <button class="action-btn-circle" title="Edit Tutorial"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg></button>
                            <button class="action-btn-circle" title="View Analytics"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></button>
                        </div>
                    </div>

                    <!-- Tutorial Item 2 -->
                    <div class="tutorial-card">
                        <div class="tutorial-thumb-container" style="background-image: url('../../../assets/images/tutorial_coloring_1773937010332.webp'); background-color: var(--sld-dark-700);">
                            <div class="tutorial-play-overlay"><svg viewBox="0 0 24 24"><polygon points="5 3 19 12 5 21 5 3"/></svg></div>
                            <div class="tutorial-duration">1:12:05</div>
                        </div>
                        <div class="tutorial-info">
                            <div class="tutorial-title">Digital Coloring & Shading Styles</div>
                            <div class="tutorial-desc">Deep dive into digital mixing techniques, establishing ambient light sources, and choosing dynamic shadow colors for concept art.</div>
                            <div class="tutorial-meta">
                                <span class="tutorial-badge badge-intermediate">Intermediate</span>
                                <span class="tutorial-stat"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg> 512 views</span>
                                <span class="tutorial-stat" style="color:var(--sld-success);"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg> Published</span>
                            </div>
                        </div>
                        <div class="tutorial-actions">
                            <button class="action-btn-circle" title="Edit Tutorial"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg></button>
                            <button class="action-btn-circle" title="View Analytics"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></button>
                        </div>
                    </div>

                    <!-- Tutorial Item 3 -->
                    <div class="tutorial-card">
                        <div class="tutorial-thumb-container" style="background-image: url('../../../assets/images/shark1.webp'); background-color: var(--sld-dark-700);">
                            <div class="tutorial-play-overlay"><svg viewBox="0 0 24 24"><polygon points="5 3 19 12 5 21 5 3"/></svg></div>
                            <div class="tutorial-duration">28:15</div>
                        </div>
                        <div class="tutorial-info">
                            <div class="tutorial-title">Anatomy of Action Poses</div>
                            <div class="tutorial-desc">Learn how to sketch dynamic action figures quickly with clear lines of action, weight distribution, and foreshortening basics.</div>
                            <div class="tutorial-meta">
                                <span class="tutorial-badge badge-intermediate" style="background:rgba(147, 51, 234, 0.15); color: #c084fc; border-color: rgba(147, 51, 234, 0.2);">Advanced</span>
                                <span class="tutorial-stat"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg> --</span>
                                <span class="tutorial-stat" style="color:var(--sld-text-400);"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg> Draft</span>
                            </div>
                        </div>
                        <div class="tutorial-actions">
                            <button class="action-btn-circle" title="Edit Tutorial"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg></button>
                            <button class="action-btn-circle" title="View Analytics"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="20" x2="18" y2="10"/><line x1="12" y1="20" x2="12" y2="4"/><line x1="6" y1="20" x2="6" y2="14"/></svg></button>
                        </div>
                    </div>

                </div>

            </div>

<?php 
// Include specific JS script corresponding to this UI for AJAX processing
if (file_exists('JS/Main_Dashboard_04_A_tutorials_list_JS.php')) {
    include_once 'JS/Main_Dashboard_04_A_tutorials_list_JS.php';
}
?>
            
        </section>
        
    </div>

    <p style="text-align:center;font-size:12px;color:var(--sld-text-600);padding-top:24px; font-weight: 500;">
       &copy; 2026 Chamika Herath — <span style="font-weight: 700; color: var(--sld-orange-500);">Heraforce</span>
    </p>
  </main>

</div>

</div>
