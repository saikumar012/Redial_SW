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


<link href="css/modal.css" rel="stylesheet" type="text/css" />

</head>

<body>
<div id="warp">

<div class="logo"><a href="index_properties.html"><img src="images/logo.png" alt="Redail Logo" /></a></div>

<span style="float:right; font-size:11px; padding-top:3px;">&nbsp;&nbsp;&nbsp; Naresh &nbsp;&nbsp;|&nbsp;&nbsp; <a href="#">Logout</a></span>
<div class="top_menu">
<a href="messagehistory.html" class="active">S & S History</a>|
<a href="appointments.html">Appointments</a>|
<a href="agents/agents_new.html">Bulk</a>|
<a href="buyers.html">Buyers</a>|
<a href="complaintbox.html">Complaints</a>|
<a href="domods.html">Do-Mod's</a>|
<a href="msms.html">M-SMS</a>
</div>

<div class="top_icons" style="float:left; margin:40px 0 0 250px;">
<a href="properties_add.html"><img src="images/list_property.png" alt="List Property" /><br />List property</a>
</div>


<div style="width:100%; float:left;">

<div class="main_hed"><span>SMS & Search History</span> </div>

<div class="left_body">

<div id="form">
<ol>
<p><li><label>Listing Type</label>
<select data-placeholder="Listing Type" class="chzn-select" tabindex="2" style="width:315px;">
          <option value=""></option> 
          <option value="2">Properties</option> 
          <option value="2">Projects</option> 
          <option value="2">M-SMS</option> 
        </select></li>
</p>
<p><li><label>Name</label><input class="input" /></li></p>
<p><li><label>Phone No</label><input class="input" /></li></p>
<p><li><label>Employee Name</label>
<select data-placeholder="Employee Name" class="chzn-select" tabindex="2" style="width:315px;">
          <option value=""></option> 
          <option value="2">Name</option> 
          <option value="2">Name</option> 
          <option value="2">Name</option> 
          <option value="2">Name</option>
        </select></li>
</p>
<p><li><label>Date </label><input class="input2"  value="Form Date" onfocus="if(this.value =='Form Date' ) this.value=''" onblur="if(this.value=='') this.value='Form Date'"/> To 
<input class="input2" value="To Date" onfocus="if(this.value =='To Date' ) this.value=''" onblur="if(this.value=='') this.value='To Date'" /></li></p>

<li class="buttons" style="float:right;"><a href="#"><input  type="submit" value="SEARCH" class="input_btn"/></a></li>
</ol>
</div>


<table class="CVGridView" rules="all" border="1" cellspacing="0" style="margin:; float:left;">

<tbody>
<tr class="CVGridHeader">
<th scope="col">S.NO</th><th scope="col">ID</th><th scope="col">Name</th><th scope="col">Phone No</th><th scope="col">Date</th><th scope="col">SMS LIST</th><th>Search History</th><th scope="col">Sent By</th></tr>
<tr class="CVGridAltItem"><td>1.</td><td>RE 01</td><td>Naresh</td><td>9705774932</td><td>12-4-2012</td><td><a href="#view">Message</a></td><td><a href="properties_search.html">Search History</a></td><td>Rajesh</td></tr>

<tr class="CVGridAltItem"><td>2.</td><td>RE 01</td><td>Naresh</td><td>9866404000</td><td>12-4-2012</td><td><a href="#view">Message</a></td><td><a href="properties_search.html">Search History</a></td><td>Rajesh</td></tr>

<tr class="CVGridAltItem"><td>3.</td><td>RE 01</td><td>Naresh</td><td>8885252124</td><td>12-4-2012</td><td><a href="#view">Message</a></td><td><a href="properties_search.html">Search History</a></td><td>Rajesh</td></tr>

<tr class="CVGridAltItem"><td>4.</td><td>RE 01</td><td>Naresh</td><td>9705774932</td><td>12-4-2012</td><td><a href="#view">Message</a></td><td><a href="properties_search.html">Search History</a></td><td>Rajesh</td></tr>

</tbody></table>

<div class="pagination" style="float:left;">
<a href="#" class="numbers">Prev</a>
<a href="#" class="numbers active">1</a>
<a href="#" class="numbers">2</a>
<a href="#" class="numbers">3</a>
<a href="#" class="numbers">4</a>
<a href="#" class="numbers">Next</a>
</div>

</div>

</div>

</div>


<a href="#x" class="overlay" id="view"></a>
<div class="popup">		
	
<ol style="font-size:12px; line-height:20px; padding:0px; margin:15px 20px 20px 25px;">
<strong>“Dear customer, here is your requested information  </strong><br />
DuplexHouse,440 Sq.yrds,87 Lacks,redial48,Champapet,Hyderabad Ph:9700593896 ID:PRRSsy171<br />Independent House,250 Sq.yrds,40 Lacks,premium,kukatpalli,Hyderabad Ph:9700593896 ID:PRRScd121<br />DuplexHouse,600 Sq.yrds,95 Lacks,redial25,Lbnagar,Hyderabad Ph:9700593896 ID:PRRSlb94<br />Independent House,1000 Sq.yrds,11 Lacks,gfji sigjs,Dilsukhnagar, Ph:9705774932 ID:PRRSez40<br /><br />

For more details dial 040-22222224
</ol>
<div id="form">
<ol>
<p><li class="buttons" style="float:right; margin:0 0 20px 20px;"><input type="submit" class="input_btn" value="Resend" /> <a href="properties_search_result.html"><input type="submit" class="input_btn" value="Forward" /></a></li></ol></p>
</ol>
</div>

<a class="close" href="#close"></a>
</div>


<script src="js/chosen.jquery.js" type="text/javascript"></script>
<script type="text/javascript"> $(".chzn-select").chosen(); $(".chzn-select-deselect").chosen({allow_single_deselect:true}); </script>
</body>
</html>
<?php
}
?>