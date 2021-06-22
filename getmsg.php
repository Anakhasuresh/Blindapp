<?php

include("connection.php");

include("mail.php")
$sid = $_POST['sid'];
$rid = $_POST['rid'];

$string="SELECT * from message where msg='Clear' and  sender_id='$sid' and reciever_id='$rid' ";
$res=mysqli_query($con,$string)or die(mysqli_error());

if (mysqli_num_rows($res)>0)
{
	echo "s";
}
else{

	$result = mysqli_query($con,"select * from message where sender_id='$sid' and reciever_id='$rid'  ");
 	//$result=mysql_query($res1)or die(mysql_error());

	if (mysqli_num_rows($result)>0)
	{	
		while($row = mysqli_fetch_array($result)){
			$result1[] = $row;
		}
	//echo "success";
		echo json_encode($result1);
		mysqli_query($con,"update message set msg='Clear' where sender_id='$sid' and reciever_id='$rid'");
	}
	else
	{
		echo "failed";
	}
		
}
	
	
mysqli_close($con);
?>