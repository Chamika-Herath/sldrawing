<!-- ===== STEP 3: Make a Grid ===== -->
<div class="step-panel" id="panel-3">
  <div class="panel-card reveal">
    <div class="panel-title">📐 Make a Grid</div>
    <p class="panel-sub">Overlay a customizable grid on your reference image to guide your drawing.</p>
    <canvas id="grid-canvas" class="grid-canvas"></canvas>
    
    <div style="margin: 20px 0; padding: 15px; background: rgba(0,0,0,0.2); border-radius: 12px; border: 1px solid var(--glass-border);">
        <label style="font-size: 0.85rem; font-weight: 800; margin-bottom: 8px; display: block; color: var(--text);">Grid Preview Zoom <span id="g-zm-val" style="color: var(--primary)">100%</span></label>
        <div style="display:flex; align-items:center; gap:12px;">
            <button onclick="document.getElementById('g-zm').stepDown(10); document.getElementById('g-zm').dispatchEvent(new Event('input'))" style="padding:8px 15px; border-radius:8px; background:var(--secondary); color:var(--text); border:1px solid var(--glass-border); cursor:pointer; font-weight:bold;">-</button>
            <input type="range" id="g-zm" min="50" max="300" value="100" style="flex:1; accent-color:var(--primary); cursor:pointer;">
            <button onclick="document.getElementById('g-zm').stepUp(10); document.getElementById('g-zm').dispatchEvent(new Event('input'))" style="padding:8px 15px; border-radius:8px; background:var(--secondary); color:var(--text); border:1px solid var(--glass-border); cursor:pointer; font-weight:bold;">+</button>
        </div>
    </div>

    <div class="g-controls">
      <div class="g-grp"><label>Rows</label><input type="number" id="g-rows" value="5" min="1" max="20"></div>
      <div class="g-grp"><label>Columns</label><input type="number" id="g-cols" value="5" min="1" max="20"></div>
      <div class="g-grp"><label>Thickness (px)</label><input type="number" id="g-thick" value="2" min="1" max="10"></div>
      <div class="g-grp">
        <label>Line Color</label>
        <input type="color" id="g-color" value="#0084ff" style="height:42px;padding:3px;border-radius:10px;border:1px solid #ddd;cursor:pointer;width:100%">
      </div>
    </div>
    <button class="dl-btn" onclick="downloadGrid()">📥 Download Grid Image</button>
    <div class="step-nav">
      <button class="back-btn nav-btn" onclick="goStep(2)">← Back</button>
      <button class="next-btn nav-btn" onclick="goStep(4)">Next</button>
    </div>
  </div>
</div>
