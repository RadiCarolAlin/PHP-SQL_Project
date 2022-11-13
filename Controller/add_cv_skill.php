<?php
session_start();

if (( !empty($_REQUEST['usr_skill']) )) {
    $fe_usr_comment = filter_var(strip_tags(trim($_REQUEST['usr_skill'])));
    $usr_id=$_SESSION['id'];


    try {
        $conn = new PDO("mysql:host=localhost;dbname=crud", "root", "");
    } catch (PDOException $e) {
        die($e->getMessage());
    }
    //get user info

    try {
        $query = "select * from users where usr_id=:usr_id";
        $stm = $conn->prepare($query);
        $stm->bindParam(":usr_id",$usr_id);
        $stm->execute();
        $row = $stm->fetch(PDO::FETCH_ASSOC);


        echo("ajunge aici");
        $query = "insert into experienta_profesionala (ep_usr_id,ep_usr_name,ep_usr_email,ep_usr_skill) values (:ep_usr_id,:ep_usr_name,:ep_usr_email,:ep_usr_skill)";
        $stm = $conn->prepare($query);
        $stm->bindParam(":ep_usr_id", $row['usr_id']);
        $stm->bindParam(":ep_usr_name", $row['usr_prenume']);
        $stm->bindParam(":ep_usr_email", $row['usr_email']);
        $stm->bindParam(":ep_usr_skill",$fe_usr_comment);
        $stm->execute();
        header("Location:cv.php");

    } catch (PDOException $e)
    {
        die($e->getMessage());
    }
}