<?php
error_reporting(0);
include("connection.php");

set_time_limit(0);

// $email = $_REQUEST['email'];
// $pass = $_REQUEST['pass']; 

$email = 'blindassisted123@gmail.com';
$pass = 'blindassisted123456789';

set_time_limit(0); 
 
// Connect to gmail
$imapPath = '{imap.gmail.com:993/imap/ssl}INBOX';
$username = $email;
$password = $pass;
 
$em = $email;
$imap = imap_open("$imapPath", "$username", "$password");
 
 
  $message_count = imap_num_msg($imap);
  // echo $message_count."htfhtfh";

    $message_countD = $message_count-8;
//echo "<br><br>";
    for ($i = $message_countD; $i <= $message_count; ++$i) {

		$bodyText = imap_fetchbody($imap,$i,1.2);
		if(!strlen($bodyText)>0){
		    $bodyText = imap_fetchbody($imap,$i,1);
		}

		$body = trim($bodyText);
		// echo $bodyText."<br>";

        $header = imap_header($imap, $i);
        // $message = imap_fetchbody($imap,$i, 1.1);
        // echo $message."<br>";
        // $body = trim(substr(imap_body($imap, $i), 0, 10000));
        $prettydate = date("jS F Y", $header->udate);

        if (isset($header->from[0]->personal)) {
            $personal = $header->from[0]->personal;
        } else {
            $personal = $header->from[0]->mailbox;
        }

        $email = "$personal {$header->from[0]->mailbox}";
		// $body=explode("UTF-8",$body);
		// $body=explode("--",$body[1]);
		  // echo "$prettydate *** $email *** $body[0] ----------------<br>";
        // echo "On $prettydate, $email said \"$body\".<br> ----------------<br>";
		// mysqli_query($con,"insert into inbox(content,sender,recipient) values ('$body[0]','$email','$em')");
		mysqli_query($con,"insert into inbox(content,sender,recipient) values ('$body','$email','$em')");
    }

    imap_close($imap);
 
	$res = mysqli_query($con,"select * from inbox where recipient = '$em' ORDER BY id DESC limit 0,5");
	// echo "select * from inbox where recipient = '$em' ORDER BY id DESC limit 0,5";
	// echo mysqli_num_rows($res);
	if(mysqli_num_rows($res)>0){
		while($row = mysqli_fetch_array($res))
		{
			$result[] = $row;
		}
		
	echo json_encode($result);
	}
	else{
	echo "failed";
	}

mysqli_close($con);
?>