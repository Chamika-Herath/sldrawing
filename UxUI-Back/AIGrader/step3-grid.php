<!-- ===== STEP 3: Make a Grid (Photoshop Pro Layout) ===== -->
<div class="step-panel" id="panel-3">
  <div class="grid-split-wrap">
    
    <!-- Main Editor Area -->
    <div class="grid-workspace">
      <!-- Toolbar Overlay -->
      <div class="grid-tool-overlay" style="position: absolute; top: 20px; left: 50%; transform: translateX(-50%); display: flex; gap: 4px; padding: 4px; border-radius: 12px; z-index: 100;">
        <button id="gt-pan" onclick="setGridTool('pan')" class="gt-btn active" style="border-radius: 8px;">✋ Pan</button>
        <button id="gt-draw" onclick="setGridTool('draw')" class="gt-btn" style="border-radius: 8px;">📍 Connect</button>
        <button id="gt-erase" onclick="setGridTool('erase')" class="gt-btn" style="border-radius: 8px;">🧹 Eraser</button>
        <button id="gt-toggle-sidebar" onclick="toggleGridSidebar()" class="gt-btn" style="border-radius: 8px; margin-left: 10px; background: rgba(0, 132, 255, 0.15); border: 1px solid rgba(0,132,255,0.4); color: #00d2ff;">▶ Hide Sidebar</button>
      </div>
      
      <!-- The Image/Grid -->
      <canvas id="grid-canvas" class="grid-canvas" style="max-height: 85%; max-width: 90%;"></canvas>
      
      <!-- Zoom Indicator HUD -->
      <div style="position:absolute; bottom:20px; right:20px; background:rgba(0,0,0,0.8); color:#888; padding:5px 12px; border-radius:6px; font-size:0.7rem; font-weight:700; pointer-events:none; border:1px solid #333;">
        ZOOM: <span id="g-zm-indicator" style="color:#fff;">100%</span>
      </div>
    </div>

    <!-- Right Properties Sidebar -->
    <div class="grid-sidebar" id="grid-sidebar-panel">
      <div class="grid-sidebar-card">
        <div style="font-weight:800; font-size:0.75rem; color:#fff; text-transform:uppercase; letter-spacing:1px; margin-bottom:20px; display:flex; align-items:center; gap:8px;">
          <span style="color:var(--primary);">📐</span> Properties
        </div>
        
        <!-- Grid Matrix -->
        <div class="g-controls" style="grid-template-columns: 1fr 1fr; gap:12px;">
          <div class="g-grp"><label>Cols</label><input type="number" id="g-cols" value="8" min="1" max="50"></div>
          <div class="g-grp"><label>Rows</label><input type="number" id="g-rows" value="8" min="1" max="50"></div>
          <div class="g-grp"><label>Margin</label><input type="number" id="g-margin" value="0" min="0" max="200"></div>
          <div class="g-grp"><label>Thick</label><input type="number" id="g-thick" value="1.0" min="0.1" max="10" step="0.1"></div>
        </div>

        <div style="margin: 20px 0;">
          <label>Appearance</label>
          <div style="display:flex; align-items:center; gap:10px; margin-top:8px; background:#333; padding:8px; border-radius:8px;">
             <input type="color" id="g-color" value="#0084ff" style="width:30px; height:30px; border-radius:4px; border:none; cursor:pointer; background:none; padding:0;">
             <div style="font-size:0.75rem; color:#ccc; font-weight:600;">Grid & Path Color</div>
          </div>
        </div>

        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom: 20px; padding:10px; background:rgba(255,255,255,0.03); border:1px solid #333; border-radius:8px;">
           <label style="margin:0; text-transform:none; letter-spacing:0; font-size:0.75rem; color:#ccc;">Square Cells Only</label>
           <input type="checkbox" id="g-square" checked style="width:18px; height:18px; cursor:pointer; accent-color:var(--primary);">
        </div>

        <!-- Zoom HUD -->
        <div style="margin-bottom: 25px;">
            <label style="display:flex; justify-content:space-between;">
              <span>Zoom Level</span>
              <span id="g-zm-val" style="color: #fff">100%</span>
            </label>
            <input type="range" id="g-zm" min="50" max="300" value="100" style="width:100%; accent-color:var(--primary); cursor:pointer; margin-top:8px;">
        </div>

        <button class="dl-btn" onclick="downloadGrid()" style="background:#0084ff; font-size:0.8rem; height:45px; border-radius:8px;">Export High Quality PNG</button>
        <button onclick="clearGridDrawings()" style="display:block; width:100%; padding:10px; background:none; border:none; color:#666; cursor:pointer; font-size:0.7rem; text-decoration:underline;">Discard Custom Paths</button>
      </div>

      <!-- Footer Navigation -->
      <div style="margin-top:auto; padding:15px; border-top:1px solid #333; display:flex; gap:10px; background:#1e1e1e;">
        <button class="back-btn nav-btn" onclick="goStep(2)" style="flex:1; height:40px; font-size:0.8rem; background:#333;">Back</button>
        <button id="btn-next-step3" class="next-btn nav-btn" onclick="applyAndNextStep3()" style="flex:1.5; height:40px; font-size:0.8rem;">Confirm & Next</button>
      </div>
    </div>

  </div>
</div>
