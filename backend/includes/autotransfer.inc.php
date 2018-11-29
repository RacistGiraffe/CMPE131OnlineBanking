<?php
if (isset($_POST['autotransfer-submit'])) {

    require 'dbh.inc.php';

    $username = $_POST['username'];
    $balance = $_POST['balance'];
    $balanceTwo = $_POST['balanceTwo'];
    $time = $_POST['time'];
     
    # $sql = "SELECT uidUsers FROM users WHERE uidUsers=$username;";
    $timeCheck = FALSE;

    while($timeCheck == FALSE) {               # hours, minutes notation
        # execute when time has passed
        if(date("Hi") != $time) {
            sleep(10);
        } else {

            $resultBalance = mysqli_query($conn, "UPDATE users SET balanceUsers = $balance WHERE users.uidUsers = '$username';");
            $resultBalanceTwo = mysqli_query($conn, "UPDATE users SET balanceTwoUsers = $balanceTwo WHERE users.uidUsers = '$username';");
                                
            if (empty($username) || empty($balance) || empty($balanceTwo)){
                header("Location: ../pages/MoneyTransfer.php?error=emptyfields&uid=".$username."&balance".$balance."balanceTwo".$balanceTwo);
                exit();
            } else {
                if ($resultBalance === TRUE && $resultBalanceTwo === TRUE){
                    # successful
                    header("Location: ../pages/MoneyTransfer.php?transfer=success");
                    $timeCheck = TRUE;      # set $timeCheck to true and exit loop
                    exit();   
                } else {
                    # else send an error
                    header("Location: ../pages/MoneyTransfer.php?error=sqlerror");
                    exit();
                }        
            }
        } # time-else end 
    } # while loop end
} else { 
    header("Location: ../pages/MoneyTransfer.php");     # change to main page
    exit();
} 
?>