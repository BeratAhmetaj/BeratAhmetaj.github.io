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
        return true;}
    else { 
        return false;}
}

//Creating user
function createUser($username,$pass,$email){
    include "dbinfo.php";
$hashedpass = password_hash($pass,PASSWORD_DEFAULT);

    $sql = "INSERT INTO `users` (`Id`, `Email`, `Pass`, `Username`) VALUES (NULL, '$email', '$hashedpass', '$username')";

    $result = mysqli_query($connect, $sql);

} 
//Adding the user on the Money Table with null coins and null transactions
function createMoney($username){
    include "dbinfo.php";

    $sql = "INSERT INTO `money` (`Username`, `coins`, `num_transaction`) VALUES ('$username', NULL, NULL);";

    $result = mysqli_query($connect, $sql);
} 

//Getting Basic Infro From New Registered User
function BasicUserInfo($fullname,$adress,$embg){
    include "dbinfo.php";
    $fullname=trim($fullname);
    $fullname=strtolower($fullname);

    //Using Session username and making it into "ssusername"
    $ssusername = $_SESSION['username'];

    $sql = "UPDATE `users` SET `EMBG` = '$embg', `NameSurname` = '$fullname', `LivingAdress` = '$adress' WHERE `users`.`Username` = '$ssusername';";
    $result = mysqli_query($connect, $sql);

}
?>