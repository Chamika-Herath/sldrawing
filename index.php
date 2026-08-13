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
            body {
                background-image: url('/assets/images/portrait_background.png') !important;
                background-size: cover !important;
                background-position: center !important;
                background-attachment: fixed !important;
                background-repeat: no-repeat !important;
            }
        </style>
    </head>
    <body>
        <?php
        include_once './UxUI-Back/Needs/header.php';
        include_once './UxUI-Back/Homepage/main-section.php';
        include_once './UxUI-Back/Homepage/video-section.php';
        include_once './UxUI-Back/Homepage/booking-guide.php';
        include_once './UxUI-Back/Homepage/gallery-section.php';
        include_once './UxUI-Back/Homepage/card-section.php';
        include_once './UxUI-Back/Homepage/contact-guide.php';
        ?>
        
        <?php include_once './UxUI-Back/Needs/footer.php'; ?>
    </body>
</html>
