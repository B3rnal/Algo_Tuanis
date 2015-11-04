<?php 
require "cnx.php";	
$name=$_GET["name"];
$desc=$_GET["description"];
$tel=$_GET["telefono"];
$email=$_GET["email"];
$face=$_GET["facebook"];
$yt=$_GET["youtube"];
$id=$_GET["id"];
$categories=$_GET["cat"];

$sql="update locations set name_location='".$name."', description='".$desc."', telefono='".$tel."', email='".$email."', facebook='".$face."', youtube='".$yt."' where id_location='".$id."'";
$cnx->query($sql);
$sql="delete  from categorias_location where id_location=".$id;
$cnx->query($sql);
foreach ($categories as $cat) {
	$sql="insert into categorias_location (id_location,id_categoria) values(".$id.",".$cat.")";
	$cnx->query($sql);
}

?>