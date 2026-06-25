<script>
// Step 2 — Modern Image Editor (Fabric.js)
var canvasV2 = null, originalImageV2 = null, historyV2 = [], redoStackV2 = [], currentZoomV2 = 1;
var isDrawingV2 = false, cropRectV2 = null;

function initEdit() {
  if (canvasV2) canvasV2.dispose();
  
  var workspace = document.getElementById('canvas-workspace');
  canvasV2 = new fabric.Canvas('main-editor-canvas', {
    width: workspace.clientWidth - 80,
    height: workspace.clientHeight - 80,
    backgroundColor: 'transparent'
  });

  fabric.Image.fromURL(ag.ref, function(img) {
    originalImageV2 = img;
    setupCanvas();
    saveStateV2();
  }, { crossOrigin: 'anonymous' });

  // Attach events
  canvasV2.on('object:modified', saveStateV2);
  canvasV2.on('object:added', function(e) {
    if (originalImageV2 && e.target !== originalImageV2 && e.target !== cropRectV2 && !canvasV2._loading) saveStateV2();
  });

  // Mouse wheel zoom to cursor
  canvasV2.on('mouse:wheel', function(opt) {
    var delta = opt.e.deltaY;
    var zoom = canvasV2.getZoom();
    zoom *= 0.999 ** delta;
    if (zoom > 5) zoom = 5;
    if (zoom < 0.1) zoom = 0.1;
    
    // Zoom to cursor point
    canvasV2.zoomToPoint({ x: opt.e.offsetX, y: opt.e.offsetY }, zoom);
    
    opt.e.preventDefault();
    opt.e.stopPropagation();
    
    currentZoomV2 = zoom;
    var zVal = document.getElementById('editor-zoom-val');
    if (zVal) zVal.textContent = Math.round(zoom * 100) + '%';
  });

  canvasV2.on('mouse:down', function(opt) {
    var evt = opt.e;
    if (evt.altKey === true) {
      this.isDragging = true;
      this.selection = false;
      this.lastPosX = evt.clientX;
      this.lastPosY = evt.clientY;
    }
  });

  canvasV2.on('mouse:move', function(opt) {
    if (this.isDragging) {
      var e = opt.e;
      var vpt = this.viewportTransform;
      vpt[4] += e.clientX - this.lastPosX;
      vpt[5] += e.clientY - this.lastPosY;
      this.requestRenderAll();
      this.lastPosX = e.clientX;
      this.lastPosY = e.clientY;
    }
  });

  canvasV2.on('mouse:up', function(opt) {
    this.isDragging = false;
    this.selection = true;
  });

  // Initialize Lucide icons
  if (window.lucide) lucide.createIcons();

  // Crop ratio listener
  document.getElementById('m-crop-ratio').addEventListener('change', function() {
    var ratio = parseFloat(this.value);
    if (cropRectV2) {
      if (ratio > 0) {
        cropRectV2.set('height', cropRectV2.width / ratio);
      }
      canvasV2.renderAll();
    }
  });

  setTool('filter');
}

// ... (rest of the functions remain same) ...

// Event Listeners (Global)
document.addEventListener('input', function(e) {
  if (['m-br', 'm-ct', 'm-sa', 'm-bl'].includes(e.target.id)) applyModernFilters();
  if (e.target.id === 'm-brush-size' && canvasV2 && canvasV2.freeDrawingBrush) {
    canvasV2.freeDrawingBrush.width = parseInt(e.target.value);
    document.getElementById('val-brush').textContent = e.target.value + 'px';
  }
});

// Window resize handling
window.addEventListener('resize', function() {
  if (ag.step === 2 && canvasV2) {
    var workspace = document.getElementById('canvas-workspace');
    canvasV2.setDimensions({
      width: workspace.clientWidth - 80,
      height: workspace.clientHeight - 80
    });
    canvasV2.renderAll();
  }
});

function setupCanvas() {
  if (!originalImageV2) return;
  
  // Scale image to fit initial workspace nicely
  var workspace = document.getElementById('canvas-workspace');
  var maxWidth = workspace.clientWidth * 0.8;
  var maxHeight = workspace.clientHeight * 0.8;
  
  var scale = Math.min(maxWidth / originalImageV2.width, maxHeight / originalImageV2.height, 1);
  
  canvasV2.setDimensions({
    width: originalImageV2.width * scale,
    height: originalImageV2.height * scale
  });
  
  originalImageV2.set({
    scaleX: scale,
    scaleY: scale,
    left: 0,
    top: 0,
    selectable: false,
    evented: false
  });
  
  canvasV2.clear();
  canvasV2.add(originalImageV2);
  canvasV2.centerObject(originalImageV2);
  canvasV2.renderAll();
  
  // Update UI inputs
  document.getElementById('m-width').value = Math.round(originalImageV2.width * originalImageV2.scaleX);
  document.getElementById('m-height').value = Math.round(originalImageV2.height * originalImageV2.scaleY);
}

function setTool(tool) {
  // UI update
  document.querySelectorAll('.tool-btn').forEach(b => b.classList.remove('active'));
  document.getElementById('btn-tool-' + tool).classList.add('active');
  
  document.querySelectorAll('.sidebar-panel').forEach(p => p.classList.remove('active'));
  document.getElementById('panel-' + tool).classList.add('active');
  
  // Canvas logic
  canvasV2.isDrawingMode = (tool === 'draw');
  if (tool === 'draw') {
    canvasV2.freeDrawingBrush = new fabric.PencilBrush(canvasV2);
    canvasV2.freeDrawingBrush.width = parseInt(document.getElementById('m-brush-size').value);
    canvasV2.freeDrawingBrush.color = document.getElementById('m-brush-color').value;
  }
  
  // Disable selection unless in Text or Shapes or Draw
  canvasV2.selection = (tool === 'text' || tool === 'shapes');
  canvasV2.forEachObject(obj => {
    if (obj !== originalImageV2) {
      obj.selectable = (tool === 'text' || tool === 'shapes');
    }
  });

  // Special logic for Crop
  if (tool === 'crop') {
    startCropModeV2();
  } else {
    stopCropModeV2();
  }
  
  canvasV2.renderAll();
}

// --- Filters ---
function applyModernFilters() {
  if (!originalImageV2) return;
  
  var br = parseFloat(document.getElementById('m-br').value);
  var ct = parseFloat(document.getElementById('m-ct').value);
  var sa = parseFloat(document.getElementById('m-sa').value);
  var bl = parseFloat(document.getElementById('m-bl').value);
  
  document.getElementById('val-br').textContent = Math.round((br + 1) * 100) + '%';
  document.getElementById('val-ct').textContent = Math.round((ct + 1) * 100) + '%';
  document.getElementById('val-sa').textContent = Math.round(sa * 100) + '%';
  document.getElementById('val-bl').textContent = Math.round(bl * 10) + 'px';

  originalImageV2.filters = [];
  if (br !== 0) originalImageV2.filters.push(new fabric.Image.filters.Brightness({ brightness: br }));
  if (ct !== 0) originalImageV2.filters.push(new fabric.Image.filters.Contrast({ contrast: ct }));
  if (sa !== 0) originalImageV2.filters.push(new fabric.Image.filters.Saturation({ saturation: sa }));
  if (bl !== 0) originalImageV2.filters.push(new fabric.Image.filters.Blur({ blur: bl }));
  
  originalImageV2.applyFilters();
  canvasV2.renderAll();
}

function resetFilters() {
  document.getElementById('m-br').value = 0;
  document.getElementById('m-ct').value = 0;
  document.getElementById('m-sa').value = 0;
  document.getElementById('m-bl').value = 0;
  applyModernFilters();
}

// --- Resize ---
function applyResize() {
  var w = parseInt(document.getElementById('m-width').value);
  var h = parseInt(document.getElementById('m-height').value);
  
  var scaleX = w / originalImageV2.width;
  var scaleY = h / originalImageV2.height;
  
  originalImageV2.set({ scaleX: scaleX, scaleY: scaleY });
  canvasV2.setDimensions({ width: w, height: h });
  canvasV2.centerObject(originalImageV2);
  canvasV2.renderAll();
  saveStateV2();
}

// --- Crop ---
function startCropModeV2() {
  stopCropModeV2();
  var ratio = parseFloat(document.getElementById('m-crop-ratio').value);
  
  cropRectV2 = new fabric.Rect({
    fill: 'rgba(0,0,0,0.3)',
    stroke: '#fe621d',
    strokeWidth: 2,
    strokeDashArray: [5, 5],
    width: canvasV2.width * 0.8,
    height: canvasV2.height * 0.8,
    left: canvasV2.width * 0.1,
    top: canvasV2.height * 0.1,
    cornerColor: '#fe621d',
    cornerSize: 10,
    transparentCorners: false
  });
  
  if (ratio > 0) {
    if (cropRectV2.width / cropRectV2.height > ratio) {
      cropRectV2.width = cropRectV2.height * ratio;
    } else {
      cropRectV2.height = cropRectV2.width / ratio;
    }
  }
  
  canvasV2.add(cropRectV2);
  canvasV2.setActiveObject(cropRectV2);
}

function stopCropModeV2() {
  if (cropRectV2) {
    canvasV2.remove(cropRectV2);
    cropRectV2 = null;
  }
}

function applyCropV2() {
  if (!cropRectV2) return;
  
  var zoom = canvasV2.getZoom();
  var left = cropRectV2.left / zoom;
  var top = cropRectV2.top / zoom;
  var width = cropRectV2.width * cropRectV2.scaleX / zoom;
  var height = cropRectV2.height * cropRectV2.scaleY / zoom;
  
  // Create a temporary canvas to get the cropped area
  var tempCanvas = document.createElement('canvas');
  tempCanvas.width = width;
  tempCanvas.height = height;
  var ctx = tempCanvas.getContext('2d');
  
  // Render the current canvas content to the temp canvas, but offset to the crop area
  var dataUrl = canvasV2.toDataURL({
    left: left,
    top: top,
    width: width,
    height: height,
    format: 'png'
  });
  
  fabric.Image.fromURL(dataUrl, function(img) {
    originalImageV2 = img;
    canvasV2.clear();
    canvasV2.setDimensions({ width: width, height: height });
    canvasV2.add(originalImageV2);
    canvasV2.renderAll();
    stopCropModeV2();
    saveStateV2();
    setTool('filter');
  });
}

// --- Transform ---
function rotateCanvas(deg) {
  var angle = originalImageV2.angle + deg;
  originalImageV2.set('angle', angle);
  canvasV2.renderAll();
  saveStateV2();
}

function flipCanvas(dir) {
  if (dir === 'h') originalImageV2.set('flipX', !originalImageV2.flipX);
  else originalImageV2.set('flipY', !originalImageV2.flipY);
  canvasV2.renderAll();
  saveStateV2();
}

// --- Draw / Text / Shapes ---
function setBrushColor(color, el) {
  document.querySelectorAll('.color-dot').forEach(d => d.classList.remove('active'));
  if (el) el.classList.add('active');
  document.getElementById('m-brush-color').value = color;
  if (canvasV2.freeDrawingBrush) canvasV2.freeDrawingBrush.color = color;
}

function addTextV2() {
  var text = new fabric.IText('Double click to edit', {
    left: 100,
    top: 100,
    fontFamily: document.getElementById('m-font-family').value,
    fill: document.getElementById('m-brush-color').value,
    fontSize: 30
  });
  canvasV2.add(text);
  canvasV2.setActiveObject(text);
  saveStateV2();
}

function addShape(type) {
  var shape;
  var color = document.getElementById('m-brush-color').value;
  if (type === 'rect') {
    shape = new fabric.Rect({ width: 100, height: 100, fill: color, left: 100, top: 100 });
  } else if (type === 'circle') {
    shape = new fabric.Circle({ radius: 50, fill: color, left: 100, top: 100 });
  } else if (type === 'triangle') {
    shape = new fabric.Triangle({ width: 100, height: 100, fill: color, left: 100, top: 100 });
  }
  canvasV2.add(shape);
  canvasV2.setActiveObject(shape);
  saveStateV2();
}

// --- History / State ---
function saveStateV2() {
  historyV2.push(JSON.stringify(canvasV2));
  redoStackV2 = [];
}

function undoV2() {
  if (historyV2.length <= 1) return;
  redoStackV2.push(historyV2.pop());
  var state = historyV2[historyV2.length - 1];
  canvasV2.loadFromJSON(state, function() {
    canvasV2.renderAll();
    // Re-assign originalImageV2 reference
    originalImageV2 = canvasV2.getObjects().find(o => o.type === 'image');
  });
}

function redoV2() {
  if (redoStackV2.length === 0) return;
  var state = redoStackV2.pop();
  historyV2.push(state);
  canvasV2.loadFromJSON(state, function() {
    canvasV2.renderAll();
    originalImageV2 = canvasV2.getObjects().find(o => o.type === 'image');
  });
}

function resetEditor() {
  showConfirm('Reset all changes?', 'Reset', 'Keep edits', initEdit);
}

// --- Zoom ---
function zoomEditor(delta) {
  currentZoomV2 += delta;
  currentZoomV2 = Math.min(Math.max(0.1, currentZoomV2), 5);
  // Zoom to center of the canvas
  canvasV2.zoomToPoint({ x: canvasV2.width / 2, y: canvasV2.height / 2 }, currentZoomV2);
  document.getElementById('editor-zoom-val').textContent = Math.round(currentZoomV2 * 100) + '%';
}

// --- Next Step ---
function applyAndNextV2() {
  stopCropModeV2();
  canvasV2.setZoom(1); // Reset zoom for export
  ag.edited = canvasV2.toDataURL({ format: 'png', quality: 1.0 });
  goStep(3);
}

// Events handled inside initEdit and global listeners above

</script>
