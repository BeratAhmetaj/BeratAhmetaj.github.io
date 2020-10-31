<?php

if (isset($_POST["submit"])) {
    
    $username = $_POST["username"];
    $pass = $_POST["pass"];
    $email = $_POST["email"];
    $passRepeat = $_POST["passRepeat"];

    require_once 'dbinfo.php';    
    require_once 'functions.php';

    
    if (passwordCheck($pass, $passRepeat) === true){
        header("Location: ./login.php?error=passmatch");
    exit();
    }

    if (usernameTaken($username, $connect) === true){
        header("Location: ./login.php?error=usernametaken");
    exit();
     }    
    
    createUser($username,$pass,$email);    

} else {
    header("Location: ./login.php?error=nicetry");
}

?>