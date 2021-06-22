<?php
include("mail.php");

$pwd="blindassisted123456789";

$semail="blindassisted123@gmail.com";

$remail="gokul.vishnu587@gmail.com";

$sub="test";

$content="test y gokul";
/*$pwd=$_POST['pwd'];

$semail=$_POST['semail'];

$remail=$_POST['remail'];

$sub="hi";

$content="hello";*/
$account=$semail;
$password=$pwd;



/*echo $email;
echo $name;
echo $phone;
echo "adssf";
*/
$from=$semail;
$to=$remail;
$from_name=" ";

$subject=$sub;
$from_name=" ";
$msg=$content; 
include("class.phpmailer.php");
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->CharSet = 'UTF-8';
$mail->Host = "smtp.gmail.com";

$mail->SMTPAuth= true;
$mail->Port = 465; 
$mail->Username= $account;
$mail->Password= $password;
$mail->SMTPSecure = 'ssl';
$mail->From = $from;
$mail->FromName= $from_name;
$mail->isHTML(true);
$mail->Subject = $subject;
$mail->Body = $msg;
$mail->addAddress($to);

if(!$mail->send()){
 echo "Mailer Error: " . $mail->ErrorInfo;
}else{
 echo "E-Mail has been sent";
}
?>
