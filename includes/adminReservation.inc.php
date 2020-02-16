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
			//sql statement for insertion
			$sql = "INSERT INTO reservation (date_of_reservation, time_of_reservation, num_of_adult, num_of_child, full_name, email, phone, city, special_remarks) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
			$stmt = mysqli_stmt_init($conn);
			if (mysqli_stmt_prepare($stmt, $sql)){
				//string = s, i = integer
				mysqli_stmt_bind_param($stmt, "ssiisssss", $dateOfReservation, $timeOfReservation, $numOfAdult, $numOfChild, $fullName, $email, $phone, $city, $remarks);
				mysqli_stmt_execute($stmt);
				header("Location: admin_reservedlist.php?reservation=success");
				exit();
			}else {
				$errorMessage = "Error entering data:".mysqli_error($link)."<br>";
				header("Location: admin_reservedlist.php?sql_error");
				exit();
			}
		}	
		else{
			if (empty($_POST['resvDate'])) $_SESSION['dateClass'] = "has-error"; 
			if (empty($_POST['resvTime'])) $_SESSION['timeClass'] = "has-error"; 
			
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
			header("Location: admin_reservedlist.php");
			exit();	
		}				
		mysqli_close($conn);		
	}  
	else if(isset($_POST['cancelbutton'])){
		$_SESSION['dateClass'] = ""; 
		$_SESSION['timeClass'] = "";
		$_SESSION['nameErr'] = "";
		$_SESSION['phoneErr'] = "";
		$_SESSION['emailErr'] = "";
		$_SESSION['cityErr'] = "";
	}
?>