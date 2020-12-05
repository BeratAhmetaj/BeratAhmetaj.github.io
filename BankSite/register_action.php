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
    
    //Cookie
    $cookie_name = "MoneyTreeUser";
    $cookie_value = $username;
    setcookie($cookie_name, $cookie_value, time() + (86400), "/"); // 86400 = 1 day
   
    //Location
    header("Location: ./Dashboard/new_registered_user.php ");

} else {
    header("Location: ./login.php?error=nicetry");
}

?>