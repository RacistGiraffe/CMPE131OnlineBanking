<?php
// Purpose of file is to delete user account from the database if requested

if (isset($_POST['delete-submit'])) {

    require 'dbh.inc.php';

    $username = $_POST['username'];
    
    if (empty($username)){
        header("Location: ../pages/accountsettings.php?error=emptyfields&uid=".$username);
        exit();
    } else if (!empty($username)) {
        $sql = mysqli_query($conn, "DELETE FROM users WHERE users.uidUsers = '$username';");
        if ($sql === TRUE){
            # successful
            header("Location: ../pages/accountsettings.php?deletion=success");
            exit();   
        } else {
            # else send an error
            header("Location: ../pages/accountsettings.php?error=sqlerror");
            exit();
        }        
    } else {
        header("Location: ../pages/accountsettings.php?error=invaliduid&uid=".$username);
        exit();
    } 
} else { 
    header("Location: ../pages/accountsettings.php");     # change to main page
    exit();
}
?>