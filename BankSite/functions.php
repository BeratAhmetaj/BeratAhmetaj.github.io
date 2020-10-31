<?php

function checkLogin($username, $pass){
include "dbinfo.php";

$hash_sql = "SELECT Pass FROM users WHERE Username = '$username' ";

$result = mysqli_query($connect, $hash_sql);

$row = mysqli_fetch_assoc($result);

$verify = password_verify($pass,$row["Pass"]);

if($verify) {
    echo"welcome";
} else { echo"hashing password problem, contact site owner for info"; }
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
    } else { return false;
        
     }

}

function createUser($username,$pass,$email){
    include "dbinfo.php";
$hashedpass = password_hash($pass,PASSWORD_DEFAULT);

    $sql = "INSERT INTO `users` (`Id`, `Email`, `Pass`, `Username`) VALUES (NULL, '$email', '$hashedpass', '$username')";

    $result = mysqli_query($connect, $sql);
    
}  



?>