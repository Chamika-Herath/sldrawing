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

<section class="gallery-section" style="padding: 120px 0; background: var(--background);">
    <div class="container">
        <h2 class="gallery-title reveal" style="font-size: 3.5rem; margin-bottom: 60px; text-align: center; font-weight: 800; letter-spacing: -2px;">Community <span style="color: var(--primary);">Masterpieces</span></h2>
        
        <div class="gallery-grid">
            <div class="gallery-item reveal" style="transition-delay: 0.1s;">
                <img src="/assets/images/gallery_item_1_1773937144132.png">
            </div>
            <div class="gallery-item reveal" style="transition-delay: 0.2s;">
                <img src="/assets/images/gallery_item_2_1773937165255.png">
            </div>
            <div class="gallery-item reveal" style="transition-delay: 0.3s;">
                <img src="/assets/images/gallery_item_3_1773937185116.png">
            </div>
            <div class="gallery-item reveal" style="transition-delay: 0.4s;">
                <img src="/assets/images/tutorial_portrait_1773936991179.png">
            </div>
            <div class="gallery-item reveal" style="transition-delay: 0.5s;">
                <img src="/assets/images/tutorial_coloring_1773937010332.png">
            </div>
            <div class="gallery-item reveal" style="transition-delay: 0.6s;">
                <img src="/assets/images/shark.png">
            </div>
        </div>
    </div>
</section>

