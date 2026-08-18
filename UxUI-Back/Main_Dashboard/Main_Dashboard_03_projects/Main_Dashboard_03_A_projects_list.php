<?php 
    $pth = "../"; 
    $active_page = "project-list"; 
    $page_title = "Art Projects · SLdrawing";
//include '../UxUI-Back/Includes/header.php'; 
?>

<style>
  /* ===================================================================
     SLdrawing Orange/Brown Premium UX - Projects Gallery
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
    --sld-radius-sm: 12px;
    --sld-radius-md: 16px;
    --sld-radius-lg: 24px;
    --sld-shadow: 0 12px 32px rgba(249, 115, 22, 0.05);
    --sld-shadow-hover: 0 15px 40px rgba(249, 115, 22, 0.25);
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
  .project-toolbar {
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

  /* Project Grid Layout */
  .project-grid-container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 24px;
  }

  .project-card {
    background: var(--sld-dark-950);
    border: 1px solid var(--sld-border);
    border-radius: var(--sld-radius-md);
    overflow: hidden;
    position: relative;
    transition: all 0.4s var(--sld-cubic);
    display: flex;
    flex-direction: column;
    animation: fadeSlideUp 0.5s var(--sld-cubic) both;
  }
  .project-card:nth-child(1) { animation-delay: 0.1s; }
  .project-card:nth-child(2) { animation-delay: 0.15s; }
  .project-card:nth-child(3) { animation-delay: 0.2s; }
  .project-card:nth-child(4) { animation-delay: 0.25s; }
  .project-card:nth-child(5) { animation-delay: 0.3s; }
  .project-card:nth-child(6) { animation-delay: 0.35s; }

  .project-card:hover {
    transform: translateY(-6px);
    box-shadow: var(--sld-shadow-hover);
    border-color: var(--sld-orange-500);
  }

  /* Card Image Header */
  .project-card-image {
    width: 100%;
    height: 180px;
    background-size: cover;
    background-position: center;
    position: relative;
    border-bottom: 1px solid rgba(255,255,255,0.05);
    overflow: hidden;
  }
  .project-card-image::after {
    content: '';
    position: absolute;
    top:0; left:0; right:0; bottom:0;
    transition: background 0.3s ease;
  }
  .project-card:hover .project-card-image::after {
    background: rgba(0,0,0,0.4);
  }

  /* Interactive overlay on hover */
  .project-hover-overlay {
    position: absolute;
    top: 50%; left: 50%;
    transform: translate(-50%, -50%) scale(0.8);
    opacity: 0;
    display: flex;
    gap: 12px;
    transition: all 0.3s var(--sld-cubic);
    z-index: 2;
  }
  .project-card:hover .project-hover-overlay {
    opacity: 1;
    transform: translate(-50%, -50%) scale(1);
  }
  .overlay-btn {
    width: 40px; height: 40px; border-radius: 50%;
    background: var(--sld-orange-500);
    color: var(--sld-dark-950);
    display: flex; align-items: center; justify-content: center;
    cursor: pointer; border: none;
    box-shadow: 0 4px 12px rgba(249,115,22,0.4);
    transition: transform 0.2s ease;
  }
  .overlay-btn:hover { transform: scale(1.15); }
  .overlay-btn.btn-sec { background: var(--sld-dark-800); color: var(--sld-text-900); box-shadow: 0 4px 12px rgba(0,0,0,0.5); }

  /* Card Body */
  .project-card-body {
    padding: 20px;
    display: flex;
    flex-direction: column;
    flex: 1;
  }
  .project-title {
    font-size: 16px;
    font-weight: 700;
    color: var(--sld-text-900);
    margin-bottom: 6px;
    line-height: 1.3;
  }
  .project-meta {
    font-size: 12px;
    color: var(--sld-text-400);
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 16px;
  }
  .project-author {
    color: var(--sld-orange-500);
    font-weight: 600;
  }

  /* Card Footer (Metrics) */
  .project-card-footer {
    margin-top: auto;
    padding-top: 14px;
    border-top: 1px solid rgba(255,255,255,0.05);
    display: flex;
    justify-content: space-between;
    font-size: 11px;
    color: var(--sld-text-600);
    font-weight: 600;
  }
  .metric-item {
    display: flex;
    align-items: center;
    gap: 6px;
  }
  .metric-item svg {
    width: 14px; height: 14px; opacity: 0.8;
  }

  /* Category Badge */
  .cat-badge {
    position: absolute;
    top: 12px;
    left: 12px;
    background: rgba(28,25,23,0.85);
    backdrop-filter: blur(4px);
    color: var(--sld-orange-500);
    padding: 4px 10px;
    border-radius: 50px;
    font-size: 10px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    border: 1px solid rgba(249,115,22,0.3);
    z-index: 1;
  }

</style>

<div data-page="project" id="Main_Dashboard_03_A">

<div class="project-collection-app">

  <!-- Uses Global Sidebar created by User -->
  <?php include "../UxUI-Back/Includes/Main_dashboard_sidebar.php"; ?>
 

  <!-- ================= TOPBAR ================= -->
  <header class="project-collection-topbar">
    <div class="project-collection-topbar-heading">
      <h1>Studio Projects</h1>
      <p>Manage Community Artworks</p>
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
                <h2 id="dashboard_summary_header">Project Gallery</h2>
                <button class="collection-panel-close" title="Close" onclick="window.history.back()">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                </button>
            </div>

            <div class="collection-panel-body">
                <div class="collection-breadcrumb">
                    <div class="breadcrumb-path">
                        Dashboard <span style="color:var(--sld-text-600)">/</span> <span class="active-crumb">Projects</span>
                    </div>
                    <div class="project-toolbar">
                        <select class="filter-select">
                            <option>All Projects</option>
                            <option>Portraits</option>
                            <option>Grid Drawing</option>
                            <option>Abstract</option>
                        </select>
                        <button class="btn-primary">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                            New Project
                        </button>
                    </div>
                </div>

                <!-- Projects Visual Grid -->
                <div class="project-grid-container">
                    
                    <!-- Project Card 1 -->
                    <div class="project-card">
                        <div class="cat-badge">Portrait</div>
                        <div class="project-card-image" style="background-image: url('../../../assets/images/portrait_hero_new.webp');">
                            <div class="project-hover-overlay">
                                <button class="overlay-btn" title="View"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg></button>
                                <button class="overlay-btn btn-sec" title="Edit"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg></button>
                            </div>
                        </div>
                        <div class="project-card-body">
                            <div class="project-title">Cyber Queen Concept Art</div>
                            <div class="project-meta">
                                <span>By <span class="project-author">Chamika Herath</span></span>
                                <span>Aug 12</span>
                            </div>
                            <div class="project-card-footer">
                                <div class="metric-item">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                    1.2k
                                </div>
                                <div class="metric-item">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                                    843
                                </div>
                                <div class="metric-item">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
                                    Public
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Project Card 2 -->
                    <div class="project-card">
                        <div class="cat-badge">Grid Drawing</div>
                        <div class="project-card-image" style="background-image: url('../../../assets/images/gallery_item_new.webp');">
                            <div class="project-hover-overlay">
                                <button class="overlay-btn" title="View"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg></button>
                                <button class="overlay-btn btn-sec" title="Edit"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg></button>
                            </div>
                        </div>
                        <div class="project-card-body">
                            <div class="project-title">Classical Face Proportions</div>
                            <div class="project-meta">
                                <span>By <span class="project-author">SLdrawing Studio</span></span>
                                <span>Aug 04</span>
                            </div>
                            <div class="project-card-footer">
                                <div class="metric-item">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                    4.1k
                                </div>
                                <div class="metric-item">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                                    1.2k
                                </div>
                                <div class="metric-item">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                                    Members
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Project Card 3 -->
                    <div class="project-card">
                        <div class="cat-badge">Community</div>
                        <div class="project-card-image" style="background-image: url('../../../assets/images/booking_card_2.webp'); background-color: var(--sld-dark-700);">
                            <div class="project-hover-overlay">
                                <button class="overlay-btn" title="View"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg></button>
                                <button class="overlay-btn btn-sec" title="Edit"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/></svg></button>
                            </div>
                        </div>
                        <div class="project-card-body">
                            <div class="project-title">Perspective Training Sets</div>
                            <div class="project-meta">
                                <span>By <span class="project-author">Jane Doe</span></span>
                                <span>Jul 28</span>
                            </div>
                            <div class="project-card-footer">
                                <div class="metric-item">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                                    920
                                </div>
                                <div class="metric-item">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>
                                    115
                                </div>
                                <div class="metric-item" style="color:var(--sld-orange-500);">
                                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/><polyline points="22 4 12 14.01 9 11.01"/></svg>
                                    Approved
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

<?php 
// Include specific JS script corresponding to this UI for AJAX processing
if (file_exists('JS/Main_Dashboard_03_A_projects_list_JS.php')) {
    include_once 'JS/Main_Dashboard_03_A_projects_list_JS.php';
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
