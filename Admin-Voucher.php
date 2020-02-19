<?php
    
    session_start();
    //connect to database
    include 'includes/dbh.inc.php';	
    require 'includes/admin/adminVoucher.inc.php';

    // if( isset( $_SESSION['counter'] ) ) {
	// 	$_SESSION['counter'] += 1;
	// }else  {
		$_SESSION['counter'] = 1;
		//Clear the saved input
		$_SESSION['codeInput'] = "";
		$_SESSION['typeInput'] = "";
		$_SESSION['priceInput'] = "";
		$_SESSION['activeInput'] = "";

		
		 //Clear the error message
		$_SESSION['codeErr'] = "";
		$_SESSION['typeErr'] = "";
		$_SESSION['priceErr'] = "";
		$_SESSION['activeErr'] = "";

		
		//Clear the error formattting
		$_SESSION['codeClass'] = ""; 
		$_SESSION['typeClass'] = "";
		$_SESSION['priceClass'] = "";
		$_SESSION['activeClass'] = "";

	// }
    $stmt = readVoucher();
    $voucher = $stmt->fetchAll();


?>


<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link href="fontawesome/css/all.css" rel="stylesheet">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Acme&display=swap" rel="stylesheet">

  <!-- Wong Zi Jiang -->
  <link rel="stylesheet" href="css/admin.css" />

  <title>Voucher</title>
</head>


<body>
  <nav class="navbar navbar-light bg-light justify-content-between">
    <a class="navbar-brand font-weight-bold">
      <i class="fa fa-cogs mr-2"></i>Sushi Sama Panel</a>
    <a href="AdminLogin.php" class="justify-content-end"><i class="fa fa-lg fa-sign-out-alt"></i></a>
  </nav>

  <div class="container">
    <div class="row px-3 mt-3 rounded-lg">
      <nav aria-label="breadcrumb" class="w-100">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="AdminHome.php"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item active" aria-current="page">Voucher</li>
        </ol>
      </nav>
    </div>
    <div class="row p-2 bg-white shadow-lg rounded-lg title px-3 mt-md-3 m-0 text-left justify-content-between">
      <div>Voucher</div>
      <button class="btn btn-success" data-toggle="modal" data-target="#addVoucherModal">Add Voucher</button>
    </div>
    <div class="row d-flex justify-content-center rounded text-center bg-white mt-2 m-0">
      <table class="table table-hover table-bordered m-0 d-none d-md-table">
        <thead class="thead-dark">
            <tr>
            <th scope="col" class="th-center">
                <div class="py-2">Promo Code</div>
              </th>
              <th scope="col" class="th-center">
                <div class="py-2">Promo Type</div>
              </th>
              <th scope="col" class="th-center">
                <div class="py-2">Promo Price</div>
              </th>
              <th scope="col" class="th-center">
                <div class="py-2">Promo Active</div>
              </th>
              <th scope="col" class="th-center">
              <div class="py-2">Action</div>
            </th>
            </tr>
        </thead>
        <tbody>
        <?php
          foreach($voucher as $voucher_loop){
            echo "<tr>";
            echo '<th class="align-middle">';
            echo $voucher_loop[0]; //Promo Code
            echo "</th>";
            echo '<td class="align-middle">'.$voucher_loop[1].'</td>'; //Promo Type
            echo '<td class="align-middle">'.$voucher_loop[2].'</td>'; //Promo Price
            echo '<td class="align-middle">'.$voucher_loop[3].'</td>'; //Promo Active
            //echo '<td class="align-middle">'.$voucher_loop[4]."</td>"; //
            echo '<td>
                <button type="button" class="btn btn-sm btn-danger deleteButton" data-toggle="modal" data-id="'.$voucher_loop[0].'"> 
                  <i class="fa fa-trash"></i>
                </button>
                </td>';
            echo "</tr>"; 
          }

	    	  ?>

        </tbody>
      </table>
      </div>
      <div class="row justify-content-center rounded text-center bg-white mb-5 m-0 d-md-none">
            <table class="table table-borderless table-responsive table-striped border m-2 text-left">
              <colgroup>
                <col class="p-1 px-2 w-25">
                <col class="p-1 px-2 w-25">
              </colgroup>
              <tr>
                <th scope="col">ID</th>
                <td>1</td>
              </tr>
              <tr>
                <th scope="col">Username</th>
                <td>lucastest</td>
              </tr>
              <tr>
                <th scope="col">Amount</th>
                <td>RM4.80</td>
              </tr>
              <tr>
                <th scope="col">Order Time</th>
                <td>2020-01-17 15:30:00</td>
              </tr>
              <tr>
                <th scope="col">Action</th>
                <td><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button></td>
              </tr>
            </table>
            <table class="table table-responsive table-borderless table-striped border m-2 text-left">
              <colgroup>
                <col class="p-1 px-2 w-25">
                <col class="p-1 px-2 w-25">
              </colgroup>
              <tr>
                <th scope="col">ID</th>
                <td>2</td>
              </tr>
              <tr>
                <th scope="col">Username</th>
                <td>lucastest</td>
              </tr>
              <tr>
                <th scope="col">Amount</th>
                <td>RM2.80</td>
              </tr>
              <tr>
                <th scope="col">Order Time</th>
                <td>2020-01-17 15:30:00</td>
              </tr>
              <tr>
                <th scope="col">Action</th>
                <td><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button></td>
              </tr>
            </table>
            <table class="table table-responsive table-borderless table-striped border m-2 text-left">
              <colgroup>
                <col class="p-1 px-2 w-25">
                <col class="p-1 px-2 w-25">
              </colgroup>
              <tr>
                <th scope="col">ID</th>
                <td>3</td>
              </tr>
              <tr>
                <th scope="col">Username</th>
                <td>lucastest</td>
              </tr>
              <tr>
                <th scope="col">Amount</th>
                <td>RM7.80</td>
              </tr>
              <tr>
                <th scope="col">Order Time</th>
                <td>2020-01-17 15:30:00</td>
              </tr>
              <tr>
                <th scope="col">Action</th>
                <td><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button></td>
              </tr>
            </table>
    </div>

 

  <div class="modal fade" id="addVoucherModal" tabindex="-1" role="dialog" aria-labelledby="addVoucherModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="addVoucherModalLabel">Add Item</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>

    
				<div class="modal-body">
					<form id="addVoucherID" method="post">
						<div class="form-group">
							<label for="vourPromo" class="">Promo Code:</label>
							<input type="text" class="form-control" name="vourPromo" value ="<?php echo $_SESSION['codeInput'];?>">
							<small id="<?php echo $_SESSION['codeClass']; ?>"> <?php echo $_SESSION['codeErr']; ?> </small>
						</div>
						<div class="form-group">
							<label for="vourType" class="">Promo Type:</label>
							<input type="text" class="form-control" name="vourType" value ="<?php echo $_SESSION['typeInput'];?>">
							<small id="<?php echo $_SESSION['typeClass'];?>"> <?php echo $_SESSION['typeErr']; ?> </small>
						</div>
						<div class="form-group">
							<label for="vourPrice" class="">Promo Price:</label>
							<input type="text" class="form-control" name="vourPrice" value ="<?php echo $_SESSION['priceInput'];?>">
							<small id="<?php echo $_SESSION['priceClass'];?>"> <?php echo $_SESSION['priceErr']; ?> </small>
						</div>
                        <div class="form-group">
							<label for="vourActive" class="">Promo Active:</label>
							<input type="text" class="form-control" name="vourActive" value ="<?php echo $_SESSION['activeInput'];?>">
							<small id="<?php echo $_SESSION['activeClass'];?>"> <?php echo $_SESSION['activeErr']; ?> </small>
						</div>

					
							<button type="submit" name="closeButton" class="btn btn-secondary" >Close</button>
							<button type="submit" name="voucherbutton" class="btn btn-primary" >Save changes</button>
					</form>
				</div>
			</div>
		</div>
	</div>

    <div class="modal fade" id="dltVoucherModal" tabindex="-1" role="dialog" aria-labelledby="dltVoucherModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="dltVoucherModalLabel">Delete Item</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div> Remove Voucher?</div>	
				</div>
				<div class="modal-footer">
					<form method ="post" id="deleteVoucher">
						<input type="hidden" name="voucherID" id="voucherID" form="deleteVoucher">
						<button type="submit" name="confirmDeletion" class="btn btn-danger" form="deleteVoucher">Confirm</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</form>
				</div>
			</div>
		</div>
	</div>
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
	<script>
		$(document).ready(function(){
		     $(".deleteButton").click(function(){ // Click to only happen on announce links
				$("#voucherID").val($(this).data('id'));
                var check= $("#voucherID").val($(this).data('id'));
                console.log(check);
				$('#dltVoucherModal').modal('show');
		   });
		});
	</script>
  <!-- Optional JavaScript -->
</body>
</html>