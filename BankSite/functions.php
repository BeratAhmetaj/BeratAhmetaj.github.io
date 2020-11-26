<?php

//Login Check
function checkLogin($username, $pass){
include "dbinfo.php";

$hash_sql = "SELECT Pass FROM users WHERE Username = '$username' ";
$result = mysqli_query($connect, $hash_sql);
$row = mysqli_fetch_assoc($result);

$verify = password_verify($pass,$row["Pass"]);
 if($verify) {

    header("Location: ./Dashboard/main_hub.html ");

  } else { header("Location: ./login.php?error=wrongpass");}
}


//Password Match Check
function passwordCheck($pass, $passRepeat){
    if ($pass !== $passRepeat) {
        $result=true;  
    }
    else {
        
        $result=false;
    }
    return $result;
}

//Username Taken 
function usernameTaken($username, $connect){
    $sql = "SELECT * FROM users WHERE Username = '$username';";

    $result = mysqli_query($connect,$sql);

    if(mysqli_num_rows($result)) {
        return true;
    } else { return false;
        
     }

}

//Creating user
function createUser($username,$pass,$email){
    include "dbinfo.php";
$hashedpass = password_hash($pass,PASSWORD_DEFAULT);

    $sql = "INSERT INTO `users` (`Id`, `Email`, `Pass`, `Username`) VALUES (NULL, '$email', '$hashedpass', '$username')";

    $result = mysqli_query($connect, $sql);


} 
//Adding the user on the Money Table
function createMoney($username){
    include "dbinfo.php";

    $sql = "INSERT INTO `money` (`Username`, `coins`, `num_transaction`) VALUES ('$username', NULL, NULL);";

    $result = mysqli_query($connect, $sql);
} 

?>