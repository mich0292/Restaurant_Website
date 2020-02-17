<?php

    if(isset($_POST['edit-profile'])){
        require 'dbh.inc.php';
        $username = $_POST['username'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $birthday = $_POST['birthday'];
        $contact = $_POST['contact'];
        if(empty($password) || empty($email) || empty($name) || empty($birthday) || empty($contact)){
            header("Location: ../edit-profile.php?error=emptyfields&name=".$name."&email=".$email."&birthday=".$birthday."&contact=".$contact);
            exit();

        }
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
            header("Location: ../edit-profile.php?error=invalidemail&username=".$username);
            exit();
        }
        else{
            $sql = "SELECT username FROM user WHERE username=?";
            $stmt = mysqli_stmt_init($conn);
            if(! mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../edit-profile.php?error=sqlerror");
                exit();
            }
            else{
                mysqli_stmt_bind_param($stmt, "s", $username);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_store_result($stmt);
                $resultCheck = mysqli_stmt_num_rows($stmt);

                $sql = "UPDATE user SET name = ?, email= ?, password = ?, birthday = ?, contact = ? WHERE username = $username;";
                $stmt = mysqli_stmt_init($conn);
                if(! mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../edit-profile.php?error=sqlerror");
                    exit();
                }
                else{
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                    mysqli_stmt_bind_param($stmt, "ssssi", $name, $email, $hashedPwd, $birthday, $contact);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../Profile.php?edit-profile=success");
                    exit();
                }
                
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
    else{
        header("Location ../Profile.php");
        exit();
    }

    }