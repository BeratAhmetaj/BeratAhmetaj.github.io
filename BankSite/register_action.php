<?php

if (isset($_POST["submit"])) {
    
    $username = $_POST["name"];
    $pass = $_POST["pass"];
    $email = $_POST["email"];
    $passRepeat = $_POST["passRepeat"]

    require_once 'dbinfo.php';    
    require_once 'functions.php';

    if (IsEmpty($username, $pass, $email, $passRepeat) !== false){
    header('location : login.html?error=empty');
    exit();
    }

    if (passwordCheck($pass, $passRepeat) !== false){
    header('location : login.html?error=passCheck');
    exit();
    }

    if (usernameTaken($username, $connect, $email) !== false){
    header('location : login.html?error=UsernameTaken');
    exit();
     }    
    
    createUser ($connect, $username, $pass, $email);

} else {
    echo"You son of a bitch, dont try to hack my site.";
}

?>