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
<a href="messagehistory.html">S & S History</a>|
<a href="appointments.html">Appointments</a>|
<a href="agents/agents_new.html">Bulk</a>|
<a href="buyers.html">Buyers</a>|
<a href="complaintbox.html">Complaints</a>|
<a href="domods.html">Do-Mod's</a>|
<a href="msms.html" class="active">M-SMS</a>
</div>

<div class="top_icons" style="float:left; margin:40px 0 0 250px;">
<a href="properties_add.html"><img src="images/list_property.png" alt="List Property" /><br />List property</a>
</div>


<div style="width:100%; float:left;">

<div class="main_hed"><span>M-SMS</span> </div>

<div class="left_body">

<table class="CVGridView" rules="all" border="1" cellspacing="0" style="margin:; float:left;">

<tbody>
<tr class="CVGridHeader">
<th scope="col">S.NO</th><th scope="col">SMS Template</th><th scope="col">Select</th></tr>
<tr class="CVGridAltItem"><td>1.</td><td>3 BHK, Konark Towers, Dilsukhnagr, Hyderabad 500 060. 3 BHK, Konark Towers, Dilsukhnagr, Hyderabad 500 060.</td><td><input type="radio" name="select" checked="checked" /></td></tr>
<tr class="CVGridAltItem"><td>2.</td><td>3 BHK, Konark Towers, Dilsukhnagr, Hyderabad 500 060. 3 BHK, Konark Towers, Dilsukhnagr, Hyderabad 500 060.</td><td><input type="radio" name="select" /></td></tr>
<tr class="CVGridAltItem"><td>3.</td><td>3 BHK, Konark Towers, Dilsukhnagr, Hyderabad 500 060. 3 BHK, Konark Towers, Dilsukhnagr, Hyderabad 500 060.</td><td><input type="radio" name="select" /></td></tr>
<tr class="CVGridAltItem"><td>4.</td><td>3 BHK, Konark Towers, Dilsukhnagr, Hyderabad 500 060. 3 BHK, Konark Towers, Dilsukhnagr, Hyderabad 500 060.</td><td><input type="radio" name="select" /></td></tr>
</tbody></table>

<div id="form">
<ol>
<p><li><label>SMS</label><textarea class="textarea">
3 BHK, Konark Towers, Dilsukhnagr, Hyderabad 500 060. 3 BHK, Konark Towers, Dilsukhnagr, Hyderabad 500 060.
</textarea></li></p>

<p><li><label>Phone No <span class="star">*</span></label><input class="input" /></li></p>
<p><li><label>Email ID</label><input class="input" /></li></p>
<li class="buttons" style="float:right;"><a href="#"><input  type="submit" value="SEND" class="input_btn"/></a></li>
</ol>
</div>


</div>


</div>

</div>


<a href="#x" class="overlay" id="edit"></a>
<div class="popup">


<div class="search_results" style="margin:0px;">

<div class="div star">***</div>
<div class="div userid">PRRSod190</div>
<img src="images/rd.png" align="left" style="margin:5px 0 0 10px;" />
<img src="images/icon_1.png" align="left" style="margin:5px 0 0 10px;" />
<img src="images/icon_2.png" align="left" style="margin:5px 0 0 10px;" />
<img src="images/icon_3.png" align="left" style="margin:5px 0 0 10px;" />
<img src="images/icon_4.png" align="left" style="margin:5px 0 0 10px;" />
<img src="images/icon_5.png" align="left" style="margin:5px 0 0 10px;" />
<img src="images/icon_6.png" align="left" style="margin:5px 0 0 10px;" />
<br /><br />
<div class="div requirment">redial65</div>
<div style="float:left;">
<div class="div propertytype">DuplexHouse</div>
<div class="div area">880 Sq.yrds</div>
</div>
<div style="float:left;">
<div class="div city">Hyderabad</div>
<div class="div whareincity">Champapet</div>
</div>
<div style="float:left;">
<div class="div price">1.6 Lakh(s)</div>
<div class="div contactno">5 Bed rooms</div>
</div>
<div style="float:left;"><div class="div price">Naresh</div>
<div class="div whareincity">9705774932</div>
</div>
<div style="float:left;"><div class="div price" style="width:360px;">naresh.bond997@gmail.com</div></div>
<div style="float:left;"><div class="div whareincity">Owner</div><div class="div price">1500 Rs</div></div>
<div style="float:left;"><div class="div contactno">Cash</div><div class="div price">123456</div></div>


</div>

<a class="close" href="#close"></a>
        </div>


<a href="#x" class="overlay" id="history"></a>
<div class="popup">

<div class="search_results3" style="margin:0px;">
<div style="float:left;">
<p>Hold for verification - 01/02/12 - 10:50 AM<br />
verified - 02/02/12 - 3:00 PM<br />
Active(paid) - 05/02/12 -  11:00 AM<br />
De active(paid) -  05/03/12 - 10:00 AM
</p>

</div>
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