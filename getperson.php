<?php

include("connection.php");


	$string="SELECT * from register ";
	$result=mysqli_query($con,$string)or die(mysqli_error());

	if (mysqli_num_rows($result)>0)
	{	
	while($row=mysqli_fetch_array($result)){
	$result1[]=$row;
	}
	//echo "success";
	echo json_encode($result1);
	}
	else
	{
		echo "failed";
	}
	
mysqli_close($con);

?>