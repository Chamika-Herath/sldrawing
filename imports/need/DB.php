<?php

// Create connection
function database()
{

    $get_database = new DataBase();
    return $get_database->get_data_base_connction();
}

//database();


class DataBase
{

    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $db_connction;

    public function __construct()
    {
        //        $this->servername = "localhost";
        //        $this->username = "root";
        //        $this->password = "!1m3t4y5@p8kyH";


        //        --------------------------
        $this->servername = "srv1777.hstgr.io";
        // $this->servername = "127.0.0.1";
        $this->username = "u511731669_root";
        $this->password = "@5Ej=sbAWui";

        // $this->username = "infortech_root";
        // $this->password = "K^Q!&[#@0Kb=";

        // $this->servername = "127.0.0.1";
        // $this->username = "u511731669_root";
        // $this->password = "@5Ej=sbAWui";



        //$this->dbname = "infortech_favaji";
        //$this->dbname = "item_service_managment";
        //$this->dbname = "user_login_db_new";
        $this->dbname = "u511731669_sl_drawing";

        //  $this->dbname = "u511731669_heraforce";
    }

    public function __destruct()
    {
        $this->close_connction();
    }

    public function get_data_base_connction()
    {
        $this->db_connction = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($this->db_connction->connect_error) {
            die("Connection failed: " . $this->db_connction->connect_error);
        }

        return $this->db_connction;
    }

    public function close_connction()
    {
        if ($this->db_connction !== null) {
            $this->db_connction->close();
        }
    }

    public function get_result($get_sql_query)
    {
        $this->get_data_base_connction();
        return $this->db_connction->query($get_sql_query);
    }

    public function get_id()
    {
        return $this->db_connction->insert_id;
    }

    public function get_error()
    {
        return $this->db_connction->error;
    }

    public function get_error_state_boolean()
    {
        $state = false;
        if ($this->db_connction->error == "") {
            $state = true;
        } else {
            $state = false;
        }

        return $state;
    }
}
