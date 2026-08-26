<style>
    .gallery-section {
        padding: 120px 0;
        position: relative;
        z-index: 5;
    }
    
    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 50px;
        padding-top: 40px;
    }

    @media (max-width: 992px) {
        .gallery-grid { grid-template-columns: repeat(2, 1fr); gap: 30px; }
        .gallery-title { font-size: 3rem !important; }
    }
    @media (max-width: 600px) {
        .gallery-grid { grid-template-columns: 1fr; }
    }

    .gallery-item {
        position: relative;
        /* The thick wooden frame */
        background: #1c110b; 
        padding: 15px; 
        border: 2px solid #3c2415;
        border-radius: 2px;
        box-shadow: 20px 20px 50px rgba(0,0,0,0.9), inset 0 0 15px rgba(0,0,0,1);
        cursor: pointer;
        transition: 0.6s cubic-bezier(0.2, 0.8, 0.2, 1);
        aspect-ratio: 1 / 1;
        overflow: hidden;
    }
    
    /* Inner dark matte shadow simulating depth */
    .gallery-item::before {
        content: '';
        position: absolute;
        top: 15px; left: 15px; right: 15px; bottom: 15px;
        box-shadow: inset 0 0 35px rgba(0,0,0,0.9);
        border: 1px solid rgba(0,0,0,0.5);
        pointer-events: none;
        z-index: 5;
        transition: 0.6s;
    }

    .gallery-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        filter: sepia(0.3) grayscale(20%) contrast(1.15) brightness(0.85);
        transition: 0.8s cubic-bezier(0.2, 0.8, 0.2, 1);
        transform: scale(1.05); /* Account for inner shadow */
    }

    .gallery-item:hover {
        transform: scale(1.02) translateY(-10px);
        box-shadow: 25px 30px 60px rgba(0,0,0,1), inset 0 0 15px rgba(0,0,0,1);
        border-color: #55341f;
    }
    .gallery-item:hover::before { box-shadow: inset 0 0 15px rgba(0,0,0,0.5); }
    .gallery-item:hover img {
        transform: scale(1.1);
        filter: sepia(0) grayscale(0%) contrast(1.1) brightness(1);
    }
    
    /* Hanging wire concept - faint line above frame */
    .gallery-item::after {
        content: ''; position: absolute; top: -50px; left: 50%;
        width: 1px; height: 50px; background: rgba(255,255,255,0.05);
        pointer-events: none;
    }
</style>

<section class="gallery-section">
    <!-- Abstract Ambient Spotlight -->
    <div style="position: absolute; top: 0; left: 50%; transform: translateX(-50%); width: 800px; height: 600px; background: radial-gradient(circle, rgba(255,255,255,0.03) 0%, transparent 60%); filter: blur(50px); pointer-events: none; z-index: 1;"></div>

    <div class="container" style="position: relative; z-index: 5;">
        <!-- Artistic Studio Typography Header -->
        <div style="text-align: center; margin-bottom: 20px;">
            <div style="font-family: 'Playfair Display', serif; font-style: italic; font-size: 2rem; color: rgba(219, 118, 54, 0.3); border: 1px solid rgba(255,255,255,0.1); padding: 5px 30px; display: inline-block; border-radius: 50px; letter-spacing: 2px;">Studio</div>
        </div>
        <h2 class="gallery-title" style="font-family: 'Inter', sans-serif; font-size: 4rem; margin-bottom: 20px; text-align: center; font-weight: 900; letter-spacing: -2px; color: #fff;">Community <span style="color: #db7636;">Masterpieces</span></h2>
        
        <div class="gallery-grid">
            <div class="gallery-item reveal" style="transition-delay: 0.1s;">
                <img src="/assets/images/booking_card_1.png" alt="Community artwork 1">
            </div>
            <div class="gallery-item reveal" style="transition-delay: 0.2s;">
                <img src="/assets/images/booking_card_2.png" alt="Community artwork 2">
            </div>
            <div class="gallery-item reveal" style="transition-delay: 0.3s;">
                <img src="/assets/images/booking_card_3.png" alt="Community artwork 3">
            </div>
            <div class="gallery-item reveal" style="transition-delay: 0.4s;">
                <img src="/assets/images/feature_card_1.png" alt="Community artwork 4">
            </div>
            <div class="gallery-item reveal" style="transition-delay: 0.5s;">
                <img src="/assets/images/feature_card_2.png" alt="Community artwork 5">
            </div>
            <div class="gallery-item reveal" style="transition-delay: 0.6s;">
                <img src="/assets/images/feature_card_3.png" alt="Community artwork 6">
            </div>
        </div>
    </div>
</section>

