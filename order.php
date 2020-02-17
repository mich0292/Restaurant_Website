<?php

session_start();
$_SESSION['page'] = "order";
include "includes/order.inc.php";
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
									<?php
											foreach($_SESSION["cart"] as $keys => $values)
											{
												$menu_id = $values["menu_id"];
												$item_qty = $values["item_qty"];
												$food_name = $values["food_name"];
												$food_price = $values['food_price'];			
												$category = $values['category'];		
												$img_file_path = $values['img_file_path'];	
												
												$total+=($food_price*$item_qty);
									?>	
										<tr>
											<td>
											<form action="" id="myForm" method="POST">
												<div class="p-2 text-left">
													<img src="<?php echo  $img_file_path; ?>" alt="" width="70" class="img-fluid rounded shadow-sm">
													<div class="ml-3 d-inline-block align-middle">
														<h5 class="mb-0"><a href="#" class="text-dark d-inline-block align-middle"><?php echo  $food_name; ?></a></h5>
													</div>
												</div>
											</td>
											<input type="text" name="id" value="<?php echo  $menu_id; ?>" hidden>
											<td class="align-middle"><strong><?php echo  $category; ?></strong></td>
											<td class="align-middle"><strong>RM<?php echo  number_format($food_price,2); ?></strong></td>
											<td class="align-middle"><input name="<?php echo $menu_id;?>"  class="form-control form-control-sm" type="number" min="1" onkeydown="return false" value="<?php echo  $item_qty; ?>" readonly /></td>
											<td class="align-middle"><button class="btn btn-danger rounded" type="submit" name="delete"><i class="fa fa-trash"></i></button></td>
											</form>
										</tr>

									<?php
										}
										$tax=$total/10;
										$grandtotal=($total+$tax)-$discount;
									?>
									
							</form>
									</tbody>
								</table>
							</div>
							
						<!-- End of shopping cart table-->
						<!-- Discount -->
						<form method="POST" action="">
						<div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Promo code</div>
						<div class="p-4">
							<p class="font-italic mb-4">If you have a promo code, please enter it in the box below</p>
							<div class="input-group mb-4 border rounded-pill p-2 justify-content-center">
								<input type="text" name="promo" id="promo-input" placeholder="Apply promo" aria-describedby="button-addon3" class="form-control border-0 ml-2">
								<button id="button-addon3" type="submit" name="apply" class="btn btn-dark rounded-pill"><i class="fa fa-gift mr-2"></i>Apply promo</button>
								<div class="input-group-append border-0"></div>
							</div>
							<span style="color:<?php echo $color; ?>;"><?php echo $output;?></span>
						</div>
						</form>
						<!-- Instructions -->
						<div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Special remarks</div>
						<div class="p-4">
							<p class="font-italic mb-4">If you have some information you can leave them in the box below</p>
							<textarea name="remark" cols="30" rows="2" class="form-control"></textarea>
						</div>
						<div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Order summary</div>
						<div class="p-4">
							<ul class="list-unstyled mb-4">
								<li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Order Subtotal </strong><strong>RM<?php echo number_format($total,2); ?></strong></li>
								<li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Tax(10%)</strong><strong>RM<?php echo number_format($tax,2); ?></strong></li>
								<li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Discount</strong><strong>RM<?php echo number_format($discount,2); ?></strong></li>
								<li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
									<h5 class="font-weight-bold">RM<?php echo number_format($grandtotal,2); ?></h5>
								</li>
							</ul><a href="payment.php" class="btn btn-dark rounded-pill py-2 px-3 px-lg-5">Procceed to checkout</a>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>


</html>

