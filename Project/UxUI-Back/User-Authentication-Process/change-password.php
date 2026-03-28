<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ERP Admin Portal | Change Password</title>
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
        
        .erp-btn--block {
            display: flex;
            width: 100%;
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
            
            body {
                padding: var(--erp-space-sm);
            }
        }
    </style>
</head>
<body>
    <div class="erp-container erp-container--login">
        <div class="erp-login-card">
            <!-- Header Section: Displays company branding and change password title -->
            <div class="erp-login-card__header">
                <h1 class="erp-login-card__title">Change Password</h1>
                <p class="erp-login-card__subtitle">Update your account password securely</p>
            </div>
            
            <!-- Main Body: Contains the change password form -->
            <div class="erp-login-card__body">
                <!-- Change Password Form: Allows users to update their password -->
                <form class="erp-form" method="post" action="#" id="change-password-form">
                    <div class="erp-form__group">
                        <label class="erp-form__label">Current Password</label>
                        <div class="erp-input-wrapper">
                            <i class="fas fa-lock erp-form__icon"></i>
                            <input 
                                type="password" 
                                class="erp-form__control erp-form__control--with-icon erp-form__control--with-toggle" 
                                name="current-password" 
                                placeholder="••••••••"
                                required
                                id="current-password"
                                aria-label="Current Password">
                            <!-- Password Toggle: Click to show/hide current password -->
                            <i class="fas fa-eye erp-form__toggle" id="current-toggle" onclick="togglePassword('current-password', 'current-toggle')" aria-label="Toggle current password visibility"></i>
                        </div>
                        <span class="erp-form__hint">Enter your existing password</span>
                    </div>
                    
                    <div class="erp-form__group">
                        <label class="erp-form__label">New Password</label>
                        <div class="erp-input-wrapper">
                            <i class="fas fa-key erp-form__icon"></i>
                            <input 
                                type="password" 
                                class="erp-form__control erp-form__control--with-icon erp-form__control--with-toggle" 
                                name="new-password" 
                                placeholder="••••••••"
                                required
                                id="new-password"
                                aria-label="New Password">
                            <!-- Password Toggle: Click to show/hide new password -->
                            <i class="fas fa-eye erp-form__toggle" id="new-toggle" onclick="togglePassword('new-password', 'new-toggle')" aria-label="Toggle new password visibility"></i>
                        </div>
                        <span class="erp-form__hint">Minimum 8 characters with mixed case, numbers & symbols</span>
                    </div>
                    
                    <div class="erp-form__group">
                        <label class="erp-form__label">Confirm New Password</label>
                        <div class="erp-input-wrapper">
                            <i class="fas fa-check-circle erp-form__icon"></i>
                            <input 
                                type="password" 
                                class="erp-form__control erp-form__control--with-icon erp-form__control--with-toggle" 
                                name="confirm-password" 
                                placeholder="••••••••"
                                required
                                id="confirm-password"
                                aria-label="Confirm New Password">
                            <!-- Password Toggle: Click to show/hide confirm password -->
                            <i class="fas fa-eye erp-form__toggle" id="confirm-toggle" onclick="togglePassword('confirm-password', 'confirm-toggle')" aria-label="Toggle confirm password visibility"></i>
                        </div>
                        <span class="erp-form__hint">Re-enter your new password to confirm</span>
                    </div>
                    
                    <div class="erp-form__group erp-mt-lg">
                        <button type="submit" class="erp-btn erp-btn--primary erp-btn--block">
                            <i class="fas fa-save"></i>
                            <span>Update Password</span>
                        </button>
                    </div>
                    
                    <!-- Error Message Placeholder: Display if passwords don't match (can be handled via JS) -->
                    <div class="erp-text-center erp-mt-md" id="error-message" style="display: none; color: var(--erp-accent-error);">
                        <p class="erp-text-sm">Passwords do not match. Please try again.</p>
                    </div>
                    
                    <!-- Back to Dashboard Link: Allows users to return without changing -->
                    <div class="erp-text-center erp-mt-xl">
                        <a href="dashboard.html" class="erp-link erp-text-sm">Back to Dashboard</a>
                    </div>
                </form>
            </div>
            
            <!-- Footer: Displays copyright and version info -->
            <div class="erp-login-card__footer">
                <p class="erp-footer__copyright" id="copyright">© <span id="current-year"></span> Enterprise Resource Planning System v4.2.1</p>
            </div>
        </div>
    </div>

    <!-- JavaScript for dynamic year, password toggles, and basic validation -->
    <script>
        // Dynamically set the current year in the copyright
        document.getElementById('current-year').textContent = new Date().getFullYear();

        // Function to toggle password visibility
        function togglePassword(inputId, toggleId) {
            const passwordInput = document.getElementById(inputId);
            const toggleIcon = document.getElementById(toggleId);
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

        // Basic form validation: Check if new and confirm passwords match
        document.getElementById('change-password-form').addEventListener('submit', function(event) {
            const newPassword = document.getElementById('new-password').value;
            const confirmPassword = document.getElementById('confirm-password').value;
            const errorMessage = document.getElementById('error-message');
            
            if (newPassword !== confirmPassword) {
                event.preventDefault(); // Prevent submission
                errorMessage.style.display = 'block';
            } else {
                errorMessage.style.display = 'none';
                // In a real app, submit to backend; here, just prevent for demo
                event.preventDefault();
                alert('Password updated successfully!'); // Demo: Replace with actual success handling
            }
        });
    </script>
</body>
</html>
