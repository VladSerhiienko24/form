<?php
    session_start();

//    if (isset($_SESSION["ID"])){
//        $_SESSION["ID"] = "";
//    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="client/style/css/reset.css">
    <link rel="stylesheet" href="client/style/css/header.css">
    <link rel="stylesheet" href="client/style/css/menu.css">
    <link rel="stylesheet" href="client/style/css/content.css">
    <link rel="stylesheet" href="client/style/css/user.css">
    <link rel="stylesheet" href="client/style/css/footer.css">

<!--    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>-->
    <script src="client/lib/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!--    <script src="client/script/script.js"></script>-->
</head>
<body>
    <? include("client/components/header.html") ?>
    <? include("client/components/menu.html") ?>
    <? include("client/components/content.html") ?>
    <? include("client/components/user.php") ?>
    <? include("client/components/modal.html") ?>
    <?include("client/components/footer.html")?>
    <script src="client/script/registration.js"></script>
    <script src="client/script/login.js"></script>
    <script src="client/script/info_user.js"></script>
    <script src="client/script/edit.js"></script>
<!--    <script src="client/script/ajax.js"></script>-->
</body>
</html>