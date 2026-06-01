<style>
    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 30px;
    }
    .gallery-item {
        position: relative;
        border-radius: 20px;
        overflow: hidden;
        transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        cursor: zoom-in;
    }
    .gallery-item:hover {
        transform: scale(1.03) translateY(-5px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.2);
    }
    .gallery-item img {
        width: 100%;
        display: block;
        transition: 0.5s ease;
    }
    .gallery-item:hover img {
        transform: scale(1.1);
        filter: saturate(1.2);
    }
    @media (max-width: 768px) {
        .gallery-grid { grid-template-columns: repeat(2, 1fr); gap: 15px; }
        .gallery-title { font-size: 2.5rem !important; }
    }
</style>

<section class="gallery-section" style="padding: 120px 0; background: url('/assets/images/gallery_background_new.png') center / cover fixed no-repeat; position: relative;">
    <!-- Overlay for text readability -->
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(11, 11, 15, 0.7); z-index: 0; pointer-events: none;"></div>
    <div class="container" style="position: relative; z-index: 1;">
        <h2 class="gallery-title reveal" style="font-size: 3.5rem; margin-bottom: 60px; text-align: center; font-weight: 800; letter-spacing: -2px;">Community <span style="color: var(--primary);">Masterpieces</span></h2>
        
        <div class="gallery-grid">
            <div class="gallery-item reveal" style="transition-delay: 0.1s;">
                <img src="/assets/images/booking_card_1.png">
            </div>
            <div class="gallery-item reveal" style="transition-delay: 0.2s;">
                <img src="/assets/images/booking_card_2.png">
            </div>
            <div class="gallery-item reveal" style="transition-delay: 0.3s;">
                <img src="/assets/images/booking_card_3.png">
            </div>
            <div class="gallery-item reveal" style="transition-delay: 0.4s;">
                <img src="/assets/images/feature_card_1.png">
            </div>
            <div class="gallery-item reveal" style="transition-delay: 0.5s;">
                <img src="/assets/images/feature_card_2.png">
            </div>
            <div class="gallery-item reveal" style="transition-delay: 0.6s;">
                <img src="/assets/images/feature_card_3.png">
            </div>
        </div>
    </div>
</section>

