<?php
    require '../resources/preload.php';
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

            $sql = "INSERT INTO user_table (name, organisation, email, mobile, enquiry, serviceProduct)VALUES (?,?,?,?,?,?)";

            $stmt = $connection->prepare($sql);
            $stmt->bind_param("ssssss", $name, $organisation, $email, $mobile, $enquiry, $service);

            $name = $this->MasterData[0];
            $organisation = $this->MasterData[1];
            $email = $this->MasterData[2];
            $mobile = $this->MasterData[3];
            $enquiry = $this->MasterData[4];
            $service = $this->MasterData[5];
            if($stmt->execute()){
                echo "data saved!";
            }else{
                echo "something went wrong";
            }


            $stmt->close();

            // start from here..... data saving process.

        }


    }
    
    $data = new MasterController(array($_POST["username"],$_POST["organisation"],$_POST["emailAddress"],$_POST["mobile"],$_POST["enquiry"],$_POST["serviceProduct"]));
    $data->onSave();



?>
