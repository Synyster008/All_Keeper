<?php 
  if (!isset($_SESSION['username'])) {
  	header("Location: alogin.php");
  }
  if (isset($_GET['logout'])) {
    unset($_SESSION['username']);
    session_destroy();
  	header("Location: alogin.php");
  }
?>
<ul class="navbar-nav  justify-content-end">
   <li class="nav-item d-flex align-items-center">
      <a href="" class="nav-link text-body font-weight-bold px-0">
         <i class="fa fa-user me-sm-1 text-white"></i>
         <span class="d-sm-inline text-white"><?php echo $_SESSION['username']; ?></span>
      </a>
   </li>

   <li class="nav-item px-3 d-flex align-items-center">
      <a href="allot.php?logout='1'" class="nav-link text-body p-0">
         <i class="fa fa-sign-out  fixed-plugin-button-nav cursor-pointer text-white"></i>
      </a>
   </li>

   <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
      <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
         <div class="sidenav-toggler-inner">
            <i class="sidenav-toggler-line"></i>
            <i class="sidenav-toggler-line"></i>
            <i class="sidenav-toggler-line"></i>
         </div>
      </a>
   </li>

</ul>
