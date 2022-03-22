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
<aside
   class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark"
   id="sidenav-main">
   <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
         aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="" target="_blank">
         <i class="fas fa-box-tissue  text-white"></i>
         <span class="ms-1 font-weight-bold text-white d-inline ">HouseKeeping</span>
      </a>
   </div>
   <hr class="horizontal light mt-0 mb-2">
   <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
         <li class="nav-item">
            <a class="nav-link text-white" href="allot.php">
               <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="ni ni-tv-2"></i>
               </div>
               <span class="nav-link-text ms-1">Dashboard</span>
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link text-white " href="allotworker.php">
               <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="ni ni-send"></i>
               </div>
               <span class="nav-link-text ms-1">Allot</span>
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link text-white " href="complaints.php">
               <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="ni ni-archive-2"></i>
               </div>
               <span class="nav-link-text ms-1">Complaints</span>
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link text-white " href="suggestions.php">
               <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="ni ni-bulb-61"></i>
               </div>
               <span class="nav-link-text ms-1">Suggestions</span>
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link text-white " href="registerstudent.php">
               <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="ni ni-single-02"></i>
               </div>
               <span class="nav-link-text ms-1">Register Student</span>
            </a>
         </li>
         <li class="nav-item">
            <a class="nav-link text-white " href="registerworker.php">
               <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="ni ni-badge"></i>
               </div>
               <span class="nav-link-text ms-1">Register Housekeeper</span>
            </a>
         </li>

      </ul>
   </div>
   <div class="sidenav-footer position-absolute w-100 bottom-0 ">
      <div class="mx-3">
         <a class="btn bg-gradient-primary mt-4 w-100" href="allot.php?logout='1'" type="button"> <i
               class="fa fa-sign-out"></i> Logout</a>
      </div>
   </div>
</aside>
