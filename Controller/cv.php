<?php
session_start();
$usr_id = ($_SESSION['id']);
if (empty($usr_id)) {
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
$usr_name=($row['usr_prenume']);
$ep_usr_id=$usr_id;

$query2 = "SELECT * FROM experienta_profesionala";
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

<form class="form-horizontal" role="form" method="post" action="add_cv_skill.php">
    <div class="form-group">
        <label for="message" class="col-sm-2 control-label"> <?php $formcontent=
                "User: <b>$usr_name</b>"; echo($formcontent) ?> add a skill to cv:</label>
        <div class="col-sm-10">
            <textarea class="form-control" rows="6" name="usr_skill"  placeholder="pentru a fi submis formularul nu trebuie sa fie gol" required="required"></textarea>
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
    if($row['ep_usr_name']==$k){
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