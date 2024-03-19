<?php
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

$from_date = "";
$to_date  = "";

if ( isset($_GET['fromDate']) && isset($_GET['toDate']) ) {
    //From Month
	$from_date = $_GET['fromDate'] . "-01";
	$fromdateArray = explode("-",$from_date);
	$from_monthN = $fromdateArray[1];
	$from_yearN  = $fromdateArray[0];

    //To Month
    $to_date = $_GET['toDate'] . "-31";
	$todateArray = explode("-",$to_date);
	$to_monthN = $todateArray[1];
	$to_yearN  = $todateArray[0];

	//Total Collection
	$result0 = mysqli_query($conn, "SELECT SUM(amount) FROM deposit");
	$rows0   = mysqli_fetch_array($result0);
	$totalCollection = $rows0[0];

	//This month collection
	$result1 = mysqli_query($conn, "SELECT SUM(amount) FROM `deposit` WHERE date_of_payment BETWEEN '$from_date' AND '$to_date'");
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
    <label class="col-12">From Month</label>
	<div class="col-12">
		<label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
        <input type="month" class="form-select" name="fromDate" id="fromDate" min="<?php echo $year . "-". $month; ?>" max="<?php echo date('Y') ."-". date('m'); ?>" required>
	</div>
    <label class="col-12">To Month</label>
    <div class="col-12">
		<label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
        <input type="month" class="form-select" name="toDate" id="toDate" min="<?php echo $year . "-". $month; ?>" max="<?php echo date('Y') ."-". date('m'); ?>" required>
	</div>
	<div class="col-12">
			<button type="submit" class="btn btn-primary">Submit</button>
	</div>
</form>
<hr>
							