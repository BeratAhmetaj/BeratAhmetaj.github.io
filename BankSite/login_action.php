<?php

if (isset($_POST["submit"])) {
    
    $username = $_POST["username"];
    $pass = $_POST["pass"];

require_once 'dbinfo.php';    
require_once 'functions.php';

checkLogin($username,$pass);

} else {
    header("Location: ./login.html?error=Thats Not How The Internet Works Bud.");
}

?>