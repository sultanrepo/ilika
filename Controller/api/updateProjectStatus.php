<?php

include("../../DBConfig/connection.php");

$projectID = $_POST['projectID'];
$status = $_POST['status'];
$updateStatus = "";
if($status == 'live') {
    $updateStatus = 'pause';
} else if($status == 'pause') {
    $updateStatus = 'live';
}
$projectStatusUpdateQuery = "UPDATE `projects` SET `status`='$updateStatus' WHERE project_id='$projectID'";
$result = mysqli_query($conn, $projectStatusUpdateQuery);
if ($result) {
    echo "updated";
} else {
    echo "error";
}

?>