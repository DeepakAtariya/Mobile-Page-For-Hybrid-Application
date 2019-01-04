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

        //_____________________Salesforce_____________
        // Get cURL resource
$curl = curl_init();

//change url 
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://login.salesforce.com/services/oauth2/token?grant_type=password&client_id=3MVG9pe2TCoA1Pf6Iid1ED4rt4dd3UYoGmzofPc44JOKJt00DTy8SGWAkSbv3P0RvJQe8O09sc8iZLZg8MG4Q&client_secret=1115869310109997129&username=deepakatariya@abc.com&password=Deepak@123NWUtIFlmipmcJQeAjvhl0GXu',
    CURLOPT_POST => 1
));

// Send the request & save response to $resp
$resp = curl_exec($curl);
// echo $resp."<br>";

echo wordwrap($resp, 180,"<br>\n", TRUE);

$s_login_reponse = json_decode($resp, true);
$access_token = $s_login_reponse['access_token'];
$instance_url = $s_login_reponse['instance_url'];
$id = $s_login_reponse['id'];
$token_type = $s_login_reponse['token_type'];
$issued_at = $s_login_reponse['issued_at'];
$signature = $s_login_reponse['signature'];


//to save the data into salesforce 
$req1 = curl_init();

$content = json_encode(array("")); //varies on the fields

curl_setopt_array($req1, array(
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_URL => $instance_url."/services/data/v44.0/sobjects/case/",
    CURLOPT_HEADER => false,
    CURLOPT_HTTPHEADER => array("Authorization: OAuth $access_token","Content-type: application/json"),
    CURLOPT_POST => 1,
    CURLOPT_POSTFIELDS => $contents
));
$response = curl_exec($req1);


curl_close($req1);
curl_close($curl);


?>
