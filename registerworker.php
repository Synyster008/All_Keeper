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
  <title>Register HouseKeeper - Housekeeper Admin Dashboard</title>
  <?php require("meta.php"); ?>
</head>

<body>
  <!-- Side Navigation -->
  <?php require("allotsidenav.php"); ?>
  <!-- Main content -->
  <div class="main-content">
    <!-- Header -->
    <div class="header bg-background pb-6 pt-5 pt-md-6">
      <div class="container-fluid">
        <!-- notification message -->
        <?php if (isset($_SESSION['worker_registered'])) : ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
            <?php echo $_SESSION['worker_registered'];
            unset($_SESSION['worker_registered']); ?>
            </span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif ?>
        <?php require("allotheader.php"); ?>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--5 pb-6">
      <div class="row mt-2">
        <div class="col-xl-12 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <h3 class="mb-0">Register New Housekeeper</h3>
            </div>
            <div class="card-body pb-5">
              <form method="POST" autocomplete="off" action="allothandler.php">
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-id">Name <span class="text-danger">*</span></label>
                        <input type="text" name="regName" id="input-id" class="form-control" required placeholder="Housekeeper Name">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-room">Floor <span class="text-danger">*</span></label>
                        <input type="number" name="regFloor" id="input-room" class="form-control" required placeholder="Enter numeric value">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="form-control-label" for="startDate">Start Date <span class="text-danger">*</span></label>
                        <div class="input-group input-group-alternative">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                          </div>
                          <input name="startDate" id="dateInput" class="form-control datepicker" placeholder="Select date" type="text" min="<?php echo date('Y-m-d'); ?>" required>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="form-control-label" for="endDate">End Date <span class="text-danger">*</span></label>
                        <div class="input-group input-group-alternative">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                          </div>
                          <input name="endDate" id="dateInput" class="form-control datepicker" placeholder="Select date" type="text" min="<?php echo date('Y-m-d'); ?>" required>
                        </div>
                      </div>
                    </div>
                    <!-- <div class="col-md-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-timein">Available Time <span class="text-danger">*</span></label>
                        <input name="reqTime" type="time" id="input-timein" class="form-control form-control-alternative" required>
                      </div>
                    </div> -->
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-requestid">Housekeeper<span class="text-danger">*</span></label>
                        <select name="schedule" class="form-control" id="input-requestid" required>
                          <option selected="true" value="" >Select Option</option>
                          <option value="1">6am to 2pm</option>
                          <option value="2">2pm to 10pm</option>
                          <option value="3">10pm to 6am</option>
                          
                        </select>
                      </div>
                    </div>
                  </div>
                  <button name="regKeeperSubmit" class="btn btn-icon btn-3 btn-primary" type="submit">
                    <span class="btn-inner--text">Register</span>
                  </button>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap-datepicker.min.js"></script>
  <script src="assets/js/argon.min.js"></script>
</body>

</html>