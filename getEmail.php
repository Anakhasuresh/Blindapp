<?php
error_reporting(0);
set_time_limit(0);

include("connection.php");

$imei = $_POST['imei'];

	$string = "SELECT * from register where imei ='$imei'";
	$result = mysqli_query($con,$string) or die(mysqli_error());

	if(mysqli_num_rows($result)>0)
	{
	while($row = mysqli_fetch_array($result)){
	$r = $row["email"];
	}
	//echo "success";
	echo $r;
	}
	else
	{
		echo "failed";
	}
	
mysqli_close($con);
?>