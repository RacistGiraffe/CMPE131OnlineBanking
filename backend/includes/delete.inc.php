<?php
// Purpose of file is to delete user account from the database if requested

if (isset($_POST['delete-submit'])) {

    require 'dbh.inc.php';
    require 'check.inc.php';

    # retrieve values entered on form
    $usernameEntered = $_POST['username'];
    
    # check if empty fields
    if (empty($usernameEntered)) {
        header("Location: ../pages/accountsettings.php?error=emptyfields&uid=".$usernameEntered);
        exit();
    } 
    # checks if username is user's correct username
    else if ($usernameEntered != $username) {      
        header("Location: ../pages/accountsettings.php?error=invaliduid&uid=".$usernameEntered);
        exit();
    } 
    # username is correct
    else if (!empty($usernameEntered)) {
        # try to delete the account
        $sql = mysqli_query($conn, "DELETE FROM users WHERE users.uidUsers = '$username';");
        if ($sql === TRUE){
            # successful
            header("Location: ../pages/accountsettings.php?error=success");
            sleep(2);
            require 'logout.inc.php';
            exit();   
        } else {
            # else send an error
            header("Location: ../pages/accountsettings.php?error=sqlerror");
            exit();
        }        
    }
} else { 
    # stay on page
    header("Location: ../pages/accountsettings.php");     
    exit();
}
?>