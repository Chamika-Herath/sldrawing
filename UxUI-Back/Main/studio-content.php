<!-- Studio Page Component -->
<main class="container section-padding">
    <div class="studio-header">
        <div class="studio-header-text">
            <h1 style="font-size: 3rem; color: var(--text);">SLdrawing <span style="color: var(--primary);">Studio</span></h1>
            <p style="color: var(--text-dim);">Unleash your creativity with professional-grade editing tools.</p>
        </div>
        <div class="studio-header-action">
            <label for="studio-upload" class="btn" style="padding: 12px 30px; background: var(--primary); color: #fff; border-radius: 10px; cursor: pointer; font-weight: 700; white-space: nowrap;">Upload Image</label>
            <input type="file" id="studio-upload" style="display: none;" accept="image/*">
        </div>
    </div>

    <div class="modern-editor-wrap reveal">
        
        <!-- Top Toolbar -->
        <div class="editor-toolbar">
            <div class="tool-group">
                <button class="tool-btn active" onclick="studioSetTool('filter')" id="studio-btn-tool-filter">
                    <i data-lucide="sliders-horizontal"></i>
                    <span>Filter & Light</span>
                </button>
                <button class="tool-btn" onclick="studioSetTool('resize')" id="studio-btn-tool-resize">
                    <i data-lucide="maximize"></i>
                    <span>Resize</span>
                </button>
                <button class="tool-btn" onclick="studioSetTool('crop')" id="studio-btn-tool-crop">
                    <i data-lucide="crop"></i>
                    <span>Crop Image</span>
                </button>
                <button class="tool-btn" onclick="studioSetTool('transform')" id="studio-btn-tool-transform">
                    <i data-lucide="rotate-cw"></i>
                    <span>Transform</span>
                </button>
            </div>
            
            <div class="tool-divider"></div>
            
            <div class="tool-group">
                <button class="tool-btn" onclick="studioSetTool('draw')" id="studio-btn-tool-draw">
                    <i data-lucide="pencil"></i>
                    <span>Draw</span>
                </button>
                <button class="tool-btn" onclick="studioSetTool('text')" id="studio-btn-tool-text">
                    <i data-lucide="type"></i>
                    <span>Text</span>
                </button>
                <button class="tool-btn" onclick="studioSetTool('shapes')" id="studio-btn-tool-shapes">
                    <i data-lucide="shapes"></i>
                    <span>Shapes</span>
                </button>
                <button class="tool-btn" onclick="studioSetTool('image')" id="studio-btn-tool-image">
                    <i data-lucide="image"></i>
                    <span>Add Image</span>
                </button>
            </div>
        </div>

        <div class="editor-main">
            <!-- Sidebar Panels (Dynamic) -->
            <div class="editor-sidebar">
                
                <!-- Filter Panel -->
                <div class="sidebar-panel active" id="studio-panel-filter">
                    <h3>Filter & Light</h3>
                    <div class="control-item">
                        <label>Brightness <span id="studio-val-br">100%</span></label>
                        <input type="range" class="modern-range" id="studio-m-br" min="-1" max="1" step="0.01" value="0">
                    </div>
                    <div class="control-item">
                        <label>Contrast <span id="studio-val-ct">100%</span></label>
                        <input type="range" class="modern-range" id="studio-m-ct" min="-1" max="1" step="0.01" value="0">
                    </div>
                    <div class="control-item">
                        <label>Saturation <span id="studio-val-sa">0%</span></label>
                        <input type="range" class="modern-range" id="studio-m-sa" min="-1" max="1" step="0.01" value="0">
                    </div>
                    <div class="control-item">
                        <label>Blur <span id="studio-val-bl">0px</span></label>
                        <input type="range" class="modern-range" id="studio-m-bl" min="0" max="1" step="0.01" value="0">
                    </div>
                    <button class="panel-action-btn" onclick="studioResetFilters()">Reset Filters</button>
                </div>

                <!-- Resize Panel -->
                <div class="sidebar-panel" id="studio-panel-resize">
                    <h3>Resize Image</h3>
                    <div class="control-item">
                        <label>Width (px)</label>
                        <input type="number" id="studio-m-width" class="modern-input">
                    </div>
                    <div class="control-item">
                        <label>Height (px)</label>
                        <input type="number" id="studio-m-height" class="modern-input">
                    </div>
                    <div class="control-item">
                        <label style="display:flex; align-items:center; gap:8px; cursor:pointer;">
                            <input type="checkbox" id="studio-m-lock-aspect" checked> Lock Aspect Ratio
                        </label>
                    </div>
                    <button class="panel-action-btn primary" onclick="studioApplyResize()">Apply Resize</button>
                </div>

                <!-- Crop Panel -->
                <div class="sidebar-panel" id="studio-panel-crop">
                    <h3>Crop Image</h3>
                    <div class="control-item">
                        <label>Paper / Aspect Ratio</label>
                        <select id="studio-m-crop-ratio" class="modern-select">
                            <option value="0">Free Hand</option>
                            <option value="0.707">A3/A4/A5 (Portrait)</option>
                            <option value="1.414">A3/A4/A5 (Landscape)</option>
                            <option value="1">Square (1:1)</option>
                            <option value="0.75">4:3</option>
                            <option value="1.777">16:9</option>
                        </select>
                    </div>
                    <button class="panel-action-btn primary" onclick="studioApplyCrop()">Apply Crop</button>
                </div>

                <!-- Transform Panel -->
                <div class="sidebar-panel" id="studio-panel-transform">
                    <h3>Transform</h3>
                    <div class="transform-grid">
                        <button class="icon-action-btn" onclick="studioRotateCanvas(-90)" title="Rotate Left">
                            <i data-lucide="rotate-ccw"></i>
                        </button>
                        <button class="icon-action-btn" onclick="studioRotateCanvas(90)" title="Rotate Right">
                            <i data-lucide="rotate-cw"></i>
                        </button>
                        <button class="icon-action-btn" onclick="studioFlipCanvas('h')" title="Flip Horizontal">
                            <i data-lucide="flip-horizontal"></i>
                        </button>
                        <button class="icon-action-btn" onclick="studioFlipCanvas('v')" title="Flip Vertical">
                            <i data-lucide="flip-vertical"></i>
                        </button>
                    </div>
                </div>

                <!-- Draw Panel -->
                <div class="sidebar-panel" id="studio-panel-draw">
                    <h3>Drawing Tools</h3>
                    <div class="control-item">
                        <label>Brush Size <span id="studio-val-brush">10px</span></label>
                        <input type="range" class="modern-range" id="studio-m-brush-size" min="1" max="50" value="10">
                    </div>
                    <div class="control-item">
                        <label>Color</label>
                        <div class="color-presets">
                            <div class="color-dot active" style="background:#000" onclick="studioSetBrushColor('#000', this)"></div>
                            <div class="color-dot" style="background:#fff; border:1px solid #ddd" onclick="studioSetBrushColor('#fff', this)"></div>
                            <div class="color-dot" style="background:#ff4757" onclick="studioSetBrushColor('#ff4757', this)"></div>
                            <div class="color-dot" style="background:#2ed573" onclick="studioSetBrushColor('#2ed573', this)"></div>
                            <div class="color-dot" style="background:#1e90ff" onclick="studioSetBrushColor('#1e90ff', this)"></div>
                            <input type="color" id="studio-m-brush-color" value="#000000" style="width:30px; height:30px; border:none; padding:0; cursor:pointer;">
                        </div>
                    </div>
                </div>

                <!-- Text Panel -->
                <div class="sidebar-panel" id="studio-panel-text">
                    <h3>Add Text</h3>
                    <button class="panel-action-btn primary" onclick="studioAddText()">Add New Text</button>
                    <div id="studio-text-controls" style="margin-top:20px; display:none;">
                        <div class="control-item">
                            <label>Font Family</label>
                            <select id="studio-m-font-family" class="modern-select">
                                <option value="Arial">Arial</option>
                                <option value="Times New Roman">Serif</option>
                                <option value="Courier New">Monospace</option>
                                <option value="Inter">Modern</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Shapes Panel -->
                <div class="sidebar-panel" id="studio-panel-shapes">
                    <h3>Shapes</h3>
                    <div class="shapes-grid">
                        <button class="shape-btn" onclick="studioAddShape('rect')">
                            <i data-lucide="square"></i>
                        </button>
                        <button class="shape-btn" onclick="studioAddShape('circle')">
                            <i data-lucide="circle"></i>
                        </button>
                        <button class="shape-btn" onclick="studioAddShape('triangle')">
                            <i data-lucide="triangle"></i>
                        </button>
                    </div>
                </div>

                <!-- Add Image Panel -->
                <div class="sidebar-panel" id="studio-panel-image">
                    <h3>Add Image</h3>
                    <div class="control-item">
                        <label for="studio-add-image-upload" class="panel-action-btn primary" style="display: block; text-align: center; cursor: pointer; padding: 14px; border-radius: 12px; font-weight: 800; margin-bottom: 0;">Upload Overlay Image</label>
                        <input type="file" id="studio-add-image-upload" style="display: none;" accept="image/*">
                    </div>
                </div>

            </div>

            <!-- Canvas Area -->
            <div class="canvas-workspace" id="studio-canvas-workspace">
                <!-- Empty State Placeholder -->
                <label for="studio-upload" id="studio-empty-state" class="empty-state-placeholder">
                    <i data-lucide="image" style="width: 48px; height: 48px; color: var(--text-dim); margin-bottom: 10px;"></i>
                    <p style="color: var(--text-dim); font-size: 1.2rem; font-weight: 600; margin: 0;">Click to Add Main Image</p>
                </label>
                
                <div class="canvas-container-outer">
                    <canvas id="studio-canvas"></canvas>
                </div>
                
                <!-- Recycle Bin -->
                <div id="studio-recycle-bin" class="studio-recycle-bin">
                    <i data-lucide="trash-2"></i>
                </div>
            </div>

        </div>

        <!-- Bottom Control Bar -->
        <div class="editor-footer">
            <div class="footer-left">
                <button class="footer-btn" onclick="studioUndo()" title="Undo">
                    <i data-lucide="undo-2"></i>
                </button>
                <button class="footer-btn" onclick="studioRedo()" title="Redo">
                    <i data-lucide="redo-2"></i>
                </button>
                <button class="footer-btn" onclick="studioReset()" title="Reset All">
                    <i data-lucide="refresh-cw"></i>
                </button>
            </div>
            
            <div class="footer-center">
                <div class="zoom-controls">
                    <button onclick="studioZoom(-0.1)"><i data-lucide="minus"></i></button>
                    <span id="studio-zoom-val">100%</span>
                    <button onclick="studioZoom(0.1)"><i data-lucide="plus"></i></button>
                </div>
            </div>

            <div class="footer-right" style="display:flex; gap:12px; align-items:center; justify-content:flex-end; flex-wrap:wrap;">
                <button class="nav-btn next-btn" onclick="studioDownload()" style="gap:8px;">
                    <i data-lucide="download"></i>
                    <span>Download</span>
                </button>
            </div>
        </div>
    </div>
</main>

<style>
.modern-editor-wrap { background: var(--surface); border-radius: 24px; overflow: hidden; box-shadow: var(--shadow); border: 1px solid var(--glass-border); display: flex; flex-direction: column; min-height: 80vh; }
.editor-toolbar { background: var(--secondary); padding: 12px 20px; display: flex; align-items: center; gap: 15px; border-bottom: 1px solid var(--glass-border); overflow-x: auto; }
.tool-group { display: flex; gap: 8px; }
.tool-btn { background: none; border: none; padding: 10px 15px; border-radius: 12px; color: var(--text-dim); cursor: pointer; display: flex; flex-direction: column; align-items: center; gap: 5px; transition: all 0.2s; min-width: 80px; white-space: nowrap; }
.tool-btn i { width: 22px; height: 22px; }
.tool-btn span { font-size: 0.75rem; font-weight: 700; }
.tool-btn:hover { background: rgba(254, 98, 29, 0.1); color: var(--primary); }
.tool-btn.active { background: var(--primary); color: #fff; box-shadow: 0 4px 12px rgba(254, 98, 29, 0.3); }
.tool-divider { width: 1px; height: 30px; background: var(--glass-border); margin: 0 10px; }

.editor-main { flex: 1; display: flex; overflow: hidden; position: relative; background: #eef2f5; }
body.dark-theme .editor-main { background: #0f0f14; }

.editor-sidebar { width: 300px; background: var(--surface); border-right: 1px solid var(--glass-border); padding: 20px; overflow-y: auto; }
.sidebar-panel { display: none; }
.sidebar-panel.active { display: block; animation: fadeIn 0.3s; }
.sidebar-panel h3 { font-size: 1.1rem; font-weight: 800; margin-bottom: 20px; color: var(--text); }

.control-item { margin-bottom: 20px; }
.control-item label { display: block; font-size: 0.85rem; font-weight: 700; margin-bottom: 8px; color: var(--text-dim); }
.control-item label span { float: right; color: var(--primary); }

.modern-range { width: 100%; accent-color: var(--primary); cursor: pointer; height: 6px; border-radius: 3px; }
.modern-input, .modern-select { width: 100%; padding: 12px; border-radius: 10px; border: 1px solid var(--glass-border); background: var(--secondary); color: var(--text); font-weight: 600; outline: none; box-sizing: border-box; }
.panel-action-btn { width: 100%; padding: 14px; border-radius: 12px; border: 1px solid var(--primary); background: none; color: var(--primary); font-weight: 800; cursor: pointer; transition: all 0.2s; margin-top: 10px; }
.panel-action-btn:hover { background: var(--primary); color: #fff; }
.panel-action-btn.primary { background: var(--primary); color: #fff; border: none; }

.canvas-workspace { flex: 1; display: flex; align-items: center; justify-content: center; overflow: auto; padding: 40px; position: relative; background: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAAMUlEQVQ4T2NkYGAQYcAP3uAnm+HUmEGo69AFIBnBAaj68MI0zQCChU6mGTCIsBAvzsAzDJmBBQUPlT8AAAAASUVORK5CYII='); }
.canvas-container-outer { box-shadow: 0 0 50px rgba(0,0,0,0.2); border-radius: 4px; overflow: hidden; }

.editor-footer { background: var(--surface); padding: 15px 30px; border-top: 1px solid var(--glass-border); display: flex; align-items: center; justify-content: space-between; }
.footer-left, .footer-center, .footer-right { display: flex; align-items: center; gap: 12px; }
.footer-btn { background: none; border: 1px solid var(--glass-border); color: var(--text); width: 40px; height: 40px; border-radius: 10px; cursor: pointer; transition: 0.2s; display: flex; align-items: center; justify-content: center; }
.footer-btn:hover { background: var(--secondary); border-color: var(--primary); color: var(--primary); }

.zoom-controls { display: flex; align-items: center; gap: 15px; background: var(--secondary); padding: 5px 15px; border-radius: 50px; border: 1px solid var(--glass-border); }
.zoom-controls button { background: none; border: none; color: var(--text); cursor: pointer; padding: 5px; }

.transform-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
.icon-action-btn { width: 100%; padding: 12px; border-radius: 10px; border: 1px solid var(--glass-border); background: var(--secondary); color: var(--primary); cursor: pointer; transition: 0.2s; display: flex; align-items: center; justify-content: center; }
.icon-action-btn:hover { background: var(--primary); color: #fff; border-color: var(--primary); }

.color-presets { display: flex; gap: 8px; align-items: center; }
.color-dot { width: 32px; height: 32px; border-radius: 50%; border: 2px solid transparent; cursor: pointer; transition: 0.2s; }
.color-dot.active { border-color: var(--primary); box-shadow: 0 0 10px var(--primary); }

.shapes-grid { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 10px; }
.shape-btn { padding: 12px; border-radius: 10px; border: 1px solid var(--glass-border); background: var(--secondary); color: var(--text); cursor: pointer; transition: 0.2s; display: flex; align-items: center; justify-content: center; }
.shape-btn:hover { background: var(--primary); color: #fff; border-color: var(--primary); }

.empty-state-placeholder { position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); display: flex; flex-direction: column; align-items: center; justify-content: center; border: 2px dashed var(--glass-border); border-radius: 20px; padding: 40px 60px; cursor: pointer; background: var(--surface); transition: all 0.2s; z-index: 10; text-align: center; }
.empty-state-placeholder:hover { border-color: var(--primary); background: rgba(254, 98, 29, 0.05); }
.empty-state-placeholder:hover i, .empty-state-placeholder:hover p { color: var(--primary) !important; }

.studio-recycle-bin { position: absolute; bottom: 30px; left: 50%; transform: translateX(-50%); background: #ff4757; color: #fff; width: 60px; height: 60px; border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 10px 20px rgba(255, 71, 87, 0.4); opacity: 0; pointer-events: none; transition: all 0.2s; z-index: 20; }
.studio-recycle-bin.visible { opacity: 1; }
.studio-recycle-bin.hovered { transform: translateX(-50%) scale(1.2); background: #ff6b81; }
.studio-recycle-bin i { width: 28px; height: 28px; }
.studio-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 40px; margin-top: 100px; gap: 20px; flex-wrap: wrap; }
.studio-header-text h1 { margin-bottom: 5px; line-height: 1.2; }
@media (max-width: 768px) {
    .studio-header { margin-top: 120px; flex-direction: column; align-items: flex-start; }
    .studio-header-text h1 { font-size: 2rem !important; }
    
    .editor-main { flex-direction: column-reverse; }
    .editor-sidebar { width: 100%; max-height: 250px; border-right: none; border-top: 1px solid var(--glass-border); overflow-y: auto; }
    .canvas-workspace { padding: 15px; min-height: 300px; }
    .canvas-container-outer { max-width: 100%; overflow: auto; }
    .editor-footer { flex-wrap: wrap; justify-content: center; gap: 15px; }
    
    .editor-toolbar { padding: 12px 10px; }
    .tool-group { padding-bottom: 5px; }
}

@keyframes fadeIn { 0% { opacity: 0; } 100% { opacity: 1; } }
</style>

<script>
// Studio Canvas Manager
var studioCanvasV2 = null, studioOriginalImage = null, studioHistory = [], studioRedoStack = [], studioCurrentZoom = 1;
var studioIsDrawing = false;

function initStudioEditor() {
    if (studioCanvasV2) studioCanvasV2.dispose();
    
    studioCanvasV2 = new fabric.Canvas('studio-canvas', {
        width: 800,
        height: 500,
        backgroundColor: 'transparent',
        selection: true,
        preserveObjectStacking: true
    });
    
    studioCanvasV2.on('object:modified', studioSaveState);
    studioCanvasV2.on('path:created', function(e) {
        var emptyState = document.getElementById('studio-empty-state');
        if (emptyState) emptyState.style.display = 'none';
        studioSaveState();
    });
    studioCanvasV2.on('object:added', function(e) {
        var emptyState = document.getElementById('studio-empty-state');
        if (emptyState) emptyState.style.display = 'none';
    });
    
    studioCanvasV2.on('object:moving', function(e) {
        var bin = document.getElementById('studio-recycle-bin');
        if (!bin || !e.target) return;
        bin.classList.add('visible');
        
        var binRect = bin.getBoundingClientRect();
        if (e.e.clientX >= binRect.left && e.e.clientX <= binRect.right &&
            e.e.clientY >= binRect.top && e.e.clientY <= binRect.bottom) {
            bin.classList.add('hovered');
            e.target.opacity = 0.5;
        } else {
            bin.classList.remove('hovered');
            e.target.opacity = 1;
        }
    });
    
    studioCanvasV2.on('mouse:up', function(e) {
        var bin = document.getElementById('studio-recycle-bin');
        if (!bin) return;
        
        if (bin.classList.contains('hovered') && e.target) {
            studioCanvasV2.remove(e.target);
            studioSaveState();
            
            if (studioCanvasV2.getObjects().length === 0) {
                var emptyState = document.getElementById('studio-empty-state');
                if (emptyState) emptyState.style.display = 'flex';
            }
        }
        
        if (e.target) e.target.opacity = 1;
        bin.classList.remove('visible');
        bin.classList.remove('hovered');
    });
    
    studioCanvasV2.on('mouse:wheel', function(opt) {
        var delta = opt.e.deltaY;
        var zoom = studioCanvasV2.getZoom();
        zoom *= 0.999 ** delta;
        if (zoom > 5) zoom = 5;
        if (zoom < 0.1) zoom = 0.1;
        studioCanvasV2.zoomToPoint({ x: opt.e.offsetX, y: opt.e.offsetY }, zoom);
        opt.e.preventDefault();
        opt.e.stopPropagation();
        
        studioCurrentZoom = zoom;
        var zVal = document.getElementById('studio-zoom-val');
        if (zVal) zVal.textContent = Math.round(zoom * 100) + '%';
    });
}

function studioSetTool(tool) {
    document.querySelectorAll('.tool-btn').forEach(b => {
        if (b.id && b.id.startsWith('studio-')) b.classList.remove('active');
    });
    var btn = document.getElementById('studio-btn-tool-' + tool);
    if (btn) btn.classList.add('active');
    
    document.querySelectorAll('[id^="studio-panel-"]').forEach(p => p.classList.remove('active'));
    var panel = document.getElementById('studio-panel-' + tool);
    if (panel) panel.classList.add('active');
    
    studioCanvasV2.isDrawingMode = (tool === 'draw');
    if (tool === 'draw') {
        studioCanvasV2.freeDrawingBrush = new fabric.PencilBrush(studioCanvasV2);
        studioCanvasV2.freeDrawingBrush.width = parseInt(document.getElementById('studio-m-brush-size').value);
        studioCanvasV2.freeDrawingBrush.color = document.getElementById('studio-m-brush-color').value;
    }
    
    studioCanvasV2.selection = (tool === 'text' || tool === 'shapes' || tool === 'image');
    studioCanvasV2.forEachObject(obj => {
        if (obj !== studioOriginalImage) {
            obj.selectable = (tool === 'text' || tool === 'shapes' || tool === 'image');
        }
    });
    
    studioCanvasV2.renderAll();
}

function studioSaveState() {
    studioHistory.push(JSON.stringify(studioCanvasV2));
    studioRedoStack = [];
}

function studioUndo() {
    if (studioHistory.length <= 1) return;
    studioRedoStack.push(studioHistory.pop());
    var state = studioHistory[studioHistory.length - 1];
    studioCanvasV2.loadFromJSON(state, function() {
        studioCanvasV2.renderAll();
        studioOriginalImage = studioCanvasV2.getObjects().find(o => o.type === 'image');
    });
}

function studioRedo() {
    if (studioRedoStack.length === 0) return;
    var state = studioRedoStack.pop();
    studioHistory.push(state);
    studioCanvasV2.loadFromJSON(state, function() {
        studioCanvasV2.renderAll();
        studioOriginalImage = studioCanvasV2.getObjects().find(o => o.type === 'image');
    });
}

function studioZoom(delta) {
    studioCurrentZoom += delta;
    studioCurrentZoom = Math.min(Math.max(0.1, studioCurrentZoom), 5);
    studioCanvasV2.setZoom(studioCurrentZoom);
    document.getElementById('studio-zoom-val').textContent = Math.round(studioCurrentZoom * 100) + '%';
}

function studioReset() {
    studioHistory = [];
    studioRedoStack = [];
    var emptyState = document.getElementById('studio-empty-state');
    if (emptyState) emptyState.style.display = 'flex';
    initStudioEditor();
}

function studioResetFilters() {
    document.getElementById('studio-m-br').value = 0;
    document.getElementById('studio-m-ct').value = 0;
    document.getElementById('studio-m-sa').value = 0;
    document.getElementById('studio-m-bl').value = 0;
    document.getElementById('studio-val-br').textContent = '100%';
    document.getElementById('studio-val-ct').textContent = '100%';
    document.getElementById('studio-val-sa').textContent = '0%';
    document.getElementById('studio-val-bl').textContent = '0px';
    studioApplyFilters();
}

function studioApplyFilters() {
    var br = parseFloat(document.getElementById('studio-m-br').value);
    var ct = parseFloat(document.getElementById('studio-m-ct').value);
    var sa = parseFloat(document.getElementById('studio-m-sa').value);
    var bl = parseFloat(document.getElementById('studio-m-bl').value) * 10;
    
    var obj = studioCanvasV2.getObjects().find(o => o.type === 'image');
    if (obj) {
        obj.filters = [];
        obj.filters.push(new fabric.Image.filters.Brightness({ brightness: br }));
        obj.filters.push(new fabric.Image.filters.Contrast({ contrast: ct }));
        obj.filters.push(new fabric.Image.filters.Saturation({ saturation: sa }));
        if (bl > 0) obj.filters.push(new fabric.Image.filters.Blur({ blur: bl }));
        obj.applyFilters();
        studioCanvasV2.renderAll();
    }
}

function studioApplyResize() { alert('Resize feature coming soon'); }
function studioApplyCrop() { alert('Crop feature coming soon'); }
function studioRotateCanvas(angle) { alert('Rotate feature coming soon'); }
function studioFlipCanvas(dir) { alert('Flip feature coming soon'); }
function studioAddText() {
    var text = new fabric.IText('Double click to edit', {
        left: studioCanvasV2.width / 2,
        top: studioCanvasV2.height / 2,
        fontFamily: document.getElementById('studio-m-font-family') ? document.getElementById('studio-m-font-family').value : 'Arial',
        fill: '#ffffff',
        fontSize: 40,
        originX: 'center',
        originY: 'center',
        shadow: new fabric.Shadow({
            color: 'rgba(0,0,0,0.5)',
            blur: 5,
            offsetX: 2,
            offsetY: 2
        })
    });
    studioCanvasV2.add(text);
    studioCanvasV2.setActiveObject(text);
    studioCanvasV2.renderAll();
    studioSaveState();
    
    var controls = document.getElementById('studio-text-controls');
    if (controls) controls.style.display = 'block';
    
    // Bind font family change if not already bound
    var fontSelect = document.getElementById('studio-m-font-family');
    if (fontSelect && !fontSelect.dataset.bound) {
        fontSelect.addEventListener('change', function() {
            var activeObj = studioCanvasV2.getActiveObject();
            if (activeObj && activeObj.type === 'i-text') {
                activeObj.set('fontFamily', this.value);
                studioCanvasV2.renderAll();
                studioSaveState();
            }
        });
        fontSelect.dataset.bound = 'true';
    }
}
function studioAddShape(shape) { alert('Shape feature coming soon'); }
function studioSetBrushColor(color, el) {
    document.querySelectorAll('.color-dot').forEach(d => d.classList.remove('active'));
    el.classList.add('active');
    document.getElementById('studio-m-brush-color').value = color;
}

function studioDownload() {
    var dataUrl = studioCanvasV2.toDataURL({ format: 'png', quality: 1.0 });
    var link = document.createElement('a');
    link.download = 'sldrawing_studio_' + Date.now() + '.png';
    link.href = dataUrl;
    link.click();
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    initStudioEditor();
    
    // Mobile Pinch-to-Zoom
    var touchDist = 0;
    var canvasWrapper = document.getElementById('studio-canvas-workspace');
    if (canvasWrapper) {
        canvasWrapper.addEventListener('touchstart', function(e) {
            if (e.touches.length === 2) {
                touchDist = Math.hypot(
                    e.touches[0].pageX - e.touches[1].pageX,
                    e.touches[0].pageY - e.touches[1].pageY
                );
            }
        }, {passive: false});
        
        canvasWrapper.addEventListener('touchmove', function(e) {
            if (e.touches.length === 2) {
                e.preventDefault();
                var newDist = Math.hypot(
                    e.touches[0].pageX - e.touches[1].pageX,
                    e.touches[0].pageY - e.touches[1].pageY
                );
                var delta = newDist - touchDist;
                touchDist = newDist;
                
                var zoom = studioCanvasV2.getZoom();
                zoom += delta * 0.01;
                if (zoom > 5) zoom = 5;
                if (zoom < 0.1) zoom = 0.1;
                
                var cx = (e.touches[0].pageX + e.touches[1].pageX) / 2;
                var cy = (e.touches[0].pageY + e.touches[1].pageY) / 2;
                var rect = canvasWrapper.getBoundingClientRect();
                
                studioCanvasV2.zoomToPoint({ x: cx - rect.left, y: cy - rect.top }, zoom);
                
                studioCurrentZoom = zoom;
                var zVal = document.getElementById('studio-zoom-val');
                if (zVal) zVal.textContent = Math.round(zoom * 100) + '%';
            }
        }, {passive: false});
    }
    
    document.getElementById('studio-upload').addEventListener('change', function(e) {
        var file = e.target.files[0];
        if (!file) return;
        
        var reader = new FileReader();
        reader.onload = function(event) {
            fabric.Image.fromURL(event.target.result, function(img) {
                img.scaleToWidth(600);
                studioCanvasV2.add(img);
                studioCanvasV2.sendObjectToBack(img);
                studioOriginalImage = img;
                studioCanvasV2.renderAll();
                studioSaveState();
                
                var emptyState = document.getElementById('studio-empty-state');
                if (emptyState) emptyState.style.display = 'none';
            });
        };
        reader.readAsDataURL(file);
    });
    
    // Add Image Overlay Listener
    var addImageUpload = document.getElementById('studio-add-image-upload');
    if (addImageUpload) {
        addImageUpload.addEventListener('change', function(e) {
            var file = e.target.files[0];
            if (!file) return;
            
            var reader = new FileReader();
            reader.onload = function(event) {
                var imgObj = new Image();
                imgObj.src = event.target.result;
                imgObj.onload = function() {
                    var img = new fabric.Image(imgObj);
                    if (img.width > 300) {
                        img.scaleToWidth(300);
                    }
                    studioCanvasV2.add(img);
                    studioCanvasV2.setActiveObject(img);
                    studioCanvasV2.renderAll();
                    studioSaveState();
                    e.target.value = ''; // reset input
                };
            };
            reader.readAsDataURL(file);
        });
    }
    
    // Filter listeners
    ['studio-m-br', 'studio-m-ct', 'studio-m-sa', 'studio-m-bl'].forEach(id => {
        var elem = document.getElementById(id);
        if (!elem) return;
        elem.addEventListener('input', function(e) {
            var val = parseFloat(e.target.value);
            if (id === 'studio-m-br') document.getElementById('studio-val-br').textContent = Math.round((1 + val) * 100) + '%';
            else if (id === 'studio-m-ct') document.getElementById('studio-val-ct').textContent = Math.round((1 + val) * 100) + '%';
            else if (id === 'studio-m-sa') document.getElementById('studio-val-sa').textContent = Math.round(val * 100) + '%';
            else if (id === 'studio-m-bl') document.getElementById('studio-val-bl').textContent = Math.round(val * 10) + 'px';
            studioApplyFilters();
        });
    });

    // Brush size listener
    var brushSizeElem = document.getElementById('studio-m-brush-size');
    if (brushSizeElem) {
        brushSizeElem.addEventListener('input', function(e) {
            document.getElementById('studio-val-brush').textContent = e.target.value + 'px';
        });
    }
});
</script>
