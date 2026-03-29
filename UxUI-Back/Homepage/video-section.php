<style>
    .video-section-vibrant {
        background: #0b0b0f;
        padding: 120px 0;
        position: relative;
        overflow: hidden;
        border-bottom: 1px solid rgba(255,255,255,0.05);
    }
    
    .video-section-vibrant::before {
        content: '';
        position: absolute;
        top: -10%;
        right: -5%;
        width: 600px;
        height: 600px;
        background: radial-gradient(circle, rgba(254,98,29,0.12) 0%, transparent 70%);
        filter: blur(100px);
        z-index: 0;
    }

    .video-section-vibrant::after {
        content: '';
        position: absolute;
        bottom: -10%;
        left: -5%;
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, rgba(99,102,241,0.08) 0%, transparent 70%);
        filter: blur(100px);
        z-index: 0;
    }


    .video-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 70px;
        align-items: center;
        position: relative;
        z-index: 1;
    }

    @media (max-width: 992px) {
        .video-grid {
            grid-template-columns: 1fr;
            text-align: center;
            gap: 50px;
        }
        .video-section-vibrant {
            padding: 80px 0;
        }
        .video-text-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    }

    .video-wrapper {
        position: relative;
        padding-bottom: 56.25%; /* 16:9 Aspect Ratio */
        height: 0;
        overflow: hidden;
        border-radius: 24px;
        background: #000;
        box-shadow: 0 40px 80px rgba(0,0,0,0.5);
        border: 4px solid rgba(255,255,255,0.1);
        transition: opacity 0.5s ease;
    }

    .video-wrapper iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: none;
    }

    .feature-list {
        list-style: none;
        padding: 0;
        margin-top: 30px;
        transition: opacity 0.5s ease, transform 0.5s ease;
    }

    .feature-item {
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        color: rgba(255,255,255,0.9);
        font-weight: 600;
        font-size: 1.1rem;
    }

    .feature-icon {
        background: rgba(255,255,255,0.15);
        color: #fff;
        width: 30px;
        height: 30px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 15px;
        font-size: 0.9rem;
        backdrop-filter: blur(5px);
        border: 1px solid rgba(255,255,255,0.2);
    }

    /* Slider Controls */
    .video-container-rel {
        position: relative;
    }
    
    .nav-btn {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 50px;
        height: 50px;
        background: rgba(255,255,255,0.2);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255,255,255,0.3);
        border-radius: 50%;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        z-index: 10;
        transition: all 0.3s ease;
        font-size: 1.5rem;
        box-shadow: 0 10px 20px rgba(0,0,0,0.2);
    }
    
    .nav-btn:hover {
        background: rgba(255,255,255,0.4);
        transform: translateY(-50%) scale(1.1);
    }
    
    .nav-btn.prev {
        left: -80px;
    }
    
    .nav-btn.next {
        right: -80px;
    }
    
    @media (max-width: 1200px) {
        .nav-btn.prev { left: -10px; }
        .nav-btn.next { right: -10px; }
    }

    .content-fade {
        transition: opacity 0.5s ease, transform 0.5s ease;
    }

    .fade-out {
        opacity: 0;
        transform: translateY(10px);
    }
</style>

<section class="video-section-vibrant">
    <div class="container video-grid">
        <div class="video-text-container content-fade reveal" id="video-content-area">
            <h2 id="video-title" style="font-size: 3.8rem; line-height: 1.1; margin-bottom: 25px; color: #fff; font-weight: 900; letter-spacing: -2px;">
                See the <span id="video-title-span" style="background: linear-gradient(to right, #f59e0b, #fff); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Portrait Sketching</span>
            </h2>
            <p id="video-description" style="color: rgba(255,255,255,0.8); line-height: 1.7; font-size: 1.25rem; margin-bottom: 35px; max-width: 500px; font-weight: 500;">
                Master the art of realistic portrait sketching with our step-by-step masterclass by industry experts.
            </p>
            <div class="feature-list" id="feature-list">
                <div class="feature-item"><div class="feature-icon" style="background: rgba(245,158,11,0.3); border-color: #f59e0b;">✓</div>Proportional alignment</div>
                <div class="feature-item"><div class="feature-icon" style="background: rgba(245,158,11,0.3); border-color: #f59e0b;">✓</div>Advanced shading</div>
                <div class="feature-item"><div class="feature-icon" style="background: rgba(245,158,11,0.3); border-color: #f59e0b;">✓</div>Facial mechanics</div>
            </div>
        </div>
        
        <div class="video-container-rel reveal" style="transition-delay: 0.2s;">
            <div class="nav-btn prev" onclick="changeVideo(-1)">‹</div>
            <div class="nav-btn next" onclick="changeVideo(1)">›</div>
            
            <div class="glass-container" style="padding: 15px; border-radius: 35px; background: rgba(255,255,255,0.05); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.1);">
                <div class="video-wrapper" id="video-wrapper">
                    <iframe 
                        id="youtube-iframe"
                        src="https://www.youtube.com/embed/GH3_NUbRpCY?rel=0&modestbranding=1" 
                        title="Digital Drawing Process" 
                        frameborder="0" 
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                        allowfullscreen>
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</section>


<script>
    const videoData = [
        {
            id: "GH3_NUbRpCY",
            title: "Portrait Sketching",
            desc: "Master the art of realistic portrait sketching with our step-by-step masterclass by industry experts.",
            features: ["Proportional alignment", "Advanced shading", "Facial mechanics"]
        },
        {
            id: "2uQpSg1Rm7A",
            title: "Master Shading",
            desc: "Learn the secrets of realistic shading and texture to bring depth and life to your sketches.",
            features: ["Value transitions", "Texture rendering", "Light source logic"]
        },
        {
            id: "7MxLxYRsA94",
            title: "Digital Painting",
            desc: "Transition your traditional skills into the digital world with pro painting techniques.",
            features: ["Brush management", "Digital blending", "Color workflow"]
        }
    ];

    let currentVideoIdx = 0;
    let isTransitioning = false;

    function changeVideo(direction) {
        if (isTransitioning) return;
        isTransitioning = true;

        currentVideoIdx = (currentVideoIdx + direction + videoData.length) % videoData.length;
        const data = videoData[currentVideoIdx];

        const contentArea = document.getElementById('video-content-area');
        const videoWrapper = document.getElementById('video-wrapper');
        const iframe = document.getElementById('youtube-iframe');

        // Fade out
        contentArea.classList.add('fade-out');
        videoWrapper.style.opacity = '0';

        setTimeout(() => {
            // Update content
            document.getElementById('video-title-span').innerText = data.title;
            document.getElementById('video-description').innerText = data.desc;
            
            const featureList = document.getElementById('feature-list');
            featureList.innerHTML = data.features.map(f => `
                <div class="feature-item">
                    <div class="feature-icon" style="background: rgba(254,98,29,0.1); border: 1px solid rgba(254,98,29,0.3); color: #fe621d;">✓</div>
                    ${f}
                </div>
            `).join('');

            // Update Video
            iframe.src = `https://www.youtube.com/embed/${data.id}?rel=0&modestbranding=1`;

            // Fade in
            contentArea.classList.remove('fade-out');
            videoWrapper.style.opacity = '1';
            
            setTimeout(() => {
                isTransitioning = false;
            }, 500);
        }, 500);
    }
</script>


