<?php
include("../include/session.php");
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
<link rel="stylesheet" type="text/css" href="../css/style.css" />

<link rel="stylesheet" href="../css/chosen2.css" />
<script src="../js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="validateAdmin.js"></script>
<link href="../css/modal.css" rel="stylesheet" type="text/css" />

</head>

<body>
<div id="warp">

<div class="logo"><a href="home.html"><img src="../images/logo.png" alt="Redail Logo" /></a></div>

<span style="float:right; font-size:11px; padding-top:3px; width:700px; text-align:right;">&nbsp;&nbsp;&nbsp; Admin &nbsp;&nbsp;|&nbsp;&nbsp; <a href="changeps.html">Change Password</a> &nbsp;&nbsp;|&nbsp;&nbsp; <a href="#">Logout</a></span>

<div class="r_menu2"><a href="type.html" class="active">Add Property Type</a><a href="typelist.html">Properties List</a></div>

<div style="width:100%; float:left;">

<div class="main_hed2"><img src="../images/p_sicon.png" align="absmiddle" /> &nbsp; Add Property Type</div><span id="errMsg" style="color:#FF0000; font-size:12px"></span>
<?php
if(isset($_POST['submit']))
{
$category = $_POST['category'];
$type = $_POST['type'];
$sql = $database->query("select * from propertytype where category = '$category' and type = '$type' ");
if(mysql_num_rows($sql)>0)
{
echo "Propert type Already exist.";
} else { 
$database->query("insert into propertytype values ('','$category','$type')");
header("location:typelist.php?property=$category");
}
}
?>
<form action="" method="post" onsubmit="return validatePropertyType()">
<div id="form">
<ol>

<p><li><label>Category</label>
<select data-placeholder="Select Category" name= "category" id="category" class="chzn-select" tabindex="2" style="width:315px;">
          <option value="0"></option> 
          <option value="Residential">Residential</option> 
          <option value="Commercial">Commercial</option> 
          <option value="Agriculture">Agriculture</option> 
          
        </select></li></p>

<p><li><label>Type</label><input type="text" class="input" id="ptype" name="type"/></li></p>

<p><li class="buttons" style="float:right;"><input type="submit" name="submit" value="ADD" class="input_btn"></li></p>
</ol>
</div>
</form>
</div>

</div>



<script src="../js/chosen.jquery.js" type="text/javascript"></script>
<script type="text/javascript"> $(".chzn-select").chosen(); $(".chzn-select-deselect").chosen({allow_single_deselect:true}); </script>
</body>
</html>
<?php } ?>