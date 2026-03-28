<?php
$get_cookie_id = "0";

if (isset($_SESSION['user_main_cook_id'])) {
    $get_cookie_id = $_SESSION['user_main_cook_id'];
} else if (isset($_COOKIE['main_user_account_cook'])) {
    //            echo 'line 02';
    $get_cookie_id = $_COOKIE['main_user_account_cook'];
    $_SESSION['user_main_cook_id'] = $get_cookie_id;
} else {
}
$cookie_check_obj = new Cook_Management($get_cookie_id);
if ($cookie_check_obj->check_login_availability()) {
} else if ($cookie_check_obj->cook_remove_fouse_state()) {
    $_SESSION['login_error'] = $cookie_check_obj->get_error_msg();


    if (isset($_COOKIE['main_user_account_cook'])) {
        unset($_COOKIE['main_user_account_cook']);
    }
    if (isset($_SESSION['user_main_cook_id'])) {
        unset($_SESSION['user_main_cook_id']);
        session_destroy();
    }
?>
    <script type="text/javascript">
        $(document).ready(function() {
            back_to_login();
        });
    </script>
<?php
}
?>
<script type="text/javascript">
    function back_to_login() {

        var errorMsg = encodeURIComponent("Re-Login-Required");

        window.location.href = "<?php echo $home_page ?><?php echo $User_login_url ?>Failed-Page<?php echo $online_offline_extention ?>?error=" + errorMsg;

    }
</script>