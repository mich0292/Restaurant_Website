<nav class="navbar navbar-toggleable-sm navbar-expand-lg navbar-inverse">
    <div class="container-fluid py-0 justify-content-between">
        <a class="navbar-brand" href="home.html">
            <img class="img-fluid pr-3 pb-1 d-none d-lg-inline" src="images/home/logo2.png" alt="sushi-sama-logo" /><span class="px-2">Sushi Sama </span>
        </a>
        <button class="navbar-toggler btn" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item active px-2 mt-1">
                    <a class="nav-link" href="home.html">Home</a>
                </li>
                <li class="nav-item px-2 mt-1">
                    <a class="nav-link" href="menu.html">Menu</a>
                </li>
                <li class="nav-item px-2 mt-1">
                    <a class="nav-link" href="order.html">Order</a>
                </li>
                <li class="nav-item px-2 mt-1">
                    <a class="nav-link" href="career.html">Career</a>
                </li>
                <li class="nav-item px-2 mt-1">
                    <a class="nav-link" href="profile.html">Profile</a>
                </li>
                <li class="nav-item px-2 mt-1 d-lg-none">
                    <a class="nav-link" data-toggle="modal" data-target="#loginModal">Login	</a>
                </li>
                <li class="nav-item pl-2 d-none d-lg-block">
                    <?php
                        if(isset($_SESSION['userId'])){
                        echo '<form action="includes/logout.inc.php" method="post">
                                <button type="submit" name="logout-submit" class="btn btn-outline-white btn-outline">Logout
                                </button>
                            <form>';
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