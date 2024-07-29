<?php
error_reporting(error_reporting() & ~E_NOTICE);
error_reporting(E_ALL ^ E_WARNING);


include ("DBConfig/connection.php");

$user_id = $_SESSION['user_id'];
$getUsername = mysqli_query($conn, "SELECT * FROM `user_details` WHERE user_id='$user_id'");
$userRows = mysqli_fetch_array($getUsername);
$userName = $userRows['user_name'];

//Getting Click Count
$getClickCountQuery = "SELECT SUM(click) FROM `projects_suppliers_link`";
$clickCountResult = mysqli_query($conn, $getClickCountQuery);
$clickCount = mysqli_fetch_array($clickCountResult);
$clickCount = $clickCount['SUM(click)'];

//Getting Complete Count
$getCompleteCountQuery = "SELECT SUM(completes) FROM `projects_suppliers_link`";
$completeCountResult = mysqli_query($conn, $getCompleteCountQuery);
$completeCount = mysqli_fetch_array($completeCountResult);
$completeCount = $completeCount['SUM(completes)'];

//Getting terminate Count
$getTerminateCountQuery = "SELECT SUM(terminates) FROM `projects_suppliers_link`";
$terminateCountResult = mysqli_query($conn, $getTerminateCountQuery);
$terminateCount = mysqli_fetch_array($terminateCountResult);
$terminateCount = $terminateCount['SUM(terminates)'];


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
						<h5 class="card-title text-white">
							<?php
							if ($clickCount == 0) {
								echo "0";
							} else {
								echo $clickCount;
							}
							?>
							<?php //echo $totalCollection;    ?>
						</h5>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
				<div class="card text-white bg-success">
					<div class="card-header">Total <br> Completes</div>
					<div class="card-body">
						<h5 class="card-title text-white">
							<?php
							if ($completeCount == 0) {
								echo "0";
							} else {
								echo $completeCount;
							}
							?>
						</h5>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
				<div class="card text-white bg-warning">
					<div class="card-header">Total <br> Terminates</div>
					<div class="card-body">
						<h5 class="card-title text-white">
							<?php
							if ($terminateCount == 0) {
								echo "0";
							} else {
								echo $terminateCount;
							}
							?>
						</h5>
					</div>
				</div>
			</div>
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