<?php
$_SESSION['page'] = "profile";

session_start();
require 'includes/dbh.inc.php';
$username = $_SESSION['username'];
if(!isset($_SESSION['username'])){
    header("Location: ./Registration.php");
}
$sql = "SELECT name,email,birthday,contact FROM user WHERE username='$username'";
$result = mysqli_query($conn, $sql);
if (!$result) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}
$row = mysqli_fetch_row($result);

$name = $row[0];
$email = $row[1];
$birthday = $row[2];
$contact = $row[3];

$page = "profile";
   
?>
<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Profile</title>
   <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
		
	<!-- MD for Bootstrap -->
	<link rel="stylesheet" href="mdb.min.css">
	
    <!-- Awesome Font(Icons) -->
    <link href="fontawesome/css/all.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<!-- Gordon -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="profile.css">
	
	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 
</head>
<body>
	<div class="container-fluid p-0" id="outer">
    	<!-- Nav bar -->
		<!-- In reference to https://www.codeply.com/go/QAXbNGbWPA/bootstrap-4-navbar-transparent -->
        <?php include('navbar.php'); ?>
        <!-- End of Nav Bar -->
        <div class="container my-5">
            <div class="row flex-lg-nowrap justify-content-center">
                <div class="col-12 col-lg-9 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                    <div class="text-center text-sm-left mb-2 mb-sm-0">
                                        <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">Chai Kar Sing</h4>
                                        <p class="mb-0">@karsing123</p>
                                    <div class="text-muted"><small>Last seen 21 years ago</small></div>
                                </div>
                                <div class="text-center text-sm-right">
                                    <span class="badge badge-secondary">administrator</span>
                                <div class="text-muted"><small>Joined 01 Jan 1999</small></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content pt-3">
                        <div class="tab-pane active">
                            <fieldset class="form p-2">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="form-group">
                                            <label>Full Name</label>
                                                <input class="form-control" type="text" value="<?php echo $name; ?>"  readonly>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input class="form-control" type="text" name="username" value="<?php echo $username; ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input class="form-control" type="text" value="<?php echo $email; ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Birthday</label>
                                                <input class="form-control" type="text" value="<?php echo $birthday; ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label>Contact</label>
                                                <input class="form-control" type="text" value="<?php echo $contact; ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <button class="btn btn-primary">Edit Profile</button>
                                            </div>
                                        </div>
                                    </div>
                            </fieldset>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3 mb-3">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="px-xl-3">
                    <button class="btn btn-block btn-secondary">
                        <i class="fa fa-sign-out"></i>
                        <span>Logout</span>
                    </button>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title font-weight-bold">Support</h6>
                    <p class="card-text">Get fast, free help from our friendly assistants.</p>
                    <button type="button" class="btn btn-primary">Contact Us</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Login Modal -->
<?php include('login-modal.php'); ?>
</div>
</body>
</html>