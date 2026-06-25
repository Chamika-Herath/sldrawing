<div class="preloader-container preloaded" id="erpPreloader">
  <div class="preloader-backdrop"></div>
  <div class="preloader-wrapper">
    <div class="preloader-logo-container">
      <div class="preloader-logo">
        <svg class="preloader-logo-icon" viewBox="0 0 100 100">
          <defs>
            <linearGradient id="preloader-gradient" x1="0%" y1="0%" x2="100%" y2="100%">
              <stop offset="0%" stop-color="var(--erp-primary-light)" />
              <stop offset="50%" stop-color="var(--erp-primary)" />
              <stop offset="100%" stop-color="var(--erp-primary-dark)" />
            </linearGradient>
          </defs>
          <path d="M50,10 L90,30 L90,70 L50,90 L10,70 L10,30 Z" fill="url(#preloader-gradient)" />
          <circle cx="50" cy="50" r="20" fill="var(--erp-surface)" />
          <path d="M40,45 L50,55 L60,45" stroke="var(--erp-primary)" stroke-width="4" fill="none" />
          <path d="M40,55 L50,65 L60,55" stroke="var(--erp-primary-light)" stroke-width="4" fill="none" />
        </svg>
      </div>
      <div class="preloader-logo-text">
        <span class="preloader-system-name">IAccounter</span>
        <span class="preloader-system-version">v3.2.1</span>
      </div>
    </div>

    <div class="preloader-status">
      <div class="preloader-modules">
        <div class="preloader-module" data-module="auth">
          <div class="preloader-module-icon">🔐</div>
          <div class="preloader-module-info">
            <span class="preloader-module-name">Authentication</span>
            <span class="preloader-module-status" data-status="auth">Initializing...</span>
          </div>
          <div class="preloader-module-check">
            <div class="preloader-checkmark"></div>
          </div>
        </div>

        <div class="preloader-module" data-module="db">
          <div class="preloader-module-icon">💾</div>
          <div class="preloader-module-info">
            <span class="preloader-module-name">Database</span>
            <span class="preloader-module-status" data-status="db">Connecting...</span>
          </div>
          <div class="preloader-module-check">
            <div class="preloader-checkmark"></div>
          </div>
        </div>

        <div class="preloader-module" data-module="modules">
          <div class="preloader-module-icon">📦</div>
          <div class="preloader-module-info">
            <span class="preloader-module-name">Core Modules</span>
            <span class="preloader-module-status" data-status="modules">Loading...</span>
          </div>
          <div class="preloader-module-check">
            <div class="preloader-checkmark"></div>
          </div>
        </div>

        <div class="preloader-module" data-module="ui">
          <div class="preloader-module-icon">🎨</div>
          <div class="preloader-module-info">
            <span class="preloader-module-name">Interface</span>
            <span class="preloader-module-status" data-status="ui">Rendering...</span>
          </div>
          <div class="preloader-module-check">
            <div class="preloader-checkmark"></div>
          </div>
        </div>
      </div>

      <div class="preloader-progress-container">
        <div class="preloader-progress-header">
          <span class="preloader-progress-label">System Initialization</span>
          <span class="preloader-progress-percent">0%</span>
        </div>
        <div class="preloader-progress-track">
          <div class="preloader-progress-bar"></div>
        </div>
        <div class="preloader-progress-steps">
          <div class="preloader-step active">1</div>
          <div class="preloader-step">2</div>
          <div class="preloader-step">3</div>
          <div class="preloader-step">4</div>
        </div>
      </div>
    </div>

    <div class="preloader-footer">
      <div class="preloader-message">
        <span class="preloader-tip-icon">💡</span>
        <span class="preloader-tip-text">Tip: Press F1 for keyboard shortcuts</span>
      </div>
      <div class="preloader-copyright">
        © 2024 ERP Solutions Inc. • Loading time: <span class="preloader-time">0.0s</span>
      </div>
    </div>
  </div>
</div>

<style>
  /* ERP PRELOADER COMPONENT STYLES */
  /* All styles use .preloader- prefix to avoid conflicts */
  :root {
    /* Primary ERP Brand Colors */
    --erp-primary: #2c5282;
    --erp-primary-dark: #1a365d;
    --erp-primary-light: #4299e1;
    --erp-primary-subtle: #ebf8ff;

    /* Neutral Colors */
    --erp-surface: #ffffff;
    --erp-surface-alt: #f7fafc;
    --erp-border: #e2e8f0;
    --erp-border-dark: #cbd5e0;
    --erp-text-primary: #2d3748;
    --erp-text-secondary: #4a5568;
    --erp-text-tertiary: #718096;

    /* Error Colors */
    --erp-error-light: #fed7d7;
    --erp-error-medium: #fc8181;
    --erp-error-dark: #e53e3e;
    --erp-error-darker: #c53030;
    --erp-error-glow: rgba(229, 62, 62, 0.3);

    /* Warning Colors */
    --erp-warning-light: #feebc8;
    --erp-warning-dark: #d69e2e;

    /* Accent Colors */
    --erp-accent-success: #38a169;
    --erp-accent-warning: #d69e2e;
    --erp-accent-error: #e53e3e;
    --erp-accent-info: #3182ce;

    /* Sidebar */
    --sidebar-width: 260px;
    --sidebar-collapsed: 70px;
    --sidebar-transition: 0.3s ease;
  }

  .preloader-container {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: var(--erp-surface);
    z-index: 99999;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
  }

  .preloader-backdrop {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg,
        var(--erp-surface-alt) 0%,
        var(--erp-surface) 50%,
        var(--erp-primary-subtle) 100%);
    opacity: 0.9;
  }

  .preloader-wrapper {
    position: relative;
    z-index: 2;
    width: 100%;
    max-width: 600px;
    background: var(--erp-surface);
    border-radius: 12px;
    box-shadow:
      0 10px 30px rgba(0, 0, 0, 0.08),
      0 1px 3px rgba(0, 0, 0, 0.05),
      0 0 0 1px var(--erp-border);
    padding: 32px;
    margin: 20px;
    animation: preloader-wrapper-appear 0.3s ease-out;
  }

  @keyframes preloader-wrapper-appear {
    from {
      opacity: 0;
      transform: translateY(20px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .preloader-logo-container {
    display: flex;
    align-items: center;
    margin-bottom: 32px;
    padding-bottom: 24px;
    border-bottom: 1px solid var(--erp-border);
  }

  .preloader-logo {
    width: 60px;
    height: 60px;
    margin-right: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .preloader-logo-icon {
    width: 100%;
    height: 100%;
    animation: preloader-logo-pulse 3s infinite ease-in-out;
  }

  @keyframes preloader-logo-pulse {

    0%,
    100% {
      transform: scale(1);
    }

    50% {
      transform: scale(1.05);
    }
  }

  .preloader-logo-text {
    display: flex;
    flex-direction: column;
  }

  .preloader-system-name {
    font-size: 24px;
    font-weight: 600;
    color: var(--erp-primary-dark);
    letter-spacing: -0.5px;
    line-height: 1.2;
  }

  .preloader-system-version {
    font-size: 13px;
    color: var(--erp-text-tertiary);
    font-weight: 500;
    letter-spacing: 0.5px;
    margin-top: 4px;
  }

  .preloader-status {
    margin-bottom: 32px;
  }

  .preloader-modules {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 16px;
    margin-bottom: 32px;
  }

  @media (max-width: 500px) {
    .preloader-modules {
      grid-template-columns: 1fr;
    }
  }

  .preloader-module {
    display: flex;
    align-items: center;
    padding: 12px 16px;
    background: var(--erp-surface-alt);
    border-radius: 8px;
    border: 1px solid var(--erp-border);
    transition: all 0.3s ease;
  }

  .preloader-module.active {
    border-color: var(--erp-primary);
    background: var(--erp-primary-subtle);
  }

  .preloader-module.loaded {
    border-color: var(--erp-accent-success);
    background: rgba(56, 161, 105, 0.05);
  }

  .preloader-module.error {
    border-color: var(--erp-error-medium);
    background: var(--erp-error-light);
  }

  .preloader-module-icon {
    font-size: 20px;
    margin-right: 12px;
    width: 32px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--erp-surface);
    border-radius: 6px;
    border: 1px solid var(--erp-border-dark);
  }

  .preloader-module-info {
    flex: 1;
    display: flex;
    flex-direction: column;
  }

  .preloader-module-name {
    font-size: 14px;
    font-weight: 600;
    color: var(--erp-text-primary);
    margin-bottom: 2px;
  }

  .preloader-module-status {
    font-size: 12px;
    color: var(--erp-text-tertiary);
    font-weight: 500;
  }

  .preloader-module-check {
    width: 24px;
    height: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
  }

  .preloader-module.loaded .preloader-module-check {
    opacity: 1;
  }

  .preloader-checkmark {
    width: 18px;
    height: 18px;
    border-radius: 50%;
    background-color: var(--erp-accent-success);
    position: relative;
  }

  .preloader-checkmark::before,
  .preloader-checkmark::after {
    content: '';
    position: absolute;
    background-color: white;
  }

  .preloader-checkmark::before {
    width: 3px;
    height: 7px;
    top: 8px;
    left: 6px;
    transform: rotate(45deg);
  }

  .preloader-checkmark::after {
    width: 3px;
    height: 11px;
    top: 4px;
    left: 10px;
    transform: rotate(-45deg);
  }

  .preloader-progress-container {
    margin-top: 8px;
  }

  .preloader-progress-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 12px;
  }

  .preloader-progress-label {
    font-size: 15px;
    font-weight: 600;
    color: var(--erp-text-secondary);
  }

  .preloader-progress-percent {
    font-size: 15px;
    font-weight: 700;
    color: var(--erp-primary);
    font-variant-numeric: tabular-nums;
  }

  .preloader-progress-track {
    height: 8px;
    background: var(--erp-border);
    border-radius: 4px;
    overflow: hidden;
    margin-bottom: 16px;
  }

  .preloader-progress-bar {
    height: 100%;
    width: 0%;
    background: linear-gradient(90deg,
        var(--erp-primary-light),
        var(--erp-primary),
        var(--erp-primary-dark));
    border-radius: 4px;
    transition: width 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    position: relative;
    overflow: hidden;
  }

  .preloader-progress-bar::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg,
        transparent,
        rgba(255, 255, 255, 0.4),
        transparent);
    animation: preloader-progress-shimmer 2s infinite;
  }

  @keyframes preloader-progress-shimmer {
    0% {
      transform: translateX(-100%);
    }

    100% {
      transform: translateX(100%);
    }
  }

  .preloader-progress-steps {
    display: flex;
    justify-content: space-between;
    position: relative;
    margin-top: 8px;
  }

  .preloader-progress-steps::before {
    content: '';
    position: absolute;
    top: 50%;
    left: 12px;
    right: 12px;
    height: 2px;
    background: var(--erp-border);
    transform: translateY(-50%);
    z-index: 1;
  }

  .preloader-step {
    width: 28px;
    height: 28px;
    border-radius: 50%;
    background: var(--erp-surface);
    border: 2px solid var(--erp-border);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    font-weight: 700;
    color: var(--erp-text-tertiary);
    position: relative;
    z-index: 2;
    transition: all 0.3s ease;
  }

  .preloader-step.active {
    border-color: var(--erp-primary);
    background: var(--erp-primary);
    color: white;
    transform: scale(1.1);
  }

  .preloader-step.completed {
    border-color: var(--erp-accent-success);
    background: var(--erp-accent-success);
    color: white;
  }

  .preloader-footer {
    border-top: 1px solid var(--erp-border);
    padding-top: 20px;
    display: flex;
    flex-direction: column;
    gap: 12px;
  }

  .preloader-message {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    padding: 10px 16px;
    background: var(--erp-warning-light);
    border-radius: 6px;
    border: 1px solid rgba(214, 158, 46, 0.2);
  }

  .preloader-tip-icon {
    font-size: 16px;
  }

  .preloader-tip-text {
    font-size: 13px;
    color: var(--erp-warning-dark);
    font-weight: 500;
  }

  .preloader-copyright {
    text-align: center;
    font-size: 12px;
    color: var(--erp-text-tertiary);
    font-weight: 500;
  }

  .preloader-time {
    font-weight: 600;
    color: var(--erp-text-secondary);
    font-variant-numeric: tabular-nums;
  }

  /* Hide preloader when loading is complete */
  .preloader-container.preloaded {
    opacity: 0;
    visibility: hidden;
    pointer-events: none;
    transition: opacity 0.5s ease, visibility 0.5s;
  }

  /* Loading animation for module icons */
  .preloader-module:not(.loaded):not(.error) .preloader-module-icon {
    animation: preloader-module-loading 1.5s infinite ease-in-out;
  }

  @keyframes preloader-module-loading {

    0%,
    100% {
      opacity: 0.6;
      transform: scale(0.95);
    }

    50% {
      opacity: 1;
      transform: scale(1);
    }
  }
</style>

<script>
  let preloaderInterval;
  let preloaderTimeInterval;

  function admin_panel_perloader_show() {
    const preloader = document.getElementById('erpPreloader');
    if (!preloader) return;

    // Reset UI and Show
    preloader.classList.remove('preloaded');

    const progressBar = preloader.querySelector('.preloader-progress-bar');
    const progressPercent = preloader.querySelector('.preloader-progress-percent');
    const loadingTime = preloader.querySelector('.preloader-time');
    const modules = preloader.querySelectorAll('.preloader-module');
    const steps = preloader.querySelectorAll('.preloader-step');
    const moduleStatuses = {
      auth: preloader.querySelector('[data-status="auth"]'),
      db: preloader.querySelector('[data-status="db"]'),
      modules: preloader.querySelector('[data-status="modules"]'),
      ui: preloader.querySelector('[data-status="ui"]')
    };

    // Clear any existing intervals
    clearInterval(preloaderInterval);
    clearInterval(preloaderTimeInterval);

    // Reset State
    let progress = 0;
    let startTime = Date.now();
    let currentModule = -1;
    const moduleSequence = ['auth', 'db', 'modules', 'ui'];

    // Reset Elements
    progressBar.style.width = '0%';
    progressPercent.textContent = '0%';
    loadingTime.textContent = '0.0s';

    modules.forEach(m => {
      m.classList.remove('active', 'loaded', 'error');
      const status = m.querySelector('.preloader-module-status');
      if (status) status.style.color = '';
    });

    steps.forEach(s => s.classList.remove('active', 'completed'));
    steps[0].classList.add('active');

    // Initial statuses
    moduleStatuses.auth.textContent = 'Initializing...';
    moduleStatuses.db.textContent = 'Connecting...';
    moduleStatuses.modules.textContent = 'Loading...';
    moduleStatuses.ui.textContent = 'Rendering...';

    function updateLoadingTime() {
      const elapsed = (Date.now() - startTime) / 1000;
      loadingTime.textContent = elapsed.toFixed(1) + 's';
    }

    preloaderTimeInterval = setInterval(updateLoadingTime, 100);

    function loadModule(index) {
      if (index > currentModule) {
        const moduleName = moduleSequence[index];
        const moduleElement = preloader.querySelector(`[data-module="${moduleName}"]`);

        if (currentModule > -1) {
          const prevModule = preloader.querySelector(`[data-module="${moduleSequence[currentModule]}"]`);
          prevModule.classList.remove('active');
          prevModule.classList.add('loaded');
          steps[currentModule].classList.remove('active');
          steps[currentModule].classList.add('completed');
          moduleStatuses[moduleSequence[currentModule]].textContent = 'Ready';
          moduleStatuses[moduleSequence[currentModule]].style.color = 'var(--erp-accent-success)';
        }

        moduleElement.classList.add('active');
        if (steps[index]) steps[index].classList.add('active');

        const statusTexts = {
          auth: ['Verifying credentials...', 'Establishing session...', 'Authenticated'],
          db: ['Connecting...', 'Loading schema...', 'Connected'],
          modules: ['Initializing...', 'Loading modules...', 'Modules ready'],
          ui: ['Building interface...', 'Rendering components...', 'Interface ready']
        };

        const texts = statusTexts[moduleName];
        let textIndex = 0;
        const textInterval = setInterval(() => {
          if (textIndex < texts.length - 1) {
            moduleStatuses[moduleName].textContent = texts[textIndex];
            textIndex++;
          } else {
            clearInterval(textInterval);
          }
        }, 500);

        currentModule = index;
      }
    }

    preloaderInterval = setInterval(() => {
      let increment = progress < 30 ? Math.random() * 8 + 4 : progress < 70 ? Math.random() * 6 + 2 : Math.random() * 4 + 1;
      progress += increment;

      if (progress >= 20 && currentModule < 0) loadModule(0);
      else if (progress >= 45 && currentModule === 0) loadModule(1);
      else if (progress >= 70 && currentModule === 1) loadModule(2);
      else if (progress >= 90 && currentModule === 2) loadModule(3);

      progress = Math.min(100, progress);
      progressBar.style.width = `${progress}%`;
      progressPercent.textContent = `${Math.round(progress)}%`;

      steps.forEach((step, index) => {
        const stepThreshold = (index + 1) * 25;
        if (progress >= stepThreshold) {
          step.classList.add('completed');
          step.classList.remove('active');
        }
      });

      if (progress >= 100) {
        clearInterval(preloaderInterval);
        clearInterval(preloaderTimeInterval);

        // Final UI Polish
        if (currentModule < 3) loadModule(3);
        const lastModule = preloader.querySelector(`[data-module="${moduleSequence[3]}"]`);
        lastModule.classList.remove('active');
        lastModule.classList.add('loaded');
        moduleStatuses.ui.textContent = 'Ready';
        moduleStatuses.ui.style.color = 'var(--erp-accent-success)';
        steps[3].classList.add('completed');

        setTimeout(() => {
          admin_panel_perloader_hide();
        }, 800);
      }
    }, 200);
  }

  function admin_panel_perloader_hide() {
    const preloader = document.getElementById('erpPreloader');
    if (preloader) {
      preloader.classList.add('preloaded');
    }
    clearInterval(preloaderInterval);
    clearInterval(preloaderTimeInterval);
  }
</script>