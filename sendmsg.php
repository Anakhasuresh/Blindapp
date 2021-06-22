<?php
mysql_connect("localhost","root","");
mysql_select_db("blind_deaf_dumb");


$sid=$_POST["sid"];
$rid=$_POST["rid"];
$msg=$_POST["msg"];
$string="SELECT * from message where sender_id='$sid' and reciever_id='$rid' ";
	$result=mysql_query($string)or die(mysql_error());

	if (mysql_num_rows($result)>0)
	{	
		$string="UPDATE message SET msg= '$msg' WHERE sender_id='$sid' and reciever_id='$rid' ";
    $result=mysql_query($string)or die(mysql_error());
	}
	else{
		
	$res1="insert into message (sender_id,reciever_id,msg) values('$sid','$rid','$msg') ";
	
	if(mysql_query($res1)){
	echo "success";
	}	
	else{
	echo "failed";
	}
	

	}
	   

mysql_close();
?>