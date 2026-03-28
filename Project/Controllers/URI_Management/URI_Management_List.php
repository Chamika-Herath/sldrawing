<?php

class URI_Management_List {

    public function __construct() {
        ;
    }

    private $sql_search_query;

    public function fix_search_url($get_URL_name) {
        $this->sql_search_query = " and url_name='" . $get_URL_name . "'";
    }

    public function fix_search_url_with_cat($get_URL_name, $get_cat_name) {
        $this->sql_search_query = " and url_name='" . $get_URL_name . "' and page_cat='" . $get_cat_name . "'";
    }

    private $ast_state = "1";

    public function get_result() {
        $data_base_obj = new DataBase();
        $get_sql_query = "select * from usefull_url_list where ast='" . $this->ast_state . "' " . $this->sql_search_query;
        return $data_base_obj->get_result($get_sql_query);
    }
}
