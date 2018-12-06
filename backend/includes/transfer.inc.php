<?php
// Purpose of file is to handle transferring of money from one account to the other

if (isset($_POST['transfer-submit'])) {

    require 'dbh.inc.php';
    require 'check.inc.php';

    # retrieve values from form
    $balance = $_POST['balance'];
    $balanceTwo = $_POST['balanceTwo'];
    
    # run sql statements
    $resultBalance = mysqli_query($conn, "UPDATE users SET balanceUsers = $balance WHERE users.uidUsers = '$username';");
    $resultBalanceTwo = mysqli_query($conn, "UPDATE users SET balanceTwoUsers = $balanceTwo WHERE users.uidUsers = '$username';");
        
    # check for empty fields
    if (empty($balance) || empty($balanceTwo)){
        header("Location: ../pages/MoneyTransfer.php?error=emptyfields&uid=".$username."&balance".$balance."balanceTwo".$balanceTwo);
        exit();
    } else {
        # check if both sql statements successfully ran
        if ($resultBalance === TRUE && $resultBalanceTwo === TRUE){
            # successful
            header("Location: ../pages/MoneyTransfer.php?error=success");
            exit();   
        } else {
            # else send an error
            header("Location: ../pages/MoneyTransfer.php?error=sqlerror");
            exit();
        }        
    } 
} else { 
    # stay on current page
    header("Location: ../pages/MoneyTransfer.php");     
    exit();
}       