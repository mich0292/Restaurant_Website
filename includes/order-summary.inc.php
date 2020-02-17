<?php
    //connect to database
    require 'includes/dbh.inc.php';	

    $orderID;
    $FoodID;
    $date;
    $oriPrice;
    $quantity;
    $totalPrice;
  
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
            header("Location: order-summary.php?sql_error");
            exit();
        }
        $pdo = null;
    }

?>