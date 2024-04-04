<?php

$projectID = $_GET['project_id'];

$getProjectDetailsByID = "SELECT * FROM `projects` WHERE project_id='$projectID'";
$resultGetProjectDetailsByID = mysqli_query($conn, $getProjectDetailsByID);
$rowGetProjectDetailsByID = mysqli_fetch_assoc($resultGetProjectDetailsByID);

$client_id = $rowGetProjectDetailsByID['client_id'];
$project_id = $rowGetProjectDetailsByID['project_id'];
$project_name = $rowGetProjectDetailsByID['project_name'];
$project_desc = $rowGetProjectDetailsByID['project_desc'];
$cpi_DB = $rowGetProjectDetailsByID['cpi'];
$max_complate_limit = $rowGetProjectDetailsByID['max_complate_limit'];

$test_link_country = $rowGetProjectDetailsByID['test_link_country'];
$test_link = $rowGetProjectDetailsByID['test_link'];
$cid_replacer = $rowGetProjectDetailsByID['cid_replacer'];
$status = $rowGetProjectDetailsByID['status'];

function getCountryName($countryCode)
{
    include ("DBConfig/connection.php");
    $countryCo = strtoupper($countryCode);
    $getCountryNameQuery = "SELECT * FROM `countries` WHERE ISO='$countryCo'";
    $getCountryNameResult = mysqli_query($conn, $getCountryNameQuery);
    $getCountryRows = mysqli_fetch_array($getCountryNameResult);
    $countryName = $getCountryRows["NAME"];
    return $countryName;
}

if (isset($_POST['saveChanges'])) {

    $client_ID = $_POST['clientID'];
    $project_ID = $_POST['project_id'];
    $projName = $_POST['projectName'];
    $projectDesc = $_POST['description'];
    $cpi = $_POST['cpi'];
    $maxCompletes = $_POST['maxCompLimit'];

    //Live Link
    $liveLinkCountry = $_POST['liveLinkCountry'];
    $liveLink = $_POST['liveLink'];

    $liveLinkCountryCount = count($liveLinkCountry);
    $liveLinkCount = count($liveLink);

    $testCountry = $_POST['testCountry'];
    $testLink = $_POST['testLink'];
    $cidRep = $_POST['cidRep'];
    if ($client_ID == 'na') {
        ?>
        <script>
            Swal.fire({
                position: "center",
                icon: "error",
                title: "Please select Client",
                showConfirmButton: false,
                timer: 3000
            });
        </script>
        <?php
        return;
    } else if ($liveLinkCountryCount == 0 && $liveLinkCount == 0) {
        ?>
            <script>
                Swal.fire({
                    position: "center",
                    icon: "error",
                    title: "Select Live Link Country & Enter Live Link",
                    showConfirmButton: false,
                    timer: 5000
                });
            </script>
        <?php
    } else {
        $saveChangesProjectQuery = "UPDATE `projects` SET 
        `client_id`='$client_ID',`project_id`='$project_ID',`project_name`='$projName',
        `project_desc`='$projectDesc',`cpi`='$cpi',`max_complate_limit`='$maxCompletes',
        `live_link_country_id`='$project_ID',`test_link_country`='$testCountry',`test_link`='$testLink',
        `cid_replacer`='$cidRep' WHERE project_id='$projectID'";

        $saveChangesProjectResult = mysqli_query($conn, $saveChangesProjectQuery);

        if ($test_link_country == 'NA') {
            $testCountryDeleteQuery = "UPDATE `projects` set `test_link_country`='-',`test_link`='-' WHERE project_id='$projectID'";
            $testCountryDeleteResult = mysqli_query($conn, $testCountryDeleteQuery);
        }

        if ($saveChangesProjectResult) {
            $count = 0;
            $deleteLiveLinksQuery = "DELETE FROM `live_link` WHERE project_id='$project_ID'";
            $deleteLiveLinkResult = mysqli_query($conn, $deleteLiveLinksQuery);
            for ($i = 0; $i < $liveLinkCountryCount; $i++) {
                //echo "<br>LiveCountry:-" . $liveLinkCountry[$i] . "<br> LiveLink:-" . $liveLink[$i];
                //echo $liveLinkCountry[$i];
                if ($liveLinkCountry[$i] == 'NA') {
                    echo "12";
                } else {
                    $addLiveLinkQuery = "INSERT INTO `live_link`(`project_id`, `country`, `live_link`) 
                    VALUES ('$project_ID','$liveLinkCountry[$i]','$liveLink[$i]')";
                    $addLiveLinkResult = mysqli_query($conn, $addLiveLinkQuery);
                    if ($addLiveLinkQuery) {
                        $count++;
                    }
                }
            }
            if ($liveLinkCountryCount == $count) {
                ?>
                    <script>
                        let timerInterval;
                        Swal.fire({
                            title: "Saving Changes",
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
                                    title: "Project Changes Saved Successfully",
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                                console.log("I was closed by the timer");
                                setTimeout(function () {
                                    window.location.href = "projectViewDeails.php?project_id=<?php echo $projectID; ?>";
                                }, 3000);
                            }
                        });
                    </script>
                <?php
            }
        }
    }
}
?>

<hr>
<form class="row g-3" method="post">
    <div class="col-6">
        <label for="inputEmail4" class="form-label">Clients <span style="color:red">*</span></label>
        <select id="Clients" class="form-select" aria-label="Default select example" name="clientID">
            <option value="na">Select Client</option>
            <?php
            $clientNameQuery = "SELECT c_id, c_name FROM `clients` WHERE c_id='$client_id'";
            $clientNameResult = mysqli_query($conn, $clientNameQuery);
            $clientNameRows = mysqli_fetch_array($clientNameResult);
            ?>
            <option selected value="<?php echo $client_id; ?>">
                <?php echo $clientNameRows['c_name']; ?>
            </option>
            <?php
            $clientListQuery = "SELECT c_id, c_name FROM `clients`";
            $clientListResult = mysqli_query($conn, $clientListQuery);
            while ($clientListRow = mysqli_fetch_array($clientListResult)) {
                ?>
                <option value="<?php echo $clientListRow['c_id'] ?>">
                    <?php echo $clientListRow['c_name'] ?>
                </option>
                <?php
            }
            ?>
        </select>
        <span style="color:red" class="error" id="ClientsError"></span>
    </div>
    <div class="col-6">
        <label for="projectID" class="form-label">Project ID<span style="color:red">*</span></label>
        <input type="text" class="form-control" id="projectID" name="project_id" value="<?php echo $project_id; ?>"
            required>
        <span style="color:red" class="error" id="ProjectIDError"></span>
    </div>
    <div class="col-6">
        <label for="projectName" class="form-label">Project Name<span style="color:red">*</span></label>
        <input type="text" class="form-control" id="projectName" name="projectName" value="<?php echo $project_name; ?>"
            required>
        <span style="color:red" class="error" id="ProjectNameError"></span>
    </div>
    <div class="col-6">
    </div>
    <div class="col-12">
        <label for="desc">Description <span style="color:red">*</span></label>
        <textarea class="form-control" id="proDesc" rows="5" name="description"
            required><?php echo $project_desc; ?></textarea>
        <span style="color:red" class="error" id="DescriptionError"></span>
    </div>
    <br>
    <label for="cpi" class="form-label">Cost Per Complete (CPI)<span style="color:red">*</span></label>
    <div class="input-group mb-3">
        <span class="input-group-text">$</span>
        <input type="number" class="form-control" id="cpi" name="cpi" value="<?php echo $cpi_DB; ?>"
            aria-label="Amount (to the nearest dollar)" required>
        <span class="input-group-text">.00</span>
        <span style="color:red" class="error" id="CostPerCompleteError"></span>
    </div>
    <div class="col-12">
        <label for="maxLimit" class="form-label">Maximum Completes (Limit) <p>Input 0 for unlimited completes.</p>
            <span style="color:red">*</span></label>
        <input type="number" class="form-control" id="maxLimit" name="maxCompLimit"
            value="<?php echo $max_complate_limit; ?>" required>
        <span style="color:red" class="error" id="MaximumCompletesError"></span>
    </div>
    <hr>
    <div class="col-md-3">
        <label for="inputState" class="form-label">Country</label>
        <select id="inputState" class="form-select" name=liveLinkCountry[] required>
            <option selected value="NA">Choose...</option>
            <?php
            $getLiveLinksQuerys = "SELECT * FROM `live_link` WHERE project_id='$project_id' LIMIT 1";
            $getLiveLinksResults = mysqli_query($conn, $getLiveLinksQuerys);
            $liveLinkRow = mysqli_fetch_array($getLiveLinksResults);
            $countryCode1 = $liveLinkRow['country'];
            $countryName1 = getCountryName($countryCode1);
            $liveLink1 = $liveLinkRow['live_link'];
            ?>
            <option selected value="<?php echo $countryCode1; ?>">
                <?php echo $countryName1; ?>
            </option>
            <?php
            $getAllCountryQuery = "SELECT * FROM `countries`";
            $getAllCountryResult = mysqli_query($conn, $getAllCountryQuery);
            while ($data = mysqli_fetch_array($getAllCountryResult)) {
                ?>
                <option value="<?php echo $data['ISO']; ?>">
                    <?php echo $data['NAME']; ?>
                </option>
                <?php
            }
            ?>
        </select>
        <span style="color:red" class="error" id="liveCountry"></span>
    </div>
    <div class="col-md-6">
        <label for="inputZip" class="form-label">Live Link</label>
        <input type="text" class="form-control" id="inputZip" value="<?php echo $liveLink1; ?>" name="liveLink[]"
            required>
        <span style="color:red" class="error" id="LiveLinkError"></span>
    </div>
    <div class="col-md-3">
        <hr>
        <button id="rowAdder" type="button" class="btn btn-light btn-floating">➕</button>
        <button id="rowRemover" type="button" class="btn btn-white btn-floating">❌</button>
    </div>
    <?php
    ?>
    <div id="countryInput" class="col-md-3">
        <?php
        //Getting All Live Links Along With Country Name
        $getLiveLinksQuery = "SELECT * FROM live_link WHERE project_id='$project_id' LIMIT 1,18446744073709551615";
        $getLiveLinksResult = mysqli_query($conn, $getLiveLinksQuery);
        if (mysqli_num_rows($getLiveLinksResult) > 0) {
            while ($rowGetLiveLinks = mysqli_fetch_array($getLiveLinksResult)) {
                $countryCode = $rowGetLiveLinks['country'];
                $countryName = getCountryName($countryCode);
                ?>
                <select id="inputState" class="form-select" name=liveLinkCountry[] required>
                    <option value="NA">Choose...</option>
                    <?php
                    ?>
                    <option selected value="<?php echo $countryCode; ?>">
                        <?php echo $countryName; ?>
                    </option>
                    <?php
                    $getAllCountryQuery = "SELECT * FROM `countries`";
                    $getAllCountryResult = mysqli_query($conn, $getAllCountryQuery);
                    while ($data = mysqli_fetch_array($getAllCountryResult)) {
                        ?>
                        <option value="<?php echo $data['ISO']; ?>">
                            <?php echo $data['NAME']; ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
                <hr>
            <?php }
        } ?>
    </div>
    <div id="liveLinkInput" class="col-md-6">
        <?php
        $getLiveLinksQuery1 = "SELECT * FROM live_link WHERE project_id='$project_id' LIMIT 1,18446744073709551615";
        $getLiveLinksResult1 = mysqli_query($conn, $getLiveLinksQuery1);
        if (mysqli_num_rows($getLiveLinksResult1) > 0) {
            while ($rowGetLiveLinks1 = mysqli_fetch_array($getLiveLinksResult1)) {
                $countryCode = $rowGetLiveLinks1['country'];
                $countryName = getCountryName($countryCode);
                $liveLink = $rowGetLiveLinks1['live_link'];
                ?>
                <input type="text" class="form-control" id="inputZip" value="<?php echo $liveLink; ?>" name="liveLink[]">
                <hr>
                <?php
            }
        }
        ?>
    </div>
    <hr>
    <div class="col-md-3">
        <label for="testCountry" class="form-label">Country</label>
        <select id="testCountry" class="form-select" name="testCountry" required>
            <option value="NA">Choose...</option>
            <option selected value="<?php echo $test_link_country; ?>">
                <?php echo getCountryName($test_link_country); ?>
            </option>
            <?php
            $getAllCountryQuery = "SELECT * FROM `countries`";
            $getAllCountryResult = mysqli_query($conn, $getAllCountryQuery);
            while ($data = mysqli_fetch_array($getAllCountryResult)) {
                ?>
                <option value="<?php echo $data['ISO']; ?>">
                    <?php echo $data['NAME']; ?>
                </option>
                <?php
            }
            ?>
        </select>
        <span style="color:red" class="error" id="testCountryError"></span>
    </div>
    <div class="col-md-6">
        <label for="testLink" class="form-label">Test Link</label>
        <input type="text" class="form-control" id="testLink" name="testLink" value="<?php echo $test_link; ?>">
        <span style="color:red" class="error" id="TestLinkError"></span>
    </div>
    <div class="col-12">
        <label for="cidRep" class="form-label">Cid replacer</label>
        <input type="text" class="form-control" id="cidRep" name="cidRep" value="<?php echo $cid_replacer; ?>" required>
        <span style="color:red" class="error" id="CidreplacerError"></span>
        <p>
            The param that should be replaced with Lead ClickID in URL.
            ( for e.g. if the live url is https://example.com/surveys?projectId=2345&user=[uid]
            then Cid Replacer should be [uid] )
        </p>
    </div>
    <div class="col-12">
        <button name="saveChanges" class="btn btn-primary">Save Changes</button>
        <button class="btn btn-danger" onclick="redirectToPage('projects.php')">Cancel</button>
    </div>
</form>