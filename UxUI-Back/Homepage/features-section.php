<style>
    @media (max-width: 768px) {
        .features-section { padding: 50px 15px !important; }
        .features-title { font-size: 2.2rem !important; margin-bottom: 30px !important; }
        .features-grid { grid-template-columns: 1fr !important; gap: 20px !important; }
        .features-grid .glass { padding: 30px !important; }
        .features-grid h3 { font-size: 1.5rem !important; }
    }
</style>
<section class="section-padding container features-section">
    <h2 class="reveal features-title" style="text-align: center; font-size: 3rem; margin-bottom: 60px;">What We <span style="color: var(--accent)">Offer</span></h2>
    <div class="features-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px;">
        <div class="glass reveal" style="padding: 40px; border-radius: 20px; transition: var(--transition-smooth); cursor: pointer;">
            <div style="font-size: 3rem; margin-bottom: 20px;">🎨</div>
            <h3>Master Tutorials</h3>
            <p style="color: var(--text-dim); margin-top: 10px;">Step-by-step guides on portraits, grid drawing, and professional coloring techniques.</p>
        </div>
        <div class="glass reveal" style="padding: 40px; border-radius: 20px; transition: var(--transition-smooth); cursor: pointer;" onclick="window.location.href='/pages/studio.php'">
            <div style="font-size: 3rem; margin-bottom: 20px;">✨</div>
            <h3>Interactive Studio</h3>
            <p style="color: var(--text-dim); margin-top: 10px;">Modify your images, remove backgrounds, and add artistic templates in real-time.</p>
        </div>
        <div class="glass reveal" style="padding: 40px; border-radius: 20px; transition: var(--transition-smooth); cursor: pointer;">
            <div style="font-size: 3rem; margin-bottom: 20px;">🌐</div>
            <h3>Artist Community</h3>
            <p style="color: var(--text-dim); margin-top: 10px;">Share your masterpieces, get feedback, and join daily art challenges.</p>
        </div>
    </div>
</section>
