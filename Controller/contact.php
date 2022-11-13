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
$usr_name=$row['usr_prenume'];

$query2 = "select * from feedback";
$stm2 = $conn->prepare($query2);
$stm2->execute();
$row2 = $stm2->fetchAll();





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

<form class="form-horizontal" role="form" method="post" action="feedback.php">
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

<div class="form-group">
    <label for="message" class="col-sm-2 control-label"> <?php echo '<b>'.$row['fe_usr_name'].'</b>'." at ".$row['fe_date'];  ?></label>
    <div class="col-sm-10">
        <textarea readonly  class="form-control" rows="6" name="usr_comment"><?php  echo $row['fe_usr_comment']?></textarea>
    </div>
</div>
<?php } ?>

<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>