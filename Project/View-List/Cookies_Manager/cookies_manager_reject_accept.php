<?php
include_once '../../imports/need/session_setup.php';
include_once '../../imports/need/DB.php';
include_once '../../imports/Company_Info/Company_Info_Variable_List.php';
include_once '../../Controllers/Main/Cook_Managment/Cook_Managing.php';
include_once '../../Controllers/Cart/cart_cook_list_customer_data/cart_cook_list_customer_data_ADD_UPDATE.php';
include_once '../../imports/security/encrypt_decrypt.php';
include_once '../../imports/security/key_list.php';
include_once '../../Controllers/Cart/cart_cook_list_customer_data_has_main_user_login/cart_cook_list_customer_data_has_main_user_login_ADD_UPDATE.php';
include_once '../../Controllers/Cart/cart_cook_list_customer_data_has_main_user_login/cart_cook_list_customer_data_has_main_user_login_LIST.php';


$encrypt_decrypt_obj = new Advance_Security();
$encrypt_decrypt_Key_List_obj = new Advance_Security_Key_List();
$get_cook_id = "0";


$json = array();
$cookieValue = "Not_Found";

$Cook_Managing_obj = new Cook_Management($user_main_cook_id);


// if (isset($_POST['reject'])) {
//     $_SESSION['process_cookie_yes_no'] = '0';
// } else if (isset($_POST['accept'])) {

//     if (isset($_SESSION['process_cookie_yes_no'])) {

//     } else {
// Set cookie only if it's not already set
if (isset($_COOKIE['Web_View_Cookie_Yes_No']) || isset($_SESSION['process_cookie_yes_no'])) {
    // echo "line 34";






    $cookieValue = "Not_Found";

    if (isset($_COOKIE['Web_View_Cookie_Yes_No'])) {
        $cookieValue = isset($_COOKIE['Web_View_Cookie_Yes_No']) ? $_COOKIE['Web_View_Cookie_Yes_No'] : "Not_Found";
    } else {
        $cookieValue = isset($_SESSION['process_cookie_yes_no']) ? $_SESSION['process_cookie_yes_no'] : "Not_Found";
    }
    $_SESSION['process_cookie_yes_no'] = $cookieValue;
    $get_cook_id = $encrypt_decrypt_obj->get_data_decrypt($encrypt_decrypt_Key_List_obj->get_key_cook(), $cookieValue);

    $cart_cook_list_customer_data_UPDATE_obj = new cart_cook_list_customer_data_ADD_UPDATE();
    $cart_cook_list_customer_data_UPDATE_obj->set_id($get_cook_id);
    if (isset($_POST['cook_email'])) {
        $cart_cook_list_customer_data_UPDATE_obj->set_email($_POST['cook_email']);
    }
    if (isset($_POST['cook_country'])) {
        $cart_cook_list_customer_data_UPDATE_obj->set_country($_POST['cook_country']);
    }
    if (isset($_POST['cook_customer_name'])) {
        $cart_cook_list_customer_data_UPDATE_obj->set_customer_name($_POST['cook_customer_name']);
    }
    $cart_cook_list_customer_data_UPDATE_obj->add_visit_count();

    if ($Cook_Managing_obj->check_login_availability()) {
        $cart_cook_list_customer_data_UPDATE_obj->is_user();
        $cart_cook_list_customer_data_has_main_user_login_ADD_UPDATE_obj = new cart_cook_list_customer_data_has_main_user_login_ADD_UPDATE($cart_cook_list_customer_data_UPDATE_obj->get_id(), $Cook_Managing_obj->get_user_id());
        $cart_cook_list_customer_data_has_main_user_login_ADD_UPDATE_obj->process_new_record();
    } else {
        $cart_cook_list_customer_data_UPDATE_obj->is_not_user();
    }



    if ($cart_cook_list_customer_data_UPDATE_obj->process_update_record()) {
        $state['cook_id'] = $cookieValue;
        $json[] = $state;
    } else {
        $state['cook_id'] = "Not_Found";
        $state['error'] = "line 66: " . $cart_cook_list_customer_data_UPDATE_obj->get_error_msg();
        $json[] = $state;
    }
} else {
    // echo "line 70";
    $cart_cook_list_customer_data_ADD_UPDATE_obj = new cart_cook_list_customer_data_ADD_UPDATE();
    if (isset($_POST['cook_data_country'])) {
        $cart_cook_list_customer_data_ADD_UPDATE_obj->set_country($_POST['cook_data_country']);
    }
    if ($cart_cook_list_customer_data_ADD_UPDATE_obj->process_new_record()) {


        $get_cook_id = $encrypt_decrypt_obj->get_data_encrypt($encrypt_decrypt_Key_List_obj->get_key_cook(), $cart_cook_list_customer_data_ADD_UPDATE_obj->get_id());

        if (isset($_POST['accept'])) {
            setcookie('Web_View_Cookie_Yes_No', $get_cook_id, time() + (86400 * 365), "/");
        }
        $_SESSION['process_cookie_yes_no'] = $get_cook_id;
        $cart_cook_list_customer_data_UPDATE_obj = new cart_cook_list_customer_data_ADD_UPDATE();
        $cart_cook_list_customer_data_UPDATE_obj->set_id($cart_cook_list_customer_data_ADD_UPDATE_obj->get_id());
        $cart_cook_list_customer_data_UPDATE_obj->set_cook_id($get_cook_id);
        $cart_cook_list_customer_data_UPDATE_obj->add_visit_count();

        if ($Cook_Managing_obj->check_login_availability()) {
            $cart_cook_list_customer_data_UPDATE_obj->is_user();
            $cart_cook_list_customer_data_has_main_user_login_ADD_UPDATE_obj = new cart_cook_list_customer_data_has_main_user_login_ADD_UPDATE($cart_cook_list_customer_data_UPDATE_obj->get_id(), $Cook_Managing_obj->get_user_id());
            $cart_cook_list_customer_data_has_main_user_login_ADD_UPDATE_obj->process_new_record();
        } else {
            $cart_cook_list_customer_data_UPDATE_obj->is_not_user();
        }


        if ($cart_cook_list_customer_data_UPDATE_obj->process_update_record()) {
            $state['cook_id'] = $cart_cook_list_customer_data_UPDATE_obj->get_cook_id();
            $json[] = $state;
        } else {
            $state['cook_id'] = "Not_Found";
            $state['error'] = "line 97: " . $cart_cook_list_customer_data_UPDATE_obj->get_error_msg();
            $json[] = $state;
        }
    } else {
        $state['error'] = "line 102: " . $cart_cook_list_customer_data_ADD_UPDATE_obj->get_error_msg();
        $json[] = $state;
    }
}

//     }

// }



echo json_encode($json);
