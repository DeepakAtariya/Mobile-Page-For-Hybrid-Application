<?php
    require 'vendor/autoload.php';
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'preload.php';
    
        $MasterData = array($_GET["salut"],$_GET["first_name"],$_GET["last_name"],$_GET["organisation"],$_GET["emailAddress"],$_GET["mobile"],$_GET["enquiry"],$_GET["serviceProduct"]);
         
        
        $preload = new Preload();
        $connection = $preload->conn;
        $sql = "INSERT INTO user_table (salut, first_name, last_name, organisation, email, mobile, enquiry, serviceProduct)VALUES (?,?,?,?,?,?,?,?)";
        
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("ssssssss", $salut, $first_name, $last_name, $organisation, $email, $mobile, $enquiry, $service);
        
        $salut = $MasterData[0];
        $first_name = $MasterData[1];
        $last_name = $MasterData[2];
        $organisation = $MasterData[3];
        $email = $MasterData[4];
        $mobile = $MasterData[5];
        $enquiry = $MasterData[6];
        $service = $MasterData[7];
        echo "<script>console.log($service)</script>";

        if($stmt->execute()){
            echo "<script>console.log('database passed!')</script>";
            echo "db passed!";
        }else{
            echo "<script>console.log('database failed!')</script>";
            echo "db failed";
        }
        $stmt->close();

        //this will send email to the person who is enquiring --> Acknowledgement mail
        sendEmail($MasterData[4],"Acknowledgement","This is an acknowledgement!");   
            
        //fetching concerned person email id to send query
        $result = $preload->getServicePersonEmail($MasterData[7]);
        $concernedPerson = "";
        $serviceName = "";
        foreach ($result as $row) {
            $concernedPersonEmail = $row["email"];
            // $serviceName = $row['name'];
            $serviceName = $row['name'];
            echo "<script>console.log($serviceName)</script>";
        }
        //send enquiry mail to concerned person
        sendEmail($concernedPersonEmail,"Enquiry : ".$service, $enquiry); 


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


        //_____________________Salesforce________________
        // Get cURL resource
$curl = curl_init();

$url = "https://login.salesforce.com/services/oauth2/token?grant_type=password&client_id=3MVG9Y6d_Btp4xp76NSMJwOCsLHqPtjfzrCyTfAeaa_res0rFB1A96yHh95lUMBZxDXQod4AgHqIk2xzereZh&client_secret=8824295677123680664&username=divcoordinator@teri.res.in&password=C@R@M_2019#TERI1HalJIfuCrvYSQFSwPlSvPnzk";

//change url 
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => $url,
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

$content = json_encode(array("Contact_Email__c"=>$email,"Contact_Number__c"=>$mobile,"Created_Date__c"=>date("Y/m/d"),"Enquiry__c"=>$enquiry,"First_Name__c"=>$first_name,"Last_Name__c"=>$last_name,"Organisatin_Name__c"=>$organisation,"Salution__c"=>$salut,"Service"=>$serviceName)); //varies on the fields

curl_setopt_array($req1, array(
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_URL => $instance_url."/services/data/v44.0/sobjects/Case/",
    CURLOPT_HEADER => false,
    CURLOPT_HTTPHEADER => array("Authorization: OAuth $access_token","Content-type: application/json"),
    CURLOPT_POST => 1,
    CURLOPT_POSTFIELDS => $contents
));
$response = curl_exec($req1);
echo "<script>console.log($response)</script>";

curl_close($req1);
curl_close($curl);



?>
