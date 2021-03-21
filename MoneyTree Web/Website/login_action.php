<?php

if (isset($_POST["submit"])) {
    
    //старт на сесија
    session_start();
    //ги ставаме податоците од POST во SESSION за да ги користиме
$_SESSION['username'] = $_POST["username"];
$_SESSION['pass'] = $_POST["pass"];

//Зимаме од POST во обичен variable за да ги користиме во функции
    $username = $_POST["username"];
    $pass = $_POST["pass"];

require_once 'dbinfo.php';    
require_once 'functions.php';

//Checking Login Function
$checked = checkLogin($username,$pass);


} else {
    //Error if this isnt entered through button
    header("Location: ./login.php?error=nicetry");
}

?>