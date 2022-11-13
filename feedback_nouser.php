<?php


if (( !empty($_REQUEST['usr_comment']) and !empty($_REQUEST['nousr_email']) )) {
    //Aici se proceseaza formu
    $fe_usr_comment = filter_var(strip_tags(trim($_REQUEST['usr_comment'])));
    $fe_usr_email = filter_var(strip_tags(trim($_REQUEST['nousr_email'])));


    try {
        $conn = new PDO("mysql:host=localhost;dbname=crud", "root", "");
    } catch (PDOException $e) {
        die($e->getMessage());
    }
    //get user info

    try {

        echo("ajunge aici");
        $query = "insert into feedback (fe_usr_email,fe_usr_comment) values (:fe_usr_email,:fe_usr_comment)";
        $stm = $conn->prepare($query);
        $stm->bindParam(":fe_usr_email", $fe_usr_email);
        $stm->bindParam(":fe_usr_comment",$fe_usr_comment);
        $stm->execute();
        header("Location:contact_nouser.php");

    } catch (PDOException $e)
    {
        die($e->getMessage());
    }
}