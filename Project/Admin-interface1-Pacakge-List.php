
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERP | Update Category | 2</title>
    
    <!-- Load Global CSS First -->
    <style>
        /* =========================================================
           ERP DESIGN SYSTEM : ROOT VARIABLES (DO NOT HARD-CODE COLORS)
           ========================================================= */
:root {
    /* ===============================
       Primary Brand Colors (Neon Purple)
       =============================== */
    --erp-primary: #9b5cff;          /* Neon purple (CTAs, highlights) */
    --erp-primary-dark: #5a2ea6;     /* Deep royal purple */
    --erp-primary-light: #c7a6ff;    /* Soft glow purple */
    --erp-primary-subtle: #14091f;   /* Near-black purple */

    /* ===============================
       Neutral / Surface Colors (Cinema Black)
       =============================== */
    --erp-surface: #050507;          /* True cinematic black */
    --erp-surface-alt: #0c0c12;      /* Cards / sections */
    --erp-surface-elevated: #14141c; /* Modals / hover */

    --erp-border: #1e1e2b;           /* Subtle purple-tinted border */
    --erp-border-dark: #29293d;

    --erp-text-primary: #f2f2f7;     /* Main text */
    --erp-text-secondary: #b5b5c9;   /* Muted text */
    --erp-text-tertiary: #8a8aa3;    /* Labels / hints */

    /* ===============================
       Error Colors (Neon Red)
       =============================== */
    --erp-error-light: #2a0c14;
    --erp-error-medium: #ff4d6d;
    --erp-error-dark: #cc1f3a;
    --erp-error-darker: #8f1428;
    --erp-error-glow: rgba(255, 77, 109, 0.35);

    /* ===============================
       Warning Colors (Electric Amber)
       =============================== */
    --erp-warning-light: #2a1f0a;
    --erp-warning-dark: #ffb020;

    /* ===============================
       Accent Colors (Cyber Cinema)
       =============================== */
    --erp-accent-success: #2fe3a0;   /* Neon mint */
    --erp-accent-warning: #ffb020;   /* Electric amber */
    --erp-accent-error: #ff4d6d;     /* Neon red */
    --erp-accent-info: #9b5cff;      /* Neon purple */

    /* ===============================
       Sidebar
       =============================== */
    --sidebar-width: 260px;
    --sidebar-collapsed: 70px;
    --sidebar-transition: 0.25s ease;
}


        /* =========================================================
           GLOBAL RESET & BASE
           ========================================================= */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Segoe UI", system-ui, sans-serif;
        }

        body {
            background: var(--erp-surface-alt);
            color: var(--erp-text-primary);
            overflow-x: hidden;
            min-height: 100vh;
        }
        
        /* ERP LAYOUT STRUCTURE */
        .erp-page-container {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        
        .erp-main-wrapper {
            display: flex;
            flex: 1;
            margin-top: 50px; /* Height of header */
            margin-bottom: 32px; /* Height of footer */
        }
    </style>
</head>
<body>
    <div class="erp-page-container">
        <?php  include_once './backend-designs/Common/header.php'; ?>
        
        <div class="erp-main-wrapper">
            <?php include_once './backend-designs/Common/dashboard.php';?>
            <?php include_once './backend-designs/interface1-package-List.php'; ?>
        </div>
        
        <?php include_once './backend-designs/Common/footer.php';?>
    </div>
</body>
</html>