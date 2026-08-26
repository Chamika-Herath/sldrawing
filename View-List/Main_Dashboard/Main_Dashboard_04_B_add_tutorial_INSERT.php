<?php
include_once '../../imports/need/session_setup.php';
include_once '../../imports/need/DB.php';
include_once '../../Controllers/Main/sld_tutorials/sld_tutorials_ADD_UPDATE.php';

$json = array();

// Ensure user is highly authenticated and their token exists in the session matrix
if (!isset($_SESSION['user_id'])) {
    $state['error'] = "1";
    $state['message'] = "Unauthorized modification block! Auth Session Expired.";
    $json[] = $state;
    echo json_encode($json);
    exit;
}

$id = isset($_POST['id']) ? intval($_POST['id']) : 0;
$title = isset($_POST['title']) ? trim($_POST['title']) : '';
$description = isset($_POST['description']) ? trim($_POST['description']) : '';
$difficulty = isset($_POST['difficulty']) ? trim($_POST['difficulty']) : '';
$video_url = isset($_POST['video_url']) ? trim($_POST['video_url']) : '';
$seo_keywords = isset($_POST['seo_keywords']) ? trim($_POST['seo_keywords']) : '';
$seo_description = isset($_POST['seo_description']) ? trim($_POST['seo_description']) : '';

$thumbnail_url = isset($_POST['old_thumbnail']) ? trim($_POST['old_thumbnail']) : "";
if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] == 0) {
    $upload_dir = "../../assets/images/"; 
    if (!is_dir($upload_dir)) mkdir($upload_dir, 0777, true);
    
    // Generate unique name utilizing time and random tokens
    $ext = pathinfo($_FILES['thumbnail']['name'], PATHINFO_EXTENSION);
    $filename = "tutorial_thumb_" . time() . "_" . rand(100, 999) . "." . $ext;
    
    // Move to permanent asset dir
    if (move_uploaded_file($_FILES['thumbnail']['tmp_name'], $upload_dir . $filename)) {
        // Save relative path exactly matching current UI structural calls naturally pointing out of Main_Dashboard_04...
        $thumbnail_url = "../../../assets/images/" . $filename;
    }
}

if (empty($title) || empty($description)) {
    $state['error'] = "1";
    $state['message'] = "Data validation failure: Tutorial Title and Custom Layout data cannot be totally empty.";
    $json[] = $state;
    echo json_encode($json);
    exit;
}

$tutorial_adder = new sld_tutorials_ADD_UPDATE();
$tutorial_adder->set_id($id);
$tutorial_adder->set_title($title);
$tutorial_adder->set_description($description);
$tutorial_adder->set_difficulty_level($difficulty);
$tutorial_adder->set_video_url($video_url);
$tutorial_adder->set_seo_keywords($seo_keywords);
$tutorial_adder->set_seo_description($seo_description);

if ($thumbnail_url !== "") {
    $tutorial_adder->set_thumbnail_url($thumbnail_url);
}
$tutorial_adder->set_main_user_login_id($_SESSION['user_id']); // Track which account generated this

if ($tutorial_adder->process_update()) {
    $state['error'] = "0";
    $state['message'] = "Your tutorial successfully passed schema validation and was published remotely!";
} else {
    $state['error'] = "1";
    $state['message'] = "Underlying Table Integrity Error: Ensure sld_tutorials was created correctly locally.";
}

$json[] = $state;
echo json_encode($json);
?>
