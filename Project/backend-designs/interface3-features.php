<!-- components/content/feature_list.php -->
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
        max-width: 800px;
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

    /* ================= SEARCH SECTION ================= */
    .erp-feature-card__search {
        padding: 20px 24px;
        background: var(--erp-surface-alt);
        border-bottom: 1px solid var(--erp-border);
        display: flex;
        gap: 15px;
        align-items: center;
        flex-wrap: wrap;
    }

    .erp-search-box {
        flex: 1;
        min-width: 300px;
        position: relative;
    }

    .erp-search-box__input {
        width: 100%;
        padding: 10px 15px 10px 40px;
        border-radius: 6px;
        border: 1px solid var(--erp-border);
        background: var(--erp-surface);
        color: var(--erp-text-primary);
        font-size: 14px;
    }

    .erp-search-box__input:focus {
        outline: none;
        border-color: var(--erp-primary-light);
    }

    .erp-search-box__icon {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--erp-text-tertiary);
    }

    .erp-btn--primary {
        padding: 10px 20px;
        border: none;
        border-radius: 6px;
        background: var(--erp-primary);
        color: #fff;
        font-weight: 600;
        cursor: pointer;
        white-space: nowrap;
    }

    .erp-btn--primary:hover {
        background: var(--erp-primary-dark);
    }

    /* ================= BULK ACTIONS BAR ================= */
    .erp-bulk-actions {
        padding: 12px 24px;
        background: var(--erp-surface);
        border-bottom: 1px solid var(--erp-border);
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .erp-select-all {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 14px;
        color: var(--erp-text-secondary);
    }

    .erp-checkbox {
        width: 18px;
        height: 18px;
        cursor: pointer;
        accent-color: var(--erp-primary);
    }

    .erp-selected-count {
        font-size: 13px;
        color: var(--erp-text-tertiary);
        background: var(--erp-border);
        padding: 4px 10px;
        border-radius: 20px;
    }

    /* ================= FEATURE LIST ================= */
    .erp-feature-list {
        padding: 24px;
        max-height: 400px;
        overflow-y: auto;
    }

    .erp-feature-item {
        background: var(--erp-surface-alt);
        border: 1px solid var(--erp-border);
        border-radius: 8px;
        padding: 16px 20px;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        transition: all 0.2s;
    }

    .erp-feature-item:hover {
        border-color: var(--erp-primary-light);
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    .erp-feature-item.selected {
        background: rgba(var(--erp-primary-rgb), 0.05);
        border-color: var(--erp-primary);
    }

    .erp-feature-info {
        display: flex;
        align-items: center;
        gap: 15px;
        flex: 1;
    }

    .erp-feature-checkbox {
        width: 18px;
        height: 18px;
        cursor: pointer;
        accent-color: var(--erp-primary);
    }

    .erp-feature-name {
        font-size: 16px;
        font-weight: 500;
        color: var(--erp-text-primary);
    }

    .erp-feature-actions {
        display: flex;
        gap: 10px;
    }

    .erp-btn--small {
        padding: 6px 16px;
        border: none;
        border-radius: 6px;
        font-size: 13px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s;
    }

    .erp-btn--delete {
        background: var(--erp-error-dark);
        color: #fff;
    }

    .erp-btn--delete:hover {
        background: var(--erp-error-darker);
    }

    .erp-btn--delete:disabled {
        background: var(--erp-border);
        cursor: not-allowed;
        opacity: 0.5;
    }

    /* ================= CREATE MODAL ================= */
    .erp-modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0,0,0,0.5);
        z-index: 1000;
        align-items: center;
        justify-content: center;
    }

    .erp-modal.show {
        display: flex;
    }

    .erp-modal__content {
        background: var(--erp-surface);
        border-radius: 10px;
        width: 90%;
        max-width: 400px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.2);
    }

    .erp-modal__header {
        padding: 16px 20px;
        background: var(--erp-primary);
        color: #fff;
        border-radius: 10px 10px 0 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .erp-modal__title {
        font-size: 16px;
        font-weight: 600;
    }

    .erp-modal__close {
        background: transparent;
        border: none;
        color: #fff;
        font-size: 20px;
        cursor: pointer;
        width: 30px;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 4px;
    }

    .erp-modal__close:hover {
        background: rgba(255,255,255,0.1);
    }

    .erp-modal__body {
        padding: 24px;
    }

    .erp-modal-form-group {
        margin-bottom: 20px;
    }

    .erp-modal-label {
        display: block;
        font-size: 14px;
        font-weight: 600;
        color: var(--erp-text-secondary);
        margin-bottom: 6px;
    }

    .erp-modal-label span {
        color: var(--erp-error);
    }

    .erp-modal-input {
        width: 100%;
        padding: 10px 14px;
        border: 1px solid var(--erp-border);
        border-radius: 6px;
        font-size: 14px;
    }

    .erp-modal-input:focus {
        outline: none;
        border-color: var(--erp-primary-light);
    }

    .erp-modal-actions {
        display: flex;
        gap: 12px;
        justify-content: flex-end;
        margin-top: 24px;
    }

    .erp-modal-btn {
        padding: 10px 20px;
        border: none;
        border-radius: 6px;
        font-weight: 500;
        font-size: 14px;
        cursor: pointer;
    }

    .erp-modal-btn--primary {
        background: var(--erp-primary);
        color: #fff;
    }

    .erp-modal-btn--primary:hover {
        background: var(--erp-primary-dark);
    }

    .erp-modal-btn--secondary {
        background: var(--erp-border);
        color: var(--erp-text-primary);
    }

    .erp-modal-btn--secondary:hover {
        background: var(--erp-border-dark);
    }

    /* ================= FINISH BUTTON SECTION ================= */
    .erp-finish-section {
        padding: 20px 24px;
        background: var(--erp-surface);
        border-top: 1px solid var(--erp-border);
        display: flex;
        justify-content: flex-end;
    }

    .erp-btn--finish {
        padding: 12px 40px;
        background: var(--erp-success);
        color: #fff;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        font-size: 16px;
        cursor: pointer;
        transition: all 0.2s;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .erp-btn--finish:hover {
        background: #218838;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(40, 167, 69, 0.3);
    }

    .erp-btn--finish svg {
        width: 20px;
        height: 20px;
        fill: currentColor;
    }

    /* ================= EMPTY STATE ================= */
    .erp-empty-state {
        text-align: center;
        padding: 60px 24px;
        background: var(--erp-surface-alt);
        border-radius: 10px;
        border: 2px dashed var(--erp-border);
    }

    .erp-empty-state__icon {
        font-size: 48px;
        color: var(--erp-text-tertiary);
        margin-bottom: 16px;
    }

    .erp-empty-state__title {
        font-size: 18px;
        font-weight: 600;
        color: var(--erp-text-primary);
        margin-bottom: 8px;
    }

    .erp-empty-state__text {
        font-size: 14px;
        color: var(--erp-text-tertiary);
        margin-bottom: 20px;
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

        .erp-feature-card__search {
            padding: 16px 20px;
            flex-direction: column;
            align-items: stretch;
        }

        .erp-search-box {
            min-width: 100%;
        }

        .erp-bulk-actions {
            padding: 12px 16px;
            flex-wrap: wrap;
        }

        .erp-feature-list {
            padding: 16px;
        }

        .erp-feature-item {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }

        .erp-feature-info {
            width: 100%;
        }

        .erp-feature-actions {
            width: 100%;
            justify-content: flex-end;
        }

        .erp-finish-section {
            padding: 16px;
        }

        .erp-btn--finish {
            width: 100%;
            justify-content: center;
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

        .erp-feature-actions {
            flex-direction: column;
            gap: 8px;
        }

        .erp-btn--small {
            width: 100%;
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
        <span>Select Features</span>
    </nav>

    <!-- ================= FEATURE CARD ================= -->
    <section class="erp-feature-card">
        <header class="erp-feature-card__header">
            <h1 class="erp-feature-card__title">Select Package Features</h1>
            <button class="erp-btn--icon" id="erpCloseBtn">
                <svg viewBox="0 0 24 24" width="20" height="20" fill="white">
                    <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
                </svg>
            </button>
        </header>

        <!-- Search and Create -->
        <div class="erp-feature-card__search">
            <div class="erp-search-box">
                <span class="erp-search-box__icon">🔍</span>
                <input type="text" class="erp-search-box__input" placeholder="Search features..." id="searchFeature">
            </div>
            <button class="erp-btn--primary" id="createFeatureBtn">＋ Create New Feature</button>
        </div>

        <!-- Bulk Actions Bar -->
        <div class="erp-bulk-actions">
            <div class="erp-select-all">
                <input type="checkbox" class="erp-checkbox" id="selectAll">
                <label for="selectAll">Select All</label>
            </div>
            <span class="erp-selected-count" id="selectedCount">0 selected</span>
        </div>

        <!-- Features List -->
        <div class="erp-feature-list" id="featuresContainer">
            <!-- Feature 1 -->
            <div class="erp-feature-item" data-id="1" data-name="Sound System">
                <div class="erp-feature-info">
                    <input type="checkbox" class="erp-feature-checkbox" data-id="1">
                    <span class="erp-feature-name">Sound System</span>
                </div>
                <div class="erp-feature-actions">
                    <button class="erp-btn--small erp-btn--delete" onclick="deleteFeature(1)">Delete</button>
                </div>
            </div>

            <!-- Feature 2 -->
            <div class="erp-feature-item" data-id="2" data-name="Lighting Setup">
                <div class="erp-feature-info">
                    <input type="checkbox" class="erp-feature-checkbox" data-id="2">
                    <span class="erp-feature-name">Lighting Setup</span>
                </div>
                <div class="erp-feature-actions">
                    <button class="erp-btn--small erp-btn--delete" onclick="deleteFeature(2)">Delete</button>
                </div>
            </div>

            <!-- Feature 3 -->
            <div class="erp-feature-item" data-id="3" data-name="Stage Decoration">
                <div class="erp-feature-info">
                    <input type="checkbox" class="erp-feature-checkbox" data-id="3">
                    <span class="erp-feature-name">Stage Decoration</span>
                </div>
                <div class="erp-feature-actions">
                    <button class="erp-btn--small erp-btn--delete" onclick="deleteFeature(3)">Delete</button>
                </div>
            </div>

            <!-- Feature 4 -->
            <div class="erp-feature-item" data-id="4" data-name="Catering Services">
                <div class="erp-feature-info">
                    <input type="checkbox" class="erp-feature-checkbox" data-id="4">
                    <span class="erp-feature-name">Catering Services</span>
                </div>
                <div class="erp-feature-actions">
                    <button class="erp-btn--small erp-btn--delete" onclick="deleteFeature(4)">Delete</button>
                </div>
            </div>

            <!-- Feature 5 -->
            <div class="erp-feature-item" data-id="5" data-name="Security Staff">
                <div class="erp-feature-info">
                    <input type="checkbox" class="erp-feature-checkbox" data-id="5">
                    <span class="erp-feature-name">Security Staff</span>
                </div>
                <div class="erp-feature-actions">
                    <button class="erp-btn--small erp-btn--delete" onclick="deleteFeature(5)">Delete</button>
                </div>
            </div>

            <!-- Feature 6 -->
            <div class="erp-feature-item" data-id="6" data-name="Parking Facilities">
                <div class="erp-feature-info">
                    <input type="checkbox" class="erp-feature-checkbox" data-id="6">
                    <span class="erp-feature-name">Parking Facilities</span>
                </div>
                <div class="erp-feature-actions">
                    <button class="erp-btn--small erp-btn--delete" onclick="deleteFeature(6)">Delete</button>
                </div>
            </div>
        </div>

        <!-- Finish Button Section -->
        <div class="erp-finish-section">
            <button class="erp-btn--finish" id="finishBtn">
                <svg viewBox="0 0 24 24">
                    <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
                </svg>
                Finish
            </button>
        </div>
    </section>

    <!-- Create Feature Modal -->
    <div class="erp-modal" id="featureModal">
        <div class="erp-modal__content">
            <div class="erp-modal__header">
                <h2 class="erp-modal__title">Create New Feature</h2>
                <button class="erp-modal__close" onclick="closeModal()">✕</button>
            </div>
            <div class="erp-modal__body">
                <form id="featureForm">
                    <div class="erp-modal-form-group">
                        <label class="erp-modal-label">Feature Name <span>*</span></label>
                        <input type="text" class="erp-modal-input" id="featureName" placeholder="e.g., Sound System" required>
                    </div>
                    <div class="erp-modal-actions">
                        <button type="button" class="erp-modal-btn erp-modal-btn--secondary" onclick="closeModal()">Cancel</button>
                        <button type="submit" class="erp-modal-btn erp-modal-btn--primary">Create Feature</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Close button
        document.getElementById('erpCloseBtn')?.addEventListener('click', () => {
            if (confirm('Close feature selection?')) {
                alert('Returning to dashboard...');
            }
        });

        // Create feature button
        document.getElementById('createFeatureBtn')?.addEventListener('click', () => {
            openModal();
        });

        // Search functionality
        const searchInput = document.getElementById('searchFeature');
        if (searchInput) {
            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase().trim();
                const features = document.querySelectorAll('.erp-feature-item');

                features.forEach(item => {
                    const name = item.getAttribute('data-name').toLowerCase();
                    if (searchTerm === '' || name.includes(searchTerm)) {
                        item.style.display = 'flex';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        }

        // Select All functionality
        const selectAllCheckbox = document.getElementById('selectAll');
        const featureCheckboxes = document.querySelectorAll('.erp-feature-checkbox');
        const selectedCountSpan = document.getElementById('selectedCount');

        function updateSelectedCount() {
            const checked = document.querySelectorAll('.erp-feature-checkbox:checked').length;
            selectedCountSpan.textContent = `${checked} selected`;
            
            // Update select all checkbox
            if (selectAllCheckbox) {
                selectAllCheckbox.checked = checked === featureCheckboxes.length;
                selectAllCheckbox.indeterminate = checked > 0 && checked < featureCheckboxes.length;
            }
        }

        if (selectAllCheckbox) {
            selectAllCheckbox.addEventListener('change', function() {
                featureCheckboxes.forEach(checkbox => {
                    checkbox.checked = this.checked;
                });
                updateSelectedCount();
            });
        }

        featureCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', updateSelectedCount);
        });

        // Modal form submission
        document.getElementById('featureForm')?.addEventListener('submit', (e) => {
            e.preventDefault();
            
            const featureName = document.getElementById('featureName').value;
            
            // Create new feature element
            const container = document.getElementById('featuresContainer');
            const newId = container.children.length + 1;
            
            const newFeature = document.createElement('div');
            newFeature.className = 'erp-feature-item';
            newFeature.setAttribute('data-id', newId);
            newFeature.setAttribute('data-name', featureName);
            newFeature.innerHTML = `
                <div class="erp-feature-info">
                    <input type="checkbox" class="erp-feature-checkbox" data-id="${newId}">
                    <span class="erp-feature-name">${featureName}</span>
                </div>
                <div class="erp-feature-actions">
                    <button class="erp-btn--small erp-btn--delete" onclick="deleteFeature(${newId})">Delete</button>
                </div>
            `;
            
            container.appendChild(newFeature);
            
            // Add event listener to new checkbox
            const newCheckbox = newFeature.querySelector('.erp-feature-checkbox');
            newCheckbox.addEventListener('change', updateSelectedCount);
            
            alert(`Feature "${featureName}" created successfully!`);
            closeModal();
            document.getElementById('featureForm').reset();
            updateSelectedCount();
        });

        // Finish button
        document.getElementById('finishBtn')?.addEventListener('click', () => {
            const selectedFeatures = [];
            document.querySelectorAll('.erp-feature-checkbox:checked').forEach(checkbox => {
                const featureItem = checkbox.closest('.erp-feature-item');
                const featureName = featureItem.querySelector('.erp-feature-name').textContent;
                selectedFeatures.push(featureName);
            });

            if (selectedFeatures.length === 0) {
                alert('No features selected. Please select at least one feature.');
            } else {
                alert(`Finished! Selected features:\n- ${selectedFeatures.join('\n- ')}`);
                // window.location.href = 'package_summary.php';
            }
        });

        // Initial count update
        updateSelectedCount();
    });

    // Modal functions
    function openModal() {
        document.getElementById('featureModal').classList.add('show');
    }

    function closeModal() {
        document.getElementById('featureModal').classList.remove('show');
        document.getElementById('featureForm').reset();
    }

    // Delete feature
    function deleteFeature(id) {
        if (confirm('Are you sure you want to delete this feature?')) {
            const featureItem = document.querySelector(`.erp-feature-item[data-id="${id}"]`);
            if (featureItem) {
                const featureName = featureItem.querySelector('.erp-feature-name').textContent;
                featureItem.remove();
                
                // Update selected count
                const event = new Event('change');
                document.querySelectorAll('.erp-feature-checkbox').forEach(cb => cb.dispatchEvent(event));
                
                alert(`Feature "${featureName}" deleted successfully!`);
            }
        }
    }

    // Close modal when clicking outside
    window.addEventListener('click', (e) => {
        const modal = document.getElementById('featureModal');
        if (e.target === modal) {
            closeModal();
        }
    });
</script>
<?php endif; ?>