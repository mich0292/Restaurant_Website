<?php	
    session_start();
	require 'includes/adm-menulist.inc.php';
	include 'includes/upload.php';
	$nameErr = $priceErr = "";
	
	if(isset($_POST['addMenuButton'])){		
		if (empty($_POST['menuName']))
			$nameErr = "Food name is required.";

		if (empty($_POST['menuPrice']))
			$priceErr = "Food price is required.";
	}
	
	
	$stmt = readMenu();
	$menuList = $stmt->fetchAll();
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
  
  <!-- Font Awesome(Icons)-->
  <link href="fontawesome/css/all.css" rel="stylesheet">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Acme&display=swap" rel="stylesheet">

  <!-- Wong Zi Jiang -->
  <link rel="stylesheet" href="css/admin.css"/>
  <title>Menu List</title>

  <!-- Optional JavaScript 
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
  <nav class="navbar navbar-light bg-light justify-content-between">
    <a class="navbar-brand font-weight-bold">
      <i class="fa fa-cogs mr-2"></i>Sushi Sama Panel</a>
    <a href="AdminLogin.html" class="justify-content-end"><i class="fa fa-lg fa-sign-out-alt"></i></a>
  </nav>

  <div class="container">
    <div class="row px-3 mt-3 rounded-lg">
      <nav aria-label="breadcrumb" class="w-100">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="AdminHome.html"><i class="fas fa-home"></i></a></li>
          <li class="breadcrumb-item active" aria-current="page">Menu List</li>
        </ol>
      </nav>
    </div>
    <div class="row p-2 bg-white shadow-lg rounded-lg title px-3 mt-3 m-0 text-left justify-content-between">
      <div>Menu List</div>
      <button class="btn btn-success" data-toggle="modal" data-target="#addMenuModal">Add Item</button>
    </div>
    <div class="row d-flex justify-content-center rounded text-center bg-white mt-2 m-0">
      <table class="table table-hover table-bordered m-0 d-none d-md-table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">
              <div class="p-2">ID</div>
            </th>
			<th scope="col" class="th-center">
              <div class="py-2">Category</div>
            <th scope="col" class="th-center">
              <div class="py-2">Name</div>
            </th>
            <th scope="col" class="th-center">
              <div class="py-2">Price</div>
            </th>
            <th scope="col" class="th-center">
              <div class="py-2">Picture</div>
            </th>
            <th scope="col" class="th-center">
              <div class="py-2">Action</div>
            </th>
          </tr>
        </thead>
        <tbody>
        <?php
			foreach($menuList as $menuItem){
				echo "<tr>";
				echo '<th class="align-middle">';
				echo $menuItem[0]; //ID 
				echo "</th>";
				echo '<td class="align-middle">'.$menuItem[3]."</td>"; //Category
				echo '<td class="align-middle">'.$menuItem[1]."</td>"; //Name
				echo '<td class="align-middle">'.$menuItem[2]."</td>"; //Price
				echo '<td class="align-middle"> <img src="'.$menuItem[4].'" height="50" width="50"></td>'; //Picture's file path
				echo '<td>
						<form method="post">
							<button type="submit" name="deleteMenuItem" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#dltReserveModal" value="'.$menuItem[0].'">
								<i class="fa fa-trash"></i>
							</button>
							<button class="btn btn-sm ml-0 btn-primary" data-toggle="modal" data-target="#editMenuModal" value="'.$menuItem[0].'">
							<i class="fa fa-edit"></i>
							</button>
						</form>
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
          <th scope="col">Name</th>
          <td>Salmon Sushi</td>
        </tr>
        <tr>
          <th scope="col">Price</th>
          <td>RM4.80</td>
        </tr>
        <tr>
          <th scope="row">Action</th>
          <td>
            <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#dltMenuModal"><i class="fa fa-trash"></i></button>
            <button class="btn btn-sm ml-0 btn-primary" data-toggle="modal" data-target="#editMenuModal"><i class="fa fa-edit"></i></button>
          </td>
        </tr>
      </table>
      <table class="table table-borderless table-striped border m-2 text-left">
        <colgroup>
          <col class="p-1 px-2 w-25">
          <col class="p-1 px-2 w-25">
        </colgroup>
        <tr>
          <th scope="col">ID</th>
          <td>2</td>
        </tr>
        <tr>
          <th scope="col">Name</th>
          <td>California roll</td>
        </tr>
        <tr>
          <th scope="col">Price</th>
          <td>RM2.80</td>
        </tr>
        <tr>
          <th scope="row">Action</th>
          <td>
            <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#dltMenuModal"><i class="fa fa-trash"></i></button>
            <button class="btn btn-sm ml-0 btn-primary" data-toggle="modal" data-target="#editMenuModal"><i class="fa fa-edit"></i></button>
          </td>
        </tr>
      </table>
      <table class="table table-borderless table-striped border m-2 text-left">
        <colgroup>
          <col class="p-1 px-2 w-25">
          <col class="p-1 px-2 w-25">
        </colgroup>
        <tr>
          <th scope="col">ID</th>
          <td>3</td>
        </tr>
        <tr>
          <th scope="col">Name</th>
          <td>Inari Igiri</td>
        </tr>
        <tr>
          <th scope="col">Price</th>
          <td>RM1.80</td>
        </tr>
        <tr>
          <th scope="row">Action</th>
          <td>
            <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#dltMenuModal"><i class="fa fa-trash"></i></button>
            <button class="btn btn-sm ml-0 btn-primary" data-toggle="modal" data-target="#editMenuModal"><i class="fa fa-edit"></i></button>
          </td>
        </tr>
      </table>
    </div>
  </div>
  
	<!-- Modal for Add Menu Item -->
	<div class="modal fade" id="addMenuModal" tabindex="-1" role="dialog" aria-labelledby="addMenuModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-header">
			  <h5 class="modal-title" id="addMenuModalLabel">Add Item</h5>
			  <button type="reset" class="close" data-dismiss="modal" aria-label="Close" name="closeAddItem" onClick="resetForm()">
				<span aria-hidden="true">&times;</span>
			  </button>
			</div>
			<div class="modal-body">
				<form method="post" enctype="multipart/form-data" id="addMenuForm">
					<div class="form-group">
						<label for="menuName" class="">Name:</label>
						<input type="text" class="form-control" name="menuName" id="addMenuName" form="addMenuForm">
					</div>
						<div class="form-group">
						<label for="menuPrice" class="">Price:</label>
					<input type="number" class="form-control" step="0.01" min="0" name="menuPrice" id="addMenuPrice" form="addMenuForm">
					</div>
					<div class="form-group">
						<label for="category" class="">Category:</label>
						<input type="text" class="form-control" name="category" id="addMenuCategory" form="addMenuForm">
					</div>
					<div class="form-group">
					<?php 
						if (!isset ($_SESSION['picURL']) ) {
							echo '<label for="uploadPic" >Upload picture:</label>
								 <input type="file" class="form-control" name="uploadPic" form="addMenuForm">
								 <button class="m-2" type="submit" name="uploadPic" form="addMenuForm"> Upload </button>';
						} else{
								echo '<label for="menuPic" >Picture uploaded:</label>
									  <input type="text" class="form-control" name="menuPic" id="addMenuURL" form="addMenuForm" value="'.$_SESSION['picURL'].'">';
								//<small>'.$_SESSION['picURL'].'</small>';
							}								
						?>
					</div> 
				</form>
			</div>
			<div class="modal-footer">
				<button type="submit" name="closeMenuButton" class="btn btn-secondary" form="addMenuForm">Close</button>
				<button type="submit" name="addMenuButton" class="btn btn-primary" form="addMenuForm">Comfirm</button>
			</div>
		  </div>
		</div>
	</div>
  
<!-- Modal for Edit Menu Item -->
  <div class="modal fade" id="editMenuModal" tabindex="-1" role="dialog" aria-labelledby="editMenuModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editMenuModalLabel">Edit Item</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" onClick="resetForm()">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div>
            <form method="post" id="editMenuForm">
              <div class="form-group">
                <label for="menuName" class="">Name:</label>
                <input type="text" class="form-control" name="menuName">
              </div>
              <div class="form-group">
                <label for="menuPrice" class="">Price:</label>
                <input type="number" class="form-control" step="0.01" min="0" name="menuPrice">
              </div>
			  <div class="form-group">
                <label for="menuPicUrl" class="">Category:</label>
                <input type="text" class="form-control" name="category" id="addMenuCategory">
              </div>
              <div class="form-group">
                <label for="menuPicUrl" class="">Picture URL:</label>
                <input type="text" class="form-control" name="menuPicUrl">
              </div>
            </form>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" onClick="resetForm()">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal for Delete Menu Item -->
	<div class="modal fade" id="dltMenuModal" tabindex="-1" role="dialog" aria-labelledby="dltMenuModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="dltMenuModalLabel">Delete Menu</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div> Remove Item?</div>	
				</div>
				<div class="modal-footer">
					<button type="button" name="deleteMenuItem" class="btn btn-danger">Comfirm</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</body>

</html>