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
  <title>Housekeeper Report - Housekeeper Student Dashboard</title>
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
                  <h3 class="mb-0">Report Viewer</h3>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col"></th>
                    <th scope="col">Housekeeper Name</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time In</th>
                    <th scope="col">Time Out</th>
                    <th scope="col">Report</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $info = getReport($_SESSION['rollnumber'], $db);
                  if (mysqli_num_rows($info) > 0) {
                    while ($row = mysqli_fetch_assoc($info)) {

                  ?>
                      <tr>
                        <th scope="row">
                          <?php
                          $time_in = $row['time_in'];
                          $time_out = $row['time_out'];
                          if ($row['req_status'] == 2 && $row['feedback_id']== NULL) {
                            echo "<a href='feedback.php?request_id=" .$row['request_id']."&name=". $row['name'] ."&date=" .$row['date'] ."&time_in=" . date('h:i a', strtotime($time_in)). "&time_out=" . date('h:i a', strtotime($time_out))."&report" . $row['report'] . "' class='btn btn-sm btn-primary'>Rate</a>";
                            }
                            elseif ($row['req_status'] == 2 && $row['feedback_id']!= NULL) {
                              echo "<span style='color:#27ae60'>Rated</span>";
                            }
                          ?>
                        </th>
                        <td>
                          <?php
                          echo ($row['name']);
                          ?>
                        </td>
                        <td>
                          <?php
                          echo $row['date'];
                          ?>
                        </td>
                        <td>
                          <?php
                          $time_in = $row['time_in'];
                          echo date('h:i a', strtotime($time_in));
                          ?>
                        </td>
                        </td>
                        <td>
                          <?php
                          $time_out = $row['time_out'];
                          echo date('h:i a', strtotime($time_out));
                          ?>
                        </td>
                        <td>
                          <?php
                          echo $row['report'];
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
