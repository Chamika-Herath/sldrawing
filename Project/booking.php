<!DOCTYPE html>
<?php include_once './imports/need/session_setup.php'; ?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <link rel="icon" type="image/png"  href="./assets/images/logo.png"> -->

        <?php 
        include_once './Meta_Tag/pagers/booking.php';
        include_once './Meta_Tag/Meta_Tag.php'; 
         ?>
        <title>Booking</title>
    </head>
    <style>
        *{
            margin:0;
            padding: 0;
        }
        body{
            background-color: #000;
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



         /* Add smooth scrolling to the entire HTML */
            html {
                scroll-behavior: smooth;
            }

            
            /* #booking-steps {
               
                min-height: 100vh;
                
                
            } */

            /* Optional: Add a highlight effect when section is scrolled to */
            #booking-steps:target {
                animation: highlight 2s ease;
            }

            @keyframes highlight {
                0% { background-color: transparent; }
                50% { background-color: rgba(67, 97, 238, 0.1); }
                100% { background-color: transparent; }
            }
        
    </style>
    <body>
        <?php
        include_once './UxUI-Back/Needs/header.php';
        include_once './UxUI-Back/Booking-page/booking-main.php';
        include_once './UxUI-Back/Booking-page/description.php';
        
        
        ?>

        <section id="booking-steps">
        <?php
        include_once './UxUI-Back/Booking-page/booking-steps.php';
        ?>
        </section>


        <?php
        include_once './UxUI-Back/Booking-page/calender-section.php';
        include_once './UxUI-Back/Booking-page/booking-section.php';
        ?>
    </body>
</html>
