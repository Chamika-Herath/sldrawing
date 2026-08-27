<style>
    .booking-guide {
        padding: 120px 0;
        position: relative;
        background: transparent; /* Inherits the deep coffee layout from root body natively */
        z-index: 5;
    }

    .museum-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 60px;
        margin-top: 60px;
    }

    @media (max-width: 768px) {
        .booking-guide { padding: 60px 15px; }
        .museum-grid { grid-template-columns: 1fr; gap: 40px; }
        .booking-guide h2 { font-size: 2.8rem !important; }
        .booking-guide p { font-size: 1.1rem !important; }
    }
    
    .museum-display {
        position: relative;
        text-align: center;
        transition: 0.4s ease;
        cursor: pointer;
    }
    .museum-display:hover { transform: translateY(-15px); }

    .museum-case {
        position: relative;
        padding: 30px;
        background: rgba(255,255,255,0.02);
        border: 2px solid rgba(255,255,255,0.1);
        border-bottom: none;
        border-radius: 8px 8px 0 0;
        box-shadow: inset 0 20px 50px rgba(255,255,255,0.02),
                    inset 0 0 20px rgba(254,98,29,0.05),
                    0 -10px 40px rgba(0,0,0,0.5);
        height: 250px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
    }

    .museum-case::before {
        content: ''; position: absolute;
        top: 0; left: 0; width: 100%; height: 5px;
        background: linear-gradient(90deg, rgba(255,255,255,0) 0%, rgba(255,255,255,0.2) 50%, rgba(255,255,255,0) 100%);
    }

    .museum-base {
        height: 50px;
        background: linear-gradient(to bottom, #2d1c12, #150d08);
        border-radius: 0 0 10px 10px;
        border-top: 4px solid #4a2e1d;
        box-shadow: 0 30px 50px rgba(0,0,0,1), inset 0 10px 20px rgba(0,0,0,0.5);
        position: relative;
        margin-bottom: 30px;
    }
    .museum-base::after {
        content: ''; position: absolute;
        top: 8px; left: 10%; width: 80%; height: 2px;
        background: rgba(255,255,255,0.05);
    }
    
    .museum-img {
        max-width: 80%;
        max-height: 80%;
        object-fit: contain;
        filter: drop-shadow(0 20px 20px rgba(0,0,0,0.8));
        transition: 0.5s ease;
    }
    .museum-display:hover .museum-img { transform: scale(1.05); filter: drop-shadow(0 25px 25px rgba(0,0,0,0.9)) saturate(1.2); }

    .museum-text h3 { font-family: 'Playfair Display', serif; font-size: 2rem; color: #fff; margin-bottom: 15px; font-weight: 700; }
    .museum-text p { font-family: 'Inter', sans-serif; color: #a48c77; line-height: 1.6; font-size: 1rem; }
</style>

<section class="booking-guide">
    <div class="container" style="text-align: center; position: relative; z-index: 1;">
        <h2 style="font-family: 'Inter', sans-serif; font-size: 4rem; margin-bottom: 20px; font-weight: 900; letter-spacing: -2px; color: #fff;">Join the <span style="color: #db7636;">Elite</span></h2>
        <p style="font-family: 'Playfair Display', serif; color: #a48c77; font-size: 1.25rem; font-style: italic; max-width: 600px; margin: 0 auto;">Every process now there to an awakened artist painter media.</p>
        
        <div class="museum-grid">
            <div class="museum-display">
                <div class="museum-case">
                    <img src="/assets/images/booking_card_1.png" class="museum-img" alt="Register">
                </div>
                <div class="museum-base"></div>
                <div class="museum-text">
                    <h3>1. Register</h3>
                    <p>Open a beautifully crafted world map artifact or essence map.</p>
                </div>
            </div>
            
            <div class="museum-display" style="transform: scale(1.05); z-index: 10;">
                <div class="museum-case" style="border-color: rgba(219, 118, 54, 0.4); box-shadow: inset 0 20px 50px rgba(255,255,255,0.02), inset 0 0 40px rgba(219, 118, 54, 0.15), 0 -10px 40px rgba(0,0,0,0.5);">
                    <img src="/assets/images/booking_card_2.png" class="museum-img" alt="Learn">
                </div>
                <div class="museum-base" style="border-top-color: #db7636;"></div>
                <div class="museum-text">
                    <h3>2. Learn</h3>
                    <p>Ancient gold embossed leather storyboard the art map.</p>
                </div>
            </div>
            
            <div class="museum-display">
                <div class="museum-case">
                    <img src="/assets/images/booking_card_3.png" class="museum-img" alt="Create" style="border-radius: 8px;">
                </div>
                <div class="museum-base"></div>
                <div class="museum-text">
                    <h3>3. Create</h3>
                    <p>Execute digital portraits securely on your own system in.</p>
                </div>
            </div>
        </div>
    </div>
</section>


