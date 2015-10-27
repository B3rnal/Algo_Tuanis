<?php
require "cnx.php";
$sql="Select * from locations ";
$results=$cnx->query($sql);
$data=array();
while($row = $results->fetch_assoc()) {
	$data[]=$row;
}
echo json_encode($data);
//$file = "locations.txt";
//$json = json_decode(file_get_contents($file),true);
//$json[$name] = array("description" => $description, "lat" => $lat, "long"=>$long);
//file_put_contents($file, json_encode($json,true));
?>