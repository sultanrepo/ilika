<?php

include ('../DBConfig/connection.php');
print_r($_GET);
$clientid = $_GET['clientid'];
$status = $_GET['status'];
$username = $_GET['username'];

if ($status == "redirectsComplete") {
    $newCompleteCount == null;
    $getLinkDataQuery = "SELECT * FROM `projects_suppliers_link` WHERE `client_id`='$clientid' AND `status`='live'";
    $getLinkData = mysqli_query($conn, $getLinkDataQuery);
    $getLinkDataRows = mysqli_fetch_array($getLinkData);
    echo "<pre>";
    print_r($getLinkDataRows);
    $linkid = $getLinkDataRows['link_id'];
    $completeCount = $getLinkDataRows['completes'];
    if ($completeCount == null) {
        $newCompleteCount = "1";
    } else {
        $newCompleteCount = $completeCount + 1;
    }
    $ipAddress = $_SERVER['REMOTE_ADDR'];
    echo "Your IP address is: $ipAddress";

    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if (isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if (isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if (isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if (isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    echo $ipaddress;

    $updateCompleteCountQuery = "UPDATE `projects_suppliers_link` SET `completes`='$newCompleteCount' WHERE client_id='$clientid' AND status='live'";
    if ($updateResult = mysqli_query($conn, $updateCompleteCountQuery)) {
        echo "Updated..!";
        //header("location: https://localhost/ilika/redirectsComplete.php");
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else if ($status == "redirectsTerminate") {
} else if ($status == "redirectsQuotafull") {
} else if ($status == "qualityTerminate") {
}
