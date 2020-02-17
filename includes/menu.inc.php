<?php
	require 'dbh.inc.php';	//connect to database ( not necessary with PDO)
	/*********************************************************************************************
	*									Display Menu     										 *
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

	function readMenu(){
		$pdo=setConnectionInfo();
		//Assign string to sql
		$sql='SELECT * FROM menu';
		//Execute sql (statement hold the result of the query)
		if ( $statement=$pdo->query($sql)){
			return $statement;
		} else{
			$errorMessage = "Error entering data:".mysqli_error($link)."<br>";
			session_unset(); 
			session_destroy(); 
			header("Location: menu.php?sql_error");
			exit();
		}
		$pdo = null;
	}
?>