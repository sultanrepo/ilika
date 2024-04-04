<?php

include("../../DBConfig/connection.php");

$project_ID = $_POST['projectID'];

$verifyprojectIDQuery = "SELECT * FROM `projects` WHERE project_id='$project_ID'";
$result = mysqli_query($conn, $verifyprojectIDQuery);
if (mysqli_num_rows($result) > 0) {
    echo "projectIdAvailable";
} else {
    echo "NA";
}

?>