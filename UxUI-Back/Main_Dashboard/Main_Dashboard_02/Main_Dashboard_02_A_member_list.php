<?php 
    $pth = "../"; 
    $active_page = "member-collection"; 
    $page_title = "Community Members · SLdrawing";
//include '../UxUI-Back/Includes/header.php'; 
?>

<style>
  /* ===================================================================
     SLdrawing Orange/Brown Premium UX - Member List
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
    --sld-success: #10b981;
    --sld-success-bg: rgba(16, 185, 129, 0.1);
    --sld-radius-sm: 12px;
    --sld-radius-md: 16px;
    --sld-radius-lg: 24px;
    --sld-shadow: 0 12px 32px rgba(249, 115, 22, 0.05);
    --sld-shadow-hover: 0 8px 24px rgba(249, 115, 22, 0.2);
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
  .member-toolbar {
    display: flex;
    gap: 12px;
    align-items: center;
  }
  .search-input {
    background: var(--sld-dark-950);
    border: 1px solid rgba(255,255,255,0.1);
    color: var(--sld-text-900);
    padding: 10px 18px 10px 40px;
    border-radius: 50px;
    font-size: 13px;
    outline: none;
    width: 250px;
    transition: all 0.3s ease;
    background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="%23a8a29e" stroke-width="2"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>');
    background-repeat: no-repeat;
    background-position: 14px center;
  }
  .search-input:focus {
    border-color: var(--sld-orange-500);
    box-shadow: 0 0 10px rgba(249, 115, 22, 0.2);
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

  /* Member List Headers */
  .member-list-header {
    display: grid;
    grid-template-columns: 3fr 2fr 2fr 1fr;
    padding: 12px 24px;
    border-bottom: 1px solid rgba(255,255,255,0.05);
    margin-bottom: 12px;
    color: var(--sld-text-400);
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
  }

  /* Member Horizontal Cards */
  .member-list-container {
    display: flex;
    flex-direction: column;
    gap: 12px;
  }
  
  .member-card {
    display: grid;
    grid-template-columns: 3fr 2fr 2fr 1fr;
    background: var(--sld-dark-950);
    border: 1px solid var(--sld-border);
    border-radius: var(--sld-radius-md);
    padding: 16px 24px;
    align-items: center;
    transition: all 0.3s var(--sld-cubic);
    animation: fadeSlideUp 0.4s var(--sld-cubic) both;
  }

  /* Stagger animation for demo cards */
  .member-card:nth-child(1) { animation-delay: 0.1s; }
  .member-card:nth-child(2) { animation-delay: 0.2s; }
  .member-card:nth-child(3) { animation-delay: 0.3s; }
  .member-card:nth-child(4) { animation-delay: 0.4s; }

  .member-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--sld-shadow-hover);
    border-color: var(--sld-orange-500);
    background: rgba(41, 37, 36, 0.9);
  }

  /* Card Columns */
  .col-user {
    display: flex;
    align-items: center;
    gap: 16px;
  }
  .avatar-placeholder {
    width: 44px;
    height: 44px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--sld-orange-500), var(--sld-amber-500));
    color: var(--sld-dark-950);
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 800;
    font-size: 16px;
    flex-shrink: 0;
  }
  .user-info {
    display: flex;
    flex-direction: column;
  }
  .user-name {
    font-weight: 700;
    font-size: 15px;
    color: var(--sld-text-900);
    margin-bottom: 2px;
  }
  .user-email {
    font-size: 12px;
    color: var(--sld-text-400);
  }

  .col-status {
    display: flex;
    align-items: center;
    gap: 8px;
  }
  .status-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 4px 10px;
    border-radius: 50px;
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
  }
  .status-active {
    background: var(--sld-success-bg);
    color: var(--sld-success);
    border: 1px solid rgba(16, 185, 129, 0.2);
  }
  .status-inactive {
    background: var(--sld-danger-bg);
    color: var(--sld-danger);
    border: 1px solid rgba(239, 68, 68, 0.2);
  }
  .status-badge svg {
    width: 8px; height: 8px; fill: currentColor;
  }

  .col-date {
    font-size: 13px;
    color: var(--sld-text-600);
    font-weight: 500;
  }

  .col-action {
    display: flex;
    justify-content: flex-end;
  }
  .action-btn {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: var(--sld-dark-800);
    border: 1px solid rgba(255,255,255,0.05);
    color: var(--sld-text-400);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.3s ease;
  }
  .member-card:hover .action-btn {
    background: rgba(249, 115, 22, 0.1);
    color: var(--sld-orange-500);
    border-color: var(--sld-orange-500);
  }
  .action-btn:hover {
    background: var(--sld-orange-500) !important;
    color: var(--sld-dark-950) !important;
    transform: scale(1.1);
  }

  /* Responsive Cards */
  @media (max-width: 900px) {
    .member-list-header { display: none; }
    .member-card {
      grid-template-columns: 1fr;
      gap: 16px;
      position: relative;
    }
    .col-action {
      position: absolute;
      top: 16px;
      right: 16px;
    }
  }

</style>

<div data-page="project" id="Main_Dashboard_02_A">

<div class="project-collection-app">

  <!-- Uses Global Sidebar created by User -->
  <?php include "../UxUI-Back/Includes/Main_dashboard_sidebar.php"; ?>
 

  <!-- ================= TOPBAR ================= -->
  <header class="project-collection-topbar">
    <div class="project-collection-topbar-heading">
      <h1>Community Members</h1>
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
                <h2 id="dashboard_summary_header">Member Directory</h2>
                <button class="collection-panel-close" title="Close" onclick="window.history.back()">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                </button>
            </div>

            <div class="collection-panel-body">
                <div class="collection-breadcrumb">
                    <div class="breadcrumb-path">
                        Dashboard <span style="color:var(--sld-text-600)">/</span> <span class="active-crumb">Members</span>
                    </div>
                    <div class="member-toolbar">
                        <input type="text" class="search-input" placeholder="Search members...">
                        <button class="btn-primary">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                            Add Member
                        </button>
                    </div>
                </div>

                <!-- Member List Headers -->
                <div class="member-list-header">
                    <div>User Info</div>
                    <div>Status</div>
                    <div>Date Joined</div>
                    <div style="text-align: right;">Action</div>
                </div>

                <!-- Horizontal Member Cards (Dynamically Loaded) -->
                <div class="member-list-container" id="member-list-container">
                    
                    <div style="padding: 40px; text-align: center; color: var(--sld-text-400);">
                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-bottom: 10px; opacity: 0.5; animation: spin-ring 2s infinite linear;"><circle cx="12" cy="12" r="10"/><path d="M12 6v2"/></svg>
                        <p>Loading Member Data...</p>
                    </div>

                </div>

            </div>


            
        </section>
        
    </div>

    <p style="text-align:center;font-size:12px;color:var(--sld-text-600);padding-top:24px; font-weight: 500;">
       &copy; 2026 Chamika Herath — <span style="font-weight: 700; color: var(--sld-orange-500);">Heraforce</span>
    </p>
  </main>

</div>

</div>
