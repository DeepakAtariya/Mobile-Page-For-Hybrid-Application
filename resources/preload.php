<?php

$msg = "sample";
$servicPersonEmail ="";

    class Preload{

        private $servername = "localhost";
        private $username = "root";
        private $password = "";
        private $dbname = "testdatabase";
        public $conn;
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
        function getServicePersonEmail($service){
            // $sql = "SELECT email from serviceproduct_table where 'service'"."="."'".$service."'";
            $sql = "SELECT `email` FROM `serviceproduct_table` WHERE `serviceproduct_table`.`name`='$service'";
            $result = $this->conn->query($sql);

            if($result->num_rows>0){
                return $result;
            }else{
                return "asdasdsadsa";
            }

        }

        function getServiceId($service){
            
            $sql = "SELECT `id` FROM `serviceproduct_table` WHERE `serviceproduct_table`.`name`='$service'";
            $result = $this->conn->query($sql);

            if($result->num_rows>0){
                foreach ($result as $row) {
                    $id = $row["id"];
                    return $id;
                    // break;
                }
            }else{
                return 0;
            }

        }
        
    }

    $data = new Preload();

    $msg = $data->getServiceProductName();


?>