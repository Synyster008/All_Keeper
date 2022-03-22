<?php require("server.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Housekeeper Student Login</title>
    <?php require("meta.php"); ?>

    <style>
    .dropdown .dropdown-toggle::after,
    .dropend .dropdown-toggle::after,
    .dropstart .dropdown-toggle::after,
    .dropup .dropdown-toggle::after {
        font-size: 20px;
    }
    </style>
</head>

<body class="bg-gray-200">

    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <!-- Navbar -->
                <nav
                    class="navbar navbar-expand-lg blur border-radius-xl top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                    <div class="container-fluid ps-2 pe-0">
                        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="login.php">
                            <i class="fas fa-box-tissue " aria-hidden="true"></i>
                            HouseKeeping
                        </a>
                        <div class="dropdown mx-lg-auto">
                            <button class="btn mb-0 dropdown-toggle bg-gradient-primary w-100 rounded-pill"
                                type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa fa-user opacity-6 me-1"></i> Student login
                            </button>
                            <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton1">
                                <!-- <li><a class="dropdown-item text-left" href="login.php"> <i class="fa fa-user opacity-6 text-dark me-1"></i> Student login</a></li> -->
                                <li><a class="dropdown-item text-left" href="alogin.php"> <i
                                            class="fas fa-user-circle opacity-6 text-dark me-1"></i> Admin login</a>
                                </li>
                                <li><a class="dropdown-item text-left" href="hlogin.php"> <i
                                            class="fas fa-house-user opacity-6 text-dark me-1"></i> Housekeeper
                                        Login</a></li>
                            </ul>
                        </div>

                        <div class="collapse-sm navbar-sm-collapse" id="navigation">
                            <ul class="navbar-nav d-lg-block d-none">
                                <li class="nav-item">
                                    <a class="btn  btn-secondary  mb-0" href="https://wa.me/16478639527" target="_blank"
                                        type="button"> <i class="fas fa-headset" aria-hidden="true"></i> Support</a>
                                </li>
                            </ul>
                        </div>


                    </div>
                </nav>
                <!-- End Navbar -->
            </div>
        </div>
    </div>
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-100" style="background-image: url('./assets/img/bg.jpg');">
            <span class="mask bg-gradient-primary opacity-2"></span>
            <div class="container my-auto">
                <div class="row">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom ">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 ">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                    <h4 class="text-white font-weight-bolder text-center mt-2 mb-0"> Student login </h4>
                                    <div class="row mt-3">

                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <form action="" method="POST" autocomplete="off" class="text-start">
                                    <?php include("errors.php") ?>
                                    <div class="input-group input-group-outline my-3">
                                        <input name="studentRoll" type="number" id="rollnumber" class="form-control"
                                            required>
                                        <label class="form-label" for="rollnumber">Roll number</label>
                                    </div>
                                    <div class="input-group input-group-outline my-3">
                                        <input name="studentPass" type="password" id="password" class="form-control"
                                            required>
                                        <label class="form-label" for="password">Password</label>
                                    </div>
                                    <div class="form-check form-switch d-flex align-items-center mb-3">
                                        <input class="form-check-input" type="checkbox" id="rememberMe">
                                        <label class="form-check-label mb-0 ms-2" for="rememberMe">Remember me</label>
                                    </div>
                                    <button name="studentLogin" type="submit"
                                        class="btn bg-gradient-primary w-100 my-4 mb-2">Sign in</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer position-absolute bottom-2 py-2 w-100">
                <div class="container">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col-12 col-md-6 my-auto">
                            <div class="copyright text-center text-sm text-lg-start">
                                © 2022
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                                <li class="nav-item">
                                    <a href="pages/about-us.php" class="nav-link">About Us</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </main>

    <?php require("footer.php"); ?>
</body>

</html>