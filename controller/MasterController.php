<?php
    require '../resources/preload.php';
    require '../resources/EmailSender.php';
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
            // $service = $this->MasterData[5];
            $service = $preload->getServiceId($this->MasterData[5]);

            if($stmt->execute()){
                
                $e = new EmailSender();
                $e->sendEmail($this->MasterData[2],"ACK","This is an ack!");    //this will send email to the person who is enquiring --> ACK mail
                $result = $preload->getServicePersonEmail($this->MasterData[5]);
                $concernedPerson = "";

                foreach ($result as $row) {
                    $concernedPerson = $row["email"];
                    // break;
                }
                $e->sendEmail($concernedPerson,"Enquiry : ".$service, $enquiry);  //this will send email to concerned person
                // header("Location: http://localhost/phpTask/") or die();
            }else{
                echo "something went wrong";
            }
            $stmt->close();
        }


    }
    
    $data = new MasterController(array($_GET["username"],$_GET["organisation"],$_GET["emailAddress"],$_GET["mobile"],$_GET["enquiry"],$_GET["serviceProduct"]));
    $data->onSave();



?>
