<?php

	require 'dbh.inc.php';
	
	$total=0;
	$tax=0;
	$discount=0;
	$grandtotal=0;
	$pro_type="";
	$pro_price=0;
	$color="red";
	$output="";

	if(!isset($_SESSION["discount"]))
	{
		$_SESSION["discount"]=0;
	} 
	if(!isset($_SESSION["promo_code"]))
	{
		$_SESSION["promo_code"]="";
	}
	if(!isset($_SESSION["promo_price"]))
	{
		$_SESSION["promo_price"]=0;
	}
	if(!isset($_SESSION["promo_type"]))
	{
		$_SESSION["promo_type"]="";
	}
	if(!isset($_SESSION["remark"]))
	{
		$_SESSION["remark"]="";
	}
	
	
	
	if(isset($_POST['delete'])){ //if delete button clicked
		$menu_id = $_POST['id']; //get the id of the row
		$totals=0;
		foreach($_SESSION["cart"] as $keys => $values)
		{
			$id = $values["menu_id"]; //get every id in the cart
						
			if($id == $menu_id) //if found the same id
			{
				unset($_SESSION["cart"][$keys]); //delete the set in the cart
			}
			else
			{
				$totals+=($values["food_price"]*$values["item_qty"]); //calculate the total price
			}
		}
		

			if($_SESSION["promo_type"] == "CASH") // if promo code is cash
			{
				$discount=$_SESSION["promo_price"];
				$_SESSION["discount"]=number_format($discount,2);
						
			}
			else if($_SESSION["promo_type"] == "PERCENT")// if promo code is percentage
			{
				$discount=($totals*$_SESSION["promo_price"])/100;
				$_SESSION["discount"]=number_format($discount,2);
			} //recalculate the discount
	}
	
	if(isset($_POST['apply'])){ //apply promo
		$promo_code = $_POST['promo']; //get promo code
		$promo_type;
		$promo_price;
		$promo_active;
		$totals=0;
		if(isset($_SESSION["cart"])) //if cart exist
		{
			foreach($_SESSION["cart"] as $keys => $values)
			{
				$item_qty = $values["item_qty"];
				$food_price = $values['food_price'];			
													
				$totals+=($food_price*$item_qty); //calculate totals
			}
		}
		
		if(!empty($promo_code)) //to check the field of promo code
		{
			if(!isset($_SESSION["discount"]))//to check the discount session
			{
				$_SESSION["discount"]=0; 
			}
			
			
			$sql = "SELECT * FROM promo WHERE promo_code = ?"; //check if the promo code exist 
			$stmt = $conn->prepare($sql);
			$stmt->bind_param("s", $promo_code); //i integer  //s string
			$stmt->execute(); //execute query
				
			$result = $stmt->get_result();//execute result
			
			if($row = $result->fetch_assoc())//if the promo code exist 
			{
				$promo_type=$row['promo_type'];
				$promo_price=$row['promo_price'];
				$promo_active=$row['promo_active'];
				
				if($promo_active == 1) //if promo code is active
				{
					if($promo_type == "CASH") // if promo code is cash
					{
						$discount=$promo_price;
						$color="black";
						$output="Promo code applied!";
						$_SESSION["promo_code"]= $promo_code;
						$_SESSION["discount"]=number_format($discount,2);
						$_SESSION["promo_type"]=$promo_type;
						$_SESSION["promo_price"]=$promo_price;
						
					}
					else if($promo_type == "PERCENT")// if promo code is percentage
					{
						$discount=($totals*$promo_price)/100;
						$color="black";
						$output="Promo code applied!";
						$_SESSION["promo_code"]=$promo_code;
						$_SESSION["discount"]=number_format($discount,2);
						$_SESSION["promo_type"]=$promo_type;
						$_SESSION["promo_price"]=$promo_price;
					}
					else
					{
						$color="red";
						$output="Promo code type not found!";
						$_SESSION["promo_code"]="";
						$_SESSION["discount"]=0;
						$_SESSION["promo_type"]="";
						$_SESSION["promo_price"]=0;
					}
				}
				else
				{
					$color="red";
					$output="Promo code disabled!"; //if promocode deactivated
					$_SESSION["promo_code"]="";
					$_SESSION["discount"]=0;
					$_SESSION["promo_type"]="";
					$_SESSION["promo_price"]=0;
				}
			}
			else
			{
				$color="red";
				$output="Promo code not found!"; //if promocode not found
				$_SESSION["promo_code"]="";
				$_SESSION["discount"]=0;
				$_SESSION["promo_type"]="";
				$_SESSION["promo_price"]=0;
			}
		}
		else
		{
			$color="red";
			$output="Please enter promo code!"; //if promocode is empty
			$_SESSION["promo_code"]="";
			$_SESSION["discount"]=0;
			$_SESSION["promo_type"]="";
			$_SESSION["promo_price"]=0;
		}
		$grandtotal=($totals+$tax)-$_SESSION["discount"];
	}
	
	
	if(isset($_POST['checkout'])) //checkout cart
	{
		$count=0;
		if(isset($_SESSION["cart"])) //if cart exist
		{
			foreach($_SESSION["cart"] as $keys => $values)
			{
				$count++; //calculate items in cart
			}
			
			if($count <= 0) //if cart empty
			{
				echo ' <script>alert("Your cart is empty!");</script>';
				$_SESSION["payment"]=0;
			}
			else
			{
				$_SESSION["payment"]=1;
				$_SESSION["remark"]=$_POST["remark"];
				echo ' <script>
						window.location.href = "payment.php";
				</script>';
			}
		}
		else
		{
			echo ' <script>alert("Your cart is empty!");</script>';
			$_SESSION["payment"]=0;
		}
	}
	
	/*if(!empty($_POST)){
		$menu_ids = $_POST['tmp_id'];
		$item_qtys= $_POST['tmp_qty'];
		
		if(isset($_SESSION["cart"]))
		{
			foreach($_SESSION["cart"] as $keys => $values)
			{
					//echo ' <script>alert("'.$menu_id.'");</script>';
				if($menu_ids == $values["menu_id"])
				{
					
					$_SESSION["cart"][$keys]['item_qty']=$item_qtys;
				}
				
			}
		}
	}*/
?>