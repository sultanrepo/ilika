<!-- Main Content -->
<!-- <div class="hk-pg-wrapper pb-0"> -->
<!-- Page Body -->
<div class="hk-pg-body py-0">
    <div class="contactapp-wrap">

        <div class="contactapp-content">
            <div class="contactapp-detail-wrap">
                <header class="contact-header">
                    <div class="d-flex align-items-center">
                        <div class="dropdown">
                            <a class="contactapp-title dropdown-toggle link-dark" data-bs-toggle="dropdown" href="#"
                                role="button" aria-haspopup="true" aria-expanded="false">
                                <h1>Suppliers List</h1>
                            </a>
                        </div>
                    </div>
                    <div class="contact-options-wrap">
                        <button type="button"
                            onclick="redirectToPage('projectSupplier.php?project_id=<?php echo $project_id; ?>')"
                            class="btn btn-primary">Add
                            Supplier</button>
                        <div class="v-separator d-lg-block d-none"></div>

                        <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover no-caret d-sm-inline-block d-none"
                            href="suppliers.php" data-bs-toggle="tooltip" data-placement="top" title=""
                            data-bs-original-title="Refresh"><span class="icon"><span class="feather-icon"><i
                                        data-feather="refresh-cw"></i></span></span></a>
                        <div class="v-separator d-lg-block d-none"></div>
                    </div>
                </header>
                <div class="contact-body">
                    <div data-simplebar class="nicescroll-bar">
                        <div class="collapse" id="collapseQuick">
                            <div class="quick-access-form-wrap">
                                <form class="quick-access-form border">
                                    <div class="row gx-3">
                                        <div class="col-xxl-10">
                                            <div class="position-relative">
                                                <div class="dropify-square">
                                                    <input type="file" class="dropify-1" />
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="row gx-3">
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <input class="form-control" placeholder="First name*"
                                                                    value="" type="text">
                                                            </div>
                                                            <div class="form-group">
                                                                <input class="form-control" placeholder="Last name*"
                                                                    value="" type="text">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <input class="form-control" placeholder="Email Id*"
                                                                    value="" type="text">
                                                            </div>
                                                            <div class="form-group">
                                                                <input class="form-control" placeholder="Phone" value=""
                                                                    type="text">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="form-group">
                                                                <input class="form-control" placeholder="Department"
                                                                    value="" type="text">
                                                            </div>
                                                            <div class="form-group">
                                                                <select id="input_tags" class="form-control"
                                                                    multiple="multiple">
                                                                    <option selected="selected">Collaborator</option>
                                                                    <option>Designer</option>
                                                                    <option selected="selected">Developer</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2">
                                            <div class="form-group">
                                                <button data-bs-toggle="collapse" data-bs-target="#collapseExample"
                                                    aria-expanded="false" class="btn btn-block btn-primary ">Create New
                                                </button>
                                            </div>
                                            <div class="form-group">
                                                <button data-bs-toggle="collapse" disabled
                                                    data-bs-target="#collapseExample" aria-expanded="false"
                                                    class="btn btn-block btn-secondary">Discard
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="contact-list-view">
                            <table id="datable_1" class="table nowrap w-100 mb-5">
                                <thead>
                                    <tr>
                                        <th>
                                            <span class="form-check mb-0">
                                                <input type="checkbox" class="form-check-input check-select-all"
                                                    id="customCheck1">
                                                <label class="form-check-label" for="customCheck1"></label>
                                            </span>
                                        </th>
                                        <th><b>Serial No</b></th>
                                        <th><b>Project ID</b></th>
                                        <th><b>Email</b></th>
                                        <th><b>CPI</b></th>
                                        <th><b>Limit</b></th>
                                        <th><b>Status</b></th>
                                        <th><b>Clicks</b></th>
                                        <th><b>Completes</b></th>
                                        <th><b>Terminates</b></th>
                                        <th><b>Actions</b></th>
                                        <!-- <th>Actions</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query3 = "SELECT * FROM `projects_suppliers` WHERE project_id='$project_id'";
                                    $result3 = mysqli_query($conn, $query3);
                                    $count = 1;
                                    while ($rows3 = mysqli_fetch_array($result3)) {
                                        // echo "<pre>";
                                        // print_r($rows3);
                                    
                                        $s_no = $count;
                                        $count++;
                                        $serial_no = $rows3['s_no'];
                                        $project_id = $rows3['project_id'];
                                        $supplier_id = $rows3['supplier_id'];
                                        $supplier_email = $rows3['supplier_email'];
                                        $cpi = $rows3['cpi'];
                                        $maximum_completes = $rows3['maximum_completes'];
                                        $status = $rows3['status'];
                                        ?>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <!-- <span class="contact-star marked"><span class="feather-icon"><i data-feather="star"></i></span></span> -->
                                                </div>
                                            </td>
                                            <td>
                                                <?php echo $s_no; ?>
                                            </td>
                                            <td>
                                                <a href="supplierViewDetails.php?s_id=<?php echo $project_id; ?>">
                                                    <?php echo $project_id; ?>
                                                </a>
                                            </td>
                                            <td>
                                                <?php echo $supplier_email; ?>
                                            </td>
                                            <td>
                                                <?php echo $cpi; ?>
                                            </td>
                                            <td>
                                                <?php echo $maximum_completes; ?>
                                            </td>
                                            <td>
                                                <?php if ($status == "live") {
                                                    ?>
                                                    <button type="button" class="btn btn-flush-success btn-animated">Live
                                                    </button>
                                                    <?php
                                                } else if ($status == "paused") {
                                                    ?>
                                                        <button type="button"
                                                            class="btn btn-outline-light btn-rounded">Pused</button>
                                                    <?php
                                                } ?>
                                            </td>
                                            <td>
                                                12
                                            </td>
                                            <td>
                                                11
                                            </td>
                                            <td>
                                                17
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-flush-danger flush-outline-hover"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#exampleModalLarge01<?php echo $count; ?>">Entry
                                                    Link</button>
                                                <?php
                                                if ($status == "paused") {
                                                    ?>
                                                    <button type="button"
                                                        onclick="updateProjectSupplierStatus('<?php echo $serial_no; ?>', 'live', '<?php echo $project_id; ?>', '<?php echo $supplier_email; ?>')"
                                                        class="btn btn-outline-success">Live</button>
                                                    <?php
                                                } else if ($status == "live") {
                                                    ?>
                                                        <button type="button" class="btn btn-flush-warning flush-soft-hover"
                                                            onclick="updateProjectSupplierStatus('<?php echo $serial_no; ?>', 'paused', '<?php echo $project_id; ?>', '<?php echo $supplier_email; ?>')">Pause</button>
                                                    <?php
                                                }
                                                ?>


                                                <a href="supplierUpdate.php?s_id=<?php echo $supplier_id; ?>"
                                                    class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                    data-bs-toggle="tooltip" data-placement="top" title=""
                                                    data-bs-original-title="Edit" href="edit-contact.html">
                                                    <span class="icon">
                                                        <span class="feather-icon">
                                                            <i data-feather="edit"></i>
                                                        </span>
                                                    </span>
                                                </a>

                                                <a href="supplierViewDetails.php?s_id=<?php echo $supplier_id; ?>"
                                                    class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                    data-bs-toggle="tooltip" data-placement="top" title=""
                                                    data-bs-original-title="Edit" href="edit-contact.html">
                                                    <span class="icon">
                                                        <span class="feather-icon">
                                                            <i data-feather="eye"></i>
                                                        </span>
                                                    </span>
                                                </a>

                                                <a href="Controller/api/exportExcelCompletes.php?supplier_id=<?php echo $supplier_id; ?>"
                                                    class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                    data-bs-toggle="tooltip" data-placement="top" title=""
                                                    data-bs-original-title="Completes" href="edit-contact.html">
                                                    <span class="icon">
                                                        <span class="feather-icon">
                                                            <i class="material-icons">assignment</i>
                                                        </span>
                                                    </span>
                                                </a>

                                                <a href="Controller/api/exportExcelAll.php?supplier_id=<?php echo $supplier_id; ?>"
                                                    class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                    data-bs-toggle="tooltip" data-placement="top" title=""
                                                    data-bs-original-title="Status Report" href="edit-contact.html">
                                                    <span class="icon">
                                                        <span class="feather-icon">
                                                            <i class="material-icons">assessment</i>
                                                        </span>
                                                    </span>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Edit Info -->
            <!-- Add Suppliers Model -->
            <!-- Entry Link Model Start -->
            <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalLarge01">
                Large modal
            </button> -->
            <?php
            $query3 = "SELECT * FROM `projects_suppliers` WHERE project_id='$project_id'";
            $result3 = mysqli_query($conn, $query3);
            $count = 1;
            while ($rows3 = mysqli_fetch_array($result3)) {
                $count++;
                $project_id = $rows3['project_id'];
                $supplier_id = $rows3['supplier_id'];
                $supplier_email = $rows3['supplier_email'];
                $getProjectDetailsQuery = "SELECT * FROM `projects` WHERE project_id='$project_id'";
                $getProjectDetailsResult = mysqli_query($conn, $getProjectDetailsQuery);
                $getProjectDetailsRow = mysqli_fetch_array($getProjectDetailsResult);
                $project_name = $getProjectDetailsRow['project_name'];
                ?>
                <div class="modal fade" id="exampleModalLarge01<?php echo $count; ?>" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLarge01<?php echo $count; ?>" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Entry Links</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p><b>Project: <?php echo $project_id; ?></b> </p>
                                <p><b>Project Name: <?php echo $project_name; ?></b></p>
                                <p><b>Supplier Email: <?php echo $supplier_email; ?></b></p>
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Country</th>
                                            <th>Link</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        //Getting Supplier ID
                                        $getSupplierIDQuery = "SELECT * FROM `suppliers` WHERE supplier_email='$supplier_email'";
                                        $getSupplierIDResult = mysqli_query($conn, $getSupplierIDQuery);
                                        $getSupplierIDRow = mysqli_fetch_array($getSupplierIDResult);
                                        $supplierID = $getSupplierIDRow['supplier_id'];
                                        //Getting Live Link Details
                                        $getLiveLinksQuery = "SELECT * FROM `projects_suppliers_link` WHERE supplier_id='$supplierID' AND project_id='$project_id'";
                                        $getLiveLinksResult = mysqli_query($conn, $getLiveLinksQuery);
                                        $dataCount = 0;
                                        while ($getLiveLinksRow = mysqli_fetch_array($getLiveLinksResult)) {
                                            $dataCount++;
                                            $countryCode = $getLiveLinksRow['live_link_country'];
                                            $supplier_link = $getLiveLinksRow['supplier_link'];
                                            $live_link = $getLiveLinksRow['live_link'];
                                            $getCountryNameQuery = "SELECT * FROM `countries` WHERE ISO='$countryCode'";
                                            $getCountryNameResult = mysqli_query($conn, $getCountryNameQuery);
                                            $getCountryNameRow = mysqli_fetch_array($getCountryNameResult);
                                            $countryName = $getCountryNameRow['NAME'];
                                            ?>
                                            <tr class="table-active">
                                                <th scope="row"><?php echo $dataCount; ?></th>
                                                <td><?php echo $countryName; ?></td>
                                                <td><?php echo $supplier_link; ?></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer">
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>

            <!-- Entry Link Model Ends-->
            <?php
            //Include Supplier Add To Project Modal
            include ("view/modals/projectsSuppliersModel.php");
            ?>
        </div>
    </div>
</div>
<!-- /Page Body -->
<!-- </div> -->
<!-- /Main Content -->
<script>
    function updateProjectSupplierStatus(updateID, updateType, projectID, supplierEmail) {
        let supplier_email = supplierEmail;
        Swal.fire({
            title: "Are you sure?",
            text: "Update status for the Project Supplier " + supplier_email + " ?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Update it!"
        }).then((result) => {
            if (result.isConfirmed) {
                let update_id = updateID;
                let update_type = updateType;
                let project_id = projectID;
                $.ajax({
                    url: 'Controller/api/updateProjectSupplierStatus.php',
                    type: 'POST',
                    data: {
                        update_id: update_id,
                        update_type: update_type,
                        project_id: project_id
                    },
                    success: function (response) {
                        if (response == 'successLive') {
                            Swal.fire({
                                title: "Live!",
                                text: "Project Supplier.",
                                icon: "success"
                            });
                            window.location.reload();
                        } else if (response == 'successPaused') {
                            Swal.fire({
                                title: "Paused!",
                                text: "Project Supplier.",
                                icon: "success"
                            });
                            window.location.reload();
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        // Handle the error
                        console.error(textStatus, errorThrown);
                    }
                });
            };
        });
    }
</script>