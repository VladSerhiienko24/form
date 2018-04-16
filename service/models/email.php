<?php
include_once("db.php");

class Email{

    private $email;
    private $token;
    private $address_site;
    private $email_admin;

    public function __construct($email)
    {
        $this->email = $email;
        $this->token = md5($email.time());
        $this->address_site = "http://".$_SERVER['HTTP_HOST']."/";
        $this->email_admin = "holms9853@gmail.com";
    }

    public function send(){
        try {
            $db = new DB();
            $db->query("INSERT INTO confirm_user (email, token) VALUES ('$this->email','$this->token')");

            $subject = "Confirm registration on site ".$_SERVER["HTTP_HOST"];
            $subject = "=?utf-8?B?".base64_encode($subject)."?=";

            $as = "<a href=".$this->address_site."service/php/activation.php?token=".$this->token."&email=".$this->email.">".$this->address_site."activation/".$this->token."</a>";

            $message = "Please, confirm a registration on site by clicking on this link: " . $as;

            $headers = "FROM: $this->email_admin\r\nReply-to: $this->email_admin\r\nContent-type: text/html; charset=utf-8\r\n";

            mail($this->email, $subject, $message, $headers);

            $db->close();
        }catch (Exception $exception){
            echo $exception->getMessage();
        }
    }
}