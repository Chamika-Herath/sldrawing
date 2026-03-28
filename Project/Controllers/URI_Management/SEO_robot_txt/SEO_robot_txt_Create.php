<?php

class SEO_Robot_TXT_Create {

    private $file_path;
    private $compnay_info_obj;

    public function __construct() {
        $pth_data = isset($_SESSION['pth']) ? $_SESSION['pth'] : "";
        $this->file_path =$pth_data. 'robots.txt';
        $this->compnay_info_obj = new Company_Info_Variable_List();
        $this->default_txt();
    }

    private $robot_txt_generate;
    private $robot_allow_txt;
    private $robot_dis_allow_txt;

    public function Allow_URL($get_URL) {
        $this->robot_allow_txt = $this->robot_allow_txt . " Allow: " . $get_URL . "\n";
    }

    public function Dis_Allow_URL($get_URL) {
        $this->robot_dis_allow_txt = $this->robot_dis_allow_txt . " Disallow: " . $get_URL . "\n";
    }

    private function default_txt() {
        $this->robot_dis_allow_txt = $this->robot_dis_allow_txt . " Disallow: /imports/  \n";
        $this->robot_dis_allow_txt = $this->robot_dis_allow_txt . " Disallow: /View-List/  \n";
        $this->robot_dis_allow_txt = $this->robot_dis_allow_txt . " Disallow: /UxUi-Back/  \n";
        $this->robot_dis_allow_txt = $this->robot_dis_allow_txt . " Disallow: /UxUi/  \n";
        $this->robot_dis_allow_txt = $this->robot_dis_allow_txt . " Disallow: /Meta_Tag/  \n";
        $this->robot_dis_allow_txt = $this->robot_dis_allow_txt . " Disallow: /Dash-Board/  \n";
        $this->robot_dis_allow_txt = $this->robot_dis_allow_txt . " Disallow: /Controller/  \n";
        $this->robot_dis_allow_txt = $this->robot_dis_allow_txt . " Disallow: /cgi-bin/  \n";
        $this->robot_dis_allow_txt = $this->robot_dis_allow_txt . " Disallow: /test/  \n";
    }

    public function process_robot_txt() {
        $state_bool = false;
        $this->robot_txt_generate = "# Allow all bots to access everything \n"
                . "User-agent: *  \n";
        $this->robot_txt_generate = $this->robot_txt_generate . "\n" . $this->robot_dis_allow_txt . "\n" . $this->robot_allow_txt;
        $this->robot_txt_generate = $this->robot_txt_generate
                . "# Sitemap location for search engines \n"
                . "Sitemap: " . $this->compnay_info_obj->get_app_URL() . "/sitemap.xml \n"
                . "# EDO (End of Data) - No more directives below this point \n"
                . "EDO";

        if (file_put_contents($this->file_path, $this->robot_txt_generate)) {
//            echo "robots.txt file has been successfully created/overwritten.";$state_bool=false;
            $state_bool = true;
        } else {
//            echo "Failed to write to the robots.txt file.";
            $state_bool = false;
        }

        return $state_bool;
    }
}

//include_once '../../../imports/Company_Info/Company_Info_Variable_List.php';
//$SEO_Robot_TXT_Create = new SEO_Robot_TXT_Create();
//$SEO_Robot_TXT_Create->process_robot_txt();
