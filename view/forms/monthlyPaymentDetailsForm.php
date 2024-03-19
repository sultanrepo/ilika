														
<?php

error_reporting(E_ERROR | E_PARSE);

$result1 = mysqli_query($conn, "SELECT * FROM `charity_start_month_date_time`");
$rows1   = mysqli_fetch_array($result1);
$month   = $rows1['month'];
$year    = $rows1['year'];

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

$monthN = "";
$yearN  = "";

if ( isset($_GET['getDate']) ) {
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

}


?>
<form class="row row-cols-lg-auto g-3 align-items-center">
	<div class="col-12">
		<label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
        <input type="month" class="form-select" name="getDate" id="getDate" min="<?php echo $year . "-". $month; ?>" max="<?php echo date('Y') ."-". date('m'); ?>" required>
	</div>
	<div class="col-12">
			<button type="submit" class="btn btn-primary">Submit</button>
	</div>
</form>
<hr>
										
													