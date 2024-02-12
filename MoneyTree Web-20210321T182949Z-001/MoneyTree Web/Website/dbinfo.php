<?php 
//Local Database Info 
/*
$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "moneytree";
*/

//000webhost Databse Info
$serverName = "localhost";
$dBUsername = "id21864800_moneytreedb";
$dBPassword = "Beli2002.";
$dBName = "id21864800_moneytreedb";

//Connect to database
$connect = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$connect) {
    die("Connection Failed: ". mysqli_connect_error());
}

?>