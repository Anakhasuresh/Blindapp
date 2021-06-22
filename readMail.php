<?php
 
error_reporting(0);

// $semail = 'blindassisted123@gmail.com';
// $pwd = 'blindassisted123456789';
// $pwd = 'blindassisted';
// $mno = "2";

$semail = $_REQUEST['email'];
$pwd = $_REQUEST['pass'];
$mno = $_REQUEST['mno'];

$mbox = imap_open("{imap.gmail.com:993/imap/ssl}INBOX", "$semail", "$pwd")
    or die("Can't connect: " . imap_last_error());

$status = imap_setflag_full($mbox, $mno, "\\Seen");

if($status)
{
    echo "status changed";
}
else{
    echo "failed to change status";
}

imap_close($mbox);

?>
