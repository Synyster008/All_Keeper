<?php require("db.php");
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
   <title>Housekeeper Student Dashboard</title>
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
               <h6 class="font-weight-bolder mx-2 mb-0 text-white">Dashboard</h6>
            </nav>
            <?php require("topbar.php"); ?>
         </div>
      </nav>
      <!-- End Navbar -->
      <!-- Header -->
      <div class="container-fluid">
         <!-- notification message -->
         <?php if (isset($_SESSION['student_logged'])) : ?>
         <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-link text-white"><i class="ni ni-like-2"></i></span>
            <span class="alert-link text-white"><strong>Welcome to online Housekeeping service.</strong>
               <?php echo $_SESSION['student_logged']; unset($_SESSION['student_logged']); ?>
            </span>
            <button type="button" class="btn-close text-lg py-3 opacity-10" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">×</span>
            </button>
         </div>
         <?php endif ?>
      </div>
      <?php require("headerstats.php"); ?>
      <!-- Page content -->
      <div class="container-fluid mt--5">
         <div class="row mt-2 pb-5">
            <div class="col-xl-12 mb-5 mb-xl-0">
               <div class="card shadow">
                  <div class="card-header border-0">
                     <div class="row align-items-center">
                        <div class="col">
                           <h3 class="mb-0">Housekeeping</h3>
                        </div>
                        <div class="col d-flex flex-row-reverse">
                           <a href="request.php" class="btn btn-sm btn-primary">Send Request</a>
                        </div>
                     </div>
                  </div>
                  <div class="table-responsive">
                     <!-- Projects table -->
                     <table class="table align-items-center">
                        <thead>
                           <tr>
                              <th scope="col" class="text-secondary font-weight-bolder opacity-7">Housekeeper</th>
                              <th scope="col" class="text-secondary font-weight-bolder opacity-7 text-center">Date</th>
                              <th scope="col" class="text-secondary font-weight-bolder opacity-7 text-center">Time
                                 Requested</th>
                              <th scope="col" class="text-secondary font-weight-bolder opacity-7 text-center">Time In
                              </th>
                              <th scope="col" class="text-secondary font-weight-bolder opacity-7 text-center">Time Out
                              </th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php 
$requestrows = getRequests($_SESSION['rollnumber'], $db);
if(mysqli_num_rows($requestrows) > 0){
  while ($row = mysqli_fetch_assoc($requestrows)) {

?>
                           <tr>
                              <th scope="row" class="px-4">
                                 <?php 
if($row['worker_id'] == NULL && $row['req_status'] == 0 ) {
  echo "<span style='color:#EE801A'>Not Alloted</span> - " .$row['reqid'];
} 
else if($row['worker_id'] != NULL && $row['req_status'] == 1 ){
  echo $row['name']." - <span style='color:#2980b9'>Alloted</span> - ".$row['reqid'];
}
else if($row['worker_id'] != NULL && $row['req_status'] == 2 ){
  echo $row['name']." - <span style='color:#27ae60'>Served</span> - ".$row['reqid'];
}
?>
                              </th>
                              <td class="text-center">
                                 <?php echo $row['date']; ?>
                              </td>
                              <td class="text-center">
                                 <?php 
                    $cleaningtime = $row['cleaningtime']; 
                    echo date('h:i a', strtotime($cleaningtime));
                    ?>
                              </td>
                              <td class="text-center">
                                 <?php 
if($row['timein'] == NULL) {
  echo "<span style='color:#EE801A'>--</span>";
} 
else if($row['timein'] != NULL){
  $timei = $row['timein']; 
  echo date('h:i a', strtotime($timei));
}
?>
                              </td>
                              <td class="text-center">
                                 <?php 
if($row['timeout'] == NULL) {
  echo "<span style='color:#EE801A'>--</span>";
} 
else if($row['timeout'] != NULL){
  $timeo = $row['timeout']; 
  echo date('h:i a', strtotime($timeo));
}
?>
                              </td>
                           </tr>
                           <?php }} ?>
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
