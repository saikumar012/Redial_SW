<?php 
include("../include/session.php");
	global $database;
if(!$session->logged_in){
		header("Location:../index.php");
}else{
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to Redial</title>
<link rel="stylesheet" type="text/css" href="../css/style.css" />

<link rel="stylesheet" href="../css/chosen2.css" />
<script src="../js/jquery-1.8.0.min.js"></script>

<script type="text/javascript" src="../js/jquery1.4.js"></script>
<script type="text/javascript">
/* accessible */
	$(document).ready(function() {
		$('.faqs h3').each(function() {
			var tis = $(this), state = false, answer = tis.next('div').slideUp();
			tis.click(function() {
				state = !state;
				answer.slideToggle(state);
				tis.toggleClass('active',state);
			});
		});
	});
</script>

</head>

<body>
<div id="warp">

<div class="logo"><a href="../index_properties.php"><img src="../images/logo.png" alt="Redail Logo" /></a></div>

<span style="float:right; font-size:11px; padding-top:3px;">&nbsp;&nbsp;&nbsp; <?php echo $_SESSION['username'] ?> &nbsp;&nbsp;|&nbsp;&nbsp; <a href="../process.php">Logout</a></span>
<div class="top_menu">
<a href="../messagehistory.php">S & S History</a>|
<a href="../appointments.php">Appointments</a>|
<a href="agents_new.php" class="active">Bulk</a>|
<a href="../buyers.php">Buyers</a>|
<a href="../complaintbox.php">Complaints</a>|
<a href="../domods.php">Do-Mod's</a>|
<a href="../msms.php">M-SMS</a>
</div>

<div class="r_menu2">
<a href="properties2.php" class="active">Properties</a>
<a href="projects2.php"> Projects</a>
</div>

<div style="width:100%; float:left;">

<div class="main_hed">Bulk > Builders > Properties > <span>Agriculture</span> <div class="inner_menu"><a href="properties2.php">Residential</a>|<a href="properties_comm.php">Commercial</a>|<a href="agriculture2.php" class="active">Agriculture</a></div></div>

<div id="form" style="width:750px;" class="faqs">
<ol>

<p><li><label>I Want to <span class="star">*</span></label><input type="radio" name="Want" /> Sell <input type="radio" name="Want" />Rent</li></p>
<p><li><label>Property Type <span class="star">*</span></label>

<select data-placeholder="Select Your Type" class="chzn-select" style="width:315px;" tabindex="4">
          <option value=""></option> 
<option value="">Independent House</option>
<option value="">Flat</option>
<option value="">Duplex</option>
<option value="">House</option>
<option value="">Villa</option>
<option value="">Farm House</option>
        </select>


</li></p>


<p><li><label>Area</label><input type="text" class="input" style="margin-top:-15px;" />

<select data-placeholder="Select" class="chzn-select" style="width:100px;">
          <option value=""></option> 
          <option value="">Sft</option> 
          <option value="2">Sq. yards</option>
          <option value="">Acres</option> 
          <option value="">Call for area</option>
       
          
        </select>
</li></p>

<p><li><label>Price</label><input type="text" class="input" style="margin-top:-15px;" />

<select data-placeholder="Select" class="chzn-select" style="width:100px;">
          <option value=""></option> 
          <option value="">Rs</option> 
          <option value="2">Lakh(s)</option>
          <option value="">Cr(s)</option>
          <option value="">Call for price</option>
       
          
        </select>
</li></p>

<div class="special_cond" style="float:right; width:260px; margin-right:15px;">
<h4>Special Conditions</h4>
<p><li><input type="checkbox" name="" /> AUCTION </li></p>

<!--<p><li><input type="checkbox" name="" /> GATED COMMUNITY</li></p>

<p><li><input type="checkbox" name="" /> RENTAL PURPOSE</li></p>

<p><li><label style="width:150px;">TRANSACTION TYPE</label><br /><br /><input type="radio" name="TRANSACTIONTYPE" />New Property  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="TRANSACTIONTYPE" />Resale</li></p>
<p><li><label style="width:150px;">POSSESION STATUS</label><br /><br /><input type="radio" name="POSSESION" />Under Construction  <input type="radio" name="POSSESION" />Ready to Occupy</li></p>
-->
</div>

<p><li><label>City <span class="star">*</span></label>

<select data-placeholder="Select City" class="chzn-select" tabindex="2" style="width:315px;">
          <option value=""></option> 
          <option value="United States">United States</option> 
          <option value="United Kingdom">United Kingdom</option> 
          <option value="Afghanistan">Afghanistan</option> 
          <option value="Albania">Albania</option> 
          <option value="Algeria">Algeria</option> 
          <option value="American Samoa">American Samoa</option> 
          <option value="Andorra">Andorra</option> 
          <option value="Angola">Angola</option> 
          <option value="Anguilla">Anguilla</option> 
          <option value="Antarctica">Antarctica</option> 
          <option value="Antigua and Barbuda">Antigua and Barbuda</option> 
          <option value="Argentina">Argentina</option> 
          <option value="Armenia">Armenia</option> 
          <option value="Aruba">Aruba</option> 
          <option value="Australia">Australia</option> 
          <option value="Austria">Austria</option> 
          <option value="Azerbaijan">Azerbaijan</option> 
          <option value="Bahamas">Bahamas</option> 
          <option value="Bahrain">Bahrain</option> 
          <option value="Bangladesh">Bangladesh</option> 
          <option value="Barbados">Barbados</option> 
          <option value="Belarus">Belarus</option> 
          <option value="Belgium">Belgium</option> 
          <option value="Belize">Belize</option> 
          <option value="Benin">Benin</option> 
          <option value="Bermuda">Bermuda</option> 
          <option value="Bhutan">Bhutan</option> 
          <option value="Bolivia">Bolivia</option> 
          <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option> 
          <option value="Botswana">Botswana</option> 
          <option value="Bouvet Island">Bouvet Island</option> 
          <option value="Brazil">Brazil</option> 
          <option value="British Indian Ocean Territory">British Indian Ocean Territory</option> 
          <option value="Brunei Darussalam">Brunei Darussalam</option> 
          <option value="Bulgaria">Bulgaria</option> 
          <option value="Burkina Faso">Burkina Faso</option> 
          <option value="Burundi">Burundi</option> 
          <option value="Cambodia">Cambodia</option> 
          <option value="Cameroon">Cameroon</option> 
          <option value="Canada">Canada</option> 
          <option value="Cape Verde">Cape Verde</option> 
          <option value="Cayman Islands">Cayman Islands</option> 
          <option value="Central African Republic">Central African Republic</option> 
          <option value="Chad">Chad</option> 
          <option value="Chile">Chile</option> 
          <option value="China">China</option> 
          <option value="Christmas Island">Christmas Island</option> 
          <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option> 
          <option value="Colombia">Colombia</option> 
          <option value="Comoros">Comoros</option> 
          <option value="Congo">Congo</option> 
          <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option> 
          <option value="Cook Islands">Cook Islands</option> 
          <option value="Costa Rica">Costa Rica</option> 
          <option value="Cote D'ivoire">Cote D'ivoire</option> 
          <option value="Croatia">Croatia</option> 
          <option value="Cuba">Cuba</option> 
          <option value="Cyprus">Cyprus</option> 
          <option value="Czech Republic">Czech Republic</option> 
          <option value="Denmark">Denmark</option> 
          <option value="Djibouti">Djibouti</option> 
          <option value="Dominica">Dominica</option> 
          <option value="Dominican Republic">Dominican Republic</option> 
          <option value="Ecuador">Ecuador</option> 
          <option value="Egypt">Egypt</option> 
          <option value="El Salvador">El Salvador</option> 
          <option value="Equatorial Guinea">Equatorial Guinea</option> 
          <option value="Eritrea">Eritrea</option> 
          <option value="Estonia">Estonia</option> 
          <option value="Ethiopia">Ethiopia</option> 
          <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option> 
          <option value="Faroe Islands">Faroe Islands</option> 
          <option value="Fiji">Fiji</option> 
          <option value="Finland">Finland</option> 
          <option value="France">France</option> 
          <option value="French Guiana">French Guiana</option> 
          <option value="French Polynesia">French Polynesia</option> 
          <option value="French Southern Territories">French Southern Territories</option> 
          <option value="Gabon">Gabon</option> 
          <option value="Gambia">Gambia</option> 
          <option value="Georgia">Georgia</option> 
          <option value="Germany">Germany</option> 
          <option value="Ghana">Ghana</option> 
          <option value="Gibraltar">Gibraltar</option> 
          <option value="Greece">Greece</option> 
          <option value="Greenland">Greenland</option> 
          <option value="Grenada">Grenada</option> 
          <option value="Guadeloupe">Guadeloupe</option> 
          <option value="Guam">Guam</option> 
          <option value="Guatemala">Guatemala</option> 
          <option value="Guinea">Guinea</option> 
          <option value="Guinea-bissau">Guinea-bissau</option> 
          <option value="Guyana">Guyana</option> 
          <option value="Haiti">Haiti</option> 
          <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option> 
          <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option> 
          <option value="Honduras">Honduras</option> 
          <option value="Hong Kong">Hong Kong</option> 
          <option value="Hungary">Hungary</option> 
          <option value="Iceland">Iceland</option> 
          <option value="India">India</option> 
          <option value="Indonesia">Indonesia</option> 
          <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option> 
          <option value="Iraq">Iraq</option> 
          <option value="Ireland">Ireland</option> 
          <option value="Israel">Israel</option> 
          <option value="Italy">Italy</option> 
          <option value="Jamaica">Jamaica</option> 
          <option value="Japan">Japan</option> 
          <option value="Jordan">Jordan</option> 
          <option value="Kazakhstan">Kazakhstan</option> 
          <option value="Kenya">Kenya</option> 
          <option value="Kiribati">Kiribati</option> 
          <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option> 
          <option value="Korea, Republic of">Korea, Republic of</option> 
          <option value="Kuwait">Kuwait</option> 
          <option value="Kyrgyzstan">Kyrgyzstan</option> 
          <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option> 
          <option value="Latvia">Latvia</option> 
          <option value="Lebanon">Lebanon</option> 
          <option value="Lesotho">Lesotho</option> 
          <option value="Liberia">Liberia</option> 
          <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option> 
          <option value="Liechtenstein">Liechtenstein</option> 
          <option value="Lithuania">Lithuania</option> 
          <option value="Luxembourg">Luxembourg</option> 
          <option value="Macao">Macao</option> 
          <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option> 
          <option value="Madagascar">Madagascar</option> 
          <option value="Malawi">Malawi</option> 
          <option value="Malaysia">Malaysia</option> 
          <option value="Maldives">Maldives</option> 
          <option value="Mali">Mali</option> 
          <option value="Malta">Malta</option> 
          <option value="Marshall Islands">Marshall Islands</option> 
          <option value="Martinique">Martinique</option> 
          <option value="Mauritania">Mauritania</option> 
          <option value="Mauritius">Mauritius</option> 
          <option value="Mayotte">Mayotte</option> 
          <option value="Mexico">Mexico</option> 
          <option value="Micronesia, Federated States of">Micronesia, Federated States of</option> 
          <option value="Moldova, Republic of">Moldova, Republic of</option> 
          <option value="Monaco">Monaco</option> 
          <option value="Mongolia">Mongolia</option> 
          <option value="Montenegro">Montenegro</option>
          <option value="Montserrat">Montserrat</option> 
          <option value="Morocco">Morocco</option> 
          <option value="Mozambique">Mozambique</option> 
          <option value="Myanmar">Myanmar</option> 
          <option value="Namibia">Namibia</option> 
          <option value="Nauru">Nauru</option> 
          <option value="Nepal">Nepal</option> 
          <option value="Netherlands">Netherlands</option> 
          <option value="Netherlands Antilles">Netherlands Antilles</option> 
          <option value="New Caledonia">New Caledonia</option> 
          <option value="New Zealand">New Zealand</option> 
          <option value="Nicaragua">Nicaragua</option> 
          <option value="Niger">Niger</option> 
          <option value="Nigeria">Nigeria</option> 
          <option value="Niue">Niue</option> 
          <option value="Norfolk Island">Norfolk Island</option> 
          <option value="Northern Mariana Islands">Northern Mariana Islands</option> 
          <option value="Norway">Norway</option> 
          <option value="Oman">Oman</option> 
          <option value="Pakistan">Pakistan</option> 
          <option value="Palau">Palau</option> 
          <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option> 
          <option value="Panama">Panama</option> 
          <option value="Papua New Guinea">Papua New Guinea</option> 
          <option value="Paraguay">Paraguay</option> 
          <option value="Peru">Peru</option> 
          <option value="Philippines">Philippines</option> 
          <option value="Pitcairn">Pitcairn</option> 
          <option value="Poland">Poland</option> 
          <option value="Portugal">Portugal</option> 
          <option value="Puerto Rico">Puerto Rico</option> 
          <option value="Qatar">Qatar</option> 
          <option value="Reunion">Reunion</option> 
          <option value="Romania">Romania</option> 
          <option value="Russian Federation">Russian Federation</option> 
          <option value="Rwanda">Rwanda</option> 
          <option value="Saint Helena">Saint Helena</option> 
          <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option> 
          <option value="Saint Lucia">Saint Lucia</option> 
          <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option> 
          <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option> 
          <option value="Samoa">Samoa</option> 
          <option value="San Marino">San Marino</option> 
          <option value="Sao Tome and Principe">Sao Tome and Principe</option> 
          <option value="Saudi Arabia">Saudi Arabia</option> 
          <option value="Senegal">Senegal</option> 
          <option value="Serbia">Serbia</option> 
          <option value="Seychelles">Seychelles</option> 
          <option value="Sierra Leone">Sierra Leone</option> 
          <option value="Singapore">Singapore</option> 
          <option value="Slovakia">Slovakia</option> 
          <option value="Slovenia">Slovenia</option> 
          <option value="Solomon Islands">Solomon Islands</option> 
          <option value="Somalia">Somalia</option> 
          <option value="South Africa">South Africa</option> 
          <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option> 
          <option value="South Sudan">South Sudan</option> 
          <option value="Spain">Spain</option> 
          <option value="Sri Lanka">Sri Lanka</option> 
          <option value="Sudan">Sudan</option> 
          <option value="Suriname">Suriname</option> 
          <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option> 
          <option value="Swaziland">Swaziland</option> 
          <option value="Sweden">Sweden</option> 
          <option value="Switzerland">Switzerland</option> 
          <option value="Syrian Arab Republic">Syrian Arab Republic</option> 
          <option value="Taiwan, Republic of China">Taiwan, Republic of China</option> 
          <option value="Tajikistan">Tajikistan</option> 
          <option value="Tanzania, United Republic of">Tanzania, United Republic of</option> 
          <option value="Thailand">Thailand</option> 
          <option value="Timor-leste">Timor-leste</option> 
          <option value="Togo">Togo</option> 
          <option value="Tokelau">Tokelau</option> 
          <option value="Tonga">Tonga</option> 
          <option value="Trinidad and Tobago">Trinidad and Tobago</option> 
          <option value="Tunisia">Tunisia</option> 
          <option value="Turkey">Turkey</option> 
          <option value="Turkmenistan">Turkmenistan</option> 
          <option value="Turks and Caicos Islands">Turks and Caicos Islands</option> 
          <option value="Tuvalu">Tuvalu</option> 
          <option value="Uganda">Uganda</option> 
          <option value="Ukraine">Ukraine</option> 
          <option value="United Arab Emirates">United Arab Emirates</option> 
          <option value="United Kingdom">United Kingdom</option> 
          <option value="United States">United States</option> 
          <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option> 
          <option value="Uruguay">Uruguay</option> 
          <option value="Uzbekistan">Uzbekistan</option> 
          <option value="Vanuatu">Vanuatu</option> 
          <option value="Venezuela">Venezuela</option> 
          <option value="Viet Nam">Viet Nam</option> 
          <option value="Virgin Islands, British">Virgin Islands, British</option> 
          <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option> 
          <option value="Wallis and Futuna">Wallis and Futuna</option> 
          <option value="Western Sahara">Western Sahara</option> 
          <option value="Yemen">Yemen</option> 
          <option value="Zambia">Zambia</option> 
          <option value="Zimbabwe">Zimbabwe</option>
        </select>

</li></p>

<p><li><label>Where in City <span class="star">*</span></label>
<select data-placeholder="Select Where in City" class="chzn-select" tabindex="2" style="width:315px;">
          <option value=""></option> 
          <option value="United States">United States</option> 
          <option value="United Kingdom">United Kingdom</option> 
          <option value="Afghanistan">Afghanistan</option> 
          <option value="Albania">Albania</option> 
          <option value="Algeria">Algeria</option> 
          <option value="American Samoa">American Samoa</option> 
          <option value="Andorra">Andorra</option> 
          <option value="Angola">Angola</option> 
          <option value="Anguilla">Anguilla</option> 
          <option value="Antarctica">Antarctica</option> 
          <option value="Antigua and Barbuda">Antigua and Barbuda</option> 
          <option value="Argentina">Argentina</option> 
          <option value="Armenia">Armenia</option> 
          <option value="Aruba">Aruba</option> 
          <option value="Australia">Australia</option> 
          <option value="Austria">Austria</option> 
          <option value="Azerbaijan">Azerbaijan</option> 
          <option value="Bahamas">Bahamas</option> 
          <option value="Bahrain">Bahrain</option> 
          <option value="Bangladesh">Bangladesh</option> 
          <option value="Barbados">Barbados</option> 
          <option value="Belarus">Belarus</option> 
          <option value="Belgium">Belgium</option> 
          <option value="Belize">Belize</option> 
          <option value="Benin">Benin</option> 
          <option value="Bermuda">Bermuda</option> 
          <option value="Bhutan">Bhutan</option> 
          <option value="Bolivia">Bolivia</option> 
          <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option> 
          <option value="Botswana">Botswana</option> 
          <option value="Bouvet Island">Bouvet Island</option> 
          <option value="Brazil">Brazil</option> 
          <option value="British Indian Ocean Territory">British Indian Ocean Territory</option> 
          <option value="Brunei Darussalam">Brunei Darussalam</option> 
          <option value="Bulgaria">Bulgaria</option> 
          <option value="Burkina Faso">Burkina Faso</option> 
          <option value="Burundi">Burundi</option> 
          <option value="Cambodia">Cambodia</option> 
          <option value="Cameroon">Cameroon</option> 
          <option value="Canada">Canada</option> 
          <option value="Cape Verde">Cape Verde</option> 
          <option value="Cayman Islands">Cayman Islands</option> 
          <option value="Central African Republic">Central African Republic</option> 
          <option value="Chad">Chad</option> 
          <option value="Chile">Chile</option> 
          <option value="China">China</option> 
          <option value="Christmas Island">Christmas Island</option> 
          <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option> 
          <option value="Colombia">Colombia</option> 
          <option value="Comoros">Comoros</option> 
          <option value="Congo">Congo</option> 
          <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option> 
          <option value="Cook Islands">Cook Islands</option> 
          <option value="Costa Rica">Costa Rica</option> 
          <option value="Cote D'ivoire">Cote D'ivoire</option> 
          <option value="Croatia">Croatia</option> 
          <option value="Cuba">Cuba</option> 
          <option value="Cyprus">Cyprus</option> 
          <option value="Czech Republic">Czech Republic</option> 
          <option value="Denmark">Denmark</option> 
          <option value="Djibouti">Djibouti</option> 
          <option value="Dominica">Dominica</option> 
          <option value="Dominican Republic">Dominican Republic</option> 
          <option value="Ecuador">Ecuador</option> 
          <option value="Egypt">Egypt</option> 
          <option value="El Salvador">El Salvador</option> 
          <option value="Equatorial Guinea">Equatorial Guinea</option> 
          <option value="Eritrea">Eritrea</option> 
          <option value="Estonia">Estonia</option> 
          <option value="Ethiopia">Ethiopia</option> 
          <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option> 
          <option value="Faroe Islands">Faroe Islands</option> 
          <option value="Fiji">Fiji</option> 
          <option value="Finland">Finland</option> 
          <option value="France">France</option> 
          <option value="French Guiana">French Guiana</option> 
          <option value="French Polynesia">French Polynesia</option> 
          <option value="French Southern Territories">French Southern Territories</option> 
          <option value="Gabon">Gabon</option> 
          <option value="Gambia">Gambia</option> 
          <option value="Georgia">Georgia</option> 
          <option value="Germany">Germany</option> 
          <option value="Ghana">Ghana</option> 
          <option value="Gibraltar">Gibraltar</option> 
          <option value="Greece">Greece</option> 
          <option value="Greenland">Greenland</option> 
          <option value="Grenada">Grenada</option> 
          <option value="Guadeloupe">Guadeloupe</option> 
          <option value="Guam">Guam</option> 
          <option value="Guatemala">Guatemala</option> 
          <option value="Guinea">Guinea</option> 
          <option value="Guinea-bissau">Guinea-bissau</option> 
          <option value="Guyana">Guyana</option> 
          <option value="Haiti">Haiti</option> 
          <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option> 
          <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option> 
          <option value="Honduras">Honduras</option> 
          <option value="Hong Kong">Hong Kong</option> 
          <option value="Hungary">Hungary</option> 
          <option value="Iceland">Iceland</option> 
          <option value="India">India</option> 
          <option value="Indonesia">Indonesia</option> 
          <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option> 
          <option value="Iraq">Iraq</option> 
          <option value="Ireland">Ireland</option> 
          <option value="Israel">Israel</option> 
          <option value="Italy">Italy</option> 
          <option value="Jamaica">Jamaica</option> 
          <option value="Japan">Japan</option> 
          <option value="Jordan">Jordan</option> 
          <option value="Kazakhstan">Kazakhstan</option> 
          <option value="Kenya">Kenya</option> 
          <option value="Kiribati">Kiribati</option> 
          <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option> 
          <option value="Korea, Republic of">Korea, Republic of</option> 
          <option value="Kuwait">Kuwait</option> 
          <option value="Kyrgyzstan">Kyrgyzstan</option> 
          <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option> 
          <option value="Latvia">Latvia</option> 
          <option value="Lebanon">Lebanon</option> 
          <option value="Lesotho">Lesotho</option> 
          <option value="Liberia">Liberia</option> 
          <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option> 
          <option value="Liechtenstein">Liechtenstein</option> 
          <option value="Lithuania">Lithuania</option> 
          <option value="Luxembourg">Luxembourg</option> 
          <option value="Macao">Macao</option> 
          <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option> 
          <option value="Madagascar">Madagascar</option> 
          <option value="Malawi">Malawi</option> 
          <option value="Malaysia">Malaysia</option> 
          <option value="Maldives">Maldives</option> 
          <option value="Mali">Mali</option> 
          <option value="Malta">Malta</option> 
          <option value="Marshall Islands">Marshall Islands</option> 
          <option value="Martinique">Martinique</option> 
          <option value="Mauritania">Mauritania</option> 
          <option value="Mauritius">Mauritius</option> 
          <option value="Mayotte">Mayotte</option> 
          <option value="Mexico">Mexico</option> 
          <option value="Micronesia, Federated States of">Micronesia, Federated States of</option> 
          <option value="Moldova, Republic of">Moldova, Republic of</option> 
          <option value="Monaco">Monaco</option> 
          <option value="Mongolia">Mongolia</option> 
          <option value="Montenegro">Montenegro</option>
          <option value="Montserrat">Montserrat</option> 
          <option value="Morocco">Morocco</option> 
          <option value="Mozambique">Mozambique</option> 
          <option value="Myanmar">Myanmar</option> 
          <option value="Namibia">Namibia</option> 
          <option value="Nauru">Nauru</option> 
          <option value="Nepal">Nepal</option> 
          <option value="Netherlands">Netherlands</option> 
          <option value="Netherlands Antilles">Netherlands Antilles</option> 
          <option value="New Caledonia">New Caledonia</option> 
          <option value="New Zealand">New Zealand</option> 
          <option value="Nicaragua">Nicaragua</option> 
          <option value="Niger">Niger</option> 
          <option value="Nigeria">Nigeria</option> 
          <option value="Niue">Niue</option> 
          <option value="Norfolk Island">Norfolk Island</option> 
          <option value="Northern Mariana Islands">Northern Mariana Islands</option> 
          <option value="Norway">Norway</option> 
          <option value="Oman">Oman</option> 
          <option value="Pakistan">Pakistan</option> 
          <option value="Palau">Palau</option> 
          <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option> 
          <option value="Panama">Panama</option> 
          <option value="Papua New Guinea">Papua New Guinea</option> 
          <option value="Paraguay">Paraguay</option> 
          <option value="Peru">Peru</option> 
          <option value="Philippines">Philippines</option> 
          <option value="Pitcairn">Pitcairn</option> 
          <option value="Poland">Poland</option> 
          <option value="Portugal">Portugal</option> 
          <option value="Puerto Rico">Puerto Rico</option> 
          <option value="Qatar">Qatar</option> 
          <option value="Reunion">Reunion</option> 
          <option value="Romania">Romania</option> 
          <option value="Russian Federation">Russian Federation</option> 
          <option value="Rwanda">Rwanda</option> 
          <option value="Saint Helena">Saint Helena</option> 
          <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option> 
          <option value="Saint Lucia">Saint Lucia</option> 
          <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option> 
          <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option> 
          <option value="Samoa">Samoa</option> 
          <option value="San Marino">San Marino</option> 
          <option value="Sao Tome and Principe">Sao Tome and Principe</option> 
          <option value="Saudi Arabia">Saudi Arabia</option> 
          <option value="Senegal">Senegal</option> 
          <option value="Serbia">Serbia</option> 
          <option value="Seychelles">Seychelles</option> 
          <option value="Sierra Leone">Sierra Leone</option> 
          <option value="Singapore">Singapore</option> 
          <option value="Slovakia">Slovakia</option> 
          <option value="Slovenia">Slovenia</option> 
          <option value="Solomon Islands">Solomon Islands</option> 
          <option value="Somalia">Somalia</option> 
          <option value="South Africa">South Africa</option> 
          <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option> 
          <option value="South Sudan">South Sudan</option> 
          <option value="Spain">Spain</option> 
          <option value="Sri Lanka">Sri Lanka</option> 
          <option value="Sudan">Sudan</option> 
          <option value="Suriname">Suriname</option> 
          <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option> 
          <option value="Swaziland">Swaziland</option> 
          <option value="Sweden">Sweden</option> 
          <option value="Switzerland">Switzerland</option> 
          <option value="Syrian Arab Republic">Syrian Arab Republic</option> 
          <option value="Taiwan, Republic of China">Taiwan, Republic of China</option> 
          <option value="Tajikistan">Tajikistan</option> 
          <option value="Tanzania, United Republic of">Tanzania, United Republic of</option> 
          <option value="Thailand">Thailand</option> 
          <option value="Timor-leste">Timor-leste</option> 
          <option value="Togo">Togo</option> 
          <option value="Tokelau">Tokelau</option> 
          <option value="Tonga">Tonga</option> 
          <option value="Trinidad and Tobago">Trinidad and Tobago</option> 
          <option value="Tunisia">Tunisia</option> 
          <option value="Turkey">Turkey</option> 
          <option value="Turkmenistan">Turkmenistan</option> 
          <option value="Turks and Caicos Islands">Turks and Caicos Islands</option> 
          <option value="Tuvalu">Tuvalu</option> 
          <option value="Uganda">Uganda</option> 
          <option value="Ukraine">Ukraine</option> 
          <option value="United Arab Emirates">United Arab Emirates</option> 
          <option value="United Kingdom">United Kingdom</option> 
          <option value="United States">United States</option> 
          <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option> 
          <option value="Uruguay">Uruguay</option> 
          <option value="Uzbekistan">Uzbekistan</option> 
          <option value="Vanuatu">Vanuatu</option> 
          <option value="Venezuela">Venezuela</option> 
          <option value="Viet Nam">Viet Nam</option> 
          <option value="Virgin Islands, British">Virgin Islands, British</option> 
          <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option> 
          <option value="Wallis and Futuna">Wallis and Futuna</option> 
          <option value="Western Sahara">Western Sahara</option> 
          <option value="Yemen">Yemen</option> 
          <option value="Zambia">Zambia</option> 
          <option value="Zimbabwe">Zimbabwe</option>
        </select>
</li></p>
<p><li><label>Description <span class="star">*</span></label><textarea class="textarea"></textarea><br /><span class="description_count"> 125</span>
</li></p>

<p><li><label></label><input type="checkbox" /> Secondary/Concerned person</li></p>
<p><li><label>Name <span class="star">*</span></label><input type="text" class="input" /></li></p>
<p><li><label>Phone Number <span class="star">*</span></label><input type="text" class="input" /></li></p>
<p><li><label>Email Id</label><input type="text" class="input" /></li></p>

<div><h3>Seller Choice</h3>
<div style="display: none; float:left;">
<table border="0" cellpadding="10" cellspacing="0" style="border:1px solid #c5c5c5;">
<tr>
<td>
<select data-placeholder="Plan" class="chzn-select" style="width:150px;">
<option value=""></option> 
<option value="">Free</option>
<option value="">Basic</option> 
<option value="2">Premium</option>
<option value="">Platinum</option>
</select>
</td>
<td width="230px"><label>No. of months</label><li>
<select data-placeholder="Months" class="chzn-select" style="width:100px;">
<option value=""></option> 
<option value="">1</option>
<option value="">2</option> 
<option value="2">Qtr</option>
<option value="">Half yr</option>
<option value="">Year</option>
</select>
</li></td>
<td><input type="text" class="input2" value="Amount" onFocus="if(this.value =='Amount' ) this.value=''" onBlur="if(this.value=='') this.value='Amount'" />
<select data-placeholder="Select" class="chzn-select" style="width:80px;">
<option value=""></option> 
<option value="">Rs</option> 
<option value="2">Lakh(s)</option>
<option value="">Cr(s)</option>
</select>
</td>
</tr>
<tr>
<!--<td colspan="4" style="border-top:1px solid #c5c5c5;">
&nbsp;&nbsp;<input type="checkbox" />Customized<br />

<li style="margin:10px 10px 0 0; float:left;">Referred by: &nbsp; <input type="text" class="input2" /></li>

<li style="margin:10px 0 0 0px; float:left;">Customized Amount: &nbsp; <input type="text" class="input2" /> <select data-placeholder="Select" class="chzn-select" style="width:90px;">
<option value=""></option> 
<option value="">Rs</option> 
<option value="2">Lakh(s)</option>
<option value="">Cr(s)</option>
</select></li>

<li style="float:left; margin-top:15px; margin-right:10px;">Payment Type
<select data-placeholder="Payment Type" class="chzn-select" tabindex="2" style="width:150px;">
<option value=""></option>
<option value="C"  >Cash</option>
<option value="BT" >Bank Transfer</option>
<option value="CH" >Cheque</option>
<option value="D" >Deposit</option>
</select></li> 

<li style="margin-top:15px; float:left;"><label>Assign Job to Exe</label>
<select data-placeholder="Executives" class="chzn-select" tabindex="2" style="width:150px;">
<option value=""></option> 
<option value="2">EMP 01</option> 
<option value="2">EMP 02</option>
</select></li>


</td>-->
</tr>
</table>

</div>
</div>

<p><li class="buttons" style="float:right;"><a href="agriculture2_post.php"><input  type="submit" value="POST" class="input_btn"/></a></li></p>

</ol>
</div>



</div>


</td>

<script src="../js/chosen.jquery.js" type="text/javascript"></script>
<script type="text/javascript"> $(".chzn-select").chosen(); $(".chzn-select-deselect").chosen({allow_single_deselect:true}); </script>
</body>
<?php
}
?>
