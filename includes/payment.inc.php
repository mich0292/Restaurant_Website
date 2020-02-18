<?php
	//done by jun
		require 'dbh.inc.php';

		
		//to check if the cart is empty or not, if empty go back to menu page
		$count=0;
		$grandtotal=0;
		$id="";
		$username="";
		$contact="";
		$email="";
		$payment_ref=date("Ymd");
		
		$sql="SHOW TABLE STATUS LIKE 'credit_card'";
		$stmt = $conn->prepare($sql);
		$stmt->execute(); //execute query
		$result = $stmt->get_result();//execute result
				
		if($row = $result->fetch_assoc()) 
		{
			$count=$row['Auto_increment'];//get id for payment
			$plus=100000+$count;
			$payment_ref.="-".$plus;
		}
		
		//to set every session
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
			
		
		
		if(!isset($_SESSION['userId'])) //to check session login exist
		{
			echo ' <script>alert("Please sign in before making payment");</script>';
			echo ' <script>
						window.location.href = "home.php";
				</script>';
		}
		
		//to validate if the user able to come in payment page
		if(isset($_SESSION["cart"]))//to check cart exist
		{
			foreach($_SESSION["cart"] as $keys => $values)
			{
				$count++;
			}
			
			//to check is cart empty
			if($count <= 0) //if is cart empty
			{
				echo ' <script>alert("Your cart is empty!");</script>';
				$_SESSION["payment"]=0;
				echo ' <script>
						window.location.href = "menu.php";
				</script>';
			}
			else //if cart is not empty
			{
				$_SESSION["payment"]=1; //enable to go in payment page
			}
		}
		else //if cart doesnt cart exist
		{
			echo ' <script>alert("Your cart is empty!");</script>';
			$_SESSION["payment"]=0;
			echo ' <script>
						window.location.href = "menu.php";
				</script>'; //go to menu page
		}
		
		//to validate if the user able to come in payment page
		if($_SESSION["payment"]>0) //if payment button clicked
		{
			$totals=0;
			foreach($_SESSION["cart"] as $keys => $values)
			{
				$totals+=($values["food_price"]*$values["item_qty"]);//calculate total
			}
			$tax = $totals/10;
			$grandtotal=($totals+$tax)-$_SESSION["discount"]; //calculate grandtotal
			
			$sql = "SELECT * FROM user WHERE id = ?"; //get user data
			$stmt = $conn->prepare($sql);
			$stmt->bind_param("s", $_SESSION['userId']); //i integer  //s string
			$stmt->execute(); //execute query
			$result = $stmt->get_result();//execute result
			
			if($row = $result->fetch_assoc())
			{
				$id=$row['id'];
				$username=$row['username'];
				$contact=$row['contact'];
				$email=$row['email'];
			}
			else
			{
				echo ' <script>alert("User not found!");</script>';
			}
		}
		
		
		//button function
		if(isset($_POST["card"])) //if credit card button clicked
		{
			echo ' <script>
						window.location.href = "creditcard.php";
				</script>';
		}
		
		//----pay by cash
		if(isset($_POST["cash"]))
		{
			$cash=$_POST["cash_payment"];
			if(is_numeric($cash))
			{
				$payment_id="1000"; //id for payment
				$payment_total=0;
				$payment_tax=0;
				$payment_grand=0;
				$promo_code=$_SESSION["promo_code"];
				$promo_type=$_SESSION["promo_type"];
				$payment_discount=$_SESSION["discount"];
				$remark=$_SESSION["remark"];
				$payment_type="CASH";
				$username=$_SESSION['username'];
					
				foreach($_SESSION["cart"] as $keys => $values)
				{
					$payment_total+=($values["food_price"]*$values["item_qty"]); //get total payment
				}
				$payment_tax = $payment_total/10;
				$payment_grand=($payment_total+$payment_tax)-$_SESSION["discount"]; //get grand total payment
					
				if($payment_grand<$cash)
				{
					$sql="SHOW TABLE STATUS LIKE 'payment'";
					$stmt = $conn->prepare($sql);
					$stmt->execute(); //execute query
					$result = $stmt->get_result();//execute result
						
					if($row = $result->fetch_assoc()) 
					{
						$payment_id=$row['Auto_increment'];//set id for payment
					}
					
					$change=$cash-$payment_grand;
					$cash=number_format($cash,2);
					$change=number_format($change,2);
					
					$sql = "INSERT INTO payment
						(payment_id,payment_total,payment_tax,promo_code,promo_type,payment_discount, payment_grand, payment_type,remark, payment_paid,payment_change,username)
						VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
					$stmt = $conn->prepare($sql);
					$stmt->bind_param("iddssddssdds", $payment_id,$payment_total,$payment_tax,$promo_code,$promo_type,$payment_discount,$payment_grand,$payment_type,$remark,$cash,$change,$username);
					//insert payment data
					
					if($stmt->execute())//if insert payment successfully
					{
						foreach($_SESSION["cart"] as $keys => $values)
						{
							$menu_id = $values['menu_id'];
							$food_qty= $values['item_qty'];
							$food_name= $values['food_name'];
							$food_price= $values['food_price'];
							$category= $values['category'];
							$img_file_path= $values['img_file_path'];
								
							$sql = "INSERT INTO payment_detail
							(menuID,food_name,food_price,food_qty,category, img_file_path, payment_id) 
							VALUES (?, ?, ?, ?, ?, ?, ?)"; //detail_id is auto increment
								
							$stmt = $conn->prepare($sql);
							$stmt->bind_param("isdissi", $menu_id,$food_name,$food_price,$food_qty,$category,$img_file_path,$payment_id);
							$stmt->execute();
							//insert cart data
							
							unset($_SESSION["cart"][$keys]); //clear cart
						}
						echo ' <script>alert("Payment Successfully! Change='.$change.'");</script>';
						echo ' <script>
									window.location.href = "home.php";
								</script>';
							
						unset($_SESSION["discount"]);
						unset($_SESSION["promo_code"]);
						unset($_SESSION["promo_type"]);
						unset($_SESSION["promo_price"]);
						unset($_SESSION["remark"]);
						unset($_SESSION["cart"]);
						unset($_SESSION["payment"]);
						//clear session
					}
					else
					{
						echo ' <script>alert("Error!");</script>'; //if sql unable to execute
					}
				}
				else
				{
					echo ' <script>alert("Payment should be larger than price");</script>'; //if the user input cash < grandtotal payment
				}
			}
			else
			{
				echo ' <script>alert("Please insert only number!");</script>'; //if the user input cash isn't number
			}
		}
		
		//----pay by card in creditCard.php
		if(isset($_POST["pay_card"])) 
		{
			$payment_id="1000"; //id for payment
			$payment_total=0;
			$payment_tax=0;
			$payment_grand=0;
			$promo_code=$_SESSION["promo_code"];
			$promo_type=$_SESSION["promo_type"];
			$payment_discount=$_SESSION["discount"];
			$remark=$_SESSION["remark"];
			$payment_type="CASH";
			$username=$_SESSION['username'];
			
			foreach($_SESSION["cart"] as $keys => $values)
			{
				$payment_total+=($values["food_price"]*$values["item_qty"]); //get total payment
			}
			$payment_tax = $payment_total/10;
			$payment_grand=($payment_total+$payment_tax)-$_SESSION["discount"]; //get grand total payment
			
			$sql="SHOW TABLE STATUS LIKE 'payment'";
			$stmt = $conn->prepare($sql);
			$stmt->execute(); //execute query
			$result = $stmt->get_result();//execute result
			
			if($row = $result->fetch_assoc()) 
			{
				$payment_id=$row['Auto_increment'];//get id for payment
			}
			
			$sql = "INSERT INTO payment
				(payment_id,payment_total,payment_tax,promo_code,promo_type,payment_discount, payment_grand, payment_type,remark, username)
				VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
			$stmt = $conn->prepare($sql);
			$stmt->bind_param("iddssddsss", $payment_id,$payment_total,$payment_tax,$promo_code,$promo_type,$payment_discount,$payment_grand,$payment_type,$remark,$username);
			
			if($stmt->execute())//if insert payment successfully
			{
				$card_name=$_POST["name"];
				$card_num=$_POST["number"];
				$card_exp=$_POST["exp"];
				$card_code=$_POST["code"];
				$card_country=$_POST["country"];
				$card_ref=$_POST["ref"];
				$card_payment=$_POST["payment"];

				$sql = "INSERT INTO credit_card
				(card_name,card_num,card_exp,card_code,card_country, card_ref, card_payment, payment_id) 
				VALUES (?, ?, ?, ?, ?, ?, ?, ?)"; //detail_id is auto increment
				$stmt = $conn->prepare($sql);
				$stmt->bind_param("ssssssdi", $card_name,$card_num,$card_exp,$card_code,$card_country,$card_ref,$payment_grand,$payment_id); //insert card details
				if($stmt->execute())
				{
					foreach($_SESSION["cart"] as $keys => $values)
					{
						
						$menu_id = $values['menu_id'];
						$food_qty= $values['item_qty'];
						$food_name= $values['food_name'];
						$food_price= $values['food_price'];
						$category= $values['category'];
						$img_file_path= $values['img_file_path'];
						
						$sql = "INSERT INTO payment_detail
						(menuID,food_name,food_price,food_qty,category, img_file_path, payment_id) 
						VALUES (?, ?, ?, ?, ?, ?, ?)"; //detail_id is auto increment
						
						$stmt = $conn->prepare($sql);
						$stmt->bind_param("isdissi", $menu_id,$food_name,$food_price,$food_qty,$category,$img_file_path,$payment_id);
						$stmt->execute();
						
						unset($_SESSION["cart"][$keys]);
					}
					echo ' <script>alert("Payment Successfully!");</script>';
					echo ' <script>
								window.location.href = "home.php";
							</script>';
					
					unset($_SESSION["discount"]);
					unset($_SESSION["promo_code"]);
					unset($_SESSION["promo_type"]);
					unset($_SESSION["promo_price"]);
					unset($_SESSION["remark"]);
					unset($_SESSION["cart"]);
					unset($_SESSION["payment"]);
				}
				else
				{
					echo ' <script>alert("Error!");</script>';
				}
			}
			else
			{
				echo ' <script>alert("Error!");</script>';
			}
		}

?>