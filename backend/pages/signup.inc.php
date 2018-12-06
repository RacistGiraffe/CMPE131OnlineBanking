<?php
if (isset($_POST['signup-submit'])) {

    require 'dbh.inc.php';

    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordRepeat = $_POST['pwd-repeat'];

    # Check for Errors:
    # check for empty fields
    if (empty($username) || empty($email) || empty($password) 
        || empty($passwordRepeat)) {

            # refresh page and keep fields
            header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail".$email);
            exit();
    } 
    # check if valid email and password
    else if ((!filter_var($email, FILTER_VALIDATE_EMAIL) && (!preg_match("/^[a-zA-Z0-9]*$/", $username)))) {
        header("Location: ../signup.php?error=invalidmailuid");
        exit();
    }
    # check for valid email
    else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup.php?error=invalidmail&uid=".$username);
        exit();
    } 
    # check for valid username
    else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        header("Location: ../signup.php?error=invaliduid&mail=".$email);
        exit();
    }
    # check if passwords are equal
    else if ($password !== $passwordRepeat) {
        header("Location: ../signup.php?error=passwordcheck&uid=".$username."&mail".$email);
        exit();
    }

    # MySQL Data Management
    else {
        $sql = "SELECT uidUsers FROM users WHERE uidUsers=?;";
        $stmt = mysqli_stmt_init($conn);
        # check if sql statement works with database connection
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../signup.php?error=sqlerror");
            exit();
        } else {
            mysqli_stmt_bind_param($stmt, "s", $username); # passing in basic data
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt); # store result from database and fetch information from the database
            $resultCheck = mysqli_stmt_num_rows($stmt);

            if ($resultCheck > 0) {
                header("Location: ../signup.php?error=usertaken&mail=".$email);
                exit();
            } else {
                $sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES (?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    header("Location: ../signup.php?error=sqlerror");
                    exit();
                } else {
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd); # passing in 3 basic data
                    mysqli_stmt_execute($stmt);
                    header("Location: ../signup.php?signup=success");
                    exit();
                }
            }
        }
    }
    mysqli_stmt_close($stmt);   # close off statement
    mysqli_close($conn);        # close off the connection

} else {
    header("Location: ../signup.php");
    exit();
}



