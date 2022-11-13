<?php

$conn = new PDO("mysql:host=localhost;dbname=crud", "root", "");
$query = "select * from users where usr_id=:usr_id";
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

<?php
include('css/NavBar.html')
?>

<form class="form-horizontal" role="form" method="post" action="feedback_nouser.php">
    <div class="form-group">

        <div class="form-outline mb-3">
            <label class="col-sm-2 col-form-label" for="nousr_email">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" name="nousr_email" id="nousr_email" placeholder="Introdu emailul" required="required">
            </div>
        </div>
        <label for="message" class="col-sm-2 control-label">add a message:</label>
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
        <label for="message" class="col-sm-2 control-label"> <?php  if($row['fe_usr_name']!=null){
                echo '<b>'.$row['fe_usr_name'] .'</b>'." at ".$row['fe_date'];
            }else
                echo '<b>'.$row['fe_usr_email'] .'</b>'." at ".$row['fe_date'];
                ?></label>
        <div class="col-sm-10">
            <textarea readonly  class="form-control" rows="6" name="usr_comment"><?php  echo $row['fe_usr_comment']?></textarea>
        </div>
    </div>
<?php } ?>

<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>