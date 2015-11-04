<?php
require "cnx.php";
$user=$_GET["id_user"];
$location=$_GET["id_location"];
$sql="Update locations set id_usuario=".$user." where id_location=".$location;
var_dump($sql);
$cnx->query($sql);
?>