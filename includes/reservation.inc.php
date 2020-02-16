<?php
	// If the reservebutton is pressed
	if(isset($_POST['reservebutton'])){
		require 'dbh.inc.php';	//connect to database

		$dateOfReservation = $_POST['date'];
		$timeOfReservation = $_POST['time'];
		$numOfAdult = $_POST['adult'];
		$numOfChild = $_POST['child'];
		$fullName = $_POST['name'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$city = $_POST['city'];
		$remarks = $_POST['remarks'];
		
		if (!empty($dateOfReservation) && !empty($timeOfReservation) && !empty($numOfAdult) && !empty($numOfChild) 
			&& !empty($fullName) && ! empty($email) && !empty($phone) && !empty($city)){
			$sql = "INSERT INTO reservation (date_of_reservation, time_of_reservation, num_of_adult, num_of_child, full_name, email, phone, city, special_remarks) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
			$stmt = mysqli_stmt_init($conn);
		
			if (mysqli_stmt_prepare($stmt, $sql)){
				//string = s, i = integer
				mysqli_stmt_bind_param($stmt, "ssiisssss", $dateOfReservation, $timeOfReservation, $numOfAdult, $numOfChild, $fullName, $email, $phone, $city, $remarks);
				mysqli_stmt_execute($stmt);
				session_unset(); 
				session_destroy(); 
				header("Location: home.php?reservation=success");
				exit();
			}else {
				$errorMessage = "Error entering data:".mysqli_error($link)."<br>";
				session_unset(); 
				session_destroy(); 
				header("Location: home.php?sql_error");
				exit();
			}
		}	
		else{
			//If the information provided is incomplete -> Indicate which field needs to be filled + keep what the user already input!
			if (empty($_POST['date'])) {
				$_SESSION['dateErr'] = "A date is required";
				$_SESSION['dateClass'] = "has-error"; 
			}
			if (empty($_POST['time'])){ 
				$_SESSION['timeErr'] = "A time is required";
				$_SESSION['timeClass'] = "has-error"; 
			}
			
			if (empty($_POST['name'])){
				$_SESSION['nameErr'] = "Your name is required";
				$_SESSION['nameClass'] = "has-error";
			}
			else {
				$_SESSION['nameInput'] = $fullName;
				$_SESSION['nameErr'] = "";
				$_SESSION['nameClass'] = "";
			}
			if (empty($_POST['email'])){
				$_SESSION['emailErr'] = "Your email is required";
				$_SESSION['emailClass'] = "has-error";
			}
			else {
				$_SESSION['emailInput'] = $email;
				$_SESSION['emailErr'] = "";
				$_SESSION['emailClass'] = "";
			}
			if (empty($_POST['phone'])){
				$_SESSION['phoneErr'] = "Your phone number is required";
				$_SESSION['phoneClass'] = "has-error";
			}
			else {
				$_SESSION['phoneInput'] = $phone;
				$_SESSION['phoneErr'] = "";
				$_SESSION['phoneClass'] = "";
			}
			
			if (empty($_POST['city'])) {
				$_SESSION['cityErr'] = "Your city of residence is required";
				$_SESSION['cityClass'] = "has-error";
			}
			else {
				$_SESSION['cityInput'] = $city;
				$_SESSION['cityErr'] = "";
				$_SESSION['cityClass'] = "";
			}
			
			if (!empty($_POST['remarks']){
				$_SESSION['remarksInput'] = $remarks;
			}
			
			header("Location: home.php?emptyfields#section-tableReservation");
			exit();	
		}				
		mysqli_close($conn);		
	}  
	else if(isset($_POST['cancelbutton'])){	
		//Destroy session and clear the variables
		session_unset(); 
		session_destroy(); 
		header("Location: home.php?cancel#section-tableReservation");
		exit();	
	}
?>