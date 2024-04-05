<?php

error_reporting(error_reporting() & ~E_NOTICE);
session_start();

include("../../DBConfig/connection.php");
//include("../../session/sessionTrack.php");

$type = $_GET['type'];

if ( $type === "email" ) {
    $user_email      = trim($_POST['mob_email']);
    $user_password   = trim($_POST['password']);

    $result = mysqli_query($conn, "SELECT * FROM `users_login` WHERE user_email='$user_email'");
    if ( mysqli_num_rows($result) ) {
        $rows = mysqli_fetch_array($result);
        $user_id = $rows['user_id'];
        $user_password_db = $rows['password'];

        //Is User Status is Activated
        $result_isActive = mysqli_query($conn, "SELECT user_status FROM `users_login` WHERE user_id='$user_id'");
        $rows_isActive = mysqli_fetch_array($result_isActive);
        $isActive = $rows_isActive['user_status'];
        if ( $isActive == 0 ) {
            echo "user_not_active";
        } else {
            if (password_verify($user_password, $user_password_db )) {
            $_SESSION['user_id'] = $user_id;
            echo "success-" . $user_id;
            } else {
                echo "error";
            }
        }
    } else {
        echo "error";
    }
}

if ( $type === "mobile" ) {
    $user_email      = trim($_POST['mob_email']);
    $user_password   = trim($_POST['password']);
    $result = mysqli_query($conn, "SELECT * FROM `users_login` WHERE user_mob_number='$user_email'");
    if ( mysqli_num_rows($result) ) {
        $rows = mysqli_fetch_array($result);
        $user_id = $rows['user_id'];
        $user_password_db = $rows['password'];

        //Is User Status is Activated
        $result_isActive = mysqli_query($conn, "SELECT user_status FROM `users_login` WHERE user_id='$user_id'");
        $rows_isActive = mysqli_fetch_array($result_isActive);
        $isActive = $rows_isActive['user_status'];
        if ( $isActive == 0 ) {
            echo "user_not_active";
        } else {
            if (password_verify($user_password, $user_password_db )) {
            $_SESSION['user_id'] = $user_id;
            echo "success-" . $user_id;
            } else {
                echo "error";
            }
        }
    } else {
        echo "error";
    }
}


?>