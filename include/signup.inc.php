<!-- Will run when the signup button is clicked:
contains error handlers and signs up users for the webite -->

<?php

if (isset($_POST['signup-submit'])) { //checking that the user has clicked the signup button
    require 'dbh.inc.php';

    $username = $_POST['uid'];
    $email = $_POST['mail'];
    $password = $_POST['pwd'];
    $passwordReenter = $_POST['pwd-repeat'];

    if (empty($username) || empty($email) || empty($password) || empty($passwordReenter)) {
        header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
        exit();
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) { //checking for valid email AND username
        header("Location: ../signup.php?error=invalidmailuid=");

    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../signup.php?error=invalidmail&uid=".$username); //validating email input
        exit();
    } else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) { //validating username input
        header("Location: ../signup.php?error=invaliduid&mail=".$email);
        exit();
    } else if ($password !== $passwordReenter) { //checking that both password input fields are the SAME
        header("Location: ../signup.php?error=passwordcheck&mail=".$username."&mail=".$email);
        exit();
    } else { //making sure that there are no duplicate users being created
        $sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
        $conn = OpenCon();
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) { //check if the signup failed
            header("Location: ../signup.php?error=sqlerror");
            exit();
        }
        else { //adding users information into the user table (in database)
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt); //executing
            mysqli_stmt_store_result($stmt); //fetching information
            $resultCheck = mysqli_stmt_num_rows($stmt); //checking how many match results are found in the database
            if($resultCheck > 0) { //if true, there is already a user (with that username) in the database
                header("Location: ../signup.php?error=usertaken=".$email);
                exit();
            } else {
                $sql = "INSERT INTO users (uidUsers, emailUsers, passwrd) VALUES (?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) { //check if the signup failed
                    header("Location: ../signup.php?error=sqlerror");
                    exit();
                }
                else {
                    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $password);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../signup.php?signup=success");
                    exit();
                }
            }
        }
    } 
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    header("Location: ../signup.php");
    exit();
}