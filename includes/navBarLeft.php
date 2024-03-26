<?php

//DataBase
include ("DBConfig/connection.php");
//Getting User Type
$user_id = $_SESSION['user_id'];
$result101 = mysqli_query($conn, "SELECT user_type FROM `users_login` WHERE user_id='$user_id'");
$rows101 = mysqli_fetch_array($result101);
$userType = $rows101['user_type'];
?>

<!-- Vertical Nav -->
<div class="hk-menu">
	<!-- Brand -->
	<div class="menu-header">
		<span>
			<a class="navbar-brand" href="#">
				<img class="brand-img img-fluid" width="50px" height="50px" src="dist/logo/ILIKA_ICON.png"
					alt="brand" />
				<img class="brand-img img-fluid" width="140px" height="50px" src="dist/logo/ILIKA_Name.png"
					alt="brand" />
				<!-- <p class="brand-img img-fluid">ADAM CC</p> -->
			</a>
			<button class="btn btn-icon btn-rounded btn-flush-dark flush-soft-hover navbar-toggle">
				<span class="icon">
					<span class="svg-icon fs-5">
						<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-bar-to-left"
							width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
							fill="none" stroke-linecap="round" stroke-linejoin="round">
							<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
							<line x1="10" y1="12" x2="20" y2="12"></line>
							<line x1="10" y1="12" x2="14" y2="16"></line>
							<line x1="10" y1="12" x2="14" y2="8"></line>
							<line x1="4" y1="4" x2="4" y2="20"></line>
						</svg>
					</span>
				</span>
			</button>
		</span>
	</div>
	<!-- /Brand -->

	<!-- Main Menu -->
	<div data-simplebar class="nicescroll-bar">
		<div class="menu-content-wrap">
			<div class="menu-group">
				<ul class="navbar-nav flex-column">
					<li class="nav-item active">
						<a class="nav-link" href="dashboardMember.php">
							<span class="nav-icon-wrap">
								<span class="svg-icon">
									<svg xmlns="http://www.w3.org/2000/svg"
										class="icon icon-tabler icon-tabler-template" width="24" height="24"
										viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
										stroke-linecap="round" stroke-linejoin="round">
										<path stroke="none" d="M0 0h24v24H0z" fill="none" />
										<rect x="4" y="4" width="16" height="4" rx="1" />
										<rect x="4" y="12" width="6" height="8" rx="1" />
										<line x1="14" y1="12" x2="20" y2="12" />
										<line x1="14" y1="16" x2="20" y2="16" />
										<line x1="14" y1="20" x2="20" y2="20" />
									</svg>
								</span>
							</span>
							<span class="nav-link-text">Dashboard</span>
							<span class="badge badge-sm badge-soft-pink ms-auto">New</span>
						</a>
					</li>
				</ul>
			</div>
			<div class="menu-gap"></div>
			<div class="menu-group">
				<div class="nav-header">
					<span>Apps</span>
				</div>
				<ul class="navbar-nav flex-column">
					<li class="nav-item">
						<a class="nav-link" href="clients.php">
							<span class="nav-icon-wrap">
								<span class="svg-icon">
									<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users"
										width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
										stroke="currentColor" fill="none" stroke-linecap="round"
										stroke-linejoin="round">
										<path stroke="none" d="M0 0h24v24H0z" fill="none" />
										<circle cx="9" cy="7" r="4" />
										<path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
										<path d="M16 3.13a4 4 0 0 1 0 7.75" />
										<path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
									</svg>
								</span>
							</span>
							<span class="nav-link-text">Clients</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="projects.php">
							<span class="nav-icon-wrap">
								<span class="svg-icon">
									<svg xmlns="http://www.w3.org/2000/svg"
										class="icon icon-tabler icon-tabler-list-details" width="24" height="24"
										viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
										stroke-linecap="round" stroke-linejoin="round">
										<path stroke="none" d="M0 0h24v24H0z" fill="none" />
										<path d="M13 5h8" />
										<path d="M13 9h5" />
										<path d="M13 15h8" />
										<path d="M13 19h5" />
										<rect x="3" y="4" width="6" height="6" rx="1" />
										<rect x="3" y="14" width="6" height="6" rx="1" />
									</svg>
								</span>
							</span>
							<span class="nav-link-text">Projects</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="suppliers.php">
							<span class="nav-icon-wrap">
								<span class="svg-icon">
									<svg xmlns="http://www.w3.org/2000/svg"
										class="icon icon-tabler icon-tabler-user-plus" width="24" height="24"
										viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
										stroke-linecap="round" stroke-linejoin="round">
										<path stroke="none" d="M0 0h24v24H0z" fill="none" />
										<circle cx="9" cy="7" r="4" />
										<path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
										<path d="M16 11h6m-3 -3v6" />
									</svg>
								</span>
							</span>
							<span class="nav-link-text">Suppliers</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="leads.php">
							<span class="nav-icon-wrap">
								<span class="svg-icon">
									<svg xmlns="http://www.w3.org/2000/svg"
										class="icon icon-tabler icon-tabler-file-check" width="24" height="24"
										viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
										stroke-linecap="round" stroke-linejoin="round">
										<path stroke="none" d="M0 0h24v24H0z" fill="none" />
										<path d="M14 3v4a1 1 0 0 0 1 1h4" />
										<path
											d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
										<path d="M9 15l2 2l4 -4" />
									</svg>
								</span>
							</span>
							<span class="nav-link-text">Leads</span>
						</a>
					</li>
					<?php
					if ($userType == "admin") {
						?>
						<li class="nav-item">
							<a class="nav-link" href="membersApprovalList.php">
								<span class="nav-icon-wrap">
									<span class="svg-icon">
										<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users"
											width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
											stroke="currentColor" fill="none" stroke-linecap="round"
											stroke-linejoin="round">
											<path stroke="none" d="M0 0h24v24H0z" fill="none" />
											<circle cx="9" cy="7" r="4" />
											<path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
											<path d="M16 3.13a4 4 0 0 1 0 7.75" />
											<path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
										</svg>
									</span>
								</span>
								<span class="nav-link-text">Pending Approval Users</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="paymentApprovalList.php">
								<span class="nav-icon-wrap">
									<span class="svg-icon">
										<svg xmlns="http://www.w3.org/2000/svg"
											class="icon icon-tabler icon-tabler-currency-rupee" width="24" height="24"
											viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
											stroke-linecap="round" stroke-linejoin="round">
											<path stroke="none" d="M0 0h24v24H0z" fill="none" />
											<path d="M18 5h-11h3a4 4 0 0 1 0 8h-3l6 6" />
											<line x1="7" y1="9" x2="18" y2="9" />
										</svg>
									</span>
								</span>
								<span class="nav-link-text">Pending Approval Payments</span>
							</a>
						</li>
						<?php
					}
					?>
					<!-- <li class="nav-item">
						<a class="nav-link" href="javascript:void(0);" data-bs-toggle="collapse"
							data-bs-target="#dash_chat">
							<span class="nav-icon-wrap">
								<span class="svg-icon">
									<svg xmlns="http://www.w3.org/2000/svg"
										class="icon icon-tabler icon-tabler-currency-rupee" width="24" height="24"
										viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
										stroke-linecap="round" stroke-linejoin="round">
										<path stroke="none" d="M0 0h24v24H0z" fill="none" />
										<path d="M18 5h-11h3a4 4 0 0 1 0 8h-3l6 6" />
										<line x1="7" y1="9" x2="18" y2="9" />
									</svg>
								</span>
							</span>
							<span class="nav-link-text">Payments Details</span>
						</a>
						<ul id="dash_chat" class="nav flex-column collapse  nav-children">
							<li class="nav-item">
								<ul class="nav flex-column">
									<li class="nav-item">
										<a class="nav-link" href="reportMonthly.php"><span
												class="nav-link-text">Monthly</span></a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="reportMonthBetween.php"><span
												class="nav-link-text">Month Between</span></a>
									</li>
								</ul>
							</li>
						</ul>
					</li> -->
					<!-- <li class="nav-item">
						<a class="nav-link" href="javascript:void(0);" data-bs-toggle="collapse"
							data-bs-target="#dash_blog">
							<span class="nav-icon-wrap">
								<span class="svg-icon">
									<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-browser"
										width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
										stroke="currentColor" fill="none" stroke-linecap="round"
										stroke-linejoin="round">
										<path stroke="none" d="M0 0h24v24H0z" fill="none" />
										<rect x="4" y="4" width="16" height="16" rx="1" />
										<line x1="4" y1="8" x2="20" y2="8" />
										<line x1="8" y1="4" x2="8" y2="8" />
									</svg>
								</span>
							</span>
							<span class="nav-link-text">Donation</span>
						</a>
						<ul id="dash_blog" class="nav flex-column collapse  nav-children">
							<li class="nav-item">
								<ul class="nav flex-column">
									<?php
									//if ($userType == "admin") {
									?>
										<li class="nav-item">
											<a class="nav-link" href="donation-new.php"><span class="nav-link-text">New
													Donation</span></a>
										</li>
									<?php //}  ?>
									<li class="nav-item">
										<a class="nav-link" href="donation-list.php"><span
												class="nav-link-text">Donation List</span></a>
									</li>
								</ul>
							</li>
						</ul>
					</li> -->
				</ul>
			</div>

			<!-- <div class="callout card card-flush bg-orange-light-5 text-center mt-5 w-220p mx-auto">
				<div class="card-body">
					<h5 class="h5">JazakAllahu Khairan</h5>
					<p class="p-sm card-text">"Indeed, Allah is with the patient " Inna Allah ma as- sabireen (2:153)
						إِنَّ اللّهَ مَعَ الصَّابِرِينَ ٢:١٥٣.</p>
					<a href="#" target="_blank" class="btn btn-primary btn-block">Go Sabr Foundation</a>
				</div>
			</div> -->
		</div>
	</div>
	<!-- /Main Menu -->
</div>
<div id="hk_menu_backdrop" class="hk-menu-backdrop"></div>
<!-- /Vertical Nav -->