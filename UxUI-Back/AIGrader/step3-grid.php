<!-- ===== STEP 3: Make a Grid ===== -->
<div class="step-panel" id="panel-3">
  <div class="panel-card reveal">
    <div class="panel-title">📐 Make a Grid</div>
    <p class="panel-sub">Overlay a customizable grid on your reference image to guide your drawing.</p>
    <canvas id="grid-canvas" class="grid-canvas"></canvas>
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
    <button class="next-btn" onclick="goStep(4)">Next: Upload Drawing →</button>
  </div>
</div>
