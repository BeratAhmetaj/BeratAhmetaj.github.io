<?php 

session_start(); 
$username = $_SESSION['username'];


    
    $Amount = $_POST["Amount"];
   
    
require_once '../dbinfo.php';    
require_once '../functions.php';

$Loan = LoanAction($username,$Amount);

if($Loan){
    header("Location: ./LoanCoins.php?error=Success");
} else {
header("Location: ./LoanCoins.php?error=Success");
}


?>