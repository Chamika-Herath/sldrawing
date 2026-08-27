<style>
    .gallery-showcase-section {
        padding: 90px 0 120px;
        position: relative;
        z-index: 5;
        background: #15110e;
        overflow: hidden;
    }

    /* Main Framed Container */
    .showcase-frame {
        background: #0b0806;
        border: 1px solid rgba(219, 118, 54, 0.2);
        border-radius: 24px;
        padding: 50px 40px 45px;
        box-shadow: 0 30px 80px rgba(0, 0, 0, 0.8), inset 0 0 60px rgba(0,0,0,0.5);
        position: relative;
    }

    /* Inner Frame Title Header */
    .showcase-inner-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 50px;
        position: relative;
        z-index: 5;
    }
    .showcase-note {
        font-family: 'Inter', sans-serif;
        font-size: 0.85rem;
        color: #8c7664;
        max-width: 240px;
        line-height: 1.5;
    }
    .showcase-main-heading {
        font-family: 'Inter', sans-serif;
        font-size: 4.2rem;
        font-weight: 900;
        letter-spacing: 6px;
        color: #ffffff;
        text-transform: uppercase;
        margin: 0;
        line-height: 1;
        text-shadow: 0 10px 30px rgba(0,0,0,0.8);
    }
    .showcase-main-heading span {
        color: #db7636;
    }

    /* 3D Curved Cards Track Stage */
    .showcase-stage {
        height: 380px;
        position: relative;
        perspective: 1200px;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-bottom: 40px;
    }

    .showcase-track {
        width: 100%;
        height: 100%;
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        transform-style: preserve-3d;
    }

    /* Card Item Styling */
    .showcase-card {
        position: absolute;
        width: 210px;
        height: 330px;
        border-radius: 20px;
        overflow: hidden;
        background: #17110d;
        border: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.8);
        transition: transform 0.6s cubic-bezier(0.25, 1, 0.5, 1), 
                    opacity 0.6s ease, 
                    filter 0.6s ease, 
                    border-color 0.4s ease, 
                    box-shadow 0.4s ease;
        cursor: pointer;
        user-select: none;
    }

    .showcase-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        transition: transform 0.6s ease;
    }

    .showcase-card-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(0,0,0,0.1) 40%, rgba(10,7,5,0.95) 100%);
        pointer-events: none;
    }

    /* Floating Pill Badge on active card */
    .showcase-badge {
        position: absolute;
        top: 15px;
        left: 15px;
        background: rgba(255, 255, 255, 0.25);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        color: #fff;
        font-family: 'Inter', sans-serif;
        font-size: 0.7rem;
        font-weight: 700;
        padding: 4px 12px;
        border-radius: 20px;
        border: 1px solid rgba(255,255,255,0.3);
        letter-spacing: 1px;
        text-transform: uppercase;
        opacity: 0;
        transform: translateY(-5px);
        transition: 0.4s ease;
    }

    .showcase-card-title {
        position: absolute;
        bottom: 20px;
        left: 20px;
        right: 20px;
        font-family: 'Inter', sans-serif;
        font-size: 0.95rem;
        font-weight: 800;
        color: #ffffff;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        margin: 0;
        line-height: 1.3;
        text-shadow: 0 2px 10px rgba(0,0,0,0.9);
        transition: color 0.3s ease;
    }

    /* Card Positions (Center, Left 1/2, Right 1/2) */
    .showcase-card[data-pos="0"] {
        transform: translateX(0) translateZ(100px) rotateY(0deg) scale(1.08);
        z-index: 10;
        opacity: 1;
        filter: brightness(1.05) contrast(1.05);
        border-color: rgba(219, 118, 54, 0.6);
        box-shadow: 0 25px 60px rgba(0,0,0,0.9), 0 0 35px rgba(219, 118, 54, 0.25);
    }
    .showcase-card[data-pos="0"] .showcase-badge {
        opacity: 1;
        transform: translateY(0);
    }
    .showcase-card[data-pos="0"] .showcase-card-title {
        color: #e5d5c5;
    }

    .showcase-card[data-pos="-1"] {
        transform: translateX(-180px) translateZ(0px) rotateY(22deg) scale(0.92);
        z-index: 8;
        opacity: 0.85;
        filter: brightness(0.75);
    }

    .showcase-card[data-pos="1"] {
        transform: translateX(180px) translateZ(0px) rotateY(-22deg) scale(0.92);
        z-index: 8;
        opacity: 0.85;
        filter: brightness(0.75);
    }

    .showcase-card[data-pos="-2"] {
        transform: translateX(-340px) translateZ(-100px) rotateY(38deg) scale(0.78);
        z-index: 6;
        opacity: 0.55;
        filter: brightness(0.55);
    }

    .showcase-card[data-pos="2"] {
        transform: translateX(340px) translateZ(-100px) rotateY(-38deg) scale(0.78);
        z-index: 6;
        opacity: 0.55;
        filter: brightness(0.55);
    }

    /* Hidden Cards outside visible range */
    .showcase-card[data-pos="hidden-left"] {
        transform: translateX(-480px) translateZ(-200px) rotateY(45deg) scale(0.6);
        z-index: 1;
        opacity: 0;
        pointer-events: none;
    }
    .showcase-card[data-pos="hidden-right"] {
        transform: translateX(480px) translateZ(-200px) rotateY(-45deg) scale(0.6);
        z-index: 1;
        opacity: 0;
        pointer-events: none;
    }

    /* Hover effect on cards */
    .showcase-card:hover {
        border-color: rgba(219, 118, 54, 0.8);
    }

    /* Bottom Control Bar */
    .showcase-controls {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 16px;
        position: relative;
        z-index: 10;
    }

    .showcase-nav-btn {
        width: 44px;
        height: 44px;
        border-radius: 50%;
        background: #17120e;
        border: 1px solid rgba(255, 255, 255, 0.15);
        color: #e5d5c5;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 1.1rem;
    }
    .showcase-nav-btn:hover {
        background: #db7636;
        color: #ffffff;
        border-color: #db7636;
        box-shadow: 0 0 20px rgba(219, 118, 54, 0.4);
        transform: scale(1.08);
    }

    .showcase-counter-pill {
        background: #17120e;
        border: 1px solid rgba(219, 118, 54, 0.3);
        border-radius: 30px;
        padding: 10px 24px;
        color: #e5d5c5;
        font-family: 'Inter', sans-serif;
        font-size: 0.9rem;
        font-weight: 800;
        letter-spacing: 2px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        min-width: 100px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.5);
    }
    .showcase-counter-pill .active-num {
        color: #db7636;
    }
    .showcase-counter-pill .total-num {
        color: rgba(229, 213, 197, 0.6);
    }

    /* Media Responsive Layouts */
    @media (max-width: 1200px) {
        .showcase-card[data-pos="-2"] { transform: translateX(-270px) translateZ(-100px) rotateY(35deg) scale(0.75); }
        .showcase-card[data-pos="2"]  { transform: translateX(270px) translateZ(-100px) rotateY(-35deg) scale(0.75); }
        .showcase-card[data-pos="-1"] { transform: translateX(-140px) translateZ(0px) rotateY(20deg) scale(0.88); }
        .showcase-card[data-pos="1"]  { transform: translateX(140px) translateZ(0px) rotateY(-20deg) scale(0.88); }
    }

    @media (max-width: 992px) {
        .showcase-main-heading { font-size: 3rem; letter-spacing: 4px; }
        .showcase-frame { padding: 40px 25px 35px; }
        .showcase-card { width: 180px; height: 280px; }
        .showcase-card[data-pos="-2"] { opacity: 0.2; transform: translateX(-210px) rotateY(40deg) scale(0.65); }
        .showcase-card[data-pos="2"]  { opacity: 0.2; transform: translateX(210px) rotateY(-40deg) scale(0.65); }
        .showcase-card[data-pos="-1"] { transform: translateX(-110px) rotateY(20deg) scale(0.82); }
        .showcase-card[data-pos="1"]  { transform: translateX(110px) rotateY(-20deg) scale(0.82); }
    }

    @media (max-width: 768px) {
        .gallery-showcase-section { padding: 60px 15px; }
        .showcase-inner-header { flex-direction: column-reverse; align-items: flex-start; gap: 15px; margin-bottom: 30px; }
        .showcase-main-heading { font-size: 2.2rem; letter-spacing: 2px; }
        .showcase-note { max-width: 100%; }
        .showcase-stage { height: 320px; }
        .showcase-card { width: 160px; height: 250px; }
        .showcase-card[data-pos="-2"], .showcase-card[data-pos="2"] { opacity: 0; pointer-events: none; }
        .showcase-card[data-pos="-1"] { transform: translateX(-80px) rotateY(25deg) scale(0.8); }
        .showcase-card[data-pos="1"]  { transform: translateX(80px) rotateY(-25deg) scale(0.8); }
    }
</style>

<section class="gallery-showcase-section">
    <div class="container">

        <!-- Main Framed Container -->
        <div class="showcase-frame">

            <!-- Inner Header with 'COMMUNITY ARTS' -->
            <div class="showcase-inner-header">
                <div class="showcase-note">
                    Curated showcase of exceptional artwork created by our passionate community members.
                </div>
                <h2 class="showcase-main-heading">COMMUNITY <span>ARTS</span></h2>
            </div>

            <!-- 5-Card Curved Stage -->
            <div class="showcase-stage" id="showcaseStage">
                <div class="showcase-track" id="showcaseTrack">

                    <div class="showcase-card" data-index="0">
                        <img src="/assets/images/booking_card_1.png" alt="The Silent Echo">
                        <div class="showcase-card-overlay"></div>
                        <div class="showcase-badge">Community Choice</div>
                        <h4 class="showcase-card-title">The Silent Echo</h4>
                    </div>

                    <div class="showcase-card" data-index="1">
                        <img src="/assets/images/booking_card_2.png" alt="Neon Nights">
                        <div class="showcase-card-overlay"></div>
                        <div class="showcase-badge">Top Voted</div>
                        <h4 class="showcase-card-title">Neon Nights</h4>
                    </div>

                    <div class="showcase-card" data-index="2">
                        <img src="/assets/images/booking_card_3.png" alt="Golden Hour">
                        <div class="showcase-card-overlay"></div>
                        <div class="showcase-badge">Oil Canvas</div>
                        <h4 class="showcase-card-title">Golden Hour</h4>
                    </div>

                    <div class="showcase-card" data-index="3">
                        <img src="/assets/images/feature_card_1.png" alt="Monochrome Focus">
                        <div class="showcase-card-overlay"></div>
                        <div class="showcase-badge">Pencil Sketch</div>
                        <h4 class="showcase-card-title">Monochrome Focus</h4>
                    </div>

                    <div class="showcase-card" data-index="4">
                        <img src="/assets/images/feature_card_2.png" alt="Abstract Dimension">
                        <div class="showcase-card-overlay"></div>
                        <div class="showcase-badge">3D Render</div>
                        <h4 class="showcase-card-title">Abstract Dimension</h4>
                    </div>

                    <div class="showcase-card" data-index="5">
                        <img src="/assets/images/feature_card_3.png" alt="Crimson Palette">
                        <div class="showcase-card-overlay"></div>
                        <div class="showcase-badge">Digital Painting</div>
                        <h4 class="showcase-card-title">Crimson Palette</h4>
                    </div>

                    <div class="showcase-card" data-index="6">
                        <img src="/assets/images/gallery_item_1_1773937144132.webp" alt="Portrait Study">
                        <div class="showcase-card-overlay"></div>
                        <div class="showcase-badge">Portrait Art</div>
                        <h4 class="showcase-card-title">Portrait Study</h4>
                    </div>

                    <div class="showcase-card" data-index="7">
                        <img src="/assets/images/gallery_item_2_1773937165255.webp" alt="Canvas Dreams">
                        <div class="showcase-card-overlay"></div>
                        <div class="showcase-badge">Canvas Art</div>
                        <h4 class="showcase-card-title">Canvas Dreams</h4>
                    </div>

                </div>
            </div>

            <!-- Bottom Navigation Control Pill -->
            <div class="showcase-controls">
                <button class="showcase-nav-btn" id="showcasePrev" aria-label="Previous Work">❮</button>
                <div class="showcase-counter-pill">
                    <span class="active-num" id="showcaseActiveIndex">01</span>
                    <span class="total-num">/ <span id="showcaseTotalCount">08</span></span>
                </div>
                <button class="showcase-nav-btn" id="showcaseNext" aria-label="Next Work">❯</button>
            </div>

        </div>

    </div>
</section>

<script>
(function() {
    const track = document.getElementById('showcaseTrack');
    const cards = Array.from(track.querySelectorAll('.showcase-card'));
    const prevBtn = document.getElementById('showcasePrev');
    const nextBtn = document.getElementById('showcaseNext');
    const activeIndexEl = document.getElementById('showcaseActiveIndex');
    const totalCountEl = document.getElementById('showcaseTotalCount');

    if (!cards.length) return;

    let currentIndex = 0;
    const totalCards = cards.length;

    totalCountEl.textContent = String(totalCards).padStart(2, '0');

    function updateLayout() {
        cards.forEach((card, i) => {
            // Calculate distance relative to current active index in circular wrapping
            let diff = i - currentIndex;
            
            // Handle circular wrapping for shortest path
            if (diff > totalCards / 2) diff -= totalCards;
            if (diff < -totalCards / 2) diff += totalCards;

            if (diff === 0) {
                card.setAttribute('data-pos', '0');
            } else if (diff === -1) {
                card.setAttribute('data-pos', '-1');
            } else if (diff === 1) {
                card.setAttribute('data-pos', '1');
            } else if (diff === -2) {
                card.setAttribute('data-pos', '-2');
            } else if (diff === 2) {
                card.setAttribute('data-pos', '2');
            } else if (diff < -2) {
                card.setAttribute('data-pos', 'hidden-left');
            } else {
                card.setAttribute('data-pos', 'hidden-right');
            }
        });

        // Update active index counter (1-based)
        activeIndexEl.textContent = String(currentIndex + 1).padStart(2, '0');
    }

    function goToNext() {
        currentIndex = (currentIndex + 1) % totalCards;
        updateLayout();
    }

    function goToPrev() {
        currentIndex = (currentIndex - 1 + totalCards) % totalCards;
        updateLayout();
    }

    // Auto-advance animation
    let autoTimer = null;
    const AUTO_INTERVAL_MS = 3200;

    function startAutoPlay() {
        stopAutoPlay();
        autoTimer = setInterval(goToNext, AUTO_INTERVAL_MS);
    }

    function stopAutoPlay() {
        if (autoTimer) {
            clearInterval(autoTimer);
            autoTimer = null;
        }
    }

    function resetAutoPlay() {
        startAutoPlay();
    }

    // Pause on mouse hover over showcase frame
    const frame = document.querySelector('.showcase-frame');
    if (frame) {
        frame.addEventListener('mouseenter', stopAutoPlay);
        frame.addEventListener('mouseleave', startAutoPlay);
    }

    // Attach click events on nav buttons
    nextBtn.addEventListener('click', () => {
        goToNext();
        resetAutoPlay();
    });
    prevBtn.addEventListener('click', () => {
        goToPrev();
        resetAutoPlay();
    });

    // Direct click on side cards to make them active
    cards.forEach((card, i) => {
        card.addEventListener('click', () => {
            if (i !== currentIndex) {
                currentIndex = i;
                updateLayout();
                resetAutoPlay();
            }
        });
    });

    // Keyboard Arrow navigation
    document.addEventListener('keydown', (e) => {
        const rect = track.getBoundingClientRect();
        const inView = (rect.top >= -rect.height && rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) + rect.height);
        if (inView) {
            if (e.key === 'ArrowRight') { goToNext(); resetAutoPlay(); }
            if (e.key === 'ArrowLeft') { goToPrev(); resetAutoPlay(); }
        }
    });

    // Interactive Live Real-Time 3D Dragging & Snapping
    let isDragging = false;
    let startX = 0;
    let dragShift = 0;
    let hasDragged = false;

    function onDragStart(clientX) {
        isDragging = true;
        startX = clientX;
        dragShift = 0;
        hasDragged = false;
        stopAutoPlay();
        track.style.cursor = 'grabbing';
    }

    function onDragMove(clientX) {
        if (!isDragging) return;
        const deltaX = clientX - startX;
        if (Math.abs(deltaX) > 5) hasDragged = true;

        // 180px drag = 1 card position shift
        dragShift = deltaX / 180;

        cards.forEach((card, i) => {
            let diff = i - currentIndex;
            if (diff > totalCards / 2) diff -= totalCards;
            if (diff < -totalCards / 2) diff += totalCards;

            const effDiff = diff - dragShift;

            // Remove CSS transition for instant 60fps tracking
            card.style.transition = 'none';

            const posX = effDiff * 180;
            const rotY = -effDiff * 22;
            const posZ = 100 - Math.abs(effDiff) * 100;
            const scale = Math.max(0.65, 1.08 - Math.abs(effDiff) * 0.16);
            const opacity = Math.max(0, 1 - Math.abs(effDiff) * 0.35);
            const bright = Math.max(0.4, 1.05 - Math.abs(effDiff) * 0.3);

            card.style.transform = `translateX(${posX}px) translateZ(${posZ}px) rotateY(${rotY}deg) scale(${scale})`;
            card.style.opacity = opacity;
            card.style.filter = `brightness(${bright})`;
            card.style.zIndex = Math.round(10 - Math.abs(effDiff) * 2);
        });
    }

    function onDragEnd() {
        if (!isDragging) return;
        isDragging = false;
        track.style.cursor = 'grab';

        // Re-enable stylesheet transitions for smooth snap
        cards.forEach(card => {
            card.style.transition = '';
            card.style.transform = '';
            card.style.opacity = '';
            card.style.filter = '';
            card.style.zIndex = '';
        });

        if (Math.abs(dragShift) > 0.25) {
            const steps = Math.round(dragShift);
            const dir = steps !== 0 ? steps : (dragShift > 0 ? 1 : -1);
            currentIndex = (currentIndex - dir + totalCards) % totalCards;
        }

        updateLayout();
        startAutoPlay();
    }

    // Mouse Event Listeners for Live Drag
    track.addEventListener('mousedown', (e) => {
        onDragStart(e.clientX);
    });

    window.addEventListener('mousemove', (e) => {
        if (isDragging) onDragMove(e.clientX);
    });

    window.addEventListener('mouseup', () => {
        if (isDragging) onDragEnd();
    });

    // Touch Event Listeners for Live Drag
    track.addEventListener('touchstart', (e) => {
        onDragStart(e.touches[0].clientX);
    }, { passive: true });

    track.addEventListener('touchmove', (e) => {
        if (isDragging) onDragMove(e.touches[0].clientX);
    }, { passive: true });

    track.addEventListener('touchend', () => {
        if (isDragging) onDragEnd();
    });

    // Direct click on side cards (only if not dragged)
    cards.forEach((card, i) => {
        card.addEventListener('click', (e) => {
            if (hasDragged) {
                e.preventDefault();
                return;
            }
            if (i !== currentIndex) {
                currentIndex = i;
                updateLayout();
                resetAutoPlay();
            }
        });
    });

    // Initial Layout Setup & Start Auto Play
    updateLayout();
    startAutoPlay();
})();
</script>
