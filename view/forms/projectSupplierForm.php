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

//Get Unique Link ID
function getLinkId()
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    $max = strlen($characters) - 1;
    for ($k = 0; $k < 6; $k++) {
        $randomString .= $characters[rand(0, $max)];
    }
    return $randomString;
}

if (isset($_POST['projectSuppliers'])) {
    $pro_id = $project_id;
    $cpi_form = $_POST['cpi'];
    $maxCompLimit = $_POST['maxCompLimit'];
    $emailContent = $_POST['emailContent'];
    $status = 'paused';

    $suppliers = $_POST['suppliers'];
    $suppliersCount = count($suppliers);
    $count = 0;
    for ($i = 0; $i < $suppliersCount; $i++) {
        $supplierID = $suppliers[$i];
        //Getting Supplier ID
        $getSupplierEmailQuery = "SELECT * FROM `suppliers` WHERE supplier_id='$suppliers[$i]'";
        $supplierEamilResult = mysqli_query($conn, $getSupplierEmailQuery);
        $supplierRows = mysqli_fetch_array($supplierEamilResult);
        $supplierEmail = $supplierRows['supplier_email'];
        //Adding Suppliers to Project
        $addProjectSupplierQuery = "INSERT INTO `projects_suppliers`
        (`project_id`, `supplier_id`, `supplier_email`, `cpi`, `maximum_completes`, `email_notes`, `status`) VALUES 
        ('$pro_id','$suppliers[$i]','$supplierEmail', '$cpi_form','$maxCompLimit','$emailContent','$status')";
        $supplierResult = mysqli_query($conn, $addProjectSupplierQuery);
        //Adding Suppliers Link and Live Link
        $getLiveLinkCountQuery = "SELECT * FROM `live_link` WHERE project_id='$pro_id'";
        $getLiveLinkCountResult = mysqli_query($conn, $getLiveLinkCountQuery);
        $liveLinkCount = mysqli_num_rows($getLiveLinkCountResult);

        while ($liveLinkRows = mysqli_fetch_array($getLiveLinkCountResult)) {
            //Generate Supplier URL
            $liveLinkCountry = $liveLinkRows['country'];
            $liveLink = $liveLinkRows['live_link'];

            $linkID = getLinkId();
            $_BASE_URL = "https://manual.ilikainsights.com";
            $_LAST_URL = "/supplier/project.php?pid=" . "$project_id" . "&linkid=" . "$linkID" . "&supplierid=" . "$supplierID" . "&user=XXXX";
            $supplier_url = $_BASE_URL . $_LAST_URL;
            $addSupplierLink = "INSERT INTO `projects_suppliers_link`
                (`link_id`, `project_id`, `supplier_id`, `supplier_link`, `live_link_country`, `live_link`, `client_id`, `status`) VALUES 
                ('$linkID', '$pro_id','$supplierID','$supplier_url','$liveLinkCountry','$liveLink','$client_id','paused')";
            $addSupplierLinkResult = mysqli_query($conn, $addSupplierLink);
        }
        if ($supplierResult) {
            $count++;
        }
    }
    if ($suppliersCount == $count) {
        ?>
        <script>
            let timerInterval;
            Swal.fire({
                title: "Adding Suppliers",
                html: "Please wait",
                timer: 3000,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading();
                    const timer = Swal.getPopup().querySelector("b");
                    timerInterval = setInterval(() => {
                        timer.textContent = `${Swal.getTimerLeft()}`;
                    }, 100);
                },
                willClose: () => {
                    clearInterval(timerInterval);
                }
            }).then((result) => {
                /* Read more about handling dismissals below */
                if (result.dismiss === Swal.DismissReason.timer) {
                    Swal.fire({
                        position: "center",
                        icon: "success",
                        title: "Suppliers Added Successfully",
                        showConfirmButton: false,
                        timer: 3000
                    });
                    console.log("I was closed by the timer");
                    setTimeout(function () {
                        window.location.href = "projectViewDeails.php?project_id=<?php echo $pro_id; ?>";
                    }, 3000);
                }
            });
        </script>
        <?php
    } else {
        ?>
        <script>
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Something went wrong.",
                showConfirmButton: false,
                timer: 3000
            });
        </script>
        <?php
    }
}
?>

<hr>
<form class="row g-3" method="post">
    <div class="col-4">
        <label for="ProjectName" class="form-label">Project Name</label>
        <input type="text" class="form-control" id="ProjectName" name="ProjectName" value="<?php echo $project_name; ?>"
            disabled>
    </div>
    <div class="col-4">
        <label for="ClientName" class="form-label">Client Name</label>
        <input type="text" class="form-control" id="ClientName" name="ClientName" value="<?php echo $clientName; ?>"
            disabled>
    </div>
    <div class="col-4">
        <label for="ProjectID" class="form-label">Project ID</label>
        <input type="text" class="form-control" id="ProjectID" name="ProjectID" value="<?php echo $project_id; ?>"
            disabled>
    </div>
    <div class="col-12">
        <label for="projectSuppliers" class="form-label">Suppliers<span style="color:red">*</span></label>
        <select class="js-example-basic-multiple" id="projectSuppliers" name="suppliers[]" multiple="multiple">
            <?php
            $getProjectSuppliersCountQuery = "SELECT * FROM `projects_suppliers` WHERE project_id='$project_id'";
            $getProjectSuppliersCountResult = mysqli_query($conn, $getProjectSuppliersCountQuery);
            $getProjectSuppliersCount = mysqli_num_rows($getProjectSuppliersCountResult);
            if ($getProjectSuppliersCount > 0) {
                $getSuppliersQuery = "SELECT * FROM `projects_suppliers` WHERE project_id='$project_id'";
                echo $getSuppliersQuery;
                $supplierResult = mysqli_query($conn, $getSuppliersQuery);
                $supplier_idData = array();
                while ($supplierRows = mysqli_fetch_array($supplierResult)) {
                    $supplierID = $supplierRows['supplier_id'];
                    echo $supplierID;
                    $supplier_idData[] = $supplierID;
                    //$supplierName = $supplierRows['supplier_name'];
                    //$supplierEmail = $supplierRows['supplier_email'];
                }
                $notInClause = "'" . implode("', '", $supplier_idData) . "'";
                $getOnlyNotMappedProjectSuppiersQuery = "SELECT * FROM `suppliers` WHERE supplier_id NOT IN ($notInClause)";
                $getOnlyNotMappedProjectSuppiersResult = mysqli_query($conn, $getOnlyNotMappedProjectSuppiersQuery);
                while ($getOnlyNotMappedProjectSuppiersRows = mysqli_fetch_array($getOnlyNotMappedProjectSuppiersResult)) {
                    $supplierID = $getOnlyNotMappedProjectSuppiersRows['supplier_id'];
                    $supplierName = $getOnlyNotMappedProjectSuppiersRows['supplier_name'];
                    $supplierEmail = $getOnlyNotMappedProjectSuppiersRows['supplier_email'];
                    ?>
                    <option value="<?php echo $supplierID; ?>">
                        <?php echo $supplierEmail; ?>
                    </option>
                    <?php
                }
            } else {
                $getSuppliersQuery = "SELECT * FROM `suppliers`";
                $supplierResult = mysqli_query($conn, $getSuppliersQuery);
                while ($supplierRows = mysqli_fetch_array($supplierResult)) {
                    $supplierID = $supplierRows['supplier_id'];
                    $supplierName = $supplierRows['supplier_name'];
                    $supplierEmail = $supplierRows['supplier_email'];
                    ?>
                    <option value="<?php echo $supplierID; ?>">
                        <?php echo $supplierEmail; ?>
                    </option>
                    <?php
                }
            }

            ?>
        </select>
    </div>
    <br>
    <div class="col-6">
        <br>
        <label for="cpi" class="form-label">Cost Per Complete $ (CPI)<span style="color:red">*</span></label>
        <input type="number" class="form-control" id="cpi" name="cpi" aria-label="Amount (to the nearest dollar)"
            required>
    </div>
    <div class="col-6">
        <label for="maxLimit" class="form-label">Maximum Completes (Limit) <p>Input 0 for unlimited completes.<span
                    style="color:red">*</span></p>
        </label>
        <input type="number" class="form-control" id="maxLimit" name="maxCompLimit" value="0" required>
        <span style="color:red" class="error" id="MaximumCompletesError"></span>
    </div>
    <div class="col-6">
        <div class="form-check form-switch form-switch-xl">
            <input type="checkbox" class="form-check-input" id="customSwitchXl" name="isEamilSend">
            <label class="form-check-label" for="customSwitchXl">Send Email to Suppliers</label>
        </div>
    </div>
    <div class="col-12">
        <label for="emailContent">Eamil note</label>
        <textarea class="form-control" id="emailContent" rows="5" name="emailContent" required></textarea>
    </div>
    <div class="col-12">
        <button name="projectSuppliers" class="btn btn-primary">Add Supplier</button>
        <button class="btn btn-danger" onclick="redirectToPage('projects.php')">Cancel</button>
    </div>
</form>