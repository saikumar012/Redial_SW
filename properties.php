<?php 
include("include/session.php");
	global $database;
if(!$session->logged_in){
		header("Location:index.php");
}else{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to Redial</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />

<link rel="stylesheet" href="css/chosen2.css" />
<script src="js/jquery-1.8.0.min.js"></script>
</head>

<body>
<div id="warp">

<div class="logo"><a href="index_properties.php"><img src="images/logo.png" alt="Redail Logo" /></a></div>

<span style="float:right; font-size:11px; padding-top:3px;">&nbsp;&nbsp;&nbsp; <?php echo $_SESSION['username'] ?> &nbsp;&nbsp;|&nbsp;&nbsp; <a href="process.php">Logout</a></span>
<div class="top_menu">
<a href="messagehistory.php">S & S History</a>|
<a href="appointments.php">Appointments</a>|
<a href="agents/agents_new.php">Bulk</a>|
<a href="buyers.php">Buyers</a>|
<a href="complaintbox.php">Complaints</a>|
<a href="domods.php">Do-Mod's</a>|
<a href="msms.php">M-SMS</a>
</div>

<div class="top_icons" style="float:left; margin:40px 0 0 250px;">
<a href="properties_add.php"><img src="images/list_property.png" alt="List Property" /><br />List property</a>
</div>

<!--<div class="connect_people">Connecting properties & people in one dial <br />
<a href="#">040 - 22222224</a></div>-->

<ul id="nav-reflection2">
<li><a href="properties.php" class="active">Properties</a></li>
<li class="button-color-1"><a href="#">Projects</a></li>		
</ul>

<div style="width:100%; float:left;">

<div class="main_hed" style="margin-top:9px;">Search > <span>Properties</span> <div class="inner_menu"><a href="#" class="active">Residential</a>|<a href="#">Commercial</a>|<a href="#" style="padding-right:0px;">Agriculture</a>
</div></div>

<div id="form" style="width:750px;">
<ol>
<div class="special_cond" style="float:right; width:260px; margin-top:50px; margin-right:15px;">

<p><li><label style="width:150px;">Gated Community</label><br /><br /><input type="radio" name="GratedCommunity" />YES  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="GratedCommunity" />No
</li></p>

<p><li><label style="width:150px;">Rental Purpose</label><br /><br /><input type="radio" name="RentalPurpose" />YES  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="RentalPurpose" />No
</li></p>

<p><li><label style="width:150px;">Transaction Type</label><br /><br /><input type="radio" />New Property  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" />Resale</li></p>
<p><li><label style="width:150px;">Possesion Status</label><br /><br /><input type="radio" />Under Consturation  <input type="radio" />Ready to occpuy</li></p>

</div>

<p><li><label>I Want to</label><input type="radio" name="Want" /> Buy <input type="radio" name="Want" />Rent</li></p>
<p><li><label>Type</label>

<select data-placeholder="Select Your Type" class="chzn-select" multiple style="width:315px;" tabindex="4">
          <option value=""></option> 
          <option value="United States">United States</option> 
          <option value="United Kingdom">United Kingdom</option> 
          <option value="Afghanistan">Afghanistan</option> 
          <option value="Aland Islands">Aland Islands</option> 
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
          <option value="Bolivia, Plurinational State of">Bolivia, Plurinational State of</option> 
          <option value="Bonaire, Sint Eustatius and Saba">Bonaire, Sint Eustatius and Saba</option> 
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
          <option value="Curacao">Curacao</option> 
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
          <option value="Guernsey">Guernsey</option> 
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
          <option value="Isle of Man">Isle of Man</option> 
          <option value="Israel">Israel</option> 
          <option value="Italy">Italy</option> 
          <option value="Jamaica">Jamaica</option> 
          <option value="Japan">Japan</option> 
          <option value="Jersey">Jersey</option> 
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
          <option value="Libya">Libya</option> 
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
          <option value="Saint Barthelemy">Saint Barthelemy</option> 
          <option value="Saint Helena, Ascension and Tristan da Cunha">Saint Helena, Ascension and Tristan da Cunha</option> 
          <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option> 
          <option value="Saint Lucia">Saint Lucia</option> 
          <option value="Saint Martin (French part)">Saint Martin (French part)</option> 
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
          <option value="Sint Maarten (Dutch part)">Sint Maarten (Dutch part)</option> 
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
          <option value="Taiwan, Province of China">Taiwan, Province of China</option> 
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
          <option value="Venezuela, Bolivarian Republic of">Venezuela, Bolivarian Republic of</option> 
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
      
<p><li><label>Bed Rooms</label>
<select data-placeholder="Bed Rooms" class="chzn-select" tabindex="2" style="width:315px;">
          <option value=""></option> 
          <option value="2">1</option> 
          <option value="2">2</option> 
          <option value="2">3</option> 
          <option value="2">4</option> 
          <option value="2">5</option> 
          <option value="2">6</option> 
          <option value="2">6+</option> 
          
        </select></li>
</p>


<p><li><label>Price Range</label><input type="text" class="input2" /> To <input type="text" class="input2" /></li></p>
<p><li><label>Area</label><input type="text" class="input2" /> To <input type="text" class="input2" /></li></p>

<p><li><label>City</label>

<select data-placeholder="Select City"  class="chzn-select" tabindex="" style="width:315px;">
          <option value=""></option>
          <option value="Hyderabad">Hyderabad</option>
</select>

</li></p>

<p><li><label>Where in City</label>
<select data-placeholder="Where in City" class="chzn-select" tabindex="2" style="width:315px;">
          <option value=""></option> 
          <option value="">select</option>
<option value="6">A C guards</option>
<option value="8">Ambarpet</option>
<option value="9">Asman gadh</option>
<option value="11">Adarsh nagar</option>
<option value="12">Alliabad</option>
<option value="13">A S rao nagar</option>
<option value="14">Alwal</option>
<option value="15">Ashok nagar</option>
<option value="16">Attapur</option>
<option value="17">Airport road</option>
<option value="18">Ameerpet</option>
<option value="19">Aanad nagar colony</option>
<option value="20">Asif nagar</option>
<option value="21">Almas guda</option>
<option value="22">B N reddy nagar</option>
<option value="23">Badichowdi</option>
<option value="24">Bahadurpura</option>
<option value="25">Bairamalguda</option>
<option value="26">Balji nagar</option>
<option value="27">Balkampet</option>
<option value="28">Banjarahills</option>
<option value="29">Bapu nagar</option>
<option value="30">Barkhatpura</option>
<option value="31">Beerumguda</option>
<option value="32">Bachupally</option>
<option value="33">Barani hills</option>
<option value="34">Bavanipuram</option>
<option value="35">Bholakpur</option>
<option value="36">Boduppal</option>
<option value="37">Borabanda</option>
<option value="38">Babarbagh</option>
<option value="39">Banjarahills cross rd</option>
<option value="40">Bapuji nagar</option>
<option value="41">Basheerbagh</option>
<option value="42">Begumbazar</option>
<option value="43">Bhagyanagar colony</option>
<option value="44">Bharat nagar</option>
<option value="45">BHEL</option>
<option value="46">Bongiri</option>
<option value="47">Brundavan colony</option>
<option value="48">Bagh ameerpet</option>
<option value="49">Bahadurguda</option>
<option value="50">Bandlaguda</option>
<option value="51">Begumpet</option>
<option value="52">bongulur</option>
<option value="53">Bhoiguda</option>
<option value="54">BB nagar</option>
<option value="55">Bowenpally</option>
<option value="56">Baghlingampally</option>
<option value="57">Bala nagar</option>
<option value="58">Balapur</option>
<option value="59">Bansilalpet</option>
<option value="60">Bazarghat</option>
<option value="61">Begumpet rd</option>
<option value="62">Bhavani nagar</option>
<option value="63">Bolaram</option>
<option value="64">Chaderghat</option>
<option value="65">Chakrapuri colony</option>
<option value="66">Chanda nagar</option>
<option value="67">Chappal bagar</option>
<option value="68">Chevella</option>
<option value="69">Chilkur</option>
<option value="70">Chintapaliguda</option>
<option value="71">Chudi bagar</option>
<option value="72">Chaitanyapuri</option>
<option value="73">Champapet</option>
<option value="74">Chandrayangutta</option>
<option value="75">Charminar</option>
<option value="76">Chikkadpally</option>
<option value="77">Chintal</option>
<option value="78">Chirag ali lane</option>
<option value="79">Cybergateway</option>
<option value="80">Central excise colony</option>
<option value="81">Chanchalguda</option>
<option value="82">Chintal basthi</option>
<option value="83">Chitrapuri colony</option>
<option value="84">Cyberabad</option>
<option value="85">Cherlapally</option>
<option value="86">Chilkalguda</option>
<option value="87">Chintalkunta</option>
<option value="88">Choutuppal</option>
<option value="89">D D colony</option>
<option value="90">Durgabhai deshmukh colony</option>
<option value="91">Dabeerpura</option>
<option value="92">Dasarlapally</option>
<option value="93">Dwaraka nagar</option>
<option value="94">Dammaiguda</option>
<option value="95">Dhoolpet</option>
<option value="96">Dilsukhnagar</option>
<option value="97">Dwaraka puri colony</option>
<option value="98">Dindigal</option>
<option value="99">Domalguda</option>
<option value="100">East marredpally</option>
<option value="101">Edi bagar</option>
<option value="102">Edulapally</option>
<option value="103">ECIL</option>
<option value="104">ECIL cross rd</option>
<option value="105">Erragadda</option>
<option value="106">Erramangil</option>
<option value="107">Fateh nagar</option>
<option value="108">Film nagar</option>
<option value="109">FAB city</option>
<option value="110">Falaknuma</option>
<option value="111">Fatima nagar</option>
<option value="112">Farooq nagar</option>
<option value="113">feelkhana</option>
<option value="114">Fatehmaidan</option>
<option value="115">Ferozguda</option>
<option value="116">Ghandi nagar</option>
<option value="117">Gandi maisamma</option>
<option value="118">General bazar</option>
<option value="119">Ghatkesar</option>
<option value="120">Ghoshamahal rd</option>
<option value="121">Greenfields</option>
<option value="122">Gunfoundry</option>
<option value="123">Gurrumguda</option>
<option value="124">Gachibowli</option>
<option value="125">Ghandi mysamma</option>
<option value="126">Golnaka</option>
<option value="127">Ghansi bazar</option>
<option value="128">Golkonda</option>
<option value="129">Green lands</option>
<option value="130">Gaddi annaram</option>
<option value="131">Gajwal</option>
<option value="132">Gandipet</option>
<option value="133">Gopanpally</option>
<option value="134">Gowliguda</option>
<option value="135">Gudi malkapur</option>
<option value="136">Gayathri nagar</option>
<option value="137">Gulzar house</option>
<option value="138">Haribowli</option>
<option value="139">Hayathnagar</option>
<option value="140">HMT colony</option>
<option value="141">Habsiguda</option>
<option value="142">Hasmatpet</option>
<option value="143">Hitec city</option>
<option value="144">Himayat nagar</option>
<option value="145">Hussaini Alam</option>
<option value="146">Hyderabad Gpo</option>
<option value="147">Hafeezpet</option>
<option value="148">Hastinapuram</option>
<option value="149">High Court Road</option>
<option value="150">Hyderguda</option>
<option value="151">Hakimpet</option>
<option value="152">Hardware Park</option>
<option value="153">Himayat Sagar</option>
<option value="154">Hyder Nagar</option>
<option value="155">Ibrahimpatnam</option>
<option value="156">IDPL</option>
<option value="157">Indira Nagar</option>
<option value="158">Indira Park</option>
<option value="159">International Airport</option>
<option value="160">Isnapur</option>
<option value="161">Jadcherla</option>
<option value="162">Jagadgirigutta</option>
<option value="163">Jambagh</option>
<option value="164">Jawahar Nagar</option>
<option value="165">Jeedimetla</option>
<option value="166">JNTU</option>
<option value="167">JP Dargha Road</option>
<option value="168">Jubilee Hills</option>
<option value="169">Jubilee Hills Cross Road</option>
<option value="170">Kachiguda</option>
<option value="171">Kamala Nagar</option>
<option value="172">Karkhana</option>
<option value="173">Kattedan</option>
<option value="174">Keesara</option>
<option value="175">Khairatabad</option>
<option value="176">Kachiguda Cross Road</option>
<option value="177">Kadthal</option>
<option value="178">Kanchanbagh</option>
<option value="179">Karmanghat</option>
<option value="180">Karwan</option>
<option value="181">Kavadiguda</option>
<option value="182">Kavuri Hills</option>
<option value="183">King Koti</option>
<option value="184">Kishan Bagh</option>
<option value="185">Kishangunj</option>
<option value="186">Kokapet</option>
<option value="187">Kompally</option>
<option value="188">Kondapur</option>
<option value="189">Kondapur Gachibowli Road</option>
<option value="190">Kothapet</option>
<option value="191">Kothur</option>
<option value="192">Koti</option>
<option value="193">KPHB</option>
<option value="194">Krishna Nagar</option>
<option value="195">Kukatpally</option>
<option value="196">Kuntloor</option>
<option value="197">Kushaiguda</option>
<option value="198">Kutbullapur</option>
<option value="199">L B Nagar</option>
<option value="200">Lad Bazar</option>
<option value="201">Lakdi Ka Pul</option>
<option value="202">Lal Darwaza</option>
<option value="203">Lalapet</option>
<option value="204">Lallaguda</option>
<option value="205">Lanco hills</option>
<option value="206">Langer House</option>
<option value="207">Laxmi Nagar Colony</option>
<option value="208">Liberty</option>
<option value="209">Lingampally</option>
<option value="210">Lothkunta</option>
<option value="211">Lower Tank Bund Road</option>
<option value="212">Lumbini Park</option>
<option value="213">M G Road</option>
<option value="214">Madannapet</option>
<option value="215">Madhapur</option>
<option value="216">Madhura Nagar</option>
<option value="217">Madina</option>
<option value="218">Maheshwaram</option>
<option value="219">Mahindra hills</option>
<option value="220">Malakpet</option>
<option value="221">Malaysian Township</option>
<option value="222">Malkajgiri</option>
<option value="223">Mangalhat</option>
<option value="224">Manikonda</option>
<option value="225">Manneguda</option>
<option value="226">Mansoorabad</option>
<option value="227">Marredpally</option>
<option value="228">Masab Tank</option>
<option value="229">Medchal</option>
<option value="230">Meerkhanpet</option>
<option value="231">Meerpet</option>
<option value="232">Mehadipatnam</option>
<option value="233">Mehboob Gunj</option>
<option value="234">Mettu Guda</option>
<option value="235">Minister Road</option>
<option value="236">Miryalguda</option>
<option value="237">Miyapur</option>
<option value="238">Mohan Nagar</option>
<option value="239">Moinabad</option>
<option value="240">Moosapet</option>
<option value="241">Moosaram Bagh</option>
<option value="242">Moti Nagar</option>
<option value="243">Moula Ali</option>
<option value="244">Mozamjahi Market</option>
<option value="245">Mughalpura</option>
<option value="246">Musheerabad</option>
<option value="247">Nacharam</option>
<option value="248">Nadergul</option>
<option value="249">Nagaram</option>
<option value="250">Nagarjuna Circle</option>
<option value="251">Nagarjuna Hills</option>
<option value="252">Nagarjuna Sagar Road</option>
<option value="253">Nagole</option>
<option value="254">Nallakunta</option>
<option value="255">Nampally</option>
<option value="256">Nampally Station Road</option>
<option value="257">Nanakramguda</option>
<option value="258">Narayanguda</option>
<option value="259">Narsingi</option>
<option value="260">Nayapul</option>
<option value="261">Necklace Road</option>
<option value="262">New Bowenpally</option>
<option value="263">New Malakpet</option>
<option value="264">New Marredpally</option>
<option value="265">Nizampet</option>
<option value="266">NTR Nagar</option>
<option value="267">Old Alwal</option>
<option value="268">Old Malakpet</option>
<option value="269">Osmangunj</option>
<option value="270">Osmania University</option>
<option value="271">Padma Rao Nagar</option>
<option value="272">Panjagutta</option>
<option value="273">Paradise</option>
<option value="274">Patancheruvu</option>
<option value="275">Pathargatti</option>
<option value="276">Patny Centre</option>
<option value="277">Pavanpuri Colony</option>
<option value="278">Pocharam</option>
<option value="279">Pochampalli</option>
<option value="280">Purana Pul</option>
<option value="281">Putli Bowli</option>
<option value="282">Quthbullapur</option>
<option value="283">R C Puram</option>
<option value="284">R K Nagar</option>
<option value="285">R P Road</option>
<option value="286">R T C Cross Road</option>
<option value="287">Ragannaguda</option>
<option value="288">Ragavendra Colony</option>
<option value="289">Raghavendra Nagar</option>
<option value="290">Rahimpura</option>
<option value="291">Rahmat Nagar</option>
<option value="292">Raidurgam</option>
<option value="293">Raj Bhavan Road</option>
<option value="294">Rajamundry</option>
<option value="295">Rajeev Nagar</option>
<option value="296">Rajendra Nagar</option>
<option value="297">Rajiv Gandhi Nagar</option>
<option value="298">Ram Nagar</option>
<option value="299">Rama Raja Nagar</option>
<option value="300">Ramachandra Nagar</option>
<option value="301">Ramachandra Puram</option>
<option value="302">R K Puram</option>
<option value="303">Ramanthapur</option>
<option value="304">Ramgopalpet</option>
<option value="305">Ramkoti</option>
<option value="306">Ramoji Film City</option>
<option value="307">Rampally</option>
<option value="308">Ranga Reddy District</option>
<option value="309">Ranga Reddy Nagar</option>
<option value="310">Ranigunj</option>
<option value="311">Rasoolpura</option>
<option value="312">Red Hills</option>
<option value="313">Reti Bowli New</option>
<option value="314">Rezimental Bazar</option>
<option value="315">Rikabgunj</option>
<option value="316">Risala Bazar</option>
<option value="317">RK Puram</option>
<option value="318">RTC Colony</option>
<option value="319">Rushikonda</option>
<option value="320">S D Road</option>
<option value="321">S P Road</option>
<option value="322">S R Nagar</option>
<option value="323">Sadashivpet</option>
<option value="324">Safilguda</option>
<option value="325">Sagar Highway</option>
<option value="326">Sagar Ring Road</option>
<option value="327">Sai Nagar</option>
<option value="328">Saidabad</option>
<option value="329">Saidabad Colony</option>
<option value="330">Saifabad</option>
<option value="331">Sainikpuri</option>
<option value="332">Sakethnagar</option>
<option value="333">Saleem Nagar</option>
<option value="334">Sanath Nagar</option>
<option value="335">Sangareddy</option>
<option value="336">Sanjiva Reddy Nagar</option>
<option value="337">Santosh Nagar</option>
<option value="338">Saroor Nagar</option>
<option value="339">Satellite Township</option>
<option value="340">Secretariat</option>
<option value="341">Secunderabad</option>
<option value="342">Seelam Nookaraju Road</option>
<option value="343">Serilingampally</option>
<option value="344">Shadnagar</option>
<option value="345">Shah Ali Banda</option>
<option value="346">Shahbaad</option>
<option value="347">Shahpur Nagar</option>
<option value="348">Shaikpet</option>
<option value="349">Shalivahana Nagar</option>
<option value="350">Shameerpet</option>
<option value="351">Shamirpet</option>
<option value="352">Shamshabad</option>
<option value="353">Shamshabad Road</option>
<option value="354">Shamsher Gunj</option>
<option value="355">Shaneerpet Road</option>
<option value="356">Shankar Bagh</option>
<option value="357">Shankar Mutt</option>
<option value="358">Shankar Nagar</option>
<option value="359">Shankarpalli</option>
<option value="360">Shankerpally</option>
<option value="361">Shanti Nagar</option>
<option value="362">Shivaji Nagar</option>
<option value="363">Shivam Road</option>
<option value="364">Shivarampally</option>
<option value="365">Shreelingampally</option>
<option value="366">Siddharth Nagar</option>
<option value="367">Siddiamber Bazar</option>
<option value="368">Sikandarabad</option>
<option value="369">Sikh Road</option>
<option value="370">Sikh Village Road</option>
<option value="371">Silpararam</option>
<option value="372">Sindhi Colony</option>
<option value="373">Sitaphal Mandi</option>
<option value="374">Sitaram Bagh</option>
<option value="375">Somajiguda</option>
<option value="376">Sri Krishna Nagar</option>
<option value="377">Sri Nagar Colony</option>
<option value="378">Sri Rama Nagar</option>
<option value="379">Sri Srinivas Colony</option>
<option value="380">Srikakulam</option>
<option value="381">Srinivasa Nagar</option>
<option value="382">Srisailam Highway</option>
<option value="383">St. Johns Road</option>
<option value="384">St. Marys Road</option>
<option value="385">Station Road</option>
<option value="386">Subhash Road</option>
<option value="387">Suchitra</option>
<option value="388">Sudha Nagar</option>
<option value="389">Sultan Bagh</option>
<option value="390">Sultan Bazar</option>
<option value="391">Sun City</option>
<option value="392">Sunder Nagar</option>
<option value="393">Surmaiguda Village</option>
<option value="394">Surya Nagar Colony</option>
<option value="395">Talabkatta</option>
<option value="396">Tangutoor</option>
<option value="397">Tank Bund</option>
<option value="398">Tar Bund</option>
<option value="399">Tar Bund Cross Road</option>
<option value="400">Taramati Baradari</option>
<option value="401">Tarnaka</option>
<option value="402">Tarnaka Cross Road</option>
<option value="403">Telecom Nagar</option>
<option value="404">Tellapur</option>
<option value="405">Thalambur</option>
<option value="406">Theegapur Village</option>
<option value="407">Thimmapur</option>
<option value="408">Thumkunta</option>
<option value="409">Tilak Nagar</option>
<option value="410">Tilak Road</option>
<option value="411">Tirumala Nagar</option>
<option value="412">Tobacco Bazar</option>
<option value="413">Toli Chowki</option>
<option value="414">Topkhana</option>
<option value="415">Trimulgherry</option>
<option value="416">Troop Bazar</option>
<option value="417">Tukaramgate</option>
<option value="418">Tukkuguda</option>
<option value="419">Tumkunta</option>
<option value="420">TurkaYamjal</option>
<option value="421">Uppal</option>
<option value="422">Uppal Mandal</option>
<option value="423">Upperpally</option>
<option value="424">Vaishali Nagar</option>
<option value="425">Vanasthalipuram</option>
<option value="426">Vangapally</option>
<option value="427">Vasanth Nagar</option>
<option value="428">Vasanth Valley</option>
<option value="429">Vasavi Nagar</option>
<option value="430">Vattinagulapally</option>
<option value="431">Vayupuri</option>
<option value="432">Veerlapally village</option>
<option value="433">Vengal Rao Nagar</option>
<option value="434">Venkat Ramana Colony</option>
<option value="435">Venkat Reddy Nagar Colony</option>
<option value="436">Venkatapuram</option>
<option value="437">Vijay Nagar Colony</option>
<option value="438">Vijayawada Road</option>
<option value="439">Vikrampuri</option>
<option value="440">Vinay Nagar</option>
<option value="441">Vishakhapatnam</option>
<option value="442">Vitthalwadi</option>
<option value="443">Vivekanand Nagar</option>
<option value="444">Vizag</option>
<option value="445">Warangal highway</option>
<option value="446">Warasiguda</option>
<option value="447">West Marredpally</option>
<option value="448">Whitefields</option>
<option value="449">Yadagirigutta</option>
<option value="450">Yadgarpally</option>
<option value="451">Yakutpura</option>
<option value="452">Yapral</option>
<option value="453">Yellareddyguda</option>
<option value="454">YMCA</option>
<option value="455">Yousufguda</option>
<option value="456">Zamistanpur</option>
<option value="457">Ziaguda</option>
<option value="458">Adibhatla</option>
<option value="459">Ameenpur</option>
<option value="460">mallapur</option>
<option value="461">New Maruthi nagar</option>
<option value="462">Yamjal</option>
<option value="463">Abids</option>
<option value="464">Afzulgunj</option>
<option value="465">G.R reddy nagar</option>
<option value="466">Badangpet</option>
<option value="467">Madeenaguda</option>
<option value="468">Old Bowenpally</option>
<option value="469">Koti X road</option>
<option value="470">Narapally</option>
<option value="471">Aziz nagar</option>
<option value="472">Vidyanagar</option>
<option value="473">Appa Junction</option>
<option value="474">Neredmet</option>
<option value="475">Chegunta</option>
<option value="476">Gajularamaram</option>
<option value="477">Bangalore hwy</option>
<option value="478">Khanapur</option>
<option value="479">Mokila</option>
<option value="480">Pedda Shapur</option>
<option value="481">Mangalpally</option>
<option value="482">Brahmanpally</option>
<option value="483">Chilka nagar</option>
<option value="484">Peerzadiguda</option>
<option value="485">Allapur</option>
<option value="486">Nallagandla</option>
<option value="488">kalasiguda</option>
<option value="489">Auto nagar</option>
<option value="490">Mumbai Highway</option>
<option value="491">Ibrahim bagh</option>
<option value="492">Kollur</option>
<option value="493">Medipally</option>
</select>
</li></p>
<p><li><label>Key Words</label><textarea class="textarea"></textarea></li></p>
<p><li><label>Are You</label><input type="checkbox" />Owner &nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" />Agents &nbsp;&nbsp;&nbsp;&nbsp; <input type="checkbox" />Builders</li></p>

<p><li class="buttons" style="float:left; margin-left:370px;"><a href="properties_search.php"><input  type="submit" value="SEARCH" class="input_btn"/></a></li></p>

<div class="search_notfound">
<div class="errormsg2">Search Not Found</div><br /><br />

<p><li><label style="width:150px;">Mobile Number</label><input type="text" class="input" /></li></p>
<p><li><label style="width:150px;">Name</label><input type="text" class="input" /></li></p>
<p><li><label style="width:150px;">Email Id</label><input type="text" class="input" /></li></p>
<p><li class="buttons" style="float:right; margin-right:35px; margin-top:0px;"><input  type="submit" value="SAVE" class="input_btn"/></li></p>

</div>

</ol>
</div>

<div class="right_body">
<div class="r_menu"><a href="#">Message History</a></div>
<div class="search_bg">
<input type="text" class="src_input" onfocus="if(this.value =='Search ID, Phone & Name' ) this.value=''" onblur="if(this.value=='') this.value='Search ID, Phone & Name'" value="Search ID, Phone & Name" />
<input type="button" class="src_btn" />
</div>


</div>

</div>

</div>




<script src="js/chosen.jquery.js" type="text/javascript"></script>
<script type="text/javascript"> $(".chzn-select").chosen(); $(".chzn-select-deselect").chosen({allow_single_deselect:true}); </script>
</body>
</html>
<?php
}
?>