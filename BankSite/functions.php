<?php

function checkLogin($username, $pass){
include "dbinfo.php";
$sql = "SELECT * FROM users WHERE Username='$username' AND Password='$pass'";

$result = mysqli_query($connect, $sql);

if(mysqli_num_rows($result)) {
    echo"Hello";
} else { header("Location: ./login.html?error=Wrong Login Data "); }
}

function passwordCheck($pass, $passRepeat){
    if ($pass !== $passRepeat) {
        $result=true;  
    }
    else {
        $result=false;
    }
    return $result;
}

function usernameTaken($username, $connect){
    $sql = "SELECT * FROM users WHERE Username = '$username';";

    $result = mysqli_query($connect,$sql);

    if(mysqli_num_rows($result)) {
        return true;
    } else { return false; }

}

function createUser($username,$pass,$email){
    include "dbinfo.php";
$hashedpass = password_hash($pass,PASSWORD_DEFAULT);

    $sql = "INSERT INTO `users` (`Id`, `Email`, `Password`, `Username`) VALUES (NULL, '$email', '$hashedpass', '$username')";

    $result = mysqli_query($connect, $sql);
    
}  



?>