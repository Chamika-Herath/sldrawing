<!-- ===== STEP 4: Upload Your Drawing ===== -->
<div class="step-panel" id="panel-4">
  <div class="panel-card reveal">
    <div class="panel-title">✏️ Upload Your Drawing</div>
    <p class="panel-sub">Upload the hand-drawn sketch you made using the grid reference.</p>
    <label class="dropzone2" for="sketch-input" id="sketch-dz">
      <span class="dz-icon">🖊️</span>
      <h3>Drop your sketch here</h3>
      <p>PNG, JPG or WEBP — click or drag &amp; drop</p>
      <input type="file" id="sketch-input" accept="image/*" style="display:none">
      <img id="sketch-preview" class="dz-preview" alt="Sketch preview" style="max-height: 400px; display: none;">
      <div id="sketch-change-btn" style="display: none; margin-top: 15px; padding: 10px 24px; background: rgba(0,132,255,0.1); color: #00d2ff; border: 1px solid rgba(0,132,255,0.4); border-radius: 50px; font-weight: 600; cursor: pointer; transition: all 0.3s; font-size: 0.95rem;">Change Sketch</div>
    </label>
    <div class="step-nav">
      <button class="back-btn nav-btn" onclick="goStep(3)">← Back</button>
      <button id="btn-next-step4" class="next-btn nav-btn" onclick="applyAndNextStep4()">Next</button>
    </div>
  </div>
</div>
