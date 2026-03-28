<style>
    .hero-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 40px; align-items: center; text-align: left; padding-top: 100px; }
    @media (max-width: 992px) {
        .hero-section { align-items: flex-start !important; padding-top: 80px; padding-bottom: 50px; min-height: 100vh !important; }
        .hero-grid { grid-template-columns: 1fr; text-align: center; padding-top: 30px; gap: 20px; }
        .hero-h1 { font-size: 2.6rem !important; margin-bottom: 10px !important; line-height: 1.1 !important; }
        .hero-p { font-size: 1.05rem !important; margin-bottom: 25px !important; }
        .hero-images { justify-content: center !important; margin-top: 25px; transform: scale(0.65); transform-origin: top center; height: 300px !important; margin-bottom: -50px; }
        .hero-text-container { align-items: center !important; text-align: center !important; padding: 0 15px; }
        .hero-btn-container { justify-content: center !important; flex-wrap: wrap; width: 100%; gap: 10px !important; }
        .hero-btn-container .btn { width: 100%; box-sizing: border-box; text-align: center; padding: 15px 20px !important; font-size: 1rem !important; }
    }
    
    .hero-overlay {
        position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 0; pointer-events: none;
        background: linear-gradient(90deg, rgba(15,15,20,0.85) 0%, rgba(15,15,20,0.6) 45%, rgba(15,15,20,0.1) 100%);
    }
    @media (max-width: 992px) {
        .hero-overlay {
            background: linear-gradient(180deg, rgba(15,15,20,0.85) 0%, rgba(15,15,20,0.7) 60%, rgba(15,15,20,0.1) 100%);
        }
    }
    
    .hero-text-container { display: flex; flex-direction: column; align-items: flex-start; text-align: left; max-width: 800px; position: relative; z-index: 2; }
    .hero-btn-container { display: flex; gap: 20px; flex-wrap: wrap; justify-content: flex-start; }
    
    .card-stack { position: relative; width: 340px; height: 450px; }
    .card-item { 
        position: absolute; width: 100%; height: 100%; 
        transition: all 1s cubic-bezier(0.34, 1.56, 0.64, 1);
        transform-origin: bottom center;
    }
    .fade-mask { transition: opacity 0.5s ease-in-out; filter: saturate(1.4) contrast(1.1) brightness(1.05); }

    /* Continuous Fan Animation */
    @keyframes fan-pattern-1 { 0%, 100% { transform: rotate(0deg) translate(0, 0); } 50% { transform: rotate(-18deg) translate(-60px, -30px); } }
    @keyframes fan-pattern-2 { 0%, 100% { transform: rotate(0deg) translate(0, 0); } 50% { transform: rotate(-6deg) translate(-20px, -10px); } }
    @keyframes fan-pattern-3 { 0%, 100% { transform: rotate(0deg) translate(0, 0); } 50% { transform: rotate(6deg) translate(20px, -10px); } }
    @keyframes fan-pattern-4 { 0%, 100% { transform: rotate(0deg) translate(0, 0); } 50% { transform: rotate(18deg) translate(60px, -30px); } }

    .card-item { 
        position: absolute; width: 100%; height: 100%; 
        transition: opacity 0.5s ease-in-out, transform 1s cubic-bezier(0.34, 1.56, 0.64, 1);
        transform-origin: bottom center;
        box-shadow: 0 15px 35px rgba(0,0,0,0.2);
    }
    
    .card-1 { animation: fan-pattern-1 8s infinite ease-in-out; z-index: 1; }
    .card-2 { animation: fan-pattern-2 8s infinite ease-in-out; z-index: 2; }
    .card-3 { animation: fan-pattern-3 8s infinite ease-in-out; z-index: 3; }
    .card-4 { animation: fan-pattern-4 8s infinite ease-in-out; z-index: 4; }
</style>

<section class="hero hero-section" style="min-height: 100vh; position: relative; overflow: hidden; display: flex; align-items: center; justify-content: center; background: url('/assets/images/hero.png') center / cover no-repeat; filter: saturate(1.4) contrast(1.15) brightness(1.1);">
    <!-- Dark Gradient Overlay for text readability -->
    <div class="hero-overlay"></div>
    
    <div class="container hero-grid" style="z-index: 1;">
        <div class="hero-text-container">
            <h1 class="hero-h1" id="hero-title" style="font-size: 5rem; font-weight: 900; margin-bottom: 20px; text-transform: uppercase; letter-spacing: -2px; color: #fff; text-shadow: 0 10px 30px rgba(0,0,0,0.5); line-height: 0.9; transition: opacity 1s ease-in-out;"><span id="hero-top-text">Unleash Your</span> <br><span style="color: #fe621d;" id="hero-bottom-text">SLdrawing Vibe</span></h1>
            <p class="hero-p" style="font-size: 1.4rem; color: rgba(255,255,255,0.9); margin-bottom: 40px; max-width: 500px; font-weight: 500; line-height: 1.5;">Master digital art with our expert-led tutorials. Join a community of legends and refine your vision today.</p>
            <div class="hero-btn-container">
                <a href="/tutorials.php" class="btn" style="padding: 18px 45px; background: #fe621d; color: #fff; text-decoration: none; font-weight: 800; border-radius: 12px; text-transform: uppercase; box-shadow: 0 15px 30px rgba(254,98,29,0.4); transition: all 0.3s ease; font-size: 1.1rem;">Explore Guides</a>
                <a href="/studio.php" class="btn" style="padding: 18px 45px; border: 2px solid rgba(255,255,255,0.5); color: #fff; text-decoration: none; font-weight: 800; border-radius: 12px; text-transform: uppercase; background: rgba(255,255,255,0.05); backdrop-filter: blur(10px); transition: all 0.3s ease; font-size: 1.1rem;">Open Studio</a>
            </div>
        </div>
        
        <div class="hero-images" style="display: flex; justify-content: flex-end; align-items: center; height: 500px;">
            <div class="card-stack">
                <!-- Card Pack -->
                <div class="card-item card-1 glass" style="padding: 10px; border-radius: 20px; background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.3); backdrop-filter: blur(5px);">
                    <div style="position: absolute; top: 15px; left: 15px; color: #fff; font-weight: 900; font-size: 1.2rem;">A<br><span style="font-size: 0.8rem;">♠</span></div>
                    <img id="card-img-1" class="fade-mask" src="/assets/images/gallery_item_1_1773937144132.png" style="width: 100%; height: 85%; object-fit: cover; border-radius: 15px;">
                    <div style="padding-top: 15px; color: #fff; font-size: 0.7rem; font-weight: 800; text-transform: uppercase; text-align: center;">Art No. 01</div>
                    <div style="position: absolute; bottom: 15px; right: 15px; color: #fff; font-weight: 900; font-size: 1.2rem; transform: rotate(180deg);">A<br><span style="font-size: 0.8rem;">♠</span></div>
                </div>
                <div class="card-item card-2 glass" style="padding: 10px; border-radius: 20px; background: rgba(255,255,255,0.15); border: 1px solid rgba(255,255,255,0.3); backdrop-filter: blur(5px);">
                    <div style="position: absolute; top: 15px; left: 15px; color: #fff; font-weight: 900; font-size: 1.2rem;">K<br><span style="font-size: 0.8rem;">♣</span></div>
                    <img id="card-img-2" class="fade-mask" src="/assets/images/gallery_item_2_1773937165255.png" style="width: 100%; height: 85%; object-fit: cover; border-radius: 15px;">
                    <div style="padding-top: 15px; color: #fff; font-size: 0.7rem; font-weight: 800; text-transform: uppercase; text-align: center;">Art No. 02</div>
                    <div style="position: absolute; bottom: 15px; right: 15px; color: #fff; font-weight: 900; font-size: 1.2rem; transform: rotate(180deg);">K<br><span style="font-size: 0.8rem;">♣</span></div>
                </div>
                <div class="card-item card-3 glass" style="padding: 10px; border-radius: 20px; background: rgba(255,255,255,0.2); border: 1px solid rgba(255,255,255,0.4); backdrop-filter: blur(5px);">
                    <div style="position: absolute; top: 15px; left: 15px; color: #fff; font-weight: 900; font-size: 1.2rem;">Q<br><span style="font-size: 0.8rem; color: #ff3e3e;">♥</span></div>
                    <img id="card-img-3" class="fade-mask" src="/assets/images/shark.png" style="width: 100%; height: 85%; object-fit: cover; border-radius: 15px;">
                    <div style="padding-top: 15px; color: #fff; font-size: 0.7rem; font-weight: 800; text-transform: uppercase; text-align: center;">Art No. 03</div>
                    <div style="position: absolute; bottom: 15px; right: 15px; color: #fff; font-weight: 900; font-size: 1.2rem; transform: rotate(180deg);">Q<br><span style="font-size: 0.8rem; color: #ff3e3e;">♥</span></div>
                </div>
                <div class="card-item card-4 glass" style="padding: 10px; border-radius: 20px; background: #fff; border: 1px solid #fff; box-shadow: 0 20px 40px rgba(0,0,0,0.3);">
                    <div style="position: absolute; top: 15px; left: 15px; color: #333; font-weight: 900; font-size: 1.2rem;">J<br><span style="font-size: 0.8rem; color: #ff3e3e;">♦</span></div>
                    <img id="card-img-4" class="fade-mask" src="/assets/images/tutorial_portrait_1773936991179.png" style="width: 100%; height: 85%; object-fit: cover; border-radius: 15px;">
                    <div style="padding-top: 15px; color: #333; font-size: 0.7rem; font-weight: 800; text-transform: uppercase; text-align: center;">Art No. 04</div>
                    <div style="position: absolute; bottom: 15px; right: 15px; color: #333; font-weight: 900; font-size: 1.2rem; transform: rotate(180deg);">J<br><span style="font-size: 0.8rem; color: #ff3e3e;">♦</span></div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const images = [
            '/assets/images/shark.png',
            '/assets/images/tutorial_portrait_1773936991179.png',
            '/assets/images/gallery_item_1_1773937144132.png',
            '/assets/images/gallery_item_2_1773937165255.png',
            '/assets/images/gallery_item_3_1773937185116.png',
            '/assets/images/tutorial_coloring_1773937010332.png'
        ];
        
        const cardElems = [
            document.getElementById('card-img-1'),
            document.getElementById('card-img-2'),
            document.getElementById('card-img-3'),
            document.getElementById('card-img-4')
        ];
        
        let globalImgIdx = 4; // Start from next available
        let cardToUpdate = 0;

        // One-by-one rotation pattern
        setInterval(() => {
            const card = cardElems[cardToUpdate];
            card.style.opacity = 0;
            
            setTimeout(() => {
                card.src = images[globalImgIdx % images.length];
                card.style.opacity = 1;
                
                globalImgIdx++;
                cardToUpdate = (cardToUpdate + 1) % cardElems.length;
            }, 500);
            
        }, 2500); // Change one card every 2.5 seconds
        
        // Text Rotation
        const heroTexts = [
            { top: "Unleash Your", bottom: "SLdrawing Vibe" },
            { top: "Master Your", bottom: "Digital Art" },
            { top: "Join The", bottom: "Daily Challenge" },
            { top: "Explore Our", bottom: "Smart Studio" },
            { top: "Refine Your", bottom: "True Potential" },
            { top: "Discover New", bottom: "Pro Tutorials" }
        ];
        
        const heroTitle = document.getElementById('hero-title');
        const heroTopText = document.getElementById('hero-top-text');
        const heroBottomText = document.getElementById('hero-bottom-text');
        let textIdx = 0;

        setInterval(() => {
            if(heroTitle && heroTopText && heroBottomText) {
                heroTitle.style.opacity = 0;
                setTimeout(() => {
                    textIdx = (textIdx + 1) % heroTexts.length;
                    heroTopText.innerText = heroTexts[textIdx].top;
                    heroBottomText.innerText = heroTexts[textIdx].bottom;
                    heroTitle.style.opacity = 1;
                }, 1000); // Wait for smooth 1s fade out before changing text
            }
        }, 8000); // Super slow change every 8 seconds
    </script>
</section>
