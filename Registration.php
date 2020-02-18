<?php

session_start();
$_SESSION['page'] = "registration";

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Registration</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
		integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- MD for Bootstrap -->
	<link rel="stylesheet" href="css/mdb.min.css">

	<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Sofia'>
	<link href="fontawesome/css/all.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css" />
	<link rel="stylesheet" href="css/Registration.css" />

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
	<div class="container-fluid p-0">
		<?php include('navbar.php'); ?>
		<!--Login Modal -->
		<?php include('login-modal.php'); ?>
		<div class="container-fluid">
			<div class="container m-auto px-0 row shadow-lg rounded">
				<div class="col-6 p-0 d-none d-lg-block">
					<img src="images/health.jpg" style="width:100%" alt="sushi"/>
				</div>
				<div class="col-12 col-lg-6 p-4">
					<h2 class="title">Registration Form</h2>
					<form action="includes/signup.inc.php" method="POST">
						<div class="row mx-2">
							<div class="col-12 col-md-4">
								<label class="label mr-2">Username</label>
							</div>
							<div class="col-12 col-md-8">
								<input type="text" class="form-control" name="username" placeholder="Enter Username">
							</div>
						</div>
						<div class="row mx-2">
							<div class="col-12 col-md-4">
								<label class="label mr-2">Password</label>
							</div>
							<div class="col-12 col-md-8">
								<input type="password" class="form-control" name="password" placeholder="Enter Password">
							</div>
						</div>
						<div class="row mx-2">
							<div class="col-12 col-md-4">
								<label class="label mr-2">Name</label>
							</div>
							<div class="col-12 col-md-8">
								<input type="text" class="form-control" name="name" placeholder="Enter Name">
							</div>
						</div>
						<div class="row mx-2">
							<div class="col-12 col-md-4">
								<label class="label">Birthday</label>
							</div>
							<div class="col-12 col-md-8">
								<input type="date" class="form-control" name="birthday">
							</div>
						</div>
						<div class="row mx-2">
							<div class="col-12 col-md-4">
								<label class="label mr-2">Email</label>
							</div>
							<div class="col-12 col-md-8">
								<input type="email" class="form-control" name="email" placeholder="Enter email">
							</div>
						</div>
						<div class="row mx-2">
							<div class="col-12 col-md-4">
								<label class="label mr-2">Contact</label>
							</div>
							<div class="col-12 col-md-8">
								<input type="text" class="form-control" name="contact" placeholder="Enter Contact">
							</div>
						</div>
						<div class="row justify-content-center py-0 my-0">
							<div class="input-group col-4 col-md-4">
								<button class="btn btn-light" type="submit" name="signup-submit">Submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="dltUserModal" tabindex="-1" role="dialog" aria-labelledby="dltUserModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="dltUserModalLabel">Delete Item</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div> Remove User?</div>	
				</div>
				<div class="modal-footer">
                    <form method="post" id="deleteUserForm">
                        <input type="hidden" name="userID" id="userID" form="deleteUserForm">
                        <button type="submit" name="deleteUser" class="btn btn-danger" form="deleteUserForm">Comfirm</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </form>
				</div>
			</div>
		</div>
    </div>
</body>


</html>