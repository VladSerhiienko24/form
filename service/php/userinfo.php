<?php

include_once(dirname(__FILE__) . "\..\models\db.php");

if(isset($_SESSION["ID"])){

    $id = $_SESSION["ID"];

    try{
        $db = new DB();

        $result = $db->query("SELECT * FROM users WHERE ID = '$id'");

        $db->close();
    }catch(Exception $exception){
        echo $exception->getMessage();
    }

}