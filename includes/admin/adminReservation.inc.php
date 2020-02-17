<?php

	/*********************************************************************************************
	*									Add Reservation											 *
	*********************************************************************************************/
	// If the reservebutton is pressed
	if(isset($_POST['addReservation'])){
		require 'includes/dbh.inc.php';	//connect to database

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
		if (!empty($dateOfReservation) && !empty($timeOfReservation) && !empty($numOfAdult) && !empty($fullName) && ! empty($email) && !empty($phone) && !empty($city)){			
			//sql statement for insertion
			$sql = "INSERT INTO reservation (date_of_reservation, time_of_reservation, num_of_adult, num_of_child, full_name, email, phone, city, special_remarks) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
			$stmt = mysqli_stmt_init($conn);
			if (mysqli_stmt_prepare($stmt, $sql)){
				//string = s, i = integer
				mysqli_stmt_bind_param($stmt, "ssiisssss", $dateOfReservation, $timeOfReservation, $numOfAdult, $numOfChild, $fullName, $email, $phone, $city, $remarks);
				mysqli_stmt_execute($stmt);
				session_unset(); 
				session_destroy(); 
				header("Location: Admin-ReservedList.php?reservation=success");
				exit();
			}else {
				$errorMessage = "Error entering data:".mysqli_error($link)."<br>";
				session_unset(); 
				session_destroy(); 
				header("Location: Admin-ReservedList.php?sql_error");
				exit();
			}
		}	
		else{
			//This part is to keep the already input data/ to display the error message for empty fields
			if (empty($_POST['resvDate'])){
				$_SESSION['dateErr'] = "Date is required";
				$_SESSION['dateClass'] = "has-error"; 
			}else {
				$_SESSION['dateInput'] = $dateOfReservation;
				$_SESSION['dateErr'] = "";
				$_SESSION['dateClass'] = "";
			}
			if (empty($_POST['resvTime'])){ 
				$_SESSION['timeErr'] = "Time is required";
				$_SESSION['timeClass'] = "has-error"; 
			}else {
				$_SESSION['timeInput'] = $timeOfReservation;
				$_SESSION['timeErr'] = "";
				$_SESSION['timeClass'] = "";	
			}
			if (empty($_POST['custName'])){
				$_SESSION['nameErr'] = "Name is required";
				$_SESSION['nameClass'] = "has-error";
			}else {
				$_SESSION['nameInput'] = $fullName;
				$_SESSION['nameErr'] = "";
				$_SESSION['nameClass'] = "";
			}
			
			if (empty($_POST['custEmail'])){
				$_SESSION['emailErr'] = "Email is required";
				$_SESSION['emailClass'] = "has-error";
			}else {
				$_SESSION['emailInput'] = $email;
				$_SESSION['emailErr'] = "";
				$_SESSION['emailClass'] = "";
			}
			
			if (empty($_POST['custContact'])){
				$_SESSION['phoneErr'] = "Phone number is required";
				$_SESSION['phoneClass'] = "has-error";
			}else {
				$_SESSION['phoneInput'] = $phone;
				$_SESSION['phoneErr'] = "";
				$_SESSION['phoneClass'] = "";
			}
			
			if (empty($_POST['custCity'])) {
				$_SESSION['cityErr'] = "City of residence is required";
				$_SESSION['cityClass'] = "has-error";
			}else {
				$_SESSION['cityInput'] = $city;
				$_SESSION['cityErr'] = "";
				$_SESSION['cityClass'] = "";
			}
			
			if (empty($_POST['adultHc'])) {
				$_SESSION['adultErr'] = "Number of adult will be 1";
				$_SESSION['adultClass'] = "has-error";
			}else {
				$_SESSION['adultInput'] = $numOfAdult;
				$_SESSION['adultErr'] = "";
				$_SESSION['adultClass'] = "";
			}
			
			if (!empty($_POST['remarks'])){
				$_SESSION['remarksInput'] = $remarks;
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
		header("Location: Admin-ReservedList.php");
		exit();	
	}
	
	/*********************************************************************************************
	*									Display Reservation										 *
	*********************************************************************************************/
	//For pdo connection
	function setConnectionInfo(){
		$connString='mysql:host=localhost;dbname=sushisamadb';
		$user='root';
		$password='';
		//Actual connection to database with this line
		$pdo=new PDO($connString, $user, $password);
		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		return $pdo;
	}

	function readReservation(){
		$pdo=setConnectionInfo();
		//Assign string to sql
		$sql='SELECT * FROM reservation';
		//Execute sql (statement hold the result of the query)
		if ( $statement=$pdo->query($sql)){
			return $statement;
		} else{
			$errorMessage = "Error entering data:".mysqli_error($link)."<br>";
			session_unset(); 
			session_destroy(); 
			header("Location: Admin-ReservedList.php?sql_error");
			exit();
		}
		$pdo = null;
	}
	
	/*********************************************************************************************
	*									Destroy Reservation										 *
	*********************************************************************************************/
	function deleteReservation($ID_number){
		$pdo=setConnectionInfo();
		$sql='DELETE FROM reservation WHERE reservationID =:ID_number';
		if ( $statement=$pdo->prepare($sql)){
			$statement->bindParam(':ID_number', $ID_number);
			$statement->execute();
			header("Location: Admin-ReservedList.php?deleteReservation=success");
			exit();	
		} else{
			$errorMessage = "Error entering data:".mysqli_error($link)."<br>";
			session_unset(); 
			session_destroy(); 
			header("Location: Admin-ReservedList.php?sql_error");
			exit();
		}
		$pdo = null;	
	}
	
	if ( isset($_POST['deleteReservation']) ){		
		$getID = $_POST['deleteReservation'];
		deleteReservation($getID);
	} 
?>