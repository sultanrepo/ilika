<?php

error_reporting(error_reporting() & ~E_NOTICE);

include("../../DBConfig/connection.php");
include("../../session/sessionTrack.php");

$user_id = $_SESSION['user_id'];

$name = $_POST['Name'];
$currAddress = $conn -> real_escape_string($_POST['currAddress']);
$parmAddress = $conn -> real_escape_string($_POST['parmAddress']);
$profession  = $conn -> real_escape_string($_POST['prof']);
$mariStat    = $conn -> real_escape_string($_POST['mariStat']);
$aboutYou    = $conn -> real_escape_string($_POST['aboutYou']);

date_default_timezone_set("Asia/Kolkata");   //India time (GMT+5:30)
$dateTime = date("Y-m-d H:i:s");

$result = mysqli_query($conn, "UPDATE `user_details` SET `user_name`='$name',`user_curr_address`='$currAddress',
`user_parm_address`='$parmAddress',`user_profession`='$profession',`user_marital_status`='$mariStat',
`updated_at`='$dateTime',`desc`='$aboutYou' WHERE user_id='$user_id'");

if ( $result ) {
    echo "success";
} else {
    echo "error";
}



?>