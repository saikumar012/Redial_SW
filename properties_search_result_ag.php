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
<li><a href="index_properties.php" class="active">Properties</a></li>
<li class="button-color-1"><a href="index_projects.php">Projects</a></li>		
</ul>

<div style="width:100%; float:left;">

<div class="main_hed" style="margin-top:0px;">Properties > Agriculture > Search List > <span>Search Result</span> <!--<div class="inner_menu"><a href="#" class="active">Residential</a>|<a href="#">Commercial</a>|<a href="#" style="padding-right:0px;">Agriculture</a>
</div>--></div>

<div class="left_body">


<table class="CVGridView" rules="all" border="1" cellspacing="0" style="margin:15px 0 0 0; float:left;">
<tbody>
<tr class="CVGridHeader">
<th scope="col">S No.</th><th scope="col">Property Id</th><th scope="col">Property Information</th><th scope="col">Subscription type</th><th scope="col">Status</th>
</tr>
<tr class="CVGridItem"><td>1.</td><td>PRRStx174</td><td>Hyderabad, B N Reddy nagar, 9700593896</td><td>Platinum</td><td>Active.</td></tr>
<tr class="CVGridItem"><td>2.</td><td>PRRStx174</td><td>Hyderabad, B N Reddy nagar, 9700593896</td><td>Platinum</td><td>Active.</td></tr>
<tr class="CVGridItem"><td>3.</td><td>PRRStx174</td><td>Hyderabad, B N Reddy nagar, 9700593896</td><td>Platinum</td><td>Active.</td></tr>
<tr class="CVGridItem"><td>4.</td><td>PRRStx174</td><td>Hyderabad, B N Reddy nagar, 9700593896</td><td>Platinum</td><td>Active.</td></tr>


</tbody></table>


<form method="post" action="#" style="margin-top:15px; float:left;">
<input type="text" class="input" name="name" id="name" style="float:left; font-size:12px; margin:0 10px 0 0;" value="Enter Customer Name" onfocus="if(this.value =='Enter Customer Name' ) this.value=''" onblur="if(this.value=='') this.value='Enter Customer Name'" />
<input type="text" class="input" name="phone" id="phone" style="float:left; font-size:12px; " value="Enter Mobile No" onfocus="if(this.value =='Enter Mobile No' ) this.value=''" onblur="if(this.value=='') this.value='Enter Mobile No'" />
<input type="text" class="input" name="email" id="email" style="float:left; margin:0 10px; font-size:12px;" value="Enter Email id" onfocus="if(this.value =='Enter Email id' ) this.value=''" onblur="if(this.value=='') this.value='Enter Email id'" />
<input type="submit" name="submit" class="search_btn" value="SEND" onclick="return validatePhn();" style="float:left; margin:2px 0;" />
<p class="succ" style=" margin:5px 0 10px 10px;">SMS Sent Successfully</p>
<p style="float:left; font-size:12px; padding:0px; margin:5px 0px 10px 0;"><input type="checkbox" /> Dont send SMS to sellers</p>

</form>

<!--<div style="margin:15px 28px 0 0; float:right;"><a href="properties_search_result_sms.php"><input type="submit" value="Go" class="search_btn" name="Go"/></a></div>-->

</div>

<div class="right_body">
<div class="search_bg">
<input type="text" class="src_input" onfocus="if(this.value =='Search ID, Phone & Name' ) this.value=''" onblur="if(this.value=='') this.value='Search ID, Phone & Name'" value="Search ID, Phone & Name" />
<input type="button" class="src_btn" />
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