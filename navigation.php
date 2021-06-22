<?php
$lan=$_POST['lat'];
$lon=$_POST['lon'];
$des=$_POST['des'];

/*$lan="9.9971";
$lon="76.3028";
$des="Edappally";*/


$url="https://maps.googleapis.com/maps/api/directions/json?origin=$lan,$lon&destination=$des&key=AIzaSyDkWmpj6LhBakVdioDB1--1CIepEPE5404";

$data=file_get_contents($url);

//echo $data;

$wordChunks = explode("html_instructions", $data);
$wordChunks2 = explode("distance", $data);
//echo " $wordChunks[1] <br />";
for($i = 1; $i < 2; $i++){
$data= explode("\"", $wordChunks[$i]);
$j=$i+2;
$distance= explode("\",", $wordChunks2[$j]);
$distance=str_replace("text\" : \""," ",$distance[0]);

$distance=str_replace("\" : {"," ",$distance);
$distance=str_replace("\""," ",$distance);

$data=str_replace("\u003c/b\u003e"," ",$data[2]);

$data=str_replace("\u003cb\u003e"," ",$data);
$data=str_replace("\u003cdiv style="," ",$data);
$distance=trim($distance);
echo $data." $distance ";



}



?>




