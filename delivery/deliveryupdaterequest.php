<?php 
  session_start();
  if (!isset($_SESSION['delivery'])) {
  	header("Location: dlogin.php");
  }
  if (isset($_GET['logout'])) {
    unset($_SESSION['delivery']);
    session_destroy();
    mysqli_close($db);
  	header("Location: dlogin.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update Request - Delivery Guy Dashboard</title>
  <?php require("../meta.php"); ?>
</head>
<body>
  <!-- Side Navigation -->
  <?php require("deliverynav.php"); ?>
  <!-- Main content -->
  <div class="main-content">
      <!-- Header -->
      <div class="header bg-background pb-6 pt-5 pt-md-6">
      <div class="container-fluid">
        <!-- notification message -->
        <?php if (isset($_SESSION['update'])) : ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
            <?php echo $_SESSION['update']; unset($_SESSION['update']); ?>
          </span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif ?>
        <?php require("deliveryheader.php"); ?>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--5 pb-6">
      <div class="row mt-2">
        <div class="col-xl-12 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <h3 class="mb-0">Update Request</h3>
            </div>
            <div class="card-body pb-5">
              <form method="POST" autocomplete="off" action="deliveryhandler.php">
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-requestid">Request Id <span class="text-danger">*</span></label>
                        <select name="updateReqid" class="form-control" id="input-requestid" required>
                          <option selected="true" value="" disabled="disabled">Select Option</option>
<?php
require("../db.php");
// ================== Get Request-ids for Delivery=================== //
$id = $_SESSION['delivery'];
$reqids_query = "Select storerequest_id,name from 
storerequest sr Inner JOIN deliveryguy dg on sr.deliveryguy_id=dg.deliveryguy_id 
inner join student s on s.rollnumber = sr.rollnumber
where sr.req_status = 1 and sr.deliveryguy_id='$id'";
$reqids_result = mysqli_query($db, $reqids_query);
if(mysqli_num_rows($reqids_result) > 0){
  while ($row = mysqli_fetch_assoc($reqids_result)) {
?>                          
<option value="<?php echo $row['storerequest_id'] ?>"><?php echo $row['storerequest_id'] . " - " . $row['name'] ?></option>
<?php }} ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-timein">Time Delivered<span class="text-danger">*</span></label>
                        <input name="requestTimein" type="time" id="input-timein" class="form-control form-control-alternative" required>
                      </div>
                    </div>
                    
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-suggestions">Report</label>
                        <textarea name="requestReport" class="form-control form-control-alternative" id="input-report" rows="3" placeholder="What services did you provide?" required></textarea>
                      </div>
                    </div>

                  </div>
                  <button name="requestSubmit" class="btn btn-icon btn-3 btn-primary" type="submit">
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

  
  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap-datepicker.min.js"></script>
  <script src="assets/js/argon.min.js"></script>
</body>
</html>
