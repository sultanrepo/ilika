<?php

$random_1 = "";
$random_2 = "";
$random_3 = "";
$base_url = "https://ilika.com/client/";
$complete_end_url = "/complete?username=XXXX";
$terminate_end_url = "/terminate?username=XXXX";
$quotafull_end_url = "/quotafull?username=XXXX";
if (isset($_POST['submit'])) {

    //Generate Client ID
    $permitted_chars = '0123456789abcdef';
    $random_1 = substr(str_shuffle($permitted_chars), 0, 8);
    $random_2 = rand(1111, 9999);
    $random_3 = substr(str_shuffle($permitted_chars), 0, 12);
    $clientId = $random_1 . $random_2 . $random_3;

    // get form data
    $name = $_POST['name'];
    $description = $_POST['description'];
    $note = $_POST['note'];
    $redirect_type = "static";
    $complete_url = $base_url . $clientId . $complete_end_url;
    $terminate_url = $base_url . $clientId . $terminate_end_url;
    $quotafull_url = $base_url . $clientId . $quotafull_end_url;
    $status = '1';

    //get form data
    $supplierID = rand(1111, 9999);
    $name = $_POST['name'];
    $email = $_POST['email'];
    $completeRedURL = $_POST['completeRedURL'];
    $terminateRedURL = $_POST['terminateRedURL'];
    $quotafullRedURL = $_POST['quotafullRedURL'];
    $supplierStatus = "active";

    $supplierRegQuery = "INSERT INTO `suppliers`
    (`supplier_id`, `supplier_name`, `supplier_email`, 
    `complete_redirect_url`, `terminate_redirect_url`, `quotafull_redirect_url`, `status`) 
    VALUES 
    ('$supplierID','$name','$email','$completeRedURL','$terminateRedURL','$quotafullRedURL','$supplierStatus')";


    // insert form data into database
    $sql = "INSERT INTO `clients`
            (`c_id`, `c_name`, `desc`, `note`, `redirect_type`, `complete_url`, 
            `terminate_url`, `quotafull_url`, `status`) 
            VALUES 
            ('$clientId', '$name', '$description', '$note', '$redirect_type', '$complete_url', 
            '$terminate_url', '$quotafull_url', '$status')";

    if (mysqli_query($conn, $supplierRegQuery)) {
        ?>
        <script>
            let timerInterval;
            Swal.fire({
                title: "Registering New Supplier",
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
                        title: "New Supplier Registered Successfully",
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
        ?>
        <script>
            Swal.fire({
                position: "center",
                icon: "success",
                title: "New Supplier Registered Successfully",
                showConfirmButton: false,
                timer: 3000
            });
        </script>
        <?php
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

?>

<!-- Modal forms-->
<div class="modal fade" id="exampleModalForms" tabindex="-1" role="dialog" aria-labelledby="exampleModalForms"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Supplier Registration</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="row g-3" method="post">
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Name <span style="color:red">*</span></label>
                        <input type="text" class="form-control" id="inputEmail4" name="name" required>
                    </div>
                    <div class="col-12">
                        <label for="eamil" class="form-label">Email <span style="color:red">*</span></label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="col-12">
                        <label for="completeRedURL" class="form-label">Complete Redirect URL</label>
                        <input type="test" class="form-control" id="completeRedURL" name="completeRedURL">
                    </div>
                    <div class="col-12">
                        <label for="terminateRedURL" class="form-label">Terminate Redirect URL</label>
                        <input type="test" class="form-control" id="terminateRedURL" name="terminateRedURL">
                    </div>
                    <div class="col-12">
                        <label for="quotafullRedURL" class="form-label">Quotafull Redirect URL</label>
                        <input type="test" class="form-control" id="quotafullRedURL" name="quotafullRedURL">
                    </div>
                    <div class="col-12">
                        <button name="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>