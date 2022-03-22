<?php 
  if (!isset($_SESSION['rollnumber'])) {
  	header("Location: login.php");
  }
  if (isset($_GET['logout'])) {
    unset($_SESSION['rollnumber']);
    session_destroy();
    mysqli_close($db);
  	header("Location: login.php");
  }
  require("db.php");
  require('studentfunctions.php');
  $requestCount = getRequestCount($_SESSION['rollnumber'], $db);
  $complaintCount = getComplantCount($_SESSION['rollnumber'], $db);
  $suggestionCount = getSuggestionCount($_SESSION['rollnumber'], $db);
  $student = getStudent($_SESSION['rollnumber'], $db); 
  ?>
<div class="container-fluid py-4">
   <div class="row">
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
         <div class="card d-md-block">
            <div class="card-header p-3 pt-2 pb-2">
               <div
                  class="icon icon-lg icon-shape top-5 end-5 d-none d-sm-block bg-gradient-success shadow-success text-center border-radius-2xl mt-n4 position-absolute">
                  <i class="material-icons opacity-10">person</i>
               </div>
               <div class="text-start pt-1">
                  <p class="text-sm mb-0 text-capitalize"><strong><i class="fa fa-user opacity-6 text-dark me-1"
                           aria-hidden="true"></i> Student panel</strong> </p>
                  <hr style="margin: 1px; width: 60%;">
                  <p class="text-sm mb-0 text-capitalize">Number: <?php echo $_SESSION['rollnumber']; ?></p>
                  <p class="text-sm mb-0 text-capitalize">Hostel: <?php echo strtoupper($student['hostel']); ?></p>
                  <p class="text-sm mb-0 text-capitalize">Floor: <?php echo strtoupper($student['floor']); ?></p>
                  <p class="text-sm mb-0 text-capitalize">Room: <?php echo strtoupper($student['room']); ?></p>

               </div>
            </div>
            <div class="card-footer p-1 mt-1">
            </div>
         </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
         <div class="card">
            <div class="card-header p-3 pt-2">
               <div
                  class="icon icon-lg icon-shape top-5 end-5 bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                  <i class="fas fa-chart-bar"></i>
               </div>
               <div class="text-start pt-1">
                  <p class="text-sm mb-0 text-capitalize">Clean Requests</p>
                  <h4 class="mb-0"> <?php echo $requestCount['count(*)']; ?></h4>
               </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
               <p class="mb-0"><span class="text-success text-sm font-weight-bolder"><i class="fa fa-arrow-up"></i>
                     <?php echo $requestCount['count(*)']; ?> </span> Since last week</p>
            </div>
         </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
         <div class="card">
            <div class="card-header p-3 pt-2">
               <div
                  class="icon icon-lg icon-shape top-5 end-5 bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                  <i class="far fa-file-alt"></i>
               </div>
               <div class="text-start pt-1">
                  <p class="text-sm mb-0 text-capitalize">Suggestions</p>
                  <h4 class="mb-0"> <?php echo $complaintCount['count(*)']; ?></h4>
               </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
               <p class="mb-0"><span class="text-success text-sm font-weight-bolder"><i class="fa fa-arrow-up"></i>
                     <?php echo $complaintCount['count(*)']; ?> </span>Since last week</p>
            </div>
         </div>
      </div>
      <div class="col-xl-3 col-sm-6">
         <div class="card">
            <div class="card-header p-3 pt-2">
               <div
                  class="icon icon-lg icon-shape top-5 end-5 bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                  <i class="fas fa-chart-pie"></i>
               </div>
               <div class="text-start pt-1">
                  <p class="text-sm mb-0 text-capitalize">Complaints</p>
                  <h4 class="mb-0"> <?php echo $suggestionCount['count(*)']; ?></h4>
               </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
               <p class="mb-0"><span class="text-success text-sm font-weight-bolder"><i class="fas fa-arrow-up"></i>
                     <?php echo $suggestionCount['count(*)']; ?> </span>Since last month</p>
            </div>
         </div>
      </div>

   </div>
</div>
