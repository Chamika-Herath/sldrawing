<?php 
    $pth = "../"; 
    $active_page = "yt_videos"; /* Use this ID when adding to sidebar later */
    $page_title = "YouTube Videos · SLdrawing";
//include '../UxUI-Back/Includes/header.php'; 
?>

<style>
  /* ===================================================================
     SLdrawing Orange/Brown Premium UX - YouTube Videos
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
    --sld-danger: #ef4444;
    --sld-success: #10b981;
    --sld-radius-sm: 8px;
    --sld-radius-md: 12px;
    --sld-radius-lg: 20px;
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

  /* Add YT Video Form Toolbar */
  .yt-toolbar {
    display: flex;
    background: var(--sld-dark-950);
    border: 1px solid rgba(255,255,255,0.1);
    border-radius: 50px;
    padding: 4px;
    width: 100%;
    max-width: 450px;
    transition: all 0.3s ease;
  }
  .yt-toolbar:focus-within {
    border-color: var(--sld-orange-500);
    box-shadow: 0 0 12px rgba(249, 115, 22, 0.2);
  }
  .yt-toolbar input {
    background: transparent;
    border: none;
    color: var(--sld-text-900);
    padding: 12px 20px;
    flex: 1;
    font-size: 14px;
    outline: none;
  }
  .yt-toolbar input::placeholder {
    color: var(--sld-text-600);
  }
  .btn-primary {
    background: var(--sld-orange-500);
    color: var(--sld-dark-950);
    border: none;
    padding: 10px 24px;
    border-radius: 50px;
    font-weight: 700;
    font-size: 14px;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
  }
  .btn-primary:hover {
    background: var(--sld-orange-600);
    box-shadow: 0 4px 12px rgba(249,115,22,0.3);
  }

  /* YouTube Grid Layout */
  .yt-grid-container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
    gap: 24px;
  }

  .yt-card {
    background: var(--sld-dark-950);
    border: 1px solid var(--sld-border);
    border-radius: var(--sld-radius-md);
    overflow: hidden;
    display: flex;
    flex-direction: column;
    transition: all 0.4s var(--sld-cubic);
    animation: fadeSlideUp 0.5s var(--sld-cubic) both;
  }

  .yt-card:nth-child(1) { animation-delay: 0.1s; }
  .yt-card:nth-child(2) { animation-delay: 0.2s; }
  .yt-card:nth-child(3) { animation-delay: 0.3s; }

  .yt-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--sld-shadow-hover);
    border-color: var(--sld-orange-500);
  }

  /* 16:9 Thumbnail Area */
  .yt-thumbnail {
    width: 100%;
    aspect-ratio: 16 / 9;
    background-size: cover;
    background-position: center;
    position: relative;
    border-bottom: 2px solid var(--sld-orange-500); /* YT accent */
  }
  .yt-play-btn {
    position: absolute;
    top: 50%; left: 50%; transform: translate(-50%, -50%);
    width: 48px; height: 32px;
    background: rgba(255, 0, 0, 0.85); /* classic YT red for instant recognition! */
    border-radius: 8px;
    display: flex; align-items: center; justify-content: center;
    transition: all 0.2s ease;
    opacity: 0.9;
  }
  .yt-card:hover .yt-play-btn {
    opacity: 1; transform: translate(-50%, -50%) scale(1.1);
  }
  .yt-play-btn svg { width: 14px; height: 14px; fill: #fff; color: #fff; margin-left: 2px; }

  /* Info Area */
  .yt-info {
    padding: 16px 20px;
    display: flex;
    flex-direction: column;
    flex: 1;
  }
  .yt-title {
    font-size: 15px;
    font-weight: 700;
    color: var(--sld-text-900);
    margin-bottom: 8px;
    line-height: 1.4;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;  
    overflow: hidden;
  }
  .yt-id {
    font-size: 12px; font-family: monospace;
    color: var(--sld-orange-500); margin-bottom: 16px;
  }

  /* Card Footer + Actions */
  .yt-footer {
    border-top: 1px solid rgba(255,255,255,0.05);
    padding-top: 14px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: auto;
  }

  /* Custom Toggle Switch for Homepage Display */
  .toggle-container {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 13px;
    color: var(--sld-text-600);
    font-weight: 500;
    cursor: pointer;
  }
  .toggle-switch {
    position: relative;
    width: 36px;
    height: 20px;
    border-radius: 20px;
    background: var(--sld-dark-700);
    transition: background 0.3s ease;
  }
  .toggle-slider {
    position: absolute;
    top: 2px;
    left: 2px;
    width: 16px;
    height: 16px;
    border-radius: 50%;
    background: #fff;
    transition: transform 0.3s var(--sld-cubic);
    box-shadow: 0 2px 4px rgba(0,0,0,0.2);
  }
  /* Active state */
  .toggle-input:checked + .toggle-container .toggle-switch {
    background: var(--sld-success);
  }
  .toggle-input:checked + .toggle-container .toggle-slider {
    transform: translateX(16px);
  }
  /* Hide actual checkbox natively */
  .toggle-input { display: none; }
  
  .yt-actions {
    display: flex;
    gap: 8px;
  }
  .action-icon {
    width: 32px; height: 32px;
    border-radius: 50%;
    background: var(--sld-dark-800);
    color: var(--sld-text-400);
    display: flex; align-items: center; justify-content: center;
    cursor: pointer; border: none;
    transition: all 0.2s ease;
  }
  .action-icon:hover {
    background: var(--sld-danger);
    color: #fff;
  }

</style>

<div data-page="project" id="Main_Dashboard_05_A">

<div class="project-collection-app">

  <!-- Uses Global Sidebar created by User -->
  <!-- Note: Respecting user updated ../UxUI-Back/Includes/ path -->
  <?php include "../UxUI-Back/Includes/Main_dashboard_sidebar.php"; ?>
 

  <!-- ================= TOPBAR ================= -->
  <header class="project-collection-topbar">
    <div class="project-collection-topbar-heading">
      <h1>YouTube Integration</h1>
      <p>Manage videos displayed on the homepage</p>
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
                <h2 id="dashboard_summary_header">Homepage Gallery</h2>
                <button class="collection-panel-close" title="Close" onclick="window.history.back()">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                </button>
            </div>

            <div class="collection-panel-body">
                <div class="collection-breadcrumb">
                    <div class="breadcrumb-path">
                        Dashboard <span style="color:var(--sld-text-600)">/</span> <span class="active-crumb">YouTube List</span>
                    </div>
                    
                    <div class="yt-toolbar">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="margin-left: 16px; color:var(--sld-text-400);"><path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33 2.78 2.78 0 0 0 1.94 2c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.33 29 29 0 0 0-.46-5.33z"/><polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"/></svg>
                        <input type="text" placeholder="https://www.youtube.com/watch?v=..." id="yt_video_url_input">
                        <button class="btn-primary" id="btn_add_yt_video">
                            Add Video
                        </button>
                    </div>
                </div>

                <!-- YouTube Videos Grid -->
                <div class="yt-grid-container" id="yt_videos_display_grid">
                    
                    <!-- YT Card 1 (Active) -->
                    <div class="yt-card">
                        <!-- Normally fetch thumbnail dynamically: https://img.youtube.com/vi/ID/maxresdefault.jpg -->
                        <div class="yt-thumbnail" style="background-image: url('https://img.youtube.com/vi/dQw4w9WgXcQ/mqdefault.jpg');">
                            <div class="yt-play-btn"><svg viewBox="0 0 24 24"><polygon points="5 3 19 12 5 21 5 3"/></svg></div>
                        </div>
                        <div class="yt-info">
                            <div class="yt-title">SLdrawing Studio Tour & Behind The Scenes</div>
                            <div class="yt-id">ID: dQw4w9WgXcQ</div>
                            
                            <div class="yt-footer">
                                <input type="checkbox" id="toggle_yt_1" class="toggle-input" checked>
                                <label for="toggle_yt_1" class="toggle-container">
                                    <div class="toggle-switch"><div class="toggle-slider"></div></div>
                                    <span style="color:var(--sld-text-900);">On Homepage</span>
                                </label>
                                
                                <div class="yt-actions">
                                    <button class="action-icon" title="Remove Video"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 6h18"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- YT Card 2 (Active) -->
                    <div class="yt-card">
                        <div class="yt-thumbnail" style="background-image: url('https://img.youtube.com/vi/jNQXAC9IVRw/mqdefault.jpg');">
                            <div class="yt-play-btn"><svg viewBox="0 0 24 24"><polygon points="5 3 19 12 5 21 5 3"/></svg></div>
                        </div>
                        <div class="yt-info">
                            <div class="yt-title">How To Draw Eyes Like A Master Artist</div>
                            <div class="yt-id">ID: jNQXAC9IVRw</div>
                            
                            <div class="yt-footer">
                                <input type="checkbox" id="toggle_yt_2" class="toggle-input" checked>
                                <label for="toggle_yt_2" class="toggle-container">
                                    <div class="toggle-switch"><div class="toggle-slider"></div></div>
                                    <span style="color:var(--sld-text-900);">On Homepage</span>
                                </label>
                                
                                <div class="yt-actions">
                                    <button class="action-icon" title="Remove Video"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 6h18"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- YT Card 3 (Not on Homepage) -->
                    <div class="yt-card">
                        <div class="yt-thumbnail" style="background-image: url('https://img.youtube.com/vi/t4t5wG5T91Q/mqdefault.jpg'); filter: grayscale(100%) brightness(0.6);">
                            <div class="yt-play-btn" style="background:var(--sld-dark-700);"><svg viewBox="0 0 24 24"><polygon points="5 3 19 12 5 21 5 3"/></svg></div>
                        </div>
                        <div class="yt-info">
                            <div class="yt-title">Digital Brushes Tutorial - Free Download!</div>
                            <div class="yt-id">ID: t4t5wG5T91Q</div>
                            
                            <div class="yt-footer">
                                <input type="checkbox" id="toggle_yt_3" class="toggle-input">
                                <label for="toggle_yt_3" class="toggle-container">
                                    <div class="toggle-switch"><div class="toggle-slider"></div></div>
                                    <span>Hidden</span>
                                </label>
                                
                                <div class="yt-actions">
                                    <button class="action-icon" title="Remove Video"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 6h18"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg></button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

<?php 
// Include specific JS script corresponding to this UI for AJAX processing
if (file_exists('JS/Main_Dashboard_05_A_yt_videos_JS.php')) {
    include_once 'JS/Main_Dashboard_05_A_yt_videos_JS.php';
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
