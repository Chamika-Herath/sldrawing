
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Jomolhari&display=swap" rel="stylesheet">

<style>
    /* --- Main Container --- */
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        /* Desktop: Full viewport height */
        min-height: 100vh;
        
        /* Dark gradient background */
        background: radial-gradient(circle at 40% 50%, #1a0b2e 0%, #020005 100%);
        
        /* FONT UPDATE: Jomolhari */
        font-family: 'Jomolhari', serif;
        color: white;
        overflow: hidden;
        padding: 40px;
        box-sizing: border-box;
    }

    .content-wrapper {
        display: flex;
        flex-wrap: wrap;
        width: 100%;
        max-width: 1200px;
        align-items: center;
        justify-content: center;
        gap: 20px;
    }

    /* --- LEFT SIDE: Steps List --- */
    .steps-section {
        flex: 1;
        min-width: 300px;
        max-width: 500px;
        z-index: 10;
    }

    .title {
        font-size: 36px; /* Adjusted for Jomolhari */
        font-weight: 400;
        margin-bottom: 50px;
        color: #e0e0e0;
        border-bottom: 1px solid #7d3c98;
        display: inline-block;
        padding-bottom: 5px;
        text-shadow: 0 2px 4px rgba(0,0,0,0.5);
    }

    .step-row {
        display: flex;
        align-items: center;
        margin-bottom: 35px;
        opacity: 0;
        animation: slideIn 0.8s ease-out forwards;
    }

    .step-row:nth-child(2) { animation-delay: 0.1s; }
    .step-row:nth-child(3) { animation-delay: 0.2s; }
    .step-row:nth-child(4) { animation-delay: 0.3s; }
    .step-row:nth-child(5) { animation-delay: 0.4s; }

    .step-number {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #9b59b6, #6c3483);
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 22px; /* Adjusted for Jomolhari */
        margin-right: 25px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.4);
        flex-shrink: 0;
        /* padding-top: 5px; */
    }

    .step-desc {
        font-size: 22px; /* Adjusted for Jomolhari */
        letter-spacing: 0.5px;
        color: #f0f0f0;
    }

    /* --- RIGHT SIDE: 3D Visual (PRESERVED STYLES) --- */
    .visual-section {
        flex: 1;
        min-width: 400px;
        height: 500px;
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        perspective: 1200px; 
    }

    /* The Container for the Screens (Rotated Plane) */
    .screen-stack {
        position: relative;
        width: 400px; 
        height: 550px;
        
        /* YOUR ORIGINAL ANGLES KEPT INTACT */
        transform: rotateX(75deg) rotateZ(120deg) rotateY(45deg);
        transform-style: preserve-3d;
        z-index: 1;
    }

    /* Common Screen Style */
    .screen {
        position: absolute;
        top: 0; left: 0;
        width: 100%; height: 100%;
        transition: transform 0.4s ease;
    }

    /* 1. Bottom Screen */
    .screen.layer-1 {
        background: linear-gradient(135deg, #4a235a, #2e153b);
        transform: translateZ(0px);
        opacity: 0.3;
        box-shadow: 30px 30px 50px rgba(0,0,0,0.8);
    }

    /* 2. Middle Screen */
    .screen.layer-2 {
        background: linear-gradient(135deg, #7d3c98, #5b2c6f);
        transform: translateZ(60px);
        opacity: 0.6;
        border: 1px solid rgba(255,255,255,0.1);
    }

    /* 3. Top Screen */
    .screen.layer-3 {
        background: linear-gradient(90deg, rgba(26, 9, 48,0.5) 10%, rgb(152, 89, 206)) 90%;
        transform: translateZ(120px);
        opacity: 0.9;
        box-shadow: inset 0 0 40px rgba(255,255,255,0.2), 
                    0 0 20px rgba(155, 89, 182, 0.4);
        border: 1px solid rgba(255,255,255,0.2);
    }

    /* The Shark Image */
    .shark-popout {
        position: absolute;
        width: 550px; 
        height: auto;
        z-index: 100;
        top: 40%;
        left: 40%;
        transform: translate(-45%, -65%); 
        filter: drop-shadow(20px 30px 25px rgba(0,0,0,0.6));
        pointer-events: none;
        animation: float 5s ease-in-out infinite;
    }

    @keyframes float {
        0%, 100% { transform: translate(-45%, -65%); }
        50% { transform: translate(-45%, -68%); }
    }

    @keyframes slideIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* --- RESPONSIVENESS (Mobile & Tablet) --- */
    
    /* Tablet (max-width: 1100px) */
    @media (max-width: 1100px) {
        .container {
            min-height: auto;
            padding: 80px 40px;
        }

        .title{
            font-size: 34px;
        }

        .content-wrapper {
            /* flex-direction: column;  */
            gap: 20px;
        }

        .steps-section {
            width: 100%;
            max-width: 600px;
            text-align: left;
            margin-bottom: 20px;
        }

        .visual-section {
            width: 100%;
            height: 500px;
            /* Scale down the 3D element to fit tablet width */
            transform: scale(0.85); 
        }
    }

    /* Mobile (max-width: 600px) */
    @media (max-width: 600px) {
        .container {
            min-height: auto;
            padding: 80px 40px;
        }

        .content-wrapper {
            flex-direction: column; 
            gap: 150px;
        }
        .container {
            padding: 60px 20px;
        }

        .title {
            font-size: 24px;
            text-align: center;
            width: 100%;
        }

        .step-row {
            /* Center align items on small screens */
            width: 100%;
        }
        
        .step-number {
            margin-right: 15px;
            width: 45px; height: 45px;
            font-size: 20px;
        }

        .step-desc {
            font-size: 18px;
        }

        /* CRITICAL: We keep your exact 3D styles but SCALE the container.
           This preserves the angles while fitting the screen.
        */
        .visual-section {
            /* min-width: auto;
            width: 100%;
            height: 400px;
            margin-top: -40px; 
            
            
            transform: scale(0.55); 
            transform-origin: center top;  */
            display: none;
        }
    }
</style>

<div class="container">
    <div class="content-wrapper">
        
        <div class="steps-section">
            <h2 class="title"><?php echo $title?></h2>
            
            <div class="step-row">
                <div class="step-number">1</div>
                <div class="step-desc"><?php echo $step_one?></div>
            </div>

            <div class="step-row">
                <div class="step-number">2</div>
                <div class="step-desc"><?php echo $step_two?></div>
            </div>

            <div class="step-row">
                <div class="step-number">3</div>
                <div class="step-desc"><?php echo $step_three?></div>
            </div>

            <div class="step-row">
                <div class="step-number">4</div>
                <div class="step-desc"><?php echo $step_four?></div>
            </div>
        </div>

        <div class="visual-section">
            
            <div class="screen-stack">
                <div class="screen layer-1"></div>
                <div class="screen layer-2"></div>
                <div class="screen layer-3"></div>
            </div>

            <img src="./assets/shark.png" alt="3D Shark" class="shark-popout">
            
        </div>

    </div>
</div>
