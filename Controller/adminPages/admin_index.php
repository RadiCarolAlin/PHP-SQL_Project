
<?php
session_start();
$admin_id=($_SESSION['id']);
if(empty($admin_id)){
    session_destroy();
    header("Location:../login.html");
    die();
}
$conn = new PDO("mysql:host=localhost;dbname=crud", "root", "");



?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Bootstrap Part11</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
<?php include('NavBarAdmin.html'); ?>
<!--<nav> tag end-->
<!--Default Navbar End Here-->
<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>