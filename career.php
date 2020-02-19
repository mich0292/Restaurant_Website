<?php

session_start();
$_SESSION['page'] = "career";

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Career</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
		integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<!-- MD for Bootstrap -->
	<link rel="stylesheet" href="css/mdb.min.css">

	<!-- Awesome Font(Icons) -->
	<link href="fontawesome/css/all.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- Gordon -->
	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Sofia'>
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/career.css" />

</head>

<body>
	<div class="text-center" id="career-banner">
		<!-- Nav bar -->
		<!-- In reference to https://www.codeply.com/go/QAXbNGbWPA/bootstrap-4-navbar-transparent -->
		<?php include('navbar.php'); ?>
		<div class="pt-5 mt-5">
			<div class="container justify-content-center">
				<h1 class="heading mb-3 pb-3">Sushi is Beyond Everything.</h1>
			</div>
		</div>
	</div>
	<!-- End -->
	<!--Login Modal -->
	<?php include('login-modal.php'); ?>
	<div class="container-fluid">
		<div class="row align-items-center justify-content-center">
			<div class="">
				<!--Career-->
				<div class="col p-0">
					<div class="title text-center">
						<h2>Come and Join Us Now !</h2>
					</div>
					<div class="info">
						<p>We are looking for crew to prepare delicious meals according to the menu.
							We prepare sushi that will delight our customers with their taste and timely delivery.
						</p>
					</div>
					<div class="info">
						<h3>We are Looking For : </h3>
						<div class="pos">
							<div class="dropdown"><button type="button"
									class="btn btn-cyan btn-lg btn-block">Manager</button>
								<div class="dropdown-content">
									<div>
										<p>1. Candidate must possess at least Bachelor's Degree/Post
											Graduate/Diploma/Professional Degree, Master's Degree in any field.</p>
										<p>2. Required Language: English, Malay.</p>
										<p>3. At least 3 Year(s) working experience in the related field is required.
										</p>
										<p>4. Preferably Manager specialized in Food/Beverage/Restaurant Service or
											equivalant.</p>
									</div>
								</div>
							</div>
							<div class="dropdown"><button type="button"
									class="btn btn-cyan btn-lg btn-block">Assistant</button>
								<div class="dropdown-content">
									<div>
										<p>1. Candidate must possess at least SPM or higher.<p>
												<p>2. Required Language: English, Malay.</p>
												<p>3. Able to communicate effectively with other candidate.</p>
									</div>
								</div>
							</div>
							<div class="dropdown"><button type="button" class="btn btn-cyan btn-lg btn-block">Sushi
									Chef</button>
								<div class="dropdown-content">
									<div>
										<p>1. Candidate must possess at least SPM or higher.</p>
										<p>2. Required Language: English, Malay.</p>
										<p>3. Able to communicate effectively with other candidate.</p>
									</div>
								</div>
							</div>
							<div class="dropdown"><button type="button"
									class="btn btn-cyan btn-lg btn-block">Waiter/Waitress</button>
								<div class="dropdown-content">
									<div>
										<p>1. Candidate must possess at least SPM or higher.</p>
										<p>2. Required Language: English, Malay.</p>
										<p>3. Able to communicate effectively with guests.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<footer class="footer-hidden">
		<div class="overlay"></div>
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-3 col-xs-12 d-none d-lg-block">
					<h3 class=" pb-2"> Sushi Sama</h3>
					<p> Copyright reserved &copy;</p>
				</div>
				<div class="col-lg-2 col-xs-12 d-none d-lg-block">
					<a href="home.php"> <i class="fa fa-5x fa-home"></i> </a>
					<p class="px-3 py-2"> Home</p>
				</div>
				<div class="col-lg-2 col-xs-12 d-none d-lg-block">
					<a href="menu.php"> <i class="fa fa-5x fa-cutlery"></i> </a>
					<p class="px-3 py-2"> Menu</p>
				</div>
				<div class="col-lg-2 col-xs-12 d-none d-lg-block">
					<a href="career.php"> <i class="fa fa-5x fa-briefcase"></i> </a>
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
</body>
</html>