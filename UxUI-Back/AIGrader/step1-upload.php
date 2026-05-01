<!-- ===== STEP 1: Upload Reference Image ===== -->
<div class="step-panel active" id="panel-1">
  <div class="panel-card reveal">
    <div class="panel-title">📸 Upload Reference Image</div>
    <p class="panel-sub">Upload a portrait photo to use as your drawing reference.</p>
    <label class="dropzone2" for="ref-input" id="ref-dz">
      <span class="dz-icon">📷</span>
      <h3>Drop your reference photo here</h3>
      <p>PNG, JPG or WEBP — click or drag &amp; drop</p>
      <input type="file" id="ref-input" accept="image/*" style="display:none">
    </label>
    <img id="ref-preview" class="dz-preview" alt="Reference preview">
    <button class="next-btn" onclick="goStep(2)">Next: Edit Image →</button>
  </div>
</div>
