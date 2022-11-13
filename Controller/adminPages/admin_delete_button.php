<?php

$id=$_REQUEST['id'];
$fe_id=$id;
$conn = new PDO("mysql:host=localhost;dbname=crud", "root", "");
$query = "delete from feedback where fe_id=:fe_id";
$stm = $conn->prepare($query);
$stm->bindParam(":fe_id",$fe_id);
$stm->execute();
header("Location:admin_contact.php");

?>