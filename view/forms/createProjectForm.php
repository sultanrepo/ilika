<?php

$c_id = $_GET['c_id'];

$clientQuery = "SELECT * FROM `clients` WHERE c_id='$c_id'";
$result = mysqli_query($conn, $clientQuery);
$clientRows = mysqli_fetch_array($result);
$name = $clientRows['c_name'];
$desc = $clientRows['desc'];
$note = $clientRows['note'];

if (isset($_POST['createProject'])) {
    print_r($_POST['createProject']);
    $client_ID = $_POST['clientID'];
    $project_ID = $_POST['projectID'];
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
            return;
    } else {
        $createProjectQuery = "INSERT INTO `projects`
        (`client_id`, `project_id`, `project_name`, `project_desc`, `cpi`, `max_complate_limit`, `live_link_country_id`, 
        `test_link_country`, `test_link`, `cid_replacer`, `status`) 
        VALUES 
        ('$client_ID','$project_ID','$projName','$projectDesc','$cpi','$maxCompletes','$project_ID','$testCountry',
        '$testLink','$cidRep', 'pause')";
        echo $createProjectQuery;
        $createProjectResult = mysqli_query($conn, $createProjectQuery);
        print_r($createProjectResult);
        if ($createProjectResult) {
            $count = 0;
            for ($i = 0; $i < $liveLinkCountryCount; $i++) {
                echo "<br>LiveCountry:-" . $liveLinkCountry[$i] . "<br> LiveLink:-" . $liveLink[$i];
                $addLiveLinkQuery = "INSERT INTO `live_link`(`project_id`, `country`, `live_link`) 
                                    VALUES ('$project_ID','$liveLinkCountry[$i]','$liveLink[$i]')";
                echo $addLiveLinkQuery;
                $addLiveLinkResult = mysqli_query($conn, $addLiveLinkQuery);
                if ($addLiveLinkQuery) {
                    $count++;
                }
            }
            if ($liveLinkCountryCount == $count) {
                ?>
                    <script>
                        let timerInterval;
                        Swal.fire({
                            title: "Creating Project",
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
                                    title: "Project Created Successfully",
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                                console.log("I was closed by the timer");
                                setTimeout(function () {
                                    window.location.href = "projects.php";
                                }, 3000);
                            }
                        });
                    </script>
                <?php
            }
        } else {
            ?>
                <script>
                    Swal.fire({
                        position: "center",
                        icon: "error",
                        title: "Something went wrong while Project Creataion",
                        showConfirmButton: false,
                        timer: 5000
                    });
                </script>
            <?php
        }
    }
}
?>

<hr>
<form class="row g-3" method="post">
    <div class="col-6">
        <label for="inputEmail4" class="form-label">Clients <span style="color:red">*</span></label>
        <select id="Clients" class="form-select" aria-label="Default select example" name="clientID">
            <option selected value="na">Select Client</option>
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
        <input type="text" class="form-control" id="projectID" name="projectID" required>
        <span style="color:red" class="error" id="ProjectIDError"></span>
    </div>
    <div class="col-6">
        <label for="projectName" class="form-label">Project Name<span style="color:red">*</span></label>
        <input type="text" class="form-control" id="projectName" name="projectName" required>
        <span style="color:red" class="error" id="ProjectNameError"></span>
    </div>
    <div class="col-6">
    </div>
    <div class="col-12">
        <label for="desc">Description <span style="color:red">*</span></label>
        <textarea class="form-control" id="proDesc" rows="5" name="description" required></textarea>
        <span style="color:red" class="error" id="DescriptionError"></span>
    </div>
    <br>
    <label for="cpi" class="form-label">Cost Per Complete (CPI)<span style="color:red">*</span></label>
    <div class="input-group mb-3">
        <span class="input-group-text">$</span>
        <input type="number" class="form-control" id="cpi" name="cpi" aria-label="Amount (to the nearest dollar)"
            required>
        <span class="input-group-text">.00</span>
        <span style="color:red" class="error" id="CostPerCompleteError"></span>
    </div>
    <div class="col-12">
        <label for="maxLimit" class="form-label">Maximum Completes (Limit) <p>Input 0 for unlimited completes.</p>
            <span style="color:red">*</span></label>
        <input type="number" class="form-control" id="maxLimit" name="maxCompLimit" value="0" required>
        <span style="color:red" class="error" id="MaximumCompletesError"></span>
    </div>
    <hr>
    <div class="col-md-3">
        <label for="inputState" class="form-label">Country</label>
        <select id="inputState" class="form-select" name=liveLinkCountry[] required>
            <option selected value="NA">Choose...</option>
            <option value="AF">Afghanistan 🇦🇫</option>
            <option value="AO">Angola 🇦🇴</option>
            <option value="AL">Albania 🇦🇱</option>
            <option value="AD">Andorra 🇦🇩</option>
            <option value="AE">United Arab Emirates 🇦🇪</option>
            <option value="AR">Argentina 🇦🇷</option>
            <option value="AM">Armenia 🇦🇲</option>
            <option value="AG">Antigua and Barbuda 🇦🇬</option>
            <option value="AU">Australia 🇦🇺</option>
            <option value="AT">Austria 🇦🇹</option>
            <option value="AZ">Azerbaijan 🇦🇿</option>
            <option value="BI">Burundi 🇧🇮</option>
            <option value="BE">Belgium 🇧🇪</option>
            <option value="BJ">Benin 🇧🇯</option>
            <option value="BF">Burkina Faso 🇧🇫</option>
            <option value="BD">Bangladesh 🇧🇩</option>
            <option value="BG">Bulgaria 🇧🇬</option>
            <option value="BH">Bahrain 🇧🇭</option>
            <option value="BS">Bahamas 🇧🇸</option>
            <option value="BA">Bosnia and Herzegovina 🇧🇦</option>
            <option value="BY">Belarus 🇧🇾</option>
            <option value="BZ">Belize 🇧🇿</option>
            <option value="BO">Bolivia 🇧🇴</option>
            <option value="BR">Brazil 🇧🇷</option>
            <option value="BB">Barbados 🇧🇧</option>
            <option value="BN">Brunei 🇧🇳</option>
            <option value="BT">Bhutan 🇧🇹</option>
            <option value="BW">Botswana 🇧🇼</option>
            <option value="CF">Central African Republic 🇨🇫</option>
            <option value="CA">Canada 🇨🇦</option>
            <option value="CH">Switzerland 🇨🇭</option>
            <option value="CL">Chile 🇨🇱</option>
            <option value="CN">China 🇨🇳</option>
            <option value="CI">Ivory Coast 🇨🇮</option>
            <option value="CM">Cameroon 🇨🇲</option>
            <option value="CD">DR Congo 🇨🇩</option>
            <option value="CG">Republic of the Congo 🇨🇬</option>
            <option value="CO">Colombia 🇨🇴</option>
            <option value="KM">Comoros 🇰🇲</option>
            <option value="CV">Cape Verde 🇨🇻</option>
            <option value="CR">Costa Rica 🇨🇷</option>
            <option value="CU">Cuba 🇨🇺</option>
            <option value="CY">Cyprus 🇨🇾</option>
            <option value="CZ">Czechia 🇨🇿</option>
            <option value="DE">Germany 🇩🇪</option>
            <option value="DJ">Djibouti 🇩🇯</option>
            <option value="DM">Dominica 🇩🇲</option>
            <option value="DK">Denmark 🇩🇰</option>
            <option value="DO">Dominican Republic 🇩🇴</option>
            <option value="DZ">Algeria 🇩🇿</option>
            <option value="EC">Ecuador 🇪🇨</option>
            <option value="EG">Egypt 🇪🇬</option>
            <option value="ER">Eritrea 🇪🇷</option>
            <option value="ES">Spain 🇪🇸</option>
            <option value="EE">Estonia 🇪🇪</option>
            <option value="ET">Ethiopia 🇪🇹</option>
            <option value="FI">Finland 🇫🇮</option>
            <option value="FJ">Fiji 🇫🇯</option>
            <option value="FR">France 🇫🇷</option>
            <option value="FM">Micronesia 🇫🇲</option>
            <option value="GA">Gabon 🇬🇦</option>
            <option value="GB">United Kingdom 🇬🇧</option>
            <option value="GE">Georgia 🇬🇪</option>
            <option value="GH">Ghana 🇬🇭</option>
            <option value="GN">Guinea 🇬🇳</option>
            <option value="GM">Gambia 🇬🇲</option>
            <option value="GW">Guinea-Bissau 🇬🇼</option>
            <option value="GQ">Equatorial Guinea 🇬🇶</option>
            <option value="GR">Greece 🇬🇷</option>
            <option value="GD">Grenada 🇬🇩</option>
            <option value="GT">Guatemala 🇬🇹</option>
            <option value="GY">Guyana 🇬🇾</option>
            <option value="HN">Honduras 🇭🇳</option>
            <option value="HR">Croatia 🇭🇷</option>
            <option value="HT">Haiti 🇭🇹</option>
            <option value="HU">Hungary 🇭🇺</option>
            <option value="ID">Indonesia 🇮🇩</option>
            <option value="IN">India 🇮🇳</option>
            <option value="IE">Ireland 🇮🇪</option>
            <option value="IR">Iran 🇮🇷</option>
            <option value="IQ">Iraq 🇮🇶</option>
            <option value="IS">Iceland 🇮🇸</option>
            <option value="IL">Israel 🇮🇱</option>
            <option value="IT">Italy 🇮🇹</option>
            <option value="JM">Jamaica 🇯🇲</option>
            <option value="JO">Jordan 🇯🇴</option>
            <option value="JP">Japan 🇯🇵</option>
            <option value="KZ">Kazakhstan 🇰🇿</option>
            <option value="KE">Kenya 🇰🇪</option>
            <option value="KG">Kyrgyzstan 🇰🇬</option>
            <option value="KH">Cambodia 🇰🇭</option>
            <option value="KI">Kiribati 🇰🇮</option>
            <option value="KN">Saint Kitts and Nevis 🇰🇳</option>
            <option value="KR">South Korea 🇰🇷</option>
            <option value="KW">Kuwait 🇰🇼</option>
            <option value="LA">Laos 🇱🇦</option>
            <option value="LB">Lebanon 🇱🇧</option>
            <option value="LR">Liberia 🇱🇷</option>
            <option value="LY">Libya 🇱🇾</option>
            <option value="LC">Saint Lucia 🇱🇨</option>
            <option value="LI">Liechtenstein 🇱🇮</option>
            <option value="LK">Sri Lanka 🇱🇰</option>
            <option value="LS">Lesotho 🇱🇸</option>
            <option value="LT">Lithuania 🇱🇹</option>
            <option value="LU">Luxembourg 🇱🇺</option>
            <option value="LV">Latvia 🇱🇻</option>
            <option value="MA">Morocco 🇲🇦</option>
            <option value="MC">Monaco 🇲🇨</option>
            <option value="MD">Moldova 🇲🇩</option>
            <option value="MG">Madagascar 🇲🇬</option>
            <option value="MV">Maldives 🇲🇻</option>
            <option value="MX">Mexico 🇲🇽</option>
            <option value="MH">Marshall Islands 🇲🇭</option>
            <option value="MK">Macedonia 🇲🇰</option>
            <option value="ML">Mali 🇲🇱</option>
            <option value="MT">Malta 🇲🇹</option>
            <option value="MM">Myanmar 🇲🇲</option>
            <option value="ME">Montenegro 🇲🇪</option>
            <option value="MN">Mongolia 🇲🇳</option>
            <option value="MZ">Mozambique 🇲🇿</option>
            <option value="MR">Mauritania 🇲🇷</option>
            <option value="MU">Mauritius 🇲🇺</option>
            <option value="MW">Malawi 🇲🇼</option>
            <option value="MY">Malaysia 🇲🇾</option>
            <option value="NA">Namibia 🇳🇦</option>
            <option value="NE">Niger 🇳🇪</option>
            <option value="NG">Nigeria 🇳🇬</option>
            <option value="NI">Nicaragua 🇳🇮</option>
            <option value="NL">Netherlands 🇳🇱</option>
            <option value="NO">Norway 🇳🇴</option>
            <option value="NP">Nepal 🇳🇵</option>
            <option value="NR">Nauru 🇳🇷</option>
            <option value="NZ">New Zealand 🇳🇿</option>
            <option value="OM">Oman 🇴🇲</option>
            <option value="PK">Pakistan 🇵🇰</option>
            <option value="PA">Panama 🇵🇦</option>
            <option value="PE">Peru 🇵🇪</option>
            <option value="PH">Philippines 🇵🇭</option>
            <option value="PW">Palau 🇵🇼</option>
            <option value="PG">Papua New Guinea 🇵🇬</option>
            <option value="PL">Poland 🇵🇱</option>
            <option value="KP">North Korea 🇰🇵</option>
            <option value="PT">Portugal 🇵🇹</option>
            <option value="PY">Paraguay 🇵🇾</option>
            <option value="QA">Qatar 🇶🇦</option>
            <option value="RO">Romania 🇷🇴</option>
            <option value="RU">Russia 🇷🇺</option>
            <option value="RW">Rwanda 🇷🇼</option>
            <option value="SA">Saudi Arabia 🇸🇦</option>
            <option value="SD">Sudan 🇸🇩</option>
            <option value="SN">Senegal 🇸🇳</option>
            <option value="SG">Singapore 🇸🇬</option>
            <option value="SB">Solomon Islands 🇸🇧</option>
            <option value="SL">Sierra Leone 🇸🇱</option>
            <option value="SV">El Salvador 🇸🇻</option>
            <option value="SM">San Marino 🇸🇲</option>
            <option value="SO">Somalia 🇸🇴</option>
            <option value="RS">Serbia 🇷🇸</option>
            <option value="SS">South Sudan 🇸🇸</option>
            <option value="ST">São Tomé and Príncipe 🇸🇹</option>
            <option value="SR">Suriname 🇸🇷</option>
            <option value="SK">Slovakia 🇸🇰</option>
            <option value="SI">Slovenia 🇸🇮</option>
            <option value="SE">Sweden 🇸🇪</option>
            <option value="SZ">Swaziland 🇸🇿</option>
            <option value="SC">Seychelles 🇸🇨</option>
            <option value="SY">Syria 🇸🇾</option>
            <option value="TD">Chad 🇹🇩</option>
            <option value="TG">Togo 🇹🇬</option>
            <option value="TH">Thailand 🇹🇭</option>
            <option value="TJ">Tajikistan 🇹🇯</option>
            <option value="TM">Turkmenistan 🇹🇲</option>
            <option value="TL">Timor-Leste 🇹🇱</option>
            <option value="TO">Tonga 🇹🇴</option>
            <option value="TT">Trinidad and Tobago 🇹🇹</option>
            <option value="TN">Tunisia 🇹🇳</option>
            <option value="TR">Turkey 🇹🇷</option>
            <option value="TV">Tuvalu 🇹🇻</option>
            <option value="TZ">Tanzania 🇹🇿</option>
            <option value="UG">Uganda 🇺🇬</option>
            <option value="UA">Ukraine 🇺🇦</option>
            <option value="UY">Uruguay 🇺🇾</option>
            <option value="US">United States 🇺🇸</option>
            <option value="UZ">Uzbekistan 🇺🇿</option>
            <option value="VA">Vatican City 🇻🇦</option>
            <option value="VC">Saint Vincent and the Grenadines 🇻🇨</option>
            <option value="VE">Venezuela 🇻🇪</option>
            <option value="VN">Vietnam 🇻🇳</option>
            <option value="VU">Vanuatu 🇻🇺</option>
            <option value="WS">Samoa 🇼🇸</option>
            <option value="YE">Yemen 🇾🇪</option>
            <option value="ZA">South Africa 🇿🇦</option>
            <option value="ZM">Zambia 🇿🇲</option>
            <option value="ZW">Zimbabwe 🇿🇼</option>
        </select>
        <span style="color:red" class="error" id="liveCountry"></span>
    </div>
    <div class="col-md-6">
        <label for="inputZip" class="form-label">Live Link</label>
        <input type="text" class="form-control" id="inputZip" name="liveLink[]" required>
        <span style="color:red" class="error" id="LiveLinkError"></span>
    </div>
    <div class="col-md-3">
        <hr>
        <button id="rowAdder" type="button" class="btn btn-light btn-floating">➕</button>
        <button id="rowRemover" type="button" class="btn btn-white btn-floating">❌</button>
    </div>
    <div id="countryInput" class="col-md-3"></div>
    <div id="liveLinkInput" class="col-md-6"></div>
    <hr>
    <div class="col-md-3">
        <label for="testCountry" class="form-label">Country</label>
        <select id="testCountry" class="form-select" name="testCountry" required>
            <option selected value="NA">Choose...</option>
            <option value="AF">Afghanistan 🇦🇫</option>
            <option value="AO">Angola 🇦🇴</option>
            <option value="AL">Albania 🇦🇱</option>
            <option value="AD">Andorra 🇦🇩</option>
            <option value="AE">United Arab Emirates 🇦🇪</option>
            <option value="AR">Argentina 🇦🇷</option>
            <option value="AM">Armenia 🇦🇲</option>
            <option value="AG">Antigua and Barbuda 🇦🇬</option>
            <option value="AU">Australia 🇦🇺</option>
            <option value="AT">Austria 🇦🇹</option>
            <option value="AZ">Azerbaijan 🇦🇿</option>
            <option value="BI">Burundi 🇧🇮</option>
            <option value="BE">Belgium 🇧🇪</option>
            <option value="BJ">Benin 🇧🇯</option>
            <option value="BF">Burkina Faso 🇧🇫</option>
            <option value="BD">Bangladesh 🇧🇩</option>
            <option value="BG">Bulgaria 🇧🇬</option>
            <option value="BH">Bahrain 🇧🇭</option>
            <option value="BS">Bahamas 🇧🇸</option>
            <option value="BA">Bosnia and Herzegovina 🇧🇦</option>
            <option value="BY">Belarus 🇧🇾</option>
            <option value="BZ">Belize 🇧🇿</option>
            <option value="BO">Bolivia 🇧🇴</option>
            <option value="BR">Brazil 🇧🇷</option>
            <option value="BB">Barbados 🇧🇧</option>
            <option value="BN">Brunei 🇧🇳</option>
            <option value="BT">Bhutan 🇧🇹</option>
            <option value="BW">Botswana 🇧🇼</option>
            <option value="CF">Central African Republic 🇨🇫</option>
            <option value="CA">Canada 🇨🇦</option>
            <option value="CH">Switzerland 🇨🇭</option>
            <option value="CL">Chile 🇨🇱</option>
            <option value="CN">China 🇨🇳</option>
            <option value="CI">Ivory Coast 🇨🇮</option>
            <option value="CM">Cameroon 🇨🇲</option>
            <option value="CD">DR Congo 🇨🇩</option>
            <option value="CG">Republic of the Congo 🇨🇬</option>
            <option value="CO">Colombia 🇨🇴</option>
            <option value="KM">Comoros 🇰🇲</option>
            <option value="CV">Cape Verde 🇨🇻</option>
            <option value="CR">Costa Rica 🇨🇷</option>
            <option value="CU">Cuba 🇨🇺</option>
            <option value="CY">Cyprus 🇨🇾</option>
            <option value="CZ">Czechia 🇨🇿</option>
            <option value="DE">Germany 🇩🇪</option>
            <option value="DJ">Djibouti 🇩🇯</option>
            <option value="DM">Dominica 🇩🇲</option>
            <option value="DK">Denmark 🇩🇰</option>
            <option value="DO">Dominican Republic 🇩🇴</option>
            <option value="DZ">Algeria 🇩🇿</option>
            <option value="EC">Ecuador 🇪🇨</option>
            <option value="EG">Egypt 🇪🇬</option>
            <option value="ER">Eritrea 🇪🇷</option>
            <option value="ES">Spain 🇪🇸</option>
            <option value="EE">Estonia 🇪🇪</option>
            <option value="ET">Ethiopia 🇪🇹</option>
            <option value="FI">Finland 🇫🇮</option>
            <option value="FJ">Fiji 🇫🇯</option>
            <option value="FR">France 🇫🇷</option>
            <option value="FM">Micronesia 🇫🇲</option>
            <option value="GA">Gabon 🇬🇦</option>
            <option value="GB">United Kingdom 🇬🇧</option>
            <option value="GE">Georgia 🇬🇪</option>
            <option value="GH">Ghana 🇬🇭</option>
            <option value="GN">Guinea 🇬🇳</option>
            <option value="GM">Gambia 🇬🇲</option>
            <option value="GW">Guinea-Bissau 🇬🇼</option>
            <option value="GQ">Equatorial Guinea 🇬🇶</option>
            <option value="GR">Greece 🇬🇷</option>
            <option value="GD">Grenada 🇬🇩</option>
            <option value="GT">Guatemala 🇬🇹</option>
            <option value="GY">Guyana 🇬🇾</option>
            <option value="HN">Honduras 🇭🇳</option>
            <option value="HR">Croatia 🇭🇷</option>
            <option value="HT">Haiti 🇭🇹</option>
            <option value="HU">Hungary 🇭🇺</option>
            <option value="ID">Indonesia 🇮🇩</option>
            <option value="IN">India 🇮🇳</option>
            <option value="IE">Ireland 🇮🇪</option>
            <option value="IR">Iran 🇮🇷</option>
            <option value="IQ">Iraq 🇮🇶</option>
            <option value="IS">Iceland 🇮🇸</option>
            <option value="IL">Israel 🇮🇱</option>
            <option value="IT">Italy 🇮🇹</option>
            <option value="JM">Jamaica 🇯🇲</option>
            <option value="JO">Jordan 🇯🇴</option>
            <option value="JP">Japan 🇯🇵</option>
            <option value="KZ">Kazakhstan 🇰🇿</option>
            <option value="KE">Kenya 🇰🇪</option>
            <option value="KG">Kyrgyzstan 🇰🇬</option>
            <option value="KH">Cambodia 🇰🇭</option>
            <option value="KI">Kiribati 🇰🇮</option>
            <option value="KN">Saint Kitts and Nevis 🇰🇳</option>
            <option value="KR">South Korea 🇰🇷</option>
            <option value="KW">Kuwait 🇰🇼</option>
            <option value="LA">Laos 🇱🇦</option>
            <option value="LB">Lebanon 🇱🇧</option>
            <option value="LR">Liberia 🇱🇷</option>
            <option value="LY">Libya 🇱🇾</option>
            <option value="LC">Saint Lucia 🇱🇨</option>
            <option value="LI">Liechtenstein 🇱🇮</option>
            <option value="LK">Sri Lanka 🇱🇰</option>
            <option value="LS">Lesotho 🇱🇸</option>
            <option value="LT">Lithuania 🇱🇹</option>
            <option value="LU">Luxembourg 🇱🇺</option>
            <option value="LV">Latvia 🇱🇻</option>
            <option value="MA">Morocco 🇲🇦</option>
            <option value="MC">Monaco 🇲🇨</option>
            <option value="MD">Moldova 🇲🇩</option>
            <option value="MG">Madagascar 🇲🇬</option>
            <option value="MV">Maldives 🇲🇻</option>
            <option value="MX">Mexico 🇲🇽</option>
            <option value="MH">Marshall Islands 🇲🇭</option>
            <option value="MK">Macedonia 🇲🇰</option>
            <option value="ML">Mali 🇲🇱</option>
            <option value="MT">Malta 🇲🇹</option>
            <option value="MM">Myanmar 🇲🇲</option>
            <option value="ME">Montenegro 🇲🇪</option>
            <option value="MN">Mongolia 🇲🇳</option>
            <option value="MZ">Mozambique 🇲🇿</option>
            <option value="MR">Mauritania 🇲🇷</option>
            <option value="MU">Mauritius 🇲🇺</option>
            <option value="MW">Malawi 🇲🇼</option>
            <option value="MY">Malaysia 🇲🇾</option>
            <option value="NA">Namibia 🇳🇦</option>
            <option value="NE">Niger 🇳🇪</option>
            <option value="NG">Nigeria 🇳🇬</option>
            <option value="NI">Nicaragua 🇳🇮</option>
            <option value="NL">Netherlands 🇳🇱</option>
            <option value="NO">Norway 🇳🇴</option>
            <option value="NP">Nepal 🇳🇵</option>
            <option value="NR">Nauru 🇳🇷</option>
            <option value="NZ">New Zealand 🇳🇿</option>
            <option value="OM">Oman 🇴🇲</option>
            <option value="PK">Pakistan 🇵🇰</option>
            <option value="PA">Panama 🇵🇦</option>
            <option value="PE">Peru 🇵🇪</option>
            <option value="PH">Philippines 🇵🇭</option>
            <option value="PW">Palau 🇵🇼</option>
            <option value="PG">Papua New Guinea 🇵🇬</option>
            <option value="PL">Poland 🇵🇱</option>
            <option value="KP">North Korea 🇰🇵</option>
            <option value="PT">Portugal 🇵🇹</option>
            <option value="PY">Paraguay 🇵🇾</option>
            <option value="QA">Qatar 🇶🇦</option>
            <option value="RO">Romania 🇷🇴</option>
            <option value="RU">Russia 🇷🇺</option>
            <option value="RW">Rwanda 🇷🇼</option>
            <option value="SA">Saudi Arabia 🇸🇦</option>
            <option value="SD">Sudan 🇸🇩</option>
            <option value="SN">Senegal 🇸🇳</option>
            <option value="SG">Singapore 🇸🇬</option>
            <option value="SB">Solomon Islands 🇸🇧</option>
            <option value="SL">Sierra Leone 🇸🇱</option>
            <option value="SV">El Salvador 🇸🇻</option>
            <option value="SM">San Marino 🇸🇲</option>
            <option value="SO">Somalia 🇸🇴</option>
            <option value="RS">Serbia 🇷🇸</option>
            <option value="SS">South Sudan 🇸🇸</option>
            <option value="ST">São Tomé and Príncipe 🇸🇹</option>
            <option value="SR">Suriname 🇸🇷</option>
            <option value="SK">Slovakia 🇸🇰</option>
            <option value="SI">Slovenia 🇸🇮</option>
            <option value="SE">Sweden 🇸🇪</option>
            <option value="SZ">Swaziland 🇸🇿</option>
            <option value="SC">Seychelles 🇸🇨</option>
            <option value="SY">Syria 🇸🇾</option>
            <option value="TD">Chad 🇹🇩</option>
            <option value="TG">Togo 🇹🇬</option>
            <option value="TH">Thailand 🇹🇭</option>
            <option value="TJ">Tajikistan 🇹🇯</option>
            <option value="TM">Turkmenistan 🇹🇲</option>
            <option value="TL">Timor-Leste 🇹🇱</option>
            <option value="TO">Tonga 🇹🇴</option>
            <option value="TT">Trinidad and Tobago 🇹🇹</option>
            <option value="TN">Tunisia 🇹🇳</option>
            <option value="TR">Turkey 🇹🇷</option>
            <option value="TV">Tuvalu 🇹🇻</option>
            <option value="TZ">Tanzania 🇹🇿</option>
            <option value="UG">Uganda 🇺🇬</option>
            <option value="UA">Ukraine 🇺🇦</option>
            <option value="UY">Uruguay 🇺🇾</option>
            <option value="US">United States 🇺🇸</option>
            <option value="UZ">Uzbekistan 🇺🇿</option>
            <option value="VA">Vatican City 🇻🇦</option>
            <option value="VC">Saint Vincent and the Grenadines 🇻🇨</option>
            <option value="VE">Venezuela 🇻🇪</option>
            <option value="VN">Vietnam 🇻🇳</option>
            <option value="VU">Vanuatu 🇻🇺</option>
            <option value="WS">Samoa 🇼🇸</option>
            <option value="YE">Yemen 🇾🇪</option>
            <option value="ZA">South Africa 🇿🇦</option>
            <option value="ZM">Zambia 🇿🇲</option>
            <option value="ZW">Zimbabwe 🇿🇼</option>
        </select>
        <span style="color:red" class="error" id="testCountryError"></span>
    </div>
    <div class="col-md-6">
        <label for="testLink" class="form-label">Test Link</label>
        <input type="text" class="form-control" id="testLink" name="testLink" required>
        <span style="color:red" class="error" id="TestLinkError"></span>
    </div>
    <div class="col-12">
        <label for="cidRep" class="form-label">Cid replacer</label>
        <input type="text" class="form-control" id="cidRep" name="cidRep" required>
        <span style="color:red" class="error" id="CidreplacerError"></span>
        <p>
            The param that should be replaced with Lead ClickID in URL.
            ( for e.g. if the live url is https://example.com/surveys?projectId=2345&user=[uid]
            then Cid Replacer should be [uid] )
        </p>
    </div>
    <div class="col-12">
        <button name="createProject" class="btn btn-primary">Create</button>
        <button class="btn btn-danger" onclick="redirectToPage('projects.php')">Cancel</button>
    </div>
</form>