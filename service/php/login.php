<?php
session_start();

include_once("../models/db.php");

$form = $_POST;

if($form["login"] && $form["password"]){
    $login = htmlspecialchars($form["login"]);
    $password = htmlspecialchars($form["password"]);

    $login = trim($login);
    $password = trim($password);

    try{
        $db = new DB();

        $user = $db->query("SELECT * FROM users WHERE login = '$login' OR email = '$login'");

        $db->close();
    }catch (Exception $exception){
        echo $exception->getMessage();
    }

    $resp = array();

    if($user){
        if ($user["activate"] == 1){
            if(password_verify($password, $user["password"])){
                $_SESSION["ID"] = $user["ID"];
                $resp["res"] = "OK";
                $resp["sql"] = $user;
            }
            else{
                $resp["res"] = "Wrong password";
            }
        }
        else{
            $resp["res"] = "Please, verify your email address";
        }
    }
    else{
        $resp["res"] = "User doesn't exist";
    }

    echo json_encode($resp);
}