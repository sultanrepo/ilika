<?php

$c_id = $_GET['c_id'];

$clientQuery = "SELECT * FROM `clients` WHERE c_id='$c_id'";
$result = mysqli_query($conn, $clientQuery);
$clientRows = mysqli_fetch_array($result);
$name = $clientRows['c_name'];
$desc = $clientRows['desc'];
$note = $clientRows['note'];

if (isset($_POST['submitUpdate'])) {

    // get form data
    $nameForm = trim($_POST['name']);
    $descriptionForm = trim($_POST['description']);
    $noteForm = trim($_POST['note']);

    // insert form data into database
    $clientUpdateQuery = "UPDATE `clients` SET `c_name`='$nameForm',`desc`='$descriptionForm',`note`='$noteForm' WHERE c_id='$c_id'";

    if (mysqli_query($conn, $clientUpdateQuery)) {
        ?>
        <script>
            let timerInterval;
            Swal.fire({
                title: "Updateing Client Details",
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
                        title: "Client Update Successfully",
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
    <div class="col-12">
        <label for="inputEmail4" class="form-label">Name <span style="color:red">*</span></label>
        <input type="text" class="form-control" id="inputEmail4" name="name" value="<?php echo $name; ?>">
    </div>
    <div class="col-12">
        <label for="exampleFormControlTextarea1">Description</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"
            name="description"><?php echo $desc; ?></textarea>
    </div>
    <div class="col-12">
        <label for="exampleFormControlTextarea1">Note</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="2"
            name="note"><?php echo $note; ?></textarea>
    </div>
    <div class="col-12">
        <button name="submitUpdate" class="btn btn-primary">Update</button>
        <button class="btn btn-danger">Cancel</button>
    </div>
</form>