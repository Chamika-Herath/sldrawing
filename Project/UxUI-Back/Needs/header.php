<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jomolhari&display=swap" rel="stylesheet">

<style>
    /* --- 1. The Fixed Hamburger Button --- */
    .nav-header-menu-toggle-btn {
        position: fixed;
        top: 30px;
        right: 40px;
        width: 60px;
        height: 60px;
        z-index: 9999; 
        cursor: pointer;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 8px;
        border: 1px solid rgba(188, 19, 254, 0.5);
        border-radius: 50%; 
        backdrop-filter: blur(10px);
        transition: all 0.3s ease;
    }

    .nav-header-menu-toggle-btn:hover {
        transform: scale(1.1);
        border-color: #fff;
        box-shadow: 0 0 25px rgba(188, 19, 254, 0.6);
    }

    /* The Lines (Bars) */
    .nav-header-bar {
        width: 30px;
        height: 3px;
        background-color: #fff;
        border-radius: 2px;
        transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
    }

    /* --- 2. The Full Screen Overlay --- */
    .nav-header-nav-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        background: radial-gradient(circle at center, rgba(46, 21, 59, 0.98), #05000a 100%);
        z-index: 9998; 
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        
        opacity: 0;
        pointer-events: none; 
        visibility: hidden;
        transition: all 0.5s ease-in-out;
    }

    .nav-header-nav-overlay.active {
        opacity: 1;
        pointer-events: auto;
        visibility: visible;
    }

    /* --- 3. Navigation Links --- */
    .nav-header-nav-links {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 40px;
    }

    .nav-header-nav-link {
        font-family: 'Jomolhari', serif;
        font-size: 3.5rem;
        color: rgba(255, 255, 255, 0.5);
        text-decoration: none;
        text-transform: uppercase;
        letter-spacing: 2px;
        transition: 0.3s;
        position: relative;
        
        transform: translateY(20px);
        opacity: 0;
        transition: transform 0.5s ease, opacity 0.5s ease, color 0.3s ease, text-shadow 0.3s ease;
    }

    /* --- COMBINED HOVER & ACTIVE STYLES --- */
    .nav-header-nav-link:hover,
    .nav-header-nav-link.active {
        color: #fff;
        text-shadow: 0 0 20px #bc13fe, 0 0 40px #bc13fe;
        transform: scale(1.05);
        opacity: 1;
    }

    /* --- 4. Animation Classes --- */
    .nav-header-menu-toggle-btn.open .nav-header-bar:nth-child(1) {
        transform: translateY(11px) rotate(45deg);
        background-color: #bc13fe;
    }
    .nav-header-menu-toggle-btn.open .nav-header-bar:nth-child(2) {
        opacity: 0;
        transform: translateX(-20px);
    }
    .nav-header-menu-toggle-btn.open .nav-header-bar:nth-child(3) {
        transform: translateY(-11px) rotate(-45deg);
        background-color: #bc13fe;
    }

    .nav-header-nav-overlay.active .nav-header-nav-link {
        opacity: 1;
        transform: translateY(0);
    }
    
    .nav-header-nav-overlay.active .nav-header-nav-link:nth-child(1) { transition-delay: 0.1s; }
    .nav-header-nav-overlay.active .nav-header-nav-link:nth-child(2) { transition-delay: 0.2s; }
    .nav-header-nav-overlay.active .nav-header-nav-link:nth-child(3) { transition-delay: 0.3s; }

    /* --- 5. Responsive Adjustments --- */
    @media (max-width: 768px) {
        .nav-header-menu-toggle-btn {
            top: 20px;
            right: 20px;
            width: 50px;
            height: 50px;
        }
        .nav-header-nav-link {
            font-size: 2.5rem;
            gap: 30px;
        }
    }
    
</style>


<div class="nav-header-menu-toggle-btn" id="nav-header-menuBtn">
    <div class="nav-header-bar"></div>
    <div class="nav-header-bar"></div>
    <div class="nav-header-bar"></div>
</div>

<div class="nav-header-nav-overlay" id="nav-header-navOverlay">
    <nav class="nav-header-nav-links">
        <a href="<?php echo $pth; ?>index<?php echo $online_exnction; ?>" class="nav-header-nav-link" onclick="navHeaderCloseMenu()">Home</a>
        
        <a href="<?php echo $pth; ?>booking<?php echo $online_exnction; ?>" class="nav-header-nav-link" onclick="navHeaderCloseMenu()">Booking</a>
        
        <a href="<?php echo $pth; ?>contact<?php echo $online_exnction; ?>" class="nav-header-nav-link" onclick="navHeaderCloseMenu()">Contact Us</a>
    </nav>
</div>

<script>
    const menuBtn = document.getElementById('nav-header-menuBtn');
    const navOverlay = document.getElementById('nav-header-navOverlay');
    const links = document.querySelectorAll('.nav-header-nav-link');

    // 1. Toggle Function
    menuBtn.addEventListener('click', () => {
        menuBtn.classList.toggle('open');
        navOverlay.classList.toggle('active');
    });

    // 2. Close Menu Helper
    function navHeaderCloseMenu() {
        menuBtn.classList.remove('open');
        navOverlay.classList.remove('active');
    }

    // 3. Logic to Set Active Link
    function setActiveNavLink() {
        const currentPath = window.location.pathname;
        
        const getPageName = (path) => {
            if (!path) return '';
            let filename = path.split('/').pop();
            filename = filename.replace(/\.(php|html|htm)$/, '').split('?')[0];
            return filename.toLowerCase();
        };
        
        const currentPage = getPageName(currentPath);
        
        links.forEach(link => {
            const href = link.getAttribute('href');
            if (href) {
                let linkPage = '';
                if (href.includes('://')) {
                    const url = new URL(href);
                    linkPage = getPageName(url.pathname);
                } else {
                    linkPage = getPageName(href);
                }
                
                const isHomePage = (currentPath === '/' || 
                                  currentPage === 'index' || 
                                  currentPage === '');
                
                const isHomeLink = (linkPage === 'index' || 
                                  linkPage === '' || 
                                  link.textContent.trim().toLowerCase() === 'home');
                
                if ((isHomePage && isHomeLink) || linkPage === currentPage) {
                    link.classList.add('active');
                } else {
                    link.classList.remove('active');
                }
            }
        });
    }

    // 4. Initialization
    document.addEventListener('DOMContentLoaded', function() {
        // Run active state logic once when page loads
        setActiveNavLink();

        // Re-set active links on history changes (Back/Forward buttons)
        window.addEventListener('popstate', setActiveNavLink);
    });
</script>