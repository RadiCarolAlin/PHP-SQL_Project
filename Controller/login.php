<?php
session_start();


        function redirect($url, $statusCode = 303)
        {
            header('Location: ' . $url, true, $statusCode);
            die();
        }

    if (!empty($_REQUEST['usr_email'] && !empty($_REQUEST['usr_pass'])))
    {

    $usr_email = filter_var(strip_tags(trim($_REQUEST['usr_email'])), FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL);
    $usr_parola = filter_var(strip_tags(trim($_REQUEST['usr_pass'])));


    try
    {
    $conn = new PDO("mysql:host=localhost;dbname=crud", "root", "");
    }

    catch
    (PDOException $e) {
        die($e->getMessage());
    }
        try {
            $query = "select * from users where usr_email=:usr_email";
            $stm = $conn->prepare($query);
            $stm->bindParam(":usr_email", $usr_email);
            $stm->execute();
            $row = $stm->fetch(PDO::FETCH_ASSOC);
            $cript = sha1($usr_parola);
            if(!empty($row['usr_email'])) {
                if (strcmp($row['usr_parola'], $cript) == 0) {
                    $query = "select * from users where usr_email=:usr_email";
                    $stm = $conn->prepare($query);
                    $stm->bindParam(":usr_email", $usr_email);
                    $stm->execute();
                    $row = $stm->fetch(PDO::FETCH_ASSOC);
                    $_SESSION['id'] = $row['usr_id'];
                    redirect('index.php');
                    die();
                }
                else {
                    redirect('../login.html');
                }
            }else
            {
                echo ("mail incorect");
                redirect('index.php');
            }

        } catch (PDOException $e) {
            die($e->getMessage());
        }



}
?>