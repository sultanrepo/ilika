<?php

session_start();
echo $_SESSION['user_id'];
if ( !isset($_SESSION['user_id']) ) {
    echo "Redirect";
    //header("location:logIn.php?msg=notlogins");
}

?>