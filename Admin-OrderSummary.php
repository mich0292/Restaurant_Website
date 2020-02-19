<?php

    session_start();
    //connect to database
    include 'includes/dbh.inc.php';	
    require 'includes/admin/adminOrderSummary.inc.php';
    $stmt = readSummary();
    $ordersummary = $stmt->fetchAll();
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
	
    <title>Order Summary</title>
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
                    <li class="breadcrumb-item active" aria-current="page">Order Summary</li>
                </ol>
            </nav>
        </div>
    <div class="row p-2 bg-white shadow-lg rounded-lg title px-3 mt-3 m-0 text-left">Order Summary</div>
    <div class="row d-flex justify-content-center rounded text-center bg-white mt-2 m-0">
        <table class="table table-hover table-bordered m-0 d-none d-md-table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" class="th-center">
                        <div class="py-2">Payment ID</div>
                    </th>
                    <th scope="col" class="th-center">
                        <div class="py-2">Username</div>
                    </th>
                    <th scope="col" class="th-center">
                        <div class="py-2">Total</div>
                    </th>
                    <th scope="col" class="th-center">
                        <div class="py-2">Promo Code</div>
                    </th>
                    <th scope="col" class="th-center">
                        <div class="py-2">Discount</div>
                    </th>
                    <th scope="col" class="th-center">
                        <div class="py-2">Grand Total</div>
                    </th>
                    <th scope="col" class="th-center">
                        <div class="py-2">Time</div>
                    </th>
                    <th scope="col" class="th-center">
                        <div class="py-2">Action</div>
                    </th>
                </tr>
            </thead>
            <tbody>
            <?php
            foreach($ordersummary as $summary){
              echo "<tr>";
              echo '<th class="align-middle id">';
              echo $summary[0]; //PaymentID
              echo "</th>";
              echo '<td class="align-middle name">'.$summary[12]."</td>"; //Username
              echo '<td class="align-middle total">'.$summary[1]."</td>"; //Total
              echo '<td class="align-middle promocode">'.$summary[3]."</td>"; //PromoCode
              echo '<td class="align-middle discount">'.$summary[5]."</td>"; //Discount
              echo '<td class="align-middle grandtotal">'.$summary[6]."</td>"; //GrandTotal 
              echo '<td class="align-middle time">'.$summary[9]."</td>"; //Time
              echo '<td>
                  <button type="button" class="btn btn-sm btn-danger deleteButton" data-toggle="modal" data-id="'.$summary[0].'"> 
                    <i class="fa fa-trash"></i>
                  </button>
                  </td>';
              echo "</tr>"; //data-target="#dltOrderSummaryModal"
            }
            ?>
            </tbody>
        </table>
    </div>
    <div class="row justify-content-center rounded text-center bg-white mb-5 m-0 d-lg-none">
    <?php
			foreach($ordersummary as $summary){ 
				echo	'<table class="table table-borderless table-striped border md-3 text-left">
						<colgroup>
						  <col class="p-1 px-2 w-25">
						  <col class="p-1 px-2 w-25">
						</colgroup>
						<tr>
						  <th scope="col">Payment ID</th>
						  <td class="id">'.$summary[12].'</td>
						</tr>
						<tr>
						  <th scope="col">Username</th>
						  <td class="name">'.$summary[1].'</td>
						</tr>
						<tr>
						  <th scope="col">Total</th>
						  <td class="total">'.$summary[3].'</td>
						</tr>
						<tr>
						  <th scope="col">Promo Code</th>
						  <td class="promocode">'.$summary[5].'</td>
						</tr>
						<tr>
						  <th scope="col">Discount</th>
						  <td class="grandtotal">'.$summary[6].'</td>
						</tr>
						<tr>
						  <th scope="col">Time</th>
						  <td class="time">'.$summary[9].'</td>
						</tr>
			
						<tr>
						  <th scope="col">Action</th>
						  <td><button class="btn btn-sm btn-danger deleteButton" data-toggle="modal" data-id="'.$summary[0].'"><i class="fa fa-trash"></i></button>
					
						</tr>
				</table>	';	
			}
		  ?>
    </div>
    <div class="modal fade" id="dltOrderSummaryModal" tabindex="-1" role="dialog" aria-labelledby="dltOrderSummaryModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="dltOrderSummaryModalLabel">Delete Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div> Remove Order?</div>	
                </div>
                <div class="modal-footer">
                    <form method ="post" id="deleteOrderSummary">
                        <input type="hidden" name="orderID" id="orderID" form="deleteOrderSummary">
                        <button type="submit" name="confirmDeletion" class="btn btn-danger" form="deleteOrderSummary">Comfirm</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" 
      integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
      integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
      integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $(".deleteButton").click(function(){ // Click to only happen on announce links
              $("#orderID").val($(this).data('id'));
              $('#dltOrderSummaryModal').modal('show');
            });
        });
    </script>
</body>
</html>