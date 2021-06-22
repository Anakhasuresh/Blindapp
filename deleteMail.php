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

$check = imap_mailboxmsginfo($mbox);
// echo "Messages before delete: " . $check->Nmsgs . "<br />\n";

// imap_delete($mbox, 2);
if(imap_delete($mbox, $mno, 0))
{
    echo "Deleted";
}
else{
    echo "failed";
}

$check = imap_mailboxmsginfo($mbox);
// echo "Messages after  delete: " . $check->Nmsgs . "<br />\n";

imap_expunge($mbox);

$check = imap_mailboxmsginfo($mbox);
// echo "Messages after expunge: " . $check->Nmsgs . "<br />\n";

imap_close($mbox);

?>
