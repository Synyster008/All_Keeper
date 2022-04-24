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
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Allot Delivery Guy - Storekeeper Dashboard</title>
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
            <span class="alert-inner--text"><strong>Welcome to online Storekeeper portal.</strong>
              <?php echo $_SESSION['storekeeper_logged'];
              unset($_SESSION['storekeeper_logged']); ?>
            </span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif ?>
        <?php require("storekeeperheader.php"); ?>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--5 pb-6">
      <div class="row mt-2">
        <div class="col-xl-12 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <h3 class="mb-0">Allot Delivery Guy</h3>
            </div>
            <div class="card-body pb-5">
              <form method="POST" autocomplete="off" action="storekeeperhandler.php">
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-id">Request Id</label>
                        <input type="text" name="allotId" id="input-id" class="form-control"  value="<?php if (isset($_GET['storerequest_id'])) {
                                                                                                      echo $_GET['storerequest_id'];
                                                                                                    } ?>">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-room">Room</label>
                        <input type="text" name="allotRoom" id="input-room" class="form-control" value="<?php if (isset($_GET['room_num'])) {
                                                                                                          echo $_GET['room_num'];
                                                                                                        } ?>">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-time">Time Requested</label>
                        <input type="text" name="allotTime" id="input-time" class="form-control" disabled value="<?php if (isset($_GET['req_time'])) {
                                                                                                                    echo $_GET['req_time'];
                                                                                                                  } ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-requestid">Delivery Guy<span class="text-danger">*</span></label>
                        <select name="deliveryguyId" class="form-control" id="input-requestid" required>
                          <option selected="true" value="">Select Option</option>
                          <?php
                          // ================== Get Request-ids for feedback Handler =================== //
                          
                          $workerIds_query = "Select deliveryguy_id, name, schedule from deliveryguy";
                          $workerIds_result = mysqli_query($db, $workerIds_query);
                          if (mysqli_num_rows($workerIds_result) > 0) {
                            while ($row = mysqli_fetch_assoc($workerIds_result)) {
                              if (strtotime("06:00:01") <= strtotime($_GET['req_time']) && strtotime($_GET['req_time']) <= strtotime("14:00:00") && $row['schedule'] == 1) {
                          ?>
                                <option value="<?php echo $row['deliveryguy_id'] ?>"><?php echo "- " . $row['name'] ?></option>
                              <?php } elseif (strtotime("14:00:01") <= strtotime($_GET['req_time']) && strtotime($_GET['req_time']) <= strtotime("22:00:00") && $row['schedule'] == 2) {
                              ?>
                                <option value="<?php echo $row['deliveryguy_id'] ?>"><?php echo "- " . $row['name'] ?></option>
                              <?php } elseif (strtotime("00:00:01") <= strtotime($_GET['req_time']) && strtotime($_GET['req_time']) <= strtotime("06:00:00") && $row['schedule'] == 3) {
                              ?>
                                <option value="<?php echo $row['deliveryguy_id'] ?>"><?php echo "- " . $row['name'] ?></option>
                              <?php } elseif (strtotime("22:00:01") <= strtotime($_GET['req_time']) && strtotime($_GET['req_time']) <= strtotime("24:00:00") && $row['schedule'] == 3) {
                              ?>
                                <option value="<?php echo $row['deliveryguy_id'] ?>"><?php echo "- " . $row['name'] ?></option>
                          <?php }
                            }
                          }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <button name="allotdelSubmit" class="btn btn-icon btn-3 btn-primary" type="submit">
                    <span class="btn-inner--text">Submit</span>
                  </button>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap-datepicker.min.js"></script>
  <script src="../assets/js/argon.min.js"></script>
</body>

</html>