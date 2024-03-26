<div class="col-lg-8">
    <div class="card-body">
        <div class="contact-list-view">
            <table id="datable_1" class="table nowrap w-100 mb-5">
                <thead>
                    <tr>
                        <th><span class="form-check fs-6 mb-0">
                                <input type="checkbox" class="form-check-input check-select-all"
                                    id="customCheck1">
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
                    while ($rows2 = mysqli_fetch_array($result2)) {
                        $id = $rows2['id'];
                        $amount = $rows2['amount'];
                        $paymentMethod = $rows2['payment_method'];
                        $dateTime = $rows2['created_at'];
                        $status = $rows2['status'];
                        $month = $rows2['month_of'];
                        $year = $rows2['year_of'];
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
                                        <?php if ($paymentMethod === "PhonePe") {
                                            echo "dist/img/PaymentIcons/PhonePe_New.jpg";
                                        } else if ($paymentMethod === "Cash") {
                                            echo "dist/img/PaymentIcons/Cash_New.jpg";
                                        } else if ($paymentMethod === "PayTM") {
                                            echo "dist/img/PaymentIcons/PayTM_New.jpg";
                                        } else if ($paymentMethod === "NetBanking") {
                                            echo "dist/img/PaymentIcons/NetBanking_New.jpg";
                                        } else if ($paymentMethod === "GPay") {
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
                                    <div class="fs-8 ms-3"><strong>₹
                                            <?php echo $amount; ?>
                                        </strong></div>
                                </div>
                            </td>
                            <td>
                                <?php echo $month . "/" . $year; ?>
                            </td>
                            <td>
                                <?php echo $dateTime; ?>
                            </td>
                            <td>
                                <?php
                                if ($status === "PendingForApproval") {
                                    ?>
                                    <span class="badge badge-soft-info  my-1  me-2">Pending For
                                        Approval</span>
                                    <?php
                                } else if ($status === "Approved") {
                                    ?>
                                        <span class="badge badge-soft-success  my-1  me-2">Approved</span>
                                    <?php
                                } else if ($status === "ApprovedWithModification") {
                                    ?>
                                            <span class="badge badge-soft-success  my-1  me-2">Approved With
                                                Modification</span>
                                    <?php
                                } else if ($status === "Rejected") {
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
                                if ($modificationReason == "NA") {
                                    echo "✔️";
                                } else if ($modificationReason == "Pending") {
                                    echo "⌛";
                                } else {
                                    ?>
                                        <div id="reason" onclick="getReason('<?php echo $id; ?>');">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-message-circle-2" width="24"
                                                height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
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