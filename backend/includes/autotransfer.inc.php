<?php
if (isset($_POST['autotransfer-submit'])) {

    require 'dbh.inc.php';
    require 'check.inc.php';

    # retrieve values from form
    $balance = $_POST['balance'];
    $balanceTwo = $_POST['balanceTwo'];
    
    $time = $_POST['time'];
    $eventSetup = mysqli_query($conn, "SET GLOBAL event_scheduler = 'ON';");

    # check for empty fields
    if (empty($balance) || empty($balanceTwo)) {
        header("Location: ../pages/automatedtransactions.php?error=emptyfields&uid="."&balance".$balance."&balanceTwo".$balanceTwo);
        exit();
    } else {
        $resultBalance = mysqli_query($conn, "CREATE EVENT insert_balance ON SCHEDULE AT CURRENT_TIMESTAMP 
                        + INTERVAL '$time' HOUR_SECOND
                        DO 
                            UPDATE users SET balanceUsers = $balance WHERE users.uidUsers = '$username';");

        # run database code when time has passed
        $resultBalanceTwo = mysqli_query($conn, "CREATE EVENT insert_balance2 ON SCHEDULE AT CURRENT_TIMESTAMP 
                        + INTERVAL '$time' HOUR_SECOND
                        DO 
                            UPDATE users SET balanceTwoUsers = $balanceTwo WHERE users.uidUsers = '$username';");

        header("Location: ../pages/automatedtransactions.php?error=futuresuccess"); 
        exit();
    }      
} else { 
    # stay on current page
    header("Location: ../pages/automatedtransactions.php");     
    exit();
} 
?>