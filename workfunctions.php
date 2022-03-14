<?php
  // Get Worker Row - Its Information
  function getWorker($id, $db){
    $query_find_worker = "select * from housekeeper where worker_id='$id'";
    $result_find_worker = mysqli_query($db,$query_find_worker);
    if (mysqli_num_rows($result_find_worker) == 1) {
      $worker = mysqli_fetch_assoc($result_find_worker);
    }
    return $worker;
  }

  // Get Number Of  Completed Requests for a Particular Student
  function getCompletedRequestCount($id, $db){
    $query_completed_request_count = "Select rooms_cleaned from housekeeper where worker_id='$id'";
    $result_completed_request_count = mysqli_query($db, $query_completed_request_count);
    if (mysqli_num_rows($result_completed_request_count) == 1) {
      $countRow = mysqli_fetch_assoc($result_completed_request_count);
    }
    return $countRow;
  }

  // Get Number Of Complaints for a Particular Student
  function getPendingRequestCount($id, $db){
    $query_pending_request_count = "Select count(*) from cleanrequest where req_status = 1 and worker_id='$id'";
    $result_pending_request_count = mysqli_query($db, $query_pending_request_count);
    if (mysqli_num_rows($result_pending_request_count) == 1) {
      $countRow = mysqli_fetch_assoc($result_pending_request_count);
    }
    return $countRow;
  }

  // Get Number Of Suggestions for a Particular Student
  function getSchedule($id, $db){
    $query_suggestion_count = "Select startDate, schedule from housekeeper where worker_id='$id'";
    $result_suggestion_count = mysqli_query($db, $query_suggestion_count);
    if (mysqli_num_rows($result_suggestion_count) == 1) {
      $countRow = mysqli_fetch_assoc($result_suggestion_count);
    }
    return $countRow; 
  }

  // Get Number Of Request, Housekeeper & Feedback Info
  function getRequests($id, $db){
    $query_request = "Select cr.request_id as reqid, hk.worker_id,cr.req_status,s.room ,cr.date, cr.cleaningtime, s.rollnumber, cr.rollnumber from cleanrequest cr Left Join housekeeper hk on cr.worker_id=hk.worker_id Left Join student s on cr.rollnumber = s.rollnumber where cr.worker_id='$id' and cr.req_status = 1";
    $result_request = mysqli_query($db, $query_request);
    return $result_request;
  }


?>
