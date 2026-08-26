<script>
// Step 3 — Grid maker
var gridBaseImg=null;
var gridPanX = 0, gridPanY = 0, isDraggingGrid = false, lastGridX, lastGridY;
var imgOffsetX = 0, imgOffsetY = 0, isDraggingImg = false;
var gridTool = 'pan';
var gridSnappedLines = []; // Format: {c1, r1, c2, r2, color}
var dragStartPoint = null; // {c, r}
var currentMousePos = null; // {x, y}

function setGridTool(tool){
  gridTool = tool;
  var panBtn = document.getElementById('gt-pan');
  var moveImgBtn = document.getElementById('gt-move-img');
  var drawBtn = document.getElementById('gt-draw');
  var eraseBtn = document.getElementById('gt-erase');
  
  if(panBtn && moveImgBtn && drawBtn && eraseBtn){
    [panBtn, moveImgBtn, drawBtn, eraseBtn].forEach(btn => btn.classList.remove('active'));
    var active = (tool === 'pan') ? panBtn : (tool === 'move-img' ? moveImgBtn : (tool === 'draw' ? drawBtn : eraseBtn));
    active.classList.add('active');
  }

  var c = document.getElementById('grid-canvas');
  if(c) {
    if(tool === 'pan' || tool === 'move-img') c.style.cursor = 'grab';
    else if(tool === 'draw') c.style.cursor = 'crosshair';
    else c.style.cursor = 'no-drop';
  }
  drawGrid();
}

function clearGridDrawings(){
  gridSnappedLines = [];
  drawGrid();
}

function toggleGridSidebar() {
  var sidebar = document.getElementById('grid-sidebar-panel');
  var btn = document.getElementById('gt-toggle-sidebar');
  if (sidebar.style.display === 'none') {
    sidebar.style.display = 'flex';
    btn.innerHTML = '▶ Hide Sidebar';
    btn.style.color = '#00d2ff';
  } else {
    sidebar.style.display = 'none';
    btn.innerHTML = '◀ Show Sidebar';
    btn.style.color = '#ff4d4d'; // Change color to indicate state
  }
  setTimeout(drawGrid, 50); // Redraw canvas just in case resize affects things
}

// Helper for Eraser tool
function distToSegment(px, py, x1, y1, x2, y2) {
  var l2 = Math.hypot(x1 - x2, y1 - y2)**2;
  if (l2 == 0) return Math.hypot(px - x1, py - y1);
  var t = ((px - x1) * (x2 - x1) + (py - y1) * (y2 - y1)) / l2;
  t = Math.max(0, Math.min(1, t));
  return Math.hypot(px - (x1 + t * (x2 - x1)), py - (y1 + t * (y2 - y1)));
}

function getClosestIntersection(sx, sy, c){
  var rect = c.getBoundingClientRect();
  var cw_int = c.width, ch_int = c.height;
  var s = Math.min(rect.width / cw_int, rect.height / ch_int);
  var ox = (rect.width - cw_int * s) / 2, oy = (rect.height - ch_int * s) / 2;
  var cx = (sx - ox) / s, cy = (sy - oy) / s;

  var zm = document.getElementById('g-zm').value/100;
  var cols=parseInt(document.getElementById('g-cols').value)||8;
  var rows=parseInt(document.getElementById('g-rows').value)||8;
  var margin=parseInt(document.getElementById('g-margin').value)||0;
  var isSquare=document.getElementById('g-square').checked;

  var availableWidth = cw_int - (margin * 2);
  var availableHeight = ch_int - (margin * 2);
  var cw = availableWidth / cols;
  var ch = availableHeight / rows;
  if(isSquare) ch = cw;

  var ix = (cx - gridPanX - cw_int/2) / zm + cw_int/2;
  var iy = (cy - gridPanY - ch_int/2) / zm + ch_int/2;

  var c_idx = Math.round((ix - margin) / cw);
  var r_idx = Math.round((iy - margin) / ch);

  if(c_idx >= 0 && c_idx <= cols && r_idx >= 0 && r_idx <= rows){
    var tx = margin + c_idx * cw, ty = margin + r_idx * ch;
    if(Math.hypot(ix - tx, iy - ty) < 30 / zm) return {c: c_idx, r: r_idx, x: tx, y: ty, ix: ix, iy: iy};
  }
  return {ix: ix, iy: iy}; 
}

function initGrid(){
  var c=document.getElementById('grid-canvas');
  gridBaseImg=new Image();
  gridBaseImg.onload=function(){
    c.width=gridBaseImg.width;
    c.height=gridBaseImg.height;
    gridPanX = 0; gridPanY = 0; 
    imgOffsetX = 0; imgOffsetY = 0;
    gridSnappedLines = [];
    drawGrid();
  };
  gridBaseImg.src=ag.edited||ag.ref;

  var lastPinchDist = null;

  function handleDown(e, isTouch){
    var rect = c.getBoundingClientRect();
    if(isTouch && e.touches.length === 2){
      lastPinchDist = Math.hypot(e.touches[0].clientX - e.touches[1].clientX, e.touches[0].clientY - e.touches[1].clientY);
      return;
    }
    var clientX = isTouch ? e.touches[0].clientX : e.clientX;
    var clientY = isTouch ? e.touches[0].clientY : e.clientY;
    var inter = getClosestIntersection(clientX - rect.left, clientY - rect.top, c);

    if(gridTool === 'pan'){
      isDraggingGrid = true;
      lastGridX = clientX; lastGridY = clientY;
      c.style.cursor = 'grabbing';
    } else if(gridTool === 'move-img'){
      isDraggingImg = true;
      lastGridX = clientX; lastGridY = clientY;
      c.style.cursor = 'grabbing';
    } else if(gridTool === 'draw'){
      if(inter.c !== undefined) dragStartPoint = inter;
    } else if(gridTool === 'erase'){
      var threshold = 15 / (document.getElementById('g-zm').value/100);
      var cols=parseInt(document.getElementById('g-cols').value)||8, rows=parseInt(document.getElementById('g-rows').value)||8;
      var margin=parseInt(document.getElementById('g-margin').value)||0, isSquare=document.getElementById('g-square').checked;
      var cw = (c.width - margin*2)/cols, ch = (isSquare ? cw : (c.height - margin*2)/rows);
      var idxToRemove = -1;
      for(var i=gridSnappedLines.length-1; i>=0; i--){
        var l = gridSnappedLines[i];
        var d = distToSegment(inter.ix, inter.iy, margin+l.c1*cw, margin+l.r1*ch, margin+l.c2*cw, margin+l.r2*ch);
        if(d < threshold) { idxToRemove = i; break; }
      }
      if(idxToRemove > -1) { gridSnappedLines.splice(idxToRemove, 1); drawGrid(); }
    }
    if(isTouch) e.preventDefault();
  }

  function handleMove(e, isTouch){
    var rect = c.getBoundingClientRect();
    if(isTouch && e.touches.length === 2 && lastPinchDist){
      var dist = Math.hypot(e.touches[0].clientX - e.touches[1].clientX, e.touches[0].clientY - e.touches[1].clientY);
      var zmInput = document.getElementById('g-zm');
      var delta = (dist - lastPinchDist) * 0.5;
      var newVal = Math.min(Math.max(50, parseInt(zmInput.value) + delta), 300);
      zmInput.value = newVal;
      lastPinchDist = dist;
      drawGrid();
      e.preventDefault();
      return;
    }

    var clientX = isTouch ? e.touches[0].clientX : e.clientX;
    var clientY = isTouch ? e.touches[0].clientY : e.clientY;

    if(isDraggingGrid && gridTool === 'pan'){
      var canvasScale = c.width / rect.width;
      gridPanX += (clientX - lastGridX) * canvasScale;
      gridPanY += (clientY - lastGridY) * canvasScale;
      lastGridX = clientX; lastGridY = clientY;
      drawGrid();
    } else if(isDraggingImg && gridTool === 'move-img'){
      var canvasScale = c.width / rect.width;
      imgOffsetX += (clientX - lastGridX) * canvasScale;
      imgOffsetY += (clientY - lastGridY) * canvasScale;
      lastGridX = clientX; lastGridY = clientY;
      drawGrid();
    } else if(dragStartPoint && gridTool === 'draw'){
      var s = Math.min(rect.width/c.width, rect.height/c.height);
      var ox = (rect.width - c.width*s)/2, oy = (rect.height - c.height*s)/2;
      var cx = (clientX - rect.left - ox)/s, cy = (clientY - rect.top - oy)/s;
      var zm = document.getElementById('g-zm').value/100;
      currentMousePos = {x: (cx - gridPanX - c.width/2)/zm + c.width/2, y: (cy - gridPanY - c.height/2)/zm + c.height/2};
      drawGrid();
    }
    if(isTouch && (isDraggingGrid || dragStartPoint)) e.preventDefault();
  }

  function handleUp(e, isTouch){
    lastPinchDist = null;
    if(dragStartPoint && gridTool === 'draw'){
      var rect = c.getBoundingClientRect();
      var clientX = isTouch ? (e.changedTouches ? e.changedTouches[0].clientX : 0) : e.clientX;
      var clientY = isTouch ? (e.changedTouches ? e.changedTouches[0].clientY : 0) : e.clientY;
      var inter = getClosestIntersection(clientX - rect.left, clientY - rect.top, c);
      if(inter.c !== undefined && (inter.c !== dragStartPoint.c || inter.r !== dragStartPoint.r)){
        gridSnappedLines.push({c1: dragStartPoint.c, r1: dragStartPoint.r, c2: inter.c, r2: inter.r});
      }
    }
    isDraggingGrid = false; isDraggingImg = false; dragStartPoint = null; currentMousePos = null;
    if(c) c.style.cursor = ((gridTool === 'pan' || gridTool === 'move-img') ? 'grab' : (gridTool === 'draw' ? 'crosshair' : 'no-drop'));
    drawGrid();
  }

  c.onmousedown = function(e){ handleDown(e, false); };
  c.ontouchstart = function(e){ handleDown(e, true); };

  if(!window.gridEventsBound){
    window.addEventListener('mousemove', function(e){ handleMove(e, false); });
    window.addEventListener('touchmove', function(e){ handleMove(e, true); }, {passive: false});
    window.addEventListener('mouseup', function(e){ handleUp(e, false); });
    window.addEventListener('touchend', function(e){ handleUp(e, true); });
    window.gridEventsBound = true;
  }

  c.onwheel = function(e){
    e.preventDefault();
    var zmInput = document.getElementById('g-zm');
    var val = parseInt(zmInput.value);
    if(e.deltaY < 0) val += 10; else val -= 10;
    zmInput.value = Math.min(Math.max(50, val), 300);
    zmInput.dispatchEvent(new Event('input'));
  };
}

function drawGrid(){
  var c=document.getElementById('grid-canvas'),ctx=c.getContext('2d');
  var cols=parseFloat(document.getElementById('g-cols').value)||8, rows=parseFloat(document.getElementById('g-rows').value)||8;
  var margin=parseInt(document.getElementById('g-margin').value)||0, isSquare=document.getElementById('g-square').checked;
  var thick=parseFloat(document.getElementById('g-thick').value)||2, color=document.getElementById('g-color').value;
  var zm=document.getElementById('g-zm').value/100;
  
  ctx.save();
  ctx.clearRect(0,0,c.width,c.height); 
  ctx.translate(gridPanX, gridPanY);
  ctx.translate(c.width/2, c.height/2); ctx.scale(zm, zm); ctx.translate(-c.width/2, -c.height/2);
  ctx.drawImage(gridBaseImg, imgOffsetX, imgOffsetY);
  
  var cw = (c.width - margin*2)/cols, ch = (isSquare ? cw : (c.height - margin*2)/rows);
  if(isSquare) { rows = (c.height - margin*2)/ch; document.getElementById('g-rows').value = Math.floor(rows*100)/100; }

  // Draw Snapped Lines (using Grid Color)
  ctx.strokeStyle = color; ctx.lineWidth = (thick * 1.5) / zm;
  gridSnappedLines.forEach(l => {
    ctx.beginPath(); ctx.moveTo(margin + l.c1 * cw, margin + l.r1 * ch); ctx.lineTo(margin + l.c2 * cw, margin + l.r2 * ch); ctx.stroke();
  });

  // Preview Line
  if(dragStartPoint && currentMousePos){
    ctx.setLineDash([5, 5]); ctx.beginPath(); ctx.moveTo(margin + dragStartPoint.c * cw, margin + dragStartPoint.r * ch);
    ctx.lineTo(currentMousePos.x, currentMousePos.y); ctx.stroke(); ctx.setLineDash([]);
  }

  // Grid Lines
  drawGridLines(ctx, cols, rows, cw, ch, margin, thick, color, c.width, c.height, zm);

  // Intersection Dots (only in Draw/Erase mode)
  if(gridTool === 'draw' || gridTool === 'erase'){
    ctx.fillStyle = color;
    for(var i=0; i<=cols; i++) for(var j=0; j<=rows; j++){
      ctx.beginPath(); ctx.arc(margin + i*cw, margin + j*ch, 4/zm, 0, Math.PI*2); ctx.fill();
    }
  }

  var showLabels = document.getElementById('g-labels') ? document.getElementById('g-labels').checked : false;
  if (showLabels) {
      drawGridLabels(ctx, cols, rows, cw, ch, margin, color, zm);
  }

  var showDims = document.getElementById('g-show-dims') ? document.getElementById('g-show-dims').checked : false;
  if (showDims) {
      drawGridDims(ctx, cw, ch, margin, color, zm);
  }

  ctx.restore();
  var zVal = Math.round(zm * 100) + '%';
  document.getElementById('g-zm-val').textContent = zVal;
  var zi = document.getElementById('g-zm-indicator'); if(zi) zi.textContent = zVal;
  ag.grid=c.toDataURL('image/png');
}
['g-rows','g-cols','g-thick','g-color','g-zm','g-margin','g-square','g-labels','g-lbl-size','g-lbl-color','g-show-dims','g-phys-size','g-phys-unit','g-cross'].forEach(function(id){
  var el = document.getElementById(id);
  if(el) {
    el.addEventListener('input',function(){
      drawGrid();
    });
  }
});

function drawGridLabels(ctx, cols, rows, cw, ch, margin, _gridColor, zoom) {
    var lblSizeInput = document.getElementById('g-lbl-size');
    var lblColorInput = document.getElementById('g-lbl-color');
    var baseFontSize = lblSizeInput ? parseFloat(lblSizeInput.value) : 14;
    var lblColor = lblColorInput ? lblColorInput.value : "#0084ff";
    
    var fontSize = baseFontSize / zoom;
    ctx.font = "bold " + fontSize + "px Arial";

    for (var i = 0; i < cols; i++) {
        var charIdx = i;
        var letter = "";
        while (charIdx >= 0) {
            letter = String.fromCharCode(65 + (charIdx % 26)) + letter;
            charIdx = Math.floor(charIdx / 26) - 1;
        }
        // Place Column letters exactly at the top-right of the cell to prevent overlap
        ctx.textAlign = "right";
        ctx.textBaseline = "top";
        var tx = margin + i * cw + cw - 4/zoom;
        var ty = margin + 4/zoom; 

        ctx.lineWidth = (3 / zoom);
        ctx.strokeStyle = "#ffffff"; ctx.strokeText(letter, tx, ty);
        ctx.fillStyle = lblColor; ctx.fillText(letter, tx, ty);
    }
    for (var j = 0; j < rows; j++) {
        var num = (j + 1).toString();
        // Place Row numbers exactly at the bottom-left of the cell to prevent overlap
        ctx.textAlign = "left";
        ctx.textBaseline = "bottom";
        var tx = margin + 4/zoom; 
        var ty = margin + j * ch + ch - 4/zoom;

        ctx.lineWidth = (3 / zoom);
        ctx.strokeStyle = "#ffffff"; ctx.strokeText(num, tx, ty);
        ctx.fillStyle = lblColor; ctx.fillText(num, tx, ty);
    }
}

function drawGridDims(ctx, cw, ch, margin, color, zoom) {
      var sizeVal = document.getElementById('g-phys-size') ? document.getElementById('g-phys-size').value : "1";
      var unitVal = document.getElementById('g-phys-unit') ? document.getElementById('g-phys-unit').value : "cm";
      var dimLabel = sizeVal + " " + unitVal;
      var lblColor = document.getElementById('g-lbl-color') ? document.getElementById('g-lbl-color').value : color;
      
      var dimFontSize = Math.max(10, Math.min(cw, ch) * 0.18) / zoom;
      ctx.font = "bold " + dimFontSize + "px Arial";
      ctx.fillStyle = lblColor;
      ctx.strokeStyle = "#ffffff";
      ctx.lineWidth = 3/zoom;
      
      // Width label inside top edge of cell 0,0
      ctx.textAlign = "center";
      ctx.textBaseline = "top";
      var tyX = margin + 2/zoom;
      ctx.strokeText(dimLabel, margin + cw/2, tyX);
      ctx.fillText(dimLabel, margin + cw/2, tyX);

      // Height label inside left edge of cell 0,0
      ctx.save();
      ctx.translate(margin + 2/zoom, margin + ch/2);
      ctx.rotate(-Math.PI/2);
      ctx.textAlign = "center";
      ctx.textBaseline = "bottom"; 
      ctx.strokeText(dimLabel, 0, 0);
      ctx.fillText(dimLabel, 0, 0);
      ctx.restore();
}

function drawGridLines(ctx, cols, rows, cw, ch, margin, thick, color, canvasW, canvasH, zoom) {
  // Main Lines
  ctx.strokeStyle = color; 
  ctx.lineWidth = thick / zoom;
  ctx.beginPath();
  for(var i=0; i<=Math.ceil(cols); i++){ 
      var x = margin + i*cw; 
      if (x > canvasW - margin + 0.1) x = canvasW - margin;
      ctx.moveTo(x, margin); ctx.lineTo(x, margin + rows*ch); 
  }
  for(var j=0; j<=Math.ceil(rows); j++){ 
      var y = margin + j*ch; 
      if (y > canvasH - margin + 0.1) y = canvasH - margin;
      ctx.moveTo(margin, y); ctx.lineTo(margin + cols*cw, y); 
  }
  ctx.stroke();

  // Cross Lines
  var showCross = document.getElementById('g-cross') ? document.getElementById('g-cross').checked : false;
  if(showCross) {
      ctx.save();
      ctx.beginPath();
      ctx.rect(margin, margin, Math.min(cols*cw, canvasW-margin*2), Math.min(rows*ch, canvasH-margin*2));
      ctx.clip();
      
      ctx.beginPath();
      ctx.lineWidth = (thick / zoom) * 0.5; // thinner for diagonals
      for (var i=0; i<Math.ceil(cols); i++) {
          for (var j=0; j<Math.ceil(rows); j++) {
             var x1 = margin + i*cw;
             var y1 = margin + j*ch;
             var x2 = margin + (i+1)*cw;
             var y2 = margin + (j+1)*ch;
             ctx.moveTo(x1, y1); ctx.lineTo(x2, y2);
             ctx.moveTo(x2, y1); ctx.lineTo(x1, y2);
          }
      }
      ctx.stroke();
      ctx.restore();
  }
}

function downloadGrid(){
  var tempC = document.createElement('canvas');
  tempC.width = gridBaseImg.width;
  tempC.height = gridBaseImg.height;
  var ctx = tempC.getContext('2d');
  
  var cols=parseInt(document.getElementById('g-cols').value)||8;
  var rows=parseInt(document.getElementById('g-rows').value)||8;
  var margin=parseInt(document.getElementById('g-margin').value)||0;
  var isSquare=document.getElementById('g-square').checked;
  var thick=parseFloat(document.getElementById('g-thick').value)||2;
  var color=document.getElementById('g-color').value;
  
  ctx.drawImage(gridBaseImg, imgOffsetX, imgOffsetY);
  
  var cw = (tempC.width - margin*2)/cols;
  var ch = (isSquare ? cw : (tempC.height - margin*2)/rows);
  var actualRows = isSquare ? Math.floor((tempC.height - margin*2)/ch) : rows;

  // Snapped Lines
  ctx.strokeStyle = color; ctx.lineWidth = thick * 1.5;
  gridSnappedLines.forEach(l => {
    ctx.beginPath(); ctx.moveTo(margin + l.c1 * cw, margin + l.r1 * ch); ctx.lineTo(margin + l.c2 * cw, margin + l.r2 * ch); ctx.stroke();
  });

  // Grid Lines
  drawGridLines(ctx, cols, actualRows, cw, ch, margin, thick, color, tempC.width, tempC.height, 1);

  var showLabels = document.getElementById('g-labels') ? document.getElementById('g-labels').checked : false;
  if(showLabels) {
      drawGridLabels(ctx, cols, actualRows, cw, ch, margin, color, 1);
  }

  var showDims = document.getElementById('g-show-dims') ? document.getElementById('g-show-dims').checked : false;
  if (showDims) {
      drawGridDims(ctx, cw, ch, margin, color, 1);
  }

  var a = document.createElement('a');
  a.download = 'high_quality_grid.png';
  a.href = tempC.toDataURL('image/png', 1.0);
  a.click();
}

function downloadGridOnly(){
  var tempC = document.createElement('canvas');
  tempC.width = gridBaseImg.width;
  tempC.height = gridBaseImg.height;
  var ctx = tempC.getContext('2d');
  
  var cols=parseInt(document.getElementById('g-cols').value)||8;
  var rows=parseInt(document.getElementById('g-rows').value)||8;
  var margin=parseInt(document.getElementById('g-margin').value)||0;
  var isSquare=document.getElementById('g-square').checked;
  var thick=parseFloat(document.getElementById('g-thick').value)||2;
  var color=document.getElementById('g-color').value;
  
  // No base image drawn to keep background transparent
  // ctx.drawImage(gridBaseImg, imgOffsetX, imgOffsetY);
  
  var cw = (tempC.width - margin*2)/cols;
  var ch = (isSquare ? cw : (tempC.height - margin*2)/rows);
  var actualRows = isSquare ? Math.floor((tempC.height - margin*2)/ch) : rows;

  // Snapped Lines
  ctx.strokeStyle = color; ctx.lineWidth = thick * 1.5;
  gridSnappedLines.forEach(l => {
    ctx.beginPath(); ctx.moveTo(margin + l.c1 * cw, margin + l.r1 * ch); ctx.lineTo(margin + l.c2 * cw, margin + l.r2 * ch); ctx.stroke();
  });

  // Grid Lines
  drawGridLines(ctx, cols, actualRows, cw, ch, margin, thick, color, tempC.width, tempC.height, 1);

  var showLabels = document.getElementById('g-labels') ? document.getElementById('g-labels').checked : false;
  if(showLabels) {
      drawGridLabels(ctx, cols, actualRows, cw, ch, margin, color, 1);
  }

  var showDims = document.getElementById('g-show-dims') ? document.getElementById('g-show-dims').checked : false;
  if (showDims) {
      drawGridDims(ctx, cw, ch, margin, color, 1);
  }

  var a = document.createElement('a');
  a.download = 'grid_only.png';
  a.href = tempC.toDataURL('image/png', 1.0);
  a.click();
}

function applyAndNextStep3() {
    if (!ag.projectId) {
        alert("Error: Project ID is missing. Please start over.");
        return;
    }

    if (!ag.grid) {
        alert("Error: Grid image is not generated yet.");
        return;
    }

    var btn = document.getElementById('btn-next-step3');
    if(btn) btn.disabled = true;

    var formData = new FormData();
    formData.append('project_id', ag.projectId);
    formData.append('grid_image', ag.grid);

    showSubmitPreloader();

    fetch("View-List/AIGrader/grid_drawing_projects_UPDATE_STEP3.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(res => {
        hideSubmitPreloader();
        if(btn) btn.disabled = false;
        if (res.status === 'success') {
            goStep(4);
        } else {
            alert('Error: ' + res.message);
        }
    })
    .catch(err => {
        hideSubmitPreloader();
        if(btn) btn.disabled = false;
        console.error(err);
        alert('Network or server error occurred.');
    });
}

function calculatePhysicalGrid() {
    var template = document.getElementById('g-paper-template').value;
    if (!template) {
        alert("Please select a paper preset!");
        return;
    }
    
    var dims = template.split(",");
    var widthCm = parseFloat(dims[0]);
    var heightCm = parseFloat(dims[1]);
    
    var size = parseFloat(document.getElementById('g-phys-size').value);
    var unit = document.getElementById('g-phys-unit').value;
    
    if (isNaN(size) || size <= 0) {
        alert("Please enter a valid grid size.");
        return;
    }
    
    var paperWidth = unit === 'inch' ? (widthCm / 2.54) : widthCm;
    var paperHeight = unit === 'inch' ? (heightCm / 2.54) : heightCm;
    
    var calculatedCols = paperWidth / size;
    var calculatedRows = paperHeight / size;
    
    document.getElementById('g-cols').value = calculatedCols.toFixed(2);
    document.getElementById('g-rows').value = calculatedRows.toFixed(2);
    
    var dimsMarker = document.getElementById('g-show-dims');
    if (dimsMarker) dimsMarker.checked = true;

    drawGrid();
}
</script>
