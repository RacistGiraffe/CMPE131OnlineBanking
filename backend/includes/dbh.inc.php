<?php
# Setup Connections

$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "onlinebanking";

$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

if(!$conn){
    die("connection failed: ".mysqli_connect_error());
}