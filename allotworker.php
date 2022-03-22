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
   <title>Allot Housekeeper - Housekeeper Admin Dashboard</title>
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
               <h6 class="font-weight-bolder mx-2 mb-0 text-white">Allot</h6>
            </nav>
            <?php require("allottopbar.php"); ?>
         </div>
      </nav>
      <!-- Header -->
      <div class="container-fluid">
         <!-- notification message -->
         <?php if (isset($_SESSION['admin_logged'])) : ?>
         <div class="alert alert-success alert-dismissible fade show" role="alert">
            <span class="alert-inner--icon"><i class="ni ni-like-2"></i></span>
            <span class="alert-inner--text"><strong>Welcome to online Housekeeping admin portal.</strong>
               <?php echo $_SESSION['admin_logged'];
              unset($_SESSION['admin_logged']); ?>
            </span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <?php endif ?>
      </div>
      <?php require("allotheader.php"); ?>
      <!-- Page content -->
      <div class="container-fluid mt--5 pb-6">
         <div class="row mt-2">
            <div class="col-xl-12 order-xl-1">
               <div class="card">
                  <div class="card-header pb-0">
                     <h3>Allot Housekeeper</h3>
                  </div>
                  <div class="card-body pb-5">
                     <form method="POST" autocomplete="off" action="allothandler.php">
                        <div class="pl-lg-4">
                           <div class="row">
                              <div class="col-md-3">
                                 <div class="input-group input-group-outline">
                                    <label class="form-control-label" for="input-id">Request Id: </label>
                                    <input type="text" name="allotId" id="input-id" class="form-control w-100" value="<?php if (isset($_GET['request_id'])) {
                                                                                                                echo $_GET['request_id'];
                                                                                                              } ?>">
                                 </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="input-group input-group-outline">
                                    <label class="form-control-label" for="input-room">Room Number</label>
                                    <input type="text" name="allotRoom" id="input-room" class="form-control w-100"
                                       value="<?php if (isset($_GET['room_num'])) {
                                                                                                                    echo $_GET['room_num'];
                                                                                                                  } ?>">
                                 </div>
                              </div>

                              <div class="my-3"></div>

                              <div class="col-md-3">
                                 <div class="input-group input-group-outline">
                                    <label class="form-control-label" for="input-requestid"><span
                                          class="text-danger">*</span> Housekeeper: </label>
                                    <select name="workerId" class="form-control mx-1 w-100" id="input-requestid"
                                       required>
                                       <option selected="true" value="">Select Option</option>
                                       <?php
                          // ================== Get Request-ids for feedback Handler =================== //
                          // $hostel_name = substr($_SESSION['username'], -1);
                          $workerIds_query = "Select worker_id, name, floor from housekeeper ";
                          $workerIds_result = mysqli_query($db, $workerIds_query);
                          if (mysqli_num_rows($workerIds_result) > 0) {
                            while ($row = mysqli_fetch_assoc($workerIds_result)) {
                          ?>
                                       <option value="<?php echo $row['worker_id'] ?>">
                                          <?php echo "Floor " . $row['floor'] . " - " . $row['name'] ?></option>
                                       <?php }
                          } ?>
                                    </select>
                                 </div>
                              </div>


                              <div class="col-md-3">
                                 <div class="input-group input-group-outline">
                                    <label class="form-control-label" for="input-time">Time Requested</label>
                                    <input type="text" name="allotTime" id="input-time" class="form-control w-100"
                                       disabled
                                       value="<?php if (isset($_GET['req_time'])) {
                                                                                                                    echo $_GET['req_time'];
                                                                                                                  } ?>">
                                 </div>
                              </div>
                           </div>
                           <button name="allotSubmit" class="btn btn-icon btn-3 btn-primary mt-4" type="submit">
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
      <?php require("footer.php"); ?>
</body>

</html>
