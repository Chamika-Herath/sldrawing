<?php include_once './imports/need/session_setup.php'; ?>
<!DOCTYPE html>

<html lang="en">
    <head>
        <?php 
        $get_title = "SLdrawing - Drawing Tutorials & Digital Art by Chamika Herath | Heraforce";
        $get_dis = "Master digital and traditional drawing with expert-led tutorials by Chamika Herath at Heraforce. Join the SLdrawing community and refine your artistic vision today.";
        $get_key_words = "Chamika Herath, Heraforce, art, drawing, tutorials, portraits, grid drawing, AI grader, digital art Sri Lanka, learn to draw, pencil drawing, digital portrait";
        include_once './Meta_Tag/Meta_Tag.php'; 
        ?>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,800;1,400&family=Inter:wght@400;600;800&display=swap');
        </style>
    </head>
    <body>
        <?php
        include_once './UxUI-Back/Needs/header.php';
        ?>
        <main>
            <?php
            include_once './UxUI-Back/Homepage/main-section.php';
            include_once './UxUI-Back/Homepage/video-section.php';
            include_once './UxUI-Back/Homepage/booking-guide.php';
            include_once './UxUI-Back/Homepage/gallery-section.php';
            include_once './UxUI-Back/Homepage/card-section.php';
            include_once './UxUI-Back/Homepage/contact-guide.php';
            ?>
        </main>
        <?php include_once './UxUI-Back/Needs/footer.php'; ?>
    </body>
</html>
