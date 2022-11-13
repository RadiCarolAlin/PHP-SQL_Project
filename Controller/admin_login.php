<?php
session_start();

global $usr_id;
function redirect($url, $statusCode = 303)
{
    header('Location: ' . $url, true, $statusCode);
    die();
}

function setId($id)
{
    $usr_id = $id;
}
if (!empty($_REQUEST['admin_name'] && !empty($_REQUEST['admin_pass'])))
{

    $admin_name = filter_var(strip_tags(trim($_REQUEST['admin_name'])), FILTER_SANITIZE_EMAIL, FILTER_VALIDATE_EMAIL);
    $admin_parola = filter_var(strip_tags(trim($_REQUEST['admin_pass'])));


    try
    {
        $conn = new PDO("mysql:host=localhost;dbname=crud", "root", "");
    }

    catch
    (PDOException $e) {
        die($e->getMessage());
    }
    try {
        $query = "select * from admin where admin_name=:admin_name";
        $stm = $conn->prepare($query);
        $stm->bindParam(":admin_name", $admin_name);
        $stm->execute();
        $row = $stm->fetch(PDO::FETCH_ASSOC);
        $cript = sha1($admin_parola);
        if(!empty($row['admin_name'])) {
            if (strcmp($row['admin_pass'], $cript) == 0) {
                $query = "select * from admin where admin_name=:admin_name";
                $stm = $conn->prepare($query);
                $stm->bindParam(":admin_name", $admin_name);
                $stm->execute();
                $row = $stm->fetch(PDO::FETCH_ASSOC);
                $_SESSION['id'] = $row['admin_id'];

                redirect('adminPages/admin_index.php');
                die();
            }else
            {
                echo ("mail incorect");
                redirect('../admin_login.html');
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