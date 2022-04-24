<?php
  session_start();
  require("../db.php");

    // ================== Clean Request Handler =================== //
    if(isset($_POST['allotSubmit']) && isset($_SESSION['username'])){
      $reqId = mysqli_real_escape_string($db, $_POST['allotId']);
      $workerId = mysqli_real_escape_string($db, $_POST['workerId']);
  
      $allot_query = "Update cleanrequest set worker_id = '$workerId', req_status=1 where request_id = '$reqId'";
      $allot_result = mysqli_query($db,$allot_query);
      if ($allot_result) {
        $_SESSION['worker_alloted'] = "Housekeeper successfully alloted";
      }else {
        $_SESSION['allotment_failed'] = "Failed to allot worker, contact site management.";
      }
      header("Location: allot.php");
    }

    // ================== Store Request Handler =================== //
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

    // Student Registration
    if(isset($_POST['regSubmit']) && isset($_SESSION['username'])){
      $rollnumber = mysqli_real_escape_string($db, $_POST['regRoll']);
      $roomnumber = mysqli_real_escape_string($db, $_POST['regRoom']);
      $floornumber = mysqli_real_escape_string($db, $_POST['regFloor']);
      $hostel_name = mysqli_real_escape_string($db, $_POST['regHostel']);
      $password = 12345;
      $roomnumber = strtolower($roomnumber);

      // $hostel_name = substr($_SESSION['username'], -1);
      $select = mysqli_query($db, "SELECT * FROM student WHERE rollnumber = ".$_POST['regRoll']);
      if(mysqli_num_rows($select)==1) {
        $_SESSION['student_registered'] = 'Student is already Registered!';
        }
        header("Location: registerstudent.php");
      $reg_query = "Insert into student values ('$rollnumber', '$password', '$roomnumber', '$floornumber', '$hostel_name')";
      $reg_result = mysqli_query($db, $reg_query);
      if($reg_result){
        $_SESSION['student_registered'] = 'Student with Rollnumber '. $rollnumber .' is Registered.';
      } else{
        // $_SESSION['student_registered'] = 'Student is already Registered!';
      }
      header("Location: registerstudent.php");
    }


    // Worker Registration
    if(isset($_POST['regKeeperSubmit']) && isset($_SESSION['username'])){
      $name = mysqli_real_escape_string($db, $_POST['regName']);
      $floornumber = mysqli_real_escape_string($db, $_POST['regFloor']);
      $startDate=mysqli_real_escape_string($db, $_POST['startDate']);
      $endDate=mysqli_real_escape_string($db, $_POST['endDate']);
      $schedule=mysqli_real_escape_string($db, $_POST['schedule']);
      // $hostel_name = mysqli_real_escape_string($db, $_POST['regFloor']);
      $password='qwerty';

      $startdate = date('Y-m-d', strtotime($startDate));
      $enddate = date('Y-m-d', strtotime($endDate));
      


      $name = strtolower($name);

      $reg_query = "Insert into housekeeper (name, floor,startDate,endDate,schedule,password) values ('$name', '$floornumber','$startdate','$enddate','$schedule','$password')";
      $reg_result = mysqli_query($db, $reg_query);
      if($reg_result){
        $_SESSION['worker_registered'] = 'New Housekeeper Registered.';
      } else{
        $_SESSION['worker_registered'] = 'Registration Failed!';
      }
      header("Location: registerworker.php");
    }

    // Delivery Guy Registration
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