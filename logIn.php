<?php error_reporting(E_ALL ^ E_NOTICE); ?>
<!DOCTYPE html>

<html lang="en">

<head>
	<!-- Meta Tags -->
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>ILIKA INSIGHTS</title>
	<meta name="description" content="" />

	<!-- Sweet Alert -->
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

	<!-- Favicon -->
	<link rel="shortcut icon" href="dist/favIcon/ILIKA-CIRCLE.png">
	<link rel="icon" href="" type="image/x-icon">

	<!-- CSS -->
	<link href="dist/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<!-- Wrapper -->
	<div class="hk-wrapper hk-pg-auth" data-footer="simple">
		<!-- Main Content -->
		<div class="hk-pg-wrapper pt-0 pb-xl-0 pb-5">
			<div class="hk-pg-body pt-0 pb-xl-0">
				<!-- Container -->
				<div class="container-xxl">
					<!-- Row -->
					<div class="row">
						<div class="col-sm-10 position-relative mx-auto">
							<div class="auth-content py-8">
								<form class="w-100" id="loginForm">
									<div class="row">
										<div class="col-lg-5 col-md-7 col-sm-10 mx-auto">
											<div class="text-center mb-7">
												<a class="navbar-brand me-0" href="index.html">
													<img class="brand-img d-inline-block" style="margin-top: -44px;"
														width="150" height="150" src="dist/logo/ILIKA_LOGO.jpg"
														alt="brand">
												</a>
											</div>
											<div class="card card-lg card-border" style="margin-top: -53px;">
												<div class="card-body">
													<h4 class="mb-4 text-center">Log in to your account</h4>
													<div class="row gx-3">
														<div class="form-group col-lg-12">
															<div class="form-label-group">
																<label>Email/Mobile No</label>
															</div>
															<input class="form-control"
																placeholder="Enter Mobile No/Email" id="mob_email"
																name="mob_email" value="" type="text">
														</div>
														<div class="form-group col-lg-12">
															<div class="form-label-group">
																<label>Password</label>
																<!-- <a href="#" class="fs-7 fw-medium">Forgot Password ?</a> -->
															</div>
															<div class="input-group password-check">
																<span class="input-affix-wrapper">
																	<input class="form-control"
																		placeholder="Enter your password" id="password"
																		name="password" value="" type="password">
																	<a href="#" class="input-suffix text-muted">
																		<span class="feather-icon"><i class="form-icon"
																				data-feather="eye"></i></span>
																		<span class="feather-icon d-none"><i
																				class="form-icon"
																				data-feather="eye-off"></i></span>
																	</a>
																</span>
															</div>
														</div>
													</div>
													<div class="d-flex justify-content-center">
														<div class="form-check form-check-sm mb-3">
															<!-- <input type="checkbox" class="form-check-input" id="logged_in" checked>
															<label class="form-check-label text-muted fs-7" for="logged_in">Keep me logged in</label> -->
														</div>
													</div>
													<a href="#" id="formSubmitData"
														class="btn btn-primary btn-uppercase btn-block">Login</a>
													<!-- <p class="p-xs mt-2 text-center">New to ILIKA INSIGHTS? <a href="signUp.php"><u>Create new account</u></a></p> -->
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					<!-- /Row -->
				</div>
				<!-- /Container -->
			</div>
			<!-- /Page Body -->

			<!-- Page Footer -->
			<div class="hk-footer border-0">
				<footer class="container-xxl footer">
					<div class="row">
						<div class="col-xl-8 text-center">
							<p class="footer-text pb-0"><span class="copy-text">ILIKA INSIGHTS ©
									<?php $year = date("Y");
									echo $year; ?> All rights reserved.
								</span> <a href="#" class="" target="_blank">Privacy Policy</a><span
									class="footer-link-sep">|</span><a href="#" class="" target="_blank">T&C</a><span
									class="footer-link-sep">|</span><a href="#" class="" target="_blank">System
									Status</a></p>
						</div>
					</div>
				</footer>
			</div>
			<!-- / Page Footer -->

		</div>
		<!-- /Main Content -->
	</div>
	<!-- /Wrapper -->

	<!-- jQuery -->
	<script src="vendors/jquery/dist/jquery.min.js"></script>

	<!-- Bootstrap Core JS -->
	<script src="vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

	<!-- FeatherIcons JS -->
	<script src="dist/js/feather.min.js"></script>

	<!-- Fancy Dropdown JS -->
	<script src="dist/js/dropdown-bootstrap-extended.js"></script>

	<!-- Simplebar JS -->
	<script src="vendors/simplebar/dist/simplebar.min.js"></script>

	<!-- Init JS -->
	<script src="dist/js/init.js"></script>

	<!-- Login JS -->
	<script src="Controller/js/login.js"></script>

</body>

</html>

<?php

$msg = $_GET['signupStatus'];
if ($msg === "true") {
	?>
	<script>
		Swal.fire({
			position: 'top-end',
			icon: 'success',
			title: 'Account Created! Please Login',
			showConfirmButton: false,
			timer: 3000
		});
	</script>
	<?php
}

$msg1 = $_GET['msg'];
if ($msg1 === "notlogin") {
	?>
	<script>
		Swal.fire({
			position: 'top-end',
			icon: 'error',
			title: 'Please Login!!',
			showConfirmButton: false,
			timer: 3000
		});
	</script>
	<?php
}

?>