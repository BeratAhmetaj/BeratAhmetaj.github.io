<?php
session_start();


if (isset($_POST["submit"])) {
    
    $fullname = $_POST["name"];
    $adress = $_POST["Adresa"];
    $embg = $_POST["EMBG"];
    
require_once 'dbinfo.php';    
require_once 'functions.php';

BasicUserInfo($fullname,$adress,$embg);

header("Location: Dashboard/frame_BI.php?error=success");
} else {
    header("Location: Dashboard/frame_BI.php?error=error");
}

?>