<?php
require "cnx.php";

$comment=$_GET["comment_text"];
$id=$_GET["id"];
$sql="Insert into comments (id_locations,text_comments) values (".$id.",'".$comment."')";
var_dump($sql);
$cnx->query($sql);
?>