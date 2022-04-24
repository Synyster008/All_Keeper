<?php 
  if (!isset($_SESSION['storekeeper_username'])) {
  	header("Location: storekeeperlogin.php");
  }
  if (isset($_GET['logout'])) {
    unset($_SESSION['storekeeper_username']);
    session_destroy();
  	header("Location: storekeeperlogin.php");
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
      <h2><?php echo $_SESSION['storekeeper_username']; ?></h2>
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
            <h6 class="text-overflow m-0">Storekeeper service</h6>
          </div>
          <a href="storekeeperallot.php?logout='1'" class="dropdown-item">
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
              <h3>Storekeeper</h3>
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
          <a class="nav-link" href="storekeeperallot.php">
            <i class="ni ni-tv-2"></i>Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="storekeeperpickup.php">
            <i class="ni ni-send"></i>Pickup Details
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="allotdeliveryguy.php">
            <i class="ni ni-send"></i>Allot Delivery Guy
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="registerdeliveryguy.php">
            <i class="ni ni-badge"></i>Register Delivery Guy
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="storekeeperallot.php?logout='1'">
            <i class="ni ni-user-run"></i> Logout
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>