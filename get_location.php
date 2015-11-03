<?php
require "cnx.php";
$searchName=isset($_GET["search_value"])?$_GET["search_value"]:"";
$categorias=isset($_GET["categoria"])?$_GET["categoria"]:array();

$sql='Select * from locations ';
$condition=false;
if(!empty($categorias)){
	$sql.='join categorias_location on locations.id_location=categorias_location.id_location ';
	$sql.='Where id_categoria in ('.implode(",", $categorias).')';
	$condition=true;
}
if(!empty($searchName)){
	$sql_next=$condition?' and':' where';
	$sql.=$sql_next.' name_location like "%'.$searchName.'%"';
}


$results=$cnx->query($sql);
$data=array();
while($row = $results->fetch_assoc()) {
	$sql="Select * from ratings where id_locations=".$row["id_location"];
	$results2=$cnx->query($sql);
	$rating_final=0;
	$count=0;
	while($row2 = $results2->fetch_assoc()) {
		$rating_final+=$row2["rating"];
		$count++;
	}
	if($rating_final>0){
		$rating_final=$rating_final/$count;
	}
	$row["rating"]=$rating_final;
	
	$data[]=$row;
}
echo json_encode($data);
//$file = "locations.txt";
//$json = json_decode(file_get_contents($file),true);
//$json[$name] = array("description" => $description, "lat" => $lat, "long"=>$long);
//file_put_contents($file, json_encode($json,true));
?>