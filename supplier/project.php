<?php

include ('../DBConfig/connection.php');
print_r($_GET);
$pid = $_GET['pid'];
$linkid = $_GET['linkid'];
$supplierid = $_GET['supplierid'];
$user = $_GET['user'];

$getLiveLinkQuery = "SELECT * FROM `projects_suppliers_link` WHERE link_id='$linkid'";
$getLiveLinkResult = mysqli_query($conn, $getLiveLinkQuery);
$getLiveLinkRow = mysqli_fetch_array($getLiveLinkResult);
$liveLink = $getLiveLinkRow['live_link'];
echo $liveLink;
header("Location: " . $liveLink);