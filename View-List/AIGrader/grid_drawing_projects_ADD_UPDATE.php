<?php

include_once '../../imports/need/session_setup.php';
include_once '../../imports/need/DB.php';
include_once '../../Controllers/grid_drawing_projects/grid_drawing_projects_ADD_UPDATE.php';
include_once '../../imports/Company_Info/Company_Info_Variable_List.php';
include_once '../../imports/security/encrypt_decrypt.php';
include_once '../../imports/security/key_list.php';
include_once '../../Controllers/Main/Cook_Managment/Cook_Managing.php';

$json = array();
$state = array();
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

    $project_name = isset($_POST['project_name']) ? $_POST['project_name'] : '';
    
    // Handle file upload
    $reference_img_url = '';
    if (isset($_FILES['reference_img']) && $_FILES['reference_img']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = '../../assets/images/projects/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        
        $file_tmp = $_FILES['reference_img']['tmp_name'];
        // Use a unique name to prevent overwriting
        $file_name = time() . '_' . preg_replace("/[^a-zA-Z0-9.-]/", "_", basename($_FILES['reference_img']['name']));
        $target_file = $upload_dir . $file_name;
        
        if (move_uploaded_file($file_tmp, $target_file)) {
            $reference_img_url = 'assets/images/projects/' . $file_name;
        } else {
            $json['status'] = 'error';
            $json['message'] = 'Failed to move uploaded file.';
            echo json_encode($json);
            exit;
        }
    } else {
        $json['status'] = 'error';
        $json['message'] = 'No valid reference image uploaded.';
        echo json_encode($json);
        exit;
    }

    $obj = new grid_drawing_projects_ADD_UPDATE($main_user_login_id);
    $obj->set_data($project_name, $reference_img_url, '', 0, 0, 0);
    $obj->is_step_01_complete();
    $result = $obj->process_new_record();

    if ($result) {
        $json['status'] = 'success';
        $json['id'] = $obj->get_id();
        $json['message'] = 'Project saved successfully.';
    } else {
        $json['status'] = 'error';
        $json['message'] = $obj->get_error();
    }
} else {
    $json['status'] = 'error';
    $json['message'] = 'Invalid request method.';
}

echo json_encode($json);
?>
