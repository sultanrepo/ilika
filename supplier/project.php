<?php

include ('../DBConfig/connection.php');
// print_r($_GET);
$pid = $_GET['pid'];
$linkid = $_GET['linkid'];
$supplierid = $_GET['supplierid'];
$user = $_GET['user'];

$getSupplierStatusQuery = "SELECT * FROM `projects_suppliers` WHERE supplier_id='$supplierid' AND project_id='$pid'";
$getSupplierStatusResult = mysqli_query($conn, $getSupplierStatusQuery);
$supplierStatusRow = mysqli_fetch_array($getSupplierStatusResult);
// echo "<pre>";
// print_r($supplierStatusRow);
$supplierStatus = $supplierStatusRow['status'];
if ($supplierStatus == "live") {
    if ($user === "XXXX") {
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

                #mesg {
                    color: #FF0000;
                }
            </style>
        </head>

        <body>
            <h1 id="mesg">You haven't entered STRING</h1>
        </body>

        </html>
        <?php
    } else {
        $updateSupplierStatusQuery = "UPDATE `projects_suppliers_link` SET `status`='live' WHERE `supplier_id`='$supplierid' AND `link_id`='$linkid'";
        $updateSupplierStatusResult = mysqli_query($conn, $updateSupplierStatusQuery);
        if ($updateSupplierStatusResult) {
            $getLiveLinkQuery = "SELECT * FROM `projects_suppliers_link` WHERE link_id='$linkid'";
            $getLiveLinkResult = mysqli_query($conn, $getLiveLinkQuery);
            $getLiveLinkRow = mysqli_fetch_array($getLiveLinkResult);
            $liveLink = $getLiveLinkRow['live_link'];
            echo "Live Link:-" . $liveLink;

            //Get LeadID
            $getLeadDetails = "SELECT lead_id FROM `projects_suppliers_link_status` ORDER BY s_no DESC LIMIT 1";
            $getLeadDetailsResult = mysqli_query($conn, $getLeadDetails);
            $getLeadDetailsRow = mysqli_fetch_array($getLeadDetailsResult);
            $lead_id = $getLeadDetailsRow['lead_id'];
            $new_lead_id = str_replace("IINS", "", $lead_id);
            $new_lead_id = str_pad((int) $new_lead_id + 1, 4, '0', STR_PAD_LEFT);
            $new_lead_id = "IINS" . $new_lead_id;
            echo "Lead:-" . $new_lead_id; // Outputs: 0202

            //New Live Link With leadID
            $url = $liveLink;
            $newPid = $new_lead_id;
            // Parse the URL into its components
            $parts = parse_url($url);
            // Parse the query string into an array
            $query = parse_str($parts['query'], $queryParams);
            // Replace the PID value
            $queryParams['PID'] = $newPid;
            // Rebuild the query string
            $newQuery = http_build_query($queryParams);
            // Rebuild the URL with the new query string
            $newUrl = $parts['scheme'] . '://' . $parts['host'] . $parts['path'] . '?' . $newQuery;
            echo "New Live Link:-" . $newUrl;

            //Update Click Count
            $newClickCount == null;
            $getLinkDataQuery = "SELECT * FROM `projects_suppliers_link` WHERE `supplier_id`='$supplierid' AND `link_id`='$linkid'";
            echo $getLinkDataQuery;
            $getLinkData = mysqli_query($conn, $getLinkDataQuery);
            $getLinkDataRows = mysqli_fetch_array($getLinkData);
            echo "<pre>";
            print_r($getLinkDataRows);
            $linkid = $getLinkDataRows['link_id'];
            $clickCount = $getLinkDataRows['click'];
            if ($clickCount == null) {
                $newClickCount = "1";
            } else {
                $newClickCount = $clickCount + 1;
            }
            $updateClickCountQuery = "UPDATE `projects_suppliers_link` SET `click`='$newClickCount',`ipAdd`='$ipaddress' WHERE `supplier_id`='$supplierid' AND `link_id`='$linkid'";
            if ($updateResult = mysqli_query($conn, $updateClickCountQuery)) {
                header("Location: " . $newUrl);
            }
        }
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