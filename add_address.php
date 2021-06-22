<?php

include("connection.php");

$em = $_POST['email'];

if(mysqli_query($con,"INSERT INTO register(email) VALUES ('$em')"))
{
	echo "success";
}
else{
	echo "failed";
}

mysqli_close($con);
?>