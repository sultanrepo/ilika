<?php
$to = "zamzamarshtravel@gmail.com";
$subject = "My subject";
$txt = "Hello world!";
$headers = "From: sabr@sabrfoundation.000webhostapp.com" . "\r\n" .
"CC: somebodyelse@sabrfoundation.000webhostapp.com";

mail($to,$subject,$txt,$headers);
?>