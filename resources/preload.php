<?php

$msg = "sample";

    class Preload{

        private $servername = "localhost";
        private $username = "root";
        private $password = "";
        private $dbname = "testdatabase";
        private $conn;
        public $shared;

        function __construct(){
            $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
            if ($this->conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
                $this->conn=null;
            } 
        }
        

        function getServiceProductName(){
            $sql = "SELECT name from serviceproduct_table";
            $result = $this->conn->query($sql);

            if($result->num_rows>0){
                return $result;
            }else{
                return null;
            }

        }
    }

    $data = new Preload();

    $msg = $data->getServiceProductName();


?>