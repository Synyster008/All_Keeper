<?php
  session_start();
  require("../db.php");
    // ================== Store Request Handler - Delivery =================== //
    if(isset($_POST['allotdelSubmit']) && isset($_SESSION['storekeeper_username'])){
      $reqId = mysqli_real_escape_string($db, $_POST['allotId']);
      $deliveryguyId = mysqli_real_escape_string($db, $_POST['deliveryguyId']);
  
      $allot_query = "Update storerequest set deliveryguy_id = '$deliveryguyId', req_status=1 where storerequest_id = '$reqId'";
      $allot_result = mysqli_query($db,$allot_query);
      if ($allot_result) {
        $_SESSION['deliveryguy_alloted'] = "Delivery Guy successfully alloted";
      }else {
        $_SESSION['allotment_failed'] = "Failed to allot delivery guy, contact site management.";
      }
      header("Location: storekeeperallot.php");
    }

    // ================== Store Request Handler - Pickup =================== //
    if(isset($_POST['deliver']) && isset($_SESSION['storekeeper_username'])){
      $reqId = mysqli_real_escape_string($db, $_POST['allotId']);
  
      $allot_query = "Update storerequest set req_status=2 where storerequest_id = '$reqId'";
      $allot_result = mysqli_query($db,$allot_query);
      if ($allot_result) {
        $_SESSION['delivered'] = "Delivered";
      }else {
        $_SESSION['deliver_failed'] = "Failed to deliver.";
      }
      header("Location: storekeeperallot.php");
    }


    // ================== Delivery Guy Registration =================== //
    if(isset($_POST['regdeliveryguySubmit']) && isset($_SESSION['storekeeper_username'])){
        $name = mysqli_real_escape_string($db, $_POST['regName']);
        // $floornumber = mysqli_real_escape_string($db, $_POST['regFloor']);
        $startDate=mysqli_real_escape_string($db, $_POST['startDate']);
        $endDate=mysqli_real_escape_string($db, $_POST['endDate']);
        $schedule=mysqli_real_escape_string($db, $_POST['schedule']);
        // $hostel_name = mysqli_real_escape_string($db, $_POST['regFloor']);
        $password='qwerty';
  
        $startdate = date('Y-m-d', strtotime($startDate));
        $enddate = date('Y-m-d', strtotime($endDate));
        
        $name = strtolower($name);
  
        $reg_query = "Insert into deliveryguy (name,startDate,endDate,schedule,password) values ('$name','$startdate','$enddate','$schedule','$password')";
        $reg_result = mysqli_query($db, $reg_query);
        if($reg_result){
          $_SESSION['deliveryguy_registered'] = 'New Delivery Guy Registered.';
        } else{
          $_SESSION['deliveryguy_registered'] = 'Registration Failed!';
        }
        header("Location: registerdeliveryguy.php");
      }




?>