<?php

if (( !empty($_REQUEST['usr_skill']) )) {

    $ep_usr_skill = filter_var(strip_tags(trim($_REQUEST['usr_skill'])));
    $ep_id = filter_var(strip_tags(trim($_REQUEST['usr_id'])));
    echo($ep_usr_skill);
    $conn = new PDO("mysql:host=localhost;dbname=crud", "root", "");
    $query = "update experienta_profesionala set ep_usr_skill=:ep_usr_skill where ep_id=:ep_id ";
    $stm = $conn->prepare($query);
    $stm->bindParam(":ep_usr_skill",$ep_usr_skill);
    $stm->bindParam(":ep_id",$ep_id );
    $stm->execute();
    header("Location:admin_cv_page.php");

}else{
    echo("nu aj aici");
}