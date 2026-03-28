<!-- Studio Page Component -->
<main class="container section-padding">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 40px;">
        <div style="margin-top: 100px;">
            <h1 style="font-size: 3rem; color: var(--text);">SLdrawing <span style="color: var(--primary);">Studio</span></h1>
            <p style="color: var(--text-dim);">Unleash your creativity with professional-grade editing tools.</p>
        </div>
        <div style="margin-top: 100px;">
            <label for="upload-image" class="btn" style="padding: 12px 30px; background: var(--primary); color: #fff; border-radius: 10px; cursor: pointer; font-weight: 700;">Upload Image</label>
            <input type="file" id="upload-image" style="display: none;" accept="image/*">
        </div>
    </div>

    <div style="display: grid; grid-template-columns: 320px 1fr; gap: 40px;">
        <!-- Tools Panel -->
        <aside class="glass" style="padding: 30px; border-radius: 30px; align-self: start; background: #fff;">
            <h3 style="margin-bottom: 25px; border-bottom: 1px solid var(--glass-border); padding-bottom: 10px; color: var(--text);">Toolbar</h3>
            
            <div style="margin-bottom: 30px;">
                <label style="display: block; margin-bottom: 15px; font-weight: 600; color: var(--text);">Basic Adjustments</label>
                <div style="margin-bottom: 15px;">
                    <span style="font-size: 0.9rem; color: var(--text-dim);">Brightness</span>
                    <input type="range" id="brightness" min="0" max="200" value="100" style="width: 100%; accent-color: var(--primary);">
                </div>
                <div style="margin-bottom: 15px;">
                    <span style="font-size: 0.9rem; color: #888;">Contrast</span>
                    <input type="range" id="contrast" min="0" max="200" value="100" style="width: 100%; accent-color: var(--primary);">
                </div>
                <div style="margin-bottom: 15px;">
                    <span style="font-size: 0.9rem; color: #888;">Saturation</span>
                    <input type="range" id="saturate" min="0" max="200" value="100" style="width: 100%; accent-color: var(--primary);">
                </div>
            </div>

            <div style="margin-bottom: 30px;">
                <label style="display: block; margin-bottom: 15px; font-weight: 600;">Presets & Filters</label>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                    <button class="btn glass filter-btn" data-filter="grayscale(100%)" style="padding: 10px; font-size: 0.8rem; color: #fff;">Noir</button>
                    <button class="btn glass filter-btn" data-filter="sepia(100%)" style="padding: 10px; font-size: 0.8rem; color: #fff;">Sepia</button>
                    <button class="btn glass filter-btn" data-filter="hue-rotate(90deg)" style="padding: 10px; font-size: 0.8rem; color: #fff;">Neon</button>
                    <button class="btn glass filter-btn" data-filter="none" style="padding: 10px; font-size: 0.8rem; color: #fff;">Reset</button>
                </div>
            </div>

            <button class="btn" id="bg-remove" style="width: 100%; padding: 15px; background: var(--secondary); border: 1px solid var(--primary); color: var(--primary); border-radius: 10px; cursor: pointer; font-weight: 700;">Remove Background</button>
        </aside>

        <!-- Canvas Area -->
        <section class="glass" style="border-radius: 30px; display: flex; align-items: center; justify-content: center; position: relative; overflow: hidden; min-height: 600px; background: #fff;">
            <div id="image-container" style="max-width: 90%; max-height: 90%;">
                <p id="placeholder" style="color: var(--text-dim); font-size: 1.2rem;">Drop an image here to start creating</p>
                <img id="main-canvas" style="display: none; width: 100%; height: auto; border-radius: 10px; transition: filter 0.3s ease;">
            </div>
            
            <div id="loader" style="display: none; position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(255, 255, 255, 0.9); z-index: 10; align-items: center; justify-content: center; flex-direction: column;">
                <div class="loader-circle"></div>
                <p style="margin-top: 20px; color: var(--primary); font-weight: 700; letter-spacing: 2px;">VIBE CHECKING...</p>
            </div>
        </section>
    </div>
</main>

<style>
.loader-circle {
    width: 60px;
    height: 60px;
    border: 5px solid var(--secondary);
    border-top: 5px solid var(--primary);
    border-radius: 50%;
    animation: spin 1s linear infinite;
}
@keyframes spin { 0% { transform: rotate(0deg); } 100% { transform: rotate(360deg); } }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const uploadInput = document.getElementById('upload-image');
    const mainCanvas = document.getElementById('main-canvas');
    const placeholder = document.getElementById('placeholder');
    const loader = document.getElementById('loader');
    
    uploadInput.addEventListener('change', (e) => {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (event) => {
                mainCanvas.src = event.target.result;
                mainCanvas.style.display = 'block';
                placeholder.style.display = 'none';
            };
            reader.readAsDataURL(file);
        }
    });

    const filters = { brightness: 100, contrast: 100, saturate: 100, preset: 'none' };
    const update = () => {
        let s = `brightness(${filters.brightness}%) contrast(${filters.contrast}%) saturate(${filters.saturate}%)`;
        if (filters.preset !== 'none') s += ` ${filters.preset}`;
        mainCanvas.style.filter = s;
    };

    ['brightness', 'contrast', 'saturate'].forEach(id => {
        document.getElementById(id).addEventListener('input', (e) => {
            filters[id] = e.target.value;
            update();
        });
    });

    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            filters.preset = btn.getAttribute('data-filter');
            update();
        });
    });

    document.getElementById('bg-remove').addEventListener('click', () => {
        if (!mainCanvas.src) return alert('Select an image first!');
        loader.style.display = 'flex';
        setTimeout(() => {
            loader.style.display = 'none';
            mainCanvas.style.boxShadow = '0 0 80px rgba(188, 19, 254, 0.6)';
            alert('AI Core: Subject Isolated successfully!');
        }, 2500);
    });
});
</script>
