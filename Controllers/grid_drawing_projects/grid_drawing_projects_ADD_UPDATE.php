<?php
class grid_drawing_projects_ADD_UPDATE{
    private $id;
    private $ast = "1";
    private $sdt;
    private $project_name;
    private $reference_img_url;
    private $grid_img_url;
    private $is_download = 0;
    private $is_draft = 0;
    private $is_save = 0;
    private $main_user_login_id;
    private $sql_update_query;

    public function __construct($get_main_user_login_id){
        
        $this->main_user_login_id = $get_main_user_login_id;
        $this->sdt = date("Y-m-d H:i:s");

    }

    public function set_data($get_project_name, $get_reference_img_url, $get_grid_img_url, $get_is_download, $get_is_draft, $get_is_save){
        $this->project_name = $get_project_name;
        $this->reference_img_url = $get_reference_img_url;
        $this->grid_img_url = $get_grid_img_url;
        $this->is_download = $get_is_download;
        $this->is_draft = $get_is_draft;
        $this->is_save = $get_is_save;
        $this->sql_update_query =
                  ", project_name='" . $this->project_name . "',
                    reference_img_url='" . $this->reference_img_url . "',
                    grid_img_url='" . $this->grid_img_url . "',
                    is_download='" . $this->is_download . "',
                    is_draft='" . $this->is_draft . "',
                    is_save='" . $this->is_save . "'";
    }

    public function is_is_download(){
        $this->is_download = 1;
        $this->sql_update_query = ", is_download='" . $this->is_download . "'";
    }

    public function is_not_download(){
        $this->is_download = 0;
        $this->sql_update_query = ", is_download='" . $this->is_download . "'";
    }

    public function is_is_draft(){
        $this->is_draft = 1;
        $this->sql_update_query = ", is_draft='" . $this->is_draft . "'";
    }

    public function is_not_draft(){
        $this->is_draft = 0;
        $this->sql_update_query = ", is_draft='" . $this->is_draft . "'";
    }


    public function is_save(){
        $this->is_save = 1;
        $this->sql_update_query = ", is_save='" . $this->is_save . "'";
    }

    public function is_not_save(){
        $this->is_save = 0;
        $this->sql_update_query = ", is_save='" . $this->is_save . "'";
    }   


    public function set_project_name($get_project_name){
        $this->project_name = $get_project_name;
        $this->sql_update_query =$this->sql_update_query . ", project_name='" . $this->project_name . "'";
    }

    public function set_reference_img_url($get_reference_img_url){
        $this->reference_img_url = $get_reference_img_url;
        $this->sql_update_query =$this->sql_update_query . ", reference_img_url='" . $this->reference_img_url . "'";
    }

    public function set_grid_img_url($get_grid_img_url){
        $this->grid_img_url = $get_grid_img_url;
        $this->sql_update_query =$this->sql_update_query . ", grid_img_url='" . $this->grid_img_url . "'";
    }

        public function remove()
    {
        $this->ast = "0";
    }

    public function get_id()
    {
        return $this->id;
    }

    public function set_id($get_id)
    {
        $this->id = $get_id;
    }

    private $error_msg;

    public function get_error()
    {
        return $this->error_msg;
    }


    public function process_new_record()
    {
        $data_base_obj = new DataBase();
        $get_sql_query = "INSERT INTO grid_drawing_projects (ast, sdt, project_name, reference_img_url, grid_img_url, is_download, is_draft, is_save, main_user_login_id) 
                 VALUES (
                 '" . $this->ast . "',
                 '" . $this->sdt . "',
                 '" . $this->project_name . "',
                 '" . $this->reference_img_url . "',
                 '" . $this->grid_img_url . "',
                 '" . $this->is_download . "',
                 '" . $this->is_draft . "',
                 '" . $this->is_save . "',
                 '" . $this->main_user_login_id . "')";

                  $data_base_obj->get_result($get_sql_query);
        $get_bool = $data_base_obj->get_error_state_boolean();
        $this->error_msg = $data_base_obj->get_error();
        $this->id = $data_base_obj->get_id();
        return $get_bool;

    }

     public function process_update_record()
    {
        $data_base_obj = new DataBase();
        $get_sql_query = "UPDATE grid_drawing_projects SET sdt='" . $this->sdt . "' " . $this->sql_update_query . " WHERE id='" . $this->id . "'";
        $data_base_obj->get_result($get_sql_query);
        $get_bool = $data_base_obj->get_error_state_boolean();
        $this->error_msg = $data_base_obj->get_error();
        return $get_bool;
    }




}