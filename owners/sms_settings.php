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

<link href="../css/modal.css" rel="stylesheet" type="text/css" />


</head>

<body>
<div id="warp">

<div class="logo"><a href="../index_properties.php"><img src="../images/logo.png" alt="Redail Logo" /></a></div>

<span style="float:right; font-size:11px; padding-top:3px;">&nbsp;&nbsp;&nbsp; Naresh &nbsp;&nbsp;|&nbsp;&nbsp; <a href="#">Logout</a></span>
<div class="top_menu">
<a href="../messagehistory.php">S & S History</a>|
<a href="../appointments.php">Appointments</a>|
<a href="agents_new.php" class="active">Bulk</a>|
<a href="../buyers.php">Buyers</a>|
<a href="../complaintbox.php">Complaints</a>|
<a href="../domods.php">Do-Mod's</a>|
<a href="../msms.php">M-SMS</a>
</div>

<div class="main_menu">
<a href="properties2.php">Residential</a>
<a href="#">Commercial</a>
<a href="agriculture2.php" style="border:none;">Agriculture</a>
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

<p><li><label>Phone No</label><input class="input" /></li></p>

<li class="buttons" style="float:right;"><a href="#"><input  type="submit" value="SEND" class="input_btn"/></a></li>
</ol>
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
<a class="close" href="#close"></a>
</div>




<script src="../js/chosen.jquery.js" type="text/javascript"></script>
<script type="text/javascript"> $(".chzn-select").chosen(); $(".chzn-select-deselect").chosen({allow_single_deselect:true}); </script>
</body>
<?php
}
?>
