<div data-page="project" id="Main_Dashboard_02_B" style="display:none;">
    <div class="project-collection-app">
        <?php include "../UxUI-Back/Includes/Main_dashboard_sidebar.php"; ?>
        <main class="project-collection-main">
            <div class="collection-dashboard-wrapper">
                <section class="collection-dashboard-content">
                    <div class="collection-panel-header">
                        <h2>Member Data Profile: <span id="md_details_name" style="color:var(--sld-orange-500);">...</span></h2>
                        <button class="collection-panel-close" title="Close" onclick="Main_Dashboard_02_A_OPEN();">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                        </button>
                    </div>
                    
                    <div class="collection-panel-body">
                        <!-- Security & Role Grid -->
                        <div style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-bottom: 30px;">
                            <div style="background: var(--sld-dark-950); padding: 20px; border-radius: var(--sld-radius-md); border: 1px solid var(--sld-border);">
                                <div style="font-size: 13px; color: var(--sld-text-400); margin-bottom: 8px; text-transform:uppercase; font-weight:700;">Account Tier</div>
                                <div id="md_details_access" style="font-size: 20px; font-weight: 700; color: #fff;">...</div>
                            </div>
                            <div style="background: var(--sld-dark-950); padding: 20px; border-radius: var(--sld-radius-md); border: 1px solid var(--sld-border);">
                                <div style="font-size: 13px; color: var(--sld-text-400); margin-bottom: 8px; text-transform:uppercase; font-weight:700;">Two-Factor Protocol</div>
                                <div id="md_details_2fa" style="font-size: 20px; font-weight: 700; color: #fff;">...</div>
                            </div>
                            <div style="background: var(--sld-dark-950); padding: 20px; border-radius: var(--sld-radius-md); border: 1px solid var(--sld-border);">
                                <div style="font-size: 13px; color: var(--sld-text-400); margin-bottom: 8px; text-transform:uppercase; font-weight:700;">System Projects Cast</div>
                                <div id="md_details_projects_count" style="font-size: 20px; font-weight: 700; color: var(--sld-orange-500);">0</div>
                            </div>
                        </div>

                        <!-- User Projects History -->
                        <h3 style="font-size: 16px; font-weight: 600; margin-bottom: 15px; border-bottom: 1px solid rgba(255,255,255,0.05); padding-bottom: 10px;">Grid Project & Score Ledger</h3>
                        <div id="md_details_projects_list" style="display: flex; flex-direction: column; gap: 10px;">
                            <div style='color:var(--sld-text-400); padding:20px; text-align:center;'>Fetching grid architecture history...</div>
                        </div>
                    </div>
                </section>
            </div>
            
            <p style="text-align:center;font-size:12px;color:var(--sld-text-600);padding-top:24px; font-weight: 500;">
               &copy; 2026 Chamika Herath — <span style="font-weight: 700; color: var(--sld-orange-500);">Heraforce Admin Panel</span>
            </p>
        </main>
    </div>
</div>
