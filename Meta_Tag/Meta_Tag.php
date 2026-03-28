<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="<?php echo $get_dis; ?>">
<meta name="keywords" content="<?php echo $get_key_words; ?>">
<title><?php echo $get_title; ?></title>
<link rel="stylesheet" href="/assets/css/style.css">
<style>
    :root {
        --primary: #0084ff;
        --secondary: #e1f0ff;
        --background: #f8fbff;
        --surface: #ffffff;
        --text: #1a1a1a;
        --text-dim: #666;
        --glass: rgba(255, 255, 255, 0.8);
        --glass-border: rgba(0, 132, 255, 0.1);
    }
    * { margin: 0; padding: 0; box-sizing: border-box; }
    html, body { 
        background: var(--background); 
        color: var(--text); 
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
        overflow-x: hidden !important; 
        width: 100vw !important; 
        max-width: 100% !important; 
        position: relative;
    }
    .container { width: 90%; max-width: 1200px; margin: 0 auto; box-sizing: border-box; }
    .glass { background: var(--glass); backdrop-filter: blur(10px); border: 1px solid var(--glass-border); box-shadow: 0 8px 32px rgba(0, 132, 255, 0.05); }
    .btn-primary { background: var(--primary); color: #fff; }
</style>
