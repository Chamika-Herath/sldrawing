<?php 
include_once '../imports/need/session_setup.php';
include_once '../imports/need/DB.php';
include_once '../Controllers/Main/Cook_Managment/Cook_Managing.php';

?>





<!DOCTYPE html>
<html lang="en">




<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    

</head>

<body>


<script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function() {
            Main_dashboard_close_all();
            Main_Dashboard_01_A_OPEN();
        });
    </script>

    
        
        <?php 
        include_once '../imports/need/DB.php';
        include_once '../Controllers/Main/Cook_Managment/Cook_Managing.php';
        //include_once '../UxUI-Back/Includes/Sidebar-loader.php';

        

        include_once '../UxUI-Back/Needs/Check_User_Login.php';
        //include_once '../UxUI-Back/Needs/Collection_dashboard_Pre_loader.php';
        ?>
        
            <?php
           
            include_once '../UxUI-Back/Main_Dashboard/Main_Dashboard_JS.php';

            include_once '../UxUI-Back/Main_Dashboard/Main_Dashboard_01_dashboard/Main_Dashboard_01_dashboard_summery.php';

      
           


            ?>

        <?php 
        
        //include_once '../includes/footer2.php'; 
        
        ?>
</body>

</html>