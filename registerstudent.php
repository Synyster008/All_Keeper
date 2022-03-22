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
   <title>Register Student - Housekeeper Admin Dashboard</title>
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
               <h6 class="font-weight-bolder mx-2 mb-0 text-white">Register Student</h6>
            </nav>
            <?php require("allottopbar.php"); ?>
         </div>
      </nav>
      <!-- End Navbar -->
      <!-- Header -->
      <div class="container-fluid">
         <!-- notification message -->
         <?php if (isset($_SESSION['student_registered'])) : ?>
         <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
            <?php echo $_SESSION['student_registered']; unset($_SESSION['student_registered']); ?>
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
                  <div class="card-header pb-0">
                     <h3>Register New Student</h3>
                  </div>
                  <div class="card-body pb-5">
                     <form method="POST" autocomplete="off" action="allothandler.php">
                        <div class="pl-lg-4">
                           <div class="row">
                              <div class="col-md-3">
                                 <div class="input-group input-group-outline mb-4">
                                    <label class="form-control-label mx-1" for="input-id">Roll Number <span
                                          class="text-danger">*</span></label>
                                    <input type="number" name="regRoll" id="input-id" class="form-control w-100"
                                       required placeholder="Enter numeric value">
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="input-group input-group-outline mb-4">
                                    <label class="form-control-label mx-1" for="input-room">Room Number <span
                                          class="text-danger">*</span></label>
                                    <input type="text" name="regRoom" id="input-room" class="form-control w-100"
                                       required placeholder="Ex : C202">
                                 </div>
                              </div>

                              <div class="mb-2"></div>
                              <div class="col-md-3">
                                 <div class="input-group input-group-outline mb-4">
                                    <label class="form-control-label mx-1" for="input-time">Floor <span
                                          class="text-danger">*</span></label>
                                    <input type="number" name="regFloor" id="input-time" class="form-control w-100"
                                       required placeholder="Enter single digit no.">
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="input-group input-group-outline mb-4">
                                    <label class="form-control-label mx-1" for="input-hostel">Hostel<span
                                          class="text-danger">*</span></label>
                                    <input type="number" name="regHostel" id="input-hostel" class="form-control w-100"
                                       required placeholder="Enter Hostel no.">
                                 </div>
                              </div>
                           </div>
                           <button name="regSubmit" class="btn btn-icon btn-3 btn-primary" type="submit">
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
