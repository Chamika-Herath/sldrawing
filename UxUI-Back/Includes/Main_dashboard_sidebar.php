<!-- ===================================================================
     wwjm-sidebar — Reusable sidebar component (WWJM Admin Dashboard)
     Include this on every dashboard page. Two ways to use it:

     1) PHP pages (recommended — this is what member-list.php uses):
            <?php include $pth.'Includes/sidebar.php'; ?>

     2) Static HTML/JS pages (no PHP available):
        Put an empty container where the sidebar should go and load
        it with fetch:
            <div id="wwjm-sidebar-root"></div>
            <script src="../Includes/sidebar-loader.js"></script>

     To highlight the current page's nav item, set a data-page
     attribute on <body>, matching one of the data-page values below:
        <body data-page="member-list">
     =================================================================== -->

<style>
  :root{
    --sld-bg: #1c1917;
    --sld-surface: rgba(41, 37, 36, 0.7);
    --sld-border: rgba(249, 115, 22, 0.25);
    --sld-primary: #ea580c;
    --sld-accent: #78350f;
    --sld-text: #fafaf9;
    --sld-text-muted: #a8a29e;
    --sld-radius: 12px;
  }

  .wwjm-sidebar{
    grid-area:sidebar;
    background: var(--sld-bg);
    border-right: 1px solid var(--sld-border);
    color: var(--sld-text);
    display:flex;
    flex-direction:column;
    padding:26px 18px;
    position:sticky;
    top:0;
    height:100vh;
    font-family:'Inter',-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,sans-serif;
    box-sizing:border-box;
    backdrop-filter: blur(16px);
  }

  .wwjm-sidebar-brand{
    display:flex;
    justify-content:flex-start;
    align-items:center;
    padding:18px 0 26px 18px; /* left padding */
    margin-bottom:22px;
    border-bottom:1px solid var(--sld-border);
    text-decoration:none;
  }

  .wwjm-sidebar-brand-mark{
    width:42px;
    height:42px;
    flex:none;
    display: flex;
    align-items: center;
    border: 2px solid var(--sld-primary);
    border-radius: 50%;
    margin-right: 12px;
    background: #fff;
    overflow: hidden;
  }

  .wwjm-sidebar-brand-mark img{
    width:100%;
    height:100%;
    display:block;
    object-fit:contain;
  }
  .wwjm-sidebar-brand-mark svg{width:100%;height:100%;display:block;}
  .wwjm-sidebar-brand-text{line-height:1.2;}
  .wwjm-sidebar-brand-text strong{
    display:flex;
    align-items: center;
    font-family:'Inter',sans-serif;
    font-weight:900;
    font-size:18px;
    letter-spacing: -0.5px;
    color: var(--sld-text);
  }
  .wwjm-sidebar-brand-text strong span {
      color: var(--sld-primary);
  }
  .wwjm-sidebar-brand-text span{
    display:block;
    font-size:10px;
    letter-spacing:0.1em;
    text-transform:uppercase;
    color: var(--sld-primary);
    margin-top:2px;
    font-weight: 700;
  }

  .wwjm-sidebar-nav{list-style:none;margin:0;padding:0;display:flex;flex-direction:column;gap:8px;flex:1;}
  .wwjm-sidebar-nav-item a{
    display:flex;align-items:center;gap:12px;
    padding:11px 14px;
    border-radius:var(--sld-radius);
    color: var(--sld-text-muted);
    text-decoration:none;
    font-size:13.5px;
    font-weight:600;
    border: 1px solid transparent;
    transition:all .3s ease;
  }
  .wwjm-sidebar-nav-item a:hover{
    background: rgba(234, 88, 12, 0.05);
    color: var(--sld-primary);
    border: 1px solid var(--sld-border);
    transform: translateX(4px);
  }
  .wwjm-sidebar-nav-item.wwjm-sidebar-active a{
    background: linear-gradient(90deg, rgba(234, 88, 12, 0.15) 0%, transparent 100%);
    color: var(--sld-primary);
    border-left: 3px solid var(--sld-primary);
    border-radius: 0 var(--sld-radius) var(--sld-radius) 0;
    font-weight:700;
    text-shadow: 0 0 10px rgba(234, 88, 12, 0.3);
  }
  .wwjm-sidebar-nav-icon{width:18px;height:18px;flex:0 0 18px;opacity:0.9;}

  .wwjm-sidebar-foot{
    padding-top:18px;
    margin-top:18px;
    border-top:1px solid var(--sld-border);
    font-size:11px;
    color:var(--sld-text-muted);
    line-height:1.5;
    text-align: center;
  }
  .wwjm-sidebar-foot strong {
      color: var(--sld-primary);
  }

  @media (max-width:900px){
    .wwjm-sidebar{display:none;}
  }
</style>

<aside class="wwjm-sidebar">
  <a href="dashboard.php" class="wwjm-sidebar-brand">
    <div class="wwjm-sidebar-brand-mark" aria-hidden="true">
      <img src="../../assets/images/sldrawing_cyber_badge.png"
           onerror="this.src='../../assets/images/sldrawing_logo.png'">
    </div>
    <div class="wwjm-sidebar-brand-text">
        <strong><span>SL</span>drawing</strong>
        <span>Cyber Queen</span>
    </div>
  </a>

  <ul class="wwjm-sidebar-nav">
    
    <li class="wwjm-sidebar-nav-item" data-page="dashboard" onclick="if(typeof Main_Dashboard_01_A_OPEN === 'function'){ Main_Dashboard_01_A_OPEN(); }">
      <a href="javascript:void(0);"><svg class="wwjm-sidebar-nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>Studio Dashboard</a>
    </li>
    <li class="wwjm-sidebar-nav-item" data-page="members" onclick="if(typeof Main_Dashboard_02_A_OPEN === 'function'){ Main_Dashboard_02_A_OPEN(); }">
      <a href="javascript:void(0);"><svg class="wwjm-sidebar-nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>Community Members</a>
    </li>
    <li class="wwjm-sidebar-nav-item" data-page="projects" onclick="if(typeof Collection_Dashboard_03_A_OPEN === 'function'){ Collection_Dashboard_03_A_OPEN(); }">
      <a href="javascript:void(0);"><svg class="wwjm-sidebar-nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8l-4 4v16a2 2 0 0 0 2 2z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>Art Projects</a>
    </li>
    
    <li class="wwjm-sidebar-nav-item" data-page="accounts" >
      <a href="http://localhost:3000/UxUi/Main-Dashboard.php"><svg class="wwjm-sidebar-nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 8 8 12 12 16"/><line x1="16" y1="12" x2="8" y2="12"/></svg>Go Back To Live Site</a>
    </li>
   
  </ul>

  <div class="wwjm-sidebar-foot">© 2026 Chamika Herath<br><strong>Heraforce</strong></div>
</aside>

<script>
  // Highlights the nav item matching <body data-page="...">.
  // Safe to run whether this file was included server-side (PHP)
  // or injected client-side via sidebar-loader.js.
  (function wwjmSidebarInit(){
    const current = document.body.getAttribute('data-page');
    if(!current) return;
    document.querySelectorAll('.wwjm-sidebar-nav-item').forEach(function(item){
      item.classList.toggle('wwjm-sidebar-active', item.getAttribute('data-page') === current);
    });
  })();
</script>