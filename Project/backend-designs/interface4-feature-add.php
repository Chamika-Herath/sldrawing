<!-- components/content/feature_add.php -->
<?php if (!isset($content_included)): ?>
<?php $content_included = true; ?>

<style>
    /* ================= MAIN CONTENT AREA ================= */
    .erp-content-area {
        flex: 1;
        padding: 32px;
        margin-left: var(--sidebar-width);
        transition: margin-left var(--sidebar-transition);
        width: calc(100% - var(--sidebar-width));
        min-height: calc(100vh - 50px - 32px);
        background: var(--erp-surface-alt);
    }

    .erp-sidebar.collapsed ~ .erp-content-area {
        margin-left: var(--sidebar-collapsed);
        width: calc(100% - var(--sidebar-collapsed));
    }

    /* ================= PAGE TITLE & BREADCRUMB ================= */
    .erp-page-title {
        text-align: center;
        font-size: 28px;
        font-weight: 600;
        margin: 0 0 8px 0;
        color: var(--erp-primary-light);
        padding-top: 10px;
    }

    .erp-breadcrumb-global {
        font-size: 14px;
        color: var(--erp-text-tertiary);
        text-align: center;
        margin-bottom: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 8px;
    }

    .erp-breadcrumb__separator {
        color: var(--erp-border-dark);
    }

    /* ================= FEATURE CARD ================= */
    .erp-feature-card {
        background: var(--erp-surface);
        border-radius: 10px;
        border: 1px solid var(--erp-border);
        box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        max-width: 600px;
        margin: 0 auto;
        overflow: hidden;
    }

    /* Header */
    .erp-feature-card__header {
        padding: 20px 24px;
        background: var(--erp-primary);
        color: #fff;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-radius: 10px 10px 0 0;
    }

    .erp-feature-card__title {
        font-size: 18px;
        font-weight: 600;
    }

    .erp-btn--icon {
        background: transparent;
        border: none;
        color: #fff;
        font-size: 20px;
        cursor: pointer;
        width: 32px;
        height: 32px;
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background 0.2s;
    }

    .erp-btn--icon:hover {
        background: rgba(255,255,255,0.1);
    }

    /* ================= FEATURE FORM ================= */
    .erp-feature-form {
        padding: 32px;
    }

    .erp-form-group {
        margin-bottom: 20px;
    }

    .erp-form-label {
        display: block;
        font-size: 14px;
        font-weight: 600;
        color: var(--erp-text-secondary);
        margin-bottom: 8px;
    }

    .erp-form-label span {
        color: var(--erp-error);
    }

    .erp-form-input {
        width: 100%;
        padding: 12px 16px;
        border: 1px solid var(--erp-border);
        border-radius: 8px;
        background: var(--erp-surface);
        color: var(--erp-text-primary);
        font-size: 14px;
        transition: all 0.2s;
    }

    .erp-form-input:focus {
        outline: none;
        border-color: var(--erp-primary-light);
        box-shadow: 0 0 0 3px rgba(var(--erp-primary-rgb), 0.1);
    }

    .erp-form-input:hover {
        border-color: var(--erp-border-dark);
    }

    .erp-form-input::placeholder {
        color: var(--erp-text-tertiary);
        font-size: 13px;
    }

    /* ================= FEATURE LIST ================= */
    .erp-features-added {
        background: var(--erp-surface-alt);
        border: 1px solid var(--erp-border);
        border-radius: 8px;
        padding: 16px;
        margin: 20px 0;
    }

    .erp-features-title {
        font-size: 14px;
        font-weight: 600;
        color: var(--erp-text-primary);
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .erp-features-title span {
        background: var(--erp-primary);
        color: #fff;
        padding: 2px 8px;
        border-radius: 20px;
        font-size: 12px;
    }

    .erp-feature-tag {
        background: var(--erp-surface);
        border: 1px solid var(--erp-border);
        border-radius: 6px;
        padding: 8px 12px;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .erp-feature-tag:last-child {
        margin-bottom: 0;
    }

    .erp-feature-tag-name {
        font-size: 14px;
        color: var(--erp-text-primary);
    }

    .erp-feature-tag-remove {
        background: transparent;
        border: none;
        color: var(--erp-text-tertiary);
        font-size: 18px;
        cursor: pointer;
        padding: 0 5px;
    }

    .erp-feature-tag-remove:hover {
        color: var(--erp-error);
    }

    .erp-no-features {
        text-align: center;
        padding: 20px;
        color: var(--erp-text-tertiary);
        font-size: 14px;
        font-style: italic;
    }

    /* ================= FORM ACTIONS ================= */
    .erp-form-actions {
        display: flex;
        gap: 15px;
        margin-top: 30px;
    }

    .erp-btn {
        padding: 12px 24px;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.2s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        flex: 1;
    }

    .erp-btn--secondary {
        background: var(--erp-border);
        color: var(--erp-text-primary);
    }

    .erp-btn--secondary:hover {
        background: var(--erp-border-dark);
    }

    .erp-btn--primary {
        background: var(--erp-primary);
        color: #fff;
    }

    .erp-btn--primary:hover {
        background: var(--erp-primary-dark);
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(var(--erp-primary-rgb), 0.3);
    }

    .erp-btn--success {
        background: var(--erp-success);
        color: #fff;
    }

    .erp-btn--success:hover {
        background: #218838;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(40, 167, 69, 0.3);
    }

    .erp-btn svg {
        width: 18px;
        height: 18px;
        fill: currentColor;
    }

    /* ================= RESPONSIVE ================= */
    @media (max-width: 768px) {
        .erp-content-area {
            margin-left: 0 !important;
            width: 100% !important;
            padding: 90px 16px 60px 16px;
        }

        .erp-page-title {
            font-size: 24px;
        }

        .erp-feature-card__header {
            padding: 16px 20px;
        }

        .erp-feature-form {
            padding: 20px;
        }

        .erp-form-actions {
            flex-direction: column;
        }

        .erp-btn {
            width: 100%;
        }
    }

    @media (max-width: 480px) {
        .erp-page-title {
            font-size: 22px;
        }

        .erp-feature-card__header {
            flex-direction: column;
            align-items: flex-start;
            gap: 12px;
        }

        .erp-feature-card__title {
            font-size: 16px;
        }
    }
</style>

<main class="erp-content-area">
    <!-- ================= PAGE TITLE & BREADCRUMB ================= -->
    <h1 class="erp-page-title">Feature Management</h1>
    <nav class="erp-breadcrumb-global">
        <span>Dashboard</span>
        <span class="erp-breadcrumb__separator">/</span>
        <span>Features</span>
        <span class="erp-breadcrumb__separator">/</span>
        <span>Add Features</span>
    </nav>

    <!-- ================= FEATURE CARD ================= -->
    <section class="erp-feature-card">
        <header class="erp-feature-card__header">
            <h1 class="erp-feature-card__title">Add Package Features</h1>
            <button class="erp-btn--icon" id="erpCloseBtn">
                <svg viewBox="0 0 24 24" width="20" height="20" fill="white">
                    <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
                </svg>
            </button>
        </header>

        <!-- Feature Form -->
        <div class="erp-feature-form">
            <!-- Feature Input -->
            <div class="erp-form-group">
                <label class="erp-form-label">
                    Feature Name <span>*</span>
                </label>
                <input type="text" class="erp-form-input" id="featureName" placeholder="Enter feature name (e.g., Sound System)" autocomplete="off">
            </div>

            <!-- Add More Button -->
            <button class="erp-btn erp-btn--secondary" id="addMoreBtn" style="margin-bottom: 20px;">
                <svg viewBox="0 0 24 24">
                    <path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"/>
                </svg>
                Add More
            </button>

            <!-- Features Added List -->
            <div class="erp-features-added">
                <div class="erp-features-title">
                    Features Added <span id="featureCount">0</span>
                </div>
                <div id="featuresListContainer">
                    <div class="erp-no-features" id="noFeaturesMsg">
                        No features added yet. Add your first feature above.
                    </div>
                </div>
            </div>

            <!-- Form Actions -->
            <div class="erp-form-actions">
                <button class="erp-btn erp-btn--secondary" id="cancelBtn">
                    <svg viewBox="0 0 24 24">
                        <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
                    </svg>
                    Cancel
                </button>
                <button class="erp-btn erp-btn--success" id="doneBtn">
                    <svg viewBox="0 0 24 24">
                        <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                    </svg>
                    Done
                </button>
            </div>
        </div>
    </section>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Store features
        let features = [];

        // DOM elements
        const featureNameInput = document.getElementById('featureName');
        const addMoreBtn = document.getElementById('addMoreBtn');
        const doneBtn = document.getElementById('doneBtn');
        const cancelBtn = document.getElementById('cancelBtn');
        const closeBtn = document.getElementById('erpCloseBtn');
        const featuresListContainer = document.getElementById('featuresListContainer');
        const noFeaturesMsg = document.getElementById('noFeaturesMsg');
        const featureCountSpan = document.getElementById('featureCount');

        // Update features list display
        function updateFeaturesList() {
            // Update count
            featureCountSpan.textContent = features.length;

            // Clear container
            featuresListContainer.innerHTML = '';

            if (features.length === 0) {
                // Show no features message
                const noFeaturesDiv = document.createElement('div');
                noFeaturesDiv.className = 'erp-no-features';
                noFeaturesDiv.id = 'noFeaturesMsg';
                noFeaturesDiv.textContent = 'No features added yet. Add your first feature above.';
                featuresListContainer.appendChild(noFeaturesDiv);
            } else {
                // Show all features
                features.forEach((feature, index) => {
                    const featureTag = document.createElement('div');
                    featureTag.className = 'erp-feature-tag';
                    featureTag.innerHTML = `
                        <span class="erp-feature-tag-name">${feature}</span>
                        <button class="erp-feature-tag-remove" onclick="removeFeature(${index})">✕</button>
                    `;
                    featuresListContainer.appendChild(featureTag);
                });
            }
        }

        // Add new feature
        function addFeature() {
            const featureName = featureNameInput.value.trim();
            
            if (featureName === '') {
                alert('Please enter a feature name');
                return false;
            }

            // Add to features array
            features.push(featureName);
            
            // Clear input
            featureNameInput.value = '';
            
            // Update display
            updateFeaturesList();
            
            return true;
        }

        // Remove feature
        window.removeFeature = function(index) {
            if (confirm('Remove this feature?')) {
                features.splice(index, 1);
                updateFeaturesList();
            }
        };

        // Add More button click
        addMoreBtn.addEventListener('click', function() {
            addFeature();
        });

        // Enter key in input
        featureNameInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                addFeature();
            }
        });

        // Done button click
        doneBtn.addEventListener('click', function() {
            // If there's text in input, add it first
            if (featureNameInput.value.trim() !== '') {
                addFeature();
            }

            if (features.length === 0) {
                alert('Please add at least one feature');
                return;
            }

            // Show summary
            const featureList = features.map(f => `• ${f}`).join('\n');
            alert(`Done! Features added:\n\n${featureList}\n\nTotal: ${features.length} features`);
            
            // Here you would typically redirect or process the features
            // window.location.href = 'package_summary.php';
        });

        // Cancel button
        cancelBtn.addEventListener('click', function() {
            if (confirm('Cancel and go back?')) {
                window.location.href = 'package_list.php';
            }
        });

        // Close button
        closeBtn.addEventListener('click', function() {
            if (confirm('Close and go back?')) {
                window.location.href = 'package_list.php';
            }
        });

        // Initial update
        updateFeaturesList();

        // Focus on input
        featureNameInput.focus();
    });
</script>
<?php endif; ?>