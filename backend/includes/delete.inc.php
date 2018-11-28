<?php
if (isset($_POST['delete-submit'])) {

    require 'dbh.inc.php';

    $username = $_POST['username'];
    
    $sql = "SELECT uidUsers FROM users WHERE uidUsers=?;";
    $stmt = mysqli_stmt_init($conn);
        # check if sql statement works with database connection
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../pages/accountsettings.php?error=sqlerrorconn");
        exit();
    } else {
        mysqli_stmt_bind_param($stmt, "s", $username); # passing in basic data
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt); # store result from database and fetch information from the database
        $resultCheck = mysqli_stmt_num_rows($stmt);

        if ($resultCheck > 0) {
            header("Location: ../pages/accountsettings.php?error=invalidmailuid");
            exit();
        } else {
            $sql = "DELETE FROM users 
                        WHERE uidUsers = $username";
            $stmt = mysqli_stmt_init($conn);

            # check for sql errors
            if (!mysqli_stmt_prepare($stmt, $sql)) {
                header("Location: ../pages/accountsettings.php?error=sqlerror");
                exit();
            } else {
                // $balanceDecimal = decimal($balance, 2);

                mysqli_stmt_bind_param($stmt, "ss", $username);
                mysqli_stmt_execute($stmt);
                header("Location: ../pages/accountsettings.php?deletion=success");
                exit();
            }
        }
    }
    mysqli_stmt_close($stmt);   # close off statement
    mysqli_close($conn);        # close off the connection

} else { 
    header("Location: ../pages/index.php");     # change to main page
    exit();
}
?>