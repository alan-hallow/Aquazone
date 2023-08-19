<?php


$serverName = "localhost";
$dBUserName = "root";
$dbPassword = "";
$dBName = "aquazone_mini_project";


$conn = mysqli_connect($serverName, $dBUserName, $dbPassword, $dBName);

if(!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}