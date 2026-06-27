<?php
include_once '../../imports/need/session_setup.php';
include_once '../../imports/need/DB.php';
include_once '../../Controllers/grid_drawing_projects/grid_drawing_projects_ADD_UPDATE.php';
include_once '../../Controllers/project_score_histry/project_score_histry_ADD_UPDATE.php';
include_once '../../imports/Company_Info/Company_Info_Variable_List.php';
include_once '../../imports/security/encrypt_decrypt.php';
include_once '../../imports/security/key_list.php';
include_once '../../Controllers/Main/Cook_Managment/Cook_Managing.php';

$json = array();
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Get user login id from session or cookie
    $get_cookie_id = "0";
    if (isset($_SESSION['user_main_cook_id'])) {
        $get_cookie_id = $_SESSION['user_main_cook_id'];
    } else if (isset($_COOKIE['main_user_account_cook'])) {
        $get_cookie_id = $_COOKIE['main_user_account_cook'];
        $_SESSION['user_main_cook_id'] = $get_cookie_id;
    }

    $cookie_check_obj = new Cook_Management($get_cookie_id);
    if ($cookie_check_obj->check_login_availability()) {
        $main_user_login_id = $cookie_check_obj->get_user_id();
    } else {
        $json['status'] = 'error';
        $json['message'] = 'User is not logged in or invalid session.';
        echo json_encode($json);
        exit;
    }

    $project_id = isset($_POST['project_id']) ? $_POST['project_id'] : '';
    $sketch_image_base64 = isset($_POST['sketch_image']) ? $_POST['sketch_image'] : '';

    if (empty($project_id) || empty($sketch_image_base64)) {
        $json['status'] = 'error';
        $json['message'] = 'Project ID or image data is missing.';
        echo json_encode($json);
        exit;
    }

    // Process the new base64 image (the sketch)
    $image_parts = explode(";base64,", $sketch_image_base64);
    if(count($image_parts) < 2) {
        $json['status'] = 'error';
        $json['message'] = 'Invalid image format.';
        echo json_encode($json);
        exit;
    }
    $image_base64 = base64_decode($image_parts[1]);
    
    $file_name = uniqid() . '_sketch.png'; 
    $file_path = '../../assets/images/projects/' . $file_name;

    if (!is_dir('../../assets/images/projects/')) {
        mkdir('../../assets/images/projects/', 0777, true);
    }

    if (file_put_contents($file_path, $image_base64)) {
        $sketch_img_url = 'assets/images/projects/' . $file_name;
    } else {
        $json['status'] = 'error';
        $json['message'] = 'Failed to save sketch image.';
        echo json_encode($json);
        exit;
    }

    $data_base_obj = new DataBase();

    // Calculate attempt number
    $sql_attempts = "SELECT count(id) as total_attempts FROM project_score_histry WHERE grid_drawing_projects_id = '" . $project_id . "' AND ast='1'";
    $res_attempts = $data_base_obj->get_result($sql_attempts);
    $attempt_count = 1;
    if ($res_attempts && $res_attempts->num_rows > 0) {
        $row = $res_attempts->fetch_assoc();
        $attempt_count = intval($row['total_attempts']) + 1;
    }

    // Insert into project_score_histry
    $history_obj = new project_score_histry_ADD_UPDATE($main_user_login_id);
    $history_obj->set_data($attempt_count, 0, $sketch_img_url, "", $project_id);
    $history_result = $history_obj->process_new_record();

    if (!$history_result) {
        $json['status'] = 'error';
        $json['message'] = 'Failed to save score history: ' . $history_obj->get_error();
        echo json_encode($json);
        exit;
    }

    // Update the original project to mark step 4 as complete
    $proj_obj = new grid_drawing_projects_ADD_UPDATE($main_user_login_id);
    $proj_obj->set_id($project_id);
    $proj_obj->is_step_04_complete();
    $update_result = $proj_obj->process_update_record();

    if ($update_result) {
        $json['status'] = 'success';
        $json['score_histry_id'] = $history_obj->get_id();
        $json['message'] = 'Step 4 completed and sketch saved successfully.';
    } else {
        $json['status'] = 'error';
        $json['message'] = 'Failed to update project step completion: ' . $proj_obj->get_error();
    }

} else {
    $json['status'] = 'error';
    $json['message'] = 'Invalid request method.';
}

echo json_encode($json);
?>
