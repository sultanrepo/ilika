<?php

$pid = $_GET['pid'];
$username = $_GET['username'];
$status = "Terminate";
$ip = $_GET['ipaddress'];

?>
<!DOCTYPE html>

<html lang="en">


<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ILIKA INSIGHTS</title>
    <meta name="description" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="dist/favIcon/ILIKA-CIRCLE.png">
    <link rel="icon" href="" type="image/x-icon">

    <!-- CSS -->
    <link href="dist/css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <!-- Wrapper -->
    <div class="hk-wrapper hk-pg-auth" data-footer="simple">
        <!-- Top Navbar -->
        <nav class="hk-navbar navbar navbar-expand-xl navbar-light fixed-top">
            <div class="container-xxl">
                <!-- Start Nav -->
                <div class="nav-start-wrap">
                    <a class="navbar-brand" href="index.html">
                        <img width="50px" height="50px" class="brand-img d-inline-block"
                            src="dist/favIcon/ILIKA-CIRCLE.png" alt="brand" />
                    </a>
                </div>
                <!-- /Start Nav -->
            </div>

        </nav>
        <!-- /Top Navbar -->

        <!-- Main Content -->
        <div class="hk-pg-wrapper">
            <!-- Page Body -->
            <div class="hk-pg-body">
                <!-- Container -->
                <div class="container-xxl">
                    <!-- Row -->
                    <div class="row">
                        <div class="col-xl-4 col-lg-6 d-lg-block d-none">
                            <div class="auth-content py-md-0 py-8">
                                <div class="row">
                                    <div class="col-xl-15 text-center">
                                        <img src="dist/favIcon/termi.png" class="img-fluid w-sm-70 w-50"
                                            alt="Terminate" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-6 col-md-7 col-sm-10">
                            <div class="auth-content py-md-0 py-8">
                                <div class="w-100">
                                    <div class="row">
                                        <div class="col-xxl-12 col-xl-8 col-lg-11">
                                            <h5 class="fw-bold">Quality Terminate: An error occurred, and the
                                                survey has been terminated unexpectedly.</h5>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead class="thead-danger">
                                                        <tr>
                                                            <th>PID</th>
                                                            <th>USERNAME</th>
                                                            <th>STATUS</th>
                                                            <th>IP</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="thead-light">
                                                        <tr>
                                                            <th><?php echo $pid; ?></th>
                                                            <th><?php echo $username; ?></th>
                                                            <th><?php echo $status; ?></th>
                                                            <th><?php echo $ip; ?></th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Row -->
                </div>
                <!-- /Container -->
            </div>
            <!-- /Page Body -->

            <!-- Page Footer -->
            <?php
            include ("footerContent.php");
            ?>
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
</body>

<!-- Mirrored from hencework.com/theme/jampack/classic/503.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 10 Sep 2022 06:13:12 GMT -->

</html>