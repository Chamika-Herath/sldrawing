<?php

class Site_Process_With_SEO {

    private $Site_Map_Create_obj;
    private $SEO_Robot_TXT_Create_obj;

    public function __construct() {
        $this->Site_Map_Create_obj = new Site_Map_Create();
        $this->SEO_Robot_TXT_Create_obj = new SEO_Robot_TXT_Create();
        $this->defalt_site_map_process();
    }

    private function defalt_site_map_process() {
        $this->Site_Map_Create_obj->addPage("", "", "1.0");
        $this->Site_Map_Create_obj->addPage("", "About-Us", "0.8");
        $this->Site_Map_Create_obj->addPage("", "Contact-Us", "0.7");
    }

    public function process_site_map_robot_txt() {
        $URI_Management_List_obj = new URI_Management_List();
        $get_result = $URI_Management_List_obj->get_result();

        if ($get_result->num_rows > 0) {
            while ($row = $get_result->fetch_assoc()) {
                $get_category = "";
                $get_page = "";

                $get_full_url = "";

                if ($row['state_of_cat'] == "0") {
                    $get_category = "0";
                    $get_page = "/".$row['url_name'];
                    $get_full_url = $get_page;
                } else {
                    $get_category = $row['page_cat'];
                    $get_page = $row['url_name'];
                    $get_full_url = $get_category . "/" . $get_page;
                }

                if ($row['show_on_public'] == "1") {
                    $this->SEO_Robot_TXT_Create_obj->Allow_URL($get_full_url);
                } else {
                    $this->SEO_Robot_TXT_Create_obj->Dis_Allow_URL($get_full_url);
                }


                $this->Site_Map_Create_obj->addPage($get_category, $get_page, $row['priority_count']);
            }
        }
    }

    public function finsih_site_map_robot_txt() {
        $this->Site_Map_Create_obj->saveSitemap();
        $this->SEO_Robot_TXT_Create_obj->process_robot_txt();
    }
}

