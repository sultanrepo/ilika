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
			'<option value="AO">Angola 🇦🇴</option>' +
			'<option value="AL">Albania 🇦🇱</option>' +
			'<option value="AD">Andorra 🇦🇩</option>' +
			'<option value="AE">United Arab Emirates 🇦🇪</option>' +
			'<option value="AR">Argentina 🇦🇷</option>' +
			'<option value="AM">Armenia 🇦🇲</option>' +
			'<option value="AG">Antigua and Barbuda 🇦🇬</option>' +
			'<option value="AU">Australia 🇦🇺</option>' +
			'<option value="AT">Austria 🇦🇹</option>' +
			'<option value="AZ">Azerbaijan 🇦🇿</option>' +
			'<option value="BI">Burundi 🇧🇮</option>' +
			'<option value="BE">Belgium 🇧🇪</option>' +
			'<option value="BJ">Benin 🇧🇯</option>' +
			'<option value="BF">Burkina Faso 🇧🇫</option>' +
			'<option value="BD">Bangladesh 🇧🇩</option>' +
			'<option value="BG">Bulgaria 🇧🇬</option>' +
			'<option value="BH">Bahrain 🇧🇭</option>' +
			'<option value="BS">Bahamas 🇧🇸</option>' +
			'<option value="BA">Bosnia and Herzegovina 🇧🇦</option>' +
			'<option value="BY">Belarus 🇧🇾</option>' +
			'<option value="BZ">Belize 🇧🇿</option>' +
			'<option value="BO">Bolivia 🇧🇴</option>' +
			'<option value="BR">Brazil 🇧🇷</option>' +
			'<option value="BB">Barbados 🇧🇧</option>' +
			'<option value="BN">Brunei 🇧🇳</option>' +
			'<option value="BT">Bhutan 🇧🇹</option>' +
			'<option value="BW">Botswana 🇧🇼</option>' +
			'<option value="CF">Central African Republic 🇨🇫</option>' +
			'<option value="CA">Canada 🇨🇦</option>' +
			'<option value="CH">Switzerland 🇨🇭</option>' +
			'<option value="CL">Chile 🇨🇱</option>' +
			'<option value="CN">China 🇨🇳</option>' +
			'<option value="CI">Ivory Coast 🇨🇮</option>' +
			'<option value="CM">Cameroon 🇨🇲</option>' +
			'<option value="CD">DR Congo 🇨🇩</option>' +
			'<option value="CG">Republic of the Congo 🇨🇬</option>' +
			'<option value="CO">Colombia 🇨🇴</option>' +
			'<option value="KM">Comoros 🇰🇲</option>' +
			'<option value="CV">Cape Verde 🇨🇻</option>' +
			'<option value="CR">Costa Rica 🇨🇷</option>' +
			'<option value="CU">Cuba 🇨🇺</option>' +
			'<option value="CY">Cyprus 🇨🇾</option>' +
			'<option value="CZ">Czechia 🇨🇿</option>' +
			'<option value="DE">Germany 🇩🇪</option>' +
			'<option value="DJ">Djibouti 🇩🇯</option>' +
			'<option value="DM">Dominica 🇩🇲</option>' +
			'<option value="DK">Denmark 🇩🇰</option>' +
			'<option value="DO">Dominican Republic 🇩🇴</option>' +
			'<option value="DZ">Algeria 🇩🇿</option>' +
			'<option value="EC">Ecuador 🇪🇨</option>' +
			'<option value="EG">Egypt 🇪🇬</option>' +
			'<option value="ER">Eritrea 🇪🇷</option>' +
			'<option value="ES">Spain 🇪🇸</option>' +
			'<option value="EE">Estonia 🇪🇪</option>' +
			'<option value="ET">Ethiopia 🇪🇹</option>' +
			'<option value="FI">Finland 🇫🇮</option>' +
			'<option value="FJ">Fiji 🇫🇯</option>' +
			'<option value="FR">France 🇫🇷</option>' +
			'<option value="FM">Micronesia 🇫🇲</option>' +
			'<option value="GA">Gabon 🇬🇦</option>' +
			'<option value="GB">United Kingdom 🇬🇧</option>' +
			'<option value="GE">Georgia 🇬🇪</option>' +
			'<option value="GH">Ghana 🇬🇭</option>' +
			'<option value="GN">Guinea 🇬🇳</option>' +
			'<option value="GM">Gambia 🇬🇲</option>' +
			'<option value="GW">Guinea-Bissau 🇬🇼</option>' +
			'<option value="GQ">Equatorial Guinea 🇬🇶</option>' +
			'<option value="GR">Greece 🇬🇷</option>' +
			'<option value="GD">Grenada 🇬🇩</option>' +
			'<option value="GT">Guatemala 🇬🇹</option>' +
			'<option value="GY">Guyana 🇬🇾</option>' +
			'<option value="HN">Honduras 🇭🇳</option>' +
			'<option value="HR">Croatia 🇭🇷</option>' +
			'<option value="HT">Haiti 🇭🇹</option>' +
			'<option value="HU">Hungary 🇭🇺</option>' +
			'<option value="ID">Indonesia 🇮🇩</option>' +
			'<option value="IN">India 🇮🇳</option>' +
			'<option value="IE">Ireland 🇮🇪</option>' +
			'<option value="IR">Iran 🇮🇷</option>' +
			'<option value="IQ">Iraq 🇮🇶</option>' +
			'<option value="IS">Iceland 🇮🇸</option>' +
			'<option value="IL">Israel 🇮🇱</option>' +
			'<option value="IT">Italy 🇮🇹</option>' +
			'<option value="JM">Jamaica 🇯🇲</option>' +
			'<option value="JO">Jordan 🇯🇴</option>' +
			'<option value="JP">Japan 🇯🇵</option>' +
			'<option value="KZ">Kazakhstan 🇰🇿</option>' +
			'<option value="KE">Kenya 🇰🇪</option>' +
			'<option value="KG">Kyrgyzstan 🇰🇬</option>' +
			'<option value="KH">Cambodia 🇰🇭</option>' +
			'<option value="KI">Kiribati 🇰🇮</option>' +
			'<option value="KN">Saint Kitts and Nevis 🇰🇳</option>' +
			'<option value="KR">South Korea 🇰🇷</option>' +
			'<option value="KW">Kuwait 🇰🇼</option>' +
			'<option value="LA">Laos 🇱🇦</option>' +
			'<option value="LB">Lebanon 🇱🇧</option>' +
			'<option value="LR">Liberia 🇱🇷</option>' +
			'<option value="LY">Libya 🇱🇾</option>' +
			'<option value="LC">Saint Lucia 🇱🇨</option>' +
			'<option value="LI">Liechtenstein 🇱🇮</option>' +
			'<option value="LK">Sri Lanka 🇱🇰</option>' +
			'<option value="LS">Lesotho 🇱🇸</option>' +
			'<option value="LT">Lithuania 🇱🇹</option>' +
			'<option value="LU">Luxembourg 🇱🇺</option>' +
			'<option value="LV">Latvia 🇱🇻</option>' +
			'<option value="MA">Morocco 🇲🇦</option>' +
			'<option value="MC">Monaco 🇲🇨</option>' +
			'<option value="MD">Moldova 🇲🇩</option>' +
			'<option value="MG">Madagascar 🇲🇬</option>' +
			'<option value="MV">Maldives 🇲🇻</option>' +
			'<option value="MX">Mexico 🇲🇽</option>' +
			'<option value="MH">Marshall Islands 🇲🇭</option>' +
			'<option value="MK">Macedonia 🇲🇰</option>' +
			'<option value="ML">Mali 🇲🇱</option>' +
			'<option value="MT">Malta 🇲🇹</option>' +
			'<option value="MM">Myanmar 🇲🇲</option>' +
			'<option value="ME">Montenegro 🇲🇪</option>' +
			'<option value="MN">Mongolia 🇲🇳</option>' +
			'<option value="MZ">Mozambique 🇲🇿</option>' +
			'<option value="MR">Mauritania 🇲🇷</option>' +
			'<option value="MU">Mauritius 🇲🇺</option>' +
			'<option value="MW">Malawi 🇲🇼</option>' +
			'<option value="MY">Malaysia 🇲🇾</option>' +
			'<option value="NA">Namibia 🇳🇦</option>' +
			'<option value="NE">Niger 🇳🇪</option>' +
			'<option value="NG">Nigeria 🇳🇬</option>' +
			'<option value="NI">Nicaragua 🇳🇮</option>' +
			'<option value="NL">Netherlands 🇳🇱</option>' +
			'<option value="NO">Norway 🇳🇴</option>' +
			'<option value="NP">Nepal 🇳🇵</option>' +
			'<option value="NR">Nauru 🇳🇷</option>' +
			'<option value="NZ">New Zealand 🇳🇿</option>' +
			'<option value="OM">Oman 🇴🇲</option>' +
			'<option value="PK">Pakistan 🇵🇰</option>' +
			'<option value="PA">Panama 🇵🇦</option>' +
			'<option value="PE">Peru 🇵🇪</option>' +
			'<option value="PH">Philippines 🇵🇭</option>' +
			'<option value="PW">Palau 🇵🇼</option>' +
			'<option value="PG">Papua New Guinea 🇵🇬</option>' +
			'<option value="PL">Poland 🇵🇱</option>' +
			'<option value="KP">North Korea 🇰🇵</option>' +
			'<option value="PT">Portugal 🇵🇹</option>' +
			'<option value="PY">Paraguay 🇵🇾</option>' +
			'<option value="QA">Qatar 🇶🇦</option>' +
			'<option value="RO">Romania 🇷🇴</option>' +
			'<option value="RU">Russia 🇷🇺</option>' +
			'<option value="RW">Rwanda 🇷🇼</option>' +
			'<option value="SA">Saudi Arabia 🇸🇦</option>' +
			'<option value="SD">Sudan 🇸🇩</option>' +
			'<option value="SN">Senegal 🇸🇳</option>' +
			'<option value="SG">Singapore 🇸🇬</option>' +
			'<option value="SB">Solomon Islands 🇸🇧</option>' +
			'<option value="SL">Sierra Leone 🇸🇱</option>' +
			'<option value="SV">El Salvador 🇸🇻</option>' +
			'<option value="SM">San Marino 🇸🇲</option>' +
			'<option value="SO">Somalia 🇸🇴</option>' +
			'<option value="RS">Serbia 🇷🇸</option>' +
			'<option value="SS">South Sudan 🇸🇸</option>' +
			'<option value="ST">São Tomé and Príncipe 🇸🇹</option>' +
			'<option value="SR">Suriname 🇸🇷</option>' +
			'<option value="SK">Slovakia 🇸🇰</option>' +
			'<option value="SI">Slovenia 🇸🇮</option>' +
			'<option value="SE">Sweden 🇸🇪</option>' +
			'<option value="SZ">Swaziland 🇸🇿</option>' +
			'<option value="SC">Seychelles 🇸🇨</option>' +
			'<option value="SY">Syria 🇸🇾</option>' +
			'<option value="TD">Chad 🇹🇩</option>' +
			'<option value="TG">Togo 🇹🇬</option>' +
			'<option value="TH">Thailand 🇹🇭</option>' +
			'<option value="TJ">Tajikistan 🇹🇯</option>' +
			'<option value="TM">Turkmenistan 🇹🇲</option>' +
			'<option value="TL">Timor-Leste 🇹🇱</option>' +
			'<option value="TO">Tonga 🇹🇴</option>' +
			'<option value="TT">Trinidad and Tobago 🇹🇹</option>' +
			'<option value="TN">Tunisia 🇹🇳</option>' +
			'<option value="TR">Turkey 🇹🇷</option>' +
			'<option value="TV">Tuvalu 🇹🇻</option>' +
			'<option value="TZ">Tanzania 🇹🇿</option>' +
			'<option value="UG">Uganda 🇺🇬</option>' +
			'<option value="UA">Ukraine 🇺🇦</option>' +
			'<option value="UY">Uruguay 🇺🇾</option>' +
			'<option value="US">United States 🇺🇸</option>' +
			'<option value="UZ">Uzbekistan 🇺🇿</option>' +
			'<option value="VA">Vatican City 🇻🇦</option>' +
			'<option value="VC">Saint Vincent and the Grenadines 🇻🇨</option>' +
			'<option value="VE">Venezuela 🇻🇪</option>' +
			'<option value="VN">Vietnam 🇻🇳</option>' +
			'<option value="VU">Vanuatu 🇻🇺</option>' +
			'<option value="WS">Samoa 🇼🇸</option>' +
			'<option value="YE">Yemen 🇾🇪</option>' +
			'<option value="ZA">South Africa 🇿🇦</option>' +
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
	// const form = document.getElementById('createProjectForm');
	// form.addEventListener('submit', validateForm);
	// function validateForm(event) {
	// 	event.preventDefault();

	// 	// // Clear all error messages
	// 	// document.querySelectorAll('.error').forEach(error => error.textContent = '');

	// 	// // Validate Clients
	// 	// if (document.getElementById('Clients').value.trim() === 'na') {
	// 	// 	document.getElementById('ClientsError').textContent = 'Please Select a value';
	// 	// }

	// 	// // Validate ProjectID
	// 	// if (document.getElementById('projectID').value.trim() === '') {
	// 	// 	document.getElementById('ProjectIDError').textContent = 'Please enter a value';
	// 	// }

	// 	// // Validate ProjectName
	// 	// if (document.getElementById('projectName').value.trim() === '') {
	// 	// 	document.getElementById('ProjectNameError').textContent = 'Please enter a value';
	// 	// }

	// 	// // Validate Description
	// 	// if (document.getElementById('proDesc').value.trim() === '') {
	// 	// 	document.getElementById('DescriptionError').textContent = 'Please enter a value';
	// 	// }

	// 	// // Validate CostPerComplete
	// 	// if (isNaN(document.getElementById('cpi').value) || document.getElementById('cpi').value.trim() === '') {
	// 	// 	document.getElementById('CostPerCompleteError').textContent = 'Please enter a valid number';
	// 	// }

	// 	// // Validate MaximumCompletes
	// 	// if (isNaN(document.getElementById('maxLimit').value) || document.getElementById('maxLimit').value.trim() === '') {
	// 	// 	document.getElementById('MaximumCompletesError').value.textContent = 'Please enter a valid number';
	// 	// }

	// 	// // Validate Live Link Country
	// 	// if (document.getElementById('inputState').value.trim() === 'NA') {
	// 	// 	document.getElementById('liveCountry').textContent = 'Please Select a value';
	// 	// }

	// 	// // Validate Live Link
	// 	// if (document.getElementById('inputZip').value.trim() === '') {
	// 	// 	document.getElementById('LiveLinkError').textContent = 'Please enter a value';
	// 	// }

	// 	// // Validate Test Link Country
	// 	// if (document.getElementById('testCountry').value.trim() === 'NA') {
	// 	// 	document.getElementById('testCountryError').textContent = 'Please Select a value';
	// 	// }

	// 	// // Validate Test Link
	// 	// if (document.getElementById('testLink').value.trim() === '') {
	// 	// 	document.getElementById('TestLinkError').textContent = 'Please enter a value';
	// 	// }

	// 	// // Validate Cid replacer
	// 	// if (document.getElementById('cidRep').value.trim() === '') {
	// 	// 	document.getElementById('CidreplacerError').textContent = 'Please enter a value';
	// 	// }
	// }
</script>
</body>

</html>