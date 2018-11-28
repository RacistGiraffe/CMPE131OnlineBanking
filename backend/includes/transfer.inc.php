<?php
if (isset($_POST['transfer-submit'])) {

    require 'dbh.inc.php';

    $username = $_POST['username'];
    $balance = $_POST['balance'];
    
    $sql = "SELECT uidUsers FROM users WHERE uidUsers=?;";
    $stmt = mysqli_stmt_init($conn);
        # check if sql statement works with database connection
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../pages/MoneyTransfer.php?error=sqlerrorconn");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $username); # passing in basic data
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt); # store result from database and fetch information from the database
        $resultCheck = mysqli_stmt_num_rows($stmt);

        if ($resultCheck > 0) {
            header("Location: ../pages/MoneyTransfer.php?error=incorrectbalance&balance=".$balance);
            exit();
        } else {
            $sql = "UPDATE users 
                        SET balanceUsers = 999.23 
                            WHERE uidUsers = 'ruchirTest'";
            $stmt = mysqli_stmt_init($conn);

            # check for sql errors
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../pages/MoneyTransfer.php?error=sqlerror");
                exit();
            } else {
                // $balanceDecimal = decimal($balance, 2);

                mysqli_stmt_bind_param($stmt, "ss", $username, $balance); # passing in 3 basic data
                mysqli_stmt_execute($stmt);
                header("Location: ../pages/MoneyTransfer.php?transfer=success");
                exit();
            }
        }
    }
    mysqli_stmt_close($stmt);   # close off statement
    mysqli_close($conn);        # close off the connection

} else { 
    header("Location: ../pages/MoneyTransfer.php");     # change to main page
    exit();
}
?>