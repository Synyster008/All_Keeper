<?php
  session_start();
  require("db.php");

// ================== Feedback Handler =================== //
if(isset($_POST['requestSubmit'])  && isset($_SESSION['worker']) ){

    $workerid = $_SESSION['worker'];
    $updatereqid = mysqli_real_escape_string($db, $_POST['updateReqid']);
    //$feedrating = mysqli_real_escape_string($db, $_POST['feedRating']);
    $requesttimein = mysqli_real_escape_string($db, $_POST['requestTimein']);
    $requesttimeout = mysqli_real_escape_string($db, $_POST['requestTimeout']);
    $requestreport = mysqli_real_escape_string($db, $_POST['requestReport']);
    //$feedcomplaints = mysqli_real_escape_string($db, $_POST['feedComplaints']);

    $request_query = "INSERT into report(request_id, timein, timeout, worker_id) values ('$updatereqid','$requesttimein','$requesttimeout','$workerid')";

    // Submit Feedback
    $request_result = mysqli_query($db, $request_query);

    // Increment Rooms Cleaned and req status
    $workerid = mysqli_query($db, "SELECT worker_id from cleanrequest where request_id='$updatereqid'");
    $workerid2 = mysqli_fetch_assoc($workerid);
    $workerid3 = $workerid2['worker_id'];
    mysqli_query($db, "Update housekeeper set rooms_cleaned = rooms_cleaned + 1 where worker_id = '$workerid3'");
    mysqli_query($db, "Update cleanrequest set req_status = 2 where request_id = '$feedreqid'");

    if ($request_result) {
      $_SESSION['update'] = "Report is sent for request id - ".$updatereqid;
    }

    $reportid = mysqli_query($db, "SELECT report_id from feedback where request_id='$updatereqid'");
    $reportid2 = mysqli_fetch_assoc($reportid);
    $reportid3 = $reportid2['report_id'];

    if($feedsuggestion != ""){
      $report_query = "INSERT into report(report_id, worker_id, report) values ('$reportid3', '$workerid', '$requestreport')";
      $report_result = mysqli_query($db, $report_query);
    }

    // if($feedcomplaints != ""){
    //   $complaint_query = "INSERT into complaints(feedback_id,rollnumber,complaint) values ('$feedid3','$rollnumber','$feedcomplaints')";
    //   $complaint_result = mysqli_query($db, $complaint_query);
      
    //   mysqli_query($db, "Update housekeeper set complaints = complaints + 1 where worker_id = '$workerid3'");
    // }
    header("Location: updaterequest.php");
}

?>