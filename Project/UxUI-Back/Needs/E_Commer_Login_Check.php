<?php
$get_cookie_id = "0";
$short_name = "0";
$user_email = "0";

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
    $short_name = $cookie_check_obj->get_name_show();
    $user_email = $cookie_check_obj->get_email();
    ?>
    <script type="text/javascript">
        $(document).ready(function () {
            ecommers_login();
        });

    </script>
    <?php
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
        $(document).ready(function () {
            ecommers_not_login();
        });

    </script>
    <?php
}
?>
<script type="text/javascript">
    function ecommers_login() {
    var menue_bar_btn_01_obj = document.getElementById("menue_bar_btn_01");
    var menue_bar_btn_02_obj = document.getElementById("menue_bar_btn_02");
    var menue_bar_btn_03_obj = document.getElementById("menue_bar_btn_03");

    if (menue_bar_btn_01_obj) menue_bar_btn_01_obj.style.display = "none";
    if (menue_bar_btn_02_obj) menue_bar_btn_02_obj.style.display = "block";
    if (menue_bar_btn_03_obj) menue_bar_btn_03_obj.style.display = "block";

    var mob_home_btn_05_obj = document.getElementById("mob_home_btn_05");
    var mob_home_btn_06_obj = document.getElementById("mob_home_btn_06");
    var mob_home_btn_07_obj = document.getElementById("mob_home_btn_07");

    if (mob_home_btn_05_obj) mob_home_btn_05_obj.style.display = "none";
    if (mob_home_btn_06_obj) mob_home_btn_06_obj.style.display = "block";
    if (mob_home_btn_07_obj) mob_home_btn_07_obj.style.display = "block";

    var main_user_login_available_obj = document.getElementById("main_user_login_available");
    if (main_user_login_available_obj) main_user_login_available_obj.value = "1";
}


    function ecommers_not_login() {

    function safeDisplay(id, displayValue) {
        const el = document.getElementById(id);
        if (!el) {
            console.warn("Element not found:", id);
            return;
        }
        el.style.display = displayValue;
    }

    // Desktop menu
    safeDisplay("menue_bar_btn_01", "block"); // login
    safeDisplay("menue_bar_btn_02", "none");  // logout
    safeDisplay("menue_bar_btn_03", "none");  // profile

    // 🔴 MOBILE BUTTONS TEMPORARILY DISABLED (no more warnings)
    /*
    safeDisplay("mob_home_btn_05", "block"); // login
    safeDisplay("mob_home_btn_06", "none");  // logout
    safeDisplay("mob_home_btn_07", "none");  // profile
    */

    const loginFlag = document.getElementById("main_user_login_available");
    if (!loginFlag) {
        console.warn("Element not found: main_user_login_available");
        return;
    }
    loginFlag.value = "0";
}


</script>
<input type="hidden" id="main_user_login_available" value="0">
<input type="hidden" id="main_short_name" value="<?php echo $short_name; ?>">
<input type="hidden" id="main_user_email" value="<?php echo $user_email; ?>">