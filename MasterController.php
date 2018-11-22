<?php
    require 'vendor/autoload.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'preload.php';
    

        $MasterData = array($_GET["name"],$_GET["organisation"],$_GET["emailAddress"],$_GET["mobile"],$_GET["enquiry"],$_GET["serviceProduct"]);
         
        
        $preload = new Preload();
        $connection = $preload->conn;
        $sql = "INSERT INTO user_table (name, organisation, email, mobile, enquiry, serviceProduct)VALUES (?,?,?,?,?,?)";
        
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("ssssss", $name, $organisation, $email, $mobile, $enquiry, $service);
        
        $name = $MasterData[0];
        $organisation = $MasterData[1];
        $email = $MasterData[2];
        $mobile = $MasterData[3];
        $enquiry = $MasterData[4];
        $service = $MasterData[5];

        if($stmt->execute()){
            echo "<script>console.log('database passed!')</script>";
        }else{
            echo "<script>console.log('database failed!')</script>";
        }
        $stmt->close();

        //this will send email to the person who is enquiring --> Acknowledgement mail
        sendEmail($MasterData[2],"Acknowledgement","This is an acknowledgement!");   
            
        //fetching concerned person email id to send query
        $result = $preload->getServicePersonEmail($MasterData[5]);
        $concernedPerson = "";
        foreach ($result as $row) {
            $concernedPerson = $row["email"];
        }
        //send enquiry mail to concerned person
        sendEmail($concernedPerson,"Enquiry : ".$service, $enquiry); 


        function sendEmail($email, $sub, $msg){
            //fetching data from configuration json file
            $str = file_get_contents("conf.json");
            $conf = json_decode($str, true);

            //code of sending email
            $mail = new PHPMailer();
            // $mail->SMTPDebug = 4;                                 
            $mail->isSMTP();                                      
            $mail->Host = $conf['host']; 
            $mail->Port = $conf['port'];                           
            $mail->SMTPSecure = $conf['security'];   
            $mail->SMTPAuth = true;                         
            $mail->Username = $conf['username'];                                  
            $mail->Password = $conf['password'];  
            
            //modify it 
            $mail->setFrom('email@gmail.com');
            $mail->addAddress($email);
    
            $mail->isHTML(false);
            $mail->Subject = $sub;
            $mail->Body    = $msg;
            if ($mail->send()) {
                echo "<script>console.log('message sent')</script>";
            }
            else {
                echo "<script>console.log('message not sent')</script>";
            }  
        }
?>
