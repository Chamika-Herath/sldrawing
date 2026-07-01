<!DOCTYPE html>
<html lang="en">
<?php
include_once '../../imports/need/session_setup.php'
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal | User Profile</title>
    <link rel="icon" type="image/png" href="https://www.svgrepo.com/show/373594/favicon.svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <?php
    include_once '../../imports/Company_Info/Company_Info_Variable_List.php';

    $company_obj = new Company_Info_Variable_List();
    ?>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap');

        /* ===== GLOBAL COLOR SYSTEM (ARTISTIC & GLASSMORPHISM) ===== */
        :root {
            /* Vibrant Artistic Primary Colors */
            --erp-primary: #fe621d;
            --erp-primary-dark: #d94b0f;
            --erp-primary-light: #ff874f;
            --erp-primary-subtle: rgba(254, 98, 29, 0.25);

            /* Glassmorphism Neutral Colors */
            --erp-surface: rgba(25, 25, 35, 0.55);
            --erp-surface-alt: rgba(25, 25, 35, 0.35);
            --erp-border: rgba(255, 255, 255, 0.15);
            --erp-border-dark: rgba(255, 255, 255, 0.3);
            --erp-text-primary: #ffffff;
            --erp-text-secondary: rgba(255, 255, 255, 0.85);
            --erp-text-tertiary: rgba(255, 255, 255, 0.6);

            /* Accent Colors */
            --erp-accent-success: #00e676;
            --erp-accent-warning: #ffd600;
            --erp-accent-error: #ff1744;
            --erp-accent-info: #00e5ff;

            /* Social Brand Colors */
            --erp-google: #ea4335;

            /* Shadows */
            --erp-shadow-sm: 0 4px 15px rgba(0, 0, 0, 0.1);
            --erp-shadow-md: 0 8px 25px rgba(0, 0, 0, 0.2);
            --erp-shadow-lg: 0 15px 35px rgba(0, 0, 0, 0.4);
            
            --erp-gradient-primary: linear-gradient(135deg, var(--erp-primary) 0%, var(--erp-primary-dark) 100%);

            /* Border Radius & Spacing */
            --erp-radius-sm: 8px;
            --erp-radius-md: 12px;
            --erp-radius-lg: 20px;
            --erp-radius-full: 9999px;
            
            --erp-space-xs: 8px;
            --erp-space-sm: 12px;
            --erp-space-md: 16px;
            --erp-space-lg: 24px;
            --erp-space-xl: 32px;
        }

        /* ===== BASE RESET & GLOBAL STYLES ===== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Outfit', system-ui, -apple-system, sans-serif;
            background-image: url('/assets/images/portrait_background.png') !important;
            background-size: cover !important;
            background-position: center !important;
            background-attachment: fixed !important;
            background-repeat: no-repeat !important;
            color: var(--erp-text-primary);
            line-height: 1.5;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        /* ===== ANIMATIONS ===== */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* ===== LAYOUT CONTAINERS ===== */
        .erp-container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 var(--erp-space-md);
            margin-top: 100px;
            margin-bottom: 100px;
            animation: fadeUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        .erp-container--profile {
            max-width: 900px;
        }

        /* ===== PROFILE CARD (GLASSMORPHISM) ===== */
        .erp-profile-card {
            /* Force variables for this card specifically */
            --erp-text-primary: #ffffff;
            --erp-text-secondary: rgba(255, 255, 255, 0.85);
            --erp-text-tertiary: rgba(255, 255, 255, 0.6);
            --erp-border: rgba(255, 255, 255, 0.15);
            --erp-border-dark: rgba(255, 255, 255, 0.3);
            
            width: 100%;
            background: rgba(20, 20, 28, 0.45) !important;
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid var(--erp-border);
            border-radius: var(--erp-radius-lg);
            box-shadow: var(--erp-shadow-lg);
            overflow: hidden;
            margin-bottom: var(--erp-space-xl);
            position: relative;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            color: var(--erp-text-primary) !important;
        }

        .erp-profile-card__header {
            background: rgba(0, 0, 0, 0.15) !important;
            border-bottom: 1px solid var(--erp-border);
            padding: var(--erp-space-xl) var(--erp-space-xl) var(--erp-space-lg);
            position: relative;
            z-index: 1;
        }

        .erp-profile-card__title {
            font-size: 28px;
            font-weight: 700;
            letter-spacing: -0.5px;
            margin-bottom: var(--erp-space-xs);
            color: var(--erp-text-primary) !important;
        }

        .erp-profile-card__subtitle {
            font-size: 15px;
            opacity: 0.8;
            font-weight: 300;
            color: var(--erp-text-secondary) !important;
        }

        .erp-profile-card__body {
            padding: var(--erp-space-xl);
            background: rgba(0, 0, 0, 0.25) !important;
            border-bottom-left-radius: var(--erp-radius-lg);
            border-bottom-right-radius: var(--erp-radius-lg);
        }

        /* ===== PROFILE HEADER CONTENT ===== */
        .erp-profile-header {
            display: flex;
            align-items: center;
            gap: var(--erp-space-xl);
            margin-bottom: var(--erp-space-xl);
            padding-bottom: var(--erp-space-xl);
            border-bottom: 1px dashed var(--erp-border);
        }

        /* ===== PROFILE PICTURE SECTION ===== */
        .erp-profile-picture {
            position: relative;
            flex-shrink: 0;
            border-radius: 50%;
        }

        .erp-profile-picture__wrapper {
            width: 120px;
            height: 120px;
            position: relative;
            background: rgba(25, 25, 35, 0.8);
            border-radius: 50%;
            overflow: hidden;
            border: 2px solid var(--erp-border-dark);
            box-shadow: 0 4px 15px rgba(0,0,0,0.3);
        }

        .erp-profile-picture__img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            border-radius: 50%;
        }

        .erp-profile-picture__default {
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }
        .erp-profile-picture__default i {
            font-size: 50px;
            color: rgba(255, 255, 255, 0.5);
        }

        .erp-profile-picture__upload {
            position: absolute;
            bottom: 0px;
            right: 0px;
            background: var(--erp-primary);
            color: #ffffff;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            border: 2px solid rgba(25, 25, 35, 0.8);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 4px 15px rgba(254, 98, 29, 0.4);
            z-index: 2;
        }
        .erp-profile-picture__upload:hover {
            transform: scale(1.1) rotate(10deg);
            background: var(--erp-primary-dark);
        }

        .erp-profile-picture__upload-input { display: none; }

        /* ===== PROFILE INFO SECTION ===== */
        .erp-profile-info {
            flex: 1;
        }

        .erp-profile-info__name {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 6px;
            color: var(--erp-text-primary);
            letter-spacing: -0.5px;
        }

        .erp-profile-info__role {
            font-size: 14px;
            color: var(--erp-primary-light);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: var(--erp-space-md);
            display: inline-block;
            background: var(--erp-primary-subtle);
            padding: 4px 12px;
            border-radius: 20px;
            border: 1px solid rgba(254, 98, 29, 0.2);
        }

        .erp-profile-info__meta {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: var(--erp-space-md);
        }

        .erp-profile-info__meta-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            color: var(--erp-text-secondary);
            font-weight: 500;
        }

        .erp-profile-info__meta-icon {
            color: var(--erp-primary-light);
            font-size: 16px;
        }

        .erp-profile-info__bio {
            color: var(--erp-text-secondary);
            line-height: 1.6;
            margin-top: var(--erp-space-sm);
            font-size: 15px;
            background: rgba(0, 0, 0, 0.2);
            padding: 15px;
            border-radius: var(--erp-radius-md);
            border-left: 3px solid var(--erp-primary-light);
        }

        /* ===== FORM COMPONENTS ===== */
        .erp-form { width: 100%; }

        .erp-form__section { margin-bottom: var(--erp-space-2xl); }

        .erp-form__section-title {
            font-size: 20px;
            font-weight: 700;
            color: var(--erp-text-primary);
            padding-bottom: 12px;
            margin-bottom: var(--erp-space-lg);
            border-bottom: 1px solid var(--erp-border);
            display: inline-block;
        }

        .erp-form__grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: var(--erp-space-md);
        }

        .erp-form__group { margin-bottom: var(--erp-space-lg); position: relative; }

        .erp-form__label {
            display: block;
            margin-bottom: var(--erp-space-xs);
            font-size: 13px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--erp-text-secondary);
        }

        .erp-input-wrapper { position: relative; }

        .erp-form__control {
            width: 100%;
            padding: 14px var(--erp-space-md);
            border: 1px solid var(--erp-border);
            border-radius: var(--erp-radius-md);
            font-size: 16px;
            font-family: inherit;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            background-color: rgba(0, 0, 0, 0.2);
            color: var(--erp-text-primary);
        }

        .erp-form__control:hover { 
            border-color: var(--erp-border-dark);
            background-color: rgba(0, 0, 0, 0.3);
        }

        .erp-form__control:focus {
            outline: none;
            border-color: var(--erp-primary-light);
            background-color: rgba(0, 0, 0, 0.4);
            box-shadow: 0 0 0 4px var(--erp-primary-subtle);
            transform: translateY(-2px);
        }

        .erp-form__control:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            background: rgba(0, 0, 0, 0.1);
        }

        .erp-form__control--with-icon { padding-left: 48px; }

        .erp-form__icon {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--erp-primary-light);
            font-size: 18px;
            transition: color 0.3s ease;
        }

        .erp-form__control:focus + .erp-form__icon,
        .erp-input-wrapper:focus-within .erp-form__icon {
            color: #fff;
        }

        textarea.erp-form__control {
            resize: vertical;
            min-height: 100px;
        }

        /* ===== BUTTON SYSTEM ===== */
        .erp-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: var(--erp-space-sm) var(--erp-space-lg);
            border: none;
            border-radius: var(--erp-radius-md);
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            text-decoration: none;
            gap: 10px;
            height: 52px;
            position: relative;
            overflow: hidden;
            font-family: inherit;
        }

        .erp-btn::after {
            content: '';
            position: absolute;
            top: 0; left: -100%; width: 100%; height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s ease;
        }
        .erp-btn:hover::after { left: 100%; }

        .erp-btn--primary {
            background: var(--erp-gradient-primary);
            color: white;
            box-shadow: 0 4px 15px rgba(254, 98, 29, 0.4);
        }
        .erp-btn--primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(254, 98, 29, 0.6);
        }

        .erp-btn--secondary {
            background-color: transparent;
            color: var(--erp-text-primary);
            border: 2px solid var(--erp-border);
            backdrop-filter: blur(10px);
        }
        .erp-btn--secondary:hover {
            background-color: rgba(0, 0, 0, 0.05);
            border-color: var(--erp-text-secondary);
            transform: translateY(-2px);
        }

        .erp-btn--google {
            background-color: rgba(255, 255, 255, 0.95);
            color: #333;
            border: none;
        }
        .erp-btn--google:hover {
            background-color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        /* ===== SECURITY SECTION (MODERN WIDGETS) ===== */
        .erp-security-settings {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .erp-security-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px;
            background: rgba(0, 0, 0, 0.2);
            border: 1px solid var(--erp-border);
            border-radius: var(--erp-radius-md);
            transition: all 0.3s ease;
        }

        .erp-security-item:hover {
            background: rgba(255, 255, 255, 0.05);
            border-color: var(--erp-border-dark);
            transform: translateX(5px);
        }

        .erp-security-item__info { flex: 1; }

        .erp-security-item__title {
            font-weight: 600;
            font-size: 16px;
            margin-bottom: 4px;
            color: var(--erp-text-primary);
        }

        .erp-security-item__description {
            font-size: 13px;
            font-weight: 400;
            color: var(--erp-text-secondary);
        }

        .erp-security-item__status {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .erp-status-badge {
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 600;
        }

        .erp-status-badge--enabled {
            background-color: rgba(0, 230, 118, 0.15);
            color: var(--erp-accent-success);
        }

        .erp-status-badge--disabled {
            background-color: rgba(255, 23, 68, 0.15);
            color: var(--erp-accent-error);
        }

        /* ===== ACTION BUTTONS ROW ===== */
        .erp-profile-actions {
            display: flex;
            justify-content: flex-end;
            gap: 16px;
            margin-top: var(--erp-space-xl);
            padding-top: var(--erp-space-lg);
            border-top: 1px solid var(--erp-border);
        }

        /* ===== FOOTER ===== */
        .erp-profile-card__footer {
            padding: var(--erp-space-md) var(--erp-space-xl);
            background: rgba(0, 0, 0, 0.2);
            border-top: 1px solid var(--erp-border);
            text-align: center;
            backdrop-filter: blur(10px);
        }

        .erp-footer__copyright {
            font-size: 13px;
            color: var(--erp-text-tertiary);
            margin-bottom: 2px;
        }

        /* ===== RESPONSIVE ADJUSTMENTS ===== */
        @media (max-width: 768px) {
            .erp-profile-header {
                flex-direction: column;
                align-items: center;
                text-align: center;
                border-bottom: none;
            }
            .erp-profile-info__meta { justify-content: center; }
            .erp-form__grid { grid-template-columns: 1fr; }
            .erp-security-item { flex-direction: column; align-items: flex-start; gap: 16px; }
            .erp-security-item__status { width: 100%; justify-content: space-between; }
            .erp-profile-actions { flex-direction: column-reverse; }
            .erp-profile-actions .erp-btn { width: 100%; }
        }
    </style>
</head>

<body>
    <script>
        // Run after DOM is loaded
        document.addEventListener("DOMContentLoaded", function() {
            User_Profile_Page_icone_header_function();
            User_Profile_A_01_single_main_user_login_SET_DB();

        });
    </script>

    <?php
    include_once '../../UxUI-Back/Common/header.php';
    include_once '../../UxUI-Back/Needs/Admin_pannel_Pre_loader.php';
    ?>

    <input type="hidden" id="check_user_profile_page_val_01" value="0">

    <?php
    include_once '../../UxUI-Back/Main/User_profile/User-Profile-New.php';
    include_once '../../UxUI-Back/Main/User_profile/JS/User-Profile_JS.php';
    ?>


    <?php include_once '../../UxUI-Back/Common/footer.php'; ?>
</body>

</html>