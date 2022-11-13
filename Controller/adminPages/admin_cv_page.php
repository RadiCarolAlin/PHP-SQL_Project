
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

<?php include('NavBarAdmin.html'); ?>

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

foreach($row2 as $key => $row) {
    $k=null;
    if(isset($_POST['submit'])){
        $k=($_POST['valori']);
    }
    if($row['ep_usr_name']==$k){
        ?>
    <form class="form-horizontal" role="form" method="post" action="admin_cv_update.php">

    <div class="form-group">
                <label for="message" class="col-sm-2 control-label"> <?php echo '<b>'.$row['ep_usr_name'].'</b>'." at ".$row['ep_date'];  ?></label>
                <div class="col-sm-10">
                    <a class="btn btn-danger" href="admin_cv_delete.php?id=<?php echo $row["ep_id"]; ?>" class="button">Delete</a>
                    <input id="submit" name="submit" type="submit" href="admin_cv_update.php?id=<?php echo $row["ep_id"]; ?>" value="Update" class="btn btn-primary">
                    <textarea class="form-control" rows="6" name="usr_skill"><?php  echo $row['ep_usr_skill']?></textarea>
                    <input type="hidden" id="custId" name="usr_id" value="<?php echo $row["ep_id"]; ?>">
                </div>
            </div>
    </form>
        <?php }} ?>



<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>