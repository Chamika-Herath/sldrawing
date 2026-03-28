<!DOCTYPE html>
<?php include_once './imports/need/session_setup.php'; ?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <link rel="icon" type="image/png"  href="./assets/images/logo.png"> -->
        <title>Contact</title>
    </head>
    <style>
        *{
            margin:0;
            padding: 0;
        }
            /* Standard Thin Scrollbar (Firefox) */
        * {
            scrollbar-width: thin;
            scrollbar-color: #bc13fe #0d0015;
        }

        /* Standard Thin Scrollbar (Chrome/Edge/Safari) */
        ::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-track {
            background: #0d0015;
        }
        ::-webkit-scrollbar-thumb {
            background-color: #bc13fe;
            border-radius: 10px;
            border: 2px solid #0d0015;
        }
        body{
            background-color: #000;
        }

    </style>
    <body>
        <?php
        include_once './UxUI-Back/Needs/header.php';
        include_once './UxUI-Back/Contact/contact-main.php';

        ?>
    </body>
</html>
