
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jomolhari&family=Jomhuria&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    /* --- Main Wrapper --- */
    .hero-wrapper {
        position: relative;
        width: 100%;
        /* Desktop: Full screen experience */
        min-height: 100vh;
        background-color: #090014;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        color: white;
        box-sizing: border-box;
        padding: 20px;
    }
    
    .hero-wrapper * {
        box-sizing: border-box;
    }

    /* --- Background Layer: The 16 Gradient Bars --- */
    .bars-container {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        align-items: flex-end;
        z-index: 1; 
        pointer-events: none;
    }

    .bar {
        flex: 1;
        background: linear-gradient(to top, rgba(152, 89, 206,1) 0%, rgba(26, 9, 48,0.1) 90%);
        margin: 0;
    }

    /* --- Bar Heights --- */
    /* LEFT SIDE */
    .bar:nth-child(1) { height: 72%; } .bar:nth-child(2) { height: 62%; }
    .bar:nth-child(3) { height: 52%; } .bar:nth-child(4) { height: 42%; }
    .bar:nth-child(5) { height: 32%; } .bar:nth-child(6) { height: 22%; }
    .bar:nth-child(7) { height: 12%; } .bar:nth-child(8) { height: 2%; }
    /* RIGHT SIDE */
    .bar:nth-child(9)  { height: 2%; }  .bar:nth-child(10) { height: 12%; }
    .bar:nth-child(11) { height: 22%; } .bar:nth-child(12) { height: 32%; }
    .bar:nth-child(13) { height: 42%; } .bar:nth-child(14) { height: 52%; }
    .bar:nth-child(15) { height: 62%; } .bar:nth-child(16) { height: 72%; }

    /* --- Bottom Glow --- */
    .bottom-glow {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 5%;
        background: linear-gradient(to top, transparent, rgba(152, 89, 206,0.8));
        z-index: 2;
        pointer-events: none;
        filter: blur(15px);
    }

    /* --- Background Image --- */
    .bg-image-container {
        position: absolute;
        top: 35%;
        left: 55%;
        transform: translate(-50%, -50%);
        width: 50vw; 
        height: auto;
        max-width: 400px;
        z-index: 0;
    }

    .bg-triangle-img {
        width: 100%;
        height: auto;
        display: block;
        opacity: 0.8; /* Slightly reduced opacity for better text contrast */
    }

    /* --- Content Layer --- */
    .hero-content {
        position: relative;
        z-index: 10;
        text-align: center;
        max-width: 800px;
        width: 100%;
    }

    /* FONT UPDATE: Jomhuria */
    .hero-title {
        font-family: 'Jomhuria', cursive;
        /* Jomhuria is a tall font, so we boost the size significantly */
        font-size: clamp(3rem, 10vw, 8rem); 
        letter-spacing: 2px;
        font-weight: 400;
        margin: 0;
        text-shadow: 0 4px 15px rgba(0,0,0,0.8);
        line-height: 0.8; /* Condensed line height for this font */
    }

    /* FONT UPDATE: Jomhuria */
    .status-badge {
        font-family: 'Jomhuria', cursive;
        font-size: clamp(2rem, 6vw, 3.5rem);
        margin: 5px 0 20px 0;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 12px;
        text-transform: uppercase;
        text-shadow: 0 2px 5px rgba(0,0,0,0.8);
        line-height: 1;
    }

    .green-dot {
        width: 12px;
        height: 12px;
        background-color: #4ade80;
        border-radius: 50%;
        box-shadow: 0 0 8px #4ade80;
        margin-top: -6px; /* Visual alignment for the font */
    }

    /* FONT UPDATE: Jomolhari */
    .hero-desc {
        font-family: 'Jomolhari', serif;
        font-size: clamp(1rem, 3vw, 1.4rem);
        color: #e0d0e5;
        margin-bottom: 40px;
        line-height: 1.6;
        padding: 0 10px;
    }

    /* FONT UPDATE: Jomolhari */
    .cta-button {
        background: linear-gradient(180deg, #9859CE 25%, #1A0930 75%);
        color: white;
        border: 1px solid rgba(255,255,255,0.5);
        padding: 12px 40px;
        border-radius: 30px;
        font-family: 'Jomolhari', serif;
        font-size: 1.1rem;
        cursor: pointer;
        box-shadow: 0 4px 20px rgba(100, 30, 130, 0.6);
        margin-bottom: 30px;
        display: inline-block;
        text-decoration: none;
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .cta-button:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 25px rgba(120, 40, 150, 0.8);
    }

    /* Arrow Icon Container */
    .arrow-icon {
        width: 40px;
        height: 40px;
        border: 1px solid rgba(255,255,255,0.4);
        border-radius: 50%;
        margin: 0 auto;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 18px;
        color: #ddd;
        animation: bounce 2s infinite ease-in-out;
    }

    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(10px); }
    }

    /* --- RESPONSIVE ADJUSTMENTS --- */
    /* Tablets and Mobile Devices */
    @media (max-width: 1024px) {
        .hero-wrapper {
            /* Remove fixed viewport height to prevent layout issues on small screens */
            min-height: auto;
            /* Add generous padding to maintain visual breathing room */
            padding-top: 100px;
            padding-bottom: 100px;
        }
        
        .bg-image-container {
            width: 65vw;
            /* top: 40%; */
            left: 60%;
            opacity: 0.6; /* Fade background more on mobile so text is legible */
        }

        .bar { 
            opacity: 0.8; 
        }
        
        /* Adjust curve slightly for mobile aspect ratio */
        .bar:nth-child(8), .bar:nth-child(9) { height: 5%; } 
    }
</style>

<div class="hero-wrapper">
    
    <div class="bars-container">
        <div class="bar"></div><div class="bar"></div><div class="bar"></div><div class="bar"></div>
        <div class="bar"></div><div class="bar"></div><div class="bar"></div><div class="bar"></div>
        <div class="bar"></div><div class="bar"></div><div class="bar"></div><div class="bar"></div>
        <div class="bar"></div><div class="bar"></div><div class="bar"></div><div class="bar"></div>
    </div>

    <div class="bottom-glow"></div>

    <div class="bg-image-container">
        <img src="./assets/Polygon.png" alt="Background Play Icon" class="bg-triangle-img">
    </div>

    <div class="hero-content">
        <h1 class="hero-title">Book Your Tickets Now</h1>
        
        <div class="status-badge">
            <span class="green-dot"></span> ONLINE
        </div>

        <p class="hero-desc">
            <?= nl2br(htmlspecialchars($main_dis)) ?>
        </p>

        <a href="#booking-steps" class="cta-button">Learn More</a>
        
        <div class="arrow-icon">
            <i class="fa-solid fa-arrow-down"></i>
        </div>
    </div>
</div>
