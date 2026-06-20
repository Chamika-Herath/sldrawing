<?php
class hero_img_SINGLE_DATA{

    private $id;
    private $ast;
    private $sdt;
    private $show_on_web;
    private $img_url;
    private $state_of_data = false;

    public function __construct($id)
    {
        $this->id = $id;

        $data_base_obj = new DataBase();
        $get_sql_query = "SELECT * FROM hero_img WHERE id = '" . $this->id . "'";
        $result = $data_base_obj->get_result($get_sql_query);

        if ($result->num_rows == 0) {
            $this->state_of_data = false;
        } else {
            $this->state_of_data = true;
            while ($result && $row = $result->fetch_assoc()) {
                $this->ast         = $row['ast'];
                $this->show_on_web = $row['show_on_web'];
                $this->img_url     = $row['img_url'];
            }
        }
    }

     public function get_state()
     {
        return $this->state_of_data;
     }

     public function get_ast()
     {
        return $this->ast;
     }

     public function get_sdt()
     {
        return $this->sdt;
     }

     public function get_show_on_web()
     {
        return $this->show_on_web;
     }

     public function get_img_url()
     {
        return $this->img_url;
     }


}