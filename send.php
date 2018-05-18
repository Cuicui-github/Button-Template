<?php
use PHPMailer\PHPMailer\PHPMailer;
require_once "vendor/autoload.php";

$mail = new PHPMailer;

//Enable SMTP debugging. 
$mail->SMTPDebug = 3;                               
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = "smtp.gmail.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = "*****@gmail.com";                 
$mail->Password = "*******";                           
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";                           
//Set TCP port to connect to 
$mail->Port = 587;                                   

$mail->From = "*****@gmail.com";
$mail->FromName = "name";

$mail->addAddress("name@example.com", "Recepient Name");

$mail->isHTML(true);

$mail->Subject = "Subject Text";
$mail->Body = '<div align="left" style="500px;">
<ul>
<li> Name:'.$_REQUEST['name'].'</li>
<li> Email:'.$_REQUEST['email'].'</li>
<li> Number:'.$_REQUEST['number'].'</li>
<li> Program:'.$_REQUEST['program'].'</li>
<li> Question:'.$_REQUEST['question'].'</li>
</ul>
</div>';
if(!$mail->send()) 
{
    echo "Mailer Error: " . $mail->ErrorInfo;
} 
else 
{
    echo "Message has been sent successfully";
}
?>