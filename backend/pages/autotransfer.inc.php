<?php
if (isset($_POST['autotransfer-submit'])) {

    require 'dbh.inc.php';
    require 'check.inc.php';

    # retrieve values from form
    $balance = $_POST['balance'];
    $balanceTwo = $_POST['balanceTwo'];
    $time = $_POST['time'];
     
    $timeCheck = FALSE;

    while($timeCheck == FALSE) {               # hours, minutes notation
        # execute when time has passed
        if (date("Hi") != $time) {
            sleep(10);
        } else {
            # run database code when time has passed
            $resultBalance = mysqli_query($conn, "UPDATE users SET balanceUsers = $balance WHERE users.uidUsers = '$username';");
            $resultBalanceTwo = mysqli_query($conn, "UPDATE users SET balanceTwoUsers = $balanceTwo WHERE users.uidUsers = '$username';");
               
            # check for empty fields
            if (empty($username) || empty($balance) || empty($balanceTwo)){
                header("Location: ../pages/MoneyTransfer.php?error=emptyfields&uid=".$username."&balance".$balance."balanceTwo".$balanceTwo);
                exit();
            } else {
                # if both sql statements worked, return the transfer was successful
                if ($resultBalance === TRUE && $resultBalanceTwo === TRUE){
                    header("Location: ../pages/MoneyTransfer.php?error=success");
                    $timeCheck = TRUE;      # set $timeCheck to true and exit loop
                    exit();   
                } 
                # else send an error
                else {    
                    header("Location: ../pages/MoneyTransfer.php?error=sqlerror");
                    exit();
                }        
            }
        } # time-else end 
    } # while loop end
} else { 
    # stay on current page
    header("Location: ../pages/MoneyTransfer.php");     
    exit();
} 
?>