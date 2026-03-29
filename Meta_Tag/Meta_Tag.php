<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="<?php echo $get_dis; ?>">
<meta name="keywords" content="<?php echo $get_key_words; ?>">
<title><?php echo $get_title; ?></title>
<link rel="stylesheet" href="/assets/css/style.css">
<style>
    :root {
        /* Default Dark Theme (Premium Artistic) */
        --primary: #fe621d;
        --secondary: #16161e;
        --background: #0b0b0f;
        --surface: #1a1a24;
        --text: #f0f0f5;
        --text-dim: #94a3b8;
        --glass: rgba(15, 15, 20, 0.7);
        --glass-border: rgba(254, 98, 29, 0.2);
        --shadow: 0 20px 50px rgba(0,0,0,0.5);
    }

    body.light-theme {
        /* Light Theme Override */
        --secondary: #fff5f0;
        --background: #fffcf9;
        --surface: #ffffff;
        --text: #1a1a1a;
        --text-dim: #555;
        --glass: rgba(255, 255, 255, 0.7);
        --glass-border: rgba(254, 98, 29, 0.15);
        --shadow: 0 10px 40px rgba(0,0,0,0.1);
    }

    * { margin: 0; padding: 0; box-sizing: border-box; }
    html, body { 
        background: var(--background); 
        color: var(--text); 
        font-family: 'Segoe UI', system-ui, -apple-system, sans-serif; 
        overflow-x: hidden !important; 
        width: 100vw !important; 
        scroll-behavior: smooth;
        transition: background 0.3s, color 0.3s;
    }
    .container { width: 90%; max-width: 1200px; margin: 0 auto; box-sizing: border-box; }
    .glass { background: var(--glass); backdrop-filter: blur(15px); border: 1px solid var(--glass-border); box-shadow: var(--shadow); }
    .btn-primary { background: var(--primary); color: #fff; border-radius: 12px; transition: 0.3s; padding: 12px 25px; border: none; font-weight: 700; cursor: pointer; }
    .btn-primary:hover { transform: translateY(-3px); box-shadow: 0 10px 20px rgba(254, 98, 29, 0.3); }

    /* Theme Toggle Button */
    .theme-toggle {
        position: fixed;
        bottom: 40px;
        right: 40px;
        width: 60px;
        height: 60px;
        background: var(--primary);
        color: #fff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        z-index: 9999;
        box-shadow: 0 10px 30px rgba(254, 98, 29, 0.3);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        font-size: 1.5rem;
    }
    .theme-toggle:hover { transform: scale(1.1) rotate(15deg); }
    .theme-toggle .icon { display: flex; align-items: center; justify-content: center; }

    /* Reveal Animations */
    .reveal { opacity: 0; transform: translateY(40px); transition: all 0.8s ease-out; }
    .reveal.active { opacity: 1; transform: translateY(0); }
</style>

<div class="theme-toggle" onclick="toggleTheme()" id="theme-toggle-btn">
    <span class="icon" id="theme-icon">🌙</span>
</div>

<script>
    // Immediate logical theme check (pre-render)
    (function() {
        const savedTheme = localStorage.getItem('sldrawing-theme') || 'dark';
        if (savedTheme === 'light') {
            document.body.classList.add('light-theme');
        }
    })();

    function updateThemeUI() {
        const isLight = document.body.classList.contains('light-theme');
        const icon = document.getElementById('theme-icon');
        icon.innerText = isLight ? '☀️' : '🌙';
    }

    function toggleTheme() {
        const isLight = document.body.classList.toggle('light-theme');
        localStorage.setItem('sldrawing-theme', isLight ? 'light' : 'dark');
        updateThemeUI();
    }

    document.addEventListener("DOMContentLoaded", function() {
        updateThemeUI();
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if(entry.isIntersecting) {
                    entry.target.classList.add('active');
                }
            });
        }, { threshold: 0.1 });
        
        document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
    });
</script>
