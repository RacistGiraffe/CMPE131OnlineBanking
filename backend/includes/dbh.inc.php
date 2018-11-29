<?php
# Setup Connections
# setup the connection
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "onlinebanking";

$dbAndTableCreated = FALSE;

while ($dbAndTableCreated == FALSE) {

    # setup first connection without database
    $conn = mysqli_connect($servername, $dbUsername, $dbPassword);
    if(!$conn){
        die("connection failed: ".mysqli_connect_error());
    } else {
        # create the actual database if it doesn't already exist
        $sqlCreate = "CREATE DATABASE IF NOT EXISTS onlinebanking;";

        if (mysqli_query($conn, $sqlCreate) === FALSE) {
            echo "Error creating database: " . mysqli_error($conn);
        } else {
            # if successful, select database 
            mysqli_select_db($conn,"onlinebanking");

            # create the table if not exists
            $sqlCreateTable = "CREATE TABLE IF NOT EXISTS users (
                idUsers int(11) AUTO_INCREMENT PRIMARY KEY not null,
                uidUsers varchar(256) not null,
                emailUsers varchar(256) not null,
                pwdUsers varchar(256) not null,
                balanceUsers decimal(10,2) not null
            );";
            if (mysqli_query($conn, $sqlCreateTable) === FALSE) {
                echo "Error creating table: " . mysqli_error($conn);
            } else {
                $dbAndTableCreated = TRUE;
            }
        } 
    } # connection-else end
} # while loop end

# if db and table created, immediately establish connection
$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);
if (!$conn){
    die("connection failed: ".mysqli_connect_error());
}

# connect to the database


