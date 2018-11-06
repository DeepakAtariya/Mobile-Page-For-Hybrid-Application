<?php
    include 'resources/preload.php';
    class MasterController{
    

        private $MasterData = array("a","b");
        public $username, $org, $email, $mobile, $enquiry;
        public $hey="hey";
        
        function __construct($arr){
            $this->MasterData = $arr;
        }

        function onSave(){
            $preload = new Preload();
            $connection = $preload->conn;

            $sql = "INSERT INTO user_table (name, organisation, email, mobile, enquiry)VALUES (?,?,?,?,?)";

            $stmt = $connection->prepare($sql);
            $stmt->bind_param("sss", $name, $organisation, $email);


            // start from here..... data saving process.

        }


    }
    
    $data = new MasterController(array($_POST["username"],$_POST["organisation"],$_POST["emailAddress"],$_POST["mobile"],$_POST["enquiry"],$_POST["serviceProduct"]));
    $data->onSave();



?>
