														
<?php

error_reporting(E_ERROR | E_PARSE);

// $result1 = mysqli_query($conn, "SELECT * FROM `charity_start_month_date_time`");
// $rows1   = mysqli_fetch_array($result1);
// $month   = $rows1['month'];
// $year    = $rows1['year'];

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

$monthInNumber = date('m');

// $monthN = "";
// $yearN  = "";

// if ( isset($_GET['getDate']) ) {
	$date = $_GET['getDate'];
	$dateArray = explode("-",$date);
	$monthN = $dateArray[1];
	$yearN  = $dateArray[0];
	//Total Collection
	$result0 = mysqli_query($conn, "SELECT SUM(amount) FROM deposit");
	$rows0   = mysqli_fetch_array($result0);
	$totalCollection = $rows0[0];

	//This month collection
	$result1 = mysqli_query($conn, "SELECT SUM(amount) FROM deposit WHERE month_of='$monthN' AND year_of='$yearN'");
	$rows1   = mysqli_fetch_array($result1);
	$thisMonthCollection = $rows1[0];

	//Total Donation Donation Amount
	$result2 = mysqli_query($conn, "SELECT SUM(amount) FROM `donation`");
	$rows2   = mysqli_fetch_array($result2);
	$donationAmout = $rows2[0];

	$pendingAmount = "0";

	//Total Remaing Amount
	$total_remaing_amount = $totalCollection - $donationAmout;

// }


?>

<!-- Cards -->
<div class="row">
	<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
		<div class="card text-white bg-primary">
			<div class="card-header">Total <br> Collections</div>
			<div class="card-body">
				<h5 class="card-title text-white">₹<?php  echo $totalCollection; ?></h5>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
		<div class="card text-white bg-secondary ">
			<div class="card-header"><?php echo $months[$monthInNumber - 1]; ?> <br> Collections</div>
			<div class="card-body">
				<h5 class="card-title text-white">₹ <?php  if ( $thisMonthCollection == NULL ) { echo "0"; } else { echo $thisMonthCollection; } ?> </h5>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
		<div class="card text-white bg-warning">
			<div class="card-header">Total <br> Donation</div>
			<div class="card-body">
				<h5 class="card-title text-white">₹<?php 
					if ( $donationAmout == null ) {
						echo "0";
					} else {
						echo $donationAmout;
					} ?> </h5>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
		<div class="card text-white bg-success">
			<div class="card-header">Reaming <br> Amount</div>
			<div class="card-body">
				<h5 class="card-title text-white">₹<?php echo $total_remaing_amount; ?> </h5>
			</div>
		</div>
	</div>
	<!-- <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
		<div class="card text-white bg-danger">
			<div class="card-header">Pending Members Payment For (<?php //echo $months[$monthInNumber - 1]; ?>)</div>
			<div class="card-body">
				<h5 class="card-title text-white">0 Members </h5>
			</div>
		</div>
	</div> -->
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