<?php
  session_start();
  require("../db.php");

// ================== Report Handler =================== //
if(isset($_POST['requestSubmit'])  && isset($_SESSION['worker']) ){

    $workerid = $_SESSION['worker'];
    $updatereqid = mysqli_real_escape_string($db, $_POST['updateReqid']);
    $requesttimein = mysqli_real_escape_string($db, $_POST['requestTimein']);
    $requesttimeout = mysqli_real_escape_string($db, $_POST['requestTimeout']);
    $requestreport = mysqli_real_escape_string($db, $_POST['requestReport']);

    $request_query = "INSERT into report(request_id, time_in, time_out, worker_id, report) values ('$updatereqid','$requesttimein','$requesttimeout','$workerid', '$requestreport')";

    // Submit Report
    $request_result = mysqli_query($db, $request_query);

    // Increment Rooms Cleaned and req status
    $workerid = mysqli_query($db, "SELECT worker_id from cleanrequest where request_id='$updatereqid'");
    $workerid2 = mysqli_fetch_assoc($workerid);
    $workerid3 = $workerid2['worker_id'];
    mysqli_query($db, "Update housekeeper set rooms_cleaned = rooms_cleaned + 1 where worker_id = '$workerid3'");
    mysqli_query($db, "Update cleanrequest set req_status = 2 where request_id = '$updatereqid'");

    if ($request_result) {
      $_SESSION['update'] = "Report is sent for request id - ".$updatereqid;
    }

    $reportid = mysqli_query($db, "SELECT report_id from report where request_id='$updatereqid'");
    $reportid2 = mysqli_fetch_assoc($reportid);
    $reportid3 = $reportid2['report_id'];
    $report_query = "UPDATE  cleanrequest SET report_id = '$reportid3' where request_id='$updatereqid'";
    $report_result = mysqli_query($db, $report_query);
    header("Location: updaterequest.php");
}

?>