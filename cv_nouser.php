<?php

$conn = new PDO("mysql:host=localhost;dbname=crud", "root", "");
$query2 = "SELECT * FROM experienta_profesionala ";
$stm2 = $conn->prepare($query2);
$stm2->execute();
$row2 = $stm2->fetchAll();

$query3 = "SELECT * FROM users";
$stm3 = $conn->prepare($query3);
$stm3->execute();
$row3 = $stm3->fetchAll();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Bootstrap Part11</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
<?php include('css/NavBar.html'); ?>

<form  action='' method="post">
    User:
    <select name="valori">
        <?php
        $name=null;
        foreach($row3 as $key => $row)
        {
            $name="<option >$row[usr_prenume]</option>";
            echo $name;   // displaying data in option menu
        }

        ?>
    </select>
    <input name="submit" type="submit" value="Select" class="btn btn-primary">
</form>
<?php
$k=null;
foreach($row2 as $key => $row) {
    if(isset($_POST['submit'])){
        $k=($_POST['valori']);
    }
    if(strcmp($row['ep_usr_name'], $k)==0){
        ?>
        <div class="form-group">
            <label for="message" class="col-sm-2 control-label"> <?php echo '<b>'.$row['ep_usr_name'].'</b>'." at ".$row['ep_date'];  ?></label>
            <div class="col-sm-10">
                <textarea readonly  class="form-control" rows="6" name="usr_comment"><?php  echo $row['ep_usr_skill']?></textarea>
            </div>
        </div>
    <?php }} ?>



<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>