<?php

session_start();
if(isset($_POST['proceed-payment'])){
    
}
else{
    header("Location: ./order.php");
        exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Payment</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
		integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="fontawesome/css/all.css" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/payment.css">

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

	<div class="container-fluid">
		<?php include 'navbar.php'; ?>
	</div>

	<section class="jumbotron text-center">
		<div class="container">
			<h1 class="jumbotron-heading">PAYMENT</h1>
		</div>
	</section>

	<form method="get" action="" class="center">
		<fieldset>
			<div class="container mb-4">
				<div class="table-responsive">
					<table class="table table-striped table-borderless">
						<tbody>
							<tr>
								<th class="align-middle">Full Name</th>
								<td><input type="text" class="form-control" name="name" placeholder="Full Name"
										required></td>
							</tr>

							<tr>
								<th class="align-middle">Email</th>
								<td><input type="email" class="form-control" name="email"
										placeholder="ex: sushi@example.com" required></td>
							</tr>

							<tr>
								<th class="align-middle">Contact Number</th>
								<td><input type="text" class="form-control" name="phone" placeholder="ex: 012345678"
										required></td>
							</tr>

							<tr>
								<th class="align-middle">Total Price</th>
								<td><input type="text" class="form-control" name="price" value="RM 27.80" disabled></td>
							</tr>

							<tr>
								<th class="align-middle">Payment Method</th>
								<td>
									<div class="col">
										<div class="row">
											<div class="col-sm-12  col-md-6">
												<button href="" class="btn btn-block btn-warning text-uppercase" type="submit" name="cash">Cash</a>
												<!--<button class="btn btn-block btn-warning text-uppercase">Cash</button>-->
											</div>
											<div class="col-sm-12 col-md-6 text-right">
												<button href="creditCard.php"
													class="btn btn-block btn-success text-uppercase" type="submit" name="card">Credit Card</a>
												<!--<button class="btn btn-block btn-success text-uppercase" href="creditCard.html">Credit Card</button>-->
											</div>
										</div>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</fieldset>
	</form>

</body>

</html>