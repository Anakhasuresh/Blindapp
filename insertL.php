<?php

include("connection.php");

$lat=$_POST['lat'];
$lon=$_POST['lon'];
$imei=$_POST['imei'];

//$name=$_POST['_name'];
//hile($row=mysql_fetch_array($result))
	//$string="INSERT into location_details(imei,latitude,longitude) values('$imei','$lat','$lon')";
	//$result=mysql_query($string)or die(mysql_error());
	$string="SELECT latitude,longitude from location_details where imei='$imei'";
	$result=mysqli_query($con,$string)or die(mysqli_error());
	//$res=0;
	if (mysqli_num_rows($result)>0)
	{
		
		$string="UPDATE location_details SET latitude = '$lat', longitude = '$lon' WHERE imei = '$imei'";
    $result=mysqli_query($con,$string)or die(mysqli_error());
	}
	else
	{
		$string="INSERT into location_details(imei,latitude,longitude) values('$imei','$lat','$lon')";
	$result=mysqli_query($con,$string)or die(mysqli_error());
	}
	
mysqli_close($con);
?>