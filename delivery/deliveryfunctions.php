<?php
  // Get Delivery Row - Its Information
  function getDelivery($id, $db){
    $query_find_delivery = "select * from deliveryguy where deliveryguy_id='$id'";
    $result_find_delivery = mysqli_query($db,$query_find_delivery);
    if (mysqli_num_rows($result_find_delivery) == 1) {
      $delivery = mysqli_fetch_assoc($result_find_delivery);
    }
    return $delivery;
  }

  // Get Number Of  Completed Requests for a Particular Student
  function getCompletedDeliveryCount($id, $db){
    $query_completed_delivery_count = "Select delivery_completed from deliveryguy where deliveryguy_id='$id'";
    $result_completed_delivery_count = mysqli_query($db, $query_completed_delivery_count);
    if (mysqli_num_rows($result_completed_delivery_count) == 1) {
      $countRow = mysqli_fetch_assoc($result_completed_delivery_count);
    }
    return $countRow;
  }

  // Get Number Of Complaints for a Particular Student
  function getPendingDeliveryCount($id, $db){
    $query_pending_delivery_count = "Select count(*) from storerequest where req_status = 1 and deliveryguy_id='$id'";
    $result_pending_delivery_count = mysqli_query($db, $query_pending_delivery_count);
    if (mysqli_num_rows($result_pending_delivery_count) == 1) {
      $countRow = mysqli_fetch_assoc($result_pending_delivery_count);
    }
    return $countRow;
  }

  // Get Number Of Suggestions for a Particular Student
  function getSchedule($id, $db){
    $query_suggestion_count = "Select startDate, schedule from deliveryguy where deliveryguy_id='$id'";
    $result_suggestion_count = mysqli_query($db, $query_suggestion_count);
    if (mysqli_num_rows($result_suggestion_count) == 1) {
      $countRow = mysqli_fetch_assoc($result_suggestion_count);
    }
    return $countRow; 
  }

  // Get Number Of Request, Delivery & Feedback Info
  function getRequests($id, $db){
    $query_request = "Select sr.storerequest_id, dg.deliveryguy_id,sr.req_status,s.room ,sr.reqdate, sr.requesttime, s.rollnumber, sr.rollnumber from storerequest sr Left Join deliveryguy dg on sr.deliveryguy_id=dg.deliveryguy_id Left Join student s on sr.rollnumber = s.rollnumber where sr.deliveryguy_id='$id' and sr.req_status = 1";
    $result_request = mysqli_query($db, $query_request);
    return $result_request;
  }


?>
