<?php

class URI_Management_ADD_UPDATE {

    private $main_user_login_id;

    public function __construct($get_main_user_login_id) {
        $this->main_user_login_id = $get_main_user_login_id;
        $this->time_stamp_data_obj = date('Y-m-d H:i:s');
        $this->sql_search_query = "id='" . $this->id . "'";
    }

    private $show_on_public = "0";
    private $state_of_cat = "0";

    public function is_Show_On_Seach_Engines() {
        $this->show_on_public = "1";
        $this->sql_query_update = $this->sql_query_update . ",show_on_public='" . $this->show_on_public . "'";
    }

    public function is_Main_Cat_Available() {
        $this->state_of_cat = "1";
        $this->sql_query_update = $this->sql_query_update . ",state_of_cat='" . $this->state_of_cat . "'";
    }

    private $sql_search_query;

    public function remove_data($get_url_name) {
        $this->ast_state = "0";
        $this->url_name = $get_url_name;
        $this->sql_search_query = " resion_of_url='" . $this->resion_of_url . "' and url_name='" . $this->url_name . "'";
    }

    private $url_name;
    private $resion_of_url;
    private $priority_count;
    private $page_cat;
    private $sql_query_update;
    private $id;
    private $time_stamp_data_obj;
    private $ast_state = "1";

    public function set_id($get_id) {
        $this->id = $get_id;
    }

    public function get_id() {
        return $this->id;
    }

    public function is_Item_Service_Catergory() {
        $this->resion_of_url = "ITEM_SERVICE_CAT_LIST";
        $this->sql_query_update = $this->sql_query_update . ",resion_of_url='" . $this->resion_of_url . "'";
    }

    public function is_Item_or_Service() {
        $this->resion_of_url = "ITEM_SERVICE";
        $this->sql_query_update = $this->sql_query_update . ",resion_of_url='" . $this->resion_of_url . "'";
    }

    public function is_Item_Service_BRAND() {
        $this->resion_of_url = "ITEM_SERIVCE_BAND";
        $this->sql_query_update = $this->sql_query_update . ",resion_of_url='" . $this->resion_of_url . "'";
    }

    public function is_Page_Cat_Abailble() {
        $this->state_of_cat = "1";
        $this->sql_query_update = $this->sql_query_update . ",state_of_cat='" . $this->state_of_cat . "'";
    }

    public function set_data($get_url_name, $get_priority_count, $get_page_cat) {
        $this->url_name = $get_url_name;
        $this->priority_count = $get_priority_count;
        if ($this->state_of_cat == "0") {
            
        } else {
            $this->page_cat = $get_page_cat;
        }
        $this->sql_query_update = $this->sql_query_update . ",url_name='" . $this->url_name . "',resion_of_url='" . $this->resion_of_url . "',priority_count='" . $this->priority_count . "',page_cat='" . $this->page_cat . "'";
    }

    public function process_insert_data() {
        $state_bool = false;
        $data_base_obj = new DataBase();
        $get_sql_query = "INSERT INTO usefull_url_list(url_name,show_on_public,sdt,ast,main_user_login_id,resion_of_url,priority_count,page_cat,state_of_cat) VALUES "
                . "('" . $this->url_name . "','" . $this->show_on_public . "','" . $this->time_stamp_data_obj . "','" . $this->ast_state . "','" . $this->main_user_login_id . "','" . $this->resion_of_url . "','" . $this->priority_count . "','" . $this->page_cat . "','" . $this->state_of_cat . "')";
        $data_base_obj->get_result($get_sql_query);
        $this->error_msg = $data_base_obj->get_error();
        if ($data_base_obj->get_error_state_boolean()) {

            $state_bool = true;

            $Site_Process_With_SEO_obj = new Site_Process_With_SEO();
            $Site_Process_With_SEO_obj->process_site_map_robot_txt();
            $Site_Process_With_SEO_obj->finsih_site_map_robot_txt();
        }




        return $state_bool;
    }

    private $error_msg;

    public function get_error() {
        return $this->error_msg;
    }

    public function process_udpate_data() {
        $data_base_obj = new DataBase();
        $get_sql_query = "update usefull_url_list set ast='" . $this->ast_state . "' " . $this->sql_query_update . " where " . $this->sql_search_query;
        $data_base_obj->get_result($get_sql_query);
        $this->error_msg = $data_base_obj->get_error();
        return $data_base_obj->get_error_state_boolean();
    }
}
