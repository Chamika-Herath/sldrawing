<?php
class sld_tutorials_LIST
{
    public function custom_query($query)
    {
        $data_base_obj = new DataBase();
        return $data_base_obj->get_result($query);
    }
}
?>
