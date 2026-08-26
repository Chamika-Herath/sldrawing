<style>
    .atelier-footer {
        padding: 0 0 40px;
        background: radial-gradient(circle at center, #26160d 0%, #110905 100%);
        position: relative;
        overflow: hidden;
        z-index: 10;
        box-shadow: inset 0 20px 50px rgba(0,0,0,0.8);
    }
    
    .atelier-footer::before {
        content: ''; position: absolute; top: 0; left: 0; right: 0; bottom: 0;
        background: repeating-linear-gradient(
            0deg,
            rgba(0,0,0,0.1) 0px,
            rgba(0,0,0,0.1) 2px,
            transparent 2px,
            transparent 6px
        );
        pointer-events: none;
        z-index: 1;
        opacity: 0.5;
    }

    /* Art Deco Top Border */
    .deco-top-border {
        position: relative;
        z-index: 5;
        display: flex;
        align-items: flex-start;
        justify-content: center;
        width: 100%;
        margin-bottom: 60px;
    }
    
    .deco-line {
        flex-grow: 1;
        height: 10px;
        border-bottom: 2px solid #a37b58;
        border-top: 1px solid #735338;
        margin-top: 10px;
        opacity: 0.7;
    }

    .deco-center {
        padding: 0 20px;
        color: #a37b58;
    }

    .footer-grid { display: grid; grid-template-columns: 2fr 1fr 1fr 1.5fr; gap: 50px; margin-bottom: 50px; position: relative; z-index: 5; padding-top: 20px; }
    
    .footer-branding { display: flex; align-items: center; gap: 15px; margin-bottom: 20px; }
    .footer-desc { font-family: 'Inter', sans-serif; color: #a48c77; line-height: 1.6; font-size: 0.85rem; margin-bottom: 25px; max-width: 320px; }
    
    .social-btn {
        width: 35px; height: 35px; border-radius: 8px; background: rgba(0,0,0,0.3);
        display: flex; align-items: center; justify-content: center; color: #a48c77;
        transition: 0.4s; text-decoration: none; border: 1px solid rgba(255,255,255,0.05);
    }
    .social-btn:hover { background: #db7636; color: #fff; transform: translateY(-3px); border-color: #db7636; }

    .footer-heading { font-family: 'Inter', sans-serif; color: #d2bba0; font-weight: 800; margin-bottom: 20px; text-transform: uppercase; letter-spacing: 1.5px; font-size: 0.85rem; }
    
    .footer-links { list-style: none; padding: 0; display: grid; gap: 12px; }
    .footer-links a { color: #8e7a68; text-decoration: none; transition: 0.3s; font-weight: 500; font-family: 'Inter', sans-serif; font-size: 0.85rem; }
    .footer-links a:hover { color: #d2bba0; padding-left: 5px; }

    .footer-contact-item { display: flex; gap: 12px; align-items: center; color: #8e7a68; font-family: 'Inter', sans-serif; font-size: 0.85rem; margin-bottom: 12px; }
    .footer-contact-item svg { width: 16px; height: 16px; color: #a37b58; }
    
    /* Feather Divider */
    .feather-divider {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        position: relative;
        z-index: 5;
        margin-bottom: 30px;
        opacity: 0.8;
    }
    .feather-line {
        flex-grow: 1;
        height: 1px;
        background: linear-gradient(to right, transparent, #a37b58, transparent);
        max-width: 400px;
    }
    .feather-icon {
        padding: 0 15px;
        color: #dbc093;
        filter: drop-shadow(0 0 5px rgba(219, 192, 147, 0.4));
    }
    
    .footer-bottom { display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 20px; font-family: 'Inter', sans-serif; position: relative; z-index: 5; }
    .footer-copy { color: rgba(164, 140, 119, 0.7); font-size: 0.8rem; font-weight: 500; }
    .footer-bottom-links { display: flex; gap: 25px; flex-wrap: wrap; justify-content: center; }
    .footer-bottom-links a { color: rgba(164, 140, 119, 0.7); text-decoration: none; font-size: 0.8rem; transition: 0.3s; }
    .footer-bottom-links a:hover { color: #d2bba0; }

    @media (max-width: 992px) { .footer-grid { grid-template-columns: 1fr 1fr; gap: 40px; } }
    @media (max-width: 600px) {
        .footer-grid { grid-template-columns: 1fr; gap: 40px; }
        .footer-bottom { justify-content: center; flex-direction: column; text-align: center; gap: 15px; }
        .footer-bottom-links { gap: 15px; }
    }
</style>

<footer class="atelier-footer reveal">
    
    <!-- Top Art Deco Accent -->
    <div class="deco-top-border">
        <div class="deco-line"></div>
        <div class="deco-center">
            <svg width="60" height="30" viewBox="0 0 60 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 0 L30 25 L60 0" stroke="#a37b58" stroke-width="2" fill="none"/>
                <path d="M10 0 L30 17 L50 0" stroke="#a37b58" stroke-width="2" fill="none"/>
                <path d="M20 0 L30 9 L40 0" stroke="#a37b58" stroke-width="2" fill="none"/>
            </svg>
        </div>
        <div class="deco-line"></div>
    </div>

    <div class="container" style="max-width: 1100px;">
        <div class="footer-grid">
            <!-- Column 1: Brand & About -->
            <div>
                <div class="footer-branding">
                    <img src="https://heraforce.com/assets/images/heraforce_cyber_queen_logo_1778267022286J.png" alt="Heraforce Logo" style="width: 45px; height: 45px; border-radius: 8px; object-fit: cover; border: 1px solid rgba(255,255,255,0.1);">
                    <img src="/assets/images/sldrawing_cyber_badge.png" alt="SLdrawing Logo" style="width: 45px; height: 45px; border-radius: 8px; object-fit: cover; border: 1px solid rgba(255,255,255,0.1);">
                    <div style="font-family: 'Inter', sans-serif; font-size: 1.2rem; font-weight: 900; color: #fff; letter-spacing: 0.5px;">
                        <span style="background: #db7636; color: #fff; padding: 3px 8px; border-radius: 5px; font-size: 0.9rem; margin-right: 5px;">SL</span>drawing
                    </div>
                </div>
                <p class="footer-desc">
                    Empowering artists worldwide with next-generation AI-assisted tools. Mastering the art of grid drawing and creative expression.
                </p>
                <div style="display: flex; gap: 10px;">
                    <a href="https://www.facebook.com/HeraForceCreation/" target="_blank" rel="noopener noreferrer" aria-label="Facebook" class="social-btn">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M22 12C22 6.48 17.52 2 12 2S2 6.48 2 12c0 4.84 3.44 8.85 7.94 9.74V14.7H7.06V12h2.88V9.79c0-2.85 1.7-4.43 4.3-4.43 1.25 0 2.56.22 2.56.22v2.81h-1.44c-1.42 0-1.86.88-1.86 1.78V12h3.16l-.51 2.7h-2.65v6.99C18.56 20.85 22 16.84 22 12z"/></svg>
                    </a>
                    <a href="https://heraforce.com/" target="_blank" rel="noopener noreferrer" aria-label="Heraforce Official Website" class="social-btn">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M2 12h20"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10Z"/></svg>
                    </a>
                    <a href="https://www.youtube.com/@HeraForce-r4i" target="_blank" rel="noopener noreferrer" aria-label="YouTube Channel" class="social-btn">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M23.5 6.5s-.2-1.6-.8-2.3c-.8-.8-1.7-.8-2.1-.9C17.7 3 12 3 12 3s-5.7 0-8.6.3c-.4 0-1.3.1-2.1.9C.7 4.9.5 6.5.5 6.5S0 8.2 0 9.9v4.2c0 1.7.5 3.4.5 3.4s.2 1.6.8 2.3c.8.8 1.8.8 2.2.9 1.6.1 6.7.3 6.7.3s5.7 0 8.6-.3c.4 0 1.3-.1 2.1-.9.6-.7.8-2.3.8-2.3s.5-1.7.5-3.4V9.9c0-1.7-.5-3.4-.5-3.4ZM9.7 15.5V8.5l6.2 3.5-6.2 3.5Z"/></svg>
                    </a>
                </div>
            </div>

            <!-- Column 2: Platform -->
            <div>
                <h3 class="footer-heading">Feature</h3>
                <ul class="footer-links">
                    <li><a href="/">Home</a></li>
                    <li><a href="/studio">About</a></li>
                    <li><a href="/ai-grader">Contacts</a></li>
                    <li><a href="/tutorials">Tutorials</a></li>
                </ul>
            </div>

            <!-- Column 3: Community -->
            <div>
                <h3 class="footer-heading">Community</h3>
                <ul class="footer-links">
                    <li><a href="/challenges">Challenges</a></li>
                    <li><a href="/gallery">Gallery</a></li>
                    <li><a href="#">Leaderboard</a></li>
                    <li><a href="#">Art blog</a></li>
                </ul>
            </div>

            <!-- Column 4: Contact -->
            <div>
                <h3 class="footer-heading">Contact</h3>
                <div style="display: grid; gap: 10px;">
                    <div class="footer-contact-item">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                        <div>chamika@heraforce.com</div>
                    </div>
                    <div class="footer-contact-item">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7z"></path><circle cx="12" cy="9" r="2.5"></circle></svg>
                        <div>Global Artist Community</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Feather Divider -->
        <div class="feather-divider">
            <div class="feather-line"></div>
            <div class="feather-icon">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19.98 2.02c-.89-.89-2.61-.31-4.7 1.4-2.8 2.27-5.59 5.86-7.38 9.38-1.57.48-3.08 1.41-4.29 2.62C1.94 17.09 1.7 19.34 3.03 21.03l1.9-1.92h2.09v2.09l-1.92 1.9c1.69 1.33 3.94 1.09 5.61-.58 1.21-1.21 2.14-2.72 2.62-4.29 3.52-1.79 7.11-4.58 9.38-7.38 1.71-2.09 2.29-3.81 1.4-4.7L19.98 2.02z" opacity="0.9"/>
                </svg>
            </div>
            <div class="feather-line"></div>
        </div>

        <!-- Bottom Footer -->
        <div class="footer-bottom">
            <div class="footer-copy">
                &copy; 2026 SLdrawing. All Rights Reserved. Designed by <a href="https://www.heraforce.com/" target="_blank" rel="noopener noreferrer" style="color: rgba(219,192,147, 0.8); text-decoration: none;">Chamika Herath</a>
            </div>
            <div class="footer-bottom-links">
                <a href="#">Privacy Policy</a>
                <a href="#">Terms of Service</a>
                <a href="#">Contact us</a>
            </div>
        </div>
    </div>
</footer>
