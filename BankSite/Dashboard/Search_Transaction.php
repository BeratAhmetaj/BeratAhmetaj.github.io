<?php 

session_start(); 
$username = $_SESSION['username'];

if (isset($_POST["submit"])) {
    
    $ToUser = $_POST["ToUser"];
    
require_once '../dbinfo.php';    
require_once '../functions.php';

$checkusername = usernameTaken($ToUser, $connect);

if($checkusername){
$transnum =GetCustomDeposit($ToUser,$username);
//Order -- ($transactionid,$ToUser,$Amount,$Smetka,$Reason,$Date);
$_SESSION['transaction_id'] = $transnum[0];
$_SESSION['ToUser'] = $transnum[1];
$_SESSION['Amount'] = $transnum[2];
$_SESSION['Smetka'] = $transnum[3];
$_SESSION['Reason'] = $transnum[4];
$_SESSION['Date'] = $transnum[5];
header("Location: ./Transaction_List_withsess.php");

} else {
header("Location: ./Transaction_List.php?error=UserNotExist");
}

} else {
    header("Location: ./Transaction_List.php?error=error");
}

?>