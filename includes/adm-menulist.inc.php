<?php
	/*********************************************************************************************
	*									Add Menu Item											 *
	*********************************************************************************************/
	if(isset($_POST['addMenuButton'])){
		require 'dbh.inc.php';	//connect to database
		$foodName = $_POST['menuName'];
		$foodPrice = $_POST['menuPrice'];
		$foodCategory = $_POST['category'];
		$foodPicUrl = $_POST['menuPic'];
		$file = $_FILES['menuPic'];
		if (empty($foodName) || empty($foodPrice) || empty($foodCategory) || empty($foodPicUrl)){
			header("Location: Admin-MenuList.php?error=emptyfields");
            exit();
		}	
		
		else{
			$sql = "INSERT INTO menu (food_name, food_price, category, img_file_path ) VALUES (?, ?, ?, ?)";
				$stmt = mysqli_stmt_init($conn);
				if ( mysqli_stmt_prepare($stmt, $sql) ){
					//string = s, i = integer
					mysqli_stmt_bind_param($stmt, "sdss", $foodName, $foodPrice, $foodCategory, $foodPicUrl);
                    mysqli_stmt_execute($stmt);
					session_unset(); 
					session_destroy(); 
					header("Location: Admin-MenuList.php?create=success");
					exit();
				}else {
					$errorMessage = "Error entering data:".mysqli_error($link)."<br>";
					session_unset(); 
					session_destroy(); 
					header("Location: Admin-MenuList.php?sql_error");
					exit();
				}	
		}
		mysqli_close($conn);		
	} 
	else if( isset($_POST['closeMenuButton']) || isset($_POST['closeAddItem']) ){
		session_unset(); 
		session_destroy(); 
		header("Location: Admin-MenuList.php");
		exit();
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
			if ( $statement=$pdo->query($sql) ){
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
	if(isset($_POST['editMenu'])){
		require 'dbh.inc.php';
		$id = $_POST['editMenuID'];
		$name = $_POST['editMenuName'];
		$price = $_POST['editMenuPrice'];
		$category = $_POST['editMenuCategory'];

		if (empty($id) || empty($name) || empty($price) || empty($category)){
			header("Location: ../Admin-MenuList.php?error=emptyfields");
            exit();
		}
		else{
			$sql = "UPDATE menu SET food_name='$name', food_price='$price', category ='$category' WHERE menuID='$id'";
			$stmt = mysqli_stmt_init($conn);
			if ( mysqli_stmt_prepare($stmt, $sql) ){
				mysqli_stmt_execute($stmt);
				session_unset(); 
				session_destroy(); 
				header("Location: ../Admin-MenuList.php?edit=success");
				exit();
			}else {
				$errorMessage = "Error entering data:".mysqli_error($link)."<br>";
				session_unset(); 
				session_destroy(); 
				header("Location: ../Admin-MenuList.php?sql_error");
				exit();
			}	
		}
	}
	else if(isset($_POST['closeButton'])){
		session_unset();
		session_destroy();
		header("Location: Admin-MenuList.php");
	}

	/*********************************************************************************************
	*									Delete Menu Item										 *
	*********************************************************************************************/
	function deleteMenuItem($ID_number){
		$pdo=setConnectionInfo();
		$sql='DELETE FROM menu WHERE menuID =:ID_number';
		if ( $statement=$pdo->prepare($sql) ){
			$statement->bindParam(':ID_number', $ID_number);
			$statement->execute();
			header("Location: Admin-MenuList.php?deleteMenuItem=success");
			exit();	
		} else{
			$errorMessage = "Error entering data:".mysqli_error($link)."<br>";
			session_unset(); 
			session_destroy(); 
			header("Location: Admin-MenuList.php?sql_error");
			exit();
		}
		$pdo = null;	
	}
	
	if (isset($_POST['deleteMenuItem'])){
		$getID = $_POST['menuID'];
		deleteMenuItem($getID);
	} 
?>