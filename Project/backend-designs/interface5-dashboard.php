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

    /* ================= DASHBOARD GRID ================= */
    .da-dashboard-grid {
        display: grid;
        grid-template-columns: 1fr 300px; 
        gap: 24px;
        align-items: start;
        width: 100%;
    }

    .da-section-title {
        font-size: 28px;
        font-weight: 700;
        margin: 0 0 24px 0;
        color: var(--erp-text-primary);
        letter-spacing: 0.5px;
    }

    /* ================= SEARCH (UPDATED: Input + Button) ================= */
    .da-search-container {
        display: flex;
        gap: 10px;
        margin-bottom: 24px;
        max-width: 500px;
    }

    .da-search-input {
        flex: 1;
        padding: 12px 16px;
        background: var(--erp-surface);
        border: 1px solid var(--erp-border);
        border-radius: 8px;
        font-size: 14px;
        color: var(--erp-text-primary);
        transition: 0.3s;
    }

    .da-search-input:focus {
        outline: none;
        border-color: var(--erp-primary);
        box-shadow: 0 0 0 3px rgba(155, 92, 255, 0.15);
    }

    .da-search-btn {
        background: var(--erp-primary);
        border: none;
        border-radius: 8px;
        width: 48px;
        height: 44px; /* Matches input height roughly */
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: background 0.2s;
        color: #fff;
        font-size: 16px;
    }

    .da-search-btn:hover {
        background: var(--erp-primary-dark);
    }

    /* ================= TABLE ================= */
    .da-table-container {
        background-color: var(--erp-surface);
        border: 1px solid var(--erp-border);
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        width: 100%;
    }

    .da-table-header, .da-table-row {
        display: grid;
        grid-template-columns: 80px 1.5fr 1fr 80px; 
        padding: 16px 24px;
        align-items: center;
        gap: 15px;
    }

    .da-table-header {
        background: var(--erp-surface-elevated);
        border-bottom: 1px solid var(--erp-border);
        font-weight: 600;
        color: var(--erp-text-secondary);
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .da-table-row {
        border-bottom: 1px solid var(--erp-border);
        font-size: 15px;
        color: var(--erp-text-primary);
        transition: background 0.2s;
    }
    .da-table-row:last-child { border-bottom: none; }
    .da-table-row:hover { background: rgba(255,255,255,0.03); }
    
    .da-col-center { text-align: center; }

    /* Tokens */
    .da-token-square {
        height: 34px; min-width: 50px; width: fit-content; padding: 0 10px;
        border-radius: 6px; display: flex; align-items: center; justify-content: center;
        font-weight: 700; font-size: 13px; color: #000;
    }
    .da-token-square.active { background: var(--erp-accent-success); box-shadow: 0 0 10px rgba(47, 227, 160, 0.3); }
    .da-token-square.inactive { background: var(--erp-accent-error); color: #fff; box-shadow: 0 0 10px rgba(255, 77, 109, 0.3); }

    /* ================= CARDS ================= */
    .da-summary-cards {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    .da-card {
        background: var(--erp-surface);
        border: 1px solid var(--erp-border);
        border-radius: 12px;
        padding: 24px;
        text-align: center;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        flex: 1; 
    }

    .da-card:hover {
        transform: translateY(-4px);
        background: var(--erp-surface-elevated);
        border-color: var(--erp-primary-light);
    }

    .da-card.filter-active {
        border-color: var(--erp-primary);
        background: linear-gradient(145deg, var(--erp-surface), var(--erp-primary-subtle));
        box-shadow: 0 0 20px rgba(155, 92, 255, 0.15);
    }
    .da-card.filter-active::before {
        content: ''; position: absolute; left: 0; top: 0; bottom: 0;
        width: 4px; background: var(--erp-primary);
    }

    .da-card-title {
        margin: 0 0 12px 0; font-size: 13px; font-weight: 600;
        color: var(--erp-text-secondary); text-transform: uppercase; letter-spacing: 0.5px;
    }

    .da-card-number {
        display: block; font-size: 36px; font-weight: 800;
        color: var(--erp-text-primary); text-shadow: 0 0 15px rgba(255,255,255,0.1);
    }


    /* ================= RESPONSIVE ================= */

    /* Tablet (769px - 1200px) */
    @media (min-width: 769px) and (max-width: 1200px) {
        .erp-content-area {
            /* margin-left: 220px;  */
            width: calc(100% - 220px);
            padding: 24px;
        }

        .da-dashboard-grid { grid-template-columns: 1fr; gap: 24px; }
        .da-summary-cards { flex-direction: row; order: -1; justify-content: space-between; }
        .da-card { width: 100%; }
    }

    /* Mobile (Max 768px) */
    @media (max-width: 768px) {
        .erp-content-area {
            margin-left: 0 !important;
            width: 100% !important;
            padding: 20px 16px;
        }

        .da-dashboard-grid { grid-template-columns: 1fr; gap: 20px; }
        .da-summary-cards { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; order: -1; }
        .da-card:first-child { grid-column: span 2; } 

        .da-table-header, .da-table-row {
            grid-template-columns: 60px 1.5fr 1fr 50px;
            padding: 12px 10px;
            font-size: 13px;
            gap: 8px;
        }
        .da-token-square { min-width: 40px; font-size: 12px; height: 28px; }
        .da-card-number { font-size: 28px; }
    }
</style>

<div class="erp-content-area" id="mainContentArea">
    <h1 class="da-section-title">Dashboard</h1>

    <div class="da-dashboard-grid">
        
        <div class="da-left-column">
            <div class="da-search-container">
                <input type="text" class="da-search-input" placeholder="Search by token ID..." id="tokenSearchInput">
                <button class="da-search-btn" id="searchBtn">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>

            <div class="da-table-container">
                <div class="da-table-header">
                    <div>Token</div>
                    <div>Date</div>
                    <div>Time</div>
                    <div class="da-col-center">Pers.</div>
                </div>
                <div id="da-table-body">
                    </div>
            </div>
        </div>

        <div class="da-summary-cards">
            <div class="da-card" onclick="filterData('pending_total', this)">
                <h3 class="da-card-title">Pending Total</h3>
                <span class="da-card-number" id="count-pending-total">0</span>
            </div>
            <div class="da-card" onclick="filterData('today_all', this)">
                <h3 class="da-card-title">All Today</h3>
                <span class="da-card-number" id="count-today-all">0</span>
            </div>
            <div class="da-card" onclick="filterData('today_pending', this)">
                <h3 class="da-card-title">Pending Today</h3>
                <span class="da-card-number" id="count-today-pending">0</span>
            </div>
        </div>
    </div>
</div>

<script>
    // --- JS: Sync Sidebar Class for Margin Adjustments ---
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

    // --- JS: Data Logic ---
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
            tableBody.innerHTML = '<div style="padding:40px; text-align:center; color:var(--erp-text-tertiary);">No bookings found</div>';
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
        if(firstCard) filterData('pending_total', firstCard);

        // Search logic
        const performSearch = () => {
             const val = document.getElementById('tokenSearchInput').value.toLowerCase();
             const rows = tableBody.querySelectorAll('.da-table-row');
             rows.forEach(row => {
                 const token = row.querySelector('.da-token-square').innerText.toLowerCase();
                 if(token.includes(val)) row.style.display = 'grid';
                 else row.style.display = 'none';
             });
        };

        const searchInput = document.getElementById('tokenSearchInput');
        if(searchInput) {
            searchInput.addEventListener('input', performSearch);
        }
        document.getElementById('searchBtn').addEventListener('click', performSearch);
    });
</script>
<?php endif; ?>