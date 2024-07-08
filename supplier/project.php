<?php

include ('../DBConfig/connection.php');
print_r($_GET);
$pid = $_GET['pid'];
$linkid = $_GET['linkid'];
$supplierid = $_GET['supplierid'];
$user = $_GET['user'];

$getSupplierStatusQuery = "SELECT * FROM `projects_suppliers` WHERE supplier_id='$supplierid' AND project_id='$pid'";
$getSupplierStatusResult = mysqli_query($conn, $getSupplierStatusQuery);
$supplierStatusRow = mysqli_fetch_array($getSupplierStatusResult);
$supplierStatus = $supplierStatusRow['status'];
if ($supplierStatus == "live") {
    $updateSupplierStatusQuery = "UPDATE `projects_suppliers_link` SET `status`='live' WHERE `supplier_id`='$supplierid' AND `link_id`='$linkid'";
    $updateSupplierStatusResult = mysqli_query($conn, $updateSupplierStatusQuery);
    if ($updateSupplierStatusResult) {
        $getLiveLinkQuery = "SELECT * FROM `projects_suppliers_link` WHERE link_id='$linkid'";
        $getLiveLinkResult = mysqli_query($conn, $getLiveLinkQuery);
        $getLiveLinkRow = mysqli_fetch_array($getLiveLinkResult);
        $liveLink = $getLiveLinkRow['live_link'];
        echo $liveLink;
        //header("Location: " . $liveLink);
    }
} else {
    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Not Live</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                text-align: center;
            }
        </style>
    </head>

    <body>
        <h1>Link is Not Live</h1>
    </body>

    </html>
    <?php
}