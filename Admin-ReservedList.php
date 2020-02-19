<?php
	session_start();
	require 'includes/admin/adminReservation.inc.php';
	 if( isset( $_SESSION['counter'] ) ) {
		$_SESSION['counter'] += 1;
	}else {
		$_SESSION['counter'] = 1;
		//Clear the saved input
		$_SESSION['dateInput'] = "";
		$_SESSION['timeInput'] = "";
		$_SESSION['nameInput'] = "";
		$_SESSION['emailInput'] = "";
		$_SESSION['cityInput'] = "";
		$_SESSION['phoneInput'] = "";
		$_SESSION['remarksInput'] = "";
		$_SESSION['adultInput'] = "";
		
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
	$stmt = readReservation();
	$reservationList = $stmt->fetchAll();
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
		     $(".deleteButton").click(function(){ // Click to only happen on deletButton
				$("#reservationID").val($(this).data('id'));
				$('#dltReserveModal').modal('show');
		   });
		});
	</script>
  <!-- Optional JavaScript -->
  <title>Reserved List</title>
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
          <li class="breadcrumb-item active" aria-current="page">Table Reservation</li>
        </ol>
      </nav>
    </div>
    <div class="row p-2 bg-white shadow-lg rounded-lg title px-3 mt-md-3 m-0 text-left justify-content-between">
      <div>Table Reservation</div>
      <button class="btn btn-success" data-toggle="modal" data-target="#addReserveModal">Add Reservation</button>
    </div>
    <div class="row justify-content-center rounded text-center bg-white mt-2 m-0 table-responsive">
      <table class="table table-hover table-bordered m-0 d-none d-lg-table text-center">
        <thead class="thead-dark">
          <tr>
            <th scope="col" class="th-center">
              <div class="py-2">ID</div>
            </th>
            <th scope="col" class="th-center">
              <div class="py-2">Name</div>
            </th>
            <th scope="col" class="th-center">
              <div class="py-2">Contact </div>
            </th>
			<th scope="col" class="th-center">
              <div class="py-2">Email</div>
            </th>
            <th scope="col" class="th-center">
              <div class="py-2">Headcount<br>(Adult)</div>
            </th>
            <th scope="col" class="th-center">
              <div class="py-2">Headcount<br>(Children)</div>
            </th>
			<th scope="col" class="th-center">
              <div class="py-2">Date</div>
            </th>
            <th scope="col" class="th-center">
              <div class="py-2">Time</div>
            </th>
			<th scope="col" class="th-center">
              <div class="py-2">Special remarks</div>
            </th>
            <th scope="col" class="th-center">
              <div class="py-2">Action</div>
            </th>
          </tr>
        </thead>
        <tbody>	
		<?php
			foreach($reservationList as $reservation){
				echo "<tr>";
				echo '<th class="align-middle id">';
				echo $reservation[0]; //ID counter
				//$reservation[7] = city
				//$reservation[8] = special remark
				echo "</th>";
				echo '<td class="align-middle name">'.$reservation[5]."</td>"; //Name
				echo '<td class="align-middle contact">'.$reservation[7]."</td>"; //Contact
				echo '<td class="align-middle custEmail">'.$reservation[6]."</td>"; //Email
				echo '<td class="align-middle adultNum">'.$reservation[3]."</td>"; //Num of adult
				echo '<td class="align-middle childNum">'.$reservation[4]."</td>"; //Num of child
				echo '<td class="align-middle resDate">'.$reservation[1]."</td>"; //Date
				echo '<td class="align-middle resTime">'.$reservation[2]."</td>"; //Time
				echo '<td class="align-middle remarks">'.$reservation[9]."</td>"; //Special remarks
				echo '<td>
						<button type="button" class="btn btn-sm btn-danger deleteButton" data-toggle="modal" data-id="'.$reservation[0].'"> 
							<i class="fa fa-trash"></i>
						</button>
						<button type="button" class="btn btn-sm btn-primary editButton" data-toggle="modal" data-id="'.$reservation[0].'"> 
						<i class="fa fa-edit"></i>
					</button>
					  </td>';
				echo "</tr>"; //data-target="#dltReserveModal"
			}
		  ?>
        </tbody>
      </table>
    </div>
    <div class="row justify-content-center rounded text-center bg-white m-0 d-lg-none">
			<?php
			foreach($reservationList as $reservation){ 
				echo	'<table class="table table-borderless table-striped border md-3 text-left">
						<colgroup>
						  <col class="p-1 px-2 w-25">
						  <col class="p-1 px-2 w-25">
						</colgroup>
						<tr>
						  <th scope="col">ID</th>
						  <td class="id">'.$reservation[0].'</td>
						</tr>
						<tr>
						  <th scope="col">Name</th>
						  <td class="name">'.$reservation[5].'</td>
						</tr>
						<tr>
						  <th scope="col">Contact</th>
						  <td class="contact">'.$reservation[7].'</td>
						</tr>
						<tr>
						  <th scope="col">Email</th>
						  <td class="custEmail">'.$reservation[6].'</td>
						</tr>
						<tr>
						  <th scope="col">HeadCount<br>(Adult)</th>
						  <td class="adultNum">'.$reservation[3].'</td>
						</tr>
						<tr>
						  <th scope="col">HeadCount<br>(Children)</th>
						  <td class="childNum">'.$reservation[4].'</td>
						</tr>
						<tr>
							<th scope="col">Date</th>
							<td class="resDate">'.$reservation[1].'</td>
					  	</tr>
						<tr>
						  <th scope="col">Time</th>
						  <td class="resTime">'.$reservation[2].'</td>
						</tr>
						<tr>
						  <th scope="col">Special remarks </th>
						  <td class="remarks">'.$reservation[9].'</td>
						</tr>
						<tr>
						  <th scope="col">Action</th>
						  <td><button class="btn btn-sm btn-danger deleteButton" data-toggle="modal" data-id="'.$reservation[0].'"><i class="fa fa-trash"></i></button>
						  <button class="btn btn-sm btn-primary editButton" data-toggle="modal" data-id="'.$reservation[0].'"><i class="fa fa-edit"></i></button></td>
						</tr>
				</table>	';	
			}
		  ?>
    </div>
  </div>

	<div class="modal fade" id="addReserveModal" tabindex="-1" role="dialog" aria-labelledby="addReserveModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="addReserveModalLabel">Add Item</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="addReservationID" method="post">
						<div class="form-group">
							<label for="resvDate" class="">Date:</label>
							<input type="date" class="form-control" name="resvDate" value ="<?php echo $_SESSION['dateInput'];?>">
							<small id="<?php echo $_SESSION['dateClass']; ?>"> <?php echo $_SESSION['dateErr']; ?> </small>
						</div>
						<div class="form-group">
							<label for="resvTime" class="">Time:</label>
							<input type="time" class="form-control" name="resvTime" value ="<?php echo $_SESSION['timeInput'];?>">
							<small id="<?php echo $_SESSION['timeClass'];?>"> <?php echo $_SESSION['timeErr']; ?> </small>
						</div>
						<div class="form-group">
							<label for="custName" class="">Name:</label>
							<input type="text" class="form-control" name="custName" value ="<?php echo $_SESSION['nameInput'];?>">
							<small id="<?php echo $_SESSION['nameClass'];?>"> <?php echo $_SESSION['nameErr']; ?> </small>
						</div>
						<div class="form-group">
							<label for="custContact" class="">Contact:</label>
							<input type="text" class="form-control" name="custContact" value ="<?php echo $_SESSION['phoneInput'];?>">
							<small id="<?php echo $_SESSION['phoneClass'];?>"> <?php echo $_SESSION['phoneErr']; ?> </small>
						</div>
						<div class="form-group">
							<label for="custEmail" class="">Email:</label>
							<input type="text" class="form-control" name="custEmail" value = "<?php echo $_SESSION['emailInput'];?>">
							<small id="<?php echo $_SESSION['emailClass'];?>"> <?php echo $_SESSION['emailErr']; ?> </small>
						</div>
						<div class="form-group">
							<label for="custCity" class="">City:</label>
							<input type="text" class="form-control" name="custCity" value = "<?php echo $_SESSION['cityInput'];?>">
							<small id="<?php echo $_SESSION['cityClass'];?>"> <?php echo $_SESSION['cityErr']; ?> </small>
						</div>
						<div class="form-group">
							<label for="adultHc" class="">Headcount(Adult):</label>
							<input type="number" min="1" class="form-control"  name="adultHc" value= "<?php echo $_SESSION['adultInput'];?>">
							<small id="<?php echo $_SESSION['adultClass'];?>"> <?php echo $_SESSION['adultErr']; ?> </small>
						</div>
						<div class="form-group">
							<label for="childHc" class="">Headcount(Children):</label>
							<input type="number" min="0" class="form-control"  name="childHc">
						</div>
						<div class="form-group">
							<label for="specialRemark" class="">Special Remarks:</label>
							<input type="text" class="form-control" name="specialRemark" value = "<?php echo $_SESSION['remarksInput'];?>">
						</div>
							<button type="submit" name="closeButton" class="btn btn-secondary" >Close</button>
							<button type="submit" name="addReservation" class="btn btn-primary" >Save changes</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="editReserveModal" tabindex="-1" role="dialog" aria-labelledby="editReserveModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="editReserveModalLabel">Edit Reservation</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="editReserveForm" method="post">
						<input type="hidden" class="form-control" name="editResvID" id="editResvID">
						<div class="form-group">
							<label for="editResvDate">Date:</label>
							<input type="date" class="form-control" name="editResvDate" id="editResvDate">
						</div>
						<div class="form-group">
							<label for="editResvTime">Time:</label>
							<input type="time" class="form-control" name="editResvTime" id="editResvTime">
						</div>
						<div class="form-group">
							<label for="editCustName">Name:</label>
							<input type="text" class="form-control" name="editCustName"  id="editCustName">
						</div>
						<div class="form-group">
							<label for="editCustContact" class="">Contact:</label>
							<input type="text" class="form-control" name="editCustContact"  id="editCustContact">
						</div>
						<div class="form-group">
							<label for="editCustEmail" class="">Email:</label>
							<input type="text" class="form-control" name="editCustEmail"  id="editCustEmail">
						</div>
						<div class="form-group">
							<label for="editAdultHc" class="">Headcount(Adult):</label>
							<input type="number" min="1" class="form-control"  name="editAdultHc"  id="editAdultHc">
						</div>
						<div class="form-group">
							<label for="editChildHc" class="">Headcount(Children):</label>
							<input type="number" min="0" class="form-control"  name="editChildHc"  id="editChildHc">
						</div>
						<div class="form-group">
							<label for="editSpecialRemark" class="">Special Remarks:</label>
							<input type="text" class="form-control" name="editSpecialRemark"  id="editSpecialRemark">
						</div>
							<button type="submit" name="closeButton" class="btn btn-secondary" >Close</button>
							<button type="submit" name="editReservation" class="btn btn-primary" >Save changes</button>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="dltReserveModal" tabindex="-1" role="dialog" aria-labelledby="dltReserveModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="dltReserveModalLabel">Delete Item</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div> Remove Reservation?</div>	
				</div>
				<div class="modal-footer">
					<form method ="post" id="deleteReservation">
						<input type="hidden" name="reservationID" id="reservationID" form="deleteReservation">
						<button type="submit" name="confirmDeletion" class="btn btn-danger" form="deleteReservation">Comfirm</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<script>
			$(document).on('click','.editButton',function(){
            var row = $(this).closest('tr');
            var mobileRow = $(this).closest('table');
            var id = row.find('.id').text();
            var name = row.find('.name').text();
            var contact = row.find('.contact').text();
            var email = row.find('.custEmail').text();
            var adultNum = row.find('.adultNum').text();
            var childNum = row.find('.childNum').text();
            var resDate = row.find('.resDate').text();
			var resTime = row.find('.resTime').text();
			var remarks = row.find('.remarks').text();
			if(!id){
				id = mobileRow.find('.id').text();
				name = mobileRow.find('.name').text();
				contact = mobileRow.find('.contact').text();
				email = mobileRow.find('.custEmail').text();
				adultNum = mobileRow.find('.adultNum').text();
				childNum = mobileRow.find('.childNum').text();
				resDate = mobileRow.find('.resDate').text();
				resTime = mobileRow.find('.resTime').text();
				remarks = mobileRow.find('.remarks').text();
			}
            $('#editReserveModal').find('#editResvID').val(id);
            $('#editReserveModal').find('#editResvDate').val(resDate);
            $('#editReserveModal').find('#editResvTime').val(resTime);
            $('#editReserveModal').find('#editCustName').val(name);
            $('#editReserveModal').find('#editCustEmail').val(email);
            $('#editReserveModal').find('#editCustContact').val(contact);
            $('#editReserveModal').find('#editAdultHc').val(adultNum);
            $('#editReserveModal').find('#editChildHc').val(childNum);
            $('#editReserveModal').find('#editSpecialRemark').val(remarks);
            $('#editReserveModal').modal('show');
            });
			</script>
</body>

</html>