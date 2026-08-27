<style>
    @import url('https://fonts.googleapis.com/css2?family=Homemade+Apple&display=swap');

    .video-section-vibrant {
        background: radial-gradient(circle at 60% 40%, rgba(219, 118, 54, 0.08) 0%, transparent 60%),
                    linear-gradient(180deg, #15110e 0%, rgba(22, 14, 10, 0.95) 50%, #15110e 100%), 
                    url('/assets/images/museum_bg_1.webp') center / cover no-repeat;
        padding: 150px 0;
        position: relative;
        overflow: hidden;
        border-bottom: 1px solid rgba(255,255,255,0.02);
    }
    
    .video-grid {
        display: grid;
        grid-template-columns: 1fr 1.3fr;
        gap: 60px;
        align-items: center;
        position: relative;
        z-index: 5;
    }

    @media (max-width: 992px) {
        .video-grid { grid-template-columns: 1fr; text-align: center; gap: 60px; }
        .video-section-vibrant { padding: 80px 15px; }
        .feature-list { display: flex; flex-direction: column; align-items: flex-start; margin: 0 auto; max-width: 300px;}
        .curs-watermark { display: none !important; }
        .glass-vid-container { transform: rotateY(0deg) rotateX(0deg) scale(1) !important; padding: 5px; }
        .glass-vid-container::after { display: none !important; } /* Hide the 3D plaque on small screens to save space */
    }

    @media (max-width: 768px) {
        .video-text-container h2 { font-size: 2.5rem !important; margin-bottom: 20px !important; }
        .video-text-container h2 span { font-size: 2.3rem !important; }
        .video-text-container p { font-size: 1rem !important; line-height: 1.5 !important; }
        .art-frame-perspective::before { display: none; }
    }

    .art-frame-perspective {
        perspective: 1500px;
        position: relative;
    }

    /* Decorative Backlight Behind the Frame - Optimized radial-gradient glow */
    .art-frame-perspective::before {
        content: ''; position: absolute; top: 10%; left: 10%; width: 80%; height: 80%;
        background: radial-gradient(circle, rgba(219, 118, 54, 0.2) 0%, transparent 70%); z-index: 0;
        pointer-events: none;
    }

    /* Interactive 3D Museum Canvas */
    .glass-vid-container {
        position: relative;
        z-index: 5;
        padding: 15px;
        background: #110a07; /* Dark wood canvas base */
        border: 2px solid #3c2514; /* Inner wood border */
        box-shadow: 
            0 40px 100px rgba(0,0,0,0.9), 
            0 0 0 8px #1a0f0a,
            0 0 0 10px #704728, /* Outer Golden-Wood Trim */
            inset 0 0 30px rgba(219, 118, 54, 0.2);
        
        transform: rotateY(-18deg) rotateX(4deg) scale(0.95);
        transform-style: preserve-3d;
        transition: 0.8s cubic-bezier(0.2, 0.8, 0.2, 1);
        cursor: pointer;
    }

    .glass-vid-container:hover {
        transform: rotateY(0deg) rotateX(0deg) scale(1.02);
        box-shadow: 
            0 50px 120px rgba(0,0,0,0.9), 
            0 0 0 8px #1a0f0a,
            0 0 0 10px #db7636, /* Illuminate outer trim on hover */
            inset 0 0 40px rgba(219, 118, 54, 0.5);
    }
    
    /* Simulate a Name Plaque at the bottom of the painting */
    .glass-vid-container::after {
        content: 'MASTERCLASS EXHIBIT';
        position: absolute;
        bottom: -35px; left: 50%;
        transform: translateX(-50%) translateZ(20px);
        background: linear-gradient(180deg, #d4b584 0%, #aa854b 100%);
        color: #1a0f0a;
        font-family: 'Inter', sans-serif;
        font-size: 0.65rem;
        font-weight: 900;
        letter-spacing: 2px;
        padding: 4px 15px;
        border-radius: 2px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.7), inset 0 1px 1px rgba(255,255,255,0.8);
        opacity: 0.8;
        transition: 0.5s;
    }
    .glass-vid-container:hover::after { opacity: 1; bottom: -40px; }

    .video-wrapper {
        position: relative;
        padding-bottom: 56.25%;
        height: 0;
        overflow: hidden;
        background: #000;
        border: 1px solid rgba(255,255,255,0.05);
        box-shadow: inset 0 0 40px rgba(0,0,0,0.9); /* Deep canvas recess */
    }

    .video-wrapper iframe {
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%; border: none;
        opacity: 0.8; transition: 0.5s; filter: grayscale(20%) sepia(10%);
    }
    .glass-vid-container:hover iframe { opacity: 1; filter: grayscale(0%) sepia(0%); }

    /* Elegant list items */
    .feature-list { list-style: none; padding: 0; margin-top: 0px; }
    
    .feature-item {
        margin-bottom: 18px; display: flex; align-items: center; color: #a48c77;
        font-family: 'Inter', sans-serif; font-size: 0.9rem; font-weight: 600;
        text-transform: uppercase; letter-spacing: 1.5px;
        transition: 0.4s; cursor: pointer;
    }
    .feature-item:hover { color: #fff; transform: translateX(8px); }
    .feature-item svg { transition: 0.4s; }
    .feature-item:hover svg { filter: drop-shadow(0 0 10px rgba(219, 118, 54, 0.8)); transform: rotate(135deg) !important; }

    .curs-watermark {
        font-family: 'Homemade Apple', cursive;
        font-size: 5rem;
        color: rgba(255,255,255, 0.03);
        position: absolute;
        top: 20px; left: 10%;
        transform: rotate(-10deg);
        z-index: 0; pointer-events: none;
        white-space: nowrap;
    }
</style>

<section class="video-section-vibrant">
    <!-- Artistic Cursive Layering -->
    <div class="curs-watermark">The Exhibition Archive</div>
    
    <div class="container video-grid">
        <!-- Typography Column -->
        <div class="video-text-container" style="position: relative; z-index: 5;">
            <div style="font-family: 'Inter', sans-serif; font-size: 0.85rem; letter-spacing: 4px; color: #db7636; text-transform: uppercase; margin-bottom: 20px; font-weight: 800; display: inline-block; border-bottom: 1px solid rgba(219, 118, 54, 0.3); padding-bottom: 8px;">
                Curator's Archive
            </div>
            
            <h2 style="font-family: 'Playfair Display', serif; font-size: 4rem; line-height: 1.05; margin-bottom: 35px; color: #fff; font-weight: 400; text-shadow: 0 10px 30px rgba(0,0,0,0.8);">
                <span style="font-style: italic; color: #db7636; font-size: 3.2rem;">The Digital</span><br>
                <span style="font-weight: 700;">MASTERCLASS</span>
            </h2>
            
            <div style="border-left: 2px solid #db7636; padding-left: 25px; margin-bottom: 45px; position: relative;">
                <p style="font-family: 'Playfair Display', serif; color: #e5d5c5; line-height: 1.8; font-size: 1.25rem; font-style: italic; max-width: 420px; position: relative; text-shadow: 0 2px 10px rgba(0,0,0,0.8);">
                    "Watch the process unravel. Our specialized grid architecture bridges traditional canvas methodologies firmly into the digital landscape."
                </p>
                <div style="position: absolute; top: -15px; left: -15px; font-size: 4rem; font-family: 'Playfair Display', serif; color: rgba(219,118,54,0.1); line-height: 1; pointer-events: none;">"</div>
            </div>
            
            <div class="feature-list">
                <div class="feature-item">
                    <svg width="10" height="10" viewBox="0 0 24 24" fill="#db7636" style="margin-right: 18px; transform: rotate(45deg);"><rect width="24" height="24" /></svg>
                    Observe stroke mathematics
                </div>
                <div class="feature-item">
                    <svg width="10" height="10" viewBox="0 0 24 24" fill="#db7636" style="margin-right: 18px; transform: rotate(45deg);"><rect width="24" height="24" /></svg>
                    Advanced coordinate mapping
                </div>
                <div class="feature-item">
                    <svg width="10" height="10" viewBox="0 0 24 24" fill="#db7636" style="margin-right: 18px; transform: rotate(45deg);"><rect width="24" height="24" /></svg>
                    Step-by-step replication
                </div>
            </div>
        </div>
        
        <!-- 3D Interactive Video Frame Column -->
        <div class="art-frame-perspective">
            <div class="glass-vid-container">
                <div class="video-wrapper">
                    <iframe 
                        id="youtube-iframe"
                        data-src="https://www.youtube-nocookie.com/embed/GH3_NUbRpCY?rel=0&modestbranding=1" 
                        title="Digital Drawing Process" 
                        frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                        allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    // Inject iframe optimally bypassing network waterfalls
    const loadYoutube = () => {
        const iframe = document.getElementById('youtube-iframe');
        if (iframe && iframe.getAttribute('data-src')) {
            iframe.src = iframe.getAttribute('data-src');
            iframe.removeAttribute('data-src');
        }
        ['scroll', 'mousemove', 'touchstart', 'click'].forEach(evt => 
            window.removeEventListener(evt, loadYoutube)
        );
    };
    ['scroll', 'mousemove', 'touchstart', 'click'].forEach(evt => 
        window.addEventListener(evt, loadYoutube, {once: true, passive: true})
    );
</script>


