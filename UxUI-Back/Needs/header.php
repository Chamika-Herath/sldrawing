<style>
    .hamburger {
        display: none;
        flex-direction: column;
        gap: 5px;
        cursor: pointer;
        padding: 5px;
        z-index: 1001; /* Stay above nav items if needed */
    }
    .hamburger span {
        width: 25px;
        height: 3px;
        background-color: var(--primary);
        border-radius: 3px;
        transition: all 0.3s;
    }
    @media (max-width: 992px) {
        .nav-container { display: block !important; left: 0 !important; right: 0 !important; width: 100% !important; padding: 0 !important; }
        .nav-capsule { position: fixed !important; top: 15px !important; left: 20px !important; right: 20px !important; width: auto !important; max-width: none !important; padding: 12px 20px !important; flex-wrap: wrap !important; justify-content: space-between !important; border-radius: 20px !important; margin: 0 !important; box-sizing: border-box !important; z-index: 1001 !important; }
        .nav-links { display: none !important; flex-direction: column; width: 100%; margin-top: 15px !important; gap: 15px !important; padding-bottom: 10px; border-top: 1px solid rgba(0,0,0,0.05); padding-top: 15px; }
        .nav-links.active { display: flex !important; }
        .nav-link { font-size: 1.1rem; }
        .nav-logo-container { margin-bottom: 0; font-size: 1.5rem !important; }
        .join-btn { padding: 12px 20px !important; font-size: 1rem !important; width: 100%; display: block !important; text-align: center; }
        .nav-container { top: 10px !important; }
        .hamburger { display: flex; }
        .hamburger.active span:nth-child(1) { transform: translateY(8px) rotate(45deg); }
        .hamburger.active span:nth-child(2) { opacity: 0; }
        .hamburger.active span:nth-child(3) { transform: translateY(-8px) rotate(-45deg); }
    }
    .nav-link { position: relative; text-decoration: none; color: var(--text); font-weight: 700; transition: all 0.3s; }
    .nav-link::after { 
        content: ''; position: absolute; bottom: -5px; left: 0; width: 0; height: 3px; 
        background: var(--primary); border-radius: 10px; transition: width 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275); 
    }
    .nav-link:hover::after, .nav-link.active::after { width: 100%; }
    .nav-link:hover, .nav-link.active { color: var(--primary); transform: translateY(-2px); }
</style>

<div class="nav-container" style="position: fixed; top: 20px; left: 0; width: 100%; z-index: 1000; display: flex; justify-content: center; pointer-events: none;">
    <nav class="nav-capsule glass" style="
        padding: 12px 40px; 
        border-radius: 100px; 
        display: flex; 
        justify-content: space-between; 
        align-items: center; 
        width: 1200px; 
        max-width: 95%; 
        pointer-events: auto;
    ">
        <div class="nav-logo-container" style="font-size: 1.8rem; font-weight: 900; color: var(--primary); cursor: pointer; letter-spacing: -1px; display: flex; align-items: center;" onclick="window.location.href='/'">
            <span style="background: var(--primary); color: #fff; padding: 2px 8px; border-radius: 8px; margin-right: 2px;">SL</span>drawing
        </div>
        
        <div class="hamburger" id="mobile-menu-btn" style="pointer-events: auto;">
            <span></span>
            <span></span>
            <span></span>
        </div>
        
        <ul class="nav-links" id="mobile-nav-links" style="display: flex; gap: 40px; list-style: none; align-items: center; margin: 0; padding: 0;">
            <li><a href="/" class="nav-link">Home</a></li>
            <li><a href="/ai-grader.php" class="nav-link">AI Check</a></li>
            <li><a href="/tutorials.php" class="nav-link">Tutorials</a></li>
            <li><a href="/studio.php" class="nav-link">Studio</a></li>
            <li><a href="/gallery.php" class="nav-link">Community</a></li>
            <li><a href="/UxUi/Main/User-Login.php" class="btn btn-primary join-btn" style="
                padding: 10px 30px; 
                border-radius: 50px; 
                background: linear-gradient(45deg, var(--primary), #00d2ff); 
                border: none; 
                color: #fff; 
                font-weight: 800; 
                text-decoration: none; 
                display: inline-block; 
                box-shadow: 0 5px 15px rgba(0, 132, 255, 0.3);
                transition: transform 0.3s;
            ">Join Now</a></li>
        </ul>
    </nav>
</div>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Mobile Menu Logic
        const menuBtn = document.getElementById('mobile-menu-btn');
        const navLinks = document.getElementById('mobile-nav-links');
        if (menuBtn && navLinks) {
            menuBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                this.classList.toggle('active');
                navLinks.classList.toggle('active');
            });
        }

        // Active Link Highlighting
        const currentPath = window.location.pathname;
        const allLinks = document.querySelectorAll('.nav-link');
        
        allLinks.forEach(link => {
            const linkPath = link.getAttribute('href');
            if (currentPath === linkPath || (currentPath === '/' && linkPath === '/')) {
                link.classList.add('active');
            } else if (linkPath !== '/' && currentPath.includes(linkPath)) {
                // Handle cases where path might have extra segments
                link.classList.add('active');
            }
        });
    });
</script>
