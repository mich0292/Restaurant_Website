<?php  
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

    function readSummary(){
        $pdo=setConnectionInfo();
        //Assign menu query to sql
        $sql='SELECT * FROM order_history';
        //Execute sql (statement hold the result of the query)
        if ( $statement=$pdo->query($sql) ){
            return $statement;
        } 
        else{
            $errorMessage = "Error entering data:".mysqli_error($link)."<br>";
            session_unset(); 
            session_destroy(); 
            header("Location: Admin-OrderSummary.php?sql_error");
            exit();
        }
        $pdo = null;
    }


    /*********************************************************************************************
	*									Destroy Order										 *
	*********************************************************************************************/
	function deleteOrderSummary($ID_number){
		$pdo=setConnectionInfo();
		$sql='DELETE FROM order_history WHERE orderID =:ID_number';
		if ( $statement=$pdo->prepare($sql)){
			$statement->bindParam(':ID_number', $ID_number);
			$statement->execute();
			session_unset(); 
			session_destroy(); 
			header("Location: Admin-OrderSummary.php?deleteorder=success");
			exit();	
		} else{
			$errorMessage = "Error entering data:".mysqli_error($link)."<br>";
			session_unset(); 
			session_destroy(); 
			header("Location: Admin-OrderSummary.php?sql_error");
			exit();
		}
		$pdo = null;	
	}
	
	if ( isset($_POST['confirmDeletion']) ){
		$getID = $_POST['orderID'];
		deleteOrderSummary($getID);
	} 