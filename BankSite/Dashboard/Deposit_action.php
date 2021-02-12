<?php 

session_start(); 
$username = $_SESSION['username'];

if (isset($_POST["submit"])) {
    
    $ToUser = $_POST["ToUser"];
    $Smetka = $_POST["Smetka"];
    $Amount = $_POST["Amount"];
    $Reason = $_POST["Reason"];
    
require_once '../dbinfo.php';    
require_once '../functions.php';

$resultFromCheck = CheckMoney($username,$Amount);

if($resultFromCheck){
Deposit($username,$ToUser,$Smetka,$Amount,$Reason);
} else {
header("Location: ./Deposit.php?error=nomoney");
}

} else {
    header("Location: ./Deposit.php?error=error");
}

?>