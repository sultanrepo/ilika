<?php

error_reporting(error_reporting() & ~E_NOTICE);

include("../../DBConfig/connection.php");
date_default_timezone_set("Asia/Kolkata");  

$paymentID = $_POST['id'];
$result    = mysqli_query($conn, "SELECT modificationReason FROM `deposit` WHERE id='$paymentID'");
$rows      = mysqli_fetch_array($result);
$reason    = $rows['modificationReason'];
echo $reason;


?>