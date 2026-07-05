<?php
include_once '../../imports/need/session_setup.php';
include_once '../../imports/need/DB.php';
include_once '../../imports/Company_Info/Company_Info_Variable_List.php';
include_once '../../imports/security/encrypt_decrypt.php';
include_once '../../imports/security/key_list.php';
include_once '../../Controllers/Main/Cook_Managment/Cook_Managing.php';

$json = array();
if ($_SERVER["REQUEST_METHOD"] === "POST") {

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

    $id = isset($_POST['id']) ? $_POST['id'] : null;

    if ($id) {
        $db = new DataBase();
        // Check if the project belongs to the user
        $check_sql = "SELECT id FROM grid_drawing_projects WHERE id='" . $id . "' AND main_user_login_id='" . $main_user_login_id . "'";
        $result = $db->get_result($check_sql);
        if ($result && $result->num_rows > 0) {
            // Logical delete by setting ast='0'
            $del_sql = "UPDATE grid_drawing_projects SET ast='0' WHERE id='" . $id . "'";
            $db->get_result($del_sql);
            if($db->get_error_state_boolean()){
                $json['status'] = 'success';
                $json['message'] = 'Project deleted successfully';
            } else {
                $json['status'] = 'error';
                $json['message'] = 'Failed to delete project.';
            }
        } else {
            $json['status'] = 'error';
            $json['message'] = 'Project not found or access denied.';
        }
    } else {
        $json['status'] = 'error';
        $json['message'] = 'Project ID is required.';
    }

    echo json_encode($json);
}
?>
