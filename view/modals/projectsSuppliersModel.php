<?php

$random_1 = "";
$random_2 = "";
$random_3 = "";
$base_url = "https://ilika.com/client/";
$complete_end_url = "/complete?username=XXXX";
$terminate_end_url = "/terminate?username=XXXX";
$quotafull_end_url = "/quotafull?username=XXXX";
if (isset($_POST['submit'])) {
    print_r($_POST);
    exit();

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

    // insert form data into database
    $sql = "INSERT INTO `clients`
            (`c_id`, `c_name`, `desc`, `note`, `redirect_type`, `complete_url`, 
            `terminate_url`, `quotafull_url`, `status`) 
            VALUES 
            ('$clientId', '$name', '$description', '$note', '$redirect_type', '$complete_url', 
            '$terminate_url', '$quotafull_url', '$status')";

    if (mysqli_query($conn, $sql)) {
        ?>
        <script>
            let timerInterval;
            Swal.fire({
                title: "Registering New Client",
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
                        title: "New Client Registered Successfully",
                        showConfirmButton: false,
                        timer: 3000
                    });
                    console.log("I was closed by the timer");
                    setTimeout(function () {
                        window.location.href = "clients.php";
                    }, 3000);
                }
            });
        </script>
        <?php
    } else {
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
                <h5 class="modal-title">Add Supplier</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">
                <form class="row g-3" method="post">

                    <div class="col-12">
                        <select class="js-example-basic-multiple" name="states[]" multiple="multiple">
                            <option value="AL">Alabama</option>
                            <option value="WY">Wyoming</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Name <span style="color:red">*</span></label>
                        <input type="text" class="form-control" id="inputEmail4" name="name">
                    </div>
                    <div class="col-12">
                        <label for="exampleFormControlTextarea1">Description</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"
                            name="description"></textarea>
                    </div>
                    <div class="col-12">
                        <label for="exampleFormControlTextarea1">Note</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="2" name="note"></textarea>
                    </div>
                    <div class="col-12">
                        <button name="submit" class="btn btn-primary">Register</button>
                        <button class="btn btn-danger">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.js-example-basic-multiple').select2();
    });
</script>