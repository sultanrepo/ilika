<?php

error_reporting(error_reporting() & ~E_NOTICE);

include("../../DBConfig/connection.php");
date_default_timezone_set("Asia/Kolkata");  

$payment_id = $_GET['payment_id'];

// echo "Data";
// echo $payment_id;

$result = mysqli_query($conn, "UPDATE `deposit` SET `status`='Approved' WHERE id='$payment_id'");

if( $result ) {
    header("location: ../../paymentApprovalList.php?updateStatus=approved");
} else {
    header("location: ../../paymentApprovalList.php?updateStatus=unapproved");
}


?>