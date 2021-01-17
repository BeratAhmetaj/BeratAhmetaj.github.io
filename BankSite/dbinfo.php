<?php 

$serverName = "localhost";
$dBUsername = "root";
$dBPassword = "";
$dBName = "moneytree";

$connect = mysqli_connect($serverName, $dBUsername, $dBPassword, $dBName);

if (!$connect) {
    die("connection failed: ". mysqli_connect_error());
}

?>