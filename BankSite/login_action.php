<?php

if (isset($_POST["submit"])) {
    
    $username = $_POST["username"];
    $pass = $_POST["pass"];

require_once 'dbinfo.php';    
require_once 'functions.php';

checkLogin($username,$pass);

} else {
    echo"You son of a bitch, dont try to hack my site.";
}

?>