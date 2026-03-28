

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jomolhari&display=swap" rel="stylesheet">

<style>
    /* --- Main Container --- */
    .cinema-hall-wrapper {
        position: relative;
        width: 100%;
        /* Desktop: Full Height */
        min-height: 100vh;
        
        background: radial-gradient(circle at 50% 0%, #9b59b6 0%, #4a235a 40%, #1a0b2e 100%);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        overflow: hidden;
        box-sizing: border-box;
        padding-bottom: 150px; /* Space for chairs */
    }

    .cinema-hall-wrapper * { box-sizing: border-box; }

    /* --- Projector Light --- */
    .projector-light {
        position: absolute;
        top: 0; left: 50%;
        transform: translateX(-50%);
        width: 80%; height: 60%;
        background: radial-gradient(ellipse at top, rgba(255,255,255,0.1) 0%, transparent 70%);
        pointer-events: none;
        z-index: 1;
    }

    /* --- The Movie Screen --- */
    .movie-screen {
        position: relative;
        z-index: 10;
        width: 85%;
        max-width: 900px;
        /* FIXED HEIGHT: Essential for masking */
        height: 400px; 
        
        background-color: #05000a; 
        border-radius: 20px;
        
        /* Glow and Shadow */
        box-shadow: 
            0 0 0 1px rgba(255,255,255,0.05),
            0 20px 60px rgba(0,0,0,0.8),
            0 0 100px rgba(155, 89, 182, 0.2);
            
        padding: 0 60px; 
        margin-top: -30px;
        overflow: hidden; /* MASKS the content */
    }

    /* --- Text Animation Container --- */
    .scrolling-wrapper {
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
        /* Transition is handled by JS */
        transform: translateY(0);
    }

    /* Individual Text Slides */
    .text-slide {
        width: 100%;
        /* Height matches container exactly */
        height: 100%; 
        flex-shrink: 0; /* Prevent shrinking */
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .screen-content {
        color: #e0e0e0;
        font-family: 'Jomolhari', serif;
        font-size: clamp(1.2rem, 2.5vw, 1.6rem);
        line-height: 1.8;
        letter-spacing: 0.5px;
        text-align: center;
        text-shadow: 0 2px 4px rgba(0,0,0,0.8);
        margin: 0;
    }

    /* --- Chairs Image --- */
    .chairs-container {
        position: absolute;
        bottom: 0; left: 0;
        width: 100%;
        z-index: 20;
        line-height: 0;
    }

    .chairs-image {
        width: 100%;
        height: auto;
        display: block;
        filter: brightness(0.8); 
        max-height: 35vh; 
        object-fit: cover;
        object-position: top;
    }

    /* --- MOBILE & TABLET STYLES --- */
    @media (max-width: 1024px) {
        .cinema-hall-wrapper {
            /* Compact height, no 100vh stretch */
            min-height: auto; 
            height: auto;
            padding-top: 80px; 
            padding-bottom: 140px; 
        }

        .movie-screen {
            width: 92%;
            height: 280px; /* Smaller window for mobile */
            padding: 0 20px;
            margin-top: 0;
        }

        .screen-content {
            font-size: 1.1rem;
            line-height: 1.5;
        }

        .chairs-image {
            max-height: 160px;
        }
    }
</style>


<div class="cinema-hall-wrapper">
    
    <div class="projector-light"></div>

    <div class="movie-screen">
        <div class="scrolling-wrapper" id="slider">
            
            <div class="text-slide">
                <p class="screen-content">
                    <?php echo $para_one?>
                </p>
            </div>

            <div class="text-slide">
                <p class="screen-content">
                    <?php echo $para_two?>
                </p>
            </div>

            <div class="text-slide">
                <p class="screen-content">
                    <?php echo $para_one_clone?>
                </p>
            </div>

        </div>
    </div>

    <div class="chairs-container">
        <img src="./assets/movie-hall.png" alt="Cinema Chairs" class="chairs-image">
    </div>

</div>

<script>
    const slider = document.getElementById('slider');
    let currentIndex = 0;
    const totalSlides = 3; // 1, 2, and Clone
    
    // Duration to READ the text (8 seconds)
    const readTime = 8000; 
    // Duration of the SCROLL animation (2 second)
    const transitionTime = 2000; 

    function nextSlide() {
        currentIndex++;
        
        // Enable smooth transition
        slider.style.transition = `transform ${transitionTime}ms ease-in-out`;
        // Move to next slide
        slider.style.transform = `translateY(-${currentIndex * 100}%)`;

        // Check if we hit the CLONE (last slide)
        if (currentIndex === totalSlides - 1) {
            // Wait for the transition to finish (1s), then snap back
            setTimeout(() => {
                // Disable transition so the jump is instant/invisible
                slider.style.transition = 'none';
                currentIndex = 0;
                slider.style.transform = `translateY(0)`;
            }, transitionTime);
        }
    }

    // Start the loop
    setInterval(nextSlide, readTime);

</script>
