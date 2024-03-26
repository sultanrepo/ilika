<?php

include("session/sessionTrack.php");
include("DBConfig/connection.php");

$user_id = $_SESSION['user_id'];
$result = mysqli_query($conn, "SELECT users_login.user_id, user_details.user_name, users_login.user_email, user_details.profile_pic FROM users_login INNER JOIN user_details ON users_login.user_id='$user_id' AND user_details.user_id='$user_id'");
$rows = mysqli_fetch_array($result);
$user_name = $rows['user_name'];
$user_email = $rows['user_email'];
$profile_pic = $rows['profile_pic'];


?>
<!-- Top Navbar -->
<nav class="hk-navbar navbar navbar-expand-xl navbar-light fixed-top">
			<div class="container-fluid">
			<!-- Start Nav -->
			<div class="nav-start-wrap">
				<button class="btn btn-icon btn-rounded btn-flush-dark flush-soft-hover navbar-toggle d-xl-none"><span class="icon"><span class="feather-icon"><i data-feather="align-left"></i></span></span></button>
					
				<!-- Search -->
				<a href="index.php">
				    <img class="brand-img img-fluid" width="50px" height="50px" src="dist/logo/ILIKA_LOGO.jpg" alt="brand" />
				    <!-- <img class="brand-img img-fluid" style="height: 25px;" src="dist/logo/mbileLogo.png" alt="brand" />  -->
				</a>
				<!-- /Search -->
			</div>
			<!-- /Start Nav -->
			
			<!-- End Nav -->
			<div class="nav-end-wrap">
				<ul class="navbar-nav flex-row">
					<li class="nav-item">
						<div class="dropdown dropdown-notifications">
							<!-- <a href="#" class="btn btn-icon btn-rounded btn-flush-dark flush-soft-hover dropdown-toggle no-caret" data-bs-toggle="dropdown" data-dropdown-animation role="button" aria-haspopup="true" aria-expanded="false"><span class="icon"><span class="position-relative"><span class="feather-icon"><i data-feather="bell"></i></span><span class="badge badge-success badge-indicator position-top-end-overflow-1"></span></span></span></a> -->
							<!-- <div class="dropdown-menu dropdown-menu-end p-0">
								<h6 class="dropdown-header px-4 fs-6">Notifications<a href="#" class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"><span class="icon"><span class="feather-icon"><i data-feather="settings"></i></span></span></a>
								</h6>
								<div data-simplebar class="dropdown-body  p-2">
									<a href="javascript:void(0);" class="dropdown-item">
										<div class="media">
											<div class="media-head">
												<div class="avatar avatar-rounded avatar-sm">
													<img src="dist/img/avatar2.jpg" alt="user" class="avatar-img">
												</div>
											</div>
											<div class="media-body">
												<div>
													<div class="notifications-text">Morgan Freeman accepted your invitation to join the team</div>
													<div class="notifications-info">
														<span class="badge badge-soft-success">Collaboration</span>
														<div class="notifications-time">Today, 10:14 PM</div>
													</div>
												</div>
											</div>
										</div>
									</a>
									<a href="javascript:void(0);" class="dropdown-item">
										<div class="media">
											<div class="media-head">
												<div class="avatar  avatar-icon avatar-sm avatar-success avatar-rounded">
													<span class="initial-wrap">
														<span class="feather-icon"><i data-feather="inbox"></i></span>
													</span>
												</div>
											</div>
											<div class="media-body">
												<div>
													<div class="notifications-text">New message received from Alan Rickman</div>
													<div class="notifications-info">
														<div class="notifications-time">Today, 7:51 AM</div>
													</div>
												</div>
											</div>
										</div>
									</a>
									<a href="javascript:void(0);" class="dropdown-item">
										<div class="media">
											<div class="media-head">
												<div class="avatar  avatar-icon avatar-sm avatar-pink avatar-rounded">
													<span class="initial-wrap">
														<span class="feather-icon"><i data-feather="clock"></i></span>
													</span>
												</div>
											</div>
											<div class="media-body">
												<div>
													<div class="notifications-text">You have a follow up with Jampack Head on Friday, Dec 19 at 9:30 am</div>
													<div class="notifications-info">
														<div class="notifications-time">Yesterday, 9:25 PM</div>
													</div>
												</div>
											</div>
										</div>
									</a>
									<a href="javascript:void(0);" class="dropdown-item">
										<div class="media">
											<div class="media-head">
												<div class="avatar avatar-sm avatar-rounded">
													<img src="dist/img/avatar3.jpg" alt="user" class="avatar-img">
												</div>
											</div>
											<div class="media-body">
												<div>
													<div class="notifications-text">Application of Sarah Williams is waiting for your approval</div>
													<div class="notifications-info">
														<div class="notifications-time">Today 10:14 PM</div>
													</div>
												</div>
											</div>
										</div>
									</a>
									<a href="javascript:void(0);" class="dropdown-item">
										<div class="media">
											<div class="media-head">
												<div class="avatar avatar-sm avatar-rounded">
													<img src="dist/img/avatar10.jpg" alt="user" class="avatar-img">
												</div>
											</div>
											<div class="media-body">
												<div>	
													<div class="notifications-text">Winston Churchil shared a document with you</div>
													<div class="notifications-info">
														<span class="badge badge-soft-violet">File Manager</span>
														<div class="notifications-time">2 Oct, 2021</div>
													</div>
												</div>
											</div>
										</div>
									</a>
									<a href="javascript:void(0);" class="dropdown-item">
										<div class="media">
											<div class="media-head">
												<div class="avatar  avatar-icon avatar-sm avatar-danger avatar-rounded">
													<span class="initial-wrap">
														<span class="feather-icon"><i data-feather="calendar"></i></span>
													</span>
												</div>
											</div>
											<div class="media-body">
												<div>	
													<div class="notifications-text">Last 2 days left for the project to be completed</div>
													<div class="notifications-info">
														<span class="badge badge-soft-orange">Updates</span>
														<div class="notifications-time">14 Sep, 2021</div>
													</div>
												</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-footer"><a href="#"><u>View all notifications</u></a></div>
							</div> -->
						</div>
					</li>
					<li class="nav-item">
						<div class="dropdown ps-2">
							<a class=" dropdown-toggle no-caret" href="#" role="button" data-bs-display="static" data-bs-toggle="dropdown" data-dropdown-animation data-bs-auto-close="outside" aria-expanded="false">
								<div class="avatar avatar-rounded avatar-xs">
									<?php if ($profile_pic == NULL) {
										?><img src="dist/logo/profileIcon.png" alt="user" class="avatar-img"><?php
									} else {
										?><img src="Uploads/ProfilePhotos/<?php echo $profile_pic; ?>" alt="user" class="avatar-img"><?php
									} ?>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-end">
								<div class="p-2">
									<div class="media">
										<div class="media-head me-2">
											<div class="avatar" onclick="profileButton()">
												<?php if ($profile_pic == NULL) {
													?><img src="dist/logo/profileIcon.png" alt="user" class="avatar-img"><?php
												} else {
													?><img src="Uploads/ProfilePhotos/<?php echo $profile_pic; ?>" alt="user" class="avatar-img"><?php
												} ?>
												<span class="initial-wrap"><?php 
												// $f_and_l = explode(" ",$user_name);
												// $f = substr($f_and_l[0], 0, 1);
												// $l = substr($f_and_l[1], 0, 1);
												// echo $f . $l; 
												?></span>
											</div>
										</div>
										<div class="media-body">
											<div class="dropdown">
											<strong onclick="profileButton()"><?php echo $user_name; ?></strong>
												<!-- <a href="#" class="d-block dropdown-toggle link-dark fw-medium"  data-bs-toggle="dropdown" data-dropdown-animation data-bs-auto-close="inside">Hencework</a> -->
												<div class="dropdown-menu dropdown-menu-end">
													<div class="p-2">
														<div class="media align-items-center active-user mb-3">
															<div class="media-head me-2">
																<div class="avatar avatar-primary avatar-xs avatar-rounded">
																	<!-- <span class="initial-wrap">Hk</span> -->
																</div>
															</div>
															<div class="media-body">
																<!-- <a href="#" class="d-flex align-items-center link-dark">Hencework <i class="ri-checkbox-circle-fill fs-7 text-primary ms-1"></i></a>
																<a href="#" class="d-block fs-8 link-secondary"><u>Manage your account</u></a> -->
															</div>
														</div>
														<div class="media align-items-center mb-3">
															<div class="media-head me-2">
																<!-- <div class="avatar avatar-xs avatar-rounded">
																	<img src="dist/img/avatar12.jpg" alt="user" class="avatar-img">
																</div> -->
															</div>
															<!-- <div class="media-body">
																<a href="#" class="d-block link-dark">Jampack Team</a>
																<a href="#" class="d-block fs-8 link-secondary">contact@hencework.com</a>
															</div> -->
														</div>
														<!-- <button class="btn btn-block btn-outline-light btn-sm">
															<span><span class="icon"><span class="feather-icon"><i data-feather="plus"></i></span></span>
															<span>Add Account</span></span>
														</button> -->
													</div>
												</div>
											</div>
											<div class="fs-7" onclick="profileButton()"><?php echo $user_email; ?></div>
											<a href="logOut.php" class="d-block fs-8 link-danger"><u>Log Out</u></a>
										</div>
									</div>
								</div>
								<div class="dropdown-divider"></div>
								<button type="button" class="btn btn-secondary" onclick="profileButton()">Profile</button>
								<!-- <div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#"><span class="dropdown-icon feather-icon"><i data-feather="tag"></i></span><span>Raise a ticket</span></a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Terms & Conditions</a>
								<a class="dropdown-item" href="#">Help & Support</a> -->
							</div>
						</div>
					</li>
				</ul>
			</div>
			<!-- /End Nav -->
			</div>									
		</nav>
		<!-- /Top Navbar -->
		<script>
			function profileButton() {
				window.location.href="profileMember.php";
			}
		</script>