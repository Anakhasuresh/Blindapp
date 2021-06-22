<?php

include("connection.php");

$email=$_POST['email'];
$ph=$_POST['ph'];
$imei=$_POST['imei'];

		$string="INSERT into register(imei,email,name) values('$imei','$email','$ph')";
	//$result=mysql_query($string)or die(mysql_error());
	if(mysqli_query($con,$string)){
		echo "success";
	}
	else{
	echo "failed";	
	}
	
mysqli_close($con);
?>