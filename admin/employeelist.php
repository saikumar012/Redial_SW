<?php
include("function.php");
include("../include/session.php");
	global $database;
if(!$session->logged_in){
		header("Location:index.php");
}else{
if(isset($_POST['passwordupdate'])){
		$user = $_POST['username'];
		$pass = $_POST['repswd1']; 
		$pass = trim($pass);
		if($pass == "" || $pass == null){
		}else{
		$pass = md5($pass);
		$q = "update users set password = '$pass' where username='$user'";
		//echo $q;
		$database->query($q);
		}
	}
	if(isset($_POST['activebtn'])){
		$inactivequery = "UPDATE users set active='1' where ";
		foreach($_POST['inactive'] as $value){
			$inactivequery .= "EmployeeId = '$value' or ";
		}
		$inactivequery .= "EmployeeId = '0'";
		$database->query($inactivequery);
		header("Location:employeelist.php");

	}
	if(isset($_POST['inactivebtn'])){
	$inactivequery = "UPDATE users set active='0' where ";
		foreach($_POST['inactive'] as $value){
			$inactivequery .= "EmployeeId = '$value' or ";
		}
		$inactivequery .= "EmployeeId = '0'";
		$database->query($inactivequery);
		header("Location:employeelist.php");
	}
	if(isset($_GET['user_list']))
	{
	 $id1=$_GET['user_list'];		
    $database->query("delete from users where id = '$id1'");
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to Redial</title>
<link rel="stylesheet" type="text/css" href="../css/style.css" />

<link rel="stylesheet" href="../css/chosen2.css" />
<script src="../js/jquery-1.8.0.min.js"></script>
<script type ="text/javascript">
function get_XmlHttp() {
  // create the variable that will contain the instance of the XMLHttpRequest object (initially with null value)
  var xmlHttp = null;

  if(window.XMLHttpRequest) {		// for Forefox, IE7+, Opera, Safari, ...
    xmlHttp = new XMLHttpRequest();
  }
  else if(window.ActiveXObject) {	// for Internet Explorer 5 or 6
    xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
  }

  return xmlHttp;
}
function deletee(id)
{
	var request =  get_XmlHttp();
	if (confirm("Are you sure you want to delete"))
{
    var  url = "?user_list="+id;
	request.open("GET", url, true);			// define the request
    request.send(null);
	request.onreadystatechange = function() {
    if (request.readyState == 4) {
     //var k = request.responseText;
	 location.reload();	
  }	
}
	 }
}

</script>
<link href="../css/modal.css" rel="stylesheet" type="text/css" />

</head>

<body>
<div id="warp">

<div class="logo"><a href="home.html"><img src="../images/logo.png" alt="Redail Logo" /></a></div>

<span style="float:right; font-size:11px; padding-top:3px; width:700px; text-align:right;">&nbsp;&nbsp;&nbsp; Admin &nbsp;&nbsp;|&nbsp;&nbsp; <a href="changeps.html">Change Password</a> &nbsp;&nbsp;|&nbsp;&nbsp; <a href="#">Logout</a></span>

<div class="r_menu2"><a href="employee.html">Create Employee</a><a href="employeelist.html" class="active">Employees List</a><a href="employee_department.html">Create Department</a><a href="employee_department_list.html">Department List</a></div>

<div style="width:100%; float:left;">

<div class="main_hed2"><img src="../images/p_sicon.png" align="absmiddle" /> &nbsp; Employee List</div>
<?php
$query = "select * from users where userlevel = 1 ORDER BY `timestamp` DESC ";

if(isset($_GET['search'])){
$EmployeeId = '';
$division = '';
$department = '';
$mobile = '';
$city = '';
$zone = '';
$query = "select * from users where ";
if(isset($_GET['EmployeeId']) && ($_GET['EmployeeId']!=0)) { 
    $EmployeeId = $_GET['EmployeeId']; 
	$query .= " EmployeeId = '$EmployeeId' ";
}
if(isset($_GET['division']) && ($_GET['division']!=0)) { 
	$division = $_GET['division']; 
	$query .= " division = '$division' ";
}
if(isset($_GET['department']) && ($_GET['department']!=0)) {
	$department = $_GET['department']; 
	$query .= " department = '$department' ";
}
if(isset($_GET['name']) && ($_GET['name']!=0)) {
	$name = $_GET['name']; 
	$query .= " name = '$name' ";
}
if(isset($_GET['mobile']) && ($_GET['mobile']!=0)) { 
	$mobile = $_GET['mobile']; 
	$query .= " mobile = '$mobile' ";
}

if(isset($_GET['city']) && ($_GET['city']!=0)) { 
	$city = $_GET['city']; 
	$query .= " city = '$city' ";
}
if(isset($_GET['zone']) && $_GET['zone']!=0) { 
	$zone = $_GET['zone']; 
	$query .= " zone = '$zone' ";
}

}
$emplist = $database->query($query);

?>
<form action="" method="get">
<div id="form">
<ol>
<p><li><label>Employe ID</label><input type="text" class="input" name="EmployeeId" value="" /></li></p>
<p><li><label>Division</label>
<select data-placeholder="Division" name="division" class="chzn-select" tabindex="2" style="width:315px;">
          <option value=""></option> 
          <option value="1">Indoor</option> 
          <option value="2">Outdoor</option>
        </select></li>
</p>

<p><li><label>Department</label>
<select data-placeholder="Department" name="department" class="chzn-select" tabindex="2" style="width:315px;">
          <option value=""></option> 
          <option value="2">CEO</option> 
          <option value="2">CMO</option>
          <option value="2">COO</option>
          <option value="2">HR</option>
          <option value="2">Finance</option>
          <option value="2">Software developers</option>
          <option value="2">PHP developer</option>
          <option value="2">Software trainee</option>
          <option value="2">Software test engineer</option>
          <option value="2">CCE</option>
          <option value="2">PIN</option>
          <option value="2">BDE</option>
        </select></li>
</p>

<p><li><label>Name</label><input type="text" class="input" name="name" value="" /></li></p>
<p><li><label>Phone No</label><input type="text" class="input" name="mobile" value="" /></li></p>
<p><li><label>City</label><select data-placeholder="Select City" name="city" class="chzn-select" tabindex="2" style="width:315px;">
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
        </select></li></p>
<p><li><label>Where in City</label><select data-placeholder="Select Where in City" name="whrereincity" class="chzn-select" tabindex="2" style="width:315px;">
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
        </select></li></p>

<p><li><label>Zone</label>
<select data-placeholder="Zone" class="chzn-select" name="zone" tabindex="2" style="width:315px;">
          <option value=""></option> 
          <option value="2">Central</option>
          <option value="2">East</option> 
          <option value="2">West</option>
          <option value="2">South</option>
          <option value="2">North</option>
        </select></li>
</p>

<p><li class="buttons" style="float:right;"><input type="submit" name="search" value="SEARCH" class="input_btn"/></li></p>
</ol>
</div>
</form>
<form method="post" action="">

<table class="CVGridView" rules="all" style="margin:10px 0 0 0; width:1003px; float:left;">
<tbody>
<tr class="CVGridHeader">
<th scope="col">S No.</th><th scope="col">Division</th><th scope="col">Department</th><th scope="col">User Name</th><th scope="col">Phone No</th><th scope="col">EMP ID</th><th scope="col">Change Password</th><th scope="col">Status</th><th scope="col">Modify</th><th scope="col">Delete</th><th scope="col">Check all <input type="checkbox" name="incactiveall" id="inactiveall" onchange="return inactiveallfun()" /></th>
</tr><?php
$i=1;
while($row = mysql_fetch_array($emplist)) { 
  if($row['Active'] == 1){
  $active = "active";
  }else{
  $active = "inactive";
  }
?>
 <tr class="CVGridItem" id = "showRow2">
 <td><?=$i?>.</td>
 <td><?=$row['division']?></td>
 <td><?=$row['department']?></td>
 <td><?=$row['username']?></td>
 <td><?=$row['mobile']?></td>
 <td><?=$row['EmployeeId']?></td>
 <td><a href="?uid=<?php echo $row['Id']; ?>&#changeps">Change</a></td>

 <td><?=$active?></td>
 <td>
<a href="?uid=<?=$row['Id']?>&#edituser" >Edit</a></td><td>
<a onclick="deletee('<?php echo $row['Id'] ?>')"><img src="../images/close.png" tppabs="http://projectorproductions.com/Redial/images/close.png" /></a></td>
<td scope="col"><input type="checkbox" name="inactive[]" value="<?php echo $row['EmployeeId']?>"/></td>
</tr>
  <?php $i++; } ?>
 </tbody></table>

<input type="submit" class="search_btn" style="float:right; margin:15px 0 0 15px;" name="inactivebtn" value="In Active" />
<input type="submit" class="search_btn" style="float:right; margin:15px 0 0 0;" name="activebtn" value="Active" />
</form>

</div>

</div>


<a href="#x" class="overlay" id="edituser"></a>
<div class="popup" style="padding:10px 20px;">		
<div class="newclient_bg">
<div id="form">
<?php
$id = '';
if(isset($_GET['uid'])) $id = $_GET['uid'];
$result = $database->getUserListById($id);

while($row = mysql_fetch_array($result))
{
?>
<form action="../process.php" method="post" >

<ol>

<p><li><label>Division</label>
<select data-placeholder="Division" name="division" class="chzn-select" tabindex="2" style="width:315px;">
          <option value=""></option> 
          <option value="1">Indoor</option> 
          <option value="2">Outdoor</option>
        </select></li>
</p>

<p><li><label>Department</label>
<select data-placeholder="Department" name="department" class="chzn-select" tabindex="2" style="width:315px;">
          <option value=""></option> 
          <option value="2">CEO</option> 
          <option value="2">CMO</option>
          <option value="2">COO</option>
          <option value="2">HR</option>
          <option value="2">Finance</option>
          <option value="2">Software developers</option>
          <option value="2">PHP developer</option>
          <option value="2">Software trainee</option>
          <option value="2">Software test engineer</option>
          <option value="2">CCE</option>
          <option value="2">PIN</option>
          <option value="2">BDE</option>
        </select></li>
</p>

<p><li><label>Name</label><input type="text" class="input" name="username" /></li></p>
<p><li><label>Phone No</label><input type="text" class="input" name="mobile" /></li></p>
<p><li><label>Email id</label><input type="text" class="input" name="email" /></li></p>
<p><li><label>Employee id</label><input type="text" class="input" name="EmployeeId"/></li></p>
<p><li><label>City</label><select data-placeholder="Select City" name="city" class="chzn-select" tabindex="2" style="width:315px;">
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
        </select></li></p>
<p><li><label>Where in City</label><select data-placeholder="Select Where in City" name="whrereincity" class="chzn-select" tabindex="2" style="width:315px;">
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
        </select></li></p>
<p><li><label>Zone</label>
<select data-placeholder="Zone" name="zone" class="chzn-select" tabindex="2" style="width:315px;">
          <option value=""></option> 
          <option value="2">Central</option>
          <option value="2">East</option> 
          <option value="2">West</option>
          <option value="2">South</option>
          <option value="2">North</option>
        </select></li>
</p>
<p><li><label>User Name</label><input type="text" class="input" name="username" /></li></p>
<input type="text" value="<?php echo $row['Id']; ?>" name="employeeID" />
<input type="hidden" name="subedit" value="1" />

<li class="buttons" style="float:right;"><a href="" tppabs="">
<input type="submit" value="UPDATE" class="input_btn" onclick="return valid()"/></a></li>
</ol>

</form>
<?php } ?>
</div>
</div>
<a class="close" href="#close"></a>
</div>

<a href="#x" class="overlay" id="changeps"></a>
<div class="popup" style="padding:10px 20px;">
<div class="newclient_bg">
<?php
$id = '';
if(isset($_GET['uid'])) $id=$_GET['uid'];
$passresult = $database->getUserListById($id);
$passrow = mysql_fetch_array($passresult);
?>
<div id="form">

<form action="" method="post">
		
<ol>
<p><li><label>New Password</label><input type="password" value="" name="password" class="input" id="password" /></li></p>
<p><li><label>Re Password</label><input type="password" value="" name="repswd1" class="input" id="repswd1" />
<input type="hidden" value="<?=$passrow['username']?>" name="username" /></li></p>
<li class="buttons" style="float:right;">
<span style="color:#FF0000" id="errMsg"></span>
<input name="submit"  type="submit" name="passwordupdate" value="update" onclick="return validateChangePwd()" class="input_btn"/></li>
</ol>
</form>
</div>
</div>


<a class="close" href="#"></a>
        </div>

<script src="../js/chosen.jquery.js" type="text/javascript"></script>
<script type="text/javascript"> $(".chzn-select").chosen(); $(".chzn-select-deselect").chosen({allow_single_deselect:true}); </script>
</body>
</html>
<?php } ?>