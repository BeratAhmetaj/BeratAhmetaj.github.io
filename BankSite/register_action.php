<?php

if (isset($_POST["submit"])) {
    
    $username = $_POST["username"];
    $pass = $_POST["pass"];
    $email = $_POST["email"];
    $passRepeat = $_POST["passRepeat"];

    require_once 'dbinfo.php';    
    require_once 'functions.php';

    
    if (passwordCheck($pass, $passRepeat) === true){
    echo"Password not the same idiot";
    exit();
    }

    if (usernameTaken($username, $connect) === true){
    echo"Username is taken";
    exit();
     }    
    
    createUser($username,$pass,$email);    

} else {
    echo"You son of a bitch, dont try to hack my site.";
}

?>