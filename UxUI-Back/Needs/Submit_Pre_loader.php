<style>
/* Full-screen overlay for submit actions */
#submit-preloader-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background: rgba(15, 20, 30, 0.85);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    z-index: 99999;
    display: none;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    transition: opacity 0.3s ease;
}

/* Beautiful modern spinner */
.submit-spinner {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    border: 4px solid rgba(0, 210, 255, 0.1);
    border-top-color: #00d2ff;
    border-right-color: var(--primary, #fe621d);
    animation: submitSpin 1s cubic-bezier(0.68, -0.55, 0.265, 1.55) infinite;
    margin-bottom: 25px;
    box-shadow: 0 0 30px rgba(0, 210, 255, 0.2);
}

@keyframes submitSpin {
    0% { transform: rotate(0deg) scale(1); }
    50% { transform: rotate(180deg) scale(1.1); }
    100% { transform: rotate(360deg) scale(1); }
}

/* AI Processing Text */
.submit-loading-text {
    font-family: 'Outfit', sans-serif;
    color: #ffffff;
    font-size: 1.5rem;
    font-weight: 800;
    letter-spacing: 1px;
    margin-bottom: 10px;
    text-align: center;
    text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
}

/* Subtitle for the loader */
.submit-sub-text {
    font-family: 'Outfit', sans-serif;
    color: rgba(255, 255, 255, 0.7);
    font-size: 1rem;
    font-weight: 400;
    text-align: center;
    max-width: 300px;
}

/* Loading dots animation */
.submit-loading-dots::after {
    content: '';
    animation: submitDots 1.5s infinite steps(4, end);
}

@keyframes submitDots {
    0%, 20% { content: ''; }
    40% { content: '.'; }
    60% { content: '..'; }
    80%, 100% { content: '...'; }
}
</style>

<div id="submit-preloader-overlay">
    <div class="submit-spinner"></div>
    <div class="submit-loading-text">Processing AI Grading<span class="submit-loading-dots"></span></div>
    <div class="submit-sub-text">Please wait while the neural network analyzes your drawing proportional accuracy.</div>
</div>

<script>
    function showSubmitPreloader() {
        var loader = document.getElementById('submit-preloader-overlay');
        if (loader) {
            loader.style.display = 'flex';
            loader.style.opacity = '0';
            setTimeout(() => { loader.style.opacity = '1'; }, 10); // trigger fade
        }
    }

    function hideSubmitPreloader() {
        var loader = document.getElementById('submit-preloader-overlay');
        if (loader) {
            loader.style.opacity = '0';
            setTimeout(() => { loader.style.display = 'none'; }, 300); // wait for fade out
        }
    }
</script>
