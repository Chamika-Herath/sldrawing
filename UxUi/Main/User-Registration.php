<!DOCTYPE html>
<?php
include_once '../../imports/need/session_setup.php';
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal | Registration</title>
    <link rel="icon" type="image/png" href="https://www.svgrepo.com/show/373594/favicon.svg">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
            --erp-microsoft: #00a4ef;
            --erp-facebook: #1877f2;

            /* Shadows */
            --erp-shadow-sm: 0 4px 15px rgba(0, 0, 0, 0.1);
            --erp-shadow-md: 0 8px 25px rgba(0, 0, 0, 0.2);
            --erp-shadow-lg: 0 15px 35px rgba(0, 0, 0, 0.4);

            /* Border Radius */
            --erp-radius-sm: 8px;
            --erp-radius-md: 12px;
            --erp-radius-lg: 20px;

            /* Spacing Scale */
            --erp-space-xs: 8px;
            --erp-space-sm: 12px;
            --erp-space-md: 16px;
            --erp-space-lg: 24px;
            --erp-space-xl: 32px;
            --erp-space-2xl: 48px;
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
            display: flex;
            align-items: center;
            justify-content: center;
            padding: var(--erp-space-xl);
            position: relative;
            overflow-x: hidden;
        }

        /* ===== LAYOUT CONTAINERS ===== */
        .erp-container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 var(--erp-space-md);
            position: relative;
            z-index: 1;
            margin-top: 50px;
            margin-bottom: 50px;
        }

        .erp-container--registration {
            max-width: 800px;
        }

        /* ===== REGISTRATION CARD ===== */
        .erp-registration-card {
            width: 100%;
            background: var(--erp-surface);
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            border: 1px solid var(--erp-border);
            border-radius: var(--erp-radius-lg);
            box-shadow: var(--erp-shadow-lg);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .erp-registration-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.5);
        }

        .erp-registration-card__header {
            background: rgba(255, 255, 255, 0.05);
            border-bottom: 1px solid var(--erp-border);
            padding: var(--erp-space-xl) var(--erp-space-xl) var(--erp-space-lg);
            text-align: center;
            position: relative;
        }

        .erp-registration-card__logo {
            font-size: 48px;
            margin-bottom: var(--erp-space-sm);
            color: var(--erp-primary-light);
            text-shadow: 0 0 20px var(--erp-primary-subtle);
        }

        .erp-registration-card__title {
            font-size: 28px;
            font-weight: 700;
            letter-spacing: -0.5px;
            margin-bottom: var(--erp-space-xs);
            background: linear-gradient(135deg, #fff, #e2e2e2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .erp-registration-card__subtitle {
            font-size: 15px;
            opacity: 0.8;
            font-weight: 300;
            color: var(--erp-text-secondary);
        }

        .erp-registration-card__body {
            padding: var(--erp-space-xl);
        }

        /* ===== FORM COMPONENTS ===== */
        .erp-form {
            width: 100%;
        }

        .erp-form__group {
            margin-bottom: var(--erp-space-lg);
            position: relative;
        }

        .erp-form__label {
            display: block;
            margin-bottom: var(--erp-space-xs);
            font-size: 13px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--erp-text-secondary);
        }

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

        .erp-form__control::placeholder {
            color: var(--erp-text-tertiary);
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

        .erp-form__control--with-icon {
            padding-left: 48px;
        }

        .erp-form__control--with-toggle {
            padding-right: 48px;
        }

        .erp-form__icon {
            position: absolute;
            left: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--erp-primary-light);
            font-size: 18px;
            transition: color 0.3s ease;
        }

        .erp-form__control:focus ~ .erp-form__icon {
            color: #fff;
        }

        .erp-form__toggle {
            position: absolute;
            right: 18px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--erp-text-tertiary);
            font-size: 18px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .erp-form__toggle:hover {
            color: #fff;
            transform: translateY(-50%) scale(1.1);
        }

        .erp-form__hint {
            display: block;
            margin-top: 8px;
            font-size: 13px;
            color: var(--erp-text-tertiary);
        }

        .erp-form__hint--valid {
            color: var(--erp-accent-success);
        }

        .erp-form__hint--invalid {
            color: var(--erp-accent-error);
        }

        /* ===== INPUT WRAPPER ===== */
        .erp-input-wrapper {
            position: relative;
        }

        /* ===== FORM GRID ===== */
        .erp-form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: var(--erp-space-md);
        }

        /* ===== PASSWORD STRENGTH INDICATOR ===== */
        .erp-password-strength {
            margin-top: var(--erp-space-sm);
        }

        .erp-password-strength__bar {
            height: 6px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 3px;
            margin-bottom: 8px;
            overflow: hidden;
        }

        .erp-password-strength__fill {
            height: 100%;
            width: 0%;
            transition: width 0.4s cubic-bezier(0.4, 0, 0.2, 1), background-color 0.4s ease;
            border-radius: 3px;
            box-shadow: 0 0 10px currentColor;
        }

        .erp-password-strength__fill--weak {
            background-color: var(--erp-accent-error);
        }

        .erp-password-strength__fill--fair {
            background-color: var(--erp-accent-warning);
        }

        .erp-password-strength__fill--strong {
            background-color: var(--erp-accent-success);
        }

        .erp-password-strength__text {
            font-size: 13px;
            font-weight: 500;
            color: var(--erp-text-tertiary);
        }

        /* ===== TERMS & CONDITIONS ===== */
        .erp-terms {
            display: flex;
            align-items: flex-start;
            gap: var(--erp-space-sm);
            margin-bottom: var(--erp-space-lg);
        }

        .erp-terms__checkbox {
            margin-top: 4px;
            width: 18px;
            height: 18px;
            accent-color: var(--erp-primary-light);
            cursor: pointer;
        }

        .erp-terms__label {
            font-size: 14px;
            color: var(--erp-text-secondary);
            line-height: 1.5;
            cursor: pointer;
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
            font-family: inherit;
            position: relative;
            overflow: hidden;
        }

        .erp-btn::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .erp-btn:hover::after {
            left: 100%;
        }

        .erp-btn--primary {
            background: linear-gradient(135deg, var(--erp-primary), var(--erp-primary-dark));
            color: white;
            box-shadow: 0 4px 15px rgba(254, 98, 29, 0.4);
        }

        .erp-btn--primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(254, 98, 29, 0.6);
        }

        .erp-btn--primary:active {
            transform: translateY(0);
        }

        .erp-btn--secondary {
            background-color: rgba(255, 255, 255, 0.05);
            color: #fff;
            border: 1px solid var(--erp-border);
            backdrop-filter: blur(10px);
        }

        .erp-btn--secondary:hover {
            background-color: rgba(255, 255, 255, 0.15);
            border-color: var(--erp-border-dark);
            transform: translateY(-2px);
        }

        .erp-btn--block {
            display: flex;
            width: 100%;
        }

        /* ===== DIVIDER ===== */
        .erp-divider {
            display: flex;
            align-items: center;
            margin: var(--erp-space-xl) 0;
        }

        .erp-divider__line {
            flex: 1;
            height: 1px;
            background: linear-gradient(90deg, transparent, var(--erp-border-dark), transparent);
        }

        .erp-divider__text {
            padding: 0 var(--erp-space-md);
            color: var(--erp-text-tertiary);
            font-size: 13px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* ===== UTILITY CLASSES ===== */
        .erp-text-center { text-align: center; }
        .erp-mt-xs { margin-top: var(--erp-space-xs); }
        .erp-mt-sm { margin-top: var(--erp-space-sm); }
        .erp-mt-md { margin-top: var(--erp-space-md); }
        .erp-mt-lg { margin-top: var(--erp-space-lg); }
        .erp-mt-xl { margin-top: var(--erp-space-xl); }
        .erp-mb-xs { margin-bottom: var(--erp-space-xs); }
        .erp-mb-sm { margin-bottom: var(--erp-space-sm); }
        .erp-mb-md { margin-bottom: var(--erp-space-md); }
        .erp-mb-lg { margin-bottom: var(--erp-space-lg); }
        .erp-mb-xl { margin-bottom: var(--erp-space-xl); }
        
        .erp-text-sm { font-size: 14px; }
        .erp-text-tertiary { color: var(--erp-text-tertiary); }
        
        .erp-link {
            color: var(--erp-primary-light);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s ease;
            position: relative;
        }

        .erp-link::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 1px;
            background-color: var(--erp-primary-light);
            transition: width 0.3s ease;
        }

        .erp-link:hover {
            color: #fff;
            text-shadow: 0 0 8px rgba(255, 255, 255, 0.4);
        }

        .erp-link:hover::after {
            width: 100%;
            background-color: #fff;
        }

        /* ===== FOOTER ===== */
        .erp-registration-card__footer {
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

        .erp-footer__version {
            font-size: 11px;
            color: var(--erp-text-tertiary);
            opacity: 0.6;
        }

        /* Option styling for selects in registration */
        select.erp-form__control option {
            background-color: #24243e;
            color: #fff;
        }

        /* ===== RESPONSIVE ADJUSTMENTS ===== */
        @media (max-width: 768px) {
            .erp-form-grid {
                grid-template-columns: 1fr;
                gap: var(--erp-space-sm);
            }

            .erp-registration-card__header,
            .erp-registration-card__body {
                padding: var(--erp-space-lg);
            }

            .erp-registration-card__footer {
                padding: var(--erp-space-md) var(--erp-space-lg);
            }

            body {
                padding: var(--erp-space-md);
            }
        }

        @media (max-width: 640px) {
            .erp-container--registration {
                max-width: 100%;
            }
            .erp-registration-card__title {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>
    <?php
    include_once '../../imports/Company_Info/Company_Info_Variable_List.php';

    $company_obj = new Company_Info_Variable_List();
    ?>

    <!-- content  -->
    <?php

    include_once '../../UxUI-Back/Main/Main_User_Account_Create/JS/User_Registration_A_01_JS.php';
    include_once '../../UxUI-Back/Main/Main_User_Account_Create/User_Registration_A_01.php';

    ?>

    
</body>

</html>