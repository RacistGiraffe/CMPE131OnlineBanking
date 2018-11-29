<?php

if (isset($_POST['login-submit'])){

    require 'dbh.inc.php';

    # grab information from login form
    $mailuid = $_POST['mailuid'];
    $password = $_POST['pwd'];

    # if empty fields, send back to signup page with error message in url
    if (empty(mailuid) || empty($password)) {
            $mailuid = $_POST['mailuid'];
            header("Location: ../index.php?error=emptyfields");
            exit();
    } else {
        $sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?error=sqlerror");
            exit();
        } else {

            mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
            mysqli_stmt_execute($stmt);

            # now grab results and do something with it
            $result = mysqli_stmt_get_result($stmt);

            # fetch data from this ressult, put in associative array
            if ($row = mysqli_fetch_assoc($result)) {
                # check if correct user
                $pwdCheck = password_verify($password, $row['pwdUsers']);
                if ($pwdCheck == false) {
                    header("Location: ../index.php?wrongpassword");
                    exit();
                } else if ($pwdCheck == true) {
                    # log him into the website      LOGIN CODE
                    
                    session_start();    # start a session
                    $_SESSION['userId'] = $row['idUsers']; # store information of the users
                    $_SESSION['userUid'] = $row['uidUsers'];

                    header("Location: ../pages/home.php?login=success");
                    exit();                    
                } else {
                    # incase pwdCheck fails
                    header("Location: ../index.php?wrongpassword");
                    exit();                    
                }

            } else {
                header("Location: ../index.php?error=nouser");
                exit();
            }
        }
    }
} else {
    header("Location: ../index.php");
    exit();
}
?>
