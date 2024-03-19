<?php

include("../../DBConfig/connection.php");

$type = $_GET['type'];

//Mobile Check
if ( $type === "mobile" ) {
    $user_mobile = $_POST['mobile_number'];

    $result = mysqli_query($conn, "SELECT `user_mob_number`FROM `users_login` WHERE user_mob_number='$user_mobile'");
    if ( mysqli_num_rows($result) > 0 ) {
        echo "found";
    }
}

//Email Check
if ( $type === "email" ) {
    $user_email = $_POST['email'];

    $result = mysqli_query($conn, "SELECT `user_email` FROM `users_login` WHERE user_email='$user_email'");
    if ( mysqli_num_rows($result) > 0 ) {
        echo "found";
    }
}


?>