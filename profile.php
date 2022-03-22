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
   <title>Student Profile - Housekeeper Student Dashboard</title>
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
               <h6 class="font-weight-bolder mx-2 mb-0 text-white">Student Profile</h6>
            </nav>
            <?php require("topbar.php"); ?>
         </div>
      </nav>
      <!-- End Navbar -->
      <!-- Header -->
      <?php 
          require("headerstats.php"); 
          $student = getStudent($_SESSION['rollnumber'], $db); 
        ?>
      <!-- Page content -->
      <div class="container-fluid mt--5">
         <div class="row mt-2">
            <div class="col-xl-12 mb-5 mb-xl-0">
               <div class="card shadow">
                  <div class="card-header border-0">
                     <div class="row align-items-center">
                        <div class="col">
                           <h3 class="mb-0">Your Profile</h3>
                        </div>
                        <div class="col  d-flex flex-row-reverse">
                           <a href="mailto:kmanadkat@gmail.com" target="_blank" class="btn btn-sm btn-primary">Request
                              Change</a>
                        </div>
                     </div>
                  </div>
                  <div class="table-responsive">
                     <!-- Projects table -->
                     <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                           <tr>
                              <th scope="col" class="text-secondary font-weight-bolder opacity-7">Roll Number</th>
                              <th scope="col" class="text-secondary font-weight-bolder opacity-7 text-center">
                                 <?php echo $student['rollnumber']; ?></th>
                           </tr>
                        </thead>
                        <tbody class="px-3">
                           <tr>
                              <th scope="row" class="px-4">Hostel</th>
                              <td class="text-center"><?php echo strtoupper($student['hostel']); ?></td>
                           </tr>
                           <tr>
                              <th scope="row" class="px-4">Floor</th>
                              <td class="text-center"><?php echo $student['floor']; ?></td>
                           </tr>
                           <tr>
                              <th scope="row" class="px-4">Room</th>
                              <td class="text-center"><?php echo strtoupper($student['room']); ?></td>
                           </tr>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </div>
      <?php require("footer.php"); ?>
</body>

</html>
