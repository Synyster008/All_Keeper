<?php 
  session_start();
  if (!isset($_SESSION['username'])) {
  	header("Location: alogin.php");
  }
  if (isset($_GET['logout'])) {
    unset($_SESSION['username']);
    session_destroy();
  	header("Location: alogin.php");
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <title>Register HouseKeeper - Housekeeper Admin Dashboard</title>
   <?php require("meta.php"); ?>
</head>

<body class="g-sidenav-show bg-gray-200">
   <!-- Side Navigation -->
   <?php require("allotsidenav.php"); ?>
   <!-- Main content -->
   <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

      <!-- Navbar -->
      <nav
         class="navbar navbar-main navbar-expand-lg px-0 mx-4  my-3 shadow-none border-radius-xl bg-gradient-dark ps bg-white"
         id="navbarBlur" navbar-scroll="true">
         <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
               <h6 class="font-weight-bolder mx-2 mb-0 text-white">Register HouseKeeper</h6>
            </nav>
            <?php require("allottopbar.php"); ?>
         </div>
      </nav>
      <!-- End Navbar -->

      <!-- Header -->

      <div class="container-fluid">
         <!-- notification message -->
         <?php if (isset($_SESSION['worker_registered'])) : ?>
         <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-link text-white"><i class="ni ni-like-2"></i></span>
            <?php echo $_SESSION['worker_registered']; unset($_SESSION['worker_registered']); ?>
            </span>
            <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">×</span>
            </button>
         </div>
         <?php endif ?>

      </div>
      <?php require("allotheader.php"); ?>
      <!-- Page content -->
      <div class="container-fluid mt--5 pb-6">
         <div class="row mt-2">
            <div class="col-xl-12 order-xl-1">
               <div class="card">
                  <div class="card-header bg-white border-0">
                     <h3 class="mb-0">Register New Housekeeper</h3>
                  </div>
                  <div class="card-body pb-5">
                     <form method="POST" autocomplete="off" action="allothandler.php">
                        <div class="pl-lg-4">
                           <div class="row">
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label class="form-control-label" for="input-id">Name <span
                                          class="text-danger">*</span></label>
                                    <input type="text" name="regName" id="input-id"
                                       class="form-control border px-2 w-100" required placeholder="Housekeeper Name">
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label class="form-control-label" for="input-room">Floor <span
                                          class="text-danger">*</span></label>
                                    <input type="number" name="regFloor" id="input-room"
                                       class="form-control border px-2 w-100" required
                                       placeholder="Enter numeric value">
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group">
                                    <label class="form-control-label" for="input-hostel">Hostel <span
                                          class="text-danger">*</span></label>
                                    <input type="number" name="regHostel" id="input-hostel"
                                       class="form-control border px-2 w-100" required
                                       placeholder="Enter numeric value">
                                 </div>
                              </div>
                           </div>
                           <button name="regKeeperSubmit" class="btn btn-icon btn-3 btn-primary mt-3" type="submit">
                              <span class="btn-inner--text">Register</span>
                           </button>
                        </div>
                     </form>

                  </div>
               </div>
            </div>
         </div>
      </div>
      </div>
      <?php require("footer.php"); ?>
</body>

</html>
