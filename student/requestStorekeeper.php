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
  <title>Stationery Request - Allkeeper Student Dashboard</title>
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
        <?php if (isset($_SESSION['req_sent'])) : ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
            <?php echo $_SESSION['req_sent'];
            unset($_SESSION['req_sent']); ?>
            </span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif ?>

        <!-- notification message -->
        <?php if (isset($_SESSION['req_failed'])) : ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['req_failed'];
            unset($_SESSION['req_failed']); ?>
            </span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif ?>

        <!-- notification message for selecting previous dates -->
        <?php if (isset($_SESSION['req_err'])) : ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['req_err'];
            unset($_SESSION['req_err']); ?>
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
    <div class="container-fluid mt--5 pb-5">
      <div class="row mt-2">
        <div class="col-xl-12 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <h3 class="mb-0">Send Stationery Request</h3>
            </div>
            <div class="card-body pb-5">
              <form autocomplete="off" method="POST" action="studenthandler.php">
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="dateInput">Date <span class="text-danger">*</span></label>
                        <div class="input-group input-group-alternative">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                          </div>
                          <input required name="reqDate" id="dateInput" class="form-control datepicker" placeholder="Select date" type="text" min="<?php echo date('Y-m-d'); ?>" />
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-timein">Available Time <span class="text-danger">*</span></label>
                        <input name="reqTime" type="time" id="input-timein" class="form-control form-control-alternative" required>
                      </div>
                    </div>

                    <div class="col-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-requestid">Stationery Items:Pen<span class="text-danger"></span></label>
                        <select name="reqpen" class="form-control" id="input-requestid">
                          <option selected="true" value="Pen-0">Select Option</option>
                          <option value="Pen-1">1</option>
                          <option value="Pen-2">2</option>
                          <option value="Pen-3">3</option>
                          <option value="Pen-4">4</option>
                          <option value="Pen-5">5</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-requestid">Stationery Items:Pencil<span class="text-danger"></span></label>
                        <select name="reqpencil" class="form-control" id="input-requestid">
                          <option selected="true" value="Pencil-0">Select Option</option>
                          <option value="Pencil-1">1</option>
                          <option value="Pencil-2">2</option>
                          <option value="Pencil-3">3</option>
                          <option value="Pencil-4">4</option>
                          <option value="Pencil-5">5</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-requestid">Stationery Items:Eraser<span class="text-danger"></span></label>
                        <select name="reqeraser" class="form-control" id="input-requestid">
                          <option selected="true" value="Eraser-0">Select Option</option>
                          <option value="Eraser-1">1</option>
                          <option value="Eraser-2">2</option>
                          <option value="Eraser-3">3</option>
                          <option value="Eraser-4">4</option>
                          <option value="Eraser-5">5</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-requestid">Stationery Items:Notebook<span class="text-danger"></span></label>
                        <select name="reqnotebook" class="form-control" id="input-requestid">
                          <option selected="true" value="Notebook-0">Select Option</option>
                          <option value="Notebook-1">1</option>
                          <option value="Notebook-2">2</option>
                          <option value="Notebook-3">3</option>
                          <option value="Notebook-4">4</option>
                          <option value="Notebook-5">5</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-requestid">Stationery Items:Sharpener<span class="text-danger"></span></label>
                        <select name="reqsharpner" class="form-control" id="input-requestid">
                          <option selected="true" value="Sharpner-0">Select Option</option>
                          <option value="Sharpner-1">1</option>
                          <option value="Sharpner-2">2</option>
                          <option value="Sharpner-3">3</option>
                          <option value="Sharpner-4">4</option>
                          <option value="Sharpner-5">5</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-requestid">Stationery Items:Calculator<span class="text-danger"></span></label>
                        <select name="reqcalculator" class="form-control" id="input-requestid">
                          <option selected="true" value="Calculator-0">Select Option</option>
                          <option value="Calculator-1">1</option>
                          <option value="Calculator-2">2</option>
                          <option value="Calculator-3">3</option>
                          <option value="Calculator-4">4</option>
                          <option value="Calculator-5">5</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-3">
                      <div class="form-group">
                        <label class="form-control-label" for="input-requestid">Stationery Items: Papers<span class="text-danger"></span></label>
                        <select name="reqpapers" class="form-control" id="input-requestid">
                          <option selected="true" value="Papers-0">Select Option</option>
                          <option value="Papers-1">1</option>
                          <option value="Papers-2">2</option>
                          <option value="Papers-3">3</option>
                          <option value="Papers-4">4</option>
                          <option value="Papers-5">5</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-requestid">Delivery Mode<span class="text-danger">*</span></label>
                        <select name="delivery" class="form-control" id="input-requestid" required>
                          <option selected="true" value="">Select Mode</option>
                          <option value="Pickup">Pickup</option>
                          <option value="Delivery">Delivery</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <button name="stationerySubmit" class="btn btn-icon btn-3 btn-primary" type="submit">Submit</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script src="http://cdnjs.cloudfare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap-datepicker.min.js"></script>
  <script>
    jQuery(document).ready(function($) {
      $('.datepicker').datepicker({
        dateFormat: 'yyyy-mm-dd'
      });
    });
  </script>
  <script type="text/javascript">
    $('#dateInput').datepicker();
  </script>
  <script src="../assets/js/argon.min.js"></script>
</body>

</html>