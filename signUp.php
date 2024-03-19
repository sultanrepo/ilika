<!DOCTYPE html>

<html lang="en">

<head>
    <!-- Meta Tags -->
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup ACT</title>
    
	<!-- Sweet Alert -->
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


	<!-- Favicon -->
    <link rel="shortcut icon" href="dist/favIcon/SabrFoundation-Circle.png">
    <link rel="icon" href="" type="image/x-icon">
	
	<!-- CSS -->
    <link href="dist/css/style.css" rel="stylesheet" type="text/css">

	<style>
		.error{
			color: red;
		}
	</style>
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
								<form class="w-100" id="loginForm" method="POST">
									<div class="row">
										<div class="col-xxl-5 col-xl-7 col-lg-8 col-sm-10 mx-auto">
											<div class="text-center mb-7">
												<a class="navbar-brand me-0" href="index.html">
													<img class="brand-img d-inline-block" style="margin-top: -44px;" width="150" height="150" src="dist/logo/SabrFoundation.png" alt="brand">
												</a>
											</div>
											<div class="card card-border" style="margin-top: -53px;">
												<div class="card-body">
													<h4 class="text-center mb-0">Sign Up to <br> <strong>Sabr Foundation </strong></h4>
													<p class="p-xs mt-2 mb-4 text-center">Already a member ? <a href="logIn.php"><u>Log In</u></a></p>
													<!-- <button class="btn btn-outline-dark btn-rounded btn-block mb-3"><span><span class="icon"><i class="fab fa-google"></i></span><span>Sign Up with Gmail</span></span></button>
													<button class="btn btn-social btn-social-facebook btn-rounded btn-block"><span><span class="icon"><i class="fab fa-facebook"></i></span><span>Sign Up with Facebook</span></span></button> -->
													<div class="title-sm title-wth-divider divider-center my-4"><span>Or</span></div>
													<div class="row gx-3">
														<div class="form-group col-lg-6">
															<label class="form-label">Name</label>
															<input class="form-control" placeholder="Enter your name" id="user_name" name="user_name" value="" type="text" required >
														</div>
														<!-- <div class="form-group col-lg-6">
															<label class="form-label">Username</label>
															<input class="form-control" placeholder="Enter username" value="" type="text">
														</div> -->
                                                        <div class="form-group col-lg-6">
															<label class="form-label">Mobile Number</label>
															<input class="form-control" placeholder="Enter Mobile Number" id="user_mobile" name="user_mobile" value="" type="number" required >
														</div>
														<div class="form-group col-lg-12">
															<label class="form-label">Email</label>
															<input class="form-control" placeholder="Enter your email id" id="user_email" name="user_email" value="" type="text" required >
														</div>
														<div class="form-group col-lg-12">
															<label class="form-label">Password</label>
															<div class="input-group password-check">
																<span class="input-affix-wrapper affix-wth-text">
																	<input class="form-control" placeholder="6+ characters" id="user_password" name="user_password" value="" type="password" required >
																	<a href="#" class="input-suffix text-primary text-uppercase fs-8 fw-medium">
																		<span>Show</span>
																		<span class="d-none">Hide</span>
																	</a>
																</span>
															</div>
														</div>
													</div>
													<div class="form-check form-check-sm mb-3">
														<input type="checkbox" class="form-check-input" id="logged_in" checked>
														<label class="form-check-label text-muted fs-8" for="logged_in">By creating an account you specify that you have read and agree with our <a href="#">Tearms of use</a> and <a href="#">Privacy policy</a>. We may keep you inform about latest updates through our default <a href="#">notification settings</a></label>
													</div>
													<input type="button" id="formSubmitData" class="btn btn-primary btn-rounded btn-uppercase btn-block" value="Create account" >
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
							<p class="footer-text pb-0"><span class="copy-text">Sabr Foundation © <?php $year = date("Y"); echo $year; ?> All rights reserved.</span> <a href="#" class="" target="_blank">Privacy Policy</a><span class="footer-link-sep">|</span><a href="#" class="" target="_blank">T&C</a><span class="footer-link-sep">|</span><a href="#" class="" target="_blank">System Status</a></p>
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

    <!-- JQuery Validation -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js" 
	integrity="sha512-rstIgDs0xPgmG6RX1Aba4KV5cWJbAMcvRCVmglpam9SoHZiUCyQVDdH2LPlxoHtrv17XWblE/V/PP+Tr04hbtA==" 
	crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- /Jquery Validation -->

    <!-- Form Submiting -->

    <script src="Controller/js/signup.js"></script>

    <!-- /Form Submiting -->


</body>

</html>