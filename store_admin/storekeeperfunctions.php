<?php


  // Get Number Of Request and Housekeeper 
  function getRequests($storekeeper_username, $db){
    

    $query_request = "Select sr.deliveryguy_id as wid,sr.storerequest_id ,sr.reqdate, sr.requesttime,sr.reqpencil,
    sr.reqpen,sr.reqeraser,sr.reqnotebook,sr.reqsharpner,reqcalculator,reqpapers,sr.req_status,sr.delivery, s.room ,
    dg.name from storerequest sr Inner Join student s on s.rollnumber=sr.rollnumber 
    Left Join deliveryguy dg on sr.deliveryguy_id=dg.deliveryguy_id 
    
    order by sr.reqdate desc";
    $result_request = mysqli_query($db, $query_request);
    return $result_request;
  }
  // Get Number Of Suggestions for a Particular Student
  function getRequestCount($db){
    $query_suggestion_count = "Select count(*) from storerequest  where req_status = 2";
    $result_suggestion_count = mysqli_query($db, $query_suggestion_count);
    if (mysqli_num_rows($result_suggestion_count) == 1) {
      $countRow = mysqli_fetch_assoc($result_suggestion_count);
    }
    return $countRow; 
  }

    // Get Number Of Suggestions for a Particular Student
    function getPendingPickup($db){
      $query_suggestion_count = "Select count(*) from storerequest where delivery = 'Pickup'  and req_status != 2";
      $result_suggestion_count = mysqli_query($db, $query_suggestion_count);
      if (mysqli_num_rows($result_suggestion_count) == 1) {
        $countRow = mysqli_fetch_assoc($result_suggestion_count);
      }
      return $countRow; 
    }

      // Get Number Of Suggestions for a Particular Student
  function getPendingDelivery($db){
    $query_suggestion_count = "Select count(*) from storerequest where delivery = 'Delivery'  and req_status != 2";
    $result_suggestion_count = mysqli_query($db, $query_suggestion_count);
    if (mysqli_num_rows($result_suggestion_count) == 1) {
      $countRow = mysqli_fetch_assoc($result_suggestion_count);
    }
    return $countRow; 
  }

  
    

?>