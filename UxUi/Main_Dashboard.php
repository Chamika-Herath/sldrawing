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

            include_once '../UxUI-Back/Main_Dashboard/Main_Dashboard_02/Main_Dashboard_02_A_member_list.php';

            include_once '../UxUI-Back/Main_Dashboard/Main_Dashboard_03_projects/Main_Dashboard_03_A_projects_list.php';

            include_once '../UxUI-Back/Main_Dashboard/Main_Dashboard_04_tutorials/Main_Dashboard_04_A_tutorials_list.php';

            include_once '../UxUI-Back/Main_Dashboard/Main_Dashboard_05_yt_videos/Main_Dashboard_05_A_yt_videos.php';



      
           


            ?>

        <?php 
        
        //include_once '../includes/footer2.php'; 
        
        ?>
</body>

</html>