<?php
class hero_img_ADD_UPDATE{
    private $id;
    private $ast;
    private $sdt;
    private $show_on_web = "0";
    private $img_url;
    private $error_msg;
    private $sql_update_query;

    public function __constract(){
        $this->sdt = date('Y-m-d H:i:s');
    }

    public function set_data($get_show_on_web, $get_img_url) {
        $this->show_on_web = $get_show_on_web;
        $this->img_url = $get_img_url;
        $this->sql_update_query .= 
                 ",show_on_web = '" . $this->show_on_web . "'".
                 ",img_url     = '" . $this->img_url     . "'";
                   
    }

    public function set_img_url($get_img_url)
    {
        $this->img_url = $get_img_url;
        $this->sql_update_query .= ",img_url = '" . $this->img_url . "'";
    }

    public function is_show_on_web($get_show_on_web)
    {
        $this->show_on_web = "1";
        $this->sql_update_query = $this->sql_update_query . ",show_on_web=" . $this->show_on_web;
    }

    public function is_not_show_on_web($get_show_on_web)
    {
        $this->show_on_web = "0";
        $this->sql_update_query = $this->sql_update_query . ",show_on_web=" . $this->show_on_web;
    }

    public function get_id()
    {
        return $this->id;
    }

    public function set_id($get_id)
    {
        $this->id = $get_id;
    }

    public function remove()
    {
        $this->ast = "0";
    }

    public function get_error()
    {
        return $this->error_msg;
    }

    public function process_new_record()
    {
        $data_base_obj = new DataBase();
        $get_sql_query = "insert into hero_img(ast, sdt, show_on_web, img_url)
                        values " . "(
                        '" . $this->ast ."',
                        '" . $this->sdt ."',
                        '" . $this->show_on_web ."',
                        '" . $this->img_url ."')";
        $data_base_obj->get_result($get_sql_query);

        $this->error_msg = $data_base_obj->get_error_state_boolean();
        $this->id = $data_base_obj->get_id();
        return $data_base_obj->get_error_state_boolean();

    }

    public function process_update_record()
    {
        $data_base_obj = new DataBase();
        $get_sql_query = "update hero_img set sdt='" . $this->sdt . "' " . $this->sql_update_query . " where id='" . $this->id . "'";
        $data_base_obj->get_result($get_sql_query);
        $this->error_msg = $data_base_obj->get_error_state_boolean();
        return $data_base_obj->get_error_state_boolean();
    }


}