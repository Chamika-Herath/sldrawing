<link href="https://fonts.googleapis.com/css2?family=Jomolhari&display=swap" rel="stylesheet">
<style>
    /* Container for the demo presentation */
    .card-container-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #000; /* Main background matches the image */
        padding: 50px;
        min-height: 400px;
        font-family: "Georgia", "Times New Roman", serif; /* Serif font for elegance */
    }

    /* Layout for the row of cards */
    .cards-row {
        display: flex;
        gap: 45px;
        flex-wrap: wrap;
        justify-content: center;
    }

    /* Base Card Style */
    .cinematic-card {
        width: 260px;
        height: 300px;
        border-radius: 24px;
        padding: 30px 20px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        position: relative;
        box-sizing: border-box;
        
        /* Default border style (used by plain cards) */
        border: 3px solid #C398E7;
        background-color: transparent;
        color: #f0f0f0;
        transition: transform 0.3s ease;
    }

    /* Typography */
    .card-text {
        font-family: 'Jomolhari', serif;
        font-size: 1.1rem;
        line-height: 1.6;
        letter-spacing: 0.5px;
        margin-bottom: 30px;
        font-weight: 400;
        color: #eaddf0; /* Slight off-white/purple tint */
    }

    /* Stars Section */
    .stars {
        color: #9d4edd; /* Bright purple star color */
        font-size: 1.5rem;
        letter-spacing: 4px;
        display: flex;
        gap: 2px;
    }

    /* Variant: Glow Effect (For Card 1 & 3) */
    .card-glow {
        /* The border is slightly softer/glowing */
        border-color: rgba(180, 160, 220, 0.9);
        
        /* Inner purple vignette */
        box-shadow: inset 0 0 20px 20px rgba(209, 134, 255, 0.2), 
                    0 0 15px rgba(120, 60, 180, 0.3); /* Slight outer glow */
        
        /* Subtle background tint */
        background: radial-gradient(circle at center, rgba(209, 134, 255,0.2), rgba(209, 134, 255, 0.2));
    }

    /* Optional hover effect */
    .cinematic-card:hover {
        transform: translateY(-5px);
        cursor: pointer;
    }
    

    /* Small Tablets (768px and below) - 2 cards per row */
    @media (max-width: 768px) {
        .card-container-wrapper {
            padding: 40px 30px;
        }
        
        .cards-row {
            display: grid;
            grid-template-columns: repeat(2, 1fr); /* 2 columns */
            gap: 20px;
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
        }
        
        .cinematic-card {
            width: 100%; /* Full width of grid cell */
            height: 320px;
        }
    }

    /* Mobile Devices (480px and below) */
    @media (max-width: 480px) {
        .card-container-wrapper {
            padding: 30px 15px;
        }
        
        .cards-row {
            gap: 15px;
            max-width: 100%;
        }
        
        .cinematic-card {
            height: 300px;
        }
    }

</style>


<div class="card-container-wrapper">
    <div class="cards-row">
        
        <div class="cinematic-card card-glow">
            <p class="card-text">
                <?php echo $card_one?>
            </p>
            <div class="stars">
                <span>★</span>
                <span>★</span>
                <span>★</span>
                <span>★</span>
                <span>★</span>
            </div>
        </div>

        <div class="cinematic-card">
            <p class="card-text">
                <?php echo $card_two?>
            </p>
            <div class="stars">
                <span>★</span>
                <span>★</span>
                <span>★</span>
                <span>★</span>
                <span>★</span>
            </div>
        </div>

        <div class="cinematic-card card-glow">
            <p class="card-text">
               <?php echo $card_three?>
            </p>
            <div class="stars">
                <span>★</span>
                <span>★</span>
                <span>★</span>
                <span>★</span>
                <span>★</span>
            </div>
        </div>

        <div class="cinematic-card">
            <p class="card-text">
                <?php echo $card_four?>
            </p>
            <div class="stars">
                <span>★</span>
                <span>★</span>
                <span>★</span>
                <span>★</span>
                <span>★</span>
            </div>
        </div>

    </div>
</div>
