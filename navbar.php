<?php
	$page = $_SESSION['page'];

	if($page == "home")
		$home = "active";
	else
		$home = "";
	if($page == "menu")
		$menu = "active";
	else 
		$menu = "";
	if($page == "order")
		$order = "active";
	else
		$order = "";
	if($page == "career")
		$career = "active";
	else
		$career = "";
	if($page == "profile")
		$profile = "active";
	else
		$profile = "";
	if($page == "registration")
		$registration = "active";
	else
		$registration = "";

?>
<!DOCTYPE HTML>
<head>
	<link rel="stylesheet" href="css/nav.css">
</head>
<body>

<nav class="navbar navbar-toggleable-sm navbar-expand-lg navbar-inverse navbar-fixed-top">
    <div class="container-fluid py-0 justify-content-between">
        <a class="navbar-brand" href="home.php">
            <img class="img-fluid pr-3 pb-1 d-none d-lg-inline" src="images/home/logo2.png" alt="sushi-sama-logo" /><span class="px-2">Sushi Sama </span>
        </a>
        <button class="navbar-toggler btn" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item <?php echo $home ?> px-2 mt-1">
                    <a class="nav-link" href="home.php">Home</a>
                </li>
                <li class="nav-item <?php echo $menu ?> px-2 mt-1">
                    <a class="nav-link" href="menu.php">Menu</a>
                </li>
                <li class="nav-item <?php echo $order ?> px-2 mt-1">
                    <a class="nav-link" href="order.php">Order</a>
                </li>
                <li class="nav-item <?php echo $career ?> px-2 mt-1">
                    <a class="nav-link" href="career.php">Career</a>
                </li>
                <?php
                if(isset($_SESSION['userId'])){
                    echo '
                    <li class="nav-item '.$profile.' px-2 mt-1">
                        <a class="nav-link" href="Profile.php">Profile</a>
                    </li>';
                }
                else{
                    echo '
                    <li class="nav-item  '.$registration.' px-2 mt-1">
                        <a class="nav-link" href="Registration.php">SignUp</a>
                    </li>';
                }
                ?>
                <li class="nav-item px-2 mt-1 d-lg-none">
                    <a class="nav-link" data-toggle="modal" data-target="#loginModal">Login	</a>
                </li>
                <li class="nav-item pl-2 d-none d-lg-block">
                    <?php
                        if(isset($_SESSION['userId'])){
                        echo '<form action="includes/logout.inc.php" method="post">
                                <button type="submit" name="logout-submit" class="btn btn-outline-white btn-outline">Logout
                                </button>
                            </form>';
                        }
                        else{
                        echo '<button class="btn btn-outline-white btn-outline" data-toggle="modal"
                                data-target="#loginModal"><i class="fa fa-user"></i> Login
                            </button>';
                        }
                    ?>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
		integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
		crossorigin="anonymous"></script>
	<script>
	<!-- Reference https://stackoverflow.com/questions/23706003/changing-nav-bar-color-after-scrolling
	https://stackoverflow.com/questions/37585678/navbar-become-transparent-and-fixed-to-top-when-scroll-down -->
		$(function () {
		  $(document).scroll(function () {
			var $nav = $(".navbar-fixed-top");
			$nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
		  });
		});
</script>
</body>
</html>