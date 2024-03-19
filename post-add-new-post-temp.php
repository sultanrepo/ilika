<?php

//Session
include("session/sessionTrack.php");

//DataBase
include("DBConfig/connection.php");

// include header
include("header.php");

//include Top Nav Bar
include("navBarTop.php");

//Include Left Nav Bar
include("navBarLeft.php");

?>
<!-- Main Content -->
<div class="hk-pg-wrapper pb-0">
			<div class="hk-pg-body py-0">
				<div class="blogapp-wrap">
					<nav class="blogapp-sidebar">
						<div data-simplebar class="nicescroll-bar">
							<div class="menu-content-wrap">
								<a href="post-add-new-post.php" class="btn btn-primary btn-rounded btn-block mb-4">
									Create Post
								</a>
								<div class="menu-group">
									<ul class="nav nav-light navbar-nav flex-column">
										<li class="nav-item active">
											<a class="nav-link" href="javascript:void(0);">
												<span class="nav-icon-wrap"><span class="feather-icon"><i data-feather="users"></i></span></span>
												<span class="nav-link-text">Posts Donation</span>
											</a>
                                        </li>
									</ul>
								</div>
							</div>
						</div>
					</nav>
					<div class="blogapp-content">
						<div class="blogapp-detail-wrap">
							<header class="blog-header">
								<div class="d-flex align-items-center">
									<a class="blogapp-title link-dark" href="#">
										<h1>Add New Donation Request</h1>
									</a>
								</div>
								<div class="blog-options-wrap">	
									<a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover hk-navbar-togglable d-sm-inline-block d-none" href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" data-bs-original-title="Collapse">
										<span class="icon">
											<span class="feather-icon"><i data-feather="chevron-up"></i></span>
											<span class="feather-icon d-none"><i data-feather="chevron-down"></i></span>
										</span>
									</a>
								</div>
								<div class="hk-sidebar-togglable"></div>
							</header>
							<div class="blog-body">
								<div data-simplebar class="nicescroll-bar">
									<div class="container-fluid">
										<div class="row">
											<div class="col-xxl-9 col-lg-8">
												<form class="edit-post-form">
													<div class="form-group">
														<label class="form-label">Post Title</label>
														<input class="form-control"  placeholder="Post Title">
													</div>
													<div class="form-group">
														<label class="form-label">Permalink</label>
														<input class="form-control"  placeholder="Permalink">
													</div>
													<div class="card card-border advance-option-post">
														<div class="card-body">
															<h5 class="card-title">Uploads Images</h5>
															<ul class="nav nav-tabs nav-line nav-icon nav-light border-bottom">
																<li class="nav-item">
																	<a class="nav-link active" data-bs-toggle="tab" href="#tab_summery">
																		<span class="nav-icon-wrap"><span class="feather-icon"><i data-feather="zap"></i></span></span>
																		<span class="nav-link-text">Post Slider Images</span>
																	</a>
																</li>
															</ul>
															<div class="tab-content">
																<div class="tab-pane fade show active" id="tab_summery">
																	<input type="file" class="dropify" />
																</div>
															</div>
														</div>	
													</div>	
												</form>
											</div>
											<div class="col-xxl-3 col-lg-4">
												<div class="content-aside">
													<button class="btn btn-primary btn-block mb-3">Publish</button>
													<div class="card card-border">
														<div class="card-body">
															<form class="edit-post-form">
																<div class="form-group">
																	<label class="form-label">Published Date</label>
																	<input class="form-control" name="single-date" value="02/12/20 8:30PM">
																</div>
																<div class="form-group">
																	<label class="form-label">Visibility</label>
																	<select class="form-select">
																		<option selected value="1">Public</option>
																		<option value="2">Private</option>
																	</select>
																</div>
																<div class="form-group">
																	<label class="form-label">Status</label>
																	<select class="form-select">
																		<option selected value="1">--</option>
																	</select>
																</div>
															</form>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Add Category -->
						<div id="add_new_cat" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
								<div class="modal-content">
									<div class="modal-body">
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">×</span>
										</button>
										<h6 class="text-uppercase fw-bold mb-3">Add Category</h6>
										<form>
											<div class="row gx-3">
												<div class="col-sm-12">
													<div class="form-group">
														<input class="form-control" type="text" placeholder="Category Name"/>
													</div>
												</div>
											</div>
											<button type="button" class="btn btn-primary float-end" data-bs-dismiss="modal">Add</button>
										</form>
									</div>
								</div>
							</div>
						</div>
						<!-- /Add Category -->
						
						<!-- Add Tag -->
						<div id="add_new_tag" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
								<div class="modal-content">
									<div class="modal-body">
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">×</span>
										</button>
										<h6 class="text-uppercase fw-bold mb-3">Add Tag</h6>
										<form>
											<div class="row gx-3">
												<div class="col-sm-12">
													<div class="form-group">
														<select id="input_tags_1" class="form-control" multiple="multiple">
															<option selected="selected">Collaborator</option>
															<option selected="selected">Designer</option>
															<option selected="selected">React Developer</option>
															<option selected="selected">Promotion</option>
															<option selected="selected">Advertisement</option>
														</select>
													</div>
												</div>
											</div>
											<button type="button" class="btn btn-primary float-end" data-bs-dismiss="modal">Add</button>
										</form>
									</div>
								</div>
							</div>
						</div>
						<!-- Add Tag -->
					</div>
				</div>
			</div>
			<!-- /Page Body -->
		</div>
		<!-- /Main Content -->
<?php

// //Include Get Payment Details Form
// include("view/forms/monthlyPaymentDetailsForm.php");

// //Include Payment Details Cards
// include("view/cards/monthlyPaymentDetailsCards.php");

// //Include to Get Table
// include("view/tables/monthlyPaymentTable.php");

?>
<!-- </div> -->
			
		<!-- Page Footer -->
		<?php //include("footerContent.php"); ?>
        <!-- / Page Footer -->
		<!-- </div> -->
		<!-- /Main Content -->
<?php

include("footerContent.php");

//Include Footer
include("footer.php");


?>