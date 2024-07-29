<?php

include ("../../DBConfig/connection.php");

// Query String for Supplier ID
$supplier_id = $_GET['supplier_id'];

// SQL query to select data from database
$sql = "SELECT * FROM `projects_suppliers_link_status` WHERE sipplier_id='$supplier_id'";

// Getting Supplier Details
$getSupplierDetialsQuery = "SELECT * FROM `suppliers` WHERE supplier_id='$supplier_id'";
$getSupplierDetialsResult = mysqli_query($conn, $getSupplierDetialsQuery);
$supplierDetails = mysqli_fetch_array($getSupplierDetialsResult);
$supplierName = $supplierDetails['supplier_name'];

// Getting Project Supplier Status Details
$getProjectsSuppliersStatus = "SELECT * FROM `projects_suppliers_link_status` WHERE sipplier_id='$supplier_id'";
$getProjectsSuppliersStatusResult = mysqli_query($conn, $getProjectsSuppliersStatus);
$projectsSuppliersStatus = mysqli_fetch_array($getProjectsSuppliersStatusResult);
$project_id = $projectsSuppliersStatus['project_id'];

// Getting Project Details
$getProjectDetailsQuery = "SELECT * FROM `projects` WHERE project_id='$project_id'";
$getProjectDetailsResult = mysqli_query($conn, $getProjectDetailsQuery);
$projectDetails = mysqli_fetch_array($getProjectDetailsResult);
$id = $projectDetails['id'];


// Execute query
$result = $conn->query($sql);

// Check if query executed successfully
if ($result->num_rows > 0) {
    // Create Excel file
    $filename = $supplier_name . "-II" . $id . ".xls";
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"$filename\"");

    // Print column names
    echo "s_no\tlead_id\tp_id\tlink_id\tproject_id\tsipplier_id\tclient_id\tstatus\tip_address\tusername\ttimestamp\n";

    // Print data
    while ($row = $result->fetch_assoc()) {
        echo $row["s_no"] . "\t" . $row["lead_id"] . "\t" . $row["p_id"] . "\t" . $row["link_id"] . "\t" . $row["project_id"] . "\t" . $row["sipplier_id"] . "\t" . $row["client_id"] . "\t" . $row["status"] . "\t" . $row["ip_address"] . "\t" . $row["username"] . "\t" . $row["timestamp"] . "\n";
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

            #mesg {
                color: #FF0000;
            }
        </style>
    </head>

    <body>
        <h1 id="mesg">There are no Terminates data.</h1>
    </body>

    </html>
    <?php
}


?>