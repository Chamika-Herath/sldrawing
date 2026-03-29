<style>
    .feature-card {
        padding: 60px 40px;
        border-radius: 40px;
        transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        position: relative;
        overflow: hidden;
        border: 1px solid var(--glass-border);
        background: #fff;
    }
    .feature-card:hover {
        transform: translateY(-20px);
        box-shadow: 0 40px 80px rgba(0,0,0,0.1);
    }
    .feature-card.highlight {
        background: var(--secondary);
        border-color: var(--primary);
    }
    .feature-card .icon-box {
        width: 80px;
        height: 80px;
        background: var(--secondary);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
        margin-bottom: 30px;
        transition: 0.5s;
    }
    .feature-card:hover .icon-box {
        transform: rotate(10deg) scale(1.1);
        background: var(--primary);
        color: #fff;
    }
    @media (max-width: 768px) {
        .card-grid { grid-template-columns: 1fr !important; }
        .feature-card { padding: 40px 20px; }
    }
</style>

<section class="card-section" style="padding: 120px 0; background: var(--background);">
    <div class="container card-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 40px;">
        <div class="feature-card reveal" style="background: var(--surface); border-color: rgba(255,255,255,0.05);">
            <div class="icon-box" style="background: rgba(255,255,255,0.05); color: var(--text);">🖌️</div>
            <h2 style="font-size: 2.2rem; margin-bottom: 15px; font-weight: 800; color: var(--text);">Smart Studio</h2>
            <p style="color: var(--text-dim); line-height: 1.7; font-size: 1.1rem;">Our interactive AI-powered studio allows you to isolate subjects, refine colors, and apply professional textures in seconds.</p>
            <a href="/studio.php" style="display: inline-block; margin-top: 30px; color: var(--primary); text-decoration: none; font-weight: 800; text-transform: uppercase; font-size: 0.9rem; letter-spacing: 1px;">Launch Editor &rarr;</a>
        </div>
        
        <div class="feature-card highlight reveal" style="background: var(--surface); border-color: var(--primary);">
            <div class="icon-box" style="background: var(--primary); color: #fff;">🎯</div>
            <h2 style="font-size: 2.2rem; margin-bottom: 15px; font-weight: 800; color: var(--text);">Daily Challenges</h2>
            <p style="color: var(--text-dim); line-height: 1.7; font-size: 1.1rem;">Step out of your comfort zone with our rotating daily prompts. Join thousands of artists in the 'Daily Spark' community event.</p>
            <a href="/challenges.php" style="display: inline-block; margin-top: 30px; color: var(--primary); text-decoration: none; font-weight: 800; text-transform: uppercase; font-size: 0.9rem; letter-spacing: 1px;">Join Challenge &rarr;</a>
        </div>
        
        <div class="feature-card reveal" style="background: var(--surface); border-color: rgba(255,255,255,0.05);">
            <div class="icon-box" style="background: rgba(255,255,255,0.05); color: var(--text);">📚</div>
            <h2 style="font-size: 2.2rem; margin-bottom: 15px; font-weight: 800; color: var(--text);">Pro Tutorials</h2>
            <p style="color: var(--text-dim); line-height: 1.7; font-size: 1.1rem;">Over 500+ hours of video content covering everything from foundational sketches to hyper-realistic coloring techniques.</p>
            <a href="/tutorials.php" style="display: inline-block; margin-top: 30px; color: var(--primary); text-decoration: none; font-weight: 800; text-transform: uppercase; font-size: 0.9rem; letter-spacing: 1px;">Start Learning &rarr;</a>
        </div>
    </div>
</section>

