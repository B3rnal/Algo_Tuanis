<?php
require "cnx.php";

$id=$_GET["id"];
$name=$_POST["nombre"];
$desc=$_POST["detalles"];
//$lat=$_GET["lat"]; agregar estos despues
//$long=$_GET["long"];
$tel=$_POST["telefono"];
$email=$_POST["email"];
$face=$_POST["facebook"];
$you=$_POST["youtube"];
$premium = 1;
$sql="update locations set name_location='".$name."', description='".$desc."', telefono='".$tel."', email='".$email."', facebook='".$face."', youtube='".$you."', premium='".$premium."' where id_location='".$id."'";
$cnx->query($sql);
header('location: index.html'); 

?>