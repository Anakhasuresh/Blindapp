<?php
 
//include("backup_mail.php");

// $pwd=$_POST['pwd']; 
// $semail=$_POST['semail']; 
// $remail=$_POST['remail']; 
// $sub=$_POST['subject']; 
// $content=$_POST['content']; 

// $pwd="ack81hk03skt46";
// $semail="ash.tech4soft@gmail.com";

include("class.phpmailer.php");

/*$semail = 'blindassisted123@gmail.com';
$pwd = 'blindassisted123456789';

$remail= "abin.ck.9@gmail.com thomasachu339@gmail.com";
$sub= "test";
$content= "body";*/

$pwd=$_POST['pwd']; 
$semail=$_POST['semail']; 
$remail=$_POST['remail']; 
$sub=$_POST['subject']; 
$content=$_POST['content']; 

// $myString = "9,admin@example.com,8";
$myArray = explode(' ', $remail);

for($i = 0; $i < sizeof($myArray); $i++)
{ 

$account = $semail;
$password = $pwd;
 
$from = $semail;
$to = $myArray[$i];
echo $to."<br>";
$from_name = " ";
 
$subject = $sub;
$from_name = " ";
$msg = $content; 
// include("class.phpmailer.php");

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

}

?> 