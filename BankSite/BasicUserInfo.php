<?php

//THIS WHOLE CODE IS COPY PASTED, REWORK


if (isset($_POST["submit"])) {
    
    $username = $_POST["username"];
    $pass = $_POST["pass"];

require_once 'dbinfo.php';    
require_once 'functions.php';

$checked = checkLogin($username,$pass);


} else {
    header("Location: ./login.php?error=nicetry");
}

?>