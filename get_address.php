<?php

include("connection.php");

$em = $_POST['email'];
// $em= "blindassisted123@gmail.com";


	$res = mysqli_query($con,"SELECT * FROM address WHERE memail='$em' ORDER BY email ASC ");
	
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