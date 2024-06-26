<?php

include ("../../DBConfig/connection.php");

$update_id = $_POST['update_id'];
$update_type = $_POST['update_type'];
$project_id = $_POST['project_id'];

$updateStatus = "";
if ($update_type == 'live') {
    $updateStatus = 'live';
    $projectSupplierStatusUpdateQuery = "UPDATE `projects_suppliers` SET `status`='$updateStatus' WHERE `s_no`='$update_id'";
    $result = mysqli_query($conn, $projectSupplierStatusUpdateQuery);
    if ($result) {
        echo "successLive";
    } else {
        echo "error";
    }
} else if ($update_type == 'paused') {
    $updateStatus = 'paused';
    $projectSupplierStatusUpdateQuery = "UPDATE `projects_suppliers` SET `status`='$updateStatus' WHERE `s_no`='$update_id'";
    $result = mysqli_query($conn, $projectSupplierStatusUpdateQuery);
    if ($result) {
        echo "successPaused";
    } else {
        echo "error";
    }
}


?>