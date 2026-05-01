<!-- ===== STEP 5: AI Check ===== -->
<div class="step-panel" id="panel-5">
  <div class="panel-card reveal">
    <div class="panel-title">🤖 AI Check</div>
    <p class="panel-sub">Our CNN pipeline compares your sketch to the reference and scores proportional accuracy.</p>

    <!-- Processing spinner -->
    <div class="proc-view" id="proc-view" style="display:none">
      <div class="spinner2"></div>
      <h3 style="color:var(--primary)">Running Dual-Channel CNN...</h3>
      <p style="color:var(--text-dim);font-size:.9rem">Extracting shapes using Canny edge detection...</p>
    </div>

    <!-- Results -->
    <div id="results-view" style="display:none;text-align:center">
      <div class="score-ring" id="score-ring">0%</div>
      <p style="font-weight:700;font-size:1.1rem;margin-bottom:4px">Proportional Accuracy Score</p>
      <p style="color:var(--text-dim);font-size:.88rem;margin-bottom:28px">Based on edge-detection &amp; grid-cell comparison</p>
      <div class="fb-grid">
        <div class="fb-card"><h4 style="color:var(--primary)">✅ Proportions</h4><p id="fb-0">Good symmetry in upper facial region.</p></div>
        <div class="fb-card"><h4 style="color:#f59e0b">⚠️ Details</h4><p id="fb-1">Minor deviation in jaw-line curvature.</p></div>
        <div class="fb-card"><h4 style="color:#00c853">📐 Grid Alignment</h4><p id="fb-2">85% of cells matched within 8px tolerance.</p></div>
        <div class="fb-card"><h4 style="color:#e91e8c">🎯 Suggestion</h4><p id="fb-3">Refine the nose-bridge width ratio.</p></div>
      </div>
      <button class="save-btn" onclick="saveProject()">💾 Save Project</button>
    </div>
  </div>
</div>
