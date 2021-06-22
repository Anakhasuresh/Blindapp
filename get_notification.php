<?php

include("connection.php");

$sql = "SELECT * FROM reminders WHERE id = '$_POST[reminderid]' ";
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($res);
 
echo $row['reminder'];
 
?>