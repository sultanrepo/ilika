<?php
error_reporting(error_reporting() & ~E_NOTICE);
error_reporting(E_ALL ^ E_WARNING);


include ("DBConfig/connection.php");

$user_id = $_SESSION['user_id'];
$getUsername = mysqli_query($conn, "SELECT * FROM `user_details` WHERE user_id='$user_id'");
$userRows = mysqli_fetch_array($getUsername);
$userName = $userRows['user_name'];

$monthName = '';

$date = date("Y-m");
$dateArray = explode("-", $date);
$monthN = $dateArray[1];
$yearN = $dateArray[0];

$months = array(
	'January',
	'February',
	'March',
	'April',
	'May',
	'June',
	'July ',
	'August',
	'September',
	'October',
	'November',
	'December',
);

//Get Current Month Name
if ($monthN == 11 || $monthN == 12) {
	$monthName = $months[$monthN - 1];
	echo "Month123" . $monthName;
} else {
	$monthName = $months[trim($monthN - 1, "0")];
	echo "Month123" . $monthName;
}


// if ( $monthN == 01 ) {
// 	$monthName = "January";
// } else if ( $monthN == 02 ) {
// 	$monthName = "February";
// } else if ( $monthN == 03 ) {
// 	$monthName = "March";
// } else if ( $monthN == 04 ) {
// 	$monthName = "April";
// } else if ( $monthN == 05 ) {
// 	$monthName = "May";
// } else if ( $monthN == 06 ) {
// 	$monthName = "June";
// } else if ( $monthN == 07 ) {
// 	$monthName = "July";
// } else if ( $monthN == 08 ) {
// 	$monthName = "August";
// } else if ( $monthN == 09 ) {
// 	$monthName = "September";
// } else if ( $monthN == 10 ) {
// 	$monthName = "October";
// } else if ( $monthN == 11 ) {
// 	$monthName = "November";
// } else ( $monthN == 12 ) {
// 	$monthName = "December";
// }

//Total Collection
$result0 = mysqli_query($conn, "SELECT SUM(amount) FROM deposit");
$rows0 = mysqli_fetch_array($result0);
$totalCollection = $rows0[0];

//This month collection
$result1 = mysqli_query($conn, "SELECT SUM(amount) as total FROM deposit WHERE month_of='$monthN' AND year_of='$yearN'");
$rows1 = mysqli_fetch_array($result1);
if ($rows1['total'] == NULL) {
	$thisMonthCollection = "0";
} else {
	$thisMonthCollection = $rows1[0];
}

//Total Donation Donation Amount
$result2 = mysqli_query($conn, "SELECT SUM(amount) as total FROM `donation`");
$rows2 = mysqli_fetch_array($result2);
$donationAmout = $rows2['total'];

$pendingAmount = "0";

//Reaming Amount
$total_remaing_amount = $totalCollection - $donationAmout;

//Get Dashboard
$result3 = mysqli_query($conn, "SELECT COUNT(*) as users FROM `users_login`");
$rows3 = mysqli_fetch_array($result3);
$usersCount = $rows3['users'];

//This Year Collection
$Year = date("Y");
$result4 = mysqli_query($conn, "SELECT SUM(amount) as totalAmount FROM `deposit` WHERE year_of='$Year'");
$rows4 = mysqli_fetch_array($result4);
$thisYearCollection = $rows4['totalAmount'];

//This Year Donation
$Year = date("Y");
$startYear = $Year . "-01-01 00:00:00";
$endYear = $Year . "-12-31 23:59:59";
$result5 = mysqli_query($conn, "SELECT SUM(amount) as totalAmount FROM `donation` WHERE `date_time` BETWEEN '$startYear' AND '$endYear'");
//echo  "SELECT SUM(*) as totalAmount FROM `donation` WHERE date_time='$thisYear'";
//echo "SELECT SUM(amount) as totalAmount FROM `donation` WHERE `date_time` BETWEEN '$startYear' AND '$endYear'";
$rows5 = mysqli_fetch_array($result5);
$thisYearDonation = $rows5['totalAmount'];


?>
<!-- Main Content -->
<div class="hk-pg-wrapper">
	<div class="container-xxl">
		<!-- Page Header -->
		<div class="hk-pg-header pg-header-wth-tab">
			<div class="d-flex">
				<div class="d-flex flex-wrap justify-content-between flex-1">
					<div class="mb-lg-0 mb-2 me-8">
						<h4>Welcome Back, </h3>
							<h1 class="pg-title">
								<?php echo $userName; ?>😊
							</h1>
							<p></p>
					</div>
					<!-- <div class="pg-header-action-wrap">
								<div class="input-group w-300p">
									<span class="input-affix-wrapper">
										<span class="input-prefix"><span class="feather-icon"><i data-feather="calendar"></i></span></span>
										<input class="form-control form-wth-icon" name="datetimes" value="Aug 18,2020 - Aug 19, 2020">
									</span>
								</div>
							</div> -->
				</div>
			</div>
		</div>
		<!-- /Page Header -->

		<!-- Cards -->
		<div class="row">
			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
				<div class="card text-white bg-primary">
					<div class="card-header">Total <br> Clicks</div>
					<div class="card-body">
						<h5 class="card-title text-white">245
							<?php //echo $totalCollection;   ?>
						</h5>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
				<div class="card text-white bg-success">
					<div class="card-header">Total <br> Completes</div>
					<div class="card-body">
						<h5 class="card-title text-white">2
							<?php //echo $donationAmout;   ?>
						</h5>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
				<div class="card text-white bg-warning">
					<div class="card-header">Total <br> Terminates</div>
					<div class="card-body">
						<h5 class="card-title text-white">114
							<?php //echo $total_remaing_amount;   ?>
						</h5>
					</div>
				</div>
			</div>
			<!-- <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
				<div class="card text-white bg-secondary ">
					<div class="card-header"> Collections
					</div>
					<div class="card-body">
						<h5 class="card-title text-white">₹</h5>
					</div>
				</div>
			</div> -->
			<!--<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">-->
			<!--	<div class="card text-white bg-danger">-->
			<!--		<div class="card-header">Pending Payment For "<?php //echo $monthName;    ?>" Month</div>-->
			<!--		<div class="card-body">-->
			<!--			<h5 class="card-title text-white">0 Members</h5>-->
			<!--		</div>-->
			<!--	</div>-->
			<!--</div>-->
			<!-- <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
						<div class="card text-white bg-warning">
							<div class="card-header">Header</div>
							<div class="card-body">
								<h5 class="card-title text-white">Warning Card</h5>
								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
						<div class="card text-white bg-info">
							<div class="card-header">Header</div>
							<div class="card-body">
								<h5 class="card-title text-white">Info Card</h5>
								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
						<div class="card bg-charcoal-light-5">
							<div class="card-header">Header</div>
							<div class="card-body">
								<h5 class="card-title">Light Card</h5>
								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							</div>
						</div>
					</div>
					<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
						<div class="card text-white bg-dark">
							<div class="card-header">Header</div>
							<div class="card-body">
								<h5 class="card-title text-white">Dark Card</h5>
								<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
							</div>
						</div>
					</div> -->
		</div>
		<!-- Card -->
		<!-- Page Body -->
		<!-- dashboardMainHtml.php -->
		<!-- /Page Body -->
	</div>

	<!-- Page Footer -->
	<?php include ("footerContent.php"); ?>
	<!-- / Page Footer -->

</div>
<!-- /Main Content -->