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
<div class="hk-pg-wrapper">
	<div class="container-xxl">
        <!-- Page Header -->
				<div class="hk-pg-header pg-header-wth-tab">
					<div class="d-flex">
						<div class="d-flex flex-wrap justify-content-between flex-1">
							<div class="mb-lg-0 mb-2 me-8">
								<h1 class="pg-title">Donation List</h1>
								<p></p>
							</div>
						</div>
					</div>
				</div>
				<!-- /Page Header -->
                <hr>
<?php

//Include Get Payment Details Form
//include("view/forms/monthlyPaymentDetailsForm.php");

//Message
if ( $_GET['status'] == "paid" ) {
	?>
	<script>
		Swal.fire({
		  position: 'top-center',
		  icon: 'success',
		  title: 'Donation Successfull...!',
		  showConfirmButton: false,
		  timer: 3000
		})
	</script>
	<?php
}

//Include Payment Details Cards
include("view/cards/donation-new.php");

//Include to Get Table
include("view/tables/donation-table.php");

?>
</div>
			
		<!-- Page Footer -->
		<?php include("footerContent.php"); ?>
        <!-- / Page Footer -->
		</div>
		<!-- /Main Content -->
<?php

//Include Footer
include("footer.php");


?>