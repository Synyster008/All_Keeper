<?php
session_start();
if (!isset($_SESSION['storekeeper_username'])) {
  header("Location: storekeeperlogin.php");
}
if (isset($_GET['logout'])) {
  unset($_SESSION['storekeeper_username']);
  session_destroy();
  header("Location: storekeeperlogin.php");
}
require("../db.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Storekeeper Dashboard</title>
  <link rel="stylesheet" href="../assets/css/argon.min.css">
  <link rel="stylesheet" href="../assets/css/main.min.css">
  <?php require("../meta.php"); ?>
</head>

<body>
  <!-- Side Navigation -->
  <?php require("storekeepersidenav.php"); ?>
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-background pb-6 pt-5 pt-md-6">
      <div class="container-fluid">
        <!-- notification message -->
        <?php if (isset($_SESSION['storekeeper_logged'])) : ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
            <span class="alert-inner--text"><strong>Welcome to online Storekeeper admin portal.</strong>
              <?php echo $_SESSION['storekeeper_logged'];
              unset($_SESSION['storekeeper_logged']); ?>
            </span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif ?>

        <!-- notification message -->
        <?php if (isset($_SESSION['worker_alloted'])) : ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
            <span class="alert-inner--text"><strong><?php echo $_SESSION['worker_alloted']; ?></strong>
              <?php unset($_SESSION['worker_alloted']); ?>
            </span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif ?>


        <?php require_once("storekeeperheader.php") ?>
        <?php require_once("storekeeperfunctions.php") ?>
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
                  <h3 class="mb-0">Storekeeper</h3>
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
                    <th scope="col">Status</th>
                    <th scope="col">Room</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time Requested</th>
                    <th scope="col">Item Requested</th>
                    <th scope="col">Mode</th>
                   
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $info = getRequests($_SESSION['storekeeper_username'], $db);
                  if (mysqli_num_rows($info) > 0) {

                    while ($row = mysqli_fetch_assoc($info)) {
                      if (isset($_GET['search'])) {
                        if (str_contains($row['name'], $_GET['search'])) {
                        ?>
                          <tr>
                            <th scope="row">
                              <?php
                              if ($row['wid'] == NULL && $row['delivery'] == "Pickup") {
                               echo "<a href='storekeeperpickup.php?storerequest_id=" . $row['storerequest_id'] . "&room_num=" . $row['room'] . "&req_time=" . date('h:i a', strtotime($row['requesttime'])) . "' class='btn btn-sm btn-primary'>Allot Delivery Guy</a>";
                              }
                               else if ($row['wid'] == NULL && $row['delivery']=="Delivery") {
                                echo "<a href='allotdeliveryguy.php?storerequest_id=" . $row['storerequest_id'] . "&room_num=" . $row['room'] . "&req_time=" . date('h:i a', strtotime($row['requesttime'])) . "' class='btn btn-sm btn-primary'>Allot Delivery Guy</a>";
                              } else if ($row['wid'] != NULL && $row['req_status'] == 1) {
                                echo $row['name'] . " - Alloted";
                              } 
                              else if ($row['wid'] != NULL && $row['req_status'] == 2) {
                                // $numstars = $row['rating'];
                                // $str = "";
                                // for ($i = 0; $i < $numstars; $i++) {
                                //   if ($i == 0)
                                //     $str .= "<i class='fas fa-star fa-xs' style='color:#f1c40f'></i>";
                                //   else
                                //     $str .= "<i class='ml-1 fas fa-star fa-xs' style='color:#f1c40f'></i>";
                                // }
                                echo $row['name'] ." - delivered". "<br>";
                              }
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
                            <td>
                              <?php
                              $cleaningtime = $row['requesttime'];
                              echo date('h:i a', strtotime($cleaningtime));
                              ?>
                            </td>
                            
                            <td>
                              <?php
                              echo strtoupper($row['reqitems']);
                              ?>
                            </td>
                            <td>
                              <?php
                              echo strtoupper($row['reqquantity']);
                              ?>
                            </td>
                            <td>
                              <?php
                              echo strtoupper($row['delivery']);
                              ?>
                            </td>
                            
                          </tr>
                          
                        <?php
                        

                        }
                      } else {

                        ?>
                      
                          <th scope="row">
                            <?php
                           if ($row['delivery'] == "Pickup" && $row['req_status'] != 2) {
                            echo "<a href='storekeeperpickup.php?storerequest_id=" . $row['storerequest_id'] . "&req_time=" . date('h:i a', strtotime($row['requesttime'])) . "&reqpen=".$row['reqpen'][-1].  
                            "&reqpencil=".$row['reqpencil'][-1]. "&reqeraser=".$row['reqeraser'][-1]. "&reqsharpner=".$row['reqsharpner'][-1]. "&reqnotebook=".$row['reqnotebook'][-1]. "&reqpapers=".$row['reqpapers'][-1]. "&reqcalculator=".$row['reqcalculator'][-1]. "' class='btn btn-sm btn-primary'>Update</a>";
                          
                          }
                           else if ($row['wid'] == NULL && $row['delivery']=="Delivery") {
                              echo "<a href='allotdeliveryguy.php?storerequest_id=" . $row['storerequest_id'] . "&room_num=" . $row['room'] . "&req_time=" . date('h:i a', strtotime($row['requesttime'])) . "' class='btn btn-sm btn-primary'>Allot Delivery Guy</a>";
                            } 
                            else if ($row['wid'] != NULL && $row['req_status'] == 1) {
                              echo $row['name'] . " - Alloted";
                            } 
                            else if ($row['wid'] != NULL && $row['req_status'] == 2) {
                              
                              echo $row['name'] ." Delivered". "<br>";
                            }
                            else if ($row['delivery'] == "Pickup" && $row['req_status'] == 2) {
                              echo "Picked up"."<br.";
                            }
                            ?>
                          </th>
                          <td>
                            <?php
                            echo strtoupper($row['room']);
                            ?>
                          </td>
                          <td>
                            <?php
                            echo $row['reqdate'];
                            ?>
                          </td>
                          <td>
                            <?php
                            $cleaningtime = $row['requesttime'];
                            echo date('h:i a', strtotime($cleaningtime));
                            ?>
                          </td>
                          
                            <td>
                              <?php
                              echo strtoupper($row['reqpencil']." ".$row['reqpen']." ".$row['reqeraser']." ".$row['reqnotebook']." ".$row['reqsharpner']." ".$row['reqcalculator']." ".$row['reqpapers']);
                              ?>
                            </td>
                            
                            <td>
                              <?php
                              echo strtoupper($row['delivery']);
                              ?>
                            </td>
                        </tr>
                   <?php

                      }
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