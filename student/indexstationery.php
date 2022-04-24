<?php require("../db.php");
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
  <link rel="stylesheet" href="../assets/css/argon.min.css">
  <link rel="stylesheet" href="../assets/css/main.min.css">
  <?php require("../meta.php"); ?>
</head>


<body>
  <!-- Side Navigation -->
  <?php require("sidenav.php"); ?>
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-background pb-6 pt-5 pt-md-6">
      <div class="container-fluid">
        <!-- notification message -->
        <?php if (isset($_SESSION['student_logged'])) : ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
            <span class="alert-inner--text"><strong>Welcome to online Stationery service.</strong>
              <?php echo $_SESSION['student_logged'];
              unset($_SESSION['student_logged']); ?>
            </span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif ?>

        <?php require("headerstats.php"); ?>
      </div>
    </div>
    <!-- Page content -->
   
    <div class="container-fluid mt--5">
      <div class="row mt-2 pb-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
          <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Stationery</h3>
                </div>
                <div class="col text-right">
                  <a href="requestStorekeeper.php" class="btn btn-sm btn-primary">Send Stationery Request</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Status</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time Requested</th>
                    <th scope="col">Mode</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $requestrow = getData($_SESSION['rollnumber'], $db);
                  if (mysqli_num_rows($requestrow) > 0) {
                    while ($row = mysqli_fetch_assoc($requestrow)) {

                  ?>
                      <tr>
                        <th scope="row">
                          <?php
                          if ($row['wid'] == NULL && $row['delivery'] == "Pickup" && $row['req_status'] != 2) {
                            echo "<span style='color:#2980b9'>Ready for Pickup</span> ";
                          }else if ($row['wid'] == NULL && $row['delivery'] == "Delivery") {
                            echo "<span style='color:#EE801A'>Not Alloted</span> ";
                          } else if ($row['wid'] != NULL && $row['req_status'] == 1) {
                            echo $row['name'] . " - <span style='color:#2980b9'>Alloted</span> - " . $row['storerequest_id'];
                          } else if ($row['wid'] != NULL && $row['req_status'] == 2) {
                            echo $row['name'] . " - <span style='color:#27ae60'>Delivered</span> - " . $row['storerequest_id'];
                          }else if ($row['wid'] == NULL && $row['delivery'] == "Pickup" && $row['req_status'] == 2) {
                            echo "<span style='color:#27ae60'>Picked up</span> ";
                          }
                          ?>
                        </th>
                        <td>
                          <?php echo $row['reqdate']; ?>
                        </td>
                        <td>
                          <?php
                          $cleaningtime = $row['requesttime'];
                          echo date('h:i a', strtotime($cleaningtime));
                          ?>
                        </td>
                        <td>
                          <?php
                          echo $row['delivery'];
                          ?>
                        </td> 
                      </tr>
                  <?php }
                  } ?>
                </tbody>
              </table>
              
            </div>
          </div>
        </div>
      </div>
  </div>



  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/argon.min.js"></script>
</body>

</html>