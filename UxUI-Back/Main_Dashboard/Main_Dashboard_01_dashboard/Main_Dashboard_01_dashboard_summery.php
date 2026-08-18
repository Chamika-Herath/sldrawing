<?php 
    $pth = "../"; 
    $active_page = "project-collection"; 
    $page_title = "Studio Dashboard · SLdrawing";
//include '../UxUI-Back/Includes/header.php'; 
?>

<style>
  /* ===================================================================
     SLdrawing Orange/Brown Premium UX - Dashboard Summary
     =================================================================== */
  :root{
    --sld-dark-950: #1c1917; /* stone bg */
    --sld-dark-800: #292524;
    --sld-dark-700: #44403c;
    --sld-orange-600: #ea580c;
    --sld-orange-500: #f97316;
    --sld-amber-500: #f59e0b;
    --sld-amber-800: #92400e;
    --sld-text-900: #fafaf9;
    --sld-text-600: #d6d3d1;
    --sld-text-400: #a8a29e;
    --sld-border: rgba(249, 115, 22, 0.25);
    --sld-danger: #ef4444;
    --sld-danger-bg: rgba(239, 68, 68, 0.1);
    --sld-radius-sm: 12px;
    --sld-radius-lg: 24px;
    --sld-shadow: 0 12px 32px rgba(249, 115, 22, 0.05);
    --sld-shadow-sm: 0 4px 12px rgba(0, 0, 0, 0.3);
    --sld-shadow-glow: 0 20px 40px rgba(249, 115, 22, 0.15);
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
    font-size: 13px; color: var(--sld-text-400); margin-bottom: 24px;
    display: flex; gap: 8px; align-items: center;
    background: var(--sld-dark-700);
    padding: 10px 16px;
    border-radius: var(--sld-radius-sm);
    border: 1px solid rgba(255,255,255,0.05);
  }
  .collection-breadcrumb span.active-crumb {
    color: var(--sld-orange-500); font-weight: 600;
  }

  /* =========================================================
     Premium Bento UX Grid 
     ========================================================= */
  .collection-summary-card {
    background: var(--sld-dark-950);
    border-radius: var(--sld-radius-lg);
    padding: 34px;
    display: flex;
    gap: 40px;
    border: 1px solid var(--sld-border);
    align-items: stretch;
  }

  /* Left Image block */
  .collection-summary-img-box {
    width: 280px;
    background: var(--sld-dark-700);
    border-radius: 16px;
    flex-shrink: 0;
    box-shadow: 0 12px 24px rgba(0,0,0,0.4);
    position: relative;
    overflow: hidden;
    transition: transform 0.4s var(--sld-cubic);
  }
  .collection-summary-img-box:hover {
    transform: translateY(-4px) scale(1.02);
    box-shadow: 0 15px 35px rgba(249,115,22,0.25);
  }
  .collection-summary-img-box::after {
    content: '';
    position: absolute;
    top:0; left:0; right:0; bottom:0;
    background: linear-gradient(180deg, transparent 30%, rgba(28,25,23,0.9) 100%);
  }

  /* Cover title overlay over the image */
  .collection-img-title {
    position: absolute;
    bottom: 20px; left: 20px; right: 20px;
    color: var(--sld-text-900);
    z-index: 2;
  }
  .collection-img-title span {
    font-size: 11px; font-weight: 700; letter-spacing: 0.05em; text-transform: uppercase;
    color: var(--sld-orange-500); display: block; margin-bottom: 4px;
  }
  .collection-img-title h3 {
    margin: 0; font-family: 'Poppins', Inter, sans-serif; font-size: 20px; font-weight: 600;
    line-height: 1.2;
    text-shadow: 0 2px 4px rgba(0,0,0,0.8);
  }

  /* Right Details block */
  .collection-summary-details {
    flex: 1;
    display: flex;
    flex-direction: column;
  }

  /* Bento Grid for Metrics */
  .collection-bento-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
  }
  /* Animation setup for staggered entrance */
  .bento-stagger {
    animation: fadeSlideUp 0.6s var(--sld-cubic) forwards;
    opacity: 0; transform: translateY(20px);
  }
  .bento-delay-1 { animation-delay: 0.1s; }
  .bento-delay-2 { animation-delay: 0.2s; }
  .bento-delay-3 { animation-delay: 0.3s; }
  .bento-delay-4 { animation-delay: 0.4s; }
  .bento-delay-5 { animation-delay: 0.5s; }

  /* KPI Card Styling */
  .collection-kpi-card {
    background: var(--sld-dark-700);
    border: 1px solid rgba(255,255,255,0.05);
    border-radius: 16px;
    padding: 24px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    position: relative;
    overflow: hidden;
    transition: all 0.4s var(--sld-cubic);
    box-shadow: 0 4px 12px rgba(0,0,0,0.2);
  }
  .collection-kpi-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--sld-shadow-glow);
    border-color: var(--sld-border);
  }

  /* Icon wrapping */
  .kpi-icon {
    width: 44px; height: 44px; border-radius: 12px;
    display: flex; align-items: center; justify-content: center;
    margin-bottom: 20px;
  }
  .kpi-icon svg { width: 22px; height: 22px; }

  /* Color variations for Icons */
  .kpi-icon-orange { background: rgba(249, 115, 22, 0.15); color: var(--sld-orange-500); }
  .kpi-icon-amber { background: rgba(245, 158, 11, 0.15); color: var(--sld-amber-500); }
  .kpi-icon-yellow { background: rgba(234, 179, 8, 0.15); color: #eab308; }
  .kpi-icon-green { background: rgba(16, 185, 129, 0.1); color: #34d399; }
  .kpi-icon-alert { background: var(--sld-danger-bg); color: var(--sld-danger); } 

  .collection-kpi-label {
    font-size: 13px; font-weight: 600; color: var(--sld-text-400);
    text-transform: uppercase; letter-spacing: 0.05em;
    margin-bottom: 8px;
  }
  .collection-kpi-value {
    font-size: 28px; font-weight: 800; color: var(--sld-text-900);
    letter-spacing: -0.02em; font-family: 'Inter', sans-serif;
  }
  
  /* Make the Total Members card span 2 columns */
  .collection-kpi-card.full-span {
    grid-column: 1 / -1;
    background: linear-gradient(135deg, var(--sld-dark-800) 0%, var(--sld-dark-950) 100%);
    border: 1px solid var(--sld-border);
  }
  .collection-kpi-card.full-span:hover {
    box-shadow: 0 20px 48px rgba(249, 115, 22, 0.25);
    transform: translateY(-5px);
  }
  .collection-kpi-card.full-span .collection-kpi-label { color: var(--sld-orange-500); }
  .collection-kpi-card.full-span .collection-kpi-value { color: var(--sld-text-900); font-size: 34px; }
  .collection-kpi-card.full-span .kpi-icon { background: rgba(249,115,22,0.2); color: var(--sld-orange-500); }

  /* Abstract graphic for the full span card */
  .collection-kpi-card.full-span::before {
    content: ''; position: absolute; right: -20px; bottom: -40px;
    width: 150px; height: 150px; border-radius: 50%;
    background: var(--sld-orange-500); filter: blur(40px); opacity: 0.15;
    pointer-events: none;
  }

  /* Responsive tweaks */
  @media (max-width: 1100px) {
    .collection-summary-card { flex-direction: column; align-items: stretch; }
    .collection-summary-img-box { width: 100%; height: 280px; }
  }
  @media (max-width: 600px) {
    .collection-bento-grid { grid-template-columns: 1fr; }
  }

</style>

<div data-page="project" id="Main_Dashboard_01_A">

<div class="project-collection-app">

  <!-- Uses Global Sidebar created by User -->
  <?php include "../UxUI-Back/Includes/Main_dashboard_sidebar.php"; ?>
 

  <!-- ================= TOPBAR ================= -->
  <header class="project-collection-topbar">
    <div class="project-collection-topbar-heading">
      <h1>Studio Dashboard</h1>
      <p>Data & Community Insights Control</p>
    </div>
    <div class="project-collection-topbar-actions">
      <button class="project-collection-icon-btn" title="Notifications">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M6 10a6 6 0 1 1 12 0c0 4 1.5 5.5 1.5 5.5H4.5S6 14 6 10Z"/><path d="M10 19a2 2 0 0 0 4 0"/></svg>
      </button>
      <button class="project-collection-icon-btn" title="Messages">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3.5 6 8.5 6.5L20.5 6"/></svg>
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
                <h2 id="dashboard_summary_header">Analytics Overview</h2>
                <button class="collection-panel-close" title="Close" onclick="window.history.back()">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                </button>
            </div>

            <div class="collection-panel-body">
                <div class="collection-breadcrumb">
                    Dashboard <span style="color:var(--sld-text-600)">/</span> <span class="active-crumb">Summary</span>
                </div>

                <div class="collection-summary-card">
                    
                    <!-- Left beautiful visual box -->
                    <div class="collection-summary-img-box bento-stagger" id="dashboard_img_box" style="background: url('../../assets/images/portrait_hero_new.webp') center/cover no-repeat; background-color: var(--sld-dark-700);">
                       <div class="collection-img-title">
                           <span id="dashboard_collection_id_label">Platform Metrics</span>
                           <h3 id="dashboard_project_name">SLdrawing Community</h3>
                       </div>
                    </div>

                    <!-- Right Metrics Bento Grid -->
                    <div class="collection-summary-details">
                        
                        <!-- Main 3-block layout via grid -->
                        <div class="collection-bento-grid">
                            
                            <!-- Total Members -->
                            <div class="collection-kpi-card full-span bento-stagger bento-delay-1">
                                <div class="kpi-icon">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                                </div>
                                <div class="collection-kpi-label">Total Members Registered</div>
                                <div class="collection-kpi-value"><span id="dashboard_kpi_members">0</span></div>
                            </div>

                            <!-- Total Projects Created -->
                            <div class="collection-kpi-card bento-stagger bento-delay-2">
                                <div class="kpi-icon kpi-icon-orange">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8l-4 4v16a2 2 0 0 0 2 2z"/><polyline points="14 2 14 8 20 8"/></svg>
                                </div>
                                <div class="collection-kpi-label">Total Projects</div>
                                <div class="collection-kpi-value"><span id="dashboard_kpi_projects">0</span></div>
                            </div>

                            <!-- Gallery Artworks -->
                            <div class="collection-kpi-card bento-stagger bento-delay-3">
                                <div class="kpi-icon kpi-icon-amber">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
                                </div>
                                <div class="collection-kpi-label">Gallery Artworks</div>
                                <div class="collection-kpi-value"><span id="dashboard_kpi_artworks">0</span></div>
                            </div>

                            <!-- Active Tutorials -->
                            <div class="collection-kpi-card bento-stagger bento-delay-4">
                                <div class="kpi-icon kpi-icon-yellow">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="12 2 2 7 12 12 22 7 12 2"/><polyline points="2 17 12 22 22 17"/><polyline points="2 12 12 17 22 12"/></svg>
                                </div>
                                <div class="collection-kpi-label">Active Tutorials</div>
                                <div class="collection-kpi-value" id="dashboard_kpi_tutorials">0</div>
                            </div>

                            <!-- AI Grader Uses -->
                            <div class="collection-kpi-card bento-stagger bento-delay-5">
                                <div class="kpi-icon kpi-icon-green">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="4 14 10 14 10 20"/><polyline points="20 10 14 10 14 4"/><line x1="14" y1="10" x2="21" y2="3"/><line x1="3" y1="21" x2="10" y2="14"/></svg>
                                </div>
                                <div class="collection-kpi-label">AI Grader Evals</div>
                                <div class="collection-kpi-value" id="dashboard_kpi_grader">0</div>
                            </div>

                        </div>
                    </div>
                </div>
                
            </div>

<?php 
// Include specific JS script corresponding to this UI for AJAX processing
if (file_exists('JS/Collection_dashboard_01_A_JS.php')) {
    include_once 'JS/Collection_dashboard_01_A_JS.php';
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
