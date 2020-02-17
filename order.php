<?php

session_start();
$_SESSION['page'] = "order";

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		
	<!-- MD for Bootstrap -->
	<link rel="stylesheet" href="css/mdb.min.css">
	
	<!-- Awesome Font(Icons) -->
	<link href="fontawesome/css/all.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<!-- Gordon -->
	<link rel="stylesheet" href="css/order.css">
	<link rel="stylesheet" href="css/style.css">
	
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	
	<title>Order</title>
</head>
<body>		
	<div class="text-center" id="career-banner">
		<!-- Nav bar -->
		<!-- In reference to https://www.codeply.com/go/QAXbNGbWPA/bootstrap-4-navbar-transparent -->
		<?php include('navbar.php'); ?>
		<!-- End of Nav Bar -->
		<!--Login Modal -->
		<?php include('login-modal.php'); ?>
		<div class="px-2 px-lg-0">	
			<div class="pb-0 pb-lg-5">
				<div class="container">
					<div class="row mt-0 mx-0 mx-lg-5">
						<div class="col-lg-12 p-4 p-lg-5 bg-white rounded shadow-lg mt-5 mb-5 rounded-lg">
							<!-- Shopping cart table -->
							<form method="post" id="order-item" action="payment.php">
							<div class="table-responsive">
								<table class="table table-hover">
									<thead class="thead-light">
										<tr>
											<th scope="col">
												<div class="p-2 px-3 text-uppercase">Product</div>
											</th>
											<th scope="col" class="th-center">
												<div class="py-2 text-uppercase">Category</div>
											</th>
											<th scope="col" class="th-center">
												<div class="py-2 text-uppercase">Price</div>
											</th>
											<th scope="col" class="th-center">
												<div class="py-2 text-uppercase">Quantity</div>
											</th>
											<th scope="col" class="th-center">
												<div class="py-2 text-uppercase">Action</div>
											</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>
												<div class="p-2">
													<img src="images/menu/salmon_sushi.jpg" alt="" width="70" class="img-fluid rounded shadow-sm">
													<div class="ml-3 d-inline-block align-middle">
														<h5 class="mb-0"><a href="#" class="text-dark d-inline-block align-middle">Salmon Sushi</a></h5>
													</div>
												</div>
											</td>
											<td class="align-middle"><strong>Sushi</strong></td>
											<td class="align-middle"><strong>RM4.80</strong></td>
											<td class="align-middle"><input class="form-control form-control-sm" type="number" min="0" placeholder="1" /></td>
											<td class="align-middle"><button class="btn btn-danger rounded" type="button"><i class="fa fa-trash"></i></button></td>
										</tr>
										<tr>
											<td>
												<div class="p-2">
													<img src="images/menu/california-rol.jpg" alt="" width="70" class="img-fluid rounded shadow-sm">
													<div class="ml-3 d-inline-block align-middle">
														<h5 class="mb-0"><a href="#" class="text-dark d-inline-block">California roll</a></h5>
													</div>
												</div>
											</td>
											<td class="align-middle"><strong>Sushi</strong></td>
											<td class="align-middle"><strong>RM2.80</strong></td>
											<td class="align-middle"><input class="form-control form-control-sm" type="number" min="0" placeholder="1" /></td>
											<td class="align-middle"><button class="btn btn-danger rounded" type="button"><i class="fa fa-trash"></i></button></td>
										</tr>
										<tr>
											<td>
												<div class="p-2">
													<img src="images/menu/chicken-karaage.jpg" alt="" width="70" class="img-fluid rounded shadow-sm">
													<div class="ml-3 d-inline-block align-middle">
														<h5 class="mb-0"> <a href="#" class="text-dark d-inline-block">Chicken karaage</a></h5>
													</div>
												</div>
											</td>
											<td class="align-middle"><strong>Agemono</strong></td>
											<td class="align-middle"><strong>RM7.80</strong></td>
											<td class="align-middle"><input class="form-control form-control-sm" type="number" min="0" placeholder="1" /></td>	
											<td class="align-middle"><button class="btn btn-danger rounded" type="button"><i class="fa fa-trash"></i></button></td>
										</tr>
									</tbody>
								</table>
							</div>
						</form>
						<!-- End of shopping cart table-->
						<!-- Discount -->
						<div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Promo code</div>
						<div class="p-4">
							<p class="font-italic mb-4">If you have a promo code, please enter it in the box below</p>
							<div class="input-group mb-4 border rounded-pill p-2 justify-content-center">
								<input type="text" id="promo-input" placeholder="Apply promo" aria-describedby="button-addon3" class="form-control border-0 ml-2">
								<button id="button-addon3" type="button" class="btn btn-dark rounded-pill"><i class="fa fa-gift mr-2"></i>Apply promo</button>
								<div class="input-group-append border-0"></div>						  
							</div>
						</div>
						<!-- Instructions -->
						<div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Special remarks</div>
						<div class="p-4">
							<p class="font-italic mb-4">If you have some information you can leave them in the box below</p>
							<textarea name="remark" cols="30" rows="2" class="form-control"></textarea>
						</div>
						<div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Order summary</div>
						<div class="p-4">
							<ul class="list-unstyled mb-4">
								<li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Order Subtotal </strong><strong>RM15.40</strong></li>
								<li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Tax</strong><strong>RM0.00</strong></li>
								<li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
									<h5 class="font-weight-bold">RM15.40</h5>
								</li>
							</ul><button  form="order-item" class="btn btn-dark rounded-pill py-2 px-3 px-lg-5" type="submit" name="proceed-payment">Procceed to checkout</a>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>


</html>

