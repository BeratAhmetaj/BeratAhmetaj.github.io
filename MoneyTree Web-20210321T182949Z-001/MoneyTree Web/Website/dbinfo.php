<?php 
//Local Database Info 

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "moneytree";



//Connect to database
$connect = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$connect) {
    die("Connection Failed: ". mysqli_connect_error());
}

?>