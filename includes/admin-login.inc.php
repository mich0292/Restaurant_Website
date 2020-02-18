<?php

    if(isset($_POST['admin-login-submit'])){
        require 'dbh.inc.php';
        $username = $_POST['username'];
        $password = $_POST['password'];
        if(empty($username) || empty($password)){
            header("Location: ../AdminLogin.php?emptyfields");
            exit();
        }
        else{
            $sql = "SELECT * FROM user WHERE username=? OR email=?;";
            $stmt = mysqli_stmt_init($conn);
            if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: ../AdminLogin.php?error=sqlerror");
                exit();
            }
            else{
                mysqli_stmt_bind_param($stmt, "ss", $username, $username);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if($row = mysqli_fetch_assoc($result)){
                    $pwdCheck = $row['password'];
                    if($pwdCheck == false){
                        header("Location: ../AdminLogin.php?error=wrongpassword");
                        exit();
                    }
                    else if($pwdCheck == true){
                        session_start();
                        $_SESSION['userId'] = $row['id'];
                        $_SESSION['username'] = $row['username'];
                        if($row['is_admin'] == true)
                        {
                            header("Location: ../AdminHome.php?login=success");
                            exit();
                        }
                        else{
                            header("Location: ../AdminLogin.php?error=userisnotadmin");
                            exit();
                        }
                        
                    }
                }
                else{
                    header("Location: ../AdminLogin.php?error=nouser");
                }
            }
        }
    }
    else{
        header("Location: ../AdminLogin.php");
        exit();
    }

