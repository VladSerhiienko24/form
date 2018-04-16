<?php
session_start();

include_once("../models/db.php");

$form = $_POST;

if(($form["login"] && $form["email"] && $form["password"] && $form["password_confirm"])){

    $login = htmlspecialchars($form["login"]);
    $email = htmlspecialchars($form["email"]);
    $password = htmlspecialchars($form["password"]);
    $password_confirm = htmlspecialchars($form["password_confirm"]);

    $login = trim($login);
    $email = trim($email);
    $password = trim($password);
    $password_confirm = trim($password_confirm);

    $id = $_SESSION["ID"];

    try {
        $db = new DB();

        $userBefore = $db->query("SELECT * FROM users WHERE ID = '$id'");

        if($userBefore["login"] == $login && $userBefore["email"] == $email && empty($password)){
            echo "NOTHING EDITED";
        }else{
            if($userBefore["login"] != $login){

                $checkLogin = $db->query("SELECT * FROM users WHERE login = '$login'");
                var_dump($checkLogin["ID"]);
                if($checkLogin && $checkLogin["ID"] != $id){
                    echo "User has already registered with this login! Change the login!";
                }
                else{
                    $db->query("UPDATE users SET login = '$login' WHERE ID = '$id'");
                }

            }
            if($userBefore["email"] != $email){

                $checkEmail = $db->query("SELECT * FROM users WHERE email = '$email'");

                if($checkEmail && $checkEmail["ID"] != $id){
                    echo "User has already registered with this email! Change the email!";
                }
                else{
                    $db->query("UPDATE users SET email = '$email' WHERE ID = '$id'");
                }

            }
            if((!empty($password)) && (!password_verify($password, $userBefore["password"]))){

                if (($password == $password_confirm)) {

                    $password_hash = password_hash($password, PASSWORD_DEFAULT);

                    $db->query("UPDATE users SET password = '$password_hash' WHERE ID = '$id'");
                }
                else{
                    echo "Passwords are different!";
                }
            }
        }

        $db->close();
    } catch (Exception $exception) {
        echo $exception->getMessage();
    }
}

exit();