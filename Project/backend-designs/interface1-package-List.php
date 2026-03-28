<!-- components/content/package_list.php -->
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

    /* ================= PACKAGE CARD ================= */
    .erp-package-card {
        background: var(--erp-surface);
        border-radius: 10px;
        border: 1px solid var(--erp-border);
        box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        max-width: 900px;
        margin: 0 auto;
        overflow: hidden;
    }

    /* Header */
    .erp-package-card__header {
        padding: 20px 24px;
        background: var(--erp-primary);
        color: #fff;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-radius: 10px 10px 0 0;
    }

    .erp-package-card__title {
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
    .erp-package-card__search {
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

    /* ================= FILTER TABS ================= */
    .erp-package-tabs {
        padding: 16px 24px;
        background: var(--erp-surface);
        border-bottom: 1px solid var(--erp-border);
        display: flex;
        gap: 20px;
    }

    .erp-tab {
        padding: 6px 0;
        color: var(--erp-text-tertiary);
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        border-bottom: 2px solid transparent;
        transition: all 0.2s;
    }

    .erp-tab:hover {
        color: var(--erp-text-primary);
    }

    .erp-tab.active {
        color: var(--erp-primary);
        border-bottom-color: var(--erp-primary);
    }

    .erp-tab-count {
        background: var(--erp-border);
        color: var(--erp-text-secondary);
        padding: 2px 8px;
        border-radius: 20px;
        font-size: 12px;
        margin-left: 6px;
    }

    /* ================= PACKAGE LIST ================= */
    .erp-package-list {
        padding: 24px;
    }

    .erp-package-item {
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

    .erp-package-item:hover {
        border-color: var(--erp-primary-light);
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    .erp-package-name {
        font-size: 16px;
        font-weight: 500;
        color: var(--erp-text-primary);
    }

    .erp-package-actions {
        display: flex;
        align-items: center;
        gap: 30px;
    }

    /* ===== VISIBILITY TOGGLE ===== */
    .erp-visibility-toggle {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .erp-visibility-label {
        font-size: 14px;
        color: var(--erp-text-secondary);
    }

    .erp-visibility-status {
        font-size: 13px;
        font-weight: 500;
        padding: 4px 8px;
        border-radius: 20px;
        min-width: 60px;
        text-align: center;
    }

    .erp-visibility-status.visible {
        background: #d4edda;
        color: #155724;
    }

    .erp-visibility-status.hidden {
        background: #f8d7da;
        color: #721c24;
    }

    /* Toggle Switch */
    .erp-toggle-switch {
        position: relative;
        display: inline-block;
        width: 50px;
        height: 26px;
    }

    .erp-toggle-switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .erp-toggle-slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #dc3545;
        transition: .3s;
        border-radius: 26px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }

    .erp-toggle-slider:before {
        position: absolute;
        content: "✕";
        height: 20px;
        width: 20px;
        left: 3px;
        bottom: 3px;
        background-color: white;
        transition: .3s;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
        color: #dc3545;
        font-weight: bold;
    }

    input:checked + .erp-toggle-slider {
        background-color: #28a745;
    }

    input:checked + .erp-toggle-slider:before {
        content: "✓";
        transform: translateX(24px);
        color: #28a745;
    }

    /* View Button */
    .erp-btn--view {
        padding: 8px 20px;
        border: none;
        border-radius: 6px;
        font-size: 13px;
        font-weight: 500;
        cursor: pointer;
        transition: all 0.2s;
        background: var(--erp-primary);
        color: #fff;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .erp-btn--view:hover {
        background: var(--erp-primary-dark);
    }

    .erp-btn--view svg {
        width: 16px;
        height: 16px;
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

        .erp-package-card__header {
            padding: 16px 20px;
        }

        .erp-package-card__search {
            padding: 16px 20px;
            flex-direction: column;
            align-items: stretch;
        }

        .erp-search-box {
            min-width: 100%;
        }

        .erp-package-tabs {
            padding: 12px 20px;
            overflow-x: auto;
            white-space: nowrap;
        }

        .erp-package-list {
            padding: 16px;
        }

        .erp-package-item {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }

        .erp-package-actions {
            width: 100%;
            flex-direction: column;
            gap: 15px;
            align-items: flex-start;
        }

        .erp-visibility-toggle {
            width: 100%;
            justify-content: space-between;
        }

        .erp-btn--view {
            width: 100%;
            justify-content: center;
        }
    }

    @media (max-width: 480px) {
        .erp-page-title {
            font-size: 22px;
        }

        .erp-package-card__header {
            flex-direction: column;
            align-items: flex-start;
            gap: 12px;
        }

        .erp-package-card__title {
            font-size: 16px;
        }
    }
</style>

<main class="erp-content-area">
    <!-- ================= PAGE TITLE & BREADCRUMB ================= -->
    <h1 class="erp-page-title">Package Management</h1>
    <nav class="erp-breadcrumb-global">
        <span>Dashboard</span>
        <span class="erp-breadcrumb__separator">/</span>
        <span>Packages</span>
        <span class="erp-breadcrumb__separator">/</span>
        <span>Package List</span>
    </nav>

    <!-- ================= PACKAGE CARD ================= -->
    <section class="erp-package-card">
        <header class="erp-package-card__header">
            <h1 class="erp-package-card__title">Theater Packages</h1>
            <button class="erp-btn--icon" id="erpCloseBtn">
                <svg viewBox="0 0 24 24" width="20" height="20" fill="white">
                    <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
                </svg>
            </button>
        </header>

        <!-- Search and Create -->
        <div class="erp-package-card__search">
            <div class="erp-search-box">
                <span class="erp-search-box__icon">🔍</span>
                <input type="text" class="erp-search-box__input" placeholder="Search packages..." id="searchPackage">
            </div>
            <button class="erp-btn--primary" id="createPackageBtn">＋ Create New Package</button>
        </div>

        <!-- Filter Tabs -->
        <div class="erp-package-tabs">
            <div class="erp-tab active" data-filter="all" onclick="filterPackages('all')">
                All Packages
                <span class="erp-tab-count" id="allCount">8</span>
            </div>
            <div class="erp-tab" data-filter="visible" onclick="filterPackages('visible')">
                Visible on Website
                <span class="erp-tab-count" id="visibleCount">5</span>
            </div>
            <div class="erp-tab" data-filter="hidden" onclick="filterPackages('hidden')">
                Hidden from Website
                <span class="erp-tab-count" id="hiddenCount">3</span>
            </div>
        </div>

        <!-- Packages List -->
        <div class="erp-package-list" id="packagesContainer">
            <!-- Package 1 - Visible -->
            <div class="erp-package-item" data-name="Premium Theater Package" data-visible="true">
                <span class="erp-package-name">Premium Theater Package</span>
                <div class="erp-package-actions">
                    <div class="erp-visibility-toggle">
                        <span class="erp-visibility-label">Show on website:</span>
                        <label class="erp-toggle-switch">
                            <input type="checkbox" class="visibility-toggle" data-id="1" checked onchange="toggleVisibility(1, this.checked)">
                            <span class="erp-toggle-slider"></span>
                        </label>
                        <span class="erp-visibility-status visible" id="status-1">Visible</span>
                    </div>
                    <button class="erp-btn--view" onclick="viewPackage(1)">
                        <svg viewBox="0 0 24 24">
                            <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                        </svg>
                        View Details
                    </button>
                </div>
            </div>

            <!-- Package 2 - Visible -->
            <div class="erp-package-item" data-name="Basic Theater Package" data-visible="true">
                <span class="erp-package-name">Basic Theater Package</span>
                <div class="erp-package-actions">
                    <div class="erp-visibility-toggle">
                        <span class="erp-visibility-label">Show on website:</span>
                        <label class="erp-toggle-switch">
                            <input type="checkbox" class="visibility-toggle" data-id="2" checked onchange="toggleVisibility(2, this.checked)">
                            <span class="erp-toggle-slider"></span>
                        </label>
                        <span class="erp-visibility-status visible" id="status-2">Visible</span>
                    </div>
                    <button class="erp-btn--view" onclick="viewPackage(2)">
                        <svg viewBox="0 0 24 24">
                            <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                        </svg>
                        View Details
                    </button>
                </div>
            </div>

            <!-- Package 3 - Visible -->
            <div class="erp-package-item" data-name="Weekend Special Package" data-visible="true">
                <span class="erp-package-name">Weekend Special Package</span>
                <div class="erp-package-actions">
                    <div class="erp-visibility-toggle">
                        <span class="erp-visibility-label">Show on website:</span>
                        <label class="erp-toggle-switch">
                            <input type="checkbox" class="visibility-toggle" data-id="3" checked onchange="toggleVisibility(3, this.checked)">
                            <span class="erp-toggle-slider"></span>
                        </label>
                        <span class="erp-visibility-status visible" id="status-3">Visible</span>
                    </div>
                    <button class="erp-btn--view" onclick="viewPackage(3)">
                        <svg viewBox="0 0 24 24">
                            <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                        </svg>
                        View Details
                    </button>
                </div>
            </div>

            <!-- Package 4 - Hidden -->
            <div class="erp-package-item" data-name="Corporate Theater Package" data-visible="false">
                <span class="erp-package-name">Corporate Theater Package</span>
                <div class="erp-package-actions">
                    <div class="erp-visibility-toggle">
                        <span class="erp-visibility-label">Show on website:</span>
                        <label class="erp-toggle-switch">
                            <input type="checkbox" class="visibility-toggle" data-id="4" onchange="toggleVisibility(4, this.checked)">
                            <span class="erp-toggle-slider"></span>
                        </label>
                        <span class="erp-visibility-status hidden" id="status-4">Hidden</span>
                    </div>
                    <button class="erp-btn--view" onclick="viewPackage(4)">
                        <svg viewBox="0 0 24 24">
                            <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                        </svg>
                        View Details
                    </button>
                </div>
            </div>

            <!-- Package 5 - Visible -->
            <div class="erp-package-item" data-name="Holiday Special Package" data-visible="true">
                <span class="erp-package-name">Holiday Special Package</span>
                <div class="erp-package-actions">
                    <div class="erp-visibility-toggle">
                        <span class="erp-visibility-label">Show on website:</span>
                        <label class="erp-toggle-switch">
                            <input type="checkbox" class="visibility-toggle" data-id="5" checked onchange="toggleVisibility(5, this.checked)">
                            <span class="erp-toggle-slider"></span>
                        </label>
                        <span class="erp-visibility-status visible" id="status-5">Visible</span>
                    </div>
                    <button class="erp-btn--view" onclick="viewPackage(5)">
                        <svg viewBox="0 0 24 24">
                            <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                        </svg>
                        View Details
                    </button>
                </div>
            </div>

            <!-- Package 6 - Hidden -->
            <div class="erp-package-item" data-name="Educational Workshop Package" data-visible="false">
                <span class="erp-package-name">Educational Workshop Package</span>
                <div class="erp-package-actions">
                    <div class="erp-visibility-toggle">
                        <span class="erp-visibility-label">Show on website:</span>
                        <label class="erp-toggle-switch">
                            <input type="checkbox" class="visibility-toggle" data-id="6" onchange="toggleVisibility(6, this.checked)">
                            <span class="erp-toggle-slider"></span>
                        </label>
                        <span class="erp-visibility-status hidden" id="status-6">Hidden</span>
                    </div>
                    <button class="erp-btn--view" onclick="viewPackage(6)">
                        <svg viewBox="0 0 24 24">
                            <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                        </svg>
                        View Details
                    </button>
                </div>
            </div>

            <!-- Package 7 - Hidden -->
            <div class="erp-package-item" data-name="Family Fun Package" data-visible="false">
                <span class="erp-package-name">Family Fun Package</span>
                <div class="erp-package-actions">
                    <div class="erp-visibility-toggle">
                        <span class="erp-visibility-label">Show on website:</span>
                        <label class="erp-toggle-switch">
                            <input type="checkbox" class="visibility-toggle" data-id="7" onchange="toggleVisibility(7, this.checked)">
                            <span class="erp-toggle-slider"></span>
                        </label>
                        <span class="erp-visibility-status hidden" id="status-7">Hidden</span>
                    </div>
                    <button class="erp-btn--view" onclick="viewPackage(7)">
                        <svg viewBox="0 0 24 24">
                            <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                        </svg>
                        View Details
                    </button>
                </div>
            </div>

            <!-- Package 8 - Visible -->
            <div class="erp-package-item" data-name="Student Discount Package" data-visible="true">
                <span class="erp-package-name">Student Discount Package</span>
                <div class="erp-package-actions">
                    <div class="erp-visibility-toggle">
                        <span class="erp-visibility-label">Show on website:</span>
                        <label class="erp-toggle-switch">
                            <input type="checkbox" class="visibility-toggle" data-id="8" checked onchange="toggleVisibility(8, this.checked)">
                            <span class="erp-toggle-slider"></span>
                        </label>
                        <span class="erp-visibility-status visible" id="status-8">Visible</span>
                    </div>
                    <button class="erp-btn--view" onclick="viewPackage(8)">
                        <svg viewBox="0 0 24 24">
                            <path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>
                        </svg>
                        View Details
                    </button>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Close button
        document.getElementById('erpCloseBtn')?.addEventListener('click', () => {
            if (confirm('Close package list?')) {
                alert('Returning to dashboard...');
            }
        });

        // Create package button
        document.getElementById('createPackageBtn')?.addEventListener('click', () => {
            alert('Creating new theater package...');
            // window.location.href = 'create_package.php';
        });

        // Search functionality
        const searchInput = document.getElementById('searchPackage');
        if (searchInput) {
            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase().trim();
                const packages = document.querySelectorAll('.erp-package-item');
                let visibleCount = 0;

                packages.forEach(item => {
                    const name = item.getAttribute('data-name').toLowerCase();
                    const matches = searchTerm === '' || name.includes(searchTerm);
                    
                    // Check if matches current filter
                    const currentFilter = document.querySelector('.erp-tab.active')?.getAttribute('data-filter') || 'all';
                    const webVisible = item.getAttribute('data-visible') === 'true';
                    
                    let filterMatch = true;
                    if (currentFilter === 'visible' && !webVisible) filterMatch = false;
                    if (currentFilter === 'hidden' && webVisible) filterMatch = false;
                    
                    if (matches && filterMatch) {
                        item.style.display = 'flex';
                        visibleCount++;
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        }

        // Update counts
        updateCounts();
    });

    // Filter packages
    function filterPackages(filter) {
        // Update active tab
        document.querySelectorAll('.erp-tab').forEach(tab => {
            tab.classList.remove('active');
            if (tab.getAttribute('data-filter') === filter) {
                tab.classList.add('active');
            }
        });

        const packages = document.querySelectorAll('.erp-package-item');
        const searchTerm = document.getElementById('searchPackage')?.value.toLowerCase().trim() || '';

        packages.forEach(item => {
            const webVisible = item.getAttribute('data-visible') === 'true';
            const name = item.getAttribute('data-name').toLowerCase();
            const matchesSearch = searchTerm === '' || name.includes(searchTerm);
            
            let show = false;
            if (filter === 'all') show = true;
            if (filter === 'visible') show = webVisible;
            if (filter === 'hidden') show = !webVisible;
            
            if (show && matchesSearch) {
                item.style.display = 'flex';
            } else {
                item.style.display = 'none';
            }
        });
    }

    // Toggle visibility
    function toggleVisibility(id, isVisible) {
        const packageItem = document.querySelector(`.visibility-toggle[data-id="${id}"]`)?.closest('.erp-package-item');
        if (packageItem) {
            // Update data attribute
            packageItem.setAttribute('data-visible', isVisible ? 'true' : 'false');
            
            // Update status text and class
            const statusSpan = document.getElementById(`status-${id}`);
            if (statusSpan) {
                statusSpan.textContent = isVisible ? 'Visible' : 'Hidden';
                statusSpan.className = `erp-visibility-status ${isVisible ? 'visible' : 'hidden'}`;
            }
            
            // Update counts
            updateCounts();
            
            // Show confirmation message
            const packageName = packageItem.querySelector('.erp-package-name').textContent;
            const action = isVisible ? 'now visible on the website' : 'now hidden from the website';
            alert(`"${packageName}" is ${action}`);
            
            // Refresh current filter
            const currentFilter = document.querySelector('.erp-tab.active')?.getAttribute('data-filter') || 'all';
            filterPackages(currentFilter);
        }
    }

    // Update count badges
    function updateCounts() {
        const packages = document.querySelectorAll('.erp-package-item');
        let visibleCount = 0;
        let hiddenCount = 0;
        
        packages.forEach(item => {
            if (item.getAttribute('data-visible') === 'true') {
                visibleCount++;
            } else {
                hiddenCount++;
            }
        });
        
        document.getElementById('allCount').textContent = packages.length;
        document.getElementById('visibleCount').textContent = visibleCount;
        document.getElementById('hiddenCount').textContent = hiddenCount;
    }

    // View package
    function viewPackage(id) {
        const packageItem = document.querySelector(`.visibility-toggle[data-id="${id}"]`)?.closest('.erp-package-item');
        const packageName = packageItem?.querySelector('.erp-package-name').textContent || `Package #${id}`;
        alert(`Viewing details for: ${packageName}`);
        // window.location.href = `view_package.php?id=${id}`;
    }
</script>
<?php endif; ?>