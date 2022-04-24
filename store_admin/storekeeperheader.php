<?php
if (!isset($_SESSION['storekeeper_username'])) {
  header("Location: storekeeperlogin.php");
}
if (isset($_GET['logout'])) {
  unset($_SESSION['storekeeper_username']);
  session_destroy();
  header("Location: storekeeperlogin.php");
}
require("../db.php");
require_once("storekeeperfunctions.php");


  $pendingpickupcount = getPendingPickup($db);
  $pendingdeliverycount = getPendingDelivery($db);
  $completedrequestcount = getRequestCount($db);
?>

<div class="header-body">
  <!-- Card stats -->
  <div class="row">
    <div class="col-lg-4 col-md-6">
      <div class="card card-stats mb-4 mb-xl-0">
        <div class="card-body">
          <div class="row">
            <div class="col">
              <h5 class="card-title text-uppercase text-muted mb-0">Completed Tasks</h5>
              <span class="h2 font-weight-bold mb-0"> <?php echo $completedrequestcount['count(*)']; ?></span>
            </div>
            <div class="col-auto">
              <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                <i class="fas fa-chart-bar"></i>
              </div>
            </div>
          </div>
          <p class="mt-3 mb-0 text-muted text-sm">
            <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> <?php echo $completedrequestcount['count(*)']; ?></span>
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
              <h5 class="card-title text-uppercase text-muted mb-0">Pending Pickup</h5>
              <span class="h2 font-weight-bold mb-0"> <?php echo $pendingpickupcount['count(*)']; ?></span>
            </div>
            <div class="col-auto">
              <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                <i class="far fa-file-alt"></i>
              </div>
            </div>
          </div>
          <p class="mt-3 mb-0 text-muted text-sm">
            <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> <?php echo $pendingpickupcount['count(*)']; ?></span>
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
              <h5 class="card-title text-uppercase text-muted mb-0">Pending Delivery</h5>
              <span class="h2 font-weight-bold mb-0"> <?php echo $pendingdeliverycount['count(*)']; ?></span>
            </div>
            <div class="col-auto">
              <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                <i class="fas fa-chart-pie"></i>
              </div>
            </div>
          </div>
          <p class="mt-3 mb-0 text-muted text-sm">
            <span class="text-danger mr-2"><i class="fas fa-arrow-up"></i> <?php echo $pendingdeliverycount['count(*)']; ?></span>
            <span class="text-nowrap">Since last month</span>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>