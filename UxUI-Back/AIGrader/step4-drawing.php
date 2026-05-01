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
    </label>
    <img id="sketch-preview" class="dz-preview" alt="Sketch preview">
    <button class="next-btn" onclick="runAICheck()">Next: AI Check →</button>
  </div>
</div>
