<?php
include_once '../../imports/need/session_setup.php';
include_once '../../imports/need/DB.php';
include_once '../../Controllers/grid_drawing_projects/grid_drawing_projects_LIST.php';
include_once '../../imports/Company_Info/Company_Info_Variable_List.php';
include_once '../../imports/security/encrypt_decrypt.php';
include_once '../../imports/security/key_list.php';
include_once '../../Controllers/Main/Cook_Managment/Cook_Managing.php';

$json = array();
$state = array();
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

    $list_obj = new grid_drawing_projects_LIST();
    $list_obj->get_all_data();
    $list_obj->filter_by_user_id($main_user_login_id);
    $list_obj->set_data_limits(0, 100);
    $result = $list_obj->get_result();

    $projects = array();
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Include absolute URL to image if possible or relative
            $projects[] = $row;
        }
    }

    $json['status'] = 'success';
    $json['data'] = $projects;
    echo json_encode($json);
}
?>
