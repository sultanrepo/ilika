<?php

error_reporting(error_reporting() & ~E_NOTICE);

include("../../DBConfig/connection.php");
date_default_timezone_set("Asia/Kolkata");  

$userID        = $_POST['userID'];
$userName      = $_POST['userName'];
$amount        = $_POST['amount'];
$paymentMonth  = $_POST['paymentMonth'];
$paymentMethod = $_POST['paymentMethod'];
$screenShot    = $_POST['screenShot'];

$month = date('m', strtotime($paymentMonth));
$year = date('Y', strtotime($paymentMonth));
$currentDateTime = date('Y-m-d H:i:s');

$result0 = mysqli_query($conn, "SELECT * FROM `membership_start_details` WHERE user_id='$userID'");
//Very First Time Payment
if ( mysqli_num_rows($result0) == 0 ) {

    //Upload Photo
    $errors= array();
    $file_name = $_FILES['screenShot']['name'];
    $file_size = $_FILES['screenShot']['size'];
    $file_tmp = $_FILES['screenShot']['tmp_name'];
    $file_type = $_FILES['screenShot']['type'];
    $file_ext=strtolower(end(explode('.',$_FILES['screenShot']['name'])));
    
    $new_photo = $location.time()."-".rand(1000, 9999)."-".$file_name;
    
    $expensions= array("jpeg","jpg","png","pdf");
    
    if(in_array($file_ext,$expensions)=== false){
       $errors[]="Please choose a JPEG, PNG & PDF file.";
    }
    
    if($file_size > 10097152) {
       $errors[]='File size must be Maximum 2 MB';
    }
    
    if(empty($errors)==true) {
        move_uploaded_file($file_tmp,"../../Uploads/PaymentScreenShots/".$new_photo);
     
        $result1 = mysqli_query($conn, "INSERT INTO `membership_start_details`(`user_id`, `date`, `date_time`, `month`, `year`, `created_at`,`status`) VALUES 
        ('$userID','$paymentMonth','$currentDateTime','$month','$year','$currentDateTime','Active')");
     
        $result2 = mysqli_query($conn, "INSERT INTO `deposit`(`user_id`, `user_username`, `amount`, `date_of_payment`, `month_of`, `year_of`, `payment_method`, `screenShot`, `created_at`,`status`) VALUES
        ('$userID','$userName','$amount','$paymentMonth','$month','$year','$paymentMethod','$new_photo','$currentDateTime','PendingForApproval')");
        if ( $result1 && $result2 ) {
         echo "Success";
        } else {
         echo "DBError";
        }
       
    } else {
        echo "ImageUploadError";
    }
}
//Second time and on
if ( mysqli_num_rows($result0) > 0 ) {
    //Upload Photo
    $errors= array();
    $file_name = $_FILES['screenShot']['name'];
    $file_size = $_FILES['screenShot']['size'];
    $file_tmp = $_FILES['screenShot']['tmp_name'];
    $file_type = $_FILES['screenShot']['type'];
    $file_ext=strtolower(end(explode('.',$_FILES['screenShot']['name'])));
    
    $new_photo = $location.time()."-".rand(1000, 9999)."-".$file_name;
    
    $expensions= array("jpeg","jpg","png","pdf");
    
    if(in_array($file_ext,$expensions)=== false){
       $errors[]="Please choose a JPEG, PNG & PDF file.";
    }
    
    if($file_size > 10097152) {
       $errors[]='File size must be Maximum 2 MB';
    }
    
    if(empty($errors)==true) {
        move_uploaded_file($file_tmp,"../../Uploads/PaymentScreenShots/".$new_photo);
     
        $sql = "INSERT INTO `deposit`(`user_id`, `user_username`, `amount`, `date_of_payment`, `month_of`, `year_of`, `payment_method`, `screenShot`, `created_at`,`status`) VALUES
                                 ('$userID','$userName','$amount','$paymentMonth','$month','$year','$paymentMethod','$new_photo','$currentDateTime','PendingForApproval')";
        $result3 = mysqli_query($conn, $sql);

        if ( $result3 ) {
         echo "Success";
        } else {
         echo "DBError";
        }
       
    } else {
        echo "ImageUploadError";
    }
}



?>