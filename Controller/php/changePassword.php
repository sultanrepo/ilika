<?php

error_reporting(error_reporting() & ~E_NOTICE);

include("../../DBConfig/connection.php");
include("../../session/sessionTrack.php");

$user_id = $_SESSION['user_id'];

$oldPassword = $_POST['oldPassword'];
$newPassword = $_POST['newPassword'];
$conPassword = $_POST['conPassword'];

$result1 = mysqli_query($conn, "SELECT * FROM `users_login` WHERE user_id='$user_id'");
$rows1 = mysqli_fetch_array($result1);
$passwordDB = $rows1['password'];

if (password_verify($oldPassword, $passwordDB)) {
    $hashConfPassword = password_hash($conPassword, PASSWORD_BCRYPT);
    $result2 = mysqli_query($conn, "UPDATE `users_login` SET `password`='$hashConfPassword' WHERE user_id='$user_id'");
    if ( $result2 ) {
        echo "success";
    } else {
        echo "errorDB";
    }
} else {
    echo 'oldPassNotMatched';
}

?>