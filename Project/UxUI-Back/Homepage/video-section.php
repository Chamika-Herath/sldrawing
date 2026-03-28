<style>
    /* Your original styles preserved exactly */
    .watch-container {
        position: relative;
        width: 100%;
        max-width: 100%;
        overflow: hidden;
        line-height: 0;
        background-color: #000;
    }

    .video-screen {
        width: 100%;
        height: auto;
        display: block;
        object-fit: contain;
    }

    .family-overlay {
        position: absolute;
        bottom: -100px;
        left: 0;
        width: 100%;
        height: auto;
        z-index: 10;
        pointer-events: none;
    }

    /* SIMPLE RESPONSIVE ADJUSTMENTS ONLY */
    
    /* Mobile: Adjust bottom position */
    @media (max-width: 768px) {
        .family-overlay {
            bottom: -50px;
        }
    }
    
    /* Small phones: Further adjustment */
    @media (max-width: 480px) {
        .family-overlay {
            bottom: -30px;
        }
    }
    
    /* Large screens: Scale family image slightly */
    @media (min-width: 1400px) {
        .family-overlay {
            transform: scale(1.05);
            transform-origin: bottom center;
        }
    }
</style>
<div class="watch-container">
    
    <video class="video-screen" autoplay loop muted playsinline>
        <source src="./assets/vid.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <img src="./assets/family2.png" alt="Family watching video" class="family-overlay">

</div>