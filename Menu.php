<?php

	session_start();
	$_SESSION['page'] = "menu";
	include "includes/menu.inc.php";
	$stmt = readMenu();
	$foodList = $stmt->fetchAll();
?>


<!DOCTYPE html>
<html lang="en">
<head>	
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title> Menu </title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<!-- MD for Bootstrap -->
	<link rel="stylesheet" href="css/mdb.min.css">

	<!-- Awesome Font(Icons) -->
	<link href="fontawesome/css/all.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- Michelle -->
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Sofia'>
	<link rel="stylesheet" href="css/menu.css">
	<link rel="stylesheet" href="css/style.css">
	
<<<<<<< HEAD
=======
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	
	<script>
		//Jun
		function order(x)
		{
			//document.getElementById("update").submit();
			var id = document.getElementsByName("id")[x].value;
			var qty = prompt("Please enter quantity", "1");
			var numbers = /^[0-9]+$/;
			
			if(qty.match(numbers))
			{
				qty=parseInt(qty);
				if(qty >= 0)
				{
					document.getElementsByName("tmp_id")[x].value = id;
					document.getElementsByName("qty")[x].value = qty;
					document.getElementById("form").submit();
				}
				else
				{
					alert("Please insert only number larger than 0");
				}
			}
			else
			{
				alert("Please insert only number");
			}
		}
	</script>
	</head>
>>>>>>> 9686099f0cbcdcd0d251f6a901e1b4e629a48734

</head>
<body>	
	<!--Login Modal -->
	<?php include('login-modal.php'); ?>
	<!-- Menu banner -->
	<section class="cover text-center" id="menu-banner" >
	<!-- Nav bar -->
		<!-- In reference to https://www.codeply.com/go/QAXbNGbWPA/bootstrap-4-navbar-transparent -->
		<?php include('navbar.php'); ?>
		
		<div class="cover-container pt-5 mt-5">
			<div class="cover-inner container justify-content-center">
				<h1 class="heading mb-3 py-4">Delicious &amp; Fresh</h1>
				<p class="sub-heading pt-5">The only thing we love more than food is you!</p>
			  </div> 		  
		</div>
	</section>
	<!-- End -->

	<!-- Menu -->
	<div class = "container-fluid">
		<!-- Sushi -->
		<div class = "row justify-content-center">
			<div class = "col-xs-12"> 
				<h1> Sushi </h1>
			</div>
		</div>
		<div class = "row align-content-center">
			<div class="card-deck">
			<?php
			$count=0;
				// 0 -> ID, 1 -> food name, 2 -> food price, 3 -> category, 4 -> file image path
				foreach($foodList as $food){
					//Ensure that only those food that falls under Sushi are displayed
					if ($food[3] == "Sushi"){
						echo '<form method="POST" action="">'; 
						echo '<div class = "col-xs-2 mx-auto mx-auto">';
						echo '<div class="card">';
						echo '<input type="text" name="id" id="id" value="'.$food[0].'" hidden>';
						echo '<img class="card-img-top img-fluid animated pulse" src="'.$food[4].'" alt="'.$food[1].'">';
						echo '<div class="card-body">';
						echo '<h2 class="card-title text-center">'.$food[1].'</h2>';
						echo '<!-- p class="card-text"-->'; // For future use
						echo '</div>';
						echo '<div class="card-footer text-center">';
<<<<<<< HEAD
						echo '<span class="pricing">'.'RM'.number_format((float)$food[2],2,'.','').'</span>'; 
						echo '<button type="submit" name="" onClick="order('.$count.')" class="btn peach-gradient"><i class="fa fa-shopping-cart fa-lg" aria-hidden="true"> <span class="hidden"> Order </span></i></button>';
=======
						echo '<span class="pricing">'.'RM'.number_format((float)$food[2],2,'.','').'</span>';
>>>>>>> 9686099f0cbcdcd0d251f6a901e1b4e629a48734
						echo '<input type="hidden" id="tmp_id" name="tmp_id" />
							  <input type="hidden" id="qty" name="qty" />';						
						echo '<button type="submit" name="" onClick="order('.$count.')" class="btn peach-gradient"><i class="fa fa-shopping-cart fa-lg" aria-hidden="true"> <span class="hidden"> Order </span></i></button>';
						echo '</form>'; 
						echo '</div>
							  </div>
							  </div>';
						$count++;
					}
				}
			?>
			</div>	
		</div>
		<!-- End -->
		
		<!-- Agemono -->
		<div class = "row justify-content-center">
			<div class = "col-xs-12"> 
				<h1> Agemono </h1>
			</div>
		</div>
		<div class = "row ">
			<div class="card-deck">
			<?php
				// 0 -> ID, 1 -> food name, 2 -> food price, 3 -> category, 4 -> file image path
				foreach($foodList as $food){
					//Ensure that only those food that falls under Sushi are displayed
					if ($food[3] == "Agemono"){
						echo '<form method="POST" action="">'; 
						echo '<div class = "col-xs-2 mx-auto mx-auto">';
						echo '<div class="card">';
						echo '<input type="text" name="id" id="id" value="'.$food[0].'" hidden>';
						echo '<img class="card-img-top img-fluid animated pulse" src="'.$food[4].'" alt="'.$food[1].'">';
						echo '<div class="card-body">';
						echo '<h2 class="card-title text-center">'.$food[1].'</h2>';
						echo '<!-- p class="card-text"-->'; // For future use
						echo '</div>';
						echo '<div class="card-footer text-center">';
<<<<<<< HEAD
						echo '<span class="pricing">'.'RM'.number_format((float)$food[2],2,'.','').'</span>'; 
=======
						echo '<span class="pricing">'.'RM'.number_format((float)$food[2],2,'.','').'</span>';
>>>>>>> 9686099f0cbcdcd0d251f6a901e1b4e629a48734
						echo '<input type="hidden" id="tmp_id" name="tmp_id" />
							  <input type="hidden" id="qty" name="qty" />';						
						echo '<button type="submit" name="" onClick="order('.$count.')" class="btn peach-gradient"><i class="fa fa-shopping-cart fa-lg" aria-hidden="true"> <span class="hidden"> Order </span></i></button>';
						echo '</form>'; 
						echo '</div>
							  </div>
							  </div>';
						$count++;
					}
				}
			?>
			</div>
		</div>
		<!-- End -->
		
		<!-- Dessert -->
		<div class = "row justify-content-center">
			<div class = "col-xs-12"> 
				<h1> Dessert </h1>
			</div>
		</div>
		<div class = "row">
			<div class="card-deck">
				<?php
				// 0 -> ID, 1 -> food name, 2 -> food price, 3 -> category, 4 -> file image path
				foreach($foodList as $food){
					//Ensure that only those food that falls under Sushi are displayed
					if ($food[3] == "Dessert"){
						echo '<form method="POST" action="">'; 
						echo '<div class = "col-xs-2 mx-auto mx-auto">';
						echo '<div class="card">';
						echo '<input type="text" name="id" id="id" value="'.$food[0].'" hidden>';
						echo '<img class="card-img-top img-fluid animated pulse" src="'.$food[4].'" alt="'.$food[1].'">';
						echo '<div class="card-body">';
						echo '<h2 class="card-title text-center">'.$food[1].'</h2>';
						echo '<!-- p class="card-text"-->'; // For future use
						echo '</div>';
						echo '<div class="card-footer text-center">';
<<<<<<< HEAD
						echo '<span class="pricing">'.'RM'.number_format((float)$food[2],2,'.','').'</span>'; 
						echo '<input type="hidden" id="tmp_id" name="tmp_id" /> 
							  <input type="hidden" id="qty" name="qty" />';	//to get the id and qty from php
=======
						echo '<span class="pricing">'.'RM'.number_format((float)$food[2],2,'.','').'</span>';
						echo '<input type="hidden" id="tmp_id" name="tmp_id" />
							  <input type="hidden" id="qty" name="qty" />';						
>>>>>>> 9686099f0cbcdcd0d251f6a901e1b4e629a48734
						echo '<button type="submit" name="" onClick="order('.$count.')" class="btn peach-gradient"><i class="fa fa-shopping-cart fa-lg" aria-hidden="true"> <span class="hidden"> Order </span></i></button>';
						echo '</form>'; 
						echo '</div>
							  </div>
							  </div>';
						$count++;
					}
				}
			?>
			</div>
		</div>
		<!-- End -->
	</div>
	<footer class="footer-hidden">
		<div class="overlay">
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-3 col-xs-12 d-none d-lg-block">
					<h3 class=" pb-2"> Sushi Sama</h3>
					<p> Copyright reserved &copy;</p>
				</div>
				<div class="col-lg-2 col-xs-12 d-none d-lg-block">
					<a href="home.html"> <i class="fa fa-5x fa-home"></i> </a>
					<p class= "px-3 py-2"> Home</p>
				</div>
				<div class="col-lg-2 col-xs-12 d-none d-lg-block">
					<a href="menu.html"> <i class="fa fa-5x fa-cutlery"></i> </a>
					<p class= "px-3 py-2"> Menu</p>
				</div>
				<div class="col-lg-2 col-xs-12 d-none d-lg-block">
					<a href="career.html"> <i class="fa fa-5x fa-briefcase"></i> </a>
					<p class= "px-3 py-2"> Career</p>
				</div>
				<div class="social-media col-lg-3 col-xs-12 d-none d-sm-block">
					<p>Find us here:</p>
					<button type="button" class="btn peach-gradient"><i class="fa fa-2x fa-facebook"></i></button>
					<button type="button" class="btn peach-gradient"><i class="fa fa-2x fa-instagram"></i></button>
					<button type="button" class="btn peach-gradient"><i class="fa fa-2x fa-twitter"></i></button>				
				</div>
			</div>		
		</div>
	</footer>
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	
	<script type="text/javascript">
		//Jun
		function order(x)
		{
			//document.getElementById("update").submit();
			var id = document.getElementsByName("id")[x].value;
			var qty = prompt("Please enter quantity", "1");
			var numbers = /^[0-9]+$/;
			
			if(qty.match(numbers))
			{
				qty=parseInt(qty);
				if(qty >= 0)
				{
					document.getElementsByName("tmp_id")[x].value = id;
					document.getElementsByName("qty")[x].value = qty;
					document.getElementById("form").submit();
				}
				else
				{
					alert("Please insert only number larger than 0");
				}
			}
			else
			{
				alert("Please insert only number");
			}
		}
	</script>
</body>
</html>