<?php

if (( !empty($_REQUEST['usr_comm']) )) {

    $fe_usr_comment = filter_var(strip_tags(trim($_REQUEST['usr_comm'])));
    $fe_id = filter_var(strip_tags(trim($_REQUEST['usr_id'])));
    echo ($fe_usr_comment);
    $conn = new PDO("mysql:host=localhost;dbname=crud", "root", "");
    $query = "update feedback set fe_usr_comment=:fe_usr_comment where fe_id=:fe_id";
    $stm = $conn->prepare($query);
    $stm->bindParam(":fe_usr_comment",$fe_usr_comment);
    $stm->bindParam(":fe_id",$fe_id);
    $stm->execute();
    header("Location:admin_contact.php");

        }