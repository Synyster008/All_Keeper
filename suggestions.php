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
   <title>Suggestions - Housekeeper Admin Dashboard</title>
   <?php require("meta.php"); ?>
</head>

<body class="g-sidenav-show bg-gray-200">
   <!-- Side Navigation -->
   <?php require("allotsidenav.php"); ?>
   <!-- Main content -->
   <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

      <!-- Navbar -->
      <nav
         class="navbar navbar-main navbar-expand-lg px-0 mx-4  my-3 shadow-none border-radius-xl bg-gradient-dark ps bg-white"
         id="navbarBlur" navbar-scroll="true">
         <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
               <h6 class="font-weight-bolder mx-2 mb-0 text-white">Suggestions</h6>
            </nav>
            <?php require("allottopbar.php"); ?>
         </div>
      </nav>
      <!-- End Navbar -->
      <!-- Header -->

      <?php require("allotheader.php"); ?>

      <!-- Page content -->
      <div class="container-fluid mt-5">
         <div class="row mt-2 pb-5">
            <div class="col-xl-12 mb-5 mb-xl-0">
               <div class="card shadow">
                  <div class="card-header p-0 mb-2 position-relative mt-n4 mx-3 z-index-2">
                     <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h4 class="text-white text-capitalize ps-4">Suggestions Record</h4>
                     </div>
                  </div>
                  <div class="table-responsive p-0">
                     <table class="table align-items-center mb-0">
                        <thead>
                           <tr>
                              <th scope="col" class="text-secondary text-xs font-weight-bolder opacity-7 text-center">
                                 Housekeeper</th>
                              <th scope="col" class="text-secondary text-xs font-weight-bolder opacity-7 text-center">
                                 Room</th>
                              <th scope="col" class="text-secondary text-xs font-weight-bolder opacity-7 text-center">
                                 Date</th>
                              <th colspan="3" class="text-secondary text-xs font-weight-bolder opacity-7 text-center">
                                 Suggestions</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php 
$info = getSuggestions($_SESSION['username'],$db);
if(mysqli_num_rows($info) > 0){
  while ($row = mysqli_fetch_assoc($info)) {

?>
                           <tr>
                              <th scope="row" class="text-center">
                                 <?php 
  $numstars = $row['rating'];
  $str="";
  for ($i=0; $i < $numstars; $i++) { 
    if($i==0)
      $str .= "<i class='fas fa-star fa-xs' style='color:#f1c40f'></i>";
    else
      $str .= "<i class='ml-1 fas fa-star fa-xs' style='color:#f1c40f'></i>";
  }
  echo $row['name'] ."<br>". $str;
?>
                              </th>
                              <td class="text-center">
                                 <?php
  echo strtoupper($row['room']);
?>
                              </td>
                              <td class="text-center">
                                 <?php
 echo $row['date'];
?>
                              </td>
                              <td colspan="3" style="height: 80px; overflow-y:auto" class="text-center">
                                 <?php
echo $row['suggestion'];
?>
                              </td>
                           </tr>
                           <?php
  }}
?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </main>

   <?php require("footer.php"); ?>
</body>

</html>
