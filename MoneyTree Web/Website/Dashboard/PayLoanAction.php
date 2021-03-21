<?php 

session_start(); 
$username = $_SESSION['username'];

require_once '../dbinfo.php';    
require_once '../functions.php';

$Pay = PayLoanAction($username);



?>