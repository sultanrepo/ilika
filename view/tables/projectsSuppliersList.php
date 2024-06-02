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
                                        // print_r($rows1);
                                    
                                        $s_no = $count;
                                        $count++;
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
                                                <?php if ($status == "active") {
                                                    ?>
                                                    <button type="button" class="btn btn-flush-success btn-animated">Live
                                                    </button>
                                                    <?php
                                                } else {
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