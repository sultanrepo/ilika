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
		<!-- Table -->
		<hr>
		<header class="contact-header">
			<div class="d-flex align-items-center">
				<div class="dropdown">
					<a class="contactapp-title dropdown-toggle link-dark" data-bs-toggle="dropdown" href="#"
						role="button" aria-haspopup="true" aria-expanded="false">
						<h4>Live Status</h2>
					</a>
				</div>
			</div>
			<div class="contact-options-wrap">
				<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover no-caret d-sm-inline-block d-none"
					href="index.php" data-bs-toggle="tooltip" data-placement="top" title=""
					data-bs-original-title="Refresh"><span class="icon"><span class="feather-icon"><i
								data-feather="refresh-cw"></i></span></span></a>
			</div>
		</header>
		<div class="contact-body">
			<div data-simplebar class="nicescroll-bar">
				<div class="collapse" id="collapseQuick">
					<div class="quick-access-form-wrap">
						<form class="quick-access-form border">
							<div class="row gx-3">
								<div class="col-xxl-10">
									<div class="position-relative">
										<div class="dropify-square">
											<input type="file" class="dropify-1" />
										</div>
										<div class="col-md-12">
											<div class="row gx-3">
												<div class="col-lg-4">
													<div class="form-group">
														<input class="form-control" placeholder="First name*" value=""
															type="text">
													</div>
													<div class="form-group">
														<input class="form-control" placeholder="Last name*" value=""
															type="text">
													</div>
												</div>
												<div class="col-lg-4">
													<div class="form-group">
														<input class="form-control" placeholder="Email Id*" value=""
															type="text">
													</div>
													<div class="form-group">
														<input class="form-control" placeholder="Phone" value=""
															type="text">
													</div>
												</div>
												<div class="col-lg-4">
													<div class="form-group">
														<input class="form-control" placeholder="Department" value=""
															type="text">
													</div>
													<div class="form-group">
														<select id="input_tags" class="form-control"
															multiple="multiple">
															<option selected="selected">Collaborator</option>
															<option>Designer</option>
															<option selected="selected">Developer</option>
														</select>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xxl-2">
									<div class="form-group">
										<button data-bs-toggle="collapse" data-bs-target="#collapseExample"
											aria-expanded="false" class="btn btn-block btn-primary ">Create New
										</button>
									</div>
									<div class="form-group">
										<button data-bs-toggle="collapse" disabled data-bs-target="#collapseExample"
											aria-expanded="false" class="btn btn-block btn-secondary">Discard
										</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
				<div class="contact-list-view">
					<table id="datable_1" class="table nowrap w-100 mb-5">
						<thead>
							<tr>
								<th>
									<span class="form-check mb-0">
										<input type="checkbox" class="form-check-input check-select-all"
											id="customCheck1">
										<label class="form-check-label" for="customCheck1"></label>
									</span>
								</th>
								<th><b>Project ID</b></th>
								<th><b>Username</b></th>
								<th><b>Status</b></th>
								<th><b>Date & Time</b></th>
								<th><b>Action</b></th>
							</tr>
						</thead>
						<tbody>
							<?php
							$query3 = "SELECT * FROM `projects_suppliers_link_status` ORDER BY s_no DESC";
							$result3 = mysqli_query($conn, $query3);
							while ($rows3 = mysqli_fetch_array($result3)) {
								$project_id = $rows3['project_id'];
								$username = $rows3['username'];
								$status = $rows3['status'];
								$dateTime = $rows3['timestamp'];

								$getProjectIDQuery = "SELECT * FROM `projects_suppliers` WHERE project_id='$project_id'";
								$getProjectIDResult = mysqli_query($conn, $getProjectIDQuery);
								$getProjectIDRows = mysqli_fetch_array($getProjectIDResult);
								$s_no = $getProjectIDRows['s_no'];
								?>
								<tr>
									<td>
										<div class="d-flex align-items-center">
											<!-- <span class="contact-star marked"><span class="feather-icon"><i data-feather="star"></i></span></span> -->
										</div>
									</td>
									<td>
										<?php echo "II" . $s_no; ?>
									</td>
									<td>
										<?php echo $username; ?>
									</td>
									<td>
										<?php
										if ($status == "redirectsComplete") {
											echo "Complete";
										} else if ($status == "redirectsTerminate") {
											echo "Terminate";
										} else if ($status == "redirectsQuotafull") {
											echo "Quotafull";
										} else if ($status == "qualityTerminate") {
											echo "Quality Terminate";
										} else if ($status == "pending") {
											echo "Pending";
										}
										?>
									</td>
									<td>
										<?php echo $dateTime; ?>
									</td>
									<td>
										<a href="supplierUpdate.php?s_id=<?php echo $supplier_id; ?>"
											class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
											data-bs-toggle="tooltip" data-placement="top" title=""
											data-bs-original-title="Edit" href="edit-contact.html">
											<span class="icon">
												<span class="feather-icon">
													<i data-feather="edit"></i>
												</span>
											</span>
										</a>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- Table -->
		<!-- Page Body -->
		<!-- dashboardMainHtml.php -->
		<!-- /Page Body -->
	</div>

	<!-- Page Footer -->
	<?php include ("footerContent.php"); ?>
	<!-- / Page Footer -->

</div>
<!-- /Main Content -->