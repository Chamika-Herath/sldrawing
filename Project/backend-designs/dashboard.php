<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        /* Global Reset */
        * { margin: 0; padding: 0; }
        
        .dreambox-admin-wrapper {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background-color: #f8f9fa;
            display: flex;
            min-height: 100vh;
            color: #212529;
            box-sizing: border-box;
            position: relative;
            overflow-x: hidden; 
        }
        .dreambox-admin-wrapper * { box-sizing: border-box; }

        /* --- Mobile Header --- */
        .da-mobile-header {
            display: none; 
            position: fixed; top: 0; left: 0; width: 100%; height: 60px;
            background: #fff; border-bottom: 1px solid #dee2e6;
            z-index: 1000; padding: 0 20px;
            align-items: center; justify-content: space-between;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }
        .da-mobile-brand { font-weight: 800; font-size: 16px; text-transform: uppercase; }
        .da-mobile-toggle { font-size: 20px; cursor: pointer; background: none; border: none; padding: 5px; }

        /* --- Sidebar --- */
        .da-sidebar {
            width: 260px; background-color: #fff; padding: 24px;
            flex-shrink: 0; border-right: 1px solid #dee2e6;
            display: flex; flex-direction: column;
            position: sticky; top: 0; min-height: 100vh;
            overflow-y: auto; z-index: 1001; transition: transform 0.3s ease;
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
        .da-sidebar-menu { list-style: none; }
        .da-sidebar-item { margin-bottom: 8px; }
        .da-sidebar-link {
            display: flex; justify-content: space-between; align-items: center;
            padding: 12px 16px; text-decoration: none; color: #495057;
            font-weight: 600; border-radius: 8px; transition: 0.2s; cursor: pointer;
        }
        .da-sidebar-link:hover, .da-sidebar-link.active { background-color: #f1f3f5; color: #000; }
        
        .da-sidebar-submenu {
            list-style: none; padding: 0; margin-top: 4px;
            display: none; background-color: #fff;
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

        /* --- Main Content --- */
        .da-main-content { flex-grow: 1; padding: 40px; min-width: 0; }
        .da-section-title { font-size: 32px; font-weight: 800; margin: 0 0 32px 0; }
        
        .da-dashboard-grid {
            display: grid; grid-template-columns: 2fr 1fr; gap: 32px; align-items: start;
        }

        /* Search */
        .da-search-container { position: relative; margin-bottom: 24px; }
        .da-search-input {
            width: 100%; padding: 14px 50px 14px 16px;
            border: 1px solid #e9ecef; border-radius: 8px;
            font-size: 15px; transition: 0.2s;
        }
        .da-search-input:focus { outline: none; border-color: #adb5bd; }
        .da-search-icon {
            position: absolute; right: 16px; top: 50%; transform: translateY(-50%);
            color: #adb5bd; font-size: 18px; cursor: pointer;
            transition: all 0.2s ease; padding: 5px;
        }
        .da-search-icon:hover { color: #0d6efd; transform: translateY(-50%) scale(1.15); }

        /* --- TABLE STYLES --- */
        .da-table-container {
            background-color: #fff; border: 1px solid #e9ecef;
            border-radius: 12px; overflow: hidden;
            box-shadow: 0 2px 6px rgba(0,0,0,0.02);
            width: 100%;
        }

        /* ALIGNMENT FIX:
           Using specific widths/fractions instead of 'auto' ensures Header 
           and Rows line up perfectly.
           Columns: Token (70px) | Date (1.5fr) | Time (1fr) | Persons (0.8fr)
        */
        .da-table-header, .da-table-row {
            display: grid;
            grid-template-columns: 70px 1.5fr 1fr 0.8fr; 
            padding: 16px 24px; align-items: center; gap: 15px;
        }

        .da-table-header {
            border-bottom: 1px solid #f1f3f5; font-weight: 600;
            color: #6c757d; font-size: 14px;
        }
        .da-table-row {
            border-bottom: 1px solid #f8f9fa; font-size: 15px;
            animation: fadeIn 0.3s ease-in-out;
        }
        .da-table-row:last-child { border-bottom: none; }
        @keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } }

        /* Tokens */
        .da-token-square {
            height: 36px; min-width: 40px; width: fit-content; padding: 0 8px;
            border-radius: 6px; display: flex; align-items: center;
            justify-content: center; font-weight: 700; font-size: 14px;
            color: white; white-space: nowrap;
        }
        .da-token-square.active { background-color: #198754; box-shadow: 0 2px 4px rgba(25, 135, 84, 0.2); }
        .da-token-square.inactive { background-color: #dc3545; box-shadow: 0 2px 4px rgba(220, 53, 69, 0.2); }
        
        .da-col-center { text-align: center; }

        /* Cards */
        .da-summary-cards { display: flex; flex-direction: column; gap: 16px; }
        .da-card {
            background-color: #fff; border: 1px solid #e9ecef;
            border-radius: 12px; padding: 24px; text-align: center;
            cursor: pointer; transition: all 0.2s ease;
        }
        .da-card:hover { transform: translateY(-2px); box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
        .da-card-title { margin: 0 0 12px 0; font-size: 14px; font-weight: 600; color: #495057; }
        .da-card-number { display: block; font-size: 32px; font-weight: 800; color: #212529; }
        .da-card.filter-active { border-color: #198754; background-color: #f0fff4; }

        /* =========================================
           RESPONSIVE FIXES
           ========================================= */

        /* Tablet (Max 1024px) */
        @media (max-width: 1024px) {
            .da-mobile-header { display: flex; }
            .da-sidebar {
                position: fixed; top: 60px; left: 0; height: calc(100vh - 60px);
                transform: translateX(-100%); box-shadow: 4px 0 15px rgba(0,0,0,0.1);
            }
            .da-sidebar.mobile-open { transform: translateX(0); }
            .da-sidebar-overlay.mobile-open { display: block; opacity: 1; }
            .da-sidebar .da-brand-title { display: none; } 

            .da-main-content { padding: 30px; padding-top: 90px; }
            .da-dashboard-grid { grid-template-columns: 1fr; gap: 24px; }
            .da-summary-cards { order: -1; flex-direction: row; }
            .da-card { flex: 1; }
        }

        /* Mobile (Max 540px) */
        @media (max-width: 540px) {
            .da-main-content { padding: 15px; padding-top: 75px; }
            
            /* Card Grid Layout */
            .da-summary-cards {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 12px;
            }
            .da-card:first-child { grid-column: span 2; text-align: center;}
            
            .da-card { padding: 16px; text-align: center; }
            .da-card-title { font-size: 12px; margin-bottom: 5px; }
            .da-card-number { font-size: 24px; }

            /* Mobile Table Layout: 
               Tightened padding and gaps to fit "Persons" without overflow 
            */
            .da-table-header, .da-table-row {
                /* Slightly adjusted grid for small screens */
                grid-template-columns: 50px 1.5fr 1fr 60px;
                padding: 12px 10px; 
                gap: 8px; 
                font-size: 13px; 
            }
            
            .da-token-square { height: 30px; min-width: 35px; font-size: 12px; }
            .da-section-title { font-size: 24px; margin-bottom: 20px; }
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
            <li class="da-sidebar-item"><a href="#" class="da-sidebar-link active">Dashboard</a></li>
            <li class="da-sidebar-item"><a href="#" class="da-sidebar-link">Booking</a></li>
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
        <h1 class="da-section-title">Dashboard</h1>

        <div class="da-dashboard-grid">
            
            <div class="da-left-column">
                <div class="da-search-container">
                    <input type="text" class="da-search-input" placeholder="Search by token">
                    <i class="fa-solid fa-magnifying-glass da-search-icon" title="Search"></i>
                </div>

                <div class="da-table-container">
                    <div class="da-table-header">
                        <div>Token</div>
                        <div>Date</div>
                        <div>Time</div>
                        <div class="da-col-center">Persons</div>
                    </div>
                    <div id="da-table-body">
                        </div>
                </div>
            </div>

            <div class="da-summary-cards">
                <div class="da-card" onclick="filterData('pending_total', this)">
                    <h3 class="da-card-title">Total pending bookings</h3>
                    <span class="da-card-number" id="count-pending-total">0</span>
                </div>
                <div class="da-card" onclick="filterData('today_all', this)">
                    <h3 class="da-card-title">All today</h3>
                    <span class="da-card-number" id="count-today-all">0</span>
                </div>
                <div class="da-card" onclick="filterData('today_pending', this)">
                    <h3 class="da-card-title">Pending today</h3>
                    <span class="da-card-number" id="count-today-pending">0</span>
                </div>
            </div>
        </div>
    </main>
</div>

<script>
    // --- UI Logic ---
    function toggleDaSettings(element) {
        element.classList.toggle('open');
        var submenu = element.nextElementSibling;
        if (submenu) submenu.classList.toggle('open');
    }

    function toggleSidebar() {
        document.querySelector('.da-sidebar').classList.toggle('mobile-open');
        document.querySelector('.da-sidebar-overlay').classList.toggle('mobile-open');
    }

    // --- Data Logic ---
    function getFormattedDate(date) {
        let d = date.getDate().toString().padStart(2, '0');
        let m = (date.getMonth() + 1).toString().padStart(2, '0');
        let y = date.getFullYear();
        return `${d}-${m}-${y}`;
    }

    const todayObj = new Date();
    const todayStr = getFormattedDate(todayObj);
    const upcomingObj = new Date();
    upcomingObj.setDate(todayObj.getDate() + 5); 
    const upcomingStr = getFormattedDate(upcomingObj);

    const bookingsData = [
        { token: '101', date: todayStr, time: '10:00 AM', persons: 4, status: 'active' },
        { token: '102', date: todayStr, time: '11:30 AM', persons: 2, status: 'inactive' },
        { token: '103', date: todayStr, time: '01:00 PM', persons: 6, status: 'active' },
        { token: '104', date: todayStr, time: '03:45 PM', persons: 3, status: 'inactive' },
        { token: '205', date: upcomingStr, time: '09:00 AM', persons: 10, status: 'active' },
        { token: '206', date: upcomingStr, time: '12:00 PM', persons: 5, status: 'inactive' },
        { token: '998', date: upcomingStr, time: '04:00 PM', persons: 2, status: 'inactive' },
    ];

    const tableBody = document.getElementById('da-table-body');
    const cards = document.querySelectorAll('.da-card');

    function renderTable(data) {
        tableBody.innerHTML = ''; 
        if (data.length === 0) {
            tableBody.innerHTML = '<div style="padding:20px; text-align:center; color:#999;">No bookings found</div>';
            return;
        }

        data.forEach(item => {
            const row = document.createElement('div');
            row.className = 'da-table-row';
            const squareClass = item.status === 'active' ? 'active' : 'inactive';
            row.innerHTML = `
                <div><div class="da-token-square ${squareClass}">${item.token}</div></div>
                <div>${item.date}</div>
                <div>${item.time}</div>
                <div class="da-col-center">${item.persons}</div>
            `;
            tableBody.appendChild(row);
        });
    }

    function calculateCounts() {
        document.getElementById('count-pending-total').innerText = bookingsData.filter(b => b.status === 'inactive').length;
        document.getElementById('count-today-all').innerText = bookingsData.filter(b => b.date === todayStr).length;
        document.getElementById('count-today-pending').innerText = bookingsData.filter(b => b.date === todayStr && b.status === 'inactive').length;
    }

    function filterData(filterType, cardElement) {
        cards.forEach(c => c.classList.remove('filter-active'));
        if(cardElement) cardElement.classList.add('filter-active');

        let filteredData = [];
        if (filterType === 'pending_total') {
            filteredData = bookingsData.filter(b => b.status === 'inactive');
        } else if (filterType === 'today_all') {
            filteredData = bookingsData.filter(b => b.date === todayStr);
        } else if (filterType === 'today_pending') {
            filteredData = bookingsData.filter(b => b.date === todayStr && b.status === 'inactive');
        }
        renderTable(filteredData);
    }

    document.addEventListener('DOMContentLoaded', () => {
        calculateCounts();
        const firstCard = document.querySelector('.da-card'); 
        filterData('pending_total', firstCard);
    });
</script>

</body>
</html>