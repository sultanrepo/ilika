<?php
error_reporting(error_reporting() & ~E_NOTICE);

session_start();
if ( !isset($_SESSION['user_id']) ) {
    header("location:logIn.php?msg=notlogins");
}

?>