<?php

//echo "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum";
date_default_timezone_set('Asia/Kolkata');
//Global Variabels
$monthHtml = "";
$currentDate        = date("Y-m-d");
$currentMonthName   = date("M");
$currentMonthNumber = date("m");
$currentYear        = date("Y");
//Filling Existing Fields User Details
$userID   = $_SESSION['user_id'];
$result   = mysqli_query($conn, "SELECT users_login.user_username, users_login.user_email, users_login.user_mob_number, user_details.user_name FROM users_login INNER JOIN user_details ON user_details.user_id='$userID' AND users_login.user_id='$userID'");
$rowsFill = mysqli_fetch_array($result);
$name     = $rowsFill['user_name'];
$email    = $rowsFill['user_email'];
$mobile   = $rowsFill['user_mob_number'];
$userName = $rowsFill['user_username'];

?>
<!-- Main Content -->
<div class="hk-pg-wrapper">
   <div class="container-xxl">
      <!-- Page Header -->
      <div class="hk-pg-header pg-header-wth-tab">
         <div class="d-flex">
            <div class="d-flex flex-wrap justify-content-between flex-1">
               <div class="mb-lg-0 mb-2 me-8">
                  <h1 class="pg-title">Make Your Payment <i class="material-icons">account_balance_wallet</i></h1>
                  <p></p>
               </div>
            </div>
         </div>
      </div>
      <!-- /Page Header -->
      <form class="row g-3 mt-4" id="paymentForm" enctype="multipart/form-data" >
         <input type="text" name="userID" id="userID" value="<?php echo $userID ?>" hidden>
         <input type="text" name="userName" id="userName" value="<?php echo $userName ?>" hidden>
         <div class="col-md-4">
            <label for="inputName4" class="form-label">Name🤵</label>
            <input type="email" class="form-control" id="inputEmail4" value="<?php echo $name; ?>" readonly>
         </div>
         <div class="col-md-4">
            <label for="inputMobile4" class="form-label">Mobile📱</label>
            <input type="text" class="form-control" id="inputPassword4" value="<?php echo $mobile ?>" readonly>
         </div><br>
         <div class="col-md-4">
            <label for="inputEmail" class="form-label">Email📧</label>
            <input type="email" class="form-control" id="email" value="<?php echo $email ?>" readonly>
         </div>
         <div class="col-md-2">
            <label for="inputCity" class="form-label">Amount💰</label>
            <input type="number" class="form-control" id="inputAmount" name="amount" >
         </div>
         <div class="col-md-2">
            <label for="inputState" class="form-label">Month📅</label>
            <select id="inputMonths" class="form-select" name="paymentMonth" >
               <option value="" selected>Choose...</option>
            </select>
         </div>
         <div class="col-md-2">
            <label for="inputState" class="form-label">Method🚀</label>
            <select id="inputMethod" class="form-select" name="paymentMethod" >
               <option value="" selected>Choose...</option>
               <option value="Cash">💰 Cash</option>
               <option value="PhonePe">🅿️ PhonePe</option>
               <option value="PayTM">💷 PayTM</option>
               <option value="GPay">🇬🇵 G-Pay</option>
               <option value="NetBanking">🏦 Net Banking</option>
            </select>
         </div>
         <div class="col-md-4">
            <label for="inputSnap" class="form-label">Screen-Shot📸</label>
            <input type="file" class="form-control" id="inputSnap" name="screenShot" accept="image/*" >
         </div>
         <hr>
         <center>
         <div class="col-12">
            <button type="submit" class="btn btn-primary" id="payButton">Pay</button>
         </div>
         </center>
      </form>
   </div>
   <?php include("footerContent.php"); ?>
</div>



<!-- PHP CODE FROM HERE -->
<?php

//Is First Time or Not
$result1 = mysqli_query($conn, "SELECT * FROM `membership_start_details` WHERE user_id='$userID'");
if( mysqli_num_rows($result1) > 0 ) {
   $rowsFirst = mysqli_fetch_array($result1);
   $membershipDate      = $rowsFirst['date'];
   $membershipDate_time = $rowsFirst['date_time'];
   $membershipMonth     = $rowsFirst['month'];
   $membershipYear      = $rowsFirst['year'];
   //Cehcking Current Month Payment
   $result2 = mysqli_query($conn, "SELECT * FROM `deposit` WHERE user_id='$userID' AND month_of='$currentMonthNumber' AND year_of='$currentYear'");
   // echo "result2";
   // print_r($result2);
   // exit();
   if ( mysqli_num_rows($result2) > 0 ) {
      ?>
      <script>
         $('#payButton').prop('disabled', true);
         Swal.fire({
           title: 'Alhamdilillah!',
           text: 'Your Payments Are Fully Competed Till This Month.',
           imageUrl: 'dist/img/great!.jpg',
           imageWidth: 250,
           imageHeight: 250,
           imageAlt: 'Custom image',
         });
         function redirect() {
            window.location.replace('dashboardMember.php');
         }
         setTimeout(redirect, 12000);
      </script>
      <?php
   } else {
      //Pending Months Payment(One or More Month)
      //Calculating Months
      $result4 = mysqli_query($conn, "SELECT * FROM `deposit` WHERE user_id='$userID' ORDER BY id DESC LIMIT 1");
      $rows4 = mysqli_fetch_array($result4);
      //print_r($result4);
      $LastPaymentDateAndTime = $rows4['date_of_payment'] . "00:00:00";
      $LastPaymentDate        = $rows4['date_of_payment'];
      
      $date1 = $LastPaymentDate;
      $date2 = $currentDate;
      $d1=new DateTime($date2); 
      $d2=new DateTime($date1);                                  
      $Months = $d2->diff($d1); 
      $howeverManyMonths = (($Months->y) * 12) + ($Months->m);
      echo "Date:".$howeverManyMonths;
      echo "Cuur:".$currentDate;
      
      $date1 = $LastPaymentDate;
      $date2 = $currentDate;

      $ts1 = strtotime($date1);
      $ts2 = strtotime($date2);

      $year1 = date('Y', $ts1);
      $year2 = date('Y', $ts2);

      $month1 = date('m', $ts1);
      $month2 = date('m', $ts2);
 
      $howeverManyMonths = (($year2 - $year1) * 12) + ($month2 - $month1);
      for( $i = 1 ; $i <= $howeverManyMonths ; $i++ ) {

         $date = new DateTime($LastPaymentDateAndTime);
         $date->modify('+'.$i.' month'); // or you can use '-90 day' for deduct
         $dateTime    = $date->format('Y-m-d h:i:s');
         $dateOnly    = $date->format('Y-m-d');
         $monthNumber = $date->format('m');
         $monthName   = $date->format('M');
         $year        = $date->format('Y');
         
         if ( $i == 1 ) {
            echo '<script>';
               echo '$("#inputMonths").append(new Option("'.$monthName.'-'.$year.'", "'.$dateOnly.'"));';
               //echo '$("#inputMonths").css("background-color", "red");';
               //echo '$("#inputMonths option[value='.$dateOnly.']").attr("disabled","disabled");';
            echo '</script>';
         } else {
            echo '<script>';
               echo '$("#inputMonths").append(new Option("'.$monthName.'-'.$year.'", "'.$dateOnly.'"));';
               //echo '$("#inputMonths").css("background-color", "red");';
               echo '$("#inputMonths option[value='.$dateOnly.']").attr("disabled","disabled");';
            echo '</script>';
         }
      }

   }
} else {
   //First Time Ever Payment
   $result3 = mysqli_query($conn, "SELECT * FROM `membership_start_details` WHERE user_id='$userID'");
   if ( mysqli_num_rows($result3) === 0 ) {
      ?>
      <script>
         let optionText = '<?php echo $currentDate; ?>';
         let optionValue = '<?php echo $currentMonthName."-".$currentYear; ?>';
         $('#inputMonths').append(new Option(optionValue, optionText));
      </script>
      <?php
   }
   //Option HTML
   //$monthHtml = "<option value='$currentDate' style='color: red;'>$currentMonth-$currentYear</span></option>";
}
?>