<!-- ===== STEP 2: Edit Image ===== -->
<div class="step-panel" id="panel-2">
  <div class="panel-card reveal">
    <div class="panel-title">🎨 Edit Image</div>
    <p class="panel-sub">Adjust the reference image to make it easier to draw from.</p>
    <canvas id="edit-canvas" class="edit-canvas"></canvas>
    <div style="margin-top:24px">
      <div class="sldr-row"><label>Brightness <span id="br-val">100%</span></label><input type="range" id="sl-br" min="0" max="200" value="100"></div>
      <div class="sldr-row"><label>Contrast <span id="ct-val">100%</span></label><input type="range" id="sl-ct" min="0" max="200" value="100"></div>
      <div class="sldr-row"><label>Saturation <span id="sa-val">100%</span></label><input type="range" id="sl-sa" min="0" max="200" value="100"></div>
      <div class="sldr-row"><label>Grayscale <span id="gs-val">0%</span></label><input type="range" id="sl-gs" min="0" max="100" value="0"></div>
      <div class="sldr-row"><label>Blur <span id="bl-val">0px</span></label><input type="range" id="sl-bl" min="0" max="10" value="0"></div>
    </div>
    <button class="next-btn" onclick="applyAndNext()">Next: Make Grid →</button>
  </div>
</div>
