<?php include_once '../../imports/need/session_setup.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include_once '../../Meta_Tag/Meta_Tag.php'; ?>
    <style>
        .login-card {
            width: 100%;
            max-width: 450px;
            padding: 50px;
            border-radius: 40px;
            margin-top: 100px;
        }
    </style>
</head>
<body style="display: flex; justify-content: center; background: var(--background);">
    <?php include_once '../../UxUI-Back/Needs/header.php'; ?>

    <div class="glass login-card" style="background: #fff;">
        <h2 style="font-size: 2.5rem; margin-bottom: 30px; color: var(--text);">Artist <span style="color: var(--primary);">Login</span></h2>
        <form action="User-Login.php" method="POST">
            <div style="margin-bottom: 20px;">
                <input type="email" placeholder="Email Address" style="width: 100%; padding: 15px; border-radius: 10px; background: var(--secondary); color: var(--text); border: 1px solid var(--glass-border); outline: none;">
            </div>
            <div style="margin-bottom: 30px;">
                <input type="password" placeholder="Password" style="width: 100%; padding: 15px; border-radius: 10px; background: var(--secondary); color: var(--text); border: 1px solid var(--glass-border); outline: none;">
            </div>
            <button type="submit" class="btn" style="width: 100%; padding: 15px; background: var(--primary); border: none; color: #fff; font-weight: 700; border-radius: 10px; cursor: pointer;">Sign In</button>
        </form>
        <p style="text-align: center; margin-top: 30px; color: var(--text-dim);">New artist? <a href="User-Registration.php" style="color: var(--primary); text-decoration: none; font-weight: 700;">Register here</a></p>
    </div>
</body>
</html>
