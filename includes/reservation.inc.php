<?php
	require 'dbh.inc.php';	//connect to database
	// If the reservebutton is pressed
    function writeReservation($dateOfReservation,$timeOfReservation,$numOfAdult,$numOfChild,$fullName,$email,$phone,$city,$remarks){
		/*
		$sql = "INSERT INTO my_guests (firstName, lastName, Age) VALUES ('$_POST[firstname]', '$_POST[lastname]', '$_POST[age]')";
		if (mysqli_query($link, $sql)){
			echo "Data entered successfully <br>\n";
		}else {
			echo "Error entering data:".mysql_error($link)."<br>";
		}*/
		$sql = "INSERT INTO menu (date, time, adult, child, name, email, phone, city, remarks) VALUES (?, ?, ?, ?, ?, ?)";
		$stmt = mysqli_stmt_init($conn);
		 if(! mysqli_stmt_prepare($stmt, $sql)){
			header("Location: ../home.php?error=sqlerror");
			exit();
        }
		else{
			mysqli_stmt_bind_param($stmt, "sssssi", $dateOfReservation,$timeOfReservation,$numOfAdult,$numOfChild,$fullName,$email,$phone,$city,$remarks);
			mysqli_stmt_execute($stmt);
			header("Location: ../home.php?signup=success");
			exit();
		}
	}
    
    header("Location: ../home.php");
    exit();
    
?>