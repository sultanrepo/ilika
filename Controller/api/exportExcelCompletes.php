<?php

include ("../../DBConfig/connection.php");

//Query String for Supplier ID
$supplier_id = $_GET['supplier_id'];

// SQL query to select data from database
$sql = "SELECT * FROM `projects_suppliers_link_status` WHERE sipplier_id='$supplier_id' AND status='redirectsComplete'";

// Execute query
$result = $conn->query($sql);

// Check if query executed successfully
if ($result->num_rows > 0) {
    // Create Excel file
    $filename = "supplier_link_data.xls";
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=\"$filename\"");

    // Print column names
    echo "s_no\tlead_id\tp_id\tlink_id\tproject_id\tsipplier_id\tclient_id\tstatus\tip_address\tusername\ttimestamp\n";

    // Print data
    while ($row = $result->fetch_assoc()) {
        echo $row["s_no"] . "\t" . $row["lead_id"] . "\t" . $row["p_id"] . "\t" . $row["link_id"] . "\t" . $row["project_id"] . "\t" . $row["sipplier_id"] . "\t" . $row["client_id"] . "\t" . $row["status"] . "\t" . $row["ip_address"] . "\t" . $row["username"] . "\t" . $row["timestamp"] . "\n";
    }
} else {
    echo "0 results";
}


?>