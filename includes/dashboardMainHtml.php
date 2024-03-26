<!-- Page Body -->
<div class="hk-pg-body">
					<div class="tab-content">
						<div class="tab-pane fade show active" id="tab_block_1">
							<div class="row">
								<div class="col-xxl-9 col-lg-8 col-md-7 mb-md-4 mb-3">
									<div class="card card-border mb-0 h-100">
										<div class="card-header card-header-action">
											<h6>Collection Overview</h6>
										</div>
										<div class="card-body">
											<div class="text-center">
												<div class="d-inline-block">
													<span class="badge-status">
														<span class="badge bg-primary badge-indicator badge-indicator-nobdr"></span>
														<span class="badge-label">PhonePe/PayTM</span>
													</span>
												</div>
												<div class="d-inline-block ms-3">
													<span class="badge-status">
														<span class="badge bg-primary-light-2 badge-indicator badge-indicator-nobdr"></span>
														<span class="badge-label">Cash</span>
													</span>
												</div>
												<div class="d-inline-block ms-3">
													<span class="badge-status">
														<span class="badge bg-primary-light-4 badge-indicator badge-indicator-nobdr"></span>
														<span class="badge-label">Bank Transfer</span>
													</span>
												</div>
											</div>
											<!-- <div id="column_chart_2"></div> -->
											<div class="separator-full mt-5"></div>
											<div class="flex-grow-1 ms-lg-3">
												<div class="row">
													<div class="col-xxl-3 col-sm-6 mb-xxl-0 mb-3">
														<span class="d-block fw-medium fs-7">Members</span>
														<div class="d-flex align-items-center">
															<span class="d-block fs-4 fw-medium text-dark mb-0"><?php echo $usersCount; ?></span>
															<span class="badge badge-sm badge-soft-success ms-1">
																<i class="bi bi-arrow-up"></i> 7.5%
															</span>
														</div>
													</div>
													<div class="col-xxl-3 col-sm-6 mb-xxl-0 mb-3">
														<span class="d-block fw-medium fs-7">5⭐ Members</span>
														<div class="d-flex align-items-center">
															<span class="d-block fs-4 fw-medium text-dark mb-0">3</span>
															<span class="badge badge-sm badge-soft-success ms-1">
																<i class="bi bi-arrow-up"></i> 7.2%
															</span>
														</div>
													</div>
													<div class="col-xxl-3 col-sm-6 mb-xxl-0 mb-3">
														<span class="d-block fw-medium fs-7">This Year Collection</span>
														<div class="d-flex align-items-center">
															<span class="d-block fs-4 fw-medium text-dark mb-0">₹<?php echo $thisYearCollection; ?></span>
															<span class="badge badge-sm badge-soft-success ms-1">
																<i class="bi bi-arrow-up"></i> 0.2%
															</span>
														</div>
													</div>
													<div class="col-xxl-3 col-sm-6">
														<span class="d-block fw-medium fs-7">This Year Donation</span>
														<div class="d-flex align-items-center">
															<span class="d-block fs-4 fw-medium text-dark mb-0">₹<?php echo $thisYearDonation; ?></span>
															<span class="badge badge-sm badge-soft-success ms-1">
																<i class="bi bi-arrow-up"></i> 10.8%
															</span>
														</div>
													</div>
												</div>	
											</div>
										</div>
									</div>
								</div>
								<div class="col-xxl-3 col-lg-4 col-md-5 mb-md-4 mb-3">
									<div class="card card-border mb-0  h-100">
										<div class="card-header card-header-action">
											<h6>Members Payment Ontime/Delay For September (Feature Coming Soon)</h6>
											<!-- <div class="card-action-wrap">
												<a class="btn btn-icon btn-rounded btn-flush-dark flush-soft-hover dropdown-toggle no-caret" href="#" data-bs-toggle="dropdown"><span class="icon"><span class="feather-icon"><i data-feather="more-vertical"></i></span></span></a>
												<div class="dropdown-menu dropdown-menu-end">
													<a class="dropdown-item" href="#">Action</a>
													<a class="dropdown-item" href="#">Another action</a>
													<a class="dropdown-item" href="#">Something else here</a>
													<div class="dropdown-divider"></div>
													<a class="dropdown-item" href="#">Separated link</a>
												</div>
											</div> -->
										</div>
										<div class="card-body text-center">
											<div id="radial_chart_2"></div>
											<div class="d-inline-block mt-4">
												<div class="mb-4">
													<span class="d-block badge-status lh-1">
														<span class="badge bg-primary badge-indicator badge-indicator-nobdr d-inline-block"></span>
														<span class="badge-label d-inline-block">Ontime</span>
													</span>
													<span class="d-block text-dark fs-5 fw-medium mb-0 mt-1">₹ --,---</span>
												</div>
												<div>
													<span class="badge-status lh-1">
														<span class="badge bg-primary-light-2 badge-indicator badge-indicator-nobdr"></span>
														<span class="badge-label">Delay</span>
													</span>
													<span class="d-block text-dark fs-5 fw-medium mb-0 mt-1">₹ --,---</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>	
							<div class="row">
								<div class="col-md-12 mb-md-4 mb-3">
									<div class="card card-border mb-0 h-100">
										<div class="card-header card-header-action">
											<h6>Active users</h6>
											<div class="card-action-wrap">
												<button type="button" class="btn btn-outline-light">Real time chart</button>
											</div>
										</div>
										<div class="card-body">
											<div class="row">
												<div class="col-md-8">
													<div id="anim_map_2" class="h-300p"></div>
												</div>
												<div class="col-md-4">
												<div class="media align-items-center mb-3">
														<div class="media-head me-3">
															<div class="avatar avatar-xxs avatar-rounded">
																<img src="dist/fonts/flags/4x3/in.svg" alt="user" class="avatar-img">
															</div>
														</div>
														<div class="media-body">
															<div class="progress-lb-wrap">
																<label class="progress-label mb-0">India</label>
																<div class="d-flex align-items-center">
																	<div class="progress progress-bar-rounded progress-bar-xs flex-1">
																		<div class="progress-bar bg-blue w-100" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
																	</div>
																	<div class="fs-8 mnw-30p ms-3">100%</div>
																</div>
															</div>
															
														</div>
													</div>
													<div class="media align-items-center mb-3">
														<div class="media-head me-3">
															<div class="avatar avatar-xxs avatar-rounded">
																<img src="dist/fonts/flags/4x3/us.svg" alt="user" class="avatar-img">
															</div>
														</div>
														<div class="media-body">
															<div class="progress-lb-wrap">
																<label class="progress-label mb-0">United States</label>
																<div class="d-flex align-items-center">
																	<div class="progress progress-bar-rounded progress-bar-xs flex-1">
																		<div class="progress-bar bg-blue-dark-3 w-0" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
																	</div>
																	<div class="fs-8 mnw-30p ms-3">0%</div>
																</div>
															</div>
															
														</div>
													</div>
													<div class="media align-items-center mb-3">
														<div class="media-head me-3">
															<div class="avatar avatar-xxs avatar-rounded">
																<img src="dist/fonts/flags/4x3/gb.svg" alt="user" class="avatar-img">
															</div>
														</div>
														<div class="media-body">
															<div class="progress-lb-wrap">
																<label class="progress-label mb-0">United Kingdom</label>
																<div class="d-flex align-items-center">
																	<div class="progress progress-bar-rounded progress-bar-xs flex-1">
																		<div class="progress-bar bg-primary w-0" role="progressbar" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
																	</div>
																	<div class="fs-8 mnw-30p ms-3">0%</div>
																</div>
															</div>
															
														</div>
													</div>
													<div class="media align-items-center mb-3">
														<div class="media-head me-3">
															<div class="avatar avatar-xxs avatar-rounded">
																<img src="dist/fonts/flags/4x3/au.svg" alt="user" class="avatar-img">
															</div>
														</div>
														<div class="media-body">
															<div class="progress-lb-wrap">
																<label class="progress-label mb-0">Australia</label>
																<div class="d-flex align-items-center">
																	<div class="progress progress-bar-rounded progress-bar-xs flex-1">
																		<div class="progress-bar bg-grey-dark-2 w-0" role="progressbar" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
																	</div>
																	<div class="fs-8 mnw-30p ms-3">0%</div>
																</div>
															</div>
															
														</div>
													</div>
													<div class="media align-items-center">
														<div class="media-head me-3">
															<div class="avatar avatar-xxs avatar-rounded">
																<img src="dist/fonts/flags/4x3/ca.svg" alt="user" class="avatar-img">
															</div>
														</div>
														<div class="media-body">
															<div class="progress-lb-wrap">
																<label class="progress-label mb-0">Canada</label>
																<div class="d-flex align-items-center">
																	<div class="progress progress-bar-rounded progress-bar-xs flex-1">
																		<div class="progress-bar bg-grey w-0" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
																	</div>
																	<div class="fs-8 mnw-30p ms-3">0%</div>
																</div>
															</div>
															
														</div>
													</div>
													
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 mb-md-4 mb-3">
									<div class="card card-border mb-0 h-100">
										<div class="card-header card-header-action">
											<h6>New Collections (<?php echo $monthName; ?>)
												<!-- <span class="badge badge-sm badge-light ms-1">240</span> -->
											</h6>
											<div class="card-action-wrap">
												<button class="btn btn-sm btn-outline-light"><span><span class="icon"><span class="feather-icon"><i data-feather="upload"></i></span></span><span class="btn-text">import as PDF</span></span></button>
												<!-- <button class="btn btn-sm btn-primary ms-3"><span><span class="icon"><span class="feather-icon"><i data-feather="plus"></i></span></span><span class="btn-text">Add new</span></span></button> -->
											</div>
										</div>
										<div class="card-body">
											<div class="contact-list-view">
												<table id="datable_1" class="table nowrap w-100 mb-5">
													<thead>
														<tr>
															<th><span class="form-check fs-6 mb-0">
																<input type="checkbox" class="form-check-input check-select-all" id="customCheck1">
																<label class="form-check-label" for="customCheck1"></label>
															</span></th>
															<th>Name</th>
															<th class="w-25">Amount</th>
															<th>Date & Time</th>
															<th>Star Details</th>
															<th></th>
														</tr>
													</thead>
													<tbody>
														<?php
														$result6 = mysqli_query($conn, "SELECT * FROM deposit WHERE month_of='$monthN' AND year_of='$yearN'");
														//echo  "SELECT * FROM deposit WHERE month_of='$monthN' AND year_of='$yearN'";
														$rowCount = mysqli_num_rows($result6);
														if ( $rowCount == 0 ) {}
														else {
														while ( $rows6 = mysqli_fetch_array($result6) ) {
															$user_id			 = $rows6['user_id'];
                                                    		$amount              = $rows6['amount'];
                                                    		$payment_Method      = $rows6['payment_method'];
                                                    		$payment_status      = $rows6['status'];   
                                                    		$date_time           = $rows6['created_at'];
                                                    		$result7 = mysqli_query($conn, "SELECT users_login.user_email, users_login.user_mob_number, user_details.user_name, user_details.profile_pic, user_details.user_star_donator FROM `users_login` INNER JOIN user_details WHERE users_login.user_id='$user_id' AND user_details.user_id='$user_id'");
                                                    		$rows7   = mysqli_fetch_array($result7);
															$user_email          = $rows7['user_email'];
															$user_mob_number     = $rows7['user_mob_number'];
															$user_name           = $rows7['user_name'];
															$user_star_donator   = $rows7['user_star_donator'];
															$profile_pic         = $rows7['profile_pic'];
															?>
														<tr>
															<td>
															</td>
															<td>
																<div class="media align-items-center">
																	<div class="media-head me-2">
																		<div class="avatar avatar-xs avatar-rounded">
																			<img src="dist/img/phonePe.png" alt="user" class="avatar-img">
																		</div>
																	</div>
																	<div class="media-body">
																		<div class="text-high-em"><?php echo $user_name; ?></div> 
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
															<td><?php echo $date_time; ?></td>
															<td>
																<span class="badge badge-soft-secondary  my-1  me-2"><?php echo $user_star_donator; ?>⭐ Member</span>
																<!-- <span class="badge badge-soft-secondary my-1  me-2">Finance</span> -->
															</td>
															<td>
																<div class="d-flex align-items-center">
																	<!-- <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Edit" href="#"><span class="icon"><span class="feather-icon"><i data-feather="edit-2"></i></span></span></a>
																	<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover del-button" data-bs-toggle="tooltip" data-placement="top" title="" data-bs-original-title="Delete" href="#"><span class="icon"><span class="feather-icon"><i data-feather="trash"></i></span></span></a> -->
																</div>
															</td>
														</tr>
														<?php
														}
													}
														?>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>	
						</div>
					</div>
				</div>
				<!-- /Page Body -->	