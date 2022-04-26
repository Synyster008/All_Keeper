<?php
if (!isset($_SESSION['worker'])) {
  header("Location: hlogin.php");
}
if (isset($_GET['logout'])) {
  unset($_SESSION['username']);
  session_destroy();
  header("Location: hlogin.php");
}
?>
<!-- SideNav -->
<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
  <div class="container-fluid">
    <!-- Toggler -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Brand -->
    <!-- <a class="navbar-brand pt-4" href="index.php"> -->
    <a class="navbar-brand pt-4" href="">
      <h2><?php echo $_SESSION['worker']; ?></h2>
      <h2><?php
          require("../db.php");
          // ================== Get Request-ids for feedback Handler =================== //
          $id = $_SESSION['worker'];
          $reqids_query = "Select cr.request_id, f.rating from 
cleanrequest cr inner join feedback f on f.feedback_id = cr.feedback_id
where cr.req_status = 2 and cr.worker_id = '$id'";
          $reqids_result = mysqli_query($db, $reqids_query);
          if (mysqli_num_rows($reqids_result) > 0) {
            while ($row = mysqli_fetch_assoc($reqids_result)) {
              $rate_db[] = $row;
              $sum_rates[] = $row['rating'];
            }
            if (count($rate_db)) {
              $rate_times = count($rate_db);
              $sum_rates = array_sum($sum_rates);
              $rate_value = $sum_rates / $rate_times;
             

              $numstars = round($rate_value, 0);
              $str = "";
              for ($i = 0; $i < $numstars; $i++) {
                if ($i == 0)
                  $str .= "<i class='fas fa-star fa-xs' style='color:#f1c40f'></i>";
                else
                  $str .= "<i class='ml-1 fas fa-star fa-xs' style='color:#f1c40f'></i>";
              }
              echo $str;
            } else {
              $rate_times = 0;
              $rate_value = 0;
            }
          }
          ?></h2>

    </a>
    <!-- User -->
    <ul class="nav align-items-center d-md-none">
      <li class="nav-item dropdown">
        <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <div class="media align-items-center">
            <span class="avatar avatar-sm rounded-circle">
              M
            </span>
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
          <div class=" dropdown-header noti-title">
            <h6 class="text-overflow m-0">Housekeeper service</h6>
          </div>
          <a href="allot.php?logout='1'" class="dropdown-item">
            <i class="ni ni-user-run"></i>
            <span>Logout</span>
          </a>
        </div>
      </li>
    </ul>
    <!-- Collapse -->
    <div class="collapse navbar-collapse" id="sidenav-collapse-main">
      <!-- Collapse header -->
      <div class="navbar-collapse-header d-md-none">
        <div class="row">
          <div class="col-6 collapse-brand">
            <a href="index.php">
              <h3>Housekeeper</h3>
            </a>
          </div>
          <div class="col-6 collapse-close">
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
              <span></span>
              <span></span>
            </button>
          </div>
        </div>
      </div>
      <!-- Navigation -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="work.php">
            <i class="ni ni-tv-2"></i>Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="work.php">
            <i class="ni ni-send"></i>Update Request
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="work.php?logout='1'">
            <i class="ni ni-user-run"></i> Logout
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>