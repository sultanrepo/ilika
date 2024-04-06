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

$s_id = $_GET['s_id'];
$s_query = "SELECT * FROM `suppliers` WHERE supplier_id='$s_id'";
$s_res = mysqli_query($conn, $s_query);
$s_row = mysqli_fetch_array($s_res);
$s_no = $s_row['s_no'];
$s_id = $s_row['supplier_id'];
$s_name = $s_row['supplier_name'];
$s_email = $s_row['supplier_email'];
$complete_redirect_url = $s_row['complete_redirect_url'];
$terminate_redirect_url = $s_row['terminate_redirect_url'];
$quotafull_redirect_url = $s_row['quotafull_redirect_url'];
$status = $s_row['status'];



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
                <hr>
                <hr>
                <hr>
                <div class="profile-intro">
                    <div class="card card-flush mw-400p bg-transparent">
                        <div class="card-body">
                            <h3>Supplier Information</h3>
                            <hr>
                            <h5>
                                Supplier ID
                            </h5>
                            <p>
                                <?php echo $s_id; ?>
                            </p>
                            <hr>
                            <h5>Supplier Name</h5>
                            <p>
                                <?php echo $s_name ?>
                            </p>
                            <hr>
                            <h5>Supplier Email</h5>
                            <p>
                                <?php echo $s_email; ?>
                            </p>
                            <hr>
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
                                            <h5>Supplier Redirects</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="list-group list-group-flush">
                                <hr>
                                <li class="list-group-item border-0">
                                    <span>
                                        <i class="bi bi-calendar-check-fill text-disabled me-2"></i>
                                        <span class="text-muted">
                                            Complete redirect:
                                        </span>
                                    </span>
                                    <span class="ms-2" id="complete_redirect_url">
                                        <?php if ($complete_redirect_url == null) {
                                            echo "NA";
                                        } else {
                                            echo $complete_redirect_url;
                                        } ?>
                                    </span>
                                    <button id="copy-complete-url" type="button" class="btn btn-dark">Copy</button>
                                    <script>
                                        const copy_compelet_Button = document.getElementById("copy-complete-url");
                                        const urlSpan = document.getElementById("complete_redirect_url");
                                        copy_compelet_Button.addEventListener("click", () => {
                                            // Create a new textarea element
                                            const textarea = document.createElement("textarea");
                                            // Set the value of the textarea to the text from the span
                                            textarea.value = urlSpan.textContent;
                                            // Add the textarea to the document body
                                            document.body.appendChild(textarea);
                                            // Select the text in the textarea
                                            textarea.select();
                                            // Copy the selected text to the clipboard
                                            document.execCommand("copy");
                                            // Remove the textarea from the document body
                                            document.body.removeChild(textarea);
                                        });
                                    </script>
                                </li>
                                <hr>
                                <li class="list-group-item border-0">
                                    <span>
                                        <i class="bi bi-briefcase-fill text-disabled me-2"></i>
                                        <span class="text-muted">
                                            Terminate redirect:
                                        </span>
                                    </span>
                                    <span class="ms-2" id="terminate_redirect_url">
                                        <?php if ($terminate_redirect_url == null) {
                                            echo "NA";
                                        } else {
                                            echo $terminate_redirect_url;
                                        } ?>
                                    </span>
                                    <button id="copy-terminate-buttom" type="button" class="btn btn-dark">Copy</button>
                                    <script>
                                        const copy_terminate_Button = document.getElementById("copy-terminate-buttom");
                                        const url_terminate_Span = document.getElementById("terminate_redirect_url");
                                        copy_terminate_Button.addEventListener("click", () => {
                                            // Create a new terminate_textarea element
                                            const terminate_textarea = document.createElement("textarea");
                                            // Set the value of the terminate_textarea to the text from the span
                                            terminate_textarea.value = url_terminate_Span.textContent;
                                            // Add the terminate_textarea to the document body
                                            document.body.appendChild(terminate_textarea);
                                            // Select the text in the terminate_textarea
                                            terminate_textarea.select();
                                            // Copy the selected text to the clipboard
                                            document.execCommand("copy");
                                            // Remove the terminate_textarea from the document body
                                            document.body.removeChild(terminate_textarea);
                                        });

                                    </script>
                                </li>
                                <hr>
                                <li class="list-group-item border-0">
                                    <span><i class="bi bi-house-door-fill text-disabled me-2"></i>
                                        <span class="text-muted">
                                            Quotafull redirect:
                                        </span>
                                    </span>
                                    <span class="ms-2" id="quotafull_redirect_url">
                                        <?php if ($quotafull_redirect_url == null) {
                                            echo "NA";
                                        } else {
                                            echo $quotafull_redirect_url;
                                        } ?>
                                    </span>
                                    <button id="copy-quotafull-button" type="button" class="btn btn-dark">Copy</button>
                                    <script>
                                        const copy_quotafull_Button = document.getElementById("copy-quotafull-button");
                                        const url_quotafull_Span = document.getElementById("quotafull_redirect_url");
                                        copy_quotafull_Button.addEventListener("click", () => {
                                            // Create a new qutafull_textarea element
                                            const qutafull_textarea = document.createElement("textarea");
                                            // Set the value of the qutafull_textarea to the text from the span
                                            qutafull_textarea.value = url_quotafull_Span.textContent;
                                            // Add the qutafull_textarea to the document body
                                            document.body.appendChild(qutafull_textarea);
                                            // Select the text in the qutafull_textarea
                                            qutafull_textarea.select();
                                            // Copy the selected text to the clipboard
                                            document.execCommand("copy");
                                            // Remove the qutafull_textarea from the document body
                                            document.body.removeChild(qutafull_textarea);
                                        });
                                    </script>
                                </li>
                                <hr>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Body -->

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