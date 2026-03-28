<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal | Login</title>
    <link rel="icon" type="image/png" href="https://www.svgrepo.com/show/373594/favicon.svg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* ===== GLOBAL COLOR SYSTEM ===== ---------------------------------------------------colors and spacing*/
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
            
            /* Accent Colors */
            --erp-accent-success: #38a169;
            --erp-accent-warning: #d69e2e;
            --erp-accent-error: #e53e3e;
            --erp-accent-info: #3182ce;
            
            /* Social Brand Colors */
            --erp-google: #db4437;
            --erp-microsoft: #00a4ef;
            --erp-facebook: #1877f2;
            
            /* Shadows */
            --erp-shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.1);
            --erp-shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            --erp-shadow-lg: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
            
            /* Border Radius */
            --erp-radius-sm: 4px;
            --erp-radius-md: 8px;
            --erp-radius-lg: 12px;
            
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
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            background: linear-gradient(135deg, #f6f9fc 0%, #edf2f7 100%);
            color: var(--erp-text-primary);
            line-height: 1.5;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: var(--erp-space-xl);
        }
        
        /* ===== LAYOUT CONTAINERS ===== */
        .erp-container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 var(--erp-space-md);
        }
        
        .erp-container--login {
            max-width: 600px;
        }
        
        /* ===== LOGIN CARD ===== */
        .erp-login-card {
            width: 100%;
            background-color: var(--erp-surface);
            border-radius: var(--erp-radius-lg);
            box-shadow: var(--erp-shadow-lg);
            overflow: hidden;
            min-height: auto;
        }
        
        .erp-login-card__header {
            background: linear-gradient(90deg, var(--erp-primary) 0%, var(--erp-primary-dark) 100%);
            color: white;
            padding: var(--erp-space-xl) var(--erp-space-xl) var(--erp-space-lg);
            text-align: center;
            position: relative;
        }
        
        .erp-login-card__logo {
            font-size: 40px;
            margin-bottom: var(--erp-space-sm);
            color: white;
        }
        
        .erp-login-card__title {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: var(--erp-space-xs);
        }
        
        .erp-login-card__subtitle {
            font-size: 14px;
            opacity: 0.9;
            font-weight: 400;
        }
        
        .erp-login-card__body {
            padding: var(--erp-space-xl);
        }
        
        /* ===== FORM COMPONENTS ===== */
        .erp-form {
            width: 100%;
        }
        
        .erp-form__group {
            margin-bottom: var(--erp-space-lg);
        }
        
        .erp-form__label {
            display: block;
            margin-bottom: var(--erp-space-xs);
            font-size: 14px;
            font-weight: 500;
            color: var(--erp-text-secondary);
        }
        
        .erp-form__control {
            width: 100%;
            padding: var(--erp-space-sm) var(--erp-space-md);
            border: 1px solid var(--erp-border);
            border-radius: var(--erp-radius-md);
            font-size: 15px;
            transition: all 0.2s ease;
            background-color: white;
            color: var(--erp-text-primary);
        }
        
        .erp-form__control:hover {
            border-color: var(--erp-border-dark);
        }
        
        .erp-form__control:focus {
            outline: none;
            border-color: var(--erp-primary-light);
            box-shadow: 0 0 0 3px var(--erp-primary-subtle);
        }
        
        .erp-form__control--with-icon {
            padding-left: 44px;
        }
        
        .erp-form__control--with-toggle {
            padding-right: 44px; /* Adjusted for toggle icon */
        }
        
        .erp-form__icon {
            position: absolute;
            left: var(--erp-space-md);
            top: 50%;
            transform: translateY(-50%);
            color: var(--erp-text-tertiary);
            font-size: 16px;
        }
        
        .erp-form__toggle {
            position: absolute;
            right: var(--erp-space-md);
            top: 50%;
            transform: translateY(-50%);
            color: var(--erp-text-tertiary);
            font-size: 16px;
            cursor: pointer;
            transition: color 0.2s;
        }
        
        .erp-form__toggle:hover {
            color: var(--erp-text-secondary);
        }
        
        .erp-form__hint {
            display: block;
            margin-top: 6px;
            font-size: 12px;
            color: var(--erp-text-tertiary);
        }
        
        /* ===== INPUT WRAPPER ===== */
        .erp-input-wrapper {
            position: relative;
        }
        
        /* ===== BUTTON SYSTEM ===== */
        .erp-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: var(--erp-space-sm) var(--erp-space-md);
            border: none;
            border-radius: var(--erp-radius-md);
            font-size: 15px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease;
            text-decoration: none;
            gap: 8px;
            height: 44px;
        }
        
        .erp-btn--primary {
            background-color: var(--erp-primary);
            color: white;
        }
        
        .erp-btn--primary:hover {
            background-color: var(--erp-primary-dark);
        }
        
        .erp-btn--primary:focus {
            outline: none;
            box-shadow: 0 0 0 3px var(--erp-primary-subtle);
        }
        
        .erp-btn--secondary {
            background-color: transparent;
            color: var(--erp-text-secondary);
            border: 1px solid var(--erp-border);
        }
        
        .erp-btn--secondary:hover {
            background-color: var(--erp-surface-alt);
            border-color: var(--erp-border-dark);
        }
        
        .erp-btn--google {
            background-color: white;
            color: var(--erp-text-primary);
            border: 1px solid var(--erp-border);
        }
        
        .erp-btn--google:hover {
            background-color: var(--erp-surface-alt);
            border-color: var(--erp-google);
        }
        
        .erp-btn--microsoft {
            background-color: white;
            color: var(--erp-text-primary);
            border: 1px solid var(--erp-border);
        }
        
        .erp-btn--microsoft:hover {
            background-color: var(--erp-surface-alt);
            border-color: var(--erp-microsoft);
        }
        
        .erp-btn--facebook {
            background-color: white;
            color: var(--erp-text-primary);
            border: 1px solid var(--erp-border);
        }
        
        .erp-btn--facebook:hover {
            background-color: var(--erp-surface-alt);
            border-color: var(--erp-facebook);
        }
        
        .erp-btn--block {
            display: flex;
            width: 100%;
        }
        
        /* ===== SOCIAL LOGIN GRID ===== */
        .erp-social-login {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: var(--erp-space-sm);
            margin-bottom: var(--erp-space-xl);
        }
        
        .erp-social-login__item {
            text-align: center;
        }
        
        .erp-social-login__icon {
            font-size: 18px;
        }
        
        .erp-social-login__icon--google {
            color: var(--erp-google);
        }
        
        .erp-social-login__icon--microsoft {
            color: var(--erp-microsoft);
        }
        
        .erp-social-login__icon--facebook {
            color: var(--erp-facebook);
        }
        
        /* ===== DIVIDER ===== */
        .erp-divider {
            display: flex;
            align-items: center;
            margin: var(--erp-space-lg) 0;
        }
        
        .erp-divider__line {
            flex: 1;
            height: 1px;
            background-color: var(--erp-border);
        }
        
        .erp-divider__text {
            padding: 0 var(--erp-space-md);
            color: var(--erp-text-tertiary);
            font-size: 14px;
            font-weight: 500;
        }
        
        /* ===== UTILITY CLASSES ===== */
        .erp-text-center {
            text-align: center;
        }
        
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
        
        .erp-text-sm {
            font-size: 14px;
        }
        
        .erp-text-tertiary {
            color: var(--erp-text-tertiary);
        }
        
        .erp-link {
            color: var(--erp-primary);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.2s;
        }
        
        .erp-link:hover {
            color: var(--erp-primary-dark);
            text-decoration: underline;
        }
        
        /* ===== FOOTER ===== */
        .erp-login-card__footer {
            padding: var(--erp-space-lg) var(--erp-space-xl);
            background-color: var(--erp-surface-alt);
            border-top: 1px solid var(--erp-border);
            text-align: center;
        }
        
        .erp-footer__copyright {
            font-size: 12px;
            color: var(--erp-text-tertiary);
            margin-bottom: var(--erp-space-xs);
        }
        
        .erp-footer__version {
            font-size: 11px;
            color: var(--erp-text-tertiary);
            opacity: 0.8;
        }
        
        /* ===== RESPONSIVE ADJUSTMENTS ===== */
        @media (max-width: 640px) {
            .erp-login-card__header,
            .erp-login-card__body {
                padding: var(--erp-space-lg);
            }
            
            .erp-login-card__footer {
                padding: var(--erp-space-md) var(--erp-space-lg);
            }
            
            .erp-social-login {
                grid-template-columns: 1fr;
                gap: var(--erp-space-xs);
            }
            
            body {
                padding: var(--erp-space-sm);
            }
        }
    </style>
</head>
<body>
    <?php  include_once './UxUI-Back/Common/header.php'; ?>
    <div class="erp-container erp-container--login">
        <div class="erp-login-card">
            <!-- Header Section: Displays company branding and login title -->
            <div class="erp-login-card__header">
                <h1 class="erp-login-card__title">Company Name</h1>
                <p class="erp-login-card__subtitle">Enterprise Resource Planning System</p>
            </div>
            
            <!-- Main Body: Contains the login form and options -->
            <div class="erp-login-card__body">
                <!-- Traditional Login Form: Allows users to enter credentials -->
                <form class="erp-form" method="post" action="#">
                    <div class="erp-form__group">
                        <label class="erp-form__label">Corporate Email</label>
                        <div class="erp-input-wrapper">
                            <i class="fas fa-envelope erp-form__icon"></i>
                            <input 
                                type="email" 
                                class="erp-form__control erp-form__control--with-icon" 
                                name="email" 
                                placeholder="name@company.com"
                                required
                                aria-label="Corporate Email">
                        </div>
                        <span class="erp-form__hint">Enter your corporate email address</span>
                    </div>
                    
                    <div class="erp-form__group">
                        <label class="erp-form__label">Password</label>
                        <div class="erp-input-wrapper">
                            <i class="fas fa-lock erp-form__icon"></i>
                            <input 
                                type="password" 
                                class="erp-form__control erp-form__control--with-icon erp-form__control--with-toggle" 
                                name="password" 
                                placeholder="••••••••"
                                required
                                id="password-input"
                                aria-label="Password">
                            <!-- Password Toggle: Click to show/hide password -->
                            <i class="fas fa-eye erp-form__toggle" id="password-toggle" onclick="togglePassword()" aria-label="Toggle password visibility"></i>
                        </div>
                        <span class="erp-form__hint">Minimum 8 characters with mixed case, numbers & symbols</span>
                    </div>
                    
                    <div class="erp-form__group erp-mt-lg">
                        <button type="submit" class="erp-btn erp-btn--primary erp-btn--block">
                            <i class="fas fa-sign-in-alt"></i>
                            <span>Sign In to Portal</span>
                        </button>
                    </div>
                    
                    <!-- Divider: Separates traditional login from social options -->
                    <div class="erp-divider">
                        <div class="erp-divider__line"></div>
                        <div class="erp-divider__text">OR Sign In With</div>
                        <div class="erp-divider__line"></div>
                    </div>
                          
                    <!-- Social Login Options: Alternative login methods -->
                    <div class="erp-social-login">
                        <div class="erp-social-login__item">
                            <button class="erp-btn erp-btn--google erp-btn--block" type="button">
                                <i class="fab fa-google erp-social-login__icon erp-social-login__icon--google"></i>
                                <span>Google</span>
                            </button>
                        </div>
                        <div class="erp-social-login__item">
                            <button class="erp-btn erp-btn--microsoft erp-btn--block" type="button">
                                <i class="fab fa-microsoft erp-social-login__icon erp-social-login__icon--microsoft"></i>
                                <span>Microsoft</span>
                            </button>
                        </div>
                        <div class="erp-social-login__item">
                            <button class="erp-btn erp-btn--facebook erp-btn--block" type="button">
                                <i class="fab fa-facebook-f erp-social-login__icon erp-social-login__icon--facebook"></i>
                                <span>Facebook</span>
                            </button>
                        </div>
                    </div>
                
                    <!-- Forgot Password Link: Helps users reset password -->
                    <div class="erp-text-center erp-mt-md">
                        <a href="#" class="erp-link erp-text-sm">Forgot your password?</a>
                    </div>
                    
                    <!-- Registration Option: For new users -->
                    <div class="erp-text-center erp-mt-xl">
                        <p class="erp-text-tertiary erp-text-sm erp-mb-sm">Don't have an account?</p>
                        <button class="erp-btn erp-btn--secondary" type="button">
                            <i class="fas fa-user-plus"></i>
                            <span>Register Now</span>
                        </button>
                    </div>
                </form>
            </div>
            
            <!-- Footer: Displays copyright and version info -->
            <div class="erp-login-card__footer">
                <p class="erp-footer__copyright" id="copyright">© <span id="current-year"></span> Enterprise Resource Planning System v4.2.1</p>
            </div>
        </div>
    </div>

    <!-- JavaScript for dynamic year and password toggle -->
    <script>
        // Dynamically set the current year in the copyright
        document.getElementById('current-year').textContent = new Date().getFullYear();

        // Function to toggle password visibility
        function togglePassword() {
            const passwordInput = document.getElementById('password-input');
            const toggleIcon = document.getElementById('password-toggle');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }
    </script>
    <?php  include_once './UxUI-Back/Common/header.php'; ?>
</body>
</html>
