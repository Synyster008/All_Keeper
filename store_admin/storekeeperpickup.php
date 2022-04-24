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
  <title> Pickup - Allkeeper Stationery Dashboard</title>
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
              <h3 class="mb-0">Pickup Confirmation</h3>
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
                        <label class="form-control-label" for="input-time">Time Requested</label>
                        <input type="text" name="reqTime" id="input-timein" class="form-control" disabled value="<?php if (isset($_GET['req_time'])) {
                                                                                                                    echo $_GET['req_time'];
                                                                                                                  } ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                      <label class="form-control-label" for="input-id">Stationery Items:Pen<span class="text-danger"></span></label>
                      <input type="text" name="reqpen" id="input-pen" class="form-control" disabled value="<?php if (isset($_GET['reqpen'])) {
                                                                                                                    echo $_GET['reqpen'];
                                                                                                                  } ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                      <label class="form-control-label" for="input-id">Stationery Items:Pencil<span class="text-danger"></span></label>
                      <input type="text" name="reqpencil" id="input-pencil" class="form-control" disabled value="<?php if (isset($_GET['reqpencil'])) {
                                                                                                                    echo $_GET['reqpencil'];
                                                                                                                  } ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                      <label class="form-control-label" for="input-id">Stationery Items:Eraser<span class="text-danger"></span></label>
                      <input type="text" name="reqeraser" id="input-eraser" class="form-control" disabled value="<?php if (isset($_GET['reqeraser'])) {
                                                                                                                    echo $_GET['reqeraser'];
                                                                                                                  } ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                      <label class="form-control-label" for="input-id">Stationery Items:Notebook<span class="text-danger"></span></label>
                      <input type="text" name="reqnotebook" id="input-notebook" class="form-control" disabled value="<?php if (isset($_GET['reqnotebook'])) {
                                                                                                                    echo $_GET['reqnotebook'];
                                                                                                                  } ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                      <label class="form-control-label" for="input-id">Stationery Items:Sharpener<span class="text-danger"></span></label>
                      <input type="text" name="reqsharpner" id="input-sharpner" class="form-control" disabled value="<?php if (isset($_GET['reqsharpner'])) {
                                                                                                                    echo $_GET['reqsharpner'];
                                                                                                                  } ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                      <label class="form-control-label" for="input-id">Stationery Items:Calculator<span class="text-danger"></span></label>
                      <input type="text" name="reqcalculator" id="input-calculator" class="form-control" disabled value="<?php if (isset($_GET['reqcalculator'])) {
                                                                                                                    echo $_GET['reqcalculator'];
                                                                                                                  } ?>">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                      <label class="form-control-label" for="input-id">Stationery Items:Papers<span class="text-danger"></span></label>
                      <input type="text" name="reqpapers" id="input-papers" class="form-control" disabled value="<?php if (isset($_GET['reqpapers'])) {
                                                                                                                    echo $_GET['reqpapers'];
                                                                                                                  } ?>">
                      </div>
                    </div>
                  </div>
                  <button name="deliver" class="btn btn-icon btn-3 btn-primary" type="submit">
                    <span class="btn-inner--text">Deliver</span>
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