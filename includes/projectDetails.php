<?php

$user_id = $_SESSION['user_id'];

$query1 = "SELECT users_login.user_id, users_login.user_username, users_login.user_email, users_login.user_mob_number, user_details.user_name, user_details.user_curr_address, user_details.user_parm_address, user_details.user_star_donator, user_details.user_profession, user_details.user_marital_status, user_details.desc, user_details.profile_pic FROM users_login INNER JOIN user_details ON users_login.user_id='$user_id' AND user_details.user_id='$user_id'";
$result1 = mysqli_query($conn, $query1);
$rows1 = mysqli_fetch_array($result1);

// echo "<pre>";
// print_r($rows1);

$user_userName = $rows1['user_username'];
$user_email = $rows1['user_email'];
$user_mob_number = $rows1['user_mob_number'];
$user_name = $rows1['user_name'];
$user_curr_address = $rows1['user_curr_address'];
$user_parm_address = $rows1['user_parm_address'];
$user_star_donator = $rows1['user_star_donator'];
$user_profession = $rows1['user_profession'];
$user_marital_status = $rows1['user_marital_status'];
$desc = $rows1['desc'];
$profile_pic = $rows1['profile_pic'];

// if( $_GET === "Payment" ) {
// 	echo '<script type = "text/javascript">';
// 	echo 'window.onload = function(){';
// 	echo 'alert("ok")}';
// 	echo '</script>';
// }

//Total Contribution 
$result3 = mysqli_query($conn, "SELECT SUM(amount) FROM `deposit` WHERE user_id='$user_id'");
$rows3 = mysqli_fetch_array($result3, MYSQLI_NUM);
$totalContribution = $rows3[0];

?>

<?php

$project_id = $_GET['project_id'];
$projectQuery = "SELECT * FROM `projects` WHERE project_id='$project_id'";
$project_res = mysqli_query($conn, $projectQuery);
$project_row = mysqli_fetch_array($project_res);

$client_id = $project_row['client_id'];
$project_id = $project_row['project_id'];
$project_name = $project_row['project_name'];
$project_desc = $project_row['project_desc'];
$cpi = $project_row['cpi'];
$max_complate_limit = $project_row['max_complate_limit'];
$test_link_country = $project_row['test_link_country'];
$test_link = $project_row['test_link'];
$cid_replacer = $project_row['cid_replacer'];
$status = $project_row['status'];

//Getting Client Name
$getClientNameQuery = "SELECT * FROM `clients` WHERE c_id='$client_id'";
$clientNameResult = mysqli_query($conn, $getClientNameQuery);
$clientNameRows = mysqli_fetch_array($clientNameResult);
$clientName = $clientNameRows['c_name'];

//Getting Click Count
$getClickCountQuery = "SELECT SUM(click) FROM `projects_suppliers_link` WHERE project_id='$project_id'";
$clickCountResult = mysqli_query($conn, $getClickCountQuery);
$clickCount = mysqli_fetch_array($clickCountResult);
$clickCount = $clickCount['SUM(click)'];

//Getting Complete Count
$getCompleteCountQuery = "SELECT SUM(completes) FROM `projects_suppliers_link` WHERE project_id='$project_id'";
$completeCountResult = mysqli_query($conn, $getCompleteCountQuery);
$completeCount = mysqli_fetch_array($completeCountResult);
$completeCount = $completeCount['SUM(completes)'];

//Getting terminate Count
$getTerminateCountQuery = "SELECT SUM(terminates) FROM `projects_suppliers_link` WHERE project_id='$project_id'";
$terminateCountResult = mysqli_query($conn, $getTerminateCountQuery);
$terminateCount = mysqli_fetch_array($terminateCountResult);
$terminateCount = $terminateCount['SUM(terminates)'];


?>
<!-- Main Content -->
<div class="hk-pg-wrapper">
    <!-- Page Body -->
    <div class="hk-pg-body">
        <div class="container-xxl">
            <div class="profile-wrap">
                <!-- <div class="profile-img-wrap">
                    <img class="img-fluid rounded-5" src="dist/img/profile-bg.jpg" alt="Image Description">
                </div> -->
                <!-- <hr>
                <hr>
                <hr> -->
                <!-- Page Header -->
                <div class="hk-pg-header pg-header-wth-tab">
                    <div class="d-flex">
                        <div class="d-flex flex-wrap justify-content-between flex-1">
                            <div class="mb-lg-0 mb-2 me-8">
                                <h1 class="pg-title">Project</h1>
                                <p></p>
                            </div>
                            <div class="mb-lg-0 mb-2 me-8">
                                <!-- <h1 class="pg-title">New Clients</h1> -->
                                <button type="button"
                                    onclick="updateStatus('<?php echo $project_id . '^' . $status; ?>')"
                                    class="btn btn-secondary btn-rounded">
                                    <?php
                                    if ($status == 'live') {
                                        echo "⏸ Pause";
                                    } else if ($status == 'pause') {
                                        echo "🟢 Live";
                                    } else {
                                        echo "NA";
                                    }
                                    ?>
                                </button>
                                <button type="button" class="btn btn-warning">Waiting for Final IDs</button>
                                <button type="button" class="btn btn-primary"
                                    onclick="redirectToPage('projectUpdateDetails.php?project_id=<?php echo $project_id ?>')">Edit</button>
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Page Header -->
                <div class="container-xxl">
                    <!-- Page Header -->
                    <div class="hk-pg-header pg-header-wth-tab">
                        <div class="d-flex">
                            <div class="d-flex flex-wrap justify-content-between flex-1">

                                <!-- <div class="pg-header-action-wrap">
                                <div class="input-group w-300p">
                                    <span class="input-affix-wrapper">
                                        <span class="input-prefix"><span class="feather-icon"><i data-feather="calendar"></i></span></span>
                                        <input class="form-control form-wth-icon" name="datetimes" value="Aug 18,2020 - Aug 19, 2020">
                                    </span>
                                </div>
                            </div> -->
                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->

                    <!-- Cards -->
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="card text-white bg-primary">
                                <div class="card-header">Total <br> Clicks</div>
                                <div class="card-body">
                                    <h5 class="card-title text-white">
                                        <?php
                                        if ($clickCount == 0) {
                                            echo "0";
                                        } else {
                                            echo $clickCount;
                                        }
                                        ?>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="card text-white bg-success">
                                <div class="card-header">Total <br> Completes</div>
                                <div class="card-body">
                                    <h5 class="card-title text-white">
                                        <?php
                                        if ($completeCount == 0) {
                                            echo "0";
                                        } else {
                                            echo $completeCount;
                                        }
                                        ?>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <div class="card text-white bg-warning">
                                <div class="card-header">Total <br> Terminates</div>
                                <div class="card-body">
                                    <h5 class="card-title text-white">
                                        <?php
                                        if ($terminateCount == 0) {
                                            echo "0";
                                        } else {
                                            echo $terminateCount;
                                        }
                                        ?>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card -->
                    <!-- Page Body -->
                    <!-- dashboardMainHtml.php -->
                    <!-- /Page Body -->
                </div>
                <div class="profile-intro mt-3">
                    <div class="card card-flush mw-400p bg-transparent">
                        <div class="card-body">
                            <h3>Project Information</h3>
                            <hr>
                            <h5>
                                Name
                            </h5>
                            <p>
                                <b>
                                    <?php echo $project_name; ?>
                                </b>
                            </p>
                            <hr>
                            <h5>Status</h5>
                            <p>
                                <?php
                                if ($status == 'live') {
                                    ?>
                                    <button type="button" class="btn btn-success">Live</button>
                                    <?php
                                } else if ($status == 'pause') {
                                    ?>
                                        <button type="button" class="btn btn-warning">Pause</button>
                                    <?php
                                }
                                ?>
                            </p>
                            <hr>
                            <h5>Client</h5>
                            <p>
                                <a href="clientViewDeails.php?c_id=<?php echo $client_id; ?>">
                                    <b>
                                        <?php echo $clientName; ?>
                                    </b>
                                </a>
                            </p>
                            <hr>
                            <h5>Project ID (Client)</h5>
                            <p>
                                <b>
                                    <?php echo $project_id; ?>
                                </b>
                            </p>
                            <hr>
                            <h5>Cost Per Complete (CPI)</h5>
                            <p>
                                <b>
                                    <?php echo $cpi; ?>
                                </b>
                            </p>
                            <hr>
                            <h5>Maximum Completes (Limit)</h5>
                            <p>
                                <b>
                                    <?php echo $max_complate_limit; ?>
                                </b>
                            </p>
                            <hr>
                            <h5>Cid replacer</h5>
                            <p>
                                <b>
                                    <?php echo $cid_replacer; ?>
                                </b>
                            </p>
                            <hr>
                            <h5>Description</h5>
                            <p>
                                <b>
                                    <?php
                                    if ($project_desc === "") {
                                        echo "NA";
                                    } else {
                                        echo $project_desc;
                                    }
                                    ?>
                                </b>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
                <div class="row mt-7">
                    <div class="col-lg-10 mb-lg-0 mb-3">
                        <div class="card card-border mb-lg-4 mb-3">
                            <div class="card-header card-header-action">
                                <div class="media align-items-center">
                                    <div class="media-body">
                                        <div class="fw-medium text-dark">
                                            <h5>Links</h5>
                                        </div>
                                        <div class="fs-7">
                                            Live & Test
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="list-group list-group-flush">
                                <?php
                                $liveLinkQuery = "SELECT * FROM `live_link` WHERE project_id='$project_id'";
                                $liveLinkResult = mysqli_query($conn, $liveLinkQuery);
                                while ($dataRow = mysqli_fetch_array($liveLinkResult)) {
                                    $countryID = $dataRow['country'];
                                    ?>
                                    <hr>
                                    <li class="list-group-item border-0">
                                        <span>
                                            <i class="bi bi-calendar-check-fill text-disabled me-2"></i>
                                            <span class="text-muted">
                                                Country: <b>
                                                    <?php
                                                    $getCountryName = "SELECT * FROM `countries` WHERE ISO='$countryID'";
                                                    $countryResult = mysqli_query($conn, $getCountryName);
                                                    $countryRows = mysqli_fetch_array($countryResult);
                                                    echo $countryRows["NAME"];
                                                    ?>
                                                </b>
                                            </span>
                                            <span class="text-muted">
                                                |
                                                Live Link:
                                            </span>
                                        </span>
                                        <span class="ms-2" id="complete_url">
                                            <?php echo $dataRow['live_link']; ?>
                                        </span>
                                    </li>
                                    <?php
                                }
                                ?>
                                <hr>
                                <li class="list-group-item border-0">
                                    <span>
                                        <i class="bi bi-calendar-check-fill text-disabled me-2"></i>
                                        <span class="text-muted">
                                            Country: <b>
                                                <?php
                                                $getCountryName = "SELECT * FROM `countries` WHERE ISO='$test_link_country'";
                                                $countryResult = mysqli_query($conn, $getCountryName);
                                                $countryRows = mysqli_fetch_array($countryResult);
                                                echo $countryRows["NAME"];
                                                ?>
                                            </b>
                                        </span>
                                        <span class="text-muted">
                                            |
                                            Test Link:
                                        </span>
                                    </span>
                                    <span class="ms-2" id="complete_url">
                                        <?php echo $test_link; ?>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Body -->
    <!-- Include Suppliers List -->
    <?php include ("view/tables/projectsSuppliersList.php"); ?>

    <!-- Page Footer -->
    <?php include ("footerContent.php"); ?>
    <!-- / Page Footer -->

</div>
<!-- /Main Content -->
<script>
    function myFunction() {
        var checkBox = document.getElementById("currParamAdd");
        var currAddress = document.getElementById("currAddress").value;
        var parmAddress = document.getElementById("parmAddress");
        if (checkBox.checked == true) {
            parmAddress.value = "";
            parmAddress.value = currAddress;
        } else {
            parmAddress.value = "";
        }
    }
</script>