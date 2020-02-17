<?php
	/*********************************************************************************************
	*									Add Menu Item											 *
	*********************************************************************************************/
	if(isset($_POST['addMenuButton'])){
		require 'dbh.inc.php';	//connect to database
		$foodName = $_POST['menuName'];
		$foodPrice = $_POST['menuPrice'];
		$foodPicUrl = $_POST['menuPicUrl'];
		if (empty($foodName) || empty($foodPrice) || empty($foodPicUrl)){
			header("Location: ../Admin-MenuList.php?error=emptyfields");
            exit();
		}	
		else{
			$sql = "INSERT INTO menu (food_name, food_price, picture_url) VALUES (?, ?, ?)";
				$stmt = mysqli_stmt_init($conn);
				if (mysqli_stmt_prepare($stmt, $sql)){
					//string = s, i = integer
					mysqli_stmt_bind_param($stmt, "sds", $foodName, $foodPrice, $foodPicUrl);
                    mysqli_stmt_execute($stmt);
					header("Location: Admin-MenuList.php?create=success");
					exit();
				}else {
					$errorMessage = "Error entering data:".mysqli_error($link)."<br>";
					header("Location: Admin-MenuList.php?sql_error");
					exit();
				}	
		}
		mysqli_close($conn);		
	} 
	/*********************************************************************************************
	*									Display Menu Item										 *
	*********************************************************************************************/
		//For Connection of PHP Data Objects(PDO)
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
			//Assign menu query to sql
			$sql='SELECT * FROM menu';
			//Execute sql (statement hold the result of the query)
			if ( $statement=$pdo->query($sql)){
				return $statement;
			} else{
				$errorMessage = "Error entering data:".mysqli_error($link)."<br>";
				session_unset(); 
				session_destroy(); 
				header("Location: Admin-MenuList.php?sql_error");
				exit();
			}
			$pdo = null;
		}

	/*********************************************************************************************
	*									Edit Menu Item											 *
	*********************************************************************************************/

	/*********************************************************************************************
	*									Delete Menu Item										 *
	*********************************************************************************************/
?>