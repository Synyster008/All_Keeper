<?php
session_start();
if (!isset($_SESSION['worker'])) {
  header("Location: hlogin.php");
}
if (isset($_GET['logout'])) {
  unset($_SESSION['worker']);
  session_destroy();
  header("Location: hlogin.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Housekeeper Dashboard</title>
  <link rel="stylesheet" href="../assets/css/argon.min.css">
  <link rel="stylesheet" href="../assets/css/main.min.css">
  <?php require("../meta.php"); ?>
</head>

<body>
  <!-- Side Navigation -->
  <?php require("worknav.php"); ?>
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-background pb-6 pt-5 pt-md-6">
      <div class="container-fluid">
        <!-- notification message -->
        <?php if (isset($_SESSION['worker_logged'])) : ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
            <span class="alert-inner--text"><strong>Welcome to online Housekeeping portal.</strong>
              <?php echo $_SESSION['worker_logged'];
              unset($_SESSION['worker_logged']); ?>
            </span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif ?>

        <?php require("workheader.php"); ?>
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
                  <h3 class="mb-0">Housekeeping</h3>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">Room</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time Requested</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $info = getRequests($_SESSION['worker'], $db);
                  if (mysqli_num_rows($info) > 0) {
                    while ($row = mysqli_fetch_assoc($info)) {

                  ?>
                      <tr>
                        <th scope="row">
                          <?php
                          if ($row['req_status'] == 1) {
                            echo "<a href='updaterequest.php?request_id=" .$row['request_id']."&room=". $row['room'] ."&date=" .$row['date'] ."&req_time=" . date('h:i a', strtotime($row['cleaningtime'])) . "' class='btn btn-sm btn-primary'>Update</a>";
                            }
                          ?>
                        </th>
                        <td>
                          <?php
                          echo ($row['room']);
                          ?>
                        </td>
                        <td>
                          <?php
                          echo $row['date'];
                          ?>
                        </td>
                        <td>
                          <?php
                          $cleaningtime = $row['cleaningtime'];
                          echo date('h:i a', strtotime($cleaningtime));
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
  </div>


  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/argon.min.js"></script>
</body>

</html>