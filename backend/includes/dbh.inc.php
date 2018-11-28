<?php
# Setup Connections
# setup the connection
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "onlinebanking";



# create the actual database if it doesn't already exist
$sqlCreate = "CREATE DATABASE IF NOT EXISTS onlinebanking;"

# run the create database sql line
$stmtCreate = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmtCreate, $sqlCreate)) {
    exit();
} else {
    mysqli_stmt_execute($stmtCreate);
    exit();
}


# run the use database sql line
$sqlUseMe = "use onlinebanking;"
$stmtUseMe = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmtUseMe, $sqlUseMe)) {
    exit();
} else {
    mysqli_stmt_execute($stmtUseMe);
    exit();
}

# run the create table sql line
$sqlCreateTable = "CREATE TABLE IF NOT EXISTS users (
    idUsers int(11) AUTO_INCREMENT PRIMARY KEY not null,
    uidUsers varchar(256) not null,
    emailUsers varchar(256) not null,
    pwdUsers varchar(256) not null,
    balanceUsers decimal(10,2) not null
);"

$stmtCreateTable = mysqli_stmt_init($conn);
if (!mysqli_stmt_prepare($stmtCreateTable, $sqlCreateTable)) {
    exit();
} else {
    mysqli_stmt_execute($stmtCreateTable);
    exit();
}

# connect to the database
$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

if(!$conn){
    die("connection failed: ".mysqli_connect_error());
}


