<?php

function redirect($url, $statusCode = 303)
{
    header('Location: ' . $url, true, $statusCode);
    die();
}
if (!empty($_REQUEST['usr_name']) && !empty($_REQUEST['usr_prenume']) &&  !empty($_REQUEST['usr_email']&& !empty($_REQUEST['usr_pass'])&& !empty($_REQUEST['usr_repass']))) {
    //Aici se proceseaza formu
    $usr_name = filter_var(strip_tags(trim($_REQUEST['usr_name'])));
    $usr_prenume = filter_var(strip_tags(trim($_REQUEST['usr_prenume'])));
    $usr_email = filter_var(strip_tags(trim($_REQUEST['usr_email'])), FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL);
    $usr_parola=filter_var(strip_tags(trim($_REQUEST['usr_pass'])));
    $usr_repetaparola=filter_var(strip_tags(trim($_REQUEST['usr_repass'])));
    $criptic=sha1($usr_parola);
    try {
        $conn = new PDO("mysql:host=localhost;dbname=crud", "root", "");
    } catch (PDOException $e) {
        die($e->getMessage());
    }
    try {
            if (strcmp($usr_parola, $usr_repetaparola)==0) {
                echo("ajunge aici");
                $query = "insert into users (usr_name,usr_prenume,usr_email,usr_parola) values (:usr_name,:usr_prenume,:usr_email,:usr_parola)";
                $stm = $conn->prepare($query);
                $stm->bindParam(":usr_name", $usr_name);
                $stm->bindParam(":usr_prenume", $usr_prenume);
                $stm->bindParam(":usr_email", $usr_email);
                $stm->bindParam(":usr_parola",$criptic);
                $stm->execute();
                redirect('../login.html');
            }
    } catch (PDOException $e)
    {
        die($e->getMessage());
    }

}