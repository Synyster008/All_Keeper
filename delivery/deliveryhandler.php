<?php
  session_start();
  require("../db.php");

// ================== Report Handler =================== //
if(isset($_POST['requestSubmit'])  && isset($_SESSION['delivery']) ){

    $deliveryid = $_SESSION['delivery'];
    $updatereqid = mysqli_real_escape_string($db, $_POST['updateReqid']);
    $requesttimein = mysqli_real_escape_string($db, $_POST['requestTimein']);
    $requestreport = mysqli_real_escape_string($db, $_POST['requestReport']);

    $request_query = "INSERT into deliveryreport(storerequest_id, time_in, deliveryguy_id, report) values ('$updatereqid','$requesttimein','$deliveryid', '$requestreport')";

    // Submit Report
    $request_result = mysqli_query($db, $request_query);

    // Increment Rooms Cleaned and req status
    $deliveryid = mysqli_query($db, "SELECT deliveryguy_id from storerequest where storerequest_id='$updatereqid'");
    $deliveryid2 = mysqli_fetch_assoc($deliveryid);
    $deliveryid3 = $deliveryid2['deliveryguy_id'];
    mysqli_query($db, "Update deliveryguy set delivery_completed = delivery_completed + 1 where deliveryguy_id = '$deliveryid3'");
    mysqli_query($db, "Update storerequest set req_status = 2 where storerequest_id = '$updatereqid'");
    header("Location: deliveryupdaterequest.php");
}

?>