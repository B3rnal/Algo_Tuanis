<?php
require "cnx.php";

$name=$_GET["name"];
$description=$_GET["description"];
$lat=$_GET["lat"];
$long=$_GET["long"];
$sql="Insert into locations (latitude,longitude,name_location, description) values ('".$lat."','".$long."','".$name."','".$description."')";
$cnx->query($sql);
//$file = "locations.txt";
//$json = json_decode(file_get_contents($file),true);
//$json[$name] = array("description" => $description, "lat" => $lat, "long"=>$long);
//file_put_contents($file, json_encode($json,true));
?>