<?php
	session_start();
	require 'includes/admin/adminUser.inc.php';
	$stmt = readUserList();
    $userList = $stmt->fetchAll();
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

  <!-- Font Awesome -->
  <link href="fontawesome/css/all.css" rel="stylesheet">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Acme&display=swap" rel="stylesheet">

  <!-- Wong Zi Jiang -->
  <link rel="stylesheet" href="css/admin.css" />
  <title>User List</title>

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
          <li class="breadcrumb-item active" aria-current="page">User List</li>
        </ol>
      </nav>
    </div>
    <div class="row p-2 bg-white shadow-lg rounded-lg title px-3 text-left m-0">
      User List
    </div>
    <div class="row d-flex rounded text-center bg-white mt-2 table-responsive m-0">
      <table class="col table table-hover table-bordered m-0 d-none d-lg-table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">
              <div class="">ID</div>
            </th>
            <th scope="col" class="th-center">
              <div class="">Username</div>
            </th>
            <th scope="col" class="th-center">
              <div class="">Password </div>
            </th>
            <th scope="col" class="th-center">
              <div class="">Name</div>
            </th>
            <th scope="col" class="th-center">
              <div class="">Birthday</div>
            </th>
            <th scope="col" class="th-center">
              <div class="">Email</div>
            </th>
            <th scope="col" class="th-center">
              <div class="">Contact</div>
            </th>
            <th scope="col" class="th-center">
              <div class="">Staff</div>
            </th>
            <th scope="col" class="th-center">
              <div class="">Action</div>
            </th>
          </tr>
        </thead>
        <tbody>
            <?php
                foreach($userList as $user){
                    echo "<tr>";
                    echo '<th class="align-middle">';
                    echo $user[0]; //ID
                    echo "</th>";
                    echo '<td class="align-middle username">'.$user[1]."</td>"; //Username   
                    echo '<td class="align-middle password">'.$user[2]."</td>"; //Password
                    echo '<td class="align-middle name">'.$user[4]."</td>"; //Name
                    echo '<td class="align-middle birthday">'.$user[5]."</td>"; //Birthday
                    echo '<td class="align-middle email">'.$user[3]."</td>"; //Email
                    echo '<td class="align-middle contact">'.$user[6]."</td>"; //Contact
                    echo '<td class="align-middle is-staff">'.$user[7]."</td>"; //Is_Staff
                    echo '<td>
                        <form>
                        <button type="button" name="retrieveUser" class="btn btn-sm btn-primary editButton" data-toggle="modal" data-id="'.$user[0].'">
                        <i class="fa fa-edit"></i>
                        </button>
                        <button type="button" name="deleteModal" class="btn btn-sm btn-danger dltButton" data-toggle="modal" data-id="'.$user[0].'">
                        <i class="fa fa-trash"></i>
                        </button>
                        </td></form>';
                    echo "</tr>";}
            ?>
        </tbody>
      </table>
    </div>
    <div class="row justify-content-center rounded text-center bg-white mb-5 m-0 d-lg-none table-responsive">
        <?php
            foreach($userList as $user){
                echo '<table class="table table-borderless table-striped border text-left">
                <colgroup>
                  <col class="p-0 w-25">
                  <col class="p-0 w-25">
                </colgroup>
                <tr>
                  <th scope="col">ID</th>
                  <td>'.$user[0].'</td>
                </tr>
                <tr>
                  <th scope="col">Username</th>
                  <td class="username">'.$user[1].'</td>
                </tr>
                <tr>
                  <th scope="col">Password</th>
                  <td class="password">'.$user[2].'</td>
                </tr>
                <tr>
                  <th scope="col">Name</th>
                  <td class="name">'.$user[4].'</td>
                </tr>
                <tr>
                  <th scope="col"">Birthday</th>
                  <td class="birthday">'.$user[5].'</td>
                </tr>
                <tr>
                  <th scope="col">Email</th>
                  <td class="email">'.$user[3].'</td>
                </tr>
                <tr>
                  <th scope="col">Contact</th>
                  <td class="contact">'.$user[6].'</td>
                </tr>
                <tr>
                <th scope="col">Is Staff</th>
                <td class="is-staff">'.$user[7].'</td>
              </tr>
                <tr>
                  <th scope="col">Action</th>
                  <td>
                    <button type="button" class="btn btn-sm btn-primary editButton" name="retrieveUser" data-toggle="modal" data-id="'.$user[0].'"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-sm btn-danger dltButton" name="deleteUser" data-toggle="modal" data-id="'.$user[0].'"><i class="fa fa-trash"></i></button>
                  </td>
                </tr>
              </table>';
            }
        ?>
    </div>
  </div>

  <div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
                    <form id="editUserForm" method="post" action="includes/admin/adminUser.inc.php">
						<div class="form-group">
							<label for="usrlUsername">Username:</label>
							<input type="text" class="form-control" id="editUsername" name="usrlUsername" readonly>
						</div>
						<div class="form-group">
							<label for="usrlPassword">Password:</label>
							<input type="text" class="form-control" id="editPassword" name="usrlPassword" >
						</div>
						<div class="form-group">
							<label for="usrlName">Name:</label>
							<input type="text" class="form-control" id="editName" name="usrlName">
                        </div>
                        <div class="form-group">
							<label for="usrlBday">Birthday:</label>
							<input type="date" class="form-control" id="editBirthday" name="usrlBday">
                        </div>
                        <div class="form-group">
							<label for="usrlEmail">Email:</label>
							<input type="text" class="form-control" id="editEmail" name="usrlEmail">
						</div>
						<div class="form-group">
							<label for="usrlContact">Contact:</label>
							<input type="text" class="form-control" id="editContact" name="usrlContact">
						</div>
						<div class="form-group">
							<label for="usrlIsStaff">Is Staff:</label>
              <select name="usrlIsStaff" id="editIsStaff">
              <option value="1">Yes</option>
              <option value="0">No</option>
              </select>
						</div>
							<button type="submit" name="closeButton" class="btn btn-secondary" >Close</button>
							<button type="submit" name="editUser" class="btn btn-primary" >Save changes</button>
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
    <script>
        $(document).on('click','.editButton',function(){
            var row = $(this).closest('tr');
            var mobileRow = $(this).closest('table');
            var name = row.find('.name').text();
            var username = row.find('.username').text();
            var password = row.find('.password').text();
            var birthday = row.find('.birthday').text();
            var email = row.find('.email').text();
            var contact = row.find('.contact').text();
            var is_staff = row.find('.is-staff').text();
            if(!name){
              name = mobileRow.find('.name').text();
              username = mobileRow.find('.username').text();
              password = mobileRow.find('.password').text();
              birthday = mobileRow.find('.birthday').text();
              email = mobileRow.find('.email').text();
              contact = mobileRow.find('.contact').text();
              is_staff = mobileRow.find('.is-staff').text();
            }
            $('#editUserModal').find('#editName').val(name);
            $('#editUserModal').find('#editUsername').val(username);
            $('#editUserModal').find('#editPassword').val(password);
            $('#editUserModal').find('#editBirthday').val(birthday);
            $('#editUserModal').find('#editEmail').val(email);
            $('#editUserModal').find('#editContact').val(contact);
            $('#editUserModal').find('#editIsStaff').val(is_staff);
            $('#editUserModal').modal('show');
            });
            $(document).on('click','.dltButton',function(){ // Click to only happen on announce links
				$("#userID").val($(this).data('id'));
				$('#dltUserModal').modal('show');
		   });
    </script>
</body>
</html>