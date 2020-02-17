<?php 
    /*********************************************************************************************
	*									Edit User										         *
    *********************************************************************************************/
	if(isset($_POST['editUser'])){
		require '../dbh.inc.php';	//connect to database

        $userName = $_POST['usrlUsername'];
        $password = $_POST['usrlPassword'];
        $name = $_POST['usrlName'];
        $birthday = $_POST['usrlBday'];
        $email = $_POST['usrlEmail'];
        $contact = $_POST['usrlContact'];
        $isStaff = $_POST['usrlIsStaff']; 

        if (!empty($userName) && !empty($password) && !empty($name) && !empty($birthday) && ! empty($email) && !empty($contact)){			
            //sql statement for update user profile
			$sql = "UPDATE user SET password='$password',name='$name', birthday='$birthday', email='$email', contact='$contact', is_admin='$isStaff' WHERE username='$userName'";
			$stmt = mysqli_stmt_init($conn);
			if (mysqli_stmt_prepare($stmt, $sql)){
				mysqli_stmt_execute($stmt);
				session_unset(); 
				session_destroy(); 
				header("Location: ../../Admin-UserList.php?editUser=success");
				exit();
			}else {
				$errorMessage = "Error entering data:".mysqli_error($link)."<br>";
				session_unset(); 
				session_destroy(); 
				header("Location: ../../Admin-UserList.php?sql_error");
				exit();
			}
        }
        else{

            if (empty($_POST['usrlUsername'])){
				$_SESSION['usernameErr'] = "Username is Required";
				$_SESSION['usernameClass'] = "has-error"; 
			}else {
				$_SESSION['usernameInput'] = $userName;
				$_SESSION['usernameErr'] = "";
				$_SESSION['usernameClass'] = "";
            }
            if (empty($_POST['usrlPassword'])){
				$_SESSION['passwordErr'] = "Password is required";
				$_SESSION['passwordClass'] = "has-error"; 
			}else {
				$_SESSION['passwordInput'] = $password;
				$_SESSION['passwordErr'] = "";
				$_SESSION['passwordClass'] = "";
            }
            if (empty($_POST['usrlName'])){
				$_SESSION['nameErr'] = "Name is required";
				$_SESSION['nameClass'] = "has-error"; 
			}else {
				$_SESSION['nameInput'] = $name;
				$_SESSION['nameErr'] = "";
				$_SESSION['nameClass'] = "";
            }
            if (empty($_POST['usrlBday'])){
				$_SESSION['passwordErr'] = "Birthday is required";
				$_SESSION['passwordClass'] = "has-error"; 
			}else {
				$_SESSION['bdayInput'] = $birthday;
				$_SESSION['passwordErr'] = "";
				$_SESSION['passwordClass'] = "";
            }
            if (empty($_POST['usrlPassword'])){
				$_SESSION['passwordErr'] = "Password is required";
				$_SESSION['passwordClass'] = "has-error"; 
			}else {
				$_SESSION['usernameInput'] = $email;
				$_SESSION['passwordErr'] = "";
				$_SESSION['passwordClass'] = "";
            }
            if (empty($_POST['usrlPassword'])){
				$_SESSION['contactErr'] = "Password is required";
				$_SESSION['contactClass'] = "has-error"; 
			}else {
				$_SESSION['usernameInput'] = $contact;
				$_SESSION['contactErr'] = "";
				$_SESSION['contactClass'] = "";
            }
            if (empty($_POST['usrlPassword'])){
				$_SESSION['passwordErr'] = "Password is required";
				$_SESSION['passwordClass'] = "has-error"; 
			}else {
				$_SESSION['staffInput'] = $isStaff;
				$_SESSION['passwordErr'] = "";
				$_SESSION['passwordClass'] = "";
            }
			header("Location: ../../Admin-UserList.php?error");
			exit();	
		}				
        mysqli_close($conn);
    }  
    else if(isset($_POST['closeButton'])){
        //Destroy session and clear the variables
        session_unset(); 
        session_destroy(); 
        header("Location: ../../Admin-UserList.php");
    }
    /*********************************************************************************************
	*									Display User										     *
    *********************************************************************************************/
    //For pdo connection
	function setConnectionInfo(){
		$connString='mysql:host=localhost;dbname=sushisamadb';
		$user='root';
		$password='';
		$pdo=new PDO($connString, $user, $password);
		$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
		return $pdo;
	}

	function readUserList(){
		$pdo=setConnectionInfo();
		$sql='SELECT * FROM user';
		if ( $statement=$pdo->query($sql)){
			return $statement;
		} else{
			$errorMessage = "Error entering data:".mysqli_error($link)."<br>";
			session_unset(); 
			session_destroy(); 
			header("Location: ../../Admin-UserList.php?sql_error");
			exit();
		}
		$pdo = null;
    }   
    
    
    /*********************************************************************************************
	*									Delete User										         *
    *********************************************************************************************/
	function deleteUser($ID_number){
		$pdo=setConnectionInfo();
		$sql="DELETE FROM user WHERE id ='$ID_number'";
		if ( $statement=$pdo->prepare($sql)){
			$statement->execute();
			session_unset(); 
			session_destroy(); 
			header("Location: Admin-UserList.php?deleteUser=success");
			exit();	
		} else{
			$errorMessage = "Error entering data:".mysqli_error($link)."<br>";
			session_unset(); 
			session_destroy(); 
			header("Location: Admin-UserList.php?sql_error");
			exit();
		}
		$pdo = null;	
	}
	
	if ( isset($_POST['deleteUser']) ){
		$getID = $_POST['userID'];
		deleteUser($getID);
	} 
?>