<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require '../resources/preload.php';
    require '../resources/EmailSender.php';
    class MasterController{
    

        private $MasterData = array();
        private $conf;
        
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
                
                //fetching data from configuration json file
                $str = file_get_contents("..\\conf.json");
                $this->conf = json_decode($str, true);

                //PHP mailer code to configure mail server and sending process

                $mail = new PHPMailer();
                // $mail->SMTPDebug = 4;                                 
                $mail->isSMTP();                                      
                $mail->Host = $this->conf['host']; 
                $mail->Port = $this->conf['port'];                           
                $mail->SMTPSecure = $this->conf['security'];   
                $mail->SMTPAuth = true;                         
                $mail->Username = $this->conf['username'];                                  
                $mail->Password = $this->conf['password'];  
                
                $mail->setFrom('codolic127@gmail.com');
                $mail->addAddress('deepakkumaratariya@gmail.com');
        
                $mail->isHTML(false);
                $mail->Subject = "ack";
                $mail->Body    = "ack body";
                if (!$mail->send()) {
                    echo "<script>console.log('message not sent')</script>";
                }
                else {
                    echo "<script>console.log('message sent')</script>";
                }


                $e->sendEmail($this->MasterData[2],"ACK","This is an ack!");    //this will send email to the person who is enquiring --> ACK mail
                $result = $preload->getServicePersonEmail($this->MasterData[5]);
                $concernedPerson = "";

                foreach ($result as $row) {
                    $concernedPerson = $row["email"];
                    // break;
                }
                $e->sendEmail($concernedPerson,"Enquiry : ".$service, $enquiry);  //this will send email to concerned person
            }else{
                echo "something went wrong";
            }
            $stmt->close();
        }


    }
    
    $data = new MasterController(array($_GET["name"],$_GET["organisation"],$_GET["emailAddress"],$_GET["mobile"],$_GET["enquiry"],$_GET["serviceProduct"]));
    $data->onSave();



?>
