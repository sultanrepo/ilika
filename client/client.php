<?php

include ('../DBConfig/connection.php');
print_r($_GET);
$clientid = $_GET['clientid'];
$status = $_GET['status'];
$username = $_GET['username'];

// Set the time zone to Indian time zone (Asia/Kolkata)
date_default_timezone_set('Asia/Kolkata');
// Get the current timestamp in Indian time zone
$timestamp = date('Y-m-d H:i:s');

//Get IP Address
function getIPAddress()
{
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
    return $ipaddress;
}

if ($status == "redirectsComplete") {
    $newCompleteCount == null;
    $getLinkDataQuery = "SELECT * FROM `projects_suppliers_link` WHERE `client_id`='$clientid' AND `status`='live'";
    $getLinkData = mysqli_query($conn, $getLinkDataQuery);
    $getLinkDataRows = mysqli_fetch_array($getLinkData);
    //echo "<pre>";
    //print_r($getLinkDataRows);
    $linkid = $getLinkDataRows['link_id'];
    $project_id = $getLinkDataRows['project_id'];
    $supplier_id = $getLinkDataRows['supplier_id'];
    $completeCount = $getLinkDataRows['completes'];
    if ($completeCount == null) {
        $newCompleteCount = "1";
    } else {
        $newCompleteCount = $completeCount + 1;
    }

    $ipaddress = getIPAddress();
    $updateCompleteCountQuery = "UPDATE `projects_suppliers_link` SET `completes`='$newCompleteCount',`ipAdd`='$ipaddress' WHERE client_id='$clientid' AND status='live'";
    if ($updateResult = mysqli_query($conn, $updateCompleteCountQuery)) {
        echo "Updated..!";

        $insertStatus = "INSERT INTO `projects_suppliers_link_status`
        (`lead_id`, `p_id`, `link_id`, `project_id`, `sipplier_id`, `client_id`, `status`, `ip_address`, `username`, `timestamp`) VALUES 
        ('$username','$project_id','$linkid','$project_id','$supplier_id','$clientid','redirectsComplete','$ipaddress','$username','$timestamp')";
        $insertStatusResult = mysqli_query($conn, $insertStatus);

        $updateCompleteStatus = "UPDATE `projects_suppliers_link` SET `status`='paused',`timestamp`='$timestamp' WHERE client_id='$clientid' AND status='live'";
        if ($updateStatusResult = mysqli_query($conn, $updateCompleteStatus)) {
            header("location: https://manual.ilikainsights.com/redirectsComplete.php?pid=" . $project_id . "&ipaddress=" . $ipaddress . "&username=" . $username);
        }
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else if ($status == "redirectsTerminate") {
    $newTerminateCount == null;
    $getLinkDataQuery = "SELECT * FROM `projects_suppliers_link` WHERE `client_id`='$clientid' AND `status`='live'";
    $getLinkData = mysqli_query($conn, $getLinkDataQuery);
    $getLinkDataRows = mysqli_fetch_array($getLinkData);
    echo "<pre>";
    print_r($getLinkDataRows);
    $linkid = $getLinkDataRows['link_id'];
    $project_id = $getLinkDataRows['project_id'];
    $supplier_id = $getLinkDataRows['supplier_id'];
    $terminateCount = $getLinkDataRows['terminates'];
    if ($terminateCount == null) {
        $newTerminateCount = "1";
    } else {
        $newTerminateCount = $terminateCount + 1;
    }

    $ipaddress = getIPAddress();
    $updateCompleteCountQuery = "UPDATE `projects_suppliers_link` SET `terminates`='$newTerminateCount',`ipAdd`='$ipaddress' WHERE client_id='$clientid' AND status='live'";
    if ($updateResult = mysqli_query($conn, $updateCompleteCountQuery)) {
        echo "Updated..!";

        $insertStatus = "INSERT INTO `projects_suppliers_link_status`
        (`lead_id`, `p_id`, `link_id`, `project_id`, `sipplier_id`, `client_id`, `status`, `ip_address`, `username`, `timestamp`) VALUES 
        ('$username','$project_id','$linkid','$project_id','$supplier_id','$clientid','redirectsTerminate','$ipaddress','$username','$timestamp')";
        $insertStatusResult = mysqli_query($conn, $insertStatus);

        $updateCompleteStatus = "UPDATE `projects_suppliers_link` SET `status`='paused',`timestamp`='$timestamp' WHERE client_id='$clientid' AND status='live'";
        if ($updateStatusResult = mysqli_query($conn, $updateCompleteStatus)) {
            header("location: https://manual.ilikainsights.com/redirectsTerminate.php?pid=" . $project_id . "&ipaddress=" . $ipaddress . "&username=" . $username);
        }
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else if ($status == "redirectsQuotafull") {
    $newQuotafullCount == null;
    $getLinkDataQuery = "SELECT * FROM `projects_suppliers_link` WHERE `client_id`='$clientid' AND `status`='live'";
    $getLinkData = mysqli_query($conn, $getLinkDataQuery);
    $getLinkDataRows = mysqli_fetch_array($getLinkData);
    //echo "<pre>";
    //print_r($getLinkDataRows);
    $linkid = $getLinkDataRows['link_id'];
    $project_id = $getLinkDataRows['project_id'];
    $supplier_id = $getLinkDataRows['supplier_id'];
    $quotafullCount = $getLinkDataRows['quotafull'];
    if ($quotafullCount == null) {
        $newQuotafullCount = "1";
    } else {
        $newQuotafullCount = $quotafullCount + 1;
    }

    $ipaddress = getIPAddress();
    $updateCompleteCountQuery = "UPDATE `projects_suppliers_link` SET `quotafull`='$newQuotafullCount',`ipAdd`='$ipaddress' WHERE client_id='$clientid' AND status='live'";
    if ($updateResult = mysqli_query($conn, $updateCompleteCountQuery)) {
        echo "Updated..!";

        $insertStatus = "INSERT INTO `projects_suppliers_link_status`
        (`lead_id`, `p_id`, `link_id`, `project_id`, `sipplier_id`, `client_id`, `status`, `ip_address`, `username`, `timestamp`) VALUES 
        ('$username','$project_id','$linkid','$project_id','$supplier_id','$clientid','redirectsQuotafull','$ipaddress','$username','$timestamp')";
        $insertStatusResult = mysqli_query($conn, $insertStatus);

        $updateCompleteStatus = "UPDATE `projects_suppliers_link` SET `status`='paused',`timestamp`='$timestamp' WHERE client_id='$clientid' AND status='live'";
        if ($updateStatusResult = mysqli_query($conn, $updateCompleteStatus)) {
            header("location: https://manual.ilikainsights.com/redirectsQuotafull.php?pid=" . $project_id . "&ipaddress=" . $ipaddress . "&username=" . $username);
        }
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
} else if ($status == "qualityTerminate") {
    $newQuotafullCount == null;
    $getLinkDataQuery = "SELECT * FROM `projects_suppliers_link` WHERE `client_id`='$clientid' AND `status`='live'";
    $getLinkData = mysqli_query($conn, $getLinkDataQuery);
    $getLinkDataRows = mysqli_fetch_array($getLinkData);
    //echo "<pre>";
    //print_r($getLinkDataRows);
    $linkid = $getLinkDataRows['link_id'];
    $project_id = $getLinkDataRows['project_id'];
    $supplier_id = $getLinkDataRows['supplier_id'];
    $quotafullCount = $getLinkDataRows['quotafull'];
    if ($quotafullCount == null) {
        $newQuotafullCount = "1";
    } else {
        $newQuotafullCount = $quotafullCount + 1;
    }

    $ipaddress = getIPAddress();
    $updateCompleteCountQuery = "UPDATE `projects_suppliers_link` SET `quotafull`='$newQuotafullCount',`ipAdd`='$ipaddress' WHERE client_id='$clientid' AND status='live'";
    if ($updateResult = mysqli_query($conn, $updateCompleteCountQuery)) {
        echo "Updated..!";

        $getUsernameQuery = "SELECT * FROM `projects_suppliers_link` WHERE link_id='$linkid' AND project_id='$project_id' AND supplier_id='$supplier_id'";
        $getUsername = mysqli_query($conn, $getUsernameQuery);
        $getUsernameRows = mysqli_fetch_array($getUsername);
        $usernameQuery = $getUsernameRows['username'];

        $insertStatus = "INSERT INTO `projects_suppliers_link_status`
        (`lead_id`, `p_id`, `link_id`, `project_id`, `sipplier_id`, `client_id`, `status`, `ip_address`, `username`, `timestamp`) VALUES 
        ('$username','$project_id','$linkid','$project_id','$supplier_id','$clientid','qualityTerminate','$ipaddress','$usernameQuery','$timestamp')";
        $insertStatusResult = mysqli_query($conn, $insertStatus);

        $updateCompleteStatus = "UPDATE `projects_suppliers_link` SET `status`='paused',`timestamp`='$timestamp' WHERE client_id='$clientid' AND status='live'";
        if ($updateStatusResult = mysqli_query($conn, $updateCompleteStatus)) {
            header("location: https://manual.ilikainsights.com/redirectsQualityTerminate.php?pid=" . $project_id . "&ipaddress=" . $ipaddress . "&username=" . $username);
        }
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
