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
                                <h1>Projects List</h1>
                            </a>
                        </div>
                    </div>
                    <div class="contact-options-wrap">
                        <div class="v-separator d-lg-block d-none"></div>
                        <a class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover no-caret d-sm-inline-block d-none"
                            href="projects.php" data-bs-toggle="tooltip" data-placement="top" title=""
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
                                        <th><span class="form-check mb-0">
                                                <input type="checkbox" class="form-check-input check-select-all"
                                                    id="customCheck1">
                                                <label class="form-check-label" for="customCheck1"></label>
                                            </span></th>
                                        <th><b>Project ID</b></th>
                                        <th><b>Name</b></th>
                                        <th><b>Client</b></th>
                                        <th><b>PID (Client)</b></th>
                                        <th><b>Status</b></th>
                                        <th><b>Cpi</b></th>
                                        <th><b>Completes</b></th>
                                        <th><b>Terminates</b></th>
                                        <th><b>Actions</b></th>
                                        <!-- <th>Actions</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $query3 = "SELECT * FROM `projects` ORDER BY id DESC";
                                    $result3 = mysqli_query($conn, $query3);
                                    while ($rows3 = mysqli_fetch_array($result3)) {
                                        // echo "<pre>";
                                        // print_r($rows3);
                                        $id = $rows3['id'];
                                        $client_ID = $rows3['client_id'];
                                        $project_ID = $rows3['project_id'];
                                        $projName = $rows3['project_name'];
                                        $projectDesc = $rows3['project_desc'];
                                        $cpi = $rows3['cpi'];
                                        $maxCompletes = $rows3['max_complate_limit'];
                                        $testCountry = $rows3['test_link_country'];
                                        $testLink = $rows3['test_link'];
                                        $cidRep = $rows3['cid_replacer'];
                                        $status = $rows3['status'];

                                        $getClientNameQuery = "SELECT * FROM `clients` WHERE c_id='$client_ID'";
                                        $clientNameResult = mysqli_query($conn, $getClientNameQuery);
                                        $clientNameRows = mysqli_fetch_array($clientNameResult);
                                        $clientName = $clientNameRows['c_name'];
                                        ?>
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <!-- <span class="contact-star marked"><span class="feather-icon"><i data-feather="star"></i></span></span> -->
                                                </div>
                                            </td>
                                            <td>II<?php echo $id; ?></td>
                                            <td>
                                                <a href="projectViewDeails.php?project_id=<?php echo $project_ID; ?>">
                                                    <b>
                                                        <?php echo $projName; ?>
                                                    </b>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="clientViewDeails.php?c_id=<?php echo $client_ID; ?>">
                                                    <b>
                                                        <?php echo $clientName; ?>
                                                    </b>
                                                </a>
                                            </td>
                                            <td>
                                                <?php echo $project_ID ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($status == 'live') {
                                                    ?>
                                                    <button type="button"
                                                        class="btn btn-flush-success btn-animated">Live</button>
                                                    <?php
                                                } else if ($status == 'pause') {
                                                    ?>
                                                        <button type="button"
                                                            class="btn btn-flush-warning btn-animated">Pause</button>
                                                    <?php
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php echo "$" . $cpi; ?>
                                            </td>
                                            <td>87</td>
                                            <td>12</td>
                                            <td>
                                                <a href="projectUpdateDetails.php?project_id=<?php echo $project_ID; ?>"
                                                    class="btn btn-icon btn-flush-dark btn-rounded flush-soft-hover"
                                                    data-bs-toggle="tooltip" data-placement="top" title=""
                                                    data-bs-original-title="Edit" href="edit-contact.html">
                                                    <span class="icon">
                                                        <span class="feather-icon">
                                                            <i data-feather="edit"></i>
                                                        </span>
                                                    </span>
                                                </a>
                                                <a href="projectViewDeails.php?project_id=<?php echo $project_ID; ?>"
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
            <div id="add_new_contact" class="modal fade add-new-contact" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <h5 class="mb-5">Create New Conatct</h5>
                            <form>
                                <div class="row gx-3">
                                    <div class="col-sm-2 form-group">
                                        <div class="dropify-square">
                                            <input type="file" class="dropify-1" />
                                        </div>
                                    </div>
                                    <div class="col-sm-10 form-group">
                                        <textarea class="form-control mnh-100p" rows="4"
                                            placeholder="Add Biography"></textarea>
                                    </div>
                                </div>
                                <div class="title title-xs title-wth-divider text-primary text-uppercase my-4">
                                    <span>Basic Info</span>
                                </div>
                                <div class="row gx-3">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label">First Name</label>
                                            <input class="form-control" type="text" />
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label">Middle Name</label>
                                            <input class="form-control" type="text" />
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label">Last Name</label>
                                            <input class="form-control" type="text" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row gx-3">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Email ID</label>
                                            <input class="form-control" type="text" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Phone</label>
                                            <input class="form-control" type="text" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row gx-3">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label">City</label>
                                            <select class="form-select">
                                                <option selected="">--</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label">State</label>
                                            <select class="form-select">
                                                <option selected="">--</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="form-label">Country</label>
                                            <select class="form-select">
                                                <option selected="">--</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="title title-xs title-wth-divider text-primary text-uppercase my-4">
                                    <span>Company Info</span>
                                </div>
                                <div class="row gx-3">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Company Name</label>
                                            <input class="form-control" type="text" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Designation</label>
                                            <input class="form-control" type="text" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Website</label>
                                            <input class="form-control" type="text" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label class="form-label">Work Phone</label>
                                            <input class="form-control" type="text" />
                                        </div>
                                    </div>
                                </div>
                                <div class="title title-xs title-wth-divider text-primary text-uppercase my-4">
                                    <span>Additional Info</span>
                                </div>
                                <div class="row gx-3">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label">Tags</label>
                                            <select id="input_tags_2" class="form-control" multiple="multiple">
                                            </select>
                                            <small class="form-text text-muted">
                                                You can add upto 4 tags per contact
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row gx-3">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control" type="text" placeholder="Facebook" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control" type="text" placeholder="Twitter" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control" type="text" placeholder="LinkedIn" />
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control" type="text" placeholder="Gmail" />
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer align-items-center">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Discard</button>
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Create
                                Contact</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Edit Info -->

            <!-- Add Label -->
            <div id="add_new_label" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <h6 class="text-uppercase fw-bold mb-3">Add Label</h6>
                            <form>
                                <div class="row gx-3">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input class="form-control" type="text" placeholder="Label Name" />
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary float-end"
                                    data-bs-dismiss="modal">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add Label -->

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
                                            <select id="input_tags_3" class="form-control" multiple="multiple">
                                                <option selected="selected">Collaborator</option>
                                                <option selected="selected">Designer</option>
                                                <option selected="selected">React Developer</option>
                                                <option selected="selected">Promotion</option>
                                                <option selected="selected">Advertisement</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary float-end"
                                    data-bs-dismiss="modal">Add</button>
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
<!-- </div> -->
<!-- /Main Content -->