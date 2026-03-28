<!-- Gallery Page Component -->
<main class="container section-padding">
    <div style="display: flex; justify-content: space-between; align-items: flex-end; margin-bottom: 60px;">
        <div>
            <h1>Community <span style="color: var(--accent)">Gallery</span></h1>
            <p style="color: var(--text-dim);">A space for artists to inspire and be inspired.</p>
        </div>
        <button class="btn btn-primary" id="open-upload">Upload Your Art</button>
    </div>

    <!-- Masonry Grid -->
    <div style="columns: 3 300px; gap: 30px;">
        <div class="glass reveal gallery-item" style="break-inside: avoid; margin-bottom: 30px; border-radius: 20px; overflow: hidden; cursor: pointer;">
            <img src="/assets/images/gallery_1.png" style="width: 100%; display: block;">
            <div style="padding: 20px;">
                <h3 style="font-size: 1.1rem;">Cyberpunk Muse</h3>
                <p style="font-size: 0.85rem; color: var(--text-dim); margin-top: 5px;">by @NeonDreamer</p>
            </div>
        </div>
        <!-- Add more gallery items here ... -->
    </div>
</main>
