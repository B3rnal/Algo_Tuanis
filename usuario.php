<?php 
require "cnx.php";
@session_start();
$nombre=$_GET["name"];
$email=$_GET["email"];
$photo=$_GET["photo"];

$sql='INSERT INTO users (nombre, correo, photo) VALUES("'.$nombre.'", "'.$email.'", "'.$photo.'") ON DUPLICATE KEY UPDATE nombre="'.$nombre.'", photo="'.$photo.'"';

$result=$cnx->query($sql);
$sql="select * from users where correo='".$email."'";
$results=$categorias=$cnx->query($sql);
while($row = $results->fetch_assoc()) {
	$usuario=$row;
}

$_SESSION["current_user"]=$usuario;


?>