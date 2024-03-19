<?php

error_reporting(error_reporting() & ~E_NOTICE);

include("../../DBConfig/connection.php");
include("../../session/sessionTrack.php");

$user_id = $_SESSION['user_id'];

$profile_photo = $_POST['profilePhoto'];

//Upload Photo
$errors= array();
$file_name = $_FILES['profilePic']['name'];
$file_size = $_FILES['profilePic']['size'];
$file_tmp = $_FILES['profilePic']['tmp_name'];
$file_type = $_FILES['profilePic']['type'];
$file_ext=strtolower(end(explode('.',$_FILES['profilePic']['name'])));

$new_photo = $location.time()."-".rand(1000, 9999)."-".$file_name;

$expensions= array("jpeg","jpg","png","pdf");

if(in_array($file_ext,$expensions)=== false){
   $errors[]="Please choose a JPEG, PNG & PDF file.";
}
  
if($file_size > 10097152) {
   $errors[]='File size must be Maximum 2 MB';
}

if(empty($errors)==true) {
   move_uploaded_file($file_tmp,"../../Uploads/ProfilePhotos/".$new_photo);
   
   $result = mysqli_query($conn, "UPDATE `user_details` SET `profile_pic`='$new_photo' WHERE user_id='$user_id'");
   if ( $result ) {
    echo "success";
   } else {
    echo "dberror";
   }
   
} else {
    echo "error";
}

?>