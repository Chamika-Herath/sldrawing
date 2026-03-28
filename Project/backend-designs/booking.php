<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        * { margin:0; padding: 0; }
        
        /* --- SCOPED RESET --- */
        .dreambox-admin-wrapper {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background-color: #f8f9fa;
            color: #212529;
            display: flex;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
            box-sizing: border-box;
        }

        .dreambox-admin-wrapper * { box-sizing: border-box; }

        /* --- MOBILE HEADER (Visible < 1024px) --- */
        .da-mobile-header {
            display: none;
            position: fixed; top: 0; left: 0; width: 100%; height: 60px;
            background: #ffffff; border-bottom: 1px solid #dee2e6;
            z-index: 1000; padding: 0 20px;
            align-items: center; justify-content: space-between;
        }
        .da-mobile-brand { font-weight: 800; font-size: 16px; text-transform: uppercase; }
        .da-mobile-toggle { font-size: 20px; cursor: pointer; background: none; border: none; padding: 5px; }

        /* --- SIDEBAR --- */
        .da-sidebar {
            width: 260px;
            background-color: #ffffff;
            padding: 24px;
            flex-shrink: 0;
            border-right: 1px solid #dee2e6;
            display: flex;
            flex-direction: column;
            position: sticky; top: 0; height: 100vh;
            overflow-y: auto; z-index: 1001;
            transition: transform 0.3s ease;
        }

        .da-brand-title {
            font-size: 20px; font-weight: 800; color: #0d0d0d;
            margin-bottom: 40px; text-transform: uppercase; line-height: 1.2;
        }

        .da-sidebar-overlay {
            display: none; position: fixed; top: 0; left: 0;
            width: 100%; height: 100%; background: rgba(0,0,0,0.5);
            z-index: 1000; opacity: 0; transition: opacity 0.3s ease;
        }

        .da-sidebar-menu { list-style: none; padding: 0; margin: 0; }
        .da-sidebar-item { margin-bottom: 8px; }

        .da-sidebar-link {
            display: flex; justify-content: space-between; align-items: center;
            padding: 12px 16px; text-decoration: none; color: #495057;
            font-weight: 600; border-radius: 8px; transition: 0.2s; cursor: pointer;
        }

        .da-sidebar-link:hover, .da-sidebar-link.active {
            background-color: #f1f3f5; color: #000;
        }

        .da-sidebar-submenu {
            list-style: none; padding: 0; margin-top: 4px;
            display: none; background-color: #ffffff;
        }
        .da-sidebar-submenu.open { display: block; }

        .da-sidebar-sublink {
            display: block; padding: 10px 16px 10px 32px;
            text-decoration: none; color: #6c757d; font-size: 14px;
            font-weight: 500; border-radius: 8px; transition: 0.2s;
        }

        .da-sidebar-sublink:hover { color: #000; background-color: #f8f9fa; }
        .da-menu-arrow { font-size: 12px; transition: transform 0.3s ease; }
        .da-sidebar-link.open .da-menu-arrow { transform: rotate(180deg); }

        /* --- MAIN CONTENT AREA --- */
        .da-main-content { flex-grow: 1; padding: 40px; min-width: 0; }
        .da-section-title { font-size: 32px; font-weight: 800; margin-bottom: 32px; margin-top: 0; }

        /* --- FILTERS SECTION --- */
        .da-filters-bar {
            background: #ffffff;
            padding: 20px;
            border-radius: 12px;
            border: 1px solid #dee2e6;
            margin-bottom: 24px;
            display: flex;
            gap: 16px;
            align-items: center;
            flex-wrap: wrap;
        }

        .da-form-group {
            display: flex; flex-direction: column; gap: 6px; flex: 1;
            min-width: 150px; position: relative; 
        }

        .da-form-label {
            font-size: 12px; font-weight: 600; color: #6c757d; text-transform: uppercase;
        }

        .da-form-control {
            padding: 10px 14px; border: 1px solid #dee2e6; border-radius: 8px;
            font-size: 14px; background: #ffffff; color: #212529; outline: none;
            transition: border-color 0.2s; height: 42px; width: 100%;
        }

        .da-form-control:focus {
            border-color: #0d6efd; box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.15);
        }

        .da-search-wrapper input { padding-right: 40px; }
        
        .da-search-icon-inside {
            position: absolute; right: 12px; bottom: 12px; color: #adb5bd;
            pointer-events: auto; cursor: pointer; font-size: 14px; transition: all 0.2s ease;
            padding: 5px; margin: -5px; 
        }

        .da-search-icon-inside:hover { color: #0d6efd; transform: scale(1.15); }

        .da-filter-search { flex: 2; min-width: 200px; }
        .da-filter-select { flex: 1; }
        .da-filter-date { flex: 1; }

        /* --- BOOKING LIST TABLE --- */
        .da-table-container {
            background-color: #ffffff; border: 1px solid #dee2e6;
            border-radius: 12px; overflow: hidden; box-shadow: 0 2px 6px rgba(0,0,0,0.02);
        }

        .da-table-scroll-wrapper { width: 100%; overflow-x: auto; }

        .da-grid-row {
            display: grid;
            grid-template-columns: 1.2fr 1fr 1.5fr 1.2fr 60px;
            padding: 16px 24px; align-items: center; gap: 20px;
            min-width: 700px; border-bottom: 1px solid #f8f9fa;
            background: #ffffff; transition: background-color 0.2s;
        }
        
        .da-grid-row:hover { background-color: #fafafa; }

        .da-grid-header {
            background: #d8f3ff; border-bottom: 1px solid #dee2e6;
            font-weight: 700; color: #6c757d; font-size: 13px; text-transform: uppercase;
        }
        .da-grid-header:hover{
            background: #d8f3ff;
        }

        .da-grid-item {
            font-size: 14px; color: #212529; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;
        }

        .da-grid-item.bold { font-weight: 600; }

        .da-action-btn {
            width: 36px; height: 36px; border-radius: 50%;
            border: 1px solid transparent; background: transparent; color: #6c757d;
            cursor: pointer; display: flex; align-items: center; justify-content: center;
            transition: 0.2s;
        }

        .da-action-btn:hover { background: #f1f3f5; color: #0d6efd; }
        .da-action-btn.active { background: #e7f1ff; color: #0d6efd; transform: rotate(90deg); }

        /* --- ANIMATED DETAILS SECTION --- */
        .da-details-row {
            max-height: 0;
            overflow: hidden;
            background-color: #fcfcfc;
            border-bottom: 0 solid #dee2e6;
            width: 100%;
            min-width: 700px;
            transition: max-height 0.4s cubic-bezier(0.4, 0, 0.2, 1), border-bottom 0.1s;
        }

        .da-details-row.open {
            max-height: 600px; /* High enough value for content */
            border-bottom: 1px solid #dee2e6;
        }

        .da-details-inner {
            padding: 30px 40px;
            border-left: 3px solid #d8f3ff;
        }

        .da-details-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            margin-bottom: 30px;
        }

        .da-detail-group {
            display: flex; flex-direction: column; gap: 15px;
        }

        .da-details-title {
            font-size: 18px; font-weight: 700; color: #212529;
            margin-bottom: 15px; border-bottom: 2px solid #f1f3f5; padding-bottom: 10px;
        }

        .da-detail-item {
            display: flex; justify-content: space-between; align-items: center;
            font-size: 14px; padding-bottom: 8px; border-bottom: 1px dashed #e9ecef;
        }

        .da-detail-label { color: #6c757d; font-weight: 500; }
        .da-detail-value { color: #212529; font-weight: 600; text-align: right; }

        /* Status Badges */
        .da-status-badge {
            padding: 6px 12px; border-radius: 6px; font-size: 12px; font-weight: 700;
            text-transform: uppercase; letter-spacing: 0.5px;
            display: inline-block;
        }
        
        .da-status-paid { background-color: #198754; color: #ffffff; }
        .da-status-unpaid { background-color: #dc3545; color: #ffffff; }

        /* Action Buttons */
        .da-details-actions {
            display: flex; gap: 16px; padding-top: 20px; border-top: 1px solid #dee2e6;
        }

        .da-btn {
            padding: 12px 24px; border-radius: 8px; font-size: 14px; font-weight: 700;
            cursor: pointer; border: none; transition: 0.3s; display: flex; align-items: center; gap: 10px;
            text-transform: uppercase; letter-spacing: 0.3px;
        }

        .da-btn-checkin { 
            background-color: #0d6efd; color: #ffffff; 
            box-shadow: 0 4px 6px rgba(13, 110, 253, 0.15);
        }
        .da-btn-checkin:hover { background-color: #0b5ed7; }
        
        .da-btn-checkin:disabled {
            background-color: #e9ecef; color: #adb5bd; cursor: not-allowed; border: 1px solid #dee2e6; box-shadow: none;
        }

        .da-btn-checkout { 
            background-color: #ffffff; 
            border: 2px solid #212529; 
            color: #212529;
            display: none; 
        }
        .da-btn-checkout.visible { display: flex; }
        
        .da-btn-checkout:hover { 
            background-color: #212529; color: #ffffff;
        }

        /* --- MEDIA QUERIES --- */
        @media (max-width: 1024px) {
            .da-mobile-header { display: flex; }
            .da-sidebar {
                position: fixed; top: 60px; left: 0; height: calc(100vh - 60px);
                transform: translateX(-100%); box-shadow: 4px 0 15px rgba(0,0,0,0.1);
            }
            .da-sidebar.mobile-open { transform: translateX(0); }
            .da-sidebar-overlay.mobile-open { display: block; opacity: 1; }
            .da-brand-title { display: none; } 
            .da-main-content { padding: 30px; padding-top: 90px; }
            .da-filters-bar { gap: 12px; }
            .da-filter-search { flex: 100%; }
        }

        @media (max-width: 540px) {
            .da-main-content { padding: 15px; padding-top: 75px; }
            .da-section-title { font-size: 24px; margin-bottom: 20px; }
            .da-filters-bar { padding: 15px; gap: 15px; }
            .da-grid-row { padding: 12px 16px; gap: 15px; }
            .da-details-grid { grid-template-columns: 1fr; gap: 30px; }
            .da-details-inner { padding: 20px; }
        }
    </style>
</head>
<body>

<div class="dreambox-admin-wrapper">

    <header class="da-mobile-header">
        <div class="da-mobile-brand">Dreambox Admin</div>
        <button class="da-mobile-toggle" onclick="toggleSidebar()">
            <i class="fa-solid fa-bars"></i>
        </button>
    </header>

    <div class="da-sidebar-overlay" onclick="toggleSidebar()"></div>

    <aside class="da-sidebar">
        <div class="da-brand-title">Dreambox<br>Administration</div>
        <ul class="da-sidebar-menu">
            <li class="da-sidebar-item"><a href="#" class="da-sidebar-link">Dashboard</a></li>
            <li class="da-sidebar-item"><a href="#" class="da-sidebar-link active">Booking</a></li>
            <li class="da-sidebar-item">
                <a href="javascript:void(0)" class="da-sidebar-link" onclick="toggleDaSettings(this)">
                    Settings <i class="fa-solid fa-chevron-down da-menu-arrow"></i>
                </a>
                <ul class="da-sidebar-submenu">
                    <li><a href="#" class="da-sidebar-sublink">Package Details</a></li>
                    <li><a href="#" class="da-sidebar-sublink">User Account</a></li>
                </ul>
            </li>
            <li class="da-sidebar-item"><a href="#" class="da-sidebar-link">Reports</a></li>
        </ul>
    </aside>

    <main class="da-main-content">
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
                                <div class="da-detail-item"><span class="da-detail-label">Amount</span><span class="da-detail-value" style="color: #0d6efd;">LKR 15,000</span></div>
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
                                <div class="da-detail-item"><span class="da-detail-label">Name</span><span class="da-detail-value">Nimal Perera</span></div>
                                <div class="da-detail-item"><span class="da-detail-label">Amount</span><span class="da-detail-value" style="color: #0d6efd;">LKR 20,000</span></div>
                                <div class="da-detail-item"><span class="da-detail-label">Status</span><span class="da-status-badge da-status-paid">Paid</span></div>
                            </div>
                            <div class="da-detail-group">
                                <h3 class="da-details-title">Package Details</h3>
                                <div class="da-detail-item"><span class="da-detail-label">Package Name</span><span class="da-detail-value">Family Pack</span></div>
                                <div class="da-detail-item"><span class="da-detail-label">Person Limit</span><span class="da-detail-value">6</span></div>
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

    </main>
</div>

<script>
    function toggleDetails(btn, detailsId) {
        btn.classList.toggle('active');
        const row = document.getElementById(detailsId);
        row.classList.toggle('open');
    }

    function handleCheckIn(id) {
        const checkInBtn = document.getElementById(`checkin-btn-${id}`);
        const checkOutBtn = document.getElementById(`checkout-btn-${id}`);
        
        // Update Check-In button to 'Checked In' state and disable it
        checkInBtn.disabled = true;
        checkInBtn.innerHTML = '<i class="fa-solid fa-user-check"></i> Checked In';
        
        // Show Check-out button
        checkOutBtn.classList.add('visible');
    }

    function toggleDaSettings(element) {
        element.classList.toggle('open');
        var submenu = element.nextElementSibling;
        if (submenu) submenu.classList.toggle('open');
    }

    function toggleSidebar() {
        document.querySelector('.da-sidebar').classList.toggle('mobile-open');
        document.querySelector('.da-sidebar-overlay').classList.toggle('mobile-open');
    }
</script>

</body>
</html>