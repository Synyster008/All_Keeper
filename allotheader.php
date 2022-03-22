<?php 
  if (!isset($_SESSION['username'])) {
  	header("Location: alogin.php");
  }
  if (isset($_GET['logout'])) {
    unset($_SESSION['username']);
    session_destroy();
    mysqli_close($db);
  	header("Location: alogin.php");
  }
  require("db.php");
  require("allotfunctions.php");

  $complaintcount = getComplantCount($db);
  $requestcount = getRequestCount($db);
  $suggestioncount = getSuggestionCount($db);
?>
<div class="container-fluid py-4">
   <div class="row">
      <div class="col-xl-3 col-sm-6">
         <div class="card  d-none d-md-block">
            <div class="card-header p-3 pt-2">
               <div
                  class="icon icon-lg icon-shape end-5 bg-gradient-success shadow-success text-center border-radius-2xl mt-n4 position-absolute">
                  <i class="material-icons opacity-10">person</i>
               </div>
               <div class="text-start pt-1">
                  <p class="text-sm mb-0 text-capitalize">Hi</p>
                  <h4 class="mb-0"><?php echo $_SESSION['username']; ?></h4>
               </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
               <p class="mb-0">You are in the <strong>Admin panel</strong> </p>
            </div>
         </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
         <div class="card">
            <div class="card-header p-3 pt-2">
               <div
                  class="icon icon-lg icon-shape end-5 bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                  <i class="fas fa-chart-bar"></i>
               </div>
               <div class="text-start pt-1">
                  <p class="text-sm mb-0 text-capitalize">Clean Requests</p>
                  <h4 class="mb-0"> <?php echo $requestcount['count(*)']; ?></h4>
               </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
               <p class="mb-0"><span class="text-success text-sm font-weight-bolder"><i class="fa fa-arrow-up"></i>
                     <?php echo $requestcount['count(*)']; ?> </span> Since last week</p>
            </div>
         </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
         <div class="card">
            <div class="card-header p-3 pt-2">
               <div
                  class="icon icon-lg icon-shape end-5 bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                  <i class="far fa-file-alt"></i>
               </div>
               <div class="text-start pt-1">
                  <p class="text-sm mb-0 text-capitalize">Suggestions</p>
                  <h4 class="mb-0"> <?php echo $suggestioncount['count(*)']; ?></h4>
               </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
               <p class="mb-0"><span class="text-success text-sm font-weight-bolder"><i class="fa fa-arrow-up"></i>
                     <?php echo $suggestioncount['count(*)']; ?> </span>Since last week</p>
            </div>
         </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
         <div class="card">
            <div class="card-header p-3 pt-2">
               <div
                  class="icon icon-lg icon-shape end-5 bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                  <i class="fas fa-chart-pie"></i>
               </div>
               <div class="text-start pt-1">
                  <p class="text-sm mb-0 text-capitalize">Complaints</p>
                  <h4 class="mb-0"> <?php echo $complaintcount['count(*)']; ?></h4>
               </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
               <p class="mb-0"><span class="text-success text-sm font-weight-bolder"><i class="fas fa-arrow-up"></i>
                     <?php echo $complaintcount['count(*)']; ?> </span>Since last month</p>
            </div>
         </div>
      </div>
   </div>
</div>
