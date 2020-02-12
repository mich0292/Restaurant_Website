<?php

    if(isset($_POST['login-submit'])){
        require 'dbh.inc.php';
        $username = $_POST['username'];
        $password = $_POST['password'];
        if(empty($username) || empty($password)){
            header("Location: ../home.php?emptyfields");
            exit();
        }
        else{
            $sql = "SELECT * FROM user WHERE username=? OR email=?;";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../home.php?error=sqlerror");
                exit();
            }
            else{
                mysqli_stmt_bind_param($stmt, "ss", $username, $username);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if($row = mysqli_fetch_assoc($result)){
                    $pwdCheck = password_verify($password, $row['password']);
                    if($pwdCheck == false){
                        header("Location: ../home.php?error=wrongpassword");
                        exit();
                    }
                    else if($pwdCheck == true){
                        session_start();
                        $_SESSION['userId'] = $row['id'];
                        $_SESSION['username'] = $row['username'];

                        header("Location: ../home.php?login=success");
                        exit();
                    }
                }
                else{
                    header("Location: ../home.php?error=nouser");
                    exit();
                }
            }
        }
    }
    else{
        header("Location: ../home.php");
        exit();
    }

