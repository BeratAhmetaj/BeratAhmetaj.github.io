<?php

if (isset($_POST["submit"])) {
    
    $username = $_POST["name"];
    $pass = $_POST["pass"];

require_once 'dbinfo.php';    
require_once 'functions.php';

} else {
    echo"You son of a bitch, dont try to hack my site.";
}

?>