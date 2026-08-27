<style>
    .card-section {
        padding: 120px 0;
        position: relative;
        z-index: 5;
    }

    .smart-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 40px;
        position: relative;
        z-index: 10;
        margin-top: 60px;
    }

    .glass-feature-card {
        padding: 25px;
        border-radius: 20px;
        background: rgba(26, 17, 11, 0.92);
        border: 1px solid rgba(255,255,255,0.08);
        border-top: 1px solid rgba(255,255,255,0.15);
        box-shadow: 0 20px 40px rgba(0,0,0,0.6);
        transition: transform 0.4s cubic-bezier(0.2, 0.8, 0.2, 1), background 0.4s ease, border-color 0.4s ease;
        position: relative;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        will-change: transform;
    }

    .glass-feature-card:hover {
        transform: translateY(-20px);
        background: rgba(45, 27, 17, 0.6);
        border-top: 1px solid rgba(219, 118, 54, 0.4);
        box-shadow: 0 40px 80px rgba(0,0,0,1), 0 0 30px rgba(219, 118, 54, 0.1);
    }
    
    .glass-feature-img {
        width: 100%;
        height: 200px;
        border-radius: 12px;
        object-fit: cover;
        margin-bottom: 25px;
        border: 1px solid rgba(0,0,0,0.5);
        box-shadow: 0 15px 30px rgba(0,0,0,0.5);
        filter: sepia(0.2) contrast(1.1);
    }

    .glass-feature-card h2 { font-family: 'Inter', sans-serif; font-size: 1.8rem; margin-bottom: 15px; font-weight: 800; color: #fff; }
    .glass-feature-card p { font-family: 'Inter', sans-serif; color: #a48c77; line-height: 1.6; font-size: 1rem; margin-bottom: 20px; flex-grow: 1; }
    
    .glass-action-btn {
        display: block;
        text-align: center;
        padding: 15px;
        background: rgba(0,0,0,0.3);
        border-radius: 10px;
        color: #db7636;
        text-transform: uppercase;
        font-family: 'Inter', sans-serif;
        font-weight: 800;
        letter-spacing: 2px;
        font-size: 0.85rem;
        text-decoration: none;
        transition: 0.3s;
        border: 1px solid rgba(255,255,255,0.02);
    }
    .glass-feature-card:hover .glass-action-btn {
        background: #db7636;
        color: #fff;
    }

    @media (max-width: 992px) {
        .smart-grid { grid-template-columns: 1fr; gap: 30px; }
        .glass-feature-card { padding: 30px 20px; }
    }
    
    @media (max-width: 768px) {
        .card-section { padding: 60px 15px; }
        .card-section h2.reveal { font-size: 2.8rem !important; }
        .card-section p.reveal { font-size: 1.1rem !important; }
    }
</style>

<section class="card-section">
    <!-- Abstract Ambient Background Noise representing a physical dark room natively -->
    <div style="position: absolute; top: 20%; right: 10%; width: 500px; height: 500px; background: radial-gradient(circle, rgba(219,118,54,0.05) 0%, transparent 60%); pointer-events: none; z-index: 1;"></div>
    
    <div class="container" style="position: relative; z-index: 5;">
        <!-- Header Topology -->
        <div style="text-align: center;">
            <h2 class="reveal" style="font-family: 'Inter', sans-serif; font-size: 4rem; margin-bottom: 10px; font-weight: 900; letter-spacing: -2px; color: #fff;">Smart <span style="color: #db7636;">Studio</span></h2>
            <p class="reveal" style="font-family: 'Playfair Display', serif; color: #a48c77; font-size: 1.25rem; font-style: italic; max-width: 600px; margin: 0 auto;">High-end easy professional into your true ena art studio.</p>
        </div>

        <div class="smart-grid">
            <div class="glass-feature-card reveal" style="transition-delay: 0.1s;">
                <img src="/assets/images/feature_card_1.png" class="glass-feature-img" alt="Smart Studio AI Tools">
                <h2>Smart Studio</h2>
                <p>Isolate subjects iteratively and refine colors mapping our highly accurate structural algorithms simultaneously into existence.</p>
                <a href="/studio" class="glass-action-btn">SMART STUDIO</a>
            </div>
            
            <div class="glass-feature-card reveal" style="transition-delay: 0.2s; transform: scale(1.02); z-index: 5; background: rgba(55, 30, 20, 0.4); border-color: rgba(219, 118, 54, 0.2);">
                <img src="/assets/images/feature_card_2.png" class="glass-feature-img" alt="Daily Challenges System">
                <h2>Daily Challenges</h2>
                <p>Routine iterative updates mapping external configurations alongside beautiful digital canvas layouts flawlessly managed.</p>
                <a href="/challenges" class="glass-action-btn" style="background: #db7636; color: #fff;">DAILY CHALLENGE</a>
            </div>
            
            <div class="glass-feature-card reveal" style="transition-delay: 0.3s;">
                <img src="/assets/images/feature_card_3.png" class="glass-feature-img" alt="Pro Tutorials Guide">
                <h2>Pro Tutorials</h2>
                <p>Versatile heavy infrastructure deployed natively downloading massive parameters mapping global features routinely.</p>
                <a href="/tutorials" class="glass-action-btn">PRO TUTORIALS</a>
            </div>
        </div>
    </div>
</section>

