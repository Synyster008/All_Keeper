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
   <title>Housekeeper Admin Dashboard</title>
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
               <h6 class="font-weight-bolder mx-2 mb-0 text-white">Dashboard</h6>
            </nav>
            <?php require("allottopbar.php"); ?>
         </div>
      </nav>
      <!-- End Navbar -->

      <!-- Header -->
      <div class="container-fluid">
         <!-- notification message -->
         <?php if (isset($_SESSION['admin_logged'])) : ?>
         <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-link text-white"><strong><i class="ni ni-like-2"></i> Welcome to online Housekeeping
                  admin portal.</strong>
               <?php echo $_SESSION['admin_logged'];
              unset($_SESSION['admin_logged']); ?>
            </span>
            <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">×</span>
            </button>
         </div>
         <?php endif ?>

         <!-- notification message -->
         <?php if (isset($_SESSION['worker_alloted'])) : ?>
         <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-link text-white"><strong><?php echo $_SESSION['worker_alloted']; ?></strong>
               <?php unset($_SESSION['worker_alloted']); ?>
            </span>
            <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">×</span>
            </button>
         </div>
         <?php endif ?>

      </div>
      <?php require("allotheader.php"); ?>
      <!-- Page content -->
      <div class="container-fluid mt--5">
         <div class="row">
            <div class="col-12">
               <div class="card my-4">
                  <div class="card-header p-0 mb-2 position-relative mt-n4 mx-3 z-index-2">
                     <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h4 class="text-white text-capitalize ps-4">Housekeeping </h4>
                     </div>
                  </div>

                  <div class="table-responsive p-0">
                     <table class="table align-items-center mb-0">
                        <thead>
                           <tr>
                              <th scope="text-uppercase"
                                 class="text-secondary text-xs font-weight-bolder opacity-7 text-center">
                                 Housekeeper</th>
                              <th scope="text-uppercase"
                                 class="text-secondary text-xs font-weight-bolder opacity-7 text-center">Room</th>
                              <th scope="text-uppercase"
                                 class="text-secondary text-xs font-weight-bolder opacity-7 text-center">Date</th>
                              <th scope="text-uppercase"
                                 class="text-secondary text-xs font-weight-bolder opacity-7 text-center">Time
                                 Requested</th>
                              <th scope="text-uppercase"
                                 class="text-secondary text-xs font-weight-bolder opacity-7 text-center">Time In
                              </th>
                              <th scope="text-uppercase"
                                 class="text-secondary text-xs font-weight-bolder opacity-7 text-center">Time Out
                              </th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                  $info = getRequests($_SESSION['username'], $db);
                  if (mysqli_num_rows($info) > 0) {
                    while ($row = mysqli_fetch_assoc($info)) {

                  ?>
                           <tr>
                              <th scope="row" class="text-center">
                                 <?php
                          if ($row['wid'] == NULL) {
                            echo "<a href='allotworker.php?request_id=" . $row['request_id'] . "&room_num=" . $row['room'] . "&req_time=" . date('h:i a', strtotime($row['cleaningtime'])) . "' class='btn btn-sm btn-primary'>Allot Housekeeper</a>";
                          } else if ($row['wid'] != NULL && $row['req_status'] == 1) {
                            echo $row['name'] . " - Alloted";
                          } else if ($row['wid'] != NULL && $row['req_status'] == 2) {
                            $numstars = $row['rating'];
                            $str = "";
                            for ($i = 0; $i < $numstars; $i++) {
                              if ($i == 0)
                                $str .= "<i class='fas fa-star fa-xs' style='color:#f1c40f'></i>";
                              else
                                $str .= "<i class='ml-1 fas fa-star fa-xs' style='color:#f1c40f'></i>";
                            }
                            echo $row['name'] . "<br>" . $str;
                          }
                          ?>
                              </th>
                              <td class="text-center">
                                 <?php
                          echo strtoupper($row['room']);
                          ?>
                              </td>
                              <td class="text-center">
                                 <?php
                          echo $row['date'];
                          ?>
                              </td>
                              <td class="text-center">
                                 <?php
                          $cleaningtime = $row['cleaningtime'];
                          echo date('h:i a', strtotime($cleaningtime));
                          ?>
                              </td>
                              <td class="text-center">
                                 <?php
                          if ($row['timein'] == NULL) {
                            echo "--";
                          } else {
                            $fdtimein = $row['timein'];
                            echo date('h:i a', strtotime($fdtimein));
                          }
                          ?>
                              </td>
                              <td class="text-center">
                                 <?php
                          if ($row['timeout'] == NULL) {
                            echo "--";
                          } else {
                            $fdtimeout = $row['timeout'];
                            echo date('h:i a', strtotime($fdtimeout));
                          }
                          ?>
                              </td>
                           </tr>
                           <?php
                    }
                  }
                  ?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </main>
   <?php require("footer.php"); ?>
</body>

</html>
