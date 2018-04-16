<?php

include_once("../models/db.php");
include_once("../models/email.php");

$form = $_POST;

if(($form["login"] && $form["email"] && $form["password"] && $form["password_confirm"])){

    $login = htmlspecialchars($form["login"]);
    $email = htmlspecialchars($form["email"]);

    $login = trim($login);
    $email = trim($email);

    try {
        $db = new DB();

        $checkLogin = $db->query("SELECT * FROM users WHERE login = '$login'");
        $checkEmail = $db->query("SELECT * FROM users WHERE email = '$email'");

        if ($checkLogin) {
            echo "User has already registered with this login! Change the login!";
        } elseif ($checkEmail) {
            echo "User has already registered with this email! Change the email!";
        } else{
            if (($form["password"] == $form["password_confirm"])) {
                $password = htmlspecialchars($form["password"]);

                $password = trim($password);

                $password_hash = password_hash($password, PASSWORD_DEFAULT);

                $db->query("INSERT INTO users (login, email, password, activate) VALUES ('$login','$email','$password_hash', '0')");

                $send = new Email($email);

                $send->send();

                echo "Success registration. Please, confirm your email";
            }
            else
                echo "Passwords are different!";
        }

        $db->close();
    } catch (Exception $exception) {
        echo $exception->getMessage();
    }
}

exit();