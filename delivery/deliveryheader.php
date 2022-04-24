<?php 
  if (!isset($_SESSION['delivery'])) {
  	header("Location: dlogin.php");
  }
  if (isset($_GET['logout'])) {
    unset($_SESSION['delivery']);
    session_destroy();
    mysqli_close($db);
  	header("Location: dlogin.php");
  }
  require("../db.php");
  require('deliveryfunctions.php');
  $completedDeliveryCount = getCompletedDeliveryCount($_SESSION['delivery'], $db);
  $pendingdeliveryCount = getPendingDeliveryCount($_SESSION['delivery'], $db);
  $schedule = getSchedule($_SESSION['delivery'], $db);
?>
<div class="header-body">
  <!-- Card stats -->
  <div class="row">
    <div class="col-lg-4 col-md-6">
      <div class="card card-stats mb-4 mb-xl-0">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h5 class="card-title text-uppercase text-muted mb-0">Completed Delivery</h5>
              <span class="h2 font-weight-bold mb-0">
                   <?php echo $completedDeliveryCount['delivery_completed']; ?>
                </span>
            </div>
            <div class="col-auto">
              <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                <i class="fas fa-chart-bar"></i>
              </div>
            </div>
          </div>
          <p class="mt-3 mb-0 text-muted text-sm">
              
            <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> <?php echo $completedDeliveryCount['delivery_completed']; ?></span>
            <span class="text-nowrap">Since last week</span>
          </p>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6">
      <div class="card card-stats mb-4 mb-xl-0">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h5 class="card-title text-uppercase text-muted mb-0">Pending Delivery Count</h5>
              <span class="h2 font-weight-bold mb-0"><?php echo $pendingdeliveryCount['count(*)']; ?></span>
            </div>
            <div class="col-auto">
              <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                <i class="far fa-file-alt"></i>
              </div>
            </div>
          </div>
          <p class="mt-3 mb-0 text-muted text-sm">
            <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> <?php echo $pendingdeliveryCount['count(*)']; ?></span>
            <span class="text-nowrap">Since last week</span>
          </p>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-6">
      <div class="card card-stats mb-4 mb-xl-0">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h5 class="card-title text-uppercase text-muted mb-0">Schedule</h5>
              <span class="h2 font-weight-bold mb-0"><?php if ($schedule['schedule']==1){echo "6am to 2pm";} 
              elseif($schedule['schedule']==2){echo "2pm to 10pm";} elseif ($schedule['schedule']==3){echo "10pm to 6am";} ?></span>
            </div>
            <div class="col-auto">
              <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                <i class="fas fa-chart-pie"></i>
              </div>
            </div>
          </div>
          <p class="mt-3 mb-0 text-muted text-sm">
            <span class="text-danger mr-2"><i class="fas fa-arrow-up"></i> <?php echo $schedule['startDate']; ?></span>
            <span class="text-nowrap">Since last month</span>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>