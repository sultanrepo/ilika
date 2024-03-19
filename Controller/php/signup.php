<?php

include("../../DBConfig/connection.php");

$user_name     = $_POST['user_name'];
$user_mobile   = $_POST['user_mobile'];
$user_email    = $_POST['user_email'];
$user_password = $_POST['user_password'];

$hashed_password = password_hash($user_password, PASSWORD_BCRYPT);


//Already Validation
$result00 = mysqli_query($conn, "SELECT * FROM `users_login` WHERE user_mob_number='$user_mobile'");
if ( mysqli_num_rows($result00) > 0 ) {
    echo "mobileAlready";
    exit();
}

$result11 = mysqli_query($conn, "SELECT * FROM `users_login` WHERE user_email='$user_email'");
if ( mysqli_num_rows($result11) ) {
    echo "emailAlready";
    exit();
}


//Generating Unique UserName
$user_username = "";
while(1) {
    $user_username = $user_name . rand(0000,9999);
    $checkUsername = "SELECT * FROM `users_login` WHERE user_username='$user_username'";
    $result = mysqli_query($conn, $checkUsername);
    if ( mysqli_num_rows($result) == 0 ) {
        break;
    }  
}
$user_username = str_replace(' ', '', $user_username);
$user_username = strtolower($user_username);

$user_id = 0;
while(1) {
    $user_id = rand(000000,999999);
    $checkUsername = "SELECT * FROM `users_login` WHERE user_id='$user_id'";
    $result = mysqli_query($conn, $checkUsername);
    if ( mysqli_num_rows($result) == 0 ) {
        break;
    }  
}

mysqli_begin_transaction($conn);

date_default_timezone_set("Asia/Kolkata");   //India time (GMT+5:30)
$dateTime = date("Y-m-d H:i:s");

try {
    $query1 = "INSERT INTO `users_login`(`user_id`, `user_username`, `user_email`, `user_mob_number`, `password`, 
    `user_type`, `user_created_at`, `user_updated_at`, `user_status`) 
    VALUES ('$user_id','$user_username','$user_email','$user_mobile','$hashed_password','member','$dateTime','$dateTime','0')";

    $query2 = "INSERT INTO `user_details`(`user_id`, `user_name`, `user_star_donator`,`created_at`, `updated_at`) 
    VALUES ('$user_id','$user_name', '1','$dateTime','$dateTime')";

    $result1 = mysqli_query($conn, $query1);
    $result2 = mysqli_query($conn, $query2);

    mysqli_commit($conn);
    
    //Mail Starts
$to = $user_email;
$subject = "Welcome To Sabr Foundation";

$message = "
<!doctype html>
<html>
  <head>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
    <title>Simple Transactional Email</title>
    <style>
@media only screen and (max-width: 620px) {
  table.body h1 {
    font-size: 28px !important;
    margin-bottom: 10px !important;
  }

  table.body p,
table.body ul,
table.body ol,
table.body td,
table.body span,
table.body a {
    font-size: 16px !important;
  }

  table.body .wrapper,
table.body .article {
    padding: 10px !important;
  }

  table.body .content {
    padding: 0 !important;
  }

  table.body .container {
    padding: 0 !important;
    width: 100% !important;
  }

  table.body .main {
    border-left-width: 0 !important;
    border-radius: 0 !important;
    border-right-width: 0 !important;
  }

  table.body .btn table {
    width: 100% !important;
  }

  table.body .btn a {
    width: 100% !important;
  }

  table.body .img-responsive {
    height: auto !important;
    max-width: 100% !important;
    width: auto !important;
  }
}
@media all {
  .ExternalClass {
    width: 100%;
  }

  .ExternalClass,
.ExternalClass p,
.ExternalClass span,
.ExternalClass font,
.ExternalClass td,
.ExternalClass div {
    line-height: 100%;
  }

  .apple-link a {
    color: inherit !important;
    font-family: inherit !important;
    font-size: inherit !important;
    font-weight: inherit !important;
    line-height: inherit !important;
    text-decoration: none !important;
  }

  #MessageViewBody a {
    color: inherit;
    text-decoration: none;
    font-size: inherit;
    font-family: inherit;
    font-weight: inherit;
    line-height: inherit;
  }

  .btn-primary table td:hover {
    background-color: #34495e !important;
  }

  .btn-primary a:hover {
    background-color: #34495e !important;
    border-color: #34495e !important;
  }
}
</style>
  </head>
  <body style='background-color: #f6f6f6; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;'>
    <span class='preheader' style='color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;'></span>
    <table role='presentation' border='0' cellpadding='0' cellspacing='0' class='body' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f6f6f6; width: 100%;' width='100%' bgcolor='#f6f6f6'>
      <tr>
        <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;' valign='top'>&nbsp;</td>
        <td class='container' style='font-family: sans-serif; font-size: 14px; vertical-align: top; display: block; max-width: 580px; padding: 10px; width: 580px; margin: 0 auto;' width='580' valign='top'>
          <div class='content' style='box-sizing: border-box; display: block; margin: 0 auto; max-width: 580px; padding: 10px;'>

            <!-- START CENTERED WHITE CONTAINER -->
            <table role='presentation' class='main' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background: #ffffff; border-radius: 3px; width: 100%;' width='100%'>

              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class='wrapper' style='font-family: sans-serif; font-size: 14px; vertical-align: top; box-sizing: border-box; padding: 20px;' valign='top'>
                  <table role='presentation' border='0' cellpadding='0' cellspacing='0' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;' width='100%'>
                    <tr>
                        <h3>Welcome Mr, $user_name </h3>
                      <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;' valign='top'>
                        <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;'>Hi there!,</p>
                        <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;'>Welcome to the <strong>Sabr Foundation</strong> Family!</p>
                        <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;'>I am glad that you are reading this email.</p>
                        <p style='font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px;'>Good luck! Hope you Happy to help needy people.</p>
                        <!-- <table role='presentation' border='0' cellpadding='0' cellspacing='0' class='btn btn-primary' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; box-sizing: border-box; width: 100%;' width='100%'>
                          <tbody>
                            <tr>
                              <td align='left' style='font-family: sans-serif; font-size: 14px; vertical-align: top; padding-bottom: 15px;' valign='top'>
                                <table role='presentation' border='0' cellpadding='0' cellspacing='0' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: auto;'>
                                  <tbody>
                                    <tr>
                                      <td style='font-family: sans-serif; font-size: 14px; vertical-align: top; border-radius: 5px; text-align: center; background-color: #3498db;' valign='top' align='center' bgcolor='#3498db'> <a href='http://htmlemail.io' target='_blank' style='border: solid 1px #3498db; border-radius: 5px; box-sizing: border-box; cursor: pointer; display: inline-block; font-size: 14px; font-weight: bold; margin: 0; padding: 12px 25px; text-decoration: none; text-transform: capitalize; background-color: #3498db; border-color: #3498db; color: #ffffff;'>Call To Action</a> </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table> -->
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

            <!-- END MAIN CONTENT AREA -->
            </table>
            <!-- END CENTERED WHITE CONTAINER -->

            <!-- START FOOTER -->
            <div class='footer' style='clear: both; margin-top: 10px; text-align: center; width: 100%;'>
              <table role='presentation' border='0' cellpadding='0' cellspacing='0' style='border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; width: 100%;' width='100%'>
                <tr>
                  <td class='content-block' style='font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; color: #999999; font-size: 12px; text-align: center;' valign='top' align='center'>
                    <span class='apple-link' style='color: #999999; font-size: 12px; text-align: center;'>Sabr Foundation, Makhdoom Sarai South Mohallah (Siwan) Bihar-841226</span>
                    <!-- <br> Don't like these emails? <a href='http://i.imgur.com/CScmqnj.gif' style='text-decoration: underline; color: #999999; font-size: 12px; text-align: center;'>Unsubscribe</a>. -->
                  </td>
                </tr>
                <tr>
                  <td class='content-block powered-by' style='font-family: sans-serif; vertical-align: top; padding-bottom: 10px; padding-top: 10px; color: #999999; font-size: 12px; text-align: center;' valign='top' align='center'>
                    Powered by <strong>Sabr Foundation</strong>
                  </td>
                </tr>
              </table>
            </div>
            <!-- END FOOTER -->

          </div>
        </td>
        <td style='font-family: sans-serif; font-size: 14px; vertical-align: top;' valign='top'>&nbsp;</td>
      </tr>
    </table>
  </body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <support@sabr-foundation.com>' . "\r\n";
//$headers .= 'Cc: myboss@example.com' . "\r\n";

mail($to,$subject,$message,$headers);
//Mail End

//Mail Starts
$toAdmin = "sultanashraf.jobs@gmail.com";
$subjectAdmin = "Welcome New Users.";

$messageAdmin = "
Hello Sultan Ashraf. New User Registered on Sabr Foundation.<br>
Name:- $user_name<br>
Email:- $user_email<br>
Mobile No:- $user_mobile<br>
";

// Always set content-type when sending HTML email
$headersAdmin = "MIME-Version: 1.0" . "\r\n";
$headersAdmin .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headersAdmin .= 'From: <support@sabr-foundation.com>' . "\r\n";
//$headers .= 'Cc: myboss@example.com' . "\r\n";

mail($toAdmin,$subjectAdmin,$messageAdmin,$headersAdmin);
//Mail End

    echo "Success";


} 
catch ( mysqli_sql_exception $exception ) {
    mysqli_rollback($conn);
    throw $exception;
    echo "Error";
}
?>