
<?php
session_start();
$usr_id=($_SESSION['id']);
if(empty($usr_id)){
    session_destroy();
    header("Location:../login.html");
    die();
}
$conn = new PDO("mysql:host=localhost;dbname=crud", "root", "");
$query = "select * from users where usr_id=:usr_id";
$stm = $conn->prepare($query);
$stm->bindParam(":usr_id", $usr_id);
$stm->execute();
$row = $stm->fetch(PDO::FETCH_ASSOC);



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<?php include('NavBarUser.html'); ?>
<br>
</body>
</html>