<?php
include_once("../models/db.php");

if((isset($_GET["token"]) && !empty($_GET["token"])) &&
    isset($_GET['email']) && !empty($_GET['email'])){
    $token = $_GET["token"];
    $email = $_GET['email'];
}

try {
    $db = new DB();

    $result = $db->query("SELECT token FROM confirm_user WHERE email = '$email'");

    if ($result) {
        if ($token == $result["token"]) {
            $update = $db->query("UPDATE users SET activate = 1 WHERE email = '$email'");
            if($update){
                $db->query("DELETE FROM confirm_user WHERE email = '$email'");
                echo '<h1>Почта успешно подтверждена!</h1>';
                $address_site = "http://".$_SERVER['HTTP_HOST']."/";
                echo '<a href="'.$address_site.'"index.php">На главную</a>';
            }
        }
        else{
            echo "ERROR";
        }
    }
    $db->close();
}catch (Exception $exception){
    echo $exception->getMessage();
}