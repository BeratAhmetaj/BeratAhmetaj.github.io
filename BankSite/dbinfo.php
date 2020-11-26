<?php 
//Local Database Info 

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "moneytree";

/*
//000webhost Databse Info
$serverName = "localhost";
$dBUsername = "id15306911_moneydb";
$dBPassword = "Mo_?Kp5i69VNTTh5";
$dBName = "id15306911_moneytree";
*/
//Connect to database
$connect = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$connect) {
    die("Connection Failed: ". mysqli_connect_error());
}

?>