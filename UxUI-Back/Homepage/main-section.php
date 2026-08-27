<style>
    .hero-grid { display: grid; grid-template-columns: 1.2fr 1fr; gap: 40px; align-items: center; text-align: left; padding-top: 100px; position: relative; z-index: 5; }
    
    @media (max-width: 992px) {
        .hero-section { min-height: 100vh !important; }
        .hero-grid { grid-template-columns: 1fr; text-align: center; padding-top: 80px; gap: 40px; }
        .hero-h1 { font-size: 3.5rem; margin-bottom: 20px; }
        .hero-btn-container { justify-content: center; flex-direction: column; width: 100%; max-width: 300px; margin: 0 auto; }
        .hero-btn-container a { width: 100%; text-align: center; }
        .hero-images { justify-content: center; margin-top: 20px; transform: scale(0.85); }
    }
    
    @media (max-width: 768px) {
        .hero-h1 { font-size: 2.5rem !important; }
        .hero-images { transform: scale(0.7); }
    }
    
    .hero-overlay {
        position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 0; pointer-events: none;
        background: linear-gradient(90deg, #15110e 0%, rgba(21,17,14,0.85) 45%, rgba(21,17,14,0) 100%),
                    linear-gradient(180deg, rgba(21,17,14,0.4) 0%, rgba(21,17,14,0) 50%, #15110e 100%);
    }

    .hero-h1 {
        font-family: 'Playfair Display', serif;
        font-size: 6rem;
        font-weight: 700;
        font-style: italic;
        text-transform: uppercase;
        color: #fff;
        line-height: 1;
        letter-spacing: 0px;
        margin-bottom: 30px;
        text-shadow: 0 10px 30px rgba(0,0,0,0.8);
    }

    /* Continuous Fan Animation */
    .card-stack { position: relative; width: 340px; height: 450px; z-index: 10; margin: 0 auto; }
    
    @keyframes fan-pattern-1 { 0%, 100% { transform: rotate(0deg) translate(0, 0); } 50% { transform: rotate(-18deg) translate(-60px, -30px); } }
    @keyframes fan-pattern-2 { 0%, 100% { transform: rotate(0deg) translate(0, 0); } 50% { transform: rotate(-6deg) translate(-20px, -10px); } }
    @keyframes fan-pattern-3 { 0%, 100% { transform: rotate(0deg) translate(0, 0); } 50% { transform: rotate(6deg) translate(20px, -10px); } }
    @keyframes fan-pattern-4 { 0%, 100% { transform: rotate(0deg) translate(0, 0); } 50% { transform: rotate(18deg) translate(60px, -30px); } }

    .card-item { 
        position: absolute; width: 100%; height: 100%; 
        transition: opacity 0.5s ease-in-out, transform 1s cubic-bezier(0.34, 1.56, 0.64, 1);
        transform-origin: bottom center;
        box-shadow: 0 20px 40px rgba(0,0,0,0.8);
        will-change: transform;
    }
    .fade-mask { transition: opacity 0.5s ease-in-out; filter: saturate(1.2) contrast(1.1) brightness(1.0); }
    
    .card-1 { animation: fan-pattern-1 8s infinite ease-in-out; z-index: 1; }
    .card-2 { animation: fan-pattern-2 8s infinite ease-in-out; z-index: 2; }
    .card-3 { animation: fan-pattern-3 8s infinite ease-in-out; z-index: 3; }
    .card-4 { animation: fan-pattern-4 8s infinite ease-in-out; z-index: 4; }

</style>

<section class="hero hero-section" style="min-height: 95vh; position: relative; overflow: hidden; display: flex; align-items: center; justify-content: center; background: url('/assets/images/portrait_hero.webp') center 20% / cover no-repeat;">
    <!-- Dark Gradient Overlays mapping flawlessly to the deep vintage background -->
    <div class="hero-overlay"></div>
    
    <div class="container hero-grid">
        <!-- Typography Container -->
        <div class="hero-text-container" style="max-width: 700px; position: relative; z-index: 5;">
            <h1 class="hero-h1">
                MASTER YOUR <br>
                <span style="color: #db7636;">DIGITAL ART</span>
            </h1>
            <p style="font-family: 'Playfair Display', serif; font-size: 1.4rem; color: #a48c77; margin-bottom: 45px; line-height: 1.5; font-style: italic;">
                Unraveling real-world art requirements alongside our unparalleled masterclass infrastructure deeply rooted today.
            </p>
            <div class="hero-btn-container" style="display: flex; gap: 20px;">
                <a href="/studio" class="btn" style="padding: 18px 45px; background: #db7636; color: #000; text-decoration: none; font-weight: 800; border-radius: 8px; text-transform: uppercase; box-shadow: 0 15px 30px rgba(219, 118, 54, 0.3); transition: all 0.3s ease; font-size: 0.9rem; letter-spacing: 1px;">Start Journey Now</a>
                <a href="/tutorials" class="btn" style="padding: 18px 45px; border: 1px solid rgba(255,255,255,0.3); color: #fff; text-decoration: none; font-weight: 600; border-radius: 8px; text-transform: uppercase; background: rgba(0,0,0,0.4); backdrop-filter: blur(10px); transition: all 0.3s ease; font-size: 0.9rem; letter-spacing: 1px;">System Access</a>
            </div>
        </div>
        
        <!-- Abstract Art Display Container -->
        <div class="hero-images" style="display: flex; justify-content: center; align-items: center; height: 500px; position: relative; z-index: 10;">
            <div class="card-stack">
                <!-- Card Pack -->
                <div class="card-item card-1 glass" style="padding: 10px; border-radius: 20px; background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.3); backdrop-filter: blur(10px);">
                    <div style="position: absolute; top: 15px; left: 15px; color: #fff; font-weight: 900; font-size: 1.2rem;">A<br><span style="font-size: 0.8rem;">♠</span></div>
                    <img id="card-img-1" class="fade-mask" src="/assets/images/gallery_item_1_1773937144132.webp" alt="Digital art portrait gallery item 1" style="width: 100%; height: 85%; object-fit: cover; border-radius: 15px;">
                    <div style="padding-top: 15px; color: #fff; font-size: 0.7rem; font-weight: 800; text-transform: uppercase; text-align: center;">Art No. 01</div>
                    <div style="position: absolute; bottom: 15px; right: 15px; color: #fff; font-weight: 900; font-size: 1.2rem; transform: rotate(180deg);">A<br><span style="font-size: 0.8rem;">♠</span></div>
                </div>
                <div class="card-item card-2 glass" style="padding: 10px; border-radius: 20px; background: rgba(255,255,255,0.15); border: 1px solid rgba(255,255,255,0.3); backdrop-filter: blur(10px);">
                    <div style="position: absolute; top: 15px; left: 15px; color: #fff; font-weight: 900; font-size: 1.2rem;">K<br><span style="font-size: 0.8rem;">♣</span></div>
                    <img id="card-img-2" class="fade-mask" src="/assets/images/gallery_item_2_1773937165255.webp" alt="Digital art portrait gallery item 2" style="width: 100%; height: 85%; object-fit: cover; border-radius: 15px;">
                    <div style="padding-top: 15px; color: #fff; font-size: 0.7rem; font-weight: 800; text-transform: uppercase; text-align: center;">Art No. 02</div>
                    <div style="position: absolute; bottom: 15px; right: 15px; color: #fff; font-weight: 900; font-size: 1.2rem; transform: rotate(180deg);">K<br><span style="font-size: 0.8rem;">♣</span></div>
                </div>
                <div class="card-item card-3 glass" style="padding: 10px; border-radius: 20px; background: rgba(255,255,255,0.2); border: 1px solid rgba(255,255,255,0.4); backdrop-filter: blur(10px);">
                    <div style="position: absolute; top: 15px; left: 15px; color: #fff; font-weight: 900; font-size: 1.2rem;">Q<br><span style="font-size: 0.8rem; color: #db7636;">♥</span></div>
                    <img id="card-img-3" class="fade-mask" src="/assets/images/shark.webp" alt="SLdrawing shark mascot logo" style="width: 100%; height: 85%; object-fit: cover; border-radius: 15px;">
                    <div style="padding-top: 15px; color: #fff; font-size: 0.7rem; font-weight: 800; text-transform: uppercase; text-align: center;">Art No. 03</div>
                    <div style="position: absolute; bottom: 15px; right: 15px; color: #fff; font-weight: 900; font-size: 1.2rem; transform: rotate(180deg);">Q<br><span style="font-size: 0.8rem; color: #db7636;">♥</span></div>
                </div>
                <div class="card-item card-4 glass" style="padding: 10px; border-radius: 20px; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.2); backdrop-filter: blur(10px);">
                    <div style="position: absolute; top: 15px; left: 15px; color: #fff; font-weight: 900; font-size: 1.2rem;">J<br><span style="font-size: 0.8rem; color: #db7636;">♦</span></div>
                    <img id="card-img-4" class="fade-mask" src="/assets/images/tutorial_portrait_1773936991179.webp" alt="Step by step portrait drawing tutorial preview" style="width: 100%; height: 85%; object-fit: cover; border-radius: 15px;">
                    <div style="padding-top: 15px; color: #fff; font-size: 0.7rem; font-weight: 800; text-transform: uppercase; text-align: center;">Art No. 04</div>
                    <div style="position: absolute; bottom: 15px; right: 15px; color: #fff; font-weight: 900; font-size: 1.2rem; transform: rotate(180deg);">J<br><span style="font-size: 0.8rem; color: #db7636;">♦</span></div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        const cardImages = [
            '/assets/images/shark.webp',
            '/assets/images/tutorial_portrait_1773936991179.webp',
            '/assets/images/gallery_item_1_1773937144132.webp',
            '/assets/images/gallery_item_2_1773937165255.webp',
            '/assets/images/gallery_item_3_1773937185116.webp',
            '/assets/images/tutorial_coloring_1773937010332.webp'
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
        if(cardElems[0]) {
            setInterval(() => {
                const card = cardElems[cardToUpdate];
                card.style.opacity = 0;
                
                setTimeout(() => {
                    card.src = cardImages[globalImgIdx % cardImages.length];
                    card.style.opacity = 1;
                    
                    globalImgIdx++;
                    cardToUpdate = (cardToUpdate + 1) % cardElems.length;
                }, 500);
                
            }, 2500);
        }
    </script>
</section>
