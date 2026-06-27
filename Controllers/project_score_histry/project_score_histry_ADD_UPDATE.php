<?php
class project_score_histry_ADD_UPDATE{

    private $id;
    private $ast;
    private $sdt;
    private $atempt;
    private $score;
    private $uploded_img_url;
    private $comments;
    private $grid_drawing_projects_id;
    private $main_user_login_id;
    private $sql_update_query;

    public function __construct($get_main_user_login_id){
        
        $this->main_user_login_id = $get_main_user_login_id;
        $this->sdt = date("Y-m-d H:i:s");

    }

    public function set_data($get_atempt, $get_score, $get_uploded_img_url, $get_comments, $get_grid_drawing_projects_id){
        $this->atempt = $get_atempt;
        $this->score = $get_score;
        $this->uploded_img_url = $get_uploded_img_url;
        $this->comments = $get_comments;
        $this->grid_drawing_projects_id = $get_grid_drawing_projects_id;

        $this->sql_update_query = 
            ", atempt='" . $this->atempt . "',
            score='" . $this->score . "',
            uploded_img_url='" . $this->uploded_img_url . "',
            comments='" . $this->comments . "',
            grid_drawing_projects_id='" . $this->grid_drawing_projects_id . "'";
    }

    public function set_atempt($get_atempt){
        $this->atempt = $get_atempt;
        $this->sql_update_query .= ", atempt='" . $this->atempt . "'";
    }

    public function set_score($get_score){
        $this->score = $get_score;
        $this->sql_update_query .= ", score='" . $this->score . "'";
    }

    public function set_uploded_img_url($get_uploded_img_url){
        $this->uploded_img_url = $get_uploded_img_url;
        $this->sql_update_query .= ", uploded_img_url='" . $this->uploded_img_url . "'";
    }

    public function set_comments($get_comments){
        $this->comments = $get_comments;
        $this->sql_update_query .= ", comments='" . $this->comments . "'";
    }

    public function set_grid_drawing_projects_id($get_grid_drawing_projects_id){
        $this->grid_drawing_projects_id = $get_grid_drawing_projects_id;
        $this->sql_update_query .= ", grid_drawing_projects_id='" . $this->grid_drawing_projects_id . "'";
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
        $get_sql_query = "INSERT INTO project_score_histry (ast, sdt, atempt, score, uploded_img_url, comments, grid_drawing_projects_id, main_user_login_id) 
                 VALUES (
                 '1',
                 '" . $this->sdt . "',
                 '" . $this->atempt . "',
                 '" . $this->score . "',
                 '" . $this->uploded_img_url . "',
                 '" . $this->comments . "',
                 '" . $this->grid_drawing_projects_id . "',
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
        $get_sql_query = "UPDATE project_score_histry SET sdt='" . $this->sdt . "' " . $this->sql_update_query . " WHERE id='" . $this->id . "'";
        $data_base_obj->get_result($get_sql_query);
        $get_bool = $data_base_obj->get_error_state_boolean();
        $this->error_msg = $data_base_obj->get_error();
        return $get_bool;
    }
}