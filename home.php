<?php

	session_start();	
	require 'includes/reservation.inc.php';
	$_SESSION['page'] = "home";
	
	if( isset( $_SESSION['counter'] ) ) {
		$_SESSION['counter'] += 1;
	}else {
		$_SESSION['counter'] = 1;
		
		//Clear the saved input
		$_SESSION['nameInput'] = "";
		$_SESSION['emailInput'] = "";
		$_SESSION['cityInput'] = "";
		$_SESSION['phoneInput'] = "";
		$_SESSION['remarksInput'] = "";
				
		 //Clear the error message
		$_SESSION['dateErr'] = "";
		$_SESSION['timeErr'] = "";
		$_SESSION['nameErr'] = "";
		$_SESSION['phoneErr'] = "";
		$_SESSION['emailErr'] = "";
		$_SESSION['cityErr'] = "";
		$_SESSION['adultErr'] = "";
		
		//Clear the error formattting
		$_SESSION['dateClass'] = ""; 
		$_SESSION['timeClass'] = "";
		$_SESSION['nameClass'] = "";
		$_SESSION['emailClass'] = "";
		$_SESSION['phoneClass'] = "";
		$_SESSION['adultClass'] = "";
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Sushi Sama</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
		integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<!-- MD for Bootstrap -->
	<link rel="stylesheet" href="css/mdb.min.css">

	<!-- Awesome Font(Icons) -->
	<link href="fontawesome/css/all.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- Michelle -->
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Sofia'>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/home.css">

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
		integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
		crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
		integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
		crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
		integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
		crossorigin="anonymous"></script>
</head>

<body>
	<!--Login Modal -->
	<?php include('login-modal.php'); ?>
	
	<div class="cover text-center" id="home-banner">
		<!-- Nav bar -->
		<?php include 'navbar.php'; ?>
		<!-- Homepage Banner -->
		<div class="cover-container py-6">
			<div class="cover-inner container justify-content-center">
				<h1 class="heading mb-3 py-5">Serving you <br />the best sushi</h1>
					<button class="btn btn-outline-white d-none d-md-inline" onclick="window.location.href = '#section-tableReservation';">
							Reserve a table </button> 
			</div>
		</div>
	</div>

	<article>
		<div class="container">
			<div class="row align-items-center justify-content-center">
				<!--About-->
				<div class="col-xs-12">
					<h2>About Us</h2>
					<div class="info justify-content-center py-2">
						<p>Dine in at our Japanese restaurant in Petaling Jaya, recently awarded with a Certificate of
							Excellence by TripAdvisor, Sushi Sama is a modern Japanese restaurant,
							with several sections such as a sushi bar, main restaurant, two teppanyaki counters and six
							private dining rooms, which focuses on providing extra privacy for diners.
							Share traditional Kaiser sets, wine and dine with business associates or enjoy weekend
							Japanese lunch & dinner buffets with friends and family in award-winning restaurant.
						</p>
					</div>
				</div>
			</div>
		</div>
	</article>
	<!-- Image banner -->
	<div class="container-fluid image-banner">
		<div class="cover-inner container justify-content-center">
			<h3 class="image-heading mt-3 pt-5"> Freshly made sushi every day</h3>
				<p class="image-text"> We only use the freshest ingredient</p>
		</div>
	</div>
	<!-- End of Image banner -->
	<section id="section-tableReservation">
		<div class="container">
			<div class="row align-items-center justify-content-center">
				<div class="col-xs-12">
					<h2>Reserve a table</h2>
				</div>
			</div>
			<form class="form-horizontal" method="post" action="">
				<div class="row">
					<div class="col-xl-6 col-lg-6 col-12">
						<div class="form-group">
							<label class="control-label">Date of Reservation</label>&nbsp;<span
								class="input-group-addon"><i class="fa fa-calendar"></i></span>
							<div class="input-group">
								<input name="date" type="date" class="form-control" value="<?php echo $_SESSION['dateInput']; ?>"> 
							</div>
							<small id="<?php echo $_SESSION['dateClass'];?>"> <?php echo $_SESSION['dateErr']; ?> </small>
						</div>
					</div>

					<div class="col-xl-6 col-lg-6 col-12">
						<div class="form-group">
							<label class="control-label">Time of Reservation</label>
							<div class="input-group">
								<input name="time" type="time" class="form-control" value="<?php echo $_SESSION['timeInput']; ?>" >
							</div>
							<small id="<?php echo $_SESSION['timeClass'];?>"> <?php echo $_SESSION['timeErr']; ?> </small>
						</div>
					</div>

					<div class="col-xl-6 col-lg-6 col-12">
						<div class="form-group">
							<label class="control-label">Number of Adult:</label>
							<input class="form-control" name="adult" type="number" value="1" >
						</div>
					</div>

					<div class="col-xl-6 col-lg-6 col-12">
						<div class="form-group">	
							<label class="control-label">Number of Child:</label>
							<div class="select">
								<input class="form-control" name="child" type="number" value="0" >
							</div>
						</div>
					</div>

					<div class="col-sm-12 col-xs-12 mt30">
						<h4>Your Details</h4>
					</div>

					<div class="col-xl-6 col-lg-6 col-12">
						<div class="form-group">
							<label class="control-label">Full Name</label>
							<input  name="name" type="text" placeholder="Full Name" class="form-control" value="<?php echo $_SESSION['nameInput']; ?>"  >
							<small id="<?php echo $_SESSION['nameClass'];?>"> <?php echo $_SESSION['nameErr']; ?> </small>
						</div>
					</div>

					<div class="col-xl-6 col-lg-6 col-12">
						<div class="form-group">
							<label class="control-label"> Email</label>
							<input name="email" type="text" placeholder="ex: sushi@example.com" class="form-control" value="<?php echo $_SESSION['emailInput']; ?>" >
							<small id="<?php echo $_SESSION['emailClass'];?>"> <?php echo $_SESSION['emailErr']; ?> </small>
						</div>
					</div>

					<div class="col-xl-6 col-lg-6 col-12">
						<div class="form-group">
							<label class="control-label"> Phone</label>
							<input name="phone" type="text" placeholder="ex: 012345678" class="form-control" value="<?php echo $_SESSION['phoneInput']; ?>" >
							<small id="<?php echo $_SESSION['phoneClass'];?>"> <?php echo $_SESSION['phoneErr']; ?> </small>
						</div>
					</div>

					<div class="col-xl-6 col-lg-6 col-12">
						<div class="form-group">
							<label class="control-label">City</label>
							<input name="city" type="text" placeholder="Cyberjaya" class="form-control"  value="<?php echo $_SESSION['cityInput']; ?>">
							<small id="<?php echo $_SESSION['cityClass'];?>"> <?php echo $_SESSION['cityErr']; ?> </small>
						</div>
					</div>

					<div class="col-xl-12 col-lg-12 col-12">
						<div class="form-group">
							<label class="control-label">Special remarks (Eg. food allergy )</label>
							<textarea class="form-control" name="remarks" rows="4" 
							placeholder="Please write to us!" ><?php echo $_SESSION['remarksInput']; ?></textarea>
						</div>
					</div>

					<div class="col-12 text-center">
						<button type="submit" name="reservebutton" class="btn btn-outline-deep-orange">Reserve</button>
						<button type="submit" name="cancelbutton" class="btn btn-outline-cyan">Cancel</button>
					</div>
				</div>
			</form>
		</div>
	</section>

	<footer class="footer-hidden">
		<div class="overlay ">
		</div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-3 col-xs-12 d-none d-lg-block">
					<h3 class=" pb-2"> Sushi Sama</h3>
					<p> Copyright reserved &copy;</p>
				</div>
				<div class="col-lg-2 col-xs-12 d-none d-lg-block">
					<a href="home.html"> <i class="fa fa-5x fa-home"></i> </a>
					<p class="px-3 py-2"> Home</p>
				</div>
				<div class="col-lg-2 col-xs-12 d-none d-lg-block">
					<a href="menu.html"> <i class="fa fa-5x fa-cutlery"></i> </a>
					<p class="px-3 py-2"> Menu</p>
				</div>
				<div class="col-lg-2 col-xs-12 d-none d-lg-block">
					<a href="career.html"> <i class="fa fa-5x fa-briefcase"></i> </a>
					<p class="px-3 py-2"> Career</p>
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
</body>

</html>