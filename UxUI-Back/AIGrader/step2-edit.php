<!-- ===== STEP 2: Edit Image (iLoveIMG Style) ===== -->
<div class="step-panel" id="panel-2">
  <div class="modern-editor-wrap reveal">
    
    <!-- Top Toolbar -->
    <div class="editor-toolbar">
      <div class="tool-group">
        <button class="tool-btn active" onclick="setTool('filter')" id="btn-tool-filter">
          <i data-lucide="sliders-horizontal"></i>
          <span>Filter & Light</span>
        </button>
        <button class="tool-btn" onclick="setTool('resize')" id="btn-tool-resize">
          <i data-lucide="maximize"></i>
          <span>Resize</span>
        </button>
        <button class="tool-btn" onclick="setTool('crop')" id="btn-tool-crop">
          <i data-lucide="crop"></i>
          <span>Crop Image</span>
        </button>
        <button class="tool-btn" onclick="setTool('transform')" id="btn-tool-transform">
          <i data-lucide="rotate-cw"></i>
          <span>Transform</span>
        </button>
      </div>
      
      <div class="tool-divider"></div>
      
      <div class="tool-group">
        <button class="tool-btn" onclick="setTool('draw')" id="btn-tool-draw">
          <i data-lucide="pencil"></i>
          <span>Draw</span>
        </button>
        <button class="tool-btn" onclick="setTool('text')" id="btn-tool-text">
          <i data-lucide="type"></i>
          <span>Text</span>
        </button>
        <button class="tool-btn" onclick="setTool('shapes')" id="btn-tool-shapes">
          <i data-lucide="shapes"></i>
          <span>Shapes</span>
        </button>
      </div>
    </div>

    <div class="editor-main">
      <!-- Sidebar Panels (Dynamic) -->
      <div class="editor-sidebar">
        
        <!-- Filter Panel -->
        <div class="sidebar-panel active" id="panel-filter">
          <h3>Filter & Light</h3>
          <div class="control-item">
            <label>Brightness <span id="val-br">100%</span></label>
            <input type="range" class="modern-range" id="m-br" min="-1" max="1" step="0.01" value="0">
          </div>
          <div class="control-item">
            <label>Contrast <span id="val-ct">100%</span></label>
            <input type="range" class="modern-range" id="m-ct" min="-1" max="1" step="0.01" value="0">
          </div>
          <div class="control-item">
            <label>Saturation <span id="val-sa">0%</span></label>
            <input type="range" class="modern-range" id="m-sa" min="-1" max="1" step="0.01" value="0">
          </div>
          <div class="control-item">
            <label>Blur <span id="val-bl">0px</span></label>
            <input type="range" class="modern-range" id="m-bl" min="0" max="1" step="0.01" value="0">
          </div>
          <button class="panel-action-btn" onclick="resetFilters()">Reset Filters</button>
        </div>

        <!-- Resize Panel -->
        <div class="sidebar-panel" id="panel-resize">
          <h3>Resize Image</h3>
          <div class="control-item">
            <label>Width (px)</label>
            <input type="number" id="m-width" class="modern-input">
          </div>
          <div class="control-item">
            <label>Height (px)</label>
            <input type="number" id="m-height" class="modern-input">
          </div>
          <div class="control-item">
            <label style="display:flex; align-items:center; gap:8px; cursor:pointer;">
              <input type="checkbox" id="m-lock-aspect" checked> Lock Aspect Ratio
            </label>
          </div>
          <button class="panel-action-btn primary" onclick="applyResize()">Apply Resize</button>
        </div>

        <!-- Crop Panel -->
        <div class="sidebar-panel" id="panel-crop">
          <h3>Crop Image</h3>
          <div class="control-item">
            <label>Paper / Aspect Ratio</label>
            <select id="m-crop-ratio" class="modern-select">
              <option value="0">Free Hand</option>
              <option value="0.707">A3/A4/A5 (Portrait)</option>
              <option value="1.414">A3/A4/A5 (Landscape)</option>
              <option value="1">Square (1:1)</option>
              <option value="0.75">4:3</option>
              <option value="1.777">16:9</option>
            </select>
          </div>
          <div id="m-phys-info" class="info-box" style="display:none;">
            <i data-lucide="info" size="14"></i>
            <span id="m-phys-val"></span>
          </div>
          <button class="panel-action-btn primary" onclick="applyCropV2()">Apply Crop</button>
        </div>

        <!-- Transform Panel -->
        <div class="sidebar-panel" id="panel-transform">
          <h3>Transform</h3>
          <div class="transform-grid">
            <button class="icon-action-btn" onclick="rotateCanvas(-90)" title="Rotate Left">
              <i data-lucide="rotate-ccw"></i>
            </button>
            <button class="icon-action-btn" onclick="rotateCanvas(90)" title="Rotate Right">
              <i data-lucide="rotate-cw"></i>
            </button>
            <button class="icon-action-btn" onclick="flipCanvas('h')" title="Flip Horizontal">
              <i data-lucide="flip-horizontal"></i>
            </button>
            <button class="icon-action-btn" onclick="flipCanvas('v')" title="Flip Vertical">
              <i data-lucide="flip-vertical"></i>
            </button>
          </div>
        </div>

        <!-- Draw Panel -->
        <div class="sidebar-panel" id="panel-draw">
          <h3>Drawing Tools</h3>
          <div class="control-item">
            <label>Brush Size <span id="val-brush">10px</span></label>
            <input type="range" class="modern-range" id="m-brush-size" min="1" max="50" value="10">
          </div>
          <div class="control-item">
            <label>Color</label>
            <div class="color-presets">
              <div class="color-dot active" style="background:#000" onclick="setBrushColor('#000', this)"></div>
              <div class="color-dot" style="background:#fff; border:1px solid #ddd" onclick="setBrushColor('#fff', this)"></div>
              <div class="color-dot" style="background:#ff4757" onclick="setBrushColor('#ff4757', this)"></div>
              <div class="color-dot" style="background:#2ed573" onclick="setBrushColor('#2ed573', this)"></div>
              <div class="color-dot" style="background:#1e90ff" onclick="setBrushColor('#1e90ff', this)"></div>
              <input type="color" id="m-brush-color" value="#000000" style="width:30px; height:30px; border:none; padding:0; cursor:pointer;">
            </div>
          </div>
        </div>

        <!-- Text Panel -->
        <div class="sidebar-panel" id="panel-text">
          <h3>Add Text</h3>
          <button class="panel-action-btn primary" onclick="addTextV2()">Add New Text</button>
          <div id="text-controls" style="margin-top:20px; display:none;">
            <div class="control-item">
              <label>Font Family</label>
              <select id="m-font-family" class="modern-select">
                <option value="Arial">Arial</option>
                <option value="Times New Roman">Serif</option>
                <option value="Courier New">Monospace</option>
                <option value="Inter">Modern</option>
              </select>
            </div>
          </div>
        </div>

        <!-- Shapes Panel -->
        <div class="sidebar-panel" id="panel-shapes">
          <h3>Shapes</h3>
          <div class="shapes-grid">
            <button class="shape-btn" onclick="addShape('rect')">
              <i data-lucide="square"></i>
            </button>
            <button class="shape-btn" onclick="addShape('circle')">
              <i data-lucide="circle"></i>
            </button>
            <button class="shape-btn" onclick="addShape('triangle')">
              <i data-lucide="triangle"></i>
            </button>
          </div>
        </div>

      </div>

      <!-- Canvas Area -->
      <div class="canvas-workspace" id="canvas-workspace">
        <div class="canvas-container-outer">
          <canvas id="main-editor-canvas"></canvas>
        </div>
      </div>

    </div>

    <!-- Bottom Control Bar -->
    <div class="editor-footer">
      <div class="footer-left">
        <button class="footer-btn" onclick="undoV2()" title="Undo">
          <i data-lucide="undo-2"></i>
        </button>
        <button class="footer-btn" onclick="redoV2()" title="Redo">
          <i data-lucide="redo-2"></i>
        </button>
        <button class="footer-btn" onclick="resetEditor()" title="Reset All">
          <i data-lucide="refresh-cw"></i>
        </button>
      </div>
      
      <div class="footer-center">
        <div class="zoom-controls">
          <button onclick="zoomEditor(-0.1)"><i data-lucide="minus"></i></button>
          <span id="editor-zoom-val">100%</span>
          <button onclick="zoomEditor(0.1)"><i data-lucide="plus"></i></button>
        </div>
      </div>

      <div class="footer-right" style="display:flex; gap:12px; align-items:center; justify-content:flex-end; flex-wrap:wrap;">
        <!-- Navigation buttons moved below for consistent placement across steps -->
      </div>
    </div>
    <div class="step-nav">
      <button class="back-btn nav-btn" onclick="goStep(1)">← Back</button>
      <button class="next-btn nav-btn" onclick="applyAndNextV2()">
        <span>Next</span>
        <i data-lucide="arrow-right"></i>
      </button>
    </div>
  </div>
</div>
