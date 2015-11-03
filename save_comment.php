<?php
require "cnx.php";

$comment=$_GET["comment_text"];
$rating=$_GET["rating"];
$id=$_GET["id"];
if(!empty($comment)){
	$sql="Insert into comments (id_locations,text_comments) values (".$id.",'".$comment."')";
	$cnx->query($sql);
}
if(!empty($rating)){
	$sql="Insert into ratings (id_locations,rating) values (".$id.",".$rating.")";
	$cnx->query($sql);
}


?>