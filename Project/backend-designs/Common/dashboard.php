<!-- components/sidebar.php -->
<?php if (!isset($sidebar_included)): ?>
<?php $sidebar_included = true; ?>

<style>
    /* ================= SIDEBAR ================= */
    .erp-sidebar {
        width: var(--sidebar-width);
        background: var(--erp-primary-dark);
        color: #fff;
        padding: 24px 16px;
        position: fixed;
        top: 50px;
        left: 0;
        height: calc(100vh - 50px - 32px);
        overflow-y: auto;
        overflow-x: hidden;
        z-index: 102;
        transition: width var(--sidebar-transition);
        box-shadow: 2px 0 10px rgba(0,0,0,0.1);
    }

    .erp-sidebar.collapsed {
        width: var(--sidebar-collapsed);
    }

    .erp-sidebar__header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 24px;
        min-height: 40px;
        padding: 0 8px;
    }

    .erp-sidebar__title {
        font-size: 20px;
        font-weight: 600;
        white-space: nowrap;
        opacity: 1;
        transition: opacity 0.2s;
    }

    .erp-sidebar.collapsed .erp-sidebar__title {
        opacity: 0;
        width: 0;
        overflow: hidden;
    }

    .erp-sidebar__toggle {
        background: rgba(255,255,255,0.1);
        border: none;
        color: white;
        width: 32px;
        height: 32px;
        border-radius: 6px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        transition: background 0.2s;
    }

    .erp-sidebar__toggle:hover {
        background: rgba(255,255,255,0.2);
    }

    .erp-sidebar__menu {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }

    .erp-sidebar__btn {
        padding: 12px 14px;
        background: rgba(255,255,255,0.08);
        border: none;
        color: #fff;
        text-align: left;
        border-radius: 6px;
        cursor: pointer;
        transition: all 0.2s;
        white-space: nowrap;
        overflow: hidden;
        display: flex;
        align-items: center;
        gap: 12px;
        position: relative;
    }

    .erp-sidebar__btn-text {
        transition: opacity 0.2s;
    }

    .erp-sidebar.collapsed .erp-sidebar__btn-text {
        opacity: 0;
        width: 0;
    }

    .erp-sidebar__btn::before {
        content: attr(data-tooltip);
        position: absolute;
        left: calc(100% + 10px);
        top: 50%;
        transform: translateY(-50%);
        background: var(--erp-primary-dark);
        color: white;
        padding: 8px 12px;
        border-radius: 4px;
        font-size: 14px;
        white-space: nowrap;
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.2s;
        z-index: 101;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }

    .erp-sidebar.collapsed .erp-sidebar__btn:hover::before {
        opacity: 1;
        visibility: visible;
    }

    .erp-sidebar__btn:hover {
        background: rgba(255,255,255,0.18);
        padding-left: 16px;
    }

    .erp-sidebar__btn--active {
        background: var(--erp-primary-light);
    }

    /* Professional SVG Icons */
    .erp-sidebar__icon {
        width: 20px;
        height: 20px;
        min-width: 20px;
        fill: rgba(255, 255, 255, 0.9);
        transition: fill 0.2s;
    }

    .erp-sidebar__btn:hover .erp-sidebar__icon {
        fill: #fff;
    }

    .erp-sidebar__btn--active .erp-sidebar__icon {
        fill: #fff;
    }

    /* Responsive Sidebar */
    @media (max-width: 768px) {
        .erp-sidebar__toggle {
            display: none;
        }

        .erp-sidebar {
            transform: translateX(-100%);
            width: 280px;
            transition: transform var(--sidebar-transition);
        }

        .erp-sidebar.mobile-open {
            transform: translateX(0);
        }

        .erp-sidebar.collapsed {
            width: 280px;
            transform: translateX(-100%);
        }

        .erp-sidebar.collapsed.mobile-open {
            transform: translateX(0);
        }
    }

    @media (min-width: 769px) {
        .erp-sidebar__toggle {
            display: flex;
        }
    }

    @media (min-width: 769px) and (max-width: 1024px) {
        :root {
            --sidebar-width: 220px;
            --sidebar-collapsed: 60px;
        }

        .erp-sidebar__btn {
            padding: 10px 12px;
            font-size: 14px;
        }

        .erp-sidebar__title {
            font-size: 18px;
        }
    }
</style>

<aside class="erp-sidebar" id="sidebar">
    <div class="erp-sidebar__header">
        <div class="erp-sidebar__title">Dream Box</div>
        <button class="erp-sidebar__toggle" id="sidebarToggleBtn">
            <span id="toggleIcon">←</span>
        </button>
    </div>

    <nav class="erp-sidebar__menu">
        <button class="erp-sidebar__btn erp-sidebar__btn--active" data-tooltip="List Category">
            <svg class="erp-sidebar__icon" viewBox="0 0 24 24">
                <path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/>
            </svg>
            <span class="erp-sidebar__btn-text">Dashboard</span>
        </button>
        <button class="erp-sidebar__btn" data-tooltip="Item List">
            <svg class="erp-sidebar__icon" viewBox="0 0 24 24">
                <path d="M19 3h-4.18C14.4 1.84 13.3 1 12 1c-1.3 0-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm2 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
            </svg>
            <span class="erp-sidebar__btn-text">Booking</span>
        </button>
        <button class="erp-sidebar__btn" data-tooltip="Service List">
            <svg class="erp-sidebar__icon" viewBox="0 0 24 24">
                <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
            </svg>
            <span class="erp-sidebar__btn-text">Package Details</span>
        </button>
        <button class="erp-sidebar__btn" data-tooltip="Service List">
            <svg class="erp-sidebar__icon" viewBox="0 0 24 24">
                <path d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04c.39-.39.39-1.02 0-1.41l-2.34-2.34c-.39-.39-1.02-.39-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/>
            </svg>
            <span class="erp-sidebar__btn-text">User Accounts</span>
        </button>
        <button class="erp-sidebar__btn" data-tooltip="Brand List">
            <svg class="erp-sidebar__icon" viewBox="0 0 24 24">
                <path d="M17.63 5.84C17.27 5.33 16.67 5 16 5L5 5.01C3.9 5.01 3 5.9 3 7v10c0 1.1.9 1.99 2 1.99L16 19c.67 0 1.27-.33 1.63-.84L22 12l-4.37-6.16zM16 17H5V7h11l3.55 5L16 17z"/>
            </svg>
            <span class="erp-sidebar__btn-text">Reports</span>
        </button>
<!--        <button class="erp-sidebar__btn" data-tooltip="Tags">
            <svg class="erp-sidebar__icon" viewBox="0 0 24 24">
                <path d="M17.63 5.84C17.27 5.33 16.67 5 16 5L5 5.01C3.9 5.01 3 5.9 3 7v10c0 1.1.9 1.99 2 1.99L16 19c.67 0 1.27-.33 1.63-.84L22 12l-4.37-6.16z"/>
                <path d="M9 9H7v2h2V9zm4 0h-2v2h2V9zm4 0h-2v2h2V9z"/>
            </svg>
            <span class="erp-sidebar__btn-text">Tags</span>
        </button>
        <button class="erp-sidebar__btn" data-tooltip="Opening Balance">
            <svg class="erp-sidebar__icon" viewBox="0 0 24 24">
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1.41 16.09V20h-2.67v-1.93c-1.71-.36-3.16-1.46-3.27-3.4h1.96c.1 1.05.82 1.87 2.65 1.87 1.96 0 2.4-.98 2.4-1.59 0-.83-.44-1.61-2.67-2.14-2.48-.6-4.18-1.62-4.18-3.67 0-1.72 1.39-2.84 3.11-3.21V4h2.67v1.95c1.86.45 2.79 1.86 2.85 3.39H14.3c-.05-1.11-.64-1.87-2.22-1.87-1.5 0-2.4.68-2.4 1.64 0 .84.65 1.39 2.67 1.91s4.18 1.39 4.18 3.91c-.01 1.83-1.38 2.83-3.12 3.16z"/>
            </svg>
            <span class="erp-sidebar__btn-text">Opening Balance</span>
        </button>
        <button class="erp-sidebar__btn" data-tooltip="Barcode">
            <svg class="erp-sidebar__icon" viewBox="0 0 24 24">
                <path d="M2 6h2v12H2zm3 0h1v12H5zm2 0h3v12H7zm4 0h1v12h-1zm3 0h2v12h-2zm3 0h3v12h-3zm4 0h1v12h-1zm2 0h1v12h-1z"/>
            </svg>
            <span class="erp-sidebar__btn-text">Barcode</span>
        </button>
        <button class="erp-sidebar__btn" data-tooltip="Back to Dashboard">
            <svg class="erp-sidebar__icon" viewBox="0 0 24 24">
                <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>
            </svg>
            <span class="erp-sidebar__btn-text">Back to Dashboard</span>
        </button>-->
    </nav>
</aside>

<script>
    // Sidebar-specific JavaScript
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.getElementById('sidebar');
        const sidebarToggleBtn = document.getElementById('sidebarToggleBtn');
        const toggleIcon = document.getElementById('toggleIcon');
        
        // Toggle sidebar collapse/expand
        if (sidebarToggleBtn) {
            sidebarToggleBtn.addEventListener('click', () => {
                if (window.innerWidth > 768) {
                    sidebar.classList.toggle('collapsed');
                    toggleIcon.textContent = sidebar.classList.contains('collapsed') ? '→' : '←';
                    localStorage.setItem('sidebarCollapsed', sidebar.classList.contains('collapsed'));
                }
            });
        }
        
        // Close mobile menu when clicking on a menu item
        document.querySelectorAll('.erp-sidebar__btn').forEach(btn => {
            btn.addEventListener('click', () => {
                if (window.innerWidth <= 768) {
                    sidebar.classList.remove('mobile-open');
                    const sidebarOverlay = document.getElementById('sidebarOverlay');
                    if (sidebarOverlay) {
                        sidebarOverlay.classList.remove('active');
                    }
                }
            });
        });
        
        // Load saved sidebar state
        if (window.innerWidth > 768) {
            const isCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';
            if (isCollapsed) {
                sidebar.classList.add('collapsed');
                if (toggleIcon) toggleIcon.textContent = '→';
            }
        }
        
        // Handle window resize
        window.addEventListener('resize', () => {
            if (window.innerWidth > 768) {
                if (sidebarToggleBtn) sidebarToggleBtn.style.display = 'flex';
                sidebar.classList.remove('mobile-open');
                const sidebarOverlay = document.getElementById('sidebarOverlay');
                if (sidebarOverlay) sidebarOverlay.classList.remove('active');
            } else {
                if (sidebarToggleBtn) sidebarToggleBtn.style.display = 'none';
            }
        });
    });
</script>
<?php endif; ?>