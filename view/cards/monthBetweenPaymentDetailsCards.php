
<!-- Cards -->
<div class="row">
	<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
		<div class="card text-white bg-primary">
			<div class="card-header">Total <br> Collections</div>
			<div class="card-body">
				<h5 class="card-title text-white">₹<?php  if ( isset($_GET['fromDate']) && isset($_GET['toDate']) ) { echo $totalCollection; } else { echo "0"; } ?></h5>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
		<div class="card text-white bg-secondary ">
			<div class="card-header"><?php if ( isset($_GET['fromDate']) && isset($_GET['toDate']) ) { echo $months[ltrim($from_monthN, '0') - 1] . " To " . $months[ltrim($to_monthN, '0') - 1]; } else { echo "NA"; } ?> <br> Collections</div>
			<div class="card-body">
				<h5 class="card-title text-white">₹ <?php  if ( isset($_GET['fromDate']) && isset($_GET['toDate']) ) { if ( $thisMonthCollection == NULL ) { echo "0";  } else { echo $thisMonthCollection; } } else { echo "0"; } ?> </h5>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
		<div class="card text-white bg-warning">
			<div class="card-header">Total <br> Donation</div>
			<div class="card-body">
				<h5 class="card-title text-white">₹<?php  if ( isset($_GET['fromDate']) && isset($_GET['toDate']) ) { 
					if ( $donationAmout == NULL ) {
						echo "0";
					} else {
						echo $donationAmout;
					}
					 
					} else { echo "0"; } ?> </h5>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
		<div class="card text-white bg-success">
			<div class="card-header">Remaning <br> Amount </div>
			<div class="card-body">
				<h5 class="card-title text-white">₹ <?php  if ( isset($_GET['fromDate']) && isset($_GET['toDate']) ) { echo $total_remaing_amount; } else { echo "0"; } ?> </h5>
			</div>
		</div>
	</div>
	<!-- <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
		<div class="card text-white bg-warning">
			<div class="card-header">Header</div>
			<div class="card-body">
				<h5 class="card-title text-white">Warning Card</h5>
				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
		<div class="card text-white bg-info">
			<div class="card-header">Header</div>
			<div class="card-body">
				<h5 class="card-title text-white">Info Card</h5>
				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
		<div class="card bg-charcoal-light-5">
			<div class="card-header">Header</div>
			<div class="card-body">
				<h5 class="card-title">Light Card</h5>
				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
			</div>
		</div>
	</div>
	<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
		<div class="card text-white bg-dark">
			<div class="card-header">Header</div>
			<div class="card-body">
				<h5 class="card-title text-white">Dark Card</h5>
				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
			</div>
		</div>
	</div> -->
</div>
<!-- Card -->