<?php
session_start();


if (isset($_POST["submit"])) {
    
    $CreditCard = $_POST["Credit"];
    $CVV = $_POST["CVV"];
    $Expiry = $_POST["Expiry"];
    
require_once 'dbinfo.php';    
require_once 'functions.php';

CreditInfo($CreditCard,$CVV,$Expiry);

header("Location: Dashboard/frame_CI.php?error=success");
} else {
    header("Location: Dashboard/frame_CI.php?error=error");
}

?>