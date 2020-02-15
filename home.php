<?php
    session_start();	
	include 'includes/reservation.inc.php';
	
	$nameErr = $emailErr = $phoneErr = $cityErr = "";
	
	if(isset($_POST['reservebutton'])){		
		if (empty($_POST['name']))
			$nameErr = "Your full name is required.";

		if (empty($_POST['email']))
			$emailErr = "Your email is required.";

		if (empty($_POST['phone']))
			$phoneErr = "Your email is required.";

		if (empty($_POST['city'])) 
			$cityErr = "Your city of residence is required.";
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
	<link rel="stylesheet" href="mdb.min.css">

	<!-- Awesome Font(Icons) -->
	<link href="fontawesome/css/all.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- Michelle -->
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Sofia'>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="home.css">

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
	<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="loginModalLabel">Login</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="includes/login.inc.php" method="post" id="loginform">
						<div class="form-group">
							<label for="usernameInput"><i class="fas fa-user mr-2 px-1"></i>Username</label>
							<input type="text" class="form-control" id="usernameInput" name="username" placeholder="Username">
						</div>
						<div class="form-group">
							<label for="passwordInput"><i class="fas fa-lock mr-2 px-1"></i>Password</label>
							<input type="password" class="form-control" id="passwordInput" name="password" placeholder="Password">
						</div>
						<small id="registerLink" class="form-text text-muted">Not a member yet? <a
								href="Registration.html">Sign up here</a></small>
					</form>
				</div>
				<div class="modal-footer">
					<button type="submit" form="loginform" name="login-submit" class="btn btn-primary rounded">Login</button>
					<button type="button" class="btn rounded" data-dismiss="modal">Cancel</button>
				</div>
			</div>
		</div>
	</div>
	
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
			<form class="form-horizontal" method="post" action="#">
				<div class="row">
					<div class="col-xl-6 col-lg-6 col-12">
						<div class="form-group">
							<label class="control-label">Date of Reservation</label>&nbsp;<span
								class="input-group-addon"><i class="fa fa-calendar"></i></span>
							<div class="input-group">
								<input name="date" type="date" class="form-control" >
							</div>
						</div>
					</div>

					<div class="col-xl-6 col-lg-6 col-12">
						<div class="form-group">
							<label class="control-label">Time of Reservation</label>
							<div class="input-group">
								<input name="time" type="time" class="form-control" >
							</div>
						</div>
					</div>

					<div class="col-xl-6 col-lg-6 col-12">
						<div class="form-group">
							<label class="control-label">Number of Adults:</label>
							<input class="form-control" name="adult" type="number" value="1" >
						</div>
					</div>

					<div class="col-xl-6 col-lg-6 col-12">
						<div class="form-group">	
							<label class="control-label">Number of Childs:</label>
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
							<input name="name" type="text" placeholder="Full Name" class="form-control" value="<?php echo $nameErr; ?>"  >
						</div>
					</div>

					<div class="col-xl-6 col-lg-6 col-12">
						<div class="form-group">
							<label class="control-label"> Email</label>
							<input name="email" type="text" placeholder="ex: sushi@example.com" class="form-control" value="<?php echo $emailErr; ?>" >
						</div>
					</div>

					<div class="col-xl-6 col-lg-6 col-12">
						<div class="form-group">
							<label class="control-label"> Phone</label>
							<input name="phone" type="text" placeholder="ex: 012345678" class="form-control" value="<?php echo $phoneErr; ?>" >
						</div>
					</div>

					<div class="col-xl-6 col-lg-6 col-12">
						<div class="form-group">
							<label class="control-label">City</label>
							<input name="city" type="text" placeholder="Cyberjaya" class="form-control" value="<?php echo $cityErr; ?>" >
						</div>
					</div>

					<div class="col-xl-12 col-lg-12 col-12">
						<div class="form-group">
							<label class="control-label">Special remarks (Eg. food allergy )</label>
							<textarea class="form-control" name="remarks" rows="4"
								placeholder="Please write to us!"></textarea>
						</div>
					</div>

					<div class="col-12 text-center">
						<button type="submit" name="reservebutton" class="btn btn-outline-deep-orange">Reserve</button>
						<button type="reset" class="btn btn-outline-cyan">Cancel</button>
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