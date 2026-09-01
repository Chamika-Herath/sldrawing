<?php
// Enforce 301 redirect from old domain to new domain for SEO passing
if (isset($_SERVER['HTTP_HOST']) && $_SERVER['HTTP_HOST'] === 'drawing.heraforce.com') {
    header('Location: https://sldrawing.com' . $_SERVER['REQUEST_URI'], true, 301);
    exit;
}
if (session_status() === PHP_SESSION_NONE) {
    $timeout_duration = 3600 * 24; // 24 hours
    ini_set('session.gc_maxlifetime', $timeout_duration);
    session_start();
}


$time = $_SERVER['REQUEST_TIME'];
$_SESSION['LAST_ACTIVITY'] = $time;



$online_state = false;
$online_exnction = ".php";
$online_offline_extention = ".php";










// $home_page_url = "http://localhost:3000/";
// $home_page = "http://localhost:3000/";



$home_page_url = "https://sldrawing.com/";
$home_page = "https://sldrawing.com/";





















$User_login_url = "UxUi/Main/";


//---------------local host-------------------------------------
$total_url = $_SERVER['REQUEST_URI']; // e.g.  /folder/sub/page.php

$pth = "";

// split the path into parts
$parts = explode("/", trim($total_url, "/")); // ["folder", "sub", "page.php"]

// remove the last element (the file itself)
array_pop($parts);

// count how many folders deep
$count = count($parts);

// buil$home_page_urld ../
for ($i = 0; $i < $count; $i++) {
    $pth .= "../";
}

//-------------------online-------------------------------


$pth_php = dirname(__FILE__);

//---------------local host-------------------------------------
$_SESSION['pth'] = $pth;

$_SESSION['pth_php'] = $pth_php;

if (!isset($_SESSION['user_id'])) {
    $s_cook = "0";
    if (isset($_SESSION['user_main_cook_id'])) {
        $s_cook = $_SESSION['user_main_cook_id'];
    } else if (isset($_COOKIE['main_user_account_cook'])) {
        $s_cook = $_COOKIE['main_user_account_cook'];
        $_SESSION['user_main_cook_id'] = $s_cook;
    }
    
    if ($s_cook !== "0") {
        $db_path_sess = dirname(__FILE__) . '/DB.php';
        $cook_path_sess = dirname(__FILE__) . '/../../Controllers/Main/Cook_Managment/Cook_Managing.php';
        
        if (file_exists($db_path_sess) && file_exists($cook_path_sess)) {
            include_once $db_path_sess;
            include_once $cook_path_sess;
            
            $cookie_check_obj_sess = new Cook_Management($s_cook);
            if ($cookie_check_obj_sess->check_login_availability()) {
                $_SESSION['user_id'] = $cookie_check_obj_sess->get_user_id();
                $_SESSION['user_name'] = $cookie_check_obj_sess->get_email();
            }
        }
    }
}

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : "0";
$user_main_cook_id = isset($_SESSION['user_main_cook_id']) ? $_SESSION['user_main_cook_id'] : "0";

//----------------------company data--------------------------------
