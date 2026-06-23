<?php

include_once "../../Controllers/Hero_image/hero_img_ADD_UPDATE.php";
include_once "../../imports/needs/db.php";

$json = array();

$get_id            = isset($_POST['id']) ? $_POST['id'] :"";
$get_show_on_web   = isset($_POST['show_on_web']) ? $_POST['show_on_web'] :"0";
$get_img_url       = isset($_POST['img_url']) ? $_POST['img_url'] :"";

$hero_img_obj = new hero_img_ADD_UPDATE();

if (isset ($_POST["delete_state"]) && $_POST["delete_state"] == "1") {

     if ($get_id != "") {
        $hero_img_obj->set_id($get_id);
        $hero_img_obj->remove();

        if ($hero_img_obj->process_update_record()) {
            $state['id'] = $get_id;
            $state['error'] = "0";
            $json[] = $state;
        } else {
            $state['id'] = $get_id;
            $state['error'] = "1";
            $json[] = $state;
        }

    } else {
        $hero_img_obj->get_all_data($get_show_on_web, $get_img_url);

        if ($get_id != "") {
            $hero_img_obj->set_id($get_id);

            if  ($hero_img_obj->process_update_record()) {
                $state['id'] = $get_id;
                $state['error'] = "0";
                $json[] = $state;
            } else {
                $state['id'] = $get_id;
                $state['error'] = "update failed" .$hero_img_obj->get_error();
                $json[] = $state;
            }

        } else {
            if ($hero_img_obj->process_new_record()) {
                $state['id'] = $get_id;
                $state['error'] = "0";
                $json[] = $state;
            } else {
                $state['id'] = $get_id;
                $state['error'] = "insert failed" .$hero_img_obj->get_error();
                $json[] = $state;
            }
        }
    }

    } else {
    $state['id'] = "0";
    $state['error'] = "Session Expired";
    $json[] = $state;
}

echo json_encode($json);
?>

      

