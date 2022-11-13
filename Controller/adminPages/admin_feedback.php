<?php
session_start();

if (( !empty($_REQUEST['usr_comment']) )) {

    $fe_usr_comment = filter_var(strip_tags(trim($_REQUEST['usr_comment'])));
    $usr_id=$_SESSION['id'];


    try {
        $conn = new PDO("mysql:host=localhost;dbname=crud", "root", "");
    } catch (PDOException $e) {
        die($e->getMessage());
    }
    //get user info

    try {
        $query = "select * from admin where admin_id=:usr_id";
        $stm = $conn->prepare($query);
        $stm->bindParam(":usr_id",$usr_id);
        $stm->execute();
        $row = $stm->fetch(PDO::FETCH_ASSOC);


        echo("ajunge aici");
        $query = "insert into feedback (fe_usr_id,fe_usr_name,fe_usr_email,fe_usr_comment) values (:fe_usr_id,:fe_usr_name,:fe_usr_email,:fe_usr_comment)";
        $stm = $conn->prepare($query);
        $stm->bindParam(":fe_usr_id", $usr_id);
        $stm->bindParam(":fe_usr_name", $row['admin_name']);
        $stm->bindParam(":fe_usr_email", $row['admin_email']);
        $stm->bindParam(":fe_usr_comment",$fe_usr_comment);
        $stm->execute();
        header("Location:admin_contact.php");

    } catch (PDOException $e)
    {
        die($e->getMessage());
    }
}