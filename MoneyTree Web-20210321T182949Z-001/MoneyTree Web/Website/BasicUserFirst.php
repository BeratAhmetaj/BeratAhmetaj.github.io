<?php
session_start();


if (isset($_POST["submit"])) {
    
    $fullname = $_POST["name"];
    $adress = $_POST["Adresa"];
    $embg = $_POST["EMBG"];
    $CreditCard = $_POST["Credit"];
    $CVV = $_POST["CVV"];
    $Expiry = $_POST["Expiry"];
    
require_once 'dbinfo.php';    
require_once 'functions.php';

BasicUserFirst($fullname,$adress,$embg,$CreditCard,$CVV,$Expiry);

header("Location: Dashboard/main_hub.php");
} else {
    header("Location: Dashboard/first_time_form2.php?error=error");
}

?>