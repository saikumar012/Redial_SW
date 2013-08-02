// JavaScript Document
function validateuser(){
	var uname = document.getElementById('uname').value;
//	alert(uname);
	if(trim(uname) == "" || trim(uname)== null){
		document.getElementById('errMsg').innerHTML = "* please enter user name";
		document.getElementById('errMsg').style.display = '';
		return false;
	}
	var email = document.getElementById('email').value;
	if(trim(email) == "" || trim(email)== null){
		document.getElementById('errMsg').innerHTML = "* please enter user email";
		document.getElementById('errMsg').style.display = '';
		return false;
	}
	var mailrgx = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/;
	if(!email.match(mailrgx)){
		document.getElementById('errMsg').innerHTML = "* please enter valid email";
		document.getElementById('errMsg').style.display = '';
		return false;
	}
	var empid = document.getElementById('empid').value;
	if(trim(empid) == "" || trim(empid) == null){
		document.getElementById('errMsg').innerHTML = "* please enter employee id";
		document.getElementById('errMsg').style.display = '';
		return false;
	}
	var password = document.getElementById('password').value;
	if(trim(password) == ""|| trim(password) == null){
		document.getElementById('errMsg').innerHTML = "* please enter password";
		document.getElementById('errMsg').style.display = '';
		return false;
	}
	/*if(!validPassword(password)){
		document.getElementById('errMsg').innerHTML = "* please enter  password";
		document.getElementById('errMsg').style.display = '';
		return false;
	}*/
	var repswd1 = document.getElementById('repswd1').value;
	if(trim(repswd1) == ""|| trim(repswd1) == null){
		document.getElementById('errMsg').innerHTML = "* please enter retype password";
		document.getElementById('errMsg').style.display = '';
		return false;
	}
	if(password != repswd1){
		document.getElementById('errMsg').innerHTML = "* password and retype password should match";
		document.getElementById('errMsg').style.display = '';
		return false;
	}
	var phone = document.getElementById('phone').value;
	if(trim(phone) == null || trim(phone) == ""){
		document.getElementById('errMsg').innerHTML = "* please enter phone number";
		document.getElementById('errMsg').style.display = '';
		return false;
	}
	var phnrgx = /^([987]{1})(\d{1})(\d{8})$/;
	if(!phone.match(phnrgx)){
		document.getElementById('errMsg').innerHTML = "* please enter a valid phone number";
		document.getElementById('errMsg').style.display = '';
		return false;
	}
	var active = document.getElementById('active').value;
	if(active == 0){
		document.getElementById('errMsg').innerHTML = "* please select active mode";
		document.getElementById('errMsg').style.display = '';
		return false;
	}
	checkuserAvailabe(uname);
}

function validateName(name){
	var namergx = /^[a-zA-Z0-9 ]+$/;
		if(!name.match(namergx)){
			return false;
		}
}
function validateMobile(mbl){
	var phnrgx = /^([987]{1})(\d{1})(\d{8})$/;
	if(!mbl.match(phprgx)){
		return false;
	}
}
function validateEmail(email){
	var mailrgx = /^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/;
	if(!email.match(mailrgx)){
		return false;
	}
}
function validateNumber(num){
	var numrgs = /^[0-9]+$/;
	if(!num.match(numrgx)){
				
		return false;
	}
}
function trim(stringToTrim) {
	return stringToTrim.replace(/^\s+|\s+$/g,"");
}

function checkuserAvailabe(uname,id)
{
	var value = uname;

var result = '';
var dataString = 'id='+ value+'&valid=username';

$.ajax({
type: "POST",
url: "ajax_validations.php",
data: dataString,
cache: false,
success: function(html)
{
console.log(html);
if(html == "1"){
	document.getElementById('errMsg').innerHTML = "* username is already exist.";
	document.getElementById('errMsg').style.display = '';
	document.getElementById('uname').focus();
	return false;
}else{
	document.getElementById('errMsg').innerHTML = "";
}
} 
});
}
function checkEmpAvailabe(uname,id)
{
var value = uname;
var result = '';
var dataString = 'id='+ value+'&valid=userid';

$.ajax({
type: "POST",
url: "ajax_validations.php",
data: dataString,
cache: false,
success: function(html)
{
if(html == "1"){
	console.log(html);
	document.getElementById('errMsg').innerHTML = "* Employee Id is already exist.";
	document.getElementById('errMsg').style.display = '';
	document.getElementById('empid').focus();
	return false;
}else{
	document.getElementById('errMsg').innerHTML = "";
}
} 
});
}
function validateCity(){
var value = document.getElementById('city').value;
if(trim(value) == "" || trim(value)== null){
	document.getElementById('errMsg').innerHTML = "please enter city name";
	document.getElementById('errMsg').style.display = '';
	return false;
}
var result = '';
var dataString = 'id='+ value+'&valid=city';

$.ajax({
type: "POST",
url: "ajax_validations.php",
data: dataString,
cache: false,
success: function(html)
{
console.log(html);
if(html == "1"){
document.getElementById('errMsg').innerHTML = "cityname already exist.Please change city Name";
document.getElementById('errMsg').style.display = '';
document.getElementById('city').focus();
return false;
}
} 
});
console.log(result);
}

function validatePropertyType(){
document.getElementById('errMsg').innerHTML = "";
var value = document.getElementById('ptype').value;
if(trim(value) == "" || trim(value)== null){
document.getElementById('errMsg').innerHTML = "please enter Property Type";
document.getElementById('errMsg').style.display = '';
return false;
}else{
var result = '';
var dataString = 'id='+ value+'&valid=ptype';

$.ajax({
type: "POST",
url: "ajax_validations.php",
data: dataString,
cache: false,
success: function(html)
{
if(html == "1"){
document.getElementById('errMsg').innerHTML = "property type already exist.";
document.getElementById('errMsg').style.display = '';
document.getElementById('ptype').focus();
return false;
}
} 
});
}
}

function validateLocation(){
var value = document.getElementById('City').value;
var location = document.getElementById('location').value;
if(value == 0){
document.getElementById('errMsg').innerHTML = "Please select a city.";
document.getElementById('errMsg').style.display = '';
return false;
}
if(location == "" || location == null){
document.getElementById('errMsg').innerHTML = "Please enter location.";
document.getElementById('errMsg').style.display = '';
return false;	
}
var result = '';
var dataString = 'id='+value+'&loc='+location+'&valid=loc';

$.ajax({
type: "POST",
url: "ajax_validations.php",
data: dataString,
cache: false,
success: function(html)
{
if(html == "1"){
console.log(html);
document.getElementById('errMsg').innerHTML = "Location already exist in this City.";
document.getElementById('errMsg').style.display = '';
document.getElementById('ptype').focus();
return false;
} 
}
});
}
function validateMinPriceRange(){
	
	document.getElementById('errMsg').innerHTML = "";
	var value = document.getElementById('min').value;
	var ptype = document.getElementById('py').value;
	if(value == "" || value == null){
		document.getElementById('errMsg').innerHTML = "Please enter Minimum Price Range.";
		document.getElementById('errMsg').style.display = '';
		return false;
	}if(isNaN(value)){
		document.getElementById('errMsg').innerHTML = "Please enter Proper Minimum Price Range.";
		document.getElementById('errMsg').style.display = '';
		return false;
	}if(ptype == 0){
		document.getElementById('errMsg').innerHTML = "Please select price Type";
		document.getElementById('errMsg').style.display = '';
		return false;
	}
	
}

function passwordvalidate(){
	var oldpwd = document.getElementById('oldpwd').value;		
	var pwd = document.getElementById('newpwd').value;
	var rpwd = document.getElementById('repwd').value;
	if(trim(oldpwd) == null || trim(oldpwd) == ""){
		document.getElementById('errMsg').innerHTML = "Please enter old Password.";
		return false;
	}
	if(trim(pwd) == null || trim(pwd) == ""){
		document.getElementById('errMsg').innerHTML = "Please enter new Password.";
		return false;
	}
	if(trim(pwd) != trim(rpwd)){
		document.getElementById('errMsg').innerHTML = "Password and Retype Password must be same.";
		return false;
	}
}

function  validateChangePwd(){
	var pwd = document.getElementById('password').value;
	var rpwd = document.getElementById('repswd1').value;
	if(trim(pwd) == "" || trim(pwd) == null){
		document.getElementById('errMsg').innerHTML = "Please enter new Password";
		return false;
	}
	if(trim(rpwd) == "" || trim(rpwd) == null){
		document.getElementById('errMsg').innerHTML = "Please Re enter Password";
		return false;
	}
	
	if(pwd != rpwd){
		document.getElementById('errMsg').innerHTML = "New Password and Retype Password Must be same.";
		return false;
	}
}
$(document).ready(function(){
	$('select[name="status"]').change(function() {
		if($('select[name="status"]').val() == 'S'){
			$('select[name="subtype"]').empty();
			var optionsAsString = "";
			optionsAsString +=  "<option value='S'>select</option>"+
								"<option value='1'>1</option>"+
							    "<option value='2'>2</option>"+
								"<option value='3'>3</option>"+
								"<option value='4'>Free</option>";
			$( 'select[name="subtype"]' ).append( $( optionsAsString ) );
		}
		if($('select[name="status"]').val() == 0){
			$('select[name="subtype"]').empty();
			var optionsAsString = "";
			optionsAsString +=  "<option value='4'>Free</option>";
			$( 'select[name="subtype"]' ).append( $( optionsAsString ) );
		}
		if($('select[name="status"]').val() == 1){
			$('select[name="subtype"]').empty();
			var optionsAsString = "";
			optionsAsString +=  "<option value='4'>Free</option>";
			$( 'select[name="subtype"]' ).append( $( optionsAsString ) );
		}
		if($('select[name="status"]').val() == 2){
			$('select[name="subtype"]').empty();
			var optionsAsString = "";
			optionsAsString +=  "<option value='1'>1</option>"+
							    "<option value='2'>2</option>"+
								"<option value='3'>3</option>";
			$( 'select[name="subtype"]' ).append( $( optionsAsString ) );
		}
		if($('select[name="status"]').val() == 3){
			$('select[name="subtype"]').empty();
			var optionsAsString = "";
			optionsAsString +=  "<option value='1'>1</option>"+
							    "<option value='2'>2</option>"+
								"<option value='3'>3</option>";
			$( 'select[name="subtype"]' ).append( $( optionsAsString ) );
		}
	});
	
});

function inactiveallfun(){
	if($('#inactiveall').is(':checked')){
		$('input:checkbox').attr('checked',true);
	}else{
		$('input:checkbox').attr('checked',false);
	}
 
}