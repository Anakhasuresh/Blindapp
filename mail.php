<?php
//error_reporting(0);
include("connection.php");
set_time_limit(0); 
 
// Connect to gmail
$imapPath = '{imap.gmail.com:993/imap/ssl}INBOX';
$username = 'blindassisted123@gmail.com';
$password = 'blindassisted123456789';
 
$em = "blindassisted123@gmail.com";
$imap = imap_open("$imapPath", "$username", "$password");
 
 
  $message_count = imap_num_msg($imap);
  // echo $message_count."htfhtfh";
 
 
    $message_countD = $message_count-8;
//echo "<br><br>";
    for ($i = $message_countD; $i <= $message_count; ++$i) {
        $header = imap_header($imap, $i);
        $body = trim(substr(imap_body($imap, $i), 0, 10000));
        $prettydate = date("jS F Y", $header->udate);

        if (isset($header->from[0]->personal)) {
            $personal = $header->from[0]->personal;
        } else {
            $personal = $header->from[0]->mailbox;
        }

        $email = "$personal <{$header->from[0]->mailbox}>";
		$body=explode("UTF-8",$body);
		$body=explode("--",$body[1]);
		  // echo "$prettydate *** $email *** $body[0] ----------------<br>";
        // echo "On $prettydate, $email said \"$body\".<br> ----------------<br>";
		mysqli_query($con,"insert into inbox(content,sender,recipient) values ('$body[0]','$email','$em')");
    }

    imap_close($imap);

?>