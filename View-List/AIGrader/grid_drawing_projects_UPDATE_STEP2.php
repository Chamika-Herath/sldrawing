<?php
include_once '../../imports/need/session_setup.php';
include_once '../../imports/need/DB.php';
include_once '../../Controllers/grid_drawing_projects/grid_drawing_projects_ADD_UPDATE.php';
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
    $edited_image_base64 = isset($_POST['edited_image']) ? $_POST['edited_image'] : '';

    if (empty($project_id) || empty($edited_image_base64)) {
        $json['status'] = 'error';
        $json['message'] = 'Project ID or image data is missing.';
        echo json_encode($json);
        exit;
    }

    // Get the old image to delete
    $data_base_obj = new DataBase();
    $sql = "SELECT reference_img_url FROM grid_drawing_projects WHERE id = '" . $project_id . "' AND main_user_login_id = '" . $main_user_login_id . "'";
    $result = $data_base_obj->get_result($sql);
    
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $old_img_url = $row['reference_img_url'];
        if (!empty($old_img_url) && file_exists('../../' . $old_img_url)) {
            unlink('../../' . $old_img_url); // Delete the previous image
        }
    } else {
        $json['status'] = 'error';
        $json['message'] = 'Project not found or unauthorized.';
        echo json_encode($json);
        exit;
    }

    // Process the new base64 image
    // DataURL format: data:image/png;base64,...
    $image_parts = explode(";base64,", $edited_image_base64);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
    $image_base64 = base64_decode($image_parts[1]);
    
    $file_name = uniqid() . '.png'; // Saving as PNG because canvas exports as PNG
    $file_path = '../../assets/images/projects/' . $file_name;

    if (!is_dir('../../assets/images/projects/')) {
        mkdir('../../assets/images/projects/', 0777, true);
    }

    if (file_put_contents($file_path, $image_base64)) {
        $new_reference_img_url = 'assets/images/projects/' . $file_name;
    } else {
        $json['status'] = 'error';
        $json['message'] = 'Failed to save edited image.';
        echo json_encode($json);
        exit;
    }

    // Update the database using the ADD_UPDATE controller
    $obj = new grid_drawing_projects_ADD_UPDATE($main_user_login_id);
    $obj->set_id($project_id);
    $obj->set_reference_img_url($new_reference_img_url);
    $obj->is_step_02_complete(); // Marks step 2 complete
    $update_result = $obj->process_update_record();

    if ($update_result) {
        $json['status'] = 'success';
        $json['message'] = 'Step 2 completed and image saved successfully.';
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
