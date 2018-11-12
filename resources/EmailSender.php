<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';
class EmailSender{

    private $email;
    private $subject;
    public $body;
    private $conf;
    function __construct(){
        $str = file_get_contents("..\\conf.json");
        $this->conf = json_decode($str, true);
    }

    public function sendEmail($email, $sub, $msg){
        //code of sending email
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
            return "";
        }
        else {
            return "Message sent!";
        }  
    }

    public function configuration(){
        //server configurations
    }
}

?>