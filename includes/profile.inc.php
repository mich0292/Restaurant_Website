<?php
    if (isset($_POST['edit-profile'])) {
        require 'dbh.inc.php';
        $username = $_POST['username'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $birthday = $_POST['birthday'];
        $contact = $_POST['contact'];
        $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

        $sql = "UPDATE `user` SET name = '$name', email = '$email', password = '$hashedPwd', birthday = '$birthday', contact = '$contact' WHERE username = '$username'";
	    $update_profile = mysqli_query($conn,$sql);
	    if ($update_profile) {
		    header("Location: ../Profile.php?user=$username");
        }
        else{
		    echo $mysqli->error;
        }
        mysqli_close($conn);
    }
    else{
        header("Location ../Profile.php");
        exit();
    }