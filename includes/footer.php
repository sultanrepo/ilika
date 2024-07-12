</div>
<!-- /Wrapper -->

<!-- jQuery -->
<script src="vendors/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JS -->
<script src="vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

<!-- FeatherIcons JS -->
<script src="dist/js/feather.min.js"></script>

<!-- Fancy Dropdown JS -->
<script src="dist/js/dropdown-bootstrap-extended.js"></script>

<!-- Simplebar JS -->
<script src="vendors/simplebar/dist/simplebar.min.js"></script>

<!-- Data Table JS -->
<script src="vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="vendors/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script src="vendors/datatables.net-select/js/dataTables.select.min.js"></script>

<!-- Daterangepicker JS -->
<script src="vendors/moment/min/moment.min.js"></script>
<script src="vendors/daterangepicker/daterangepicker.js"></script>
<script src="dist/js/daterangepicker-data.js"></script>

<!-- Amcharts Maps JS -->
<script src="vendors/%40amcharts/amcharts4/core.js"></script>
<script src="vendors/%40amcharts/amcharts4/maps.js"></script>
<script src="vendors/%40amcharts/amcharts4-geodata/worldLow.js"></script>
<script src="vendors/%40amcharts/amcharts4-geodata/worldHigh.js"></script>
<script src="vendors/%40amcharts/amcharts4/themes/animated.js"></script>

<!-- Apex JS -->
<script src="vendors/apexcharts/dist/apexcharts.min.js"></script>

<!-- Init JS -->
<script src="dist/js/init.js"></script>
<script src="dist/js/chips-init.js"></script>
<script src="dist/js/dashboard-data.js"></script>

<!-- SweetAlert2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- Profile Update Details Starts -->

<!-- Upload Profile Photo -->
<script src="Controller/js/uploadProfilePhoto.js"></script>

<!-- Update Profile -->
<script src="Controller/js/updateProfile.js"></script>

<!-- Change Password -->
<script src="Controller/js/changePassword.js"></script>

<!-- Payment -->
<script src="Controller/js/payment.js"></script>

<!-- Profile Update Details Ends -->

<script>
	$(document).ready(function () {
		$('.js-example-basic-multiple').select2();
	});
</script>
<script>
	function redirectToPage(pageUrl) {
		window.location.href = pageUrl;
	}
</script>
<script>
	$("#rowAdder").click(function () {
		newRowAdd =
			'<select id="inputState" class="form-select" name=liveLinkCountry[]>' +
			'<option selected>Choose...</option>' +
			'<option value="AF">Afghanistan 🇦🇫</option>' +
			'<option value="AL">Albania 🇦🇱</option>' +
			'<option value="DZ">Algeria 🇩🇿</option>' +
			'<option value="AS">American Samoa 🇦🇸</option>' +
			'<option value="AD">Andorra 🇦🇩</option>' +
			'<option value="AO">Angola 🇦🇴</option>' +
			'<option value="AI">Anguilla 🇦🇮</option>' +
			'<option value="AQ">Antarctica 🇦🇶</option>' +
			'<option value="AG">Antigua and Barbuda 🇦🇬</option>' +
			'<option value="AR">Argentina 🇦🇷</option>' +
			'<option value="AM">Armenia 🇦🇲</option>' +
			'<option value="AW">Aruba 🇦🇼</option>' +
			'<option value="AU">Australia 🇦🇺</option>' +
			'<option value="AT">Austria 🇦🇹</option>' +
			'<option value="AZ">Azerbaijan 🇦🇿</option>' +
			'<option value="BS">Bahamas 🇧🇸</option>' +
			'<option value="BH">Bahrain 🇧🇭</option>' +
			'<option value="BD">Bangladesh 🇧🇩</option>' +
			'<option value="BB">Barbados 🇧🇧</option>' +
			'<option value="BY">Belarus 🇧🇾</option>' +
			'<option value="BE">Belgium 🇧🇪</option>' +
			'<option value="BZ">Belize 🇧🇿</option>' +
			'<option value="BJ">Benin 🇧🇯</option>' +
			'<option value="BM">Bermuda 🇧🇲</option>' +
			'<option value="BT">Bhutan 🇧🇹</option>' +
			'<option value="BO">Bolivia 🇧🇴</option>' +
			'<option value="BA">Bosnia and Herzegovina 🇧🇦</option>' +
			'<option value="BW">Botswana 🇧🇼</option>' +
			'<option value="BV">Bouvet Island 🇧🇻</option>' +
			'<option value="BR">Brazil 🇧🇷</option>' +
			'<option value="IO">British Indian Ocean Territory 🇮🇴</option>' +
			'<option value="BN">Brunei Darussalam 🇧🇳</option>' +
			'<option value="BG">Bulgaria 🇧🇬</option>' +
			'<option value="BF">Burkina Faso 🇧🇫</option>' +
			'<option value="BI">Burundi 🇧🇮</option>' +
			'<option value="KH">Cambodia 🇰🇭</option>' +
			'<option value="CM">Cameroon 🇨🇲</option>' +
			'<option value="CA">Canada 🇨🇦</option>' +
			'<option value="CV">Cape Verde 🇨🇻</option>' +
			'<option value="KY">Cayman Islands 🇰🇾</option>' +
			'<option value="CF">Central African Republic 🇨🇫</option>' +
			'<option value="TD">Chad 🇹🇩</option>' +
			'<option value="CL">Chile 🇨🇱</option>' +
			'<option value="CN">China 🇨🇳</option>' +
			'<option value="CX">Christmas Island 🇨🇽</option>' +
			'<option value="CC">Cocos (Keeling) Islands 🇨🇨</option>' +
			'<option value="CO">Colombia 🇨🇴</option>' +
			'<option value="KM">Comoros 🇰🇲</option>' +
			'<option value="CG">Congo 🇨🇬</option>' +
			'<option value="CD">Congo, Democratic Republic of the 🇨🇩</option>' +
			'<option value="CK">Cook Islands 🇨🇰</option>' +
			'<option value="CR">Costa Rica 🇨🇷</option>' +
			'<option value="CI">Côte dIvoire 🇨🇮</option>' +
			'<option value="HR">Croatia 🇭🇷</option>' +
			'<option value="CU">Cuba 🇨🇺</option>' +
			'<option value="CY">Cyprus 🇨🇾</option>' +
			'<option value="CZ">Czech Republic 🇨🇿</option>' +
			'<option value="DK">Denmark 🇩🇰</option>' +
			'<option value="DJ">Djibouti 🇩🇯</option>' +
			'<option value="DM">Dominica 🇩🇲</option>' +
			'<option value="DO">Dominican Republic 🇩🇴</option>' +
			'<option value="EC">Ecuador 🇪🇨</option>' +
			'<option value="EG">Egypt 🇪🇬</option>' +
			'<option value="SV">El Salvador 🇸🇻</option>' +
			'<option value="GQ">Equatorial Guinea 🇬🇶</option>' +
			'<option value="ER">Eritrea 🇪🇷</option>' +
			'<option value="EE">Estonia 🇪🇪</option>' +
			'<option value="ET">Ethiopia 🇪🇹</option>' +
			'<option value="FK">Falkland Islands (Malvinas) 🇫🇰</option>' +
			'<option value="FO">Faroe Islands 🇫🇴</option>' +
			'<option value="FJ">Fiji 🇫🇯</option>' +
			'<option value="FI">Finland 🇫🇮</option>' +
			'<option value="FR">France 🇫🇷</option>' +
			'<option value="GF">French Guiana 🇬🇫</option>' +
			'<option value="PF">French Polynesia 🇵🇫</option>' +
			'<option value="TF">French Southern Territories 🇹🇫</option>' +
			'<option value="GA">Gabon 🇬🇦</option>' +
			'<option value="GM">Gambia 🇬🇲</option>' +
			'<option value="GE">Georgia 🇬🇪</option>' +
			'<option value="DE">Germany 🇩🇪</option>' +
			'<option value="GH">Ghana 🇬🇭</option>' +
			'<option value="GI">Gibraltar 🇬🇮</option>' +
			'<option value="GR">Greece 🇬🇷</option>' +
			'<option value="GL">Greenland 🇬🇱</option>' +
			'<option value="GD">Grenada 🇬🇩</option>' +
			'<option value="GP">Guadeloupe 🇬🇵</option>' +
			'<option value="GU">Guam 🇬🇺</option>' +
			'<option value="GT">Guatemala 🇬🇹</option>' +
			'<option value="GG">Guernsey 🇬🇬</option>' +
			'<option value="GN">Guinea 🇬🇳</option>' +
			'<option value="GW">Guinea-Bissau 🇬🇼</option>' +
			'<option value="GY">Guyana 🇬🇾</option>' +
			'<option value="HT">Haiti 🇭🇹</option>' +
			'<option value="HM">Heard Island and McDonald Islands 🇭🇲</option>' +
			'<option value="VA">Holy See (Vatican City State) 🇻🇦</option>' +
			'<option value="HN">Honduras 🇭🇳</option>' +
			'<option value="HK">Hong Kong 🇭🇰</option>' +
			'<option value="HU">Hungary 🇭🇺</option>' +
			'<option value="IS">Iceland 🇮🇸</option>' +
			'<option value="IN">India 🇮🇳</option>' +
			'<option value="ID">Indonesia 🇮🇩</option>' +
			'<option value="IR">Iran, Islamic Republic of 🇮🇷</option>' +
			'<option value="IQ">Iraq 🇮🇶</option>' +
			'<option value="IE">Ireland 🇮🇪</option>' +
			'<option value="IM">Isle of Man 🇮🇲</option>' +
			'<option value="IL">Israel 🇮🇱</option>' +
			'<option value="IT">Italy 🇮🇹</option>' +
			'<option value="JM">Jamaica 🇯🇲</option>' +
			'<option value="JP">Japan 🇯🇵</option>' +
			'<option value="JE">Jersey 🇯🇪</option>' +
			'<option value="JO">Jordan 🇯🇴</option>' +
			'<option value="KZ">Kazakhstan 🇰🇿</option>' +
			'<option value="KE">Kenya 🇰🇪</option>' +
			'<option value="KI">Kiribati 🇰🇮</option>' +
			'<option value="KP">Korea, Democratic Peoples Republic of 🇰🇵</option>' +
			'<option value="KR">Korea, Republic of 🇰🇷</option>' +
			'<option value="KW">Kuwait 🇰🇼</option>' +
			'<option value="KG">Kyrgyzstan 🇰🇬</option>' +
			'<option value="LA">Lao Peoples Democratic Republic 🇱🇦</option>' +
			'<option value="LV">Latvia 🇱🇻</option>' +
			'<option value="LB">Lebanon 🇱🇧</option>' +
			'<option value="LS">Lesotho 🇱🇸</option>' +
			'<option value="LR">Liberia 🇱🇷</option>' +
			'<option value="LY">Libya 🇱🇾</option>' +
			'<option value="LI">Liechtenstein 🇱🇮</option>' +
			'<option value="LT">Lithuania 🇱🇹</option>' +
			'<option value="LU">Luxembourg 🇱🇺</option>' +
			'<option value="MO">Macao 🇲🇴</option>' +
			'<option value="MK">Macedonia, the former Yugoslav Republic of 🇲🇰</option>' +
			'<option value="MG">Madagascar 🇲🇬</option>' +
			'<option value="MW">Malawi 🇲🇼</option>' +
			'<option value="MY">Malaysia 🇲🇾</option>' +
			'<option value="MV">Maldives 🇲🇻</option>' +
			'<option value="ML">Mali 🇲🇱</option>' +
			'<option value="MT">Malta 🇲🇹</option>' +
			'<option value="MH">Marshall Islands 🇲🇭</option>' +
			'<option value="MQ">Martinique 🇲🇶</option>' +
			'<option value="MR">Mauritania 🇲🇷</option>' +
			'<option value="MU">Mauritius 🇲🇺</option>' +
			'<option value="YT">Mayotte 🇾🇹</option>' +
			'<option value="MX">Mexico 🇲🇽</option>' +
			'<option value="FM">Micronesia, Federated States of 🇫🇲</option>' +
			'<option value="MD">Moldova, Republic of 🇲🇩</option>' +
			'<option value="MC">Monaco 🇲🇨</option>' +
			'<option value="MN">Mongolia 🇲🇳</option>' +
			'<option value="ME">Montenegro 🇲🇪</option>' +
			'<option value="MS">Montserrat 🇲🇸</option>' +
			'<option value="MA">Morocco 🇲🇦</option>' +
			'<option value="MZ">Mozambique 🇲🇿</option>' +
			'<option value="MM">Myanmar 🇲🇲</option>' +
			'<option value="NA">Namibia 🇳🇦</option>' +
			'<option value="NR">Nauru 🇳🇷</option>' +
			'<option value="NP">Nepal 🇳🇵</option>' +
			'<option value="NL">Netherlands 🇳🇱</option>' +
			'<option value="NC">New Caledonia 🇳🇨</option>' +
			'<option value="NZ">New Zealand 🇳🇿</option>' +
			'<option value="NI">Nicaragua 🇳🇮</option>' +
			'<option value="NE">Niger 🇳🇪</option>' +
			'<option value="NG">Nigeria 🇳🇬</option>' +
			'<option value="NU">Niue 🇳🇺</option>' +
			'<option value="NF">Norfolk Island 🇳🇫</option>' +
			'<option value="MP">Northern Mariana Islands 🇲🇵</option>' +
			'<option value="NO">Norway 🇳🇴</option>' +
			'<option value="OM">Oman 🇴🇲</option>' +
			'<option value="PK">Pakistan 🇵🇰</option>' +
			'<option value="PW">Palau 🇵🇼</option>' +
			'<option value="PS">Palestinian Territory, Occupied 🇵🇸</option>' +
			'<option value="PA">Panama 🇵🇦</option>' +
			'<option value="PG">Papua New Guinea 🇵🇬</option>' +
			'<option value="PY">Paraguay 🇵🇾</option>' +
			'<option value="PE">Peru 🇵🇪</option>' +
			'<option value="PH">Philippines 🇵🇭</option>' +
			'<option value="PN">Pitcairn 🇵🇳</option>' +
			'<option value="PL">Poland 🇵🇱</option>' +
			'<option value="PT">Portugal 🇵🇹</option>' +
			'<option value="PR">Puerto Rico 🇵🇷</option>' +
			'<option value="QA">Qatar 🇶🇦</option>' +
			'<option value="RE">Réunion 🇷🇪</option>' +
			'<option value="RO">Romania 🇷🇴</option>' +
			'<option value="RU">Russian Federation 🇷🇺</option>' +
			'<option value="RW">Rwanda 🇷🇼</option>' +
			'<option value="BL">Saint Barthélemy 🇧🇱</option>' +
			'<option value="SH">Saint Helena, Ascension and Tristan da Cunha 🇸🇭</option>' +
			'<option value="KN">Saint Kitts and Nevis 🇰🇳</option>' +
			'<option value="LC">Saint Lucia 🇱🇨</option>' +
			'<option value="MF">Saint Martin (French part) 🇲🇫</option>' +
			'<option value="PM">Saint Pierre and Miquelon 🇵🇲</option>' +
			'<option value="VC">Saint Vincent and the Grenadines 🇻🇨</option>' +
			'<option value="WS">Samoa 🇼🇸</option>' +
			'<option value="SM">San Marino 🇸🇲</option>' +
			'<option value="ST">Sao Tome and Principe 🇸🇹</option>' +
			'<option value="SA">Saudi Arabia 🇸🇦</option>' +
			'<option value="SN">Senegal 🇸🇳</option>' +
			'<option value="RS">Serbia 🇷🇸</option>' +
			'<option value="SC">Seychelles 🇸🇨</option>' +
			'<option value="SL">Sierra Leone 🇸🇱</option>' +
			'<option value="SG">Singapore 🇸🇬</option>' +
			'<option value="SX">Sint Maarten (Dutch part) 🇸🇽</option>' +
			'<option value="SK">Slovakia 🇸🇰</option>' +
			'<option value="SI">Slovenia 🇸🇮</option>' +
			'<option value="SB">Solomon Islands 🇸🇧</option>' +
			'<option value="SO">Somalia 🇸🇴</option>' +
			'<option value="ZA">South Africa 🇿🇦</option>' +
			'<option value="GS">South Georgia and the South Sandwich Islands 🇬🇸</option>' +
			'<option value="SS">South Sudan 🇸🇸</option>' +
			'<option value="ES">Spain 🇪🇸</option>' +
			'<option value="LK">Sri Lanka 🇱🇰</option>' +
			'<option value="SD">Sudan 🇸🇩</option>' +
			'<option value="SR">Suriname 🇸🇷</option>' +
			'<option value="SJ">Svalbard and Jan Mayen 🇸🇯</option>' +
			'<option value="SZ">Swaziland 🇸🇿</option>' +
			'<option value="SE">Sweden 🇸🇪</option>' +
			'<option value="CH">Switzerland 🇨🇭</option>' +
			'<option value="SY">Syrian Arab Republic 🇸🇾</option>' +
			'<option value="TW">Taiwan, Province of China 🇹🇼</option>' +
			'<option value="TJ">Tajikistan 🇹🇯</option>' +
			'<option value="TZ">Tanzania, United Republic of 🇹🇿</option>' +
			'<option value="TH">Thailand 🇹🇭</option>' +
			'<option value="TL">Timor-Leste 🇹🇱</option>' +
			'<option value="TG">Togo 🇹🇬</option>' +
			'<option value="TK">Tokelau 🇹🇰</option>' +
			'<option value="TO">Tonga 🇹🇴</option>' +
			'<option value="TT">Trinidad and Tobago 🇹🇹</option>' +
			'<option value="TN">Tunisia 🇹🇳</option>' +
			'<option value="TR">Turkey 🇹🇷</option>' +
			'<option value="TM">Turkmenistan 🇹🇲</option>' +
			'<option value="TC">Turks and Caicos Islands 🇹🇨</option>' +
			'<option value="TV">Tuvalu 🇹🇻</option>' +
			'<option value="UG">Uganda 🇺🇬</option>' +
			'<option value="UA">Ukraine 🇺🇦</option>' +
			'<option value="AE">United Arab Emirates 🇦🇪</option>' +
			'<option value="GB">United Kingdom 🇬🇧</option>' +
			'<option value="US">United States 🇺🇸</option>' +
			'<option value="UM">United States Minor Outlying Islands 🇺🇲</option>' +
			'<option value="UY">Uruguay 🇺🇾</option>' +
			'<option value="UZ">Uzbekistan 🇺🇿</option>' +
			'<option value="VU">Vanuatu 🇻🇺</option>' +
			'<option value="VE">Venezuela, Bolivarian Republic of 🇻🇪</option>' +
			'<option value="VN">Viet Nam 🇻🇳</option>' +
			'<option value="VG">Virgin Islands, British 🇻🇬</option>' +
			'<option value="VI">Virgin Islands, U.S. 🇻🇮</option>' +
			'<option value="WF">Wallis and Futuna 🇼🇫</option>' +
			'<option value="EH">Western Sahara 🇪🇭</option>' +
			'<option value="YE">Yemen 🇾🇪</option>' +
			'<option value="ZM">Zambia 🇿🇲</option>' +
			'<option value="ZW">Zimbabwe 🇿🇼</option>' +
			'</select><hr>';

		$('#countryInput').append(newRowAdd);
		newLiveLink =
			'<input type="text" class="form-control" id="inputZip" name="liveLink[]"> <hr>';
		$('#liveLinkInput').append(newLiveLink);
	});
</script>
<script>
	$('#rowRemover').click(function () {
		$('#countryInput').empty();
		$('#liveLinkInput').empty();
	});
</script>
<script>
	//For Verify Unique Project ID While Creating Project
	$(document).ready(function () {
		$('#projectID').on('blur', function () {
			var textValue = $(this).val();
			$.ajax({
				url: 'Controller/api/verifyProjectID.php',
				type: 'POST',
				data: { projectID: textValue },
				success: function (response) {
					if (response == 'projectIdAvailable') {
						$('#projectID').val('');
						document.getElementById('ProjectIDError').textContent = 'Project Id Already Available';
						$('#projectID').focus();
					} else {
						document.getElementById('ProjectIDError').textContent = '';
						document.getElementById('ProjectIDError').textContent = '✔️';
					}
				},
				error: function (jqXHR, textStatus, errorThrown) {
					// Handle the error
					console.error(textStatus, errorThrown);
				}
			});
		});
	});
</script>
<script>
	//For Update The Project Status
	function updateStatus(status) {
		const projectIDStatus = status;
		const StatusParts = projectIDStatus.split("^");
		const projectID = StatusParts[0];
		const projectStatus = StatusParts[1];
		$.ajax({
			url: 'Controller/api/updateProjectStatus.php',
			type: 'POST',
			data: {
				projectID: projectID,
				status: projectStatus
			},
			success: function (response) {
				if (response == 'updated') {
					let timerInterval;
					Swal.fire({
						title: "Updating Project Status",
						html: "Please wait",
						timer: 1500,
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
								title: "Project Status Updated",
								showConfirmButton: false,
								timer: 2000
							});
							console.log("I was closed by the timer");
							setTimeout(function () {
								window.location.reload();
							}, 2000);
						}
					});
				} else {
					Swal.fire({
						position: "center",
						icon: "error",
						title: "Something Went Wrong",
						showConfirmButton: false,
						timer: 2000
					});
				}
			},
			error: function (jqXHR, textStatus, errorThrown) {
				// Handle the error
				console.error(textStatus, errorThrown);
			}
		});
	}
</script>

</body>

</html>