<?php

if (session_status() === PHP_SESSION_NONE) {
    $timeout_duration = 3600 * 24; // 24 hours
    ini_set('session.gc_maxlifetime', $timeout_duration);
    session_start();
}


$time = $_SERVER['REQUEST_TIME'];
$_SESSION['LAST_ACTIVITY'] = $time;


$pth = "";
$online_state = false;
$online_exnction = ".php";
// $online_offline_extention = "";
$pth_php = "";

$online_offline_extention = ".php";

$home_page = "http://localhost:3000/";
$User_login_url = "UxUi/Main/";
$home_page_url = $home_page . "index" . $online_offline_extention;

// $home_page_url = "http://localhost:3000/";

//---------------local host-------------------------------------
$total_url = $_SERVER['REQUEST_URI']; // e.g.  /folder/sub/page.php

$pth = "";

// split the path into parts
$parts = explode("/", trim($total_url, "/")); // ["folder", "sub", "page.php"]

// remove the last element (the file itself)
array_pop($parts);

// count how many folders deep
$count = count($parts);

// build ../
for ($i = 0; $i < $count; $i++) {
    $pth .= "../";
}

//-------------------online-------------------------------


$pth_php = dirname(__FILE__);

//---------------local host-------------------------------------
$_SESSION['pth'] = $pth;

$_SESSION['pth_php'] = $pth_php;

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : "0";
$user_main_cook_id = isset($_SESSION['user_main_cook_id']) ? $_SESSION['user_main_cook_id'] : "0";

//----------------------company data--------------------------------
