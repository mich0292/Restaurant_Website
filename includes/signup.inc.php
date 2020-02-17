<?php
    if(isset($_POST['signup-submit'])){
        require 'dbh.inc.php';
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $name = $_POST['name'];
        $birthday = $_POST['birthday'];
        $contact = $_POST['contact'];
        
        if(empty($username) || empty($password) || empty($email) || empty($name) || empty($birthday) || empty($contact)){
            header("Location: ../Registration.php?error=emptyfields&username=".$username."&email=".$email."&name=".$name."&birthday=".$birthday."&contact=".$contact);
            exit();
        }
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
            header("Location: ../Registration.php?error=invalidemailusername");
        }
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            header("Location: ../Registration.php?error=invalidemail&username=".$username);
            exit();
        }
        else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
            header("Location: ../Registration.php?error=invalidusername&email=".$email);
            exit();
        }
        else{
            $sql = "SELECT username FROM user WHERE username=?";
            $stmt = mysqli_stmt_init($conn);
            if(! mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../Registration.php?error=sqlerror");
                exit();
            }
            else{
                mysqli_stmt_bind_param($stmt, "s", $username);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck = mysqli_stmt_num_rows($stmt);
                if($resultCheck > 0){
                    header("Location: ../Registration.php?error=usertaken&email=".$email);
                    exit();
                }
                else{
                    $sql = "INSERT INTO user (username, password, email, name, birthday, contact) VALUES (?, ?, ?, ?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);
                    if(! mysqli_stmt_prepare($stmt, $sql)){
                        header("Location: ../Registration.php?error=sqlerror");
                        exit();
                    }
                    else{
                        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                        mysqli_stmt_bind_param($stmt, "ssssss", $username, $hashedPwd, $email, $name, $birthday, $contact);
                        mysqli_stmt_execute($stmt);
                        header("Location: ../Registration.php?signup=success");
                        exit();
                    }
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    else{
        header("Location ../Registration.php");
        exit();
    }