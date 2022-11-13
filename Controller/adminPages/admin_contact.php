<?php
session_start();
$admin_id=($_SESSION['id']);
if(empty($admin_id)){
    session_destroy();
    header("Location:../login.html");
    die();
}
$conn = new PDO("mysql:host=localhost;dbname=crud", "root", "");

$query = "select * from admin where admin_id=:admin_id";
$stm = $conn->prepare($query);
$stm->bindParam(":admin_id", $admin_id);
$stm->execute();
$row = $stm->fetch(PDO::FETCH_ASSOC);
$usr_name=$row['admin_name'];

$query2 = "select * from feedback";
$stm2 = $conn->prepare($query2);
$stm2->execute();
$row2 = $stm2->fetchAll();





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

<form class="form-horizontal" role="form" method="post" action="admin_feedback.php">
    <div class="form-group">
        <label for="message" class="col-sm-2 control-label"> <?php $formcontent=
                "User: <b>$usr_name</b>"; echo($formcontent) ?> add a message:</label>
        <div class="col-sm-10">
            <textarea class="form-control" rows="6" name="usr_comment"  placeholder="pentru a fi submis formularul nu trebuie sa fie gol" required="required"></textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
            <input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-10 col-sm-offset-2">
            <! Will be used to display an alert to the user>
        </div>
    </div>
</form>
<?php
foreach($row2 as $key => $row) {

    ?>
        <form class="form-horizontal" role="form" method="post" action="admin_update_button.php">
    <div class="form-group">

        <label for="message" class="col-sm-2 control-label"> <?php echo '<b>'.$row['fe_usr_name'].'</b>'." at ".$row['fe_date'];  ?></label>
        <div class="col-sm-10">
            <a class="btn btn-danger" href="admin_delete_button.php?id=<?php echo $row["fe_id"]; ?>" class="button">Delete</a>
            <input id="submit" name="submit" type="submit" href="admin_update_button.php?id=<?php echo $row["fe_id"]; ?>" value="Update" class="btn btn-primary">
            <textarea  class="form-control" rows="6" id="usr_comm" name="usr_comm"><?php  echo $row['fe_usr_comment']?></textarea>
            <input type="hidden" id="custId" name="usr_id" value="<?php echo $row["fe_id"]; ?>">

        </div>
    </div>
        </form>
<?php } ?>

<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>