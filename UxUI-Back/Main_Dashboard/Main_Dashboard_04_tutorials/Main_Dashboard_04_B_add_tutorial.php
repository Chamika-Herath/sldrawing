<div data-page="project" id="Main_Dashboard_04_B" style="display:none;">
    <!-- Include Quill Theme -->
    <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
    <style>
        /* Quill custom dark theme overrides for SLdrawing */
        .ql-toolbar.ql-snow {
            border: 1px solid rgba(255,255,255,0.1) !important;
            border-bottom: none !important;
            background: var(--sld-dark-950);
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }
        .ql-container.ql-snow {
            border: 1px solid rgba(255,255,255,0.1) !important;
            border-bottom-left-radius: 8px;
            border-bottom-right-radius: 8px;
            background: var(--sld-dark-800);
            min-height: 250px;
            color: #fff;
            font-size: 15px;
            font-family: inherit;
        }
        .ql-editor.ql-blank::before {
            color: rgba(255,255,255,0.4);
            font-style: normal;
        }
        .ql-snow .ql-stroke {
            stroke: var(--sld-text-400);
        }
        .ql-snow .ql-fill, .ql-snow .ql-stroke.ql-fill {
            fill: var(--sld-text-400);
        }
        .ql-snow.ql-toolbar button:hover .ql-stroke, .ql-snow .ql-toolbar button:hover .ql-stroke {
            stroke: var(--sld-orange-500) !important;
        }
        .ql-snow.ql-toolbar button:hover .ql-fill, .ql-snow .ql-toolbar button:hover .ql-fill {
            fill: var(--sld-orange-500) !important;
        }
        .ql-snow .ql-picker {
            color: var(--sld-text-400);
        }
        .ql-container.ql-snow.active-border {
            border-color: var(--sld-orange-500) !important;
        }
        .ql-toolbar.ql-snow.active-border {
            border-color: var(--sld-orange-500) !important;
        }
    </style>

    <div class="project-collection-app">
        <?php include "../UxUI-Back/Includes/Main_dashboard_sidebar.php"; ?>
        <main class="project-collection-main">
            <div class="collection-dashboard-wrapper">
                <section class="collection-dashboard-content">
                    <div class="collection-panel-header">
                        <h2 id="tut_panel_title">Upload New Tutorial</h2>
                        <button class="collection-panel-close" title="Close" onclick="Main_Dashboard_04_A_OPEN();">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                        </button>
                    </div>
                    
                    <div class="collection-panel-body">
                        <div class="collection-breadcrumb">
                            <div class="breadcrumb-path">
                                Dashboard <span style="color:var(--sld-text-600)">/</span> <span style="color:var(--sld-text-400); cursor:pointer;" onclick="Main_Dashboard_04_A_OPEN()">Tutorials</span> <span style="color:var(--sld-text-600)">/</span> <span class="active-crumb">Upload New</span>
                            </div>
                        </div>

                        <!-- Form UI -->
                        <div style="background: var(--sld-dark-950); padding: 30px; border-radius: var(--sld-radius-lg); border: 1px solid var(--sld-border); max-width: 800px; margin: 0 auto;">
                            
                            <div style="margin-bottom: 24px;">
                                <input type="hidden" id="tut_input_id" value="0">
                                <input type="hidden" id="tut_old_thumbnail" value="">
                                
                                <label style="display:block; margin-bottom: 8px; font-size: 13px; font-weight:600; color:var(--sld-text-400);">Tutorial Title</label>
                                <input type="text" id="tut_input_title" placeholder="e.g., Mastering Face Proportions" style="width: 100%; padding: 14px 18px; border-radius: 8px; background: var(--sld-dark-800); border: 1px solid rgba(255,255,255,0.1); color: #fff; font-size:15px; outline:none; transition:0.3s;" onfocus="this.style.borderColor='var(--sld-orange-500)'" onblur="this.style.borderColor='rgba(255,255,255,0.1)'">
                            </div>

                            <div style="margin-bottom: 24px;">
                                <label style="display:block; margin-bottom: 8px; font-size: 13px; font-weight:600; color:var(--sld-text-400);">Rich Tutorial Description</label>
                                <div id="tut_quill_editor"></div>
                            </div>

                            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px; margin-bottom: 24px;">
                                <div>
                                    <label style="display:block; margin-bottom: 8px; font-size: 13px; font-weight:600; color:var(--sld-text-400);">Difficulty Level</label>
                                    <select id="tut_input_level" style="width: 100%; padding: 14px 18px; border-radius: 8px; background: var(--sld-dark-800); border: 1px solid rgba(255,255,255,0.1); color: #fff; font-size:15px; outline:none; cursor:pointer;">
                                        <option value="Beginner">Beginner</option>
                                        <option value="Intermediate">Intermediate</option>
                                        <option value="Advanced">Advanced</option>
                                    </select>
                                </div>
                                <div>
                                    <label style="display:block; margin-bottom: 8px; font-size: 13px; font-weight:600; color:var(--sld-text-400);">Video URL / ID</label>
                                    <input type="text" id="tut_input_url" placeholder="e.g., https://youtube.com/..." style="width: 100%; padding: 14px 18px; border-radius: 8px; background: var(--sld-dark-800); border: 1px solid rgba(255,255,255,0.1); color: #fff; font-size:15px; outline:none; transition:0.3s;" onfocus="this.style.borderColor='var(--sld-orange-500)'" onblur="this.style.borderColor='rgba(255,255,255,0.1)'">
                                </div>
                            </div>

                            <div style="margin-bottom: 30px;">
                                <label style="display:block; margin-bottom: 8px; font-size: 13px; font-weight:600; color:var(--sld-text-400);">Upload Thumbnail</label>
                                
                                <input type="file" id="tut_input_thumbnail" accept="image/*" style="display:none">
                                <div id="tut_upload_dropzone" onclick="document.getElementById('tut_input_thumbnail').click();" style="border: 2px dashed rgba(255,255,255,0.15); border-radius: 12px; padding: 40px; text-align: center; cursor: pointer; transition: 0.3s; background: rgba(255,255,255,0.02);" onmouseover="this.style.borderColor='var(--sld-orange-500)'; this.style.background='rgba(249,115,22,0.05)';" onmouseout="this.style.borderColor='rgba(255,255,255,0.15)'; this.style.background='rgba(255,255,255,0.02)';">
                                    
                                    <img id="tut_thumb_preview" src="" style="max-height: 180px; border-radius:8px; display:none; margin: 0 auto 15px auto; object-fit: cover; box-shadow: 0 4px 12px rgba(0,0,0,0.5);"/>
                                    
                                    <div id="tut_thumb_placeholder">
                                        <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="var(--sld-orange-500)" stroke-width="2" style="margin-bottom: 15px;"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" y1="3" x2="12" y2="15"/></svg>
                                        <div style="font-size: 16px; font-weight: 600; color: #fff; margin-bottom: 4px;">Click to Browse Images</div>
                                        <div style="font-size: 13px; color: var(--sld-text-400);">PNG, JPG, or WEBP</div>
                                    </div>
                                </div>
                            </div>
                            
                            <hr style="border:0; border-top: 1px solid rgba(255,255,255,0.05); margin-bottom: 24px;">

                            <div style="display: flex; justify-content: flex-end; gap: 12px;">
                                <button onclick="Main_Dashboard_04_A_OPEN()" style="background: transparent; color: var(--sld-text-400); border: 1px solid rgba(255,255,255,0.1); padding: 12px 24px; border-radius: 50px; font-weight: 700; cursor: pointer; transition: 0.3s;" onmouseover="this.style.background='rgba(255,255,255,0.05)'; this.style.color='#fff';" onmouseout="this.style.background='transparent'; this.style.color='var(--sld-text-400)';">Cancel</button>
                                <button id="tut_publish_btn" onclick="save_tutorial()" style="background: var(--sld-orange-500); color: var(--sld-dark-950); border: none; padding: 12px 30px; border-radius: 50px; font-weight: 700; cursor: pointer; display: flex; align-items: center; gap: 8px; transition: 0.3s;" onmouseover="this.style.transform='translateY(-2px)'; this.style.boxShadow='0 6px 16px rgba(249,115,22,0.3)';" onmouseout="this.style.transform='none'; this.style.boxShadow='none';">
                                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg>
                                    Publish Tutorial
                                </button>
                            </div>

                        </div>
                    </div>
                </section>
            </div>
            
            <p style="text-align:center;font-size:12px;color:var(--sld-text-600);padding-top:24px; font-weight: 500;">
               &copy; 2026 Chamika Herath — <span style="font-weight: 700; color: var(--sld-orange-500);">Heraforce Admin Panel</span>
            </p>
        </main>
    </div>

    <!-- Initialize Quill Engine -->
    <script src="https://cdn.quilljs.com/1.3.7/quill.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill-image-resize-module@3.0.0/image-resize.min.js"></script>
    <script>
        var tutorialQuill = new Quill('#tut_quill_editor', {
            theme: 'snow',
            placeholder: 'Draft your tutorial here... Add images, videos, format lists and text freely.',
            modules: {
                imageResize: {
                    displaySize: true
                },
                toolbar: [
                    [{ 'header': [2, 3, false] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                    [{ 'align': [] }],
                    ['blockquote', 'code-block'],
                    ['link', 'image', 'video'],
                    ['clean']
                ]
            }
        });

        // Add focus styling logic for SLdrawing UI consistency
        tutorialQuill.root.addEventListener('focus', function() {
            document.querySelector('.ql-container.ql-snow').classList.add('active-border');
            document.querySelector('.ql-toolbar.ql-snow').classList.add('active-border');
        });
        
        tutorialQuill.root.addEventListener('blur', function() {
            document.querySelector('.ql-container.ql-snow').classList.remove('active-border');
            document.querySelector('.ql-toolbar.ql-snow').classList.remove('active-border');
        });
    </script>

<?php 
// Include specific JS script corresponding to this UI for AJAX processing
if (file_exists('JS/Main_Dashboard_04_B_add_tutorial_JS.php')) {
    include_once 'JS/Main_Dashboard_04_B_add_tutorial_JS.php';
} else if (file_exists('../UxUI-Back/Main_Dashboard/Main_Dashboard_04_tutorials/JS/Main_Dashboard_04_B_add_tutorial_JS.php')) {
    include_once '../UxUI-Back/Main_Dashboard/Main_Dashboard_04_tutorials/JS/Main_Dashboard_04_B_add_tutorial_JS.php';
}
?>

</div>
