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

    public function set_data(
}