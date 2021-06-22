<?php

include("connection.php");

$imei = $_POST['imei'];

	$string = "SELECT * from register where imei='$imei'";
	$result = mysqli_query($con,$string) or die(mysqli_error());

	if (mysqli_num_rows($result) > 0)
	{
		echo "success";
	}
	else
	{
		echo "failed";
	}
	
mysqli_close($con);
?>