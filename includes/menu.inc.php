<?php
	require 'dbh.inc.php';	//connect to database ( not necessary with PDO)
	/*********************************************************************************************
	*									Display Menu     										 *
	*********************************************************************************************/
	//For pdo connection
	
	/*try{
	//$id = $_POST['id'];
	$qty = $_POST['data'];
	
	echo ' <script>alert("'.$qty.'");</script>';
	
	}
	catch(exception $e)
	{}*/
	
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
	
	//Jun add cart
	if(!empty($_POST)){
		$menu_id = $_POST['tmp_id'];
		$item_qty= $_POST['qty'];
		$food_name;
		$food_price;
		$category;
		$img_file_path;
		
		
		if(!empty($item_qty) && (is_numeric($item_qty)))
		{
			$sql = "SELECT * FROM menu WHERE menuId = ?";
			$stmt = $conn->prepare($sql);
			$stmt->bind_param("i", $menu_id); //i integer  //s string
			$stmt->execute(); //execute query
				
			$result = $stmt->get_result();//execute result
			
			if($row = $result->fetch_assoc())
			{
				$food_name=$row['food_name'];
				$food_price=$row['food_price'];
				$category=$row['category'];
				$img_file_path=$row['img_file_path'];
			}
			
			if(isset($_SESSION["cart"]))
				{
					$item_array_id = array_column($_SESSION["cart"], "menu_id");
					if(!in_array($menu_id, $item_array_id)) //if id not found in cart,add to cart
					{
						$count = count($_SESSION["cart"]);
						$item_array = array(
							'menu_id'			=>	$menu_id,
							'item_qty'			=>	$item_qty,
							'food_name'         =>  $food_name,
							'food_price'        =>  $food_price,
							'category'			=>	$category,
							'img_file_path'		=>	$img_file_path,
						);
						$_SESSION["cart"][$count] = $item_array;
					}
					else //if id found in cart,add quantity
					{
						foreach($_SESSION["cart"] as $keys => $values)
						{
							$id = $values["menu_id"];
							
							if($id == $menu_id)
							{
								$_SESSION["cart"][$keys]['item_qty']+=$item_qty;
							}
						}
					}
				}
				else
				{
					$item_array = array(
						'menu_id'			=>	$menu_id,
						'item_qty'			=>	$item_qty,
						'food_name'         =>  $food_name,
						'food_price'        =>  $food_price,
						'category'			=>	$category,
						'img_file_path'		=>	$img_file_path,
					);
					$_SESSION["cart"][0] = $item_array;
				}
			echo ' <script>alert("Item added");</script>';
		}
		else
			' <script>alert("Please input only number!");</script>';
	}
?>