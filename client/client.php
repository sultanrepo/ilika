<?php

include ('../DBConfig/connection.php');
print_r($_GET);
$clientid = $_GET['clientid'];
$status = $_GET['status'];
$username = $_GET['username'];

if ($status == "redirectsComplete ") {

} else if ($status == "redirectsTerminate") {
} else if ($status == "redirectsQuotafull") {
} else if ($status == "qualityTerminate") {
}
