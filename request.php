<?php 
  session_start();
  if (!isset($_SESSION['rollnumber'])) {
  	header("Location: login.php");
  }
  if (isset($_GET['logout'])) {
    unset($_SESSION['rollnumber']);
    session_destroy();
    mysqli_close($db);
  	header("Location: login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <title>Clean Request - Housekeeper Student Dashboard</title>
   <?php require("meta.php"); ?>
</head>

<body class="g-sidenav-show bg-gray-200">
   <!-- Side Navigation -->
   <?php require("sidenav.php"); ?>
   <!-- Main content -->
   <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
      <!-- Navbar -->
      <nav
         class="navbar navbar-main navbar-expand-lg px-0 mx-4  my-3 shadow-none border-radius-xl bg-gradient-dark ps bg-white"
         id="navbarBlur" navbar-scroll="true">
         <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
               <h6 class="font-weight-bolder mx-2 mb-0 text-white">Clean Request</h6>
            </nav>
            <?php require("topbar.php"); ?>
         </div>
      </nav>
      <!-- End Navbar -->
      <!-- Header -->
      <div class="container-fluid">
         <!-- notification message -->
         <?php if (isset($_SESSION['req_sent'])) : ?>
         <div class="alert alert-success alert-dismissible fade show alert-link text-white" role="alert">
            <span class="alert-link text-white"><i class="ni ni-like-2"></i></span>
            <?php echo $_SESSION['req_sent']; unset($_SESSION['req_sent']); ?>
            </span>
            <button type="button" class="btn-close text-lg py-3 opacity-10" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">×</span>
            </button>
         </div>
         <?php endif ?>

         <!-- notification message -->
         <?php if (isset($_SESSION['req_failed'])) : ?>
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['req_failed']; unset($_SESSION['req_failed']); ?>
            </span>
            <button type="button" class="btn-close text-lg py-3 opacity-10" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">×</span>
            </button>
         </div>
         <?php endif ?>



      </div>
      <?php require("headerstats.php"); ?>
      <!-- Page content -->
      <div class="container-fluid mt--5 pb-5">
         <div class="row mt-2">
            <div class="col-xl-12 order-xl-1">
               <div class="card shadow">
                  <div class="card-header bg-white border-0">
                     <h3 class="mb-0">Send Clean Request</h3>
                  </div>
                  <div class="card-body pb-5">
                     <form autocomplete="off" method="POST" action="studenthandler.php">
                        <div class="pl-lg-4">
                           <div class="row">
                              <div class="col-lg-6">

                                 <div class="input-group input-group-outline">
                                    <label class="form-control-label" for="dateInput">Date <span
                                          class="text-danger">*</span></label>
                                    <div class="input-group input-group-alternative">
                                       <div class="input-group-prepend">
                                          <span class="input-group-text me-2"><i
                                                class="ni ni-calendar-grid-58"></i></span>
                                       </div>
                                       <input name="reqDate" id="dateInput" class="form-control datepicker"
                                          placeholder="Select date" type="text" required>
                                    </div>
                                 </div>
                              </div>
                              <hr class="my-4">
                              <div class="col-lg-6">
                                 <div class="input-group input-group-outline">
                                    <label class="form-control-label" for="input-timein">Available Time <span
                                          class="text-danger">*</span></label>
                                    <input name="reqTime" type="time" id="input-timein"
                                       class="form-control form-control-alternative  w-100" required>
                                    <code class="text-sm p-1">EX: 10:20 AM </code>
                                 </div>
                              </div>
                           </div>
                           <button name="reqSubmit" class="btn btn-icon btn-3 btn-primary mt-4"
                              type="submit">Submit</button>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </div>
      <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
      <script src="assets/js/core/popper.min.js"></script>
      <script src="assets/js/core/bootstrap.min.js"></script>
      <script src="assets/vendor/bootstrap/dist/js/bootstrap-datepicker.min.js"></script>
      <script src="assets/js/argon.min.js"></script>
      <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
      <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
      <script>
      var win = navigator.platform.indexOf('Win') > -1;
      if (win && document.querySelector('#sidenav-scrollbar')) {
         var options = {
            damping: '0.5'
         }
         Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
      }
      </script>
      <!-- Github buttons -->
      <script async defer src="https://buttons.github.io/buttons.js"></script>
      <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
      <script src="./assets/js/material-dashboard.min.js?v=3.0.0"></script>

</body>

</html>
