<?php

include("connection.php");

$reminder = $_POST['reminder'];
$rdate = $_POST['rdate'];
$rtime = $_POST['rtime'];

// $reminder = "";
// $rdate = "POST";
// $rtime = "POST";


	$sql = "INSERT INTO reminders(reminder, rdate, rtime) VALUES ('$reminder','$rdate','$rtime')";
	if(mysqli_query($con,$sql)){
		echo mysqli_insert_id($con);
	}
	else{
	echo "failed";	
	}
	
mysqli_close($con);
?>