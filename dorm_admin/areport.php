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
    <title>Report - Housekeeper Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/css/argon.min.css">
  <link rel="stylesheet" href="../assets/css/main.min.css">
    <?php require("../meta.php"); ?>
</head>

<body>
    <!-- Side Navigation -->
    <?php require("allotsidenav.php"); ?>
    <!-- Main content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header bg-background pb-6 pt-5 pt-md-6">
            <div class="container-fluid">
                <?php require("allotheader.php"); ?>
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
                                    <h3 class="mb-0">Report</h3>
                                </div>
                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" value="<?php if (isset($_GET['search'])) {
                                                                                    echo $_GET['search'];
                                                                                } ?>" class="form-control" placeholder="Search data">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <!-- Projects table -->
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Housekeeper</th>
                                        <th scope="col">Room</th>
                                        <th scope="col">Date</th>
                                        <th colspan="3">Report</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require("../db.php");
                                    $getAreport = 'select fb.rating, cr.date, hk.name, s.room, r.report
                                        from report r
                                        INNER JOIN cleanrequest cr on cr.report_id= r.report_id
                                        INNER JOIN feedback fb on fb.feedback_id = cr.feedback_id
                                        INNER JOIN housekeeper hk on cr.worker_id = hk.worker_id
                                        INNER JOIN student s on  cr.rollnumber = s.rollnumber
                                        ';
                                    $result = mysqli_query($db, $getAreport);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        if (isset($_GET['search'])) {
                                            if (str_contains($row['name'], $_GET['search'])) {
                                            ?>
                                          <tr>
                                            <th scope="row">
                                              <?php
                                              $numstars = $row['rating'];
                                              $str = "";
                                              for ($i = 0; $i < $numstars; $i++) {
                                                if ($i == 0)
                                                  $str .= "<i class='fas fa-star fa-xs' style='color:#f1c40f'></i>";
                                                else
                                                  $str .= "<i class='ml-1 fas fa-star fa-xs' style='color:#f1c40f'></i>";
                                              }
                                              echo $row['name'] . "<br>" . $str;
                                              ?>
                                            </th>
                                            <td>
                                              <?php
                                              echo strtoupper($row['room']);
                                              ?>
                                            </td>
                                            <td>
                                              <?php
                                              echo $row['date'];
                                              ?>
                                            </td>
                                            <td colspan="3" style="height: 80px; overflow-y:auto">
                                              <?php
                                              echo $row['report'];
                                              ?>
                                            </td>
                                          </tr>
                                      <?php
                                      
                                    }
                                  } else {
                                        
                                      ?>
                                
                                          <tr>
                                            <th scope="row">
                                              <?php
                                              $numstars = $row['rating'];
                                              $str = "";
                                              for ($i = 0; $i < $numstars; $i++) {
                                                if ($i == 0)
                                                  $str .= "<i class='fas fa-star fa-xs' style='color:#f1c40f'></i>";
                                                else
                                                  $str .= "<i class='ml-1 fas fa-star fa-xs' style='color:#f1c40f'></i>";
                                              }
                                              echo $row['name'] . "<br>" . $str;
                                              ?>
                                            </th>
                                            <td>
                                              <?php
                                              echo strtoupper($row['room']);
                                              ?>
                                            </td>
                                            <td>
                                              <?php
                                              echo $row['date'];
                                              ?>
                                            </td>
                                            <td colspan="3" style="height: 80px; overflow-y:auto">
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


    <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/argon.min.js"></script>
</body>

</html>