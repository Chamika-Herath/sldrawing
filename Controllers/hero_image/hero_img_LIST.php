<?php

class hero_img_LIST {

    private $sql_seach_data;
    private $sql_process_data = "*";
    private $pagination_data_result;
    private $ast_state = "1";


    public function get_all_data()
    {
        $this->sql_process_data = "*";
    }

    public function get_count_report()
    {
        // Count only apply_state = 1 and ast = 1
        $this->sql_process_data = "COUNT(id) AS total_count";
        $this->sql_seach_data .= " AND apply_state = 1";
        $this->ast_state = "1"; // Ensure ast=1
    }

    public function set_data_limits($start_point, $per_page_data_count)
    {
        $this->pagination_data_result = " ORDER BY id DESC LIMIT " . $start_point . ", " . $per_page_data_count;
    }

    public function set_ast_state($state)
    {
        $this->ast_state = $state;
    }

    public function remove_list()
    {
        $this->ast_state = "0";
    }

    public function get_result()
    {
        $data_base_obj = new DataBase();
        $get_sql_query = "SELECT " . $this->sql_process_data .
            " FROM hero_img WHERE ast='" . $this->ast_state . "'" .
            $this->sql_seach_data .
            $this->pagination_data_result;
        return $data_base_obj->get_result($get_sql_query);
    }


}
