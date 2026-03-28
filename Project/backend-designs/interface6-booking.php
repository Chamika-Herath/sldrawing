<?php if (!isset($content_included)): ?>
<?php $content_included = true; ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    /* ================= LAYOUT CONTAINER ================= */
    .erp-content-area {
        flex: 1;
        padding: 32px;
        
        /* Desktop Default */
        margin-left: var(--sidebar-width, 260px); 
        width: calc(100% - var(--sidebar-width, 260px));
        
        min-height: calc(100vh - 50px - 32px);
        background: var(--erp-surface-alt);
        transition: margin-left 0.25s ease, width 0.25s ease;
    }

    /* Handle Collapsed State */
    body.sidebar-collapsed .erp-content-area {
        margin-left: var(--sidebar-collapsed, 70px) !important;
        width: calc(100% - var(--sidebar-collapsed, 70px)) !important;
    }

    .da-section-title { 
        font-size: 28px; font-weight: 700; margin-bottom: 24px; margin-top: 0; 
        color: var(--erp-text-primary);
    }

    /* ================= FILTERS SECTION ================= */
    .da-filters-bar {
        background: var(--erp-surface);
        padding: 20px;
        border-radius: 12px;
        border: 1px solid var(--erp-border);
        margin-bottom: 24px;
        display: flex;
        gap: 16px;
        align-items: center;
        flex-wrap: wrap;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .da-form-group {
        display: flex; flex-direction: column; gap: 8px; flex: 1;
        min-width: 150px; position: relative; 
    }

    .da-form-label {
        font-size: 12px; font-weight: 600; color: var(--erp-text-secondary); 
        text-transform: uppercase; letter-spacing: 0.5px;
    }

    .da-form-control {
        padding: 10px 14px; border: 1px solid var(--erp-border); border-radius: 8px;
        font-size: 14px; background: var(--erp-surface-alt); color: var(--erp-text-primary); 
        outline: none; transition: 0.3s; height: 42px; width: 100%;
        /* Ensures dropdown text is visible */
        color-scheme: dark; 
    }

    .da-form-control:focus {
        border-color: var(--erp-primary); box-shadow: 0 0 0 3px rgba(155, 92, 255, 0.15);
    }

    .da-search-wrapper input { padding-right: 40px; }
    
    .da-search-icon-inside {
        position: absolute; right: 12px; bottom: 12px; color: var(--erp-text-tertiary);
        pointer-events: auto; cursor: pointer; font-size: 14px; transition: all 0.2s ease;
        padding: 5px; margin: -5px; 
    }
    .da-search-icon-inside:hover { color: var(--erp-primary); transform: scale(1.15); }

    .da-filter-search { flex: 2; min-width: 200px; }
    .da-filter-select { flex: 1; }
    .da-filter-date { flex: 1; }

    /* ================= BOOKING LIST TABLE ================= */
    .da-table-container {
        background-color: var(--erp-surface); border: 1px solid var(--erp-border);
        border-radius: 12px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }

    .da-table-scroll-wrapper { width: 100%; overflow-x: auto; }

    .da-grid-row {
        display: grid;
        grid-template-columns: 1.2fr 1fr 1.5fr 1.2fr 60px;
        padding: 16px 24px; align-items: center; gap: 20px;
        min-width: 700px; border-bottom: 1px solid var(--erp-border);
        background: var(--erp-surface); transition: background-color 0.2s;
    }
    .da-grid-row:last-child { border-bottom: none; }
    .da-grid-row:not(.da-grid-header):hover { background-color: rgba(255,255,255,0.02); }

    .da-grid-header {
        background: var(--erp-surface-elevated); border-bottom: 1px solid var(--erp-border);
        font-weight: 600; color: var(--erp-text-secondary); font-size: 13px; text-transform: uppercase;
        letter-spacing: 1px;
    }

    .da-grid-item {
        font-size: 14px; color: var(--erp-text-primary); 
        white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
    }

    .da-grid-item.bold { font-weight: 600; color: var(--erp-primary-light); }

    .da-action-btn {
        width: 36px; height: 36px; border-radius: 8px;
        border: 1px solid transparent; background: transparent; color: var(--erp-text-tertiary);
        cursor: pointer; display: flex; align-items: center; justify-content: center;
        transition: 0.2s;
    }

    .da-action-btn:hover { background: var(--erp-surface-elevated); color: var(--erp-primary); border-color: var(--erp-border); }
    .da-action-btn.active { background: rgba(155, 92, 255, 0.1); color: var(--erp-primary); transform: rotate(90deg); border-color: var(--erp-primary); }

    /* ================= ANIMATED DETAILS SECTION ================= */
    .da-details-row {
        max-height: 0;
        overflow: hidden;
        background-color: var(--erp-surface-alt);
        border-bottom: 0 solid var(--erp-border);
        width: 100%;
        min-width: 700px;
        transition: max-height 0.4s cubic-bezier(0.4, 0, 0.2, 1), border-bottom 0.1s;
    }

    .da-details-row.open {
        max-height: 800px; /* Expand enough to fit contents */
        border-bottom: 1px solid var(--erp-border);
    }

    .da-details-inner {
        padding: 30px 40px;
        border-left: 3px solid var(--erp-primary);
    }

    .da-details-grid {
        display: grid; grid-template-columns: 1fr 1fr; gap: 60px; margin-bottom: 30px;
    }

    .da-detail-group { display: flex; flex-direction: column; gap: 15px; }

    .da-details-title {
        font-size: 16px; font-weight: 700; color: var(--erp-text-primary);
        margin-bottom: 10px; border-bottom: 1px solid var(--erp-border); padding-bottom: 10px;
        text-transform: uppercase; letter-spacing: 0.5px;
    }

    .da-detail-item {
        display: flex; justify-content: space-between; align-items: center;
        font-size: 14px; padding-bottom: 8px; border-bottom: 1px dashed var(--erp-border);
    }

    .da-detail-label { color: var(--erp-text-secondary); font-weight: 500; }
    .da-detail-value { color: var(--erp-text-primary); font-weight: 600; text-align: right; }
    .da-detail-value.highlight { color: var(--erp-primary-light); text-shadow: 0 0 10px rgba(155, 92, 255, 0.3); }

    /* Status Badges */
    .da-status-badge {
        padding: 4px 10px; border-radius: 6px; font-size: 12px; font-weight: 700;
        text-transform: uppercase; letter-spacing: 0.5px; display: inline-block;
    }
    .da-status-paid { background-color: var(--erp-accent-success); color: #000; box-shadow: 0 0 10px rgba(47, 227, 160, 0.2); }
    .da-status-unpaid { background-color: var(--erp-accent-error); color: #fff; box-shadow: 0 0 10px rgba(255, 77, 109, 0.2); }

    /* Action Buttons */
    .da-details-actions {
        display: flex; gap: 16px; padding-top: 24px; border-top: 1px solid var(--erp-border);
    }

    .da-btn {
        padding: 12px 24px; border-radius: 8px; font-size: 14px; font-weight: 700;
        cursor: pointer; border: none; transition: 0.3s; display: flex; align-items: center; gap: 10px;
        text-transform: uppercase; letter-spacing: 0.5px;
    }

    .da-btn-checkin { 
        background-color: var(--erp-primary); color: #fff; 
        box-shadow: 0 4px 15px rgba(155, 92, 255, 0.2);
    }
    .da-btn-checkin:hover { background-color: var(--erp-primary-dark); transform: translateY(-2px); }
    
    .da-btn-checkin:disabled {
        background-color: var(--erp-surface-elevated); color: var(--erp-text-tertiary); 
        cursor: not-allowed; box-shadow: none; transform: none; border: 1px solid var(--erp-border);
    }

    .da-btn-checkout { 
        background-color: transparent; border: 1px solid var(--erp-border); color: var(--erp-text-primary);
        display: none; 
    }
    .da-btn-checkout.visible { display: flex; }
    .da-btn-checkout:hover { background-color: var(--erp-surface-elevated); border-color: var(--erp-text-secondary); }

    /* ================= RESPONSIVE ================= */
    /* Tablet (769px - 1200px) */
    @media (min-width: 769px) and (max-width: 1200px) {
        .erp-content-area {
            /* margin-left: 220px;  */
            width: calc(100% - 220px);
            padding: 24px;
        }
    }

    /* Mobile (<768px) */
    @media (max-width: 768px) {
        .erp-content-area {
            margin-left: 0 !important;
            width: 100% !important;
            padding: 20px 16px;
        }
        .da-filters-bar { gap: 12px; }
        .da-filter-search { flex: 100%; }
        .da-details-grid { grid-template-columns: 1fr; gap: 30px; }
        .da-details-inner { padding: 20px; }
    }
</style>

<div class="erp-content-area" id="mainContentArea">
    <h1 class="da-section-title">Booking List</h1>

    <div class="da-filters-bar">
        <div class="da-form-group da-filter-search da-search-wrapper">
            <label class="da-form-label">Search</label>
            <input type="text" class="da-form-control" placeholder="Search...">
            <i class="fa-solid fa-magnifying-glass da-search-icon-inside"></i>
        </div>

        <div class="da-form-group da-filter-select">
            <label class="da-form-label">Search By</label>
            <select class="da-form-control">
                <option value="order_number">Order Number</option>
                <option value="phone">Phone Number</option>
                <option value="nic">NIC</option>
                <option value="name">Name</option>
            </select>
        </div>

        <div class="da-form-group da-filter-date">
            <label class="da-form-label">Start Date</label>
            <input type="date" class="da-form-control">
        </div>

        <div class="da-form-group da-filter-date">
            <label class="da-form-label">End Date</label>
            <input type="date" class="da-form-control">
        </div>
    </div>

    <div class="da-table-container">
        <div class="da-table-scroll-wrapper">
            
            <div class="da-grid-row da-grid-header">
                <div>Date</div>
                <div>Time</div>
                <div>Name</div>
                <div>Phone Number</div>
                <div style="text-align: center;"></div>
            </div>

            <div class="da-grid-row">
                <div class="da-grid-item">15-02-2026</div>
                <div class="da-grid-item">10:00 AM</div>
                <div class="da-grid-item bold">Kasun Perera</div>
                <div class="da-grid-item">077 1234567</div>
                <div class="da-grid-item" style="text-align: center;">
                    <button class="da-action-btn" onclick="toggleDetails(this, 'details-1')">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div>
            </div>

            <div class="da-details-row" id="details-1">
                <div class="da-details-inner">
                    <div class="da-details-grid">
                        <div class="da-detail-group">
                            <h3 class="da-details-title">Booking Details</h3>
                            <div class="da-detail-item"><span class="da-detail-label">Date</span><span class="da-detail-value">15-02-2026</span></div>
                            <div class="da-detail-item"><span class="da-detail-label">Time</span><span class="da-detail-value">10:00 AM</span></div>
                            <div class="da-detail-item"><span class="da-detail-label">Name</span><span class="da-detail-value">Kasun Perera</span></div>
                            <div class="da-detail-item"><span class="da-detail-label">Phone Number</span><span class="da-detail-value">077 1234567</span></div>
                            <div class="da-detail-item"><span class="da-detail-label">Amount</span><span class="da-detail-value highlight">LKR 15,000</span></div>
                            <div class="da-detail-item"><span class="da-detail-label">Status</span><span class="da-status-badge da-status-unpaid">Unpaid</span></div>
                        </div>
                        <div class="da-detail-group">
                            <h3 class="da-details-title">Package Details</h3>
                            <div class="da-detail-item"><span class="da-detail-label">Package Name</span><span class="da-detail-value">Package 1</span></div>
                            <div class="da-detail-item"><span class="da-detail-label">Person Limit</span><span class="da-detail-value">4</span></div>
                            <div class="da-detail-item"><span class="da-detail-label">Extra Person Fee</span><span class="da-detail-value">LKR 1,500</span></div>
                            <div class="da-detail-item"><span class="da-detail-label">Hours in Package</span><span class="da-detail-value">3 Hours</span></div>
                            <div class="da-detail-item"><span class="da-detail-label">Penalty Fee</span><span class="da-detail-value">LKR 0</span></div>
                        </div>
                    </div>
                    <div class="da-details-actions">
                        <button class="da-btn da-btn-checkin" id="checkin-btn-1" onclick="handleCheckIn('1')">
                            <i class="fa-solid fa-check-to-slot"></i> Check In
                        </button>
                        <button class="da-btn da-btn-checkout" id="checkout-btn-1">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i> Check Out
                        </button>
                    </div>
                </div>
            </div>

            <div class="da-grid-row">
                <div class="da-grid-item">15-02-2026</div>
                <div class="da-grid-item">02:00 PM</div>
                <div class="da-grid-item bold">Nimal Perera</div>
                <div class="da-grid-item">077 7654321</div>
                <div class="da-grid-item" style="text-align: center;">
                    <button class="da-action-btn" onclick="toggleDetails(this, 'details-2')">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                </div>
            </div>

            <div class="da-details-row" id="details-2">
                <div class="da-details-inner">
                    <div class="da-details-grid">
                        <div class="da-detail-group">
                           <h3 class="da-details-title">Booking Details</h3>
                            <div class="da-detail-item"><span class="da-detail-label">Date</span><span class="da-detail-value">15-02-2026</span></div>
                            <div class="da-detail-item"><span class="da-detail-label">Time</span><span class="da-detail-value">10:00 AM</span></div>
                            <div class="da-detail-item"><span class="da-detail-label">Name</span><span class="da-detail-value">Kasun Perera</span></div>
                            <div class="da-detail-item"><span class="da-detail-label">Phone Number</span><span class="da-detail-value">077 1234567</span></div>
                            <div class="da-detail-item"><span class="da-detail-label">Amount</span><span class="da-detail-value highlight">LKR 15,000</span></div>
                            <div class="da-detail-item"><span class="da-detail-label">Status</span><span class="da-status-badge da-status-paid">Paid</span></div>
                        </div>
                        <div class="da-detail-group">
                            <h3 class="da-details-title">Package Details</h3>
                            <div class="da-detail-item"><span class="da-detail-label">Package Name</span><span class="da-detail-value">Package 1</span></div>
                            <div class="da-detail-item"><span class="da-detail-label">Person Limit</span><span class="da-detail-value">4</span></div>
                            <div class="da-detail-item"><span class="da-detail-label">Extra Person Fee</span><span class="da-detail-value">LKR 1,500</span></div>
                            <div class="da-detail-item"><span class="da-detail-label">Hours in Package</span><span class="da-detail-value">3 Hours</span></div>
                            <div class="da-detail-item"><span class="da-detail-label">Penalty Fee</span><span class="da-detail-value">LKR 0</span></div>
                        </div>
                    </div>
                    <div class="da-details-actions">
                        <button class="da-btn da-btn-checkin" id="checkin-btn-2" onclick="handleCheckIn('2')">
                            <i class="fa-solid fa-check-to-slot"></i> Check In
                        </button>
                        <button class="da-btn da-btn-checkout" id="checkout-btn-2">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i> Check Out
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    // --- Responsive Sidebar Sync ---
    document.addEventListener('DOMContentLoaded', () => {
        const sidebar = document.getElementById('sidebar');
        const body = document.body;

        const syncLayout = () => {
            if (sidebar && sidebar.classList.contains('collapsed')) {
                body.classList.add('sidebar-collapsed');
            } else {
                body.classList.remove('sidebar-collapsed');
            }
        };

        syncLayout();

        if (sidebar) {
            const observer = new MutationObserver(syncLayout);
            observer.observe(sidebar, { attributes: true, attributeFilter: ['class'] });
        }
    });

    // --- Accordion Logic ---
    function toggleDetails(btn, detailsId) {
        btn.classList.toggle('active');
        const row = document.getElementById(detailsId);
        row.classList.toggle('open');
    }

    // --- Action Button Logic ---
    function handleCheckIn(id) {
        const checkInBtn = document.getElementById(`checkin-btn-${id}`);
        const checkOutBtn = document.getElementById(`checkout-btn-${id}`);
        
        // Update Check-In button
        checkInBtn.disabled = true;
        checkInBtn.innerHTML = '<i class="fa-solid fa-user-check"></i> Checked In';
        
        // Show Check-out button
        checkOutBtn.classList.add('visible');
    }
</script>
<?php endif; ?>