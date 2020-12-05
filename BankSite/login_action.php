<?php

if (isset($_POST["submit"])) {
    
    //Session Start
    session_start();
    //Putting Info Into Session to use front-end and in functions later
$_SESSION['username'] = $_POST["username"];
$_SESSION['pass'] = $_POST["pass"];

//Getting POST info to use in functions for SQL
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