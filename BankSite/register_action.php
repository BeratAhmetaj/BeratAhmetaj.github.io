<?php

if (isset($_POST["submit"])) {
    
    $username = $_POST["username"];
    $pass = $_POST["pass"];
    $email = $_POST["email"];
    $passRepeat = $_POST["passRepeat"];

    require_once 'dbinfo.php';    
    require_once 'functions.php';

    //Password Repeat Check
    if (passwordCheck($pass, $passRepeat) === true){
        header("Location: ./login.php?error=passmatch");
    exit();
    }
    //Username Taken Check
    if (usernameTaken($username, $connect) === true){
        header("Location: ./login.php?error=usernametaken");
    exit();
     }
         
    //Create User in database
    createUser($username,$pass,$email);
    createMoney($username);

    header("Location: ./Dashboard/new_registered_user.html ");

} else {
    header("Location: ./login.php?error=nicetry");
}

?>