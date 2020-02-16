<?php

	// If the reservebutton is pressed
	if(isset($_POST['addReservation'])){
		require 'dbh.inc.php';	//connect to database

		$dateOfReservation = $_POST['resvDate'];
		$timeOfReservation = $_POST['resvTime'];
		$numOfAdult = $_POST['adultHc'];
		$numOfChild = $_POST['childHc'];
		$fullName = $_POST['custName'];
		$email = $_POST['custEmail'];
		$phone = $_POST['custContact'];
		$city = $_POST['custCity'];
		$remarks = $_POST['specialRemark'];
		
		//Ensure all the required fields are filled
		if (!empty($dateOfReservation) && !empty($timeOfReservation) && !empty($numOfAdult) && !empty($numOfChild) 
			&& !empty($fullName) && ! empty($email) && !empty($phone) && !empty($city)){
			//Clear the error formattting
			$_SESSION['dateClass'] = ""; 
			$_SESSION['timeClass'] = "";
			$_SESSION['nameClass'] = "";
			$_SESSION['emailClass'] = "";
			$_SESSION['phoneClass'] = "";
			$_SESSION['cityClass'] = "";
			$_SESSION['adultClass'] = "";
			
			//sql statement for insertion
			$sql = "INSERT INTO reservation (date_of_reservation, time_of_reservation, num_of_adult, num_of_child, full_name, email, phone, city, special_remarks) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
			$stmt = mysqli_stmt_init($conn);
			if (mysqli_stmt_prepare($stmt, $sql)){
				//string = s, i = integer
				mysqli_stmt_bind_param($stmt, "ssiisssss", $dateOfReservation, $timeOfReservation, $numOfAdult, $numOfChild, $fullName, $email, $phone, $city, $remarks);
				mysqli_stmt_execute($stmt);
				header("Location: Admin-ReservedList.php?reservation=success");
				exit();
			}else {
				$errorMessage = "Error entering data:".mysqli_error($link)."<br>";
				header("Location: Admin-ReservedList.php?sql_error");
				exit();
			}
		}	
		else{
			if (empty($_POST['resvDate'])){
				$_SESSION['dateErr'] = "Date is required";
				$_SESSION['dateClass'] = "has-error"; 
			}
			if (empty($_POST['resvTime'])){ 
				$_SESSION['timeErr'] = "Time is required";
				$_SESSION['timeClass'] = "has-error"; 
			}
			
			if (empty($_POST['custName'])){
				$_SESSION['nameErr'] = "Name is required";
				$_SESSION['nameClass'] = "has-error";
			}
			if (empty($_POST['custEmail'])){
				$_SESSION['emailErr'] = "Email is required";
				$_SESSION['emailClass'] = "has-error";
			}
			if (empty($_POST['custContact'])){
				$_SESSION['phoneErr'] = "Phone number is required";
				$_SESSION['phoneClass'] = "has-error";
			}
			if (empty($_POST['custCity'])) {
				$_SESSION['cityErr'] = "City of residence is required";
				$_SESSION['cityClass'] = "has-error";
			}
			if (empty($_POST['adultHc'])) {
				$_SESSION['adultErr'] = "Number of adult will be 1";
				$_SESSION['adultClass'] = "has-error";
			}
			header("Location: Admin-ReservedList.php");
			exit();	
		}				
		mysqli_close($conn);		
	}  
	else if(isset($_POST['closeButton'])){
		//Destroy session and clear the variables
		session_unset(); 
		session_destroy(); 
		header("Location: home.php?cancel#section-tableReservation");
		exit();	
	}
?>