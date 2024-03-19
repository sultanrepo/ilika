<?php

include "../../DBConfig/connection.php";
$user_id = $_GET['user_id'];
$type    = $_GET['approval'];

if ( $type == "yes" ) {
    $result01 = mysqli_query($conn, "UPDATE users_login SET user_status='1' WHERE user_id='$user_id'");
    header("location: ../../membersApprovalList.php?stats=approved");
} else if ( $type == "no" ) {
    $result01 = mysqli_query($conn, "DELETE FROM `users_login` WHERE user_id='$user_id'");
    $result02 = mysqli_query($conn, "DELETE FROM `user_details` WHERE user_id='$user_id'");
    header("location: ../../membersApprovalList.php?stats=decline");
}



?>