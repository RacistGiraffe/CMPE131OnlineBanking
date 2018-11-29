<?php
if (isset($_POST['transfer-submit'])) {

    require 'dbh.inc.php';

    $username = $_POST['username'];
    $balance = $_POST['balance'];
    $balanceTwo = $_POST['balanceTwo'];
     
    # $sqlGrabbedBalance = "SELECT balanceUsers FROM users WHERE uidUsers='ruchirTest';";
    
    $resultBalance = mysqli_query($conn, "UPDATE users SET balanceUsers = $balance WHERE users.uidUsers = '$username';");
    $resultBalanceTwo = mysqli_query($conn, "UPDATE users SET balanceTwoUsers = $balanceTwo WHERE users.uidUsers = '$username';");
                        
    if (empty($username) || empty($balance) || empty($balanceTwo)){
        header("Location: ../pages/MoneyTransfer.php?error=emptyfields&uid=".$username."&balance".$balance."balanceTwo".$balanceTwo);
        exit();
    } else {
        if ($resultBalance === TRUE && $resultBalanceTwo === TRUE){
            # successful
            header("Location: ../pages/MoneyTransfer.php?transfer=success");
            exit();   
        } else {
            # else send an error
            header("Location: ../pages/MoneyTransfer.php?error=sqlerror");
            exit();
        }        
    } 
} else { 
    header("Location: ../pages/MoneyTransfer.php");     # change to main page
    exit();
}       
    

    


    // $stmt = mysqli_stmt_init($conn);
    // # check if sql statement works with database connection
    // if (!mysqli_stmt_prepare($stmt, $sql)) {
    //     header("Location: ../pages/MoneyTransfer.php?error=sqlerrorconn");
    //     exit();
    // } else {
    //     mysqli_stmt_bind_param($stmt, "s", $username); # passing in basic data
    //     mysqli_stmt_execute($stmt);
    //     mysqli_stmt_store_result($stmt); # store result from database and fetch information from the database
    //     $resultCheck = mysqli_stmt_num_rows($stmt);

    //     if ($resultCheck > 0) {
    //         header("Location: ../pages/MoneyTransfer.php?error=incorrectbalance&balance=".$balance);
    //         exit();
    //     } else {
    //         $sqlBalanceOne = mysqli_query($conn, "UPDATE users 
    //                     SET balanceUsers = $balance
    //                         WHERE uidUsers = 'ruchirTest';");

    //         # update amount from other account
            // $sqlBalanceTwo = "UPDATE users 
            //             SET balanceTwoUsers = 101.00 
            //                 WHERE uidUsers = 'ruchirTest';";

    //         $stmt = mysqli_stmt_init($conn);

    //         # check for sql errors
    //         if (!mysqli_stmt_prepare($stmt, $sqlBalanceOne)) {
                // header("Location: ../pages/MoneyTransfer.php?error=sqlerror");
                // exit();
    //         } else if (!mysqli_stmt_prepare($stmt, $sqlBalanceTwo)) {
    //             header("Location: ../pages/MoneyTransfer.php?error=sqlerror");
    //             exit();
    //         } else {
    //             mysqli_stmt_bind_param($stmt, "ss", $username, $balance); # passing in 3 basic data
    //             mysqli_stmt_execute($stmt);
    //             header("Location: ../pages/MoneyTransfer.php?transfer=success");
    //             exit();
    //         }
    //     }
    // } # sql conn else end     
    // mysqli_stmt_close($stmt);   # close off statement
    // mysqli_close($conn);        # close off the connection
?>