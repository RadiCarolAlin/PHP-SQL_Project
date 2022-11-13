<?php
$id = $_REQUEST['id'];
$ep_id = $id;
echo($ep_id);
$conn = new PDO("mysql:host=localhost;dbname=crud", "root", "");
$query = "delete from experienta_profesionala where ep_id=:ep_id";
$stm = $conn->prepare($query);
$stm->bindParam(":ep_id", $ep_id);
$stm->execute();
header("Location:admin_cv_page.php");

