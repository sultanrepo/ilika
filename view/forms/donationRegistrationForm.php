<?php

if (isset($_POST['submit'])) {
    $title  = $_POST['title'];
    $desc   = $_POST['desc'];
    $amount = $_POST['amount'];


    date_default_timezone_set("Asia/Kolkata");   //India time (GMT+5:30)
    $dateTime = date("Y-m-d H:i:s");

    $result2 = mysqli_query($conn, "SELECT id FROM `donation` ORDER BY id desc LIMIT 1");
    $rows2   = mysqli_fetch_array($result2);
    $donation_id = $rows2['id'];
    $new_donation_id = $donation_id + rand(1111, 9999);

    $qry123 = "INSERT INTO `donation`(`id`, `title`, `desc`, `amount`, `date_time`, `status`) VALUES ('$new_donation_id','$title','$desc','$amount','$dateTime','paid')";
    $result3 = mysqli_query($conn, $qry123);
    echo $result3;
    echo "<br>";
    echo $qry123;
    if ($result3) {
?>
        <script>
            window.location.href = "donation-list.php?status=paid";
        </script>
<?php
        //header("location: ../../donation-list.php?status=paid");
    }
}

//Upload Images
// $error=array();
// $extension=array("jpeg","jpg","png","gif");
// for( $i = 0 ; $i < count($_FILES["images"]["name"]) ; ++$i ) {
//     $file_name=$_FILES["images"]["name"][$i];
//     $file_tmp=$_FILES["images"]["tmp_name"][$i];
//     $ext=pathinfo($file_name,PATHINFO_EXTENSION);

//     $file_name = time() . $file_name;

//     if(in_array($ext,$extension)) {
//         if(!file_exists("Uploads/DonationImages/".$file_name)) {
//             move_uploaded_file($file_tmp=$_FILES["images"]["tmp_name"][$i],"Uploads/DonationImages/".$file_name);
//             $result1 = mysqli_query($conn, "INSERT INTO `donation_images`(`donation_id`, `images`) VALUES ('$new_donation_id','$file_name')");
//         }
//         else {
//             $filename=basename($file_name,$ext);
//             $newFileName=$filename.time().".".$ext;
//             move_uploaded_file($file_tmp=$_FILES["images"]["tmp_name"][$i],"Uploads/DonationImages/".$newFileName);
//         }
//     }
//     else {
//         array_push($error,"$file_name, ");
//     }
// }
?>
<hr>
<h4 class="pg-title">Donation</h4>
<hr>
<form method="post" enctype="multipart/form-data">
    <div class="form-group col-md-4">
        <label class="form-label" for="exampleInputuname_1">Title</label>
        <div class="input-group">
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title">
        </div>
    </div>
    <div class="form-group col-md-4">
        <label class="form-label" for="exampleInputEmail_1">Description</label>
        <div class="input-group">
            <!-- <input type="text" class="form-control" id="exampleInputEmail_1" placeholder="Enter email"> -->
            <textarea class="form-control" name="desc" id="desc" cols="10" rows="10" placeholder="Enter Description"></textarea>
        </div>
    </div>
    <div class="form-group col-md-4">
        <label class="form-label" for="exampleInputpwd_1">Amount</label>
        <div class="input-group">
            <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter Amount">
        </div>
    </div>
    <!--<div class="form-group col-md-4">-->
    <!--	<label class="form-label" for="exampleInputpwd_2">Upload Images</label>-->
    <!--	<div class="input-group">-->
    <!--		<input type="file" class="form-control" id="images" name="images[]" multiple accept="image/png, image/gif, image/jpeg">-->
    <!--	</div>-->
    <!--</div>-->
    <button name="submit" class="btn btn-primary me-1">Submit</button>
</form>