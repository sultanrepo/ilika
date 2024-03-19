<?php

$user_id = $_SESSION['user_id'];

$query1 = "SELECT users_login.user_id, users_login.user_username, users_login.user_email, users_login.user_mob_number, user_details.user_name, user_details.user_curr_address, user_details.user_parm_address, user_details.user_star_donator, user_details.user_profession, user_details.user_marital_status, user_details.desc, user_details.profile_pic FROM users_login INNER JOIN user_details ON users_login.user_id='$user_id' AND user_details.user_id='$user_id'";
$result1 = mysqli_query($conn, $query1);
$rows1 = mysqli_fetch_array($result1);

// echo "<pre>";
// print_r($rows1);

$user_userName       = $rows1['user_username'];
$user_email          = $rows1['user_email'];
$user_mob_number     = $rows1['user_mob_number'];
$user_name           = $rows1['user_name'];
$user_curr_address   = $rows1['user_curr_address'];
$user_parm_address   = $rows1['user_parm_address'];
$user_star_donator   = $rows1['user_star_donator'];
$user_profession     = $rows1['user_profession'];
$user_marital_status = $rows1['user_marital_status'];
$desc                = $rows1['desc'];
$profile_pic         = $rows1['profile_pic'];

// if( $_GET === "Payment" ) {
// 	echo '<script type = "text/javascript">';
// 	echo 'window.onload = function(){';
// 	echo 'alert("ok")}';
// 	echo '</script>';
// }

//Total Contribution 
$result3 = mysqli_query($conn, "SELECT SUM(amount) FROM `deposit` WHERE user_id='$user_id'");
$rows3   = mysqli_fetch_array($result3, MYSQLI_NUM);
$totalContribution = $rows3[0];
?>
<!-- Main Content -->
		<div class="hk-pg-wrapper">
			<!-- Page Body -->
			<div class="hk-pg-body">
				<div class="container-xxl">
					<div class="profile-wrap">
						<div class="profile-img-wrap">
							<img class="img-fluid rounded-5" src="dist/img/profile-bg.jpg" alt="Image Description">
						</div>
						<div class="profile-intro">
							<div class="card card-flush mw-400p bg-transparent">
								<div class="card-body">
									<div class="avatar avatar-xxl avatar-rounded position-relative mb-2">
										<img src="Uploads/ProfilePhotos/<?php if ( $profile_pic === "" ) { echo "profileIcon.png"; } else { echo $profile_pic; } ?>" alt="user" class="avatar-img border border-4 border-white">
										<span class="badge badge-indicator badge-success  badge-indicator-xl position-bottom-end-overflow-1 me-1"></span>
									</div>
									<h4><?php echo $user_name ?>
										<i class="bi-check-circle-fill fs-6 text-blue" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Top endorsed"></i>
									</h4><strong> <u>
										<?php
										if ( $user_star_donator == null ) {
											echo "1";
										} else {
											echo $user_star_donator;
										} 
										?>⭐ Member</u></strong>
									<p>
										<?php 
										if ( $desc === "" ) {
											echo "NA";
										} else {
											echo $desc;
										}
										?>
									</p>
									<ul class="list-inline fs-7 mt-2 mb-0">
										<li class="list-inline-item d-sm-inline-block d-block mb-sm-0 mb-1 me-3">
										  <i class="bi bi-briefcase me-1"></i>
										  <a href="#">
											<?php
											if ( $user_profession == null ) {
												echo "NA";
											} else {
												echo $user_profession;
											}
											?></a>
										</li>
						  
										<li class="list-inline-item d-sm-inline-block d-block mb-sm-0 mb-1 me-3">
											<i class="bi bi-geo-alt me-1"></i>
											<a href="#">
												<?php 
												if ( $user_parm_address == null ) {
													echo "NA";
												} else {
													echo $user_parm_address;
												}
												?></a>
										  </li>
									</ul>
								</div>
							</div>
						</div>
						<!-- <header class="profile-header">
							<ul class="nav nav-line nav-tabs nav-icon nav-light h-100 d-md-flex d-none">
								<li class="nav-item">
									<a class="d-flex align-items-center nav-link active h-100" data-bs-toggle="tab" href="#">
										<span class="nav-link-text">Profile</span>
									</a>
								</li>
								<li class="nav-item">
									<a class="d-flex align-items-center nav-link h-100" data-bs-toggle="tab" href="#">
										<span class="nav-link-text">Network</span>
									</a>
								</li>
								<li class="nav-item">
									<a class="d-flex align-items-center nav-link h-100" data-bs-toggle="tab" href="#">
										<span class="nav-link-text">Subscription</span>
									</a>
								</li>
							</ul>
							<select class="form-select mw-200p d-md-none d-flex me-2">
								<option selected="">Profile</option>
								<option value="1">Teams</option>
								<option value="2">Projects</option>
								<option value="3">Connection</option>
							</select>
							<div class="profile-options-wrap">	
								<a class="btn btn-icon btn-soft-secondary dropdown-toggle no-caret" href="#" data-bs-toggle="dropdown"><span class="icon"><span class="feather-icon"><i data-feather="more-vertical"></i></span></span></a>
								<div class="dropdown-menu dropdown-menu-end">
									<a class="dropdown-item" href="#">Action</a>
									<a class="dropdown-item" href="#">Another action</a>
									<a class="dropdown-item" href="#">Something else here</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#">Separated link</a>
								</div>
							</div>
						</header> -->
                        <div class="dropdown-divider"></div>
						<div class="row mt-7">
							<div class="col-lg-4 mb-lg-0 mb-3">
								<div class="card card-border mb-lg-4 mb-3">
									<div class="card-header card-header-action">
										<div class="media align-items-center">
											<div class="media-head me-2">
												<div class="avatar avatar-sm avatar-rounded">
													<img src="Uploads/ProfilePhotos/<?php if ( $profile_pic === "" ) { echo "profileIcon.png"; } else { echo $profile_pic; } ?>" alt="user" class="avatar-img">
												</div>
											</div>
											<div class="media-body">
												<div class="fw-medium text-dark"><?php echo $user_userName; ?></div>
												<div class="fs-7">
													<?php 
													if ( $user_star_donator == null ) {
														echo "1";
													} else {
														echo $user_star_donator;
													}
													?>⭐ Member</div>
											</div>
										</div>
										<div class="card-action-wrap">
											<a class="btn btn-icon btn-rounded btn-flush-dark flush-soft-hover dropdown-toggle no-caret" href="#" data-bs-toggle="dropdown"><span class="icon"><span class="feather-icon"><i data-feather="settings"></i></span></span></a>
											<div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#uploadPhoto" href="#">Upload Photo</a>
												<a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#updateProfileModal" href="#">Update Profile</a>
                                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#changePassword" href="#">Change Password</a>
												<!-- <a class="dropdown-item" href="#">Another action</a>
												<a class="dropdown-item" href="#">Something else here</a>
												<div class="dropdown-divider"></div>
												<a class="dropdown-item" href="#">Separated link</a> -->
											</div>
										</div>
									</div>

                                    <!-- Modal forms For Update Profile Details-->
                                    <div class="modal fade" id="updateProfileModal" tabindex="-1" role="dialog" aria-labelledby="updateProfileModal" aria-hidden="true">
                                    	<div class="modal-dialog" role="document">
                                    		<div class="modal-content">
                                    			<div class="modal-header">
                                    				<h5 class="modal-title">Update Profile</h5>
                                    				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    					<span aria-hidden="true">×</span>
                                    				</button>
                                    			</div>
                                    			<div class="modal-body">
                                    				<form id="updateProfileDetailsForm" method="POST" >
                                                        <div class="mb-3">
                                    						<label class="form-label" for="">Name</label>
                                    						<input type="text" class="form-control" name="Name" id="Name" value="<?php echo $user_name; ?>" placeholder="Enter Name" required>
                                    					</div>
                                                        <div class="mb-3">
                                    						<label class="form-label" for="">User Name</label>
                                    						<input type="text" class="form-control" name="userName" id="userName" value="<?php echo $user_userName; ?>" placeholder="Enter User Name" readonly>
                                    					</div>
                                                        <div class="mb-3">
                                    						<label class="form-label" for="">Mobile Number</label>
                                    						<input type="text" class="form-control" name="mobileNumber" id="mobileNumber" value="<?php echo $user_mob_number ?>" placeholder="Enter Mobile Number" readonly>
                                    					</div>
                                    					<div class="mb-3">
                                    						<label class="form-label" for="exampleDropdownFormEmail1">Email address</label>
                                    						<input type="email" class="form-control" name="email" id="email" value="<?php echo $user_email; ?>" placeholder="email@example.com" readonly>
                                    					</div>
                                                        <div class="mb-3">
                                    						<label class="form-label" for="">Current Address</label>
                                    						<input type="text" class="form-control" name="currAddress" id="currAddress" value="<?php echo $user_curr_address; ?>" placeholder="Enter Current Address" required>
                                    					</div>
														<div class="mb-3">
															<input class="form-check-input" type="checkbox" value="" onclick="myFunction()" id="currParamAdd">
  															<label class="form-check-label" for="flexCheckDefault">
  															  <strong>Same as Current Address</strong>
  															</label>
														</div>
                                                        <div class="mb-3">
                                    						<label class="form-label" for="">Parmanent Address</label>
                                    						<input type="text" class="form-control" name="parmAddress" id="parmAddress" value="<?php echo $user_parm_address ?>" placeholder="Enter Parmanent Address" required>
                                    					</div>
                                                        <div class="mb-3">
                                    						<label class="form-label" for="">Profession</label>
                                    						<select class="form-control" name="prof" id="prof">
																<?php
																	if ( $user_profession != null ) {
																		?>
																		<option value="<?php echo $user_profession; ?>"><?php echo $user_profession; ?></option>
																		<?php
																	}
																?>
                                                                <option value="select">--- Select ---</option>
                                                                <option value="student">Student</option>
                                                                <option value="business">Business</option>
                                                                <option value="Engineer">Engineer</option>
                                                                <option value="Doctor">Doctor</option>
                                                                <option value="other">Others</option>
                                                            </select>
                                    					</div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Marital Status</label>
                                                            <select name="mariStat" id="mariStat" class="form-control">
																<?php
																	if ( $user_marital_status != null ) {
																		?>
																		<option value="<?php echo $user_marital_status ?>"><?php echo $user_marital_status; ?></option>
																		<?php
																	}
																?>
                                                                <option value="select">--- Select ---</option>
                                                                <option value="single">Single</option>
                                                                <option value="marride">Married</option>
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">About You in Short</label>
                                                            <input type="text" class="form-control" name="aboutYou" id="aboutYou" value="<?php echo $desc; ?>" placeholder="Enter About You in Short">
                                                        </div>
                                    					<button type="submit" class="btn btn-primary">Update</button>
                                    				</form>
                                    			</div>
                                    		</div>
                                    	</div>
                                    </div>
                                    <!-- Modal forms For Update Profile Details-->

                                    <!-- Modal forms For Upload Profile Photo-->
                                    <div class="modal fade" id="uploadPhoto" tabindex="-1" role="dialog" aria-labelledby="uploadPhoto" aria-hidden="true">
                                    	<div class="modal-dialog" role="document">
                                    		<div class="modal-content">
                                    			<div class="modal-header">
                                    				<h5 class="modal-title">Upload Profile Photo</h5>
                                    				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    					<span aria-hidden="true">×</span>
                                    				</button>
                                    			</div>
                                    			<div class="modal-body">
                                    				<form id="uploadPhotoForm" action="Controller/php/uploadProfilePhoto.php" method="POST" enctype="multipart/form-data" >
                                    					<div class="mb-3">
                                    						<label class="form-label">Upload Profile Photo</label>
                                    						<input type="file" class="form-control" name="profilePic" id="profilePic" placeholder="Upload Profile Photo" accept="image/*" required>
                                                        </div> 
														<img id="image-previewer"> <br>
                                    					<button type="submit" id="uploadPhotoButton" class="btn btn-primary">Upload</button>
                                    				</form>
                                    			</div>
                                    		</div>
                                    	</div>
                                    </div>
                                    <!-- Modal forms For Upload Profile Photo-->

                                    <!-- Modal forms for Change Password-->
                                    <div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="changePassword" aria-hidden="true">
                                    	<div class="modal-dialog" role="document">
                                    		<div class="modal-content">
                                    			<div class="modal-header">
                                    				<h5 class="modal-title">Change Password</h5>
                                    				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    					<span aria-hidden="true">×</span>
                                    				</button>
                                    			</div>
                                    			<div class="modal-body">
                                    				<form id="changePasswordForm" method="POST">
                                                        <div class="input-group password-check">
																<span class="input-affix-wrapper">
																	<input class="form-control" placeholder="Enter Old password" id="OldPassword" name="oldPassword" value="" type="password" required>
																	<a href="#" class="input-suffix text-muted">
																		<span class="feather-icon"><i class="form-icon" data-feather="eye"></i></span>
																		<span class="feather-icon d-none"><i class="form-icon" data-feather="eye-off"></i></span>
																	</a>
																</span>
														</div> <br>
                                                        <div class="input-group password-check">
																<span class="input-affix-wrapper">
																	<input class="form-control" placeholder="Enter New password" id="newPassword" name="newPassword" value="" type="password" required>
																	<a href="#" class="input-suffix text-muted">
																		<span class="feather-icon"><i class="form-icon" data-feather="eye"></i></span>
																		<span class="feather-icon d-none"><i class="form-icon" data-feather="eye-off"></i></span>
																	</a>
																</span>
														</div> <br>
                                                        <div class="input-group password-check">
																<span class="input-affix-wrapper">
																	<input class="form-control" placeholder="Enter Confirm password" id="conPassword" name="conPassword" value="" type="password" required>
																	<a href="#" class="input-suffix text-muted">
																		<span class="feather-icon"><i class="form-icon" data-feather="eye"></i></span>
																		<span class="feather-icon d-none"><i class="form-icon" data-feather="eye-off"></i></span>
																	</a>
																</span>
														</div> <br>
                                    					<button type="submit" class="btn btn-primary">Change Password</button>
                                    				</form>
                                    			</div>
                                    		</div>
                                    	</div>
                                    </div>
                                    <!-- Modal forms for Change Password-->

									<div class="card-body">
										<div class="d-flex text-center">
											<div class="flex-1 border-end">
												<div>
													<span class="d-block fs-4 text-dark mb-1">₹<?php echo $totalContribution; ?></span>
													<span class="d-block text-capitalize fs-7">Total Contribution</span>
												</div>
											</div>
											<div class="flex-1">
												<div>
													<span class="d-block fs-4 text-dark mb-1">2</span>
													<span class="d-block text-capitalize fs-7">Rewards</span>
												</div>
											</div>
											<!-- <div class="flex-1">
												<div>
													<span class="d-block fs-4 text-dark mb-1">433</span>
													<span class="d-block text-capitalize fs-7">views</span>
												</div>
											</div> -->
										</div>
									</div>
									
									<ul class="list-group list-group-flush">
										<li class="list-group-item border-0"><span><i class="bi bi-calendar-check-fill text-disabled me-2"></i><span class="text-muted">Went to:</span></span><span class="ms-2"><?php if ( $user_curr_address == null ) { echo "NA"; } else { echo $user_curr_address; } ?></span></li>
										<li class="list-group-item border-0"><span><i class="bi bi-briefcase-fill text-disabled me-2"></i><span class="text-muted">Working As:</span></span><span class="ms-2"><?php if ( $user_profession == null ) { echo "NA"; } else { echo $user_profession; } ?></span></li>
										<li class="list-group-item border-0"><span><i class="bi bi-house-door-fill text-disabled me-2"></i><span class="text-muted">Lives in:</span></span><span class="ms-2"></span><?php if ( $user_parm_address == null ) { echo "NA"; } else { echo $user_parm_address; } ?></li>
										<li class="list-group-item border-0"><span><i class="bi bi-geo-alt-fill text-disabled me-2"></i><span class="text-muted">Marital Status:</span></span><span class="ms-2"><?php if ( $user_marital_status == null ) { echo "NA"; } else { echo $user_marital_status; } ?></span></li>
									</ul>
								</div>
								
								<!-- Groups -->
                                <!-- Links -->
								
								
								<div class="card bg-primary text-center">
									<div class="twitter-slider-wrap card-body">
										<div class="twitter-icon text-center mb-3">
											<i class="fab fa-twitter"></i>
										</div>
										<div id="tweets_fetch" class="owl-carousel light-owl-dots owl-theme"></div>
									</div>
								</div>
							</div>
        

                            <!-- Posts -->

                        <div class="col-lg-8">
                        <div class="card-body">
							<div class="contact-list-view">
								<table id="datable_1" class="table nowrap w-100 mb-5">
									<thead>
										<tr>
											<th><span class="form-check fs-6 mb-0">
												<input type="checkbox" class="form-check-input check-select-all" id="customCheck1">
												<label class="form-check-label" for="customCheck1"></label>
											</span></th>
											<th>Mode</th>
											<th class="w-25">Amount</th>
											<th>Month/Year</th>
											<th>Date & Time</th>
											<th>Status</th>
											<th>Reason</th>
										</tr>
									</thead>
									<tbody>
										<?php
										//Getting All Payment Details!
										$result2 = mysqli_query($conn, "SELECT * FROM `deposit` WHERE user_id='$user_id' ORDER BY id DESC");
										while ( $rows2 = mysqli_fetch_array($result2) ) {
											$id 	            = $rows2['id'];
											$amount             = $rows2['amount'];
											$paymentMethod      = $rows2['payment_method'];
											$dateTime           = $rows2['created_at'];
											$status             = $rows2['status'];
											$month		        = $rows2['month_of'];
											$year		        = $rows2['year_of'];
											$modificationReason = $rows2['modificationReason'];
										?>
										<tr>
											<td>
											</td>
											<td>
												<div class="media align-items-center">
													<div class="media-head me-2">
														<div class="avatar avatar-xs avatar-rounded">
															<img src="
															<?php if ( $paymentMethod === "PhonePe" ) {
																echo "dist/img/PaymentIcons/PhonePe_New.jpg";
															} else if ( $paymentMethod === "Cash" ) {
																echo "dist/img/PaymentIcons/Cash_New.jpg";
															} else if ( $paymentMethod === "PayTM" ) {
																echo "dist/img/PaymentIcons/PayTM_New.jpg";
															} else if ( $paymentMethod === "NetBanking" ) {
																echo "dist/img/PaymentIcons/NetBanking_New.jpg";
															} else if ( $paymentMethod === "GPay" ) {
																echo "dist/img/PaymentIcons/GPay_New.jpg";
															} ?>
															" alt="Payment Icon" class="avatar-img">
														</div>
													</div>
													<div class="media-body">
														<!-- <div class="text-high-em">Sultan Ashraf</div>  -->
														<!-- <div class="fs-7"><a href="#" class="table-link-text link-medium-em">phonepay.in</a></div>  -->
													</div>
												</div>
											</td>
											<td>
												<div class="progress-lb-wrap">
													<!-- <div class="d-flex align-items-center">
														<div class="progress progress-bar-rounded progress-bar-xs flex-1">
															<div class="progress-bar bg-blue-dark-3 w-90" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
														</div>
														<div class="fs-8 ms-3">90%</div>
													</div> -->
													<div class="fs-8 ms-3"><strong>₹<?php echo $amount; ?></strong></div>
												</div>
											</td>
											<td><?php echo $month ."/". $year; ?></td>
											<td><?php echo $dateTime; ?></td>
											<td>
												<?php
												if ( $status === "PendingForApproval" ) {
													?>
													<span class="badge badge-soft-info  my-1  me-2">Pending For Approval</span>
													<?php
												} else if ( $status === "Approved" ) {
													?>
													<span class="badge badge-soft-success  my-1  me-2">Approved</span>
													<?php
												} else if ( $status === "ApprovedWithModification" ) {
													?>
													<span class="badge badge-soft-success  my-1  me-2">Approved With Modification</span>
													<?php
												} else if ( $status === "Rejected" ) {
													?>
													<span class="badge badge-soft-danger  my-1  me-2">Rejected</span>
													<?php
												}
												?>
												<!-- <span class="badge badge-soft-info  my-1  me-2">Pending For Approval</span> -->
												<!-- <span class="badge badge-soft-secondary my-1  me-2">Finance</span> -->
											</td>
											<td>
												<?php 
												if ( $modificationReason == "NA" ) {
													echo "✔️";
												} else if ( $modificationReason == "Pending" ) {
													echo "⌛";
												}
												else {
												?>
												<div id="reason" onclick="getReason('<?php echo $id; ?>');" >
													<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-message-circle-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
														<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
														<path d="M3 20l1.3 -3.9a9 8 0 1 1 3.4 2.9l-4.7 1"></path>
														<line x1="12" y1="12" x2="12" y2="12.01"></line>
														<line x1="8" y1="12" x2="8" y2="12.01"></line>
														<line x1="16" y1="12" x2="16" y2="12.01"></line>
													</svg>
												</div>
												<?php } ?>
											</td>
											<!-- <td>
												<div class="d-flex align-items-center"> -->
													<!-- <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Edit" href="#"><span class="icon"><span class="feather-icon"><i data-feather="edit-2"></i></span></span></a>
													<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover del-button" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Delete" href="#"><span class="icon"><span class="feather-icon"><i data-feather="trash"></i></span></span></a> -->
												<!-- </div>
											</td> -->
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
                            </div>
                        </div>
						<!-- <p id="news1"><b>New content 1...</b></p> -->
						</div>
					</div>
				</div>
			</div>
			<!-- /Page Body -->

			<!-- Page Footer -->
			<?php include("footerContent.php"); ?>
            <!-- / Page Footer -->

		</div>
		<!-- /Main Content -->
		<script>
			function myFunction() {
			  var checkBox = document.getElementById("currParamAdd");
			  var currAddress = document.getElementById("currAddress").value;
			  var parmAddress = document.getElementById("parmAddress");
			  if (checkBox.checked == true){
				parmAddress.value = "";
				parmAddress.value = currAddress;
			  } else {
			     parmAddress.value = "";
			  }
			}
		</script>