<?php

$s_id = $_GET['s_id'];

$supplierQuery = "SELECT * FROM `suppliers` WHERE supplier_id='$s_id'";
$result = mysqli_query($conn, $supplierQuery);
$supplierRows = mysqli_fetch_array($result);
$supplier_name = $supplierRows['supplier_name'];
$supplier_email = $supplierRows['supplier_email'];
$complete_redirect_url = $supplierRows['complete_redirect_url'];
$terminate_redirect_url = $supplierRows['terminate_redirect_url'];
$quotafull_redirect_url = $supplierRows['quotafull_redirect_url'];

if (isset($_POST['submitUpdate'])) {

    // get form data
    $supplier_name = $_POST['name'];
    $supplier_email = $_POST['email'];
    $complete_redirect_url = $_POST['completeRedURL'];
    $terminate_redirect_url = $_POST['terminateRedURL'];
    $quotafull_redirect_url = $_POST['quotafullRedURL'];


    // Update form data into database
    $supplierUpdateQuery = "UPDATE `suppliers` SET `supplier_name`='$supplier_name',`supplier_email`='$supplier_email',`complete_redirect_url`='$complete_redirect_url',`terminate_redirect_url`='$terminate_redirect_url',`quotafull_redirect_url`='$quotafull_redirect_url' WHERE supplier_id='$s_id'";

    if (mysqli_query($conn, $supplierUpdateQuery)) {
        ?>
        <script>
            let timerInterval;
            Swal.fire({
                title: "Updateing Supplier Details",
                html: "Please wait",
                timer: 5000,
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
                        title: "Supplier Update Successfully",
                        showConfirmButton: false,
                        timer: 3000
                    });
                    console.log("I was closed by the timer");
                    setTimeout(function () {
                        window.location.href = "suppliers.php";
                    }, 3000);
                }
            });
        </script>
        <?php
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        ?>
        <script>
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Error While Updateing Detials",
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
    <div class="col-6">
        <label for="inputEmail4" class="form-label">Name <span style="color:red">*</span></label>
        <input type="text" class="form-control" id="inputEmail4" name="name" value="<?php echo $supplier_name; ?>"
            required>
    </div>
    <div class="col-6">
        <label for="eamil" class="form-label">Email <span style="color:red">*</span></label>
        <input type="email" class="form-control" id="email" name="email" value="<?php echo $supplier_email; ?>"
            required>
    </div>
    <div class="col-12">
        <label for="completeRedURL" class="form-label">Complete Redirect URL</label>
        <input type="test" class="form-control" id="completeRedURL" name="completeRedURL"
            value="<?php echo $complete_redirect_url; ?>">
    </div>
    <div class="col-12">
        <label for="terminateRedURL" class="form-label">Terminate Redirect URL</label>
        <input type="test" class="form-control" id="terminateRedURL" name="terminateRedURL"
            value="<?php echo $terminate_redirect_url; ?>">
    </div>
    <div class="col-12">
        <label for="quotafullRedURL" class="form-label">Quotafull Redirect URL</label>
        <input type="test" class="form-control" id="quotafullRedURL" name="quotafullRedURL"
            value="<?php echo $quotafull_redirect_url; ?>">
    </div>
    <div class="col-12">
        <button name="submitUpdate" class="btn btn-primary">Update</button>
        <button class="btn btn-danger">Cancel</button>
    </div>
</form>