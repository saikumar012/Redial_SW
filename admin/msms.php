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

<link href="../css/modal.css" rel="stylesheet" type="text/css" />

</head>

<body>
<div id="warp">

<div class="logo"><a href="home.html"><img src="../images/logo.png" alt="Redail Logo" /></a></div>

<span style="float:right; font-size:11px; padding-top:3px; width:700px; text-align:right;">&nbsp;&nbsp;&nbsp; Admin &nbsp;&nbsp;|&nbsp;&nbsp; <a href="changeps.html">Change Password</a> &nbsp;&nbsp;|&nbsp;&nbsp; <a href="#">Logout</a></span>

<div class="r_menu2"><a href="msms.html" class="active">Add Template</a><a href="msmslist.html">View Template</a></div>

<div style="width:100%; float:left;">

<div class="main_hed2"><img src="../images/p_sicon.png" align="absmiddle" /> &nbsp; Add Template</div>
<?php
if(isset($_POST['submit']))
{
$description = $_POST['description'];
$database->query("insert into template values('','$description')");
header("location:msmslist.php");
}
?>
<form action="" method="post">
<div id="form">
<ol>
<p><li><label>Type</label><textarea class="input" name="description"></textarea></li></p>
<p><li class="buttons" style="float:right;"><input type="submit" name="submit" value="ADD" class="input_btn"/></li></p>
</ol>
</div>
</form>

</div>

</div>


<a href="#x" class="overlay" id="Modify"></a>
<div class="popup" style="padding:10px 20px;">		

<div id="form" class="faqs">
<ol>
<p><li><label>List Of Executives</label>
<select data-placeholder="Executives" class="chzn-select" tabindex="2" style="width:315px;">
          <option value=""></option> 
          <option value="2">EMP 01</option> 
          <option value="2">EMP 02</option>
        </select>
</li></p>

<p><li><label>Assign Job</label>
<select data-placeholder="Assign Job" class="chzn-select" tabindex="2" style="width:315px;">
          <option value=""></option> 
          <option value="2">EMP 01</option> 
          <option value="2">EMP 02</option>
        </select>
</li></p>

<p><li><label>Appointment Date</label><input type="text" class="input" /></li></p>
<p><li><label>Plan Choosed</label>
<select data-placeholder="Plan Choosed" class="chzn-select" tabindex="2" style="width:315px;">
          <option value=""></option> 
          <option value="2">Basic</option> 
          <option value="2">Premium</option>
          <option value="2">Platinum</option>
          <option value="2">Free</option>
        </select>
</li></p>
<p><li><label></label><input type="text" class="input" /></li></p>

<p><li><label>Description</label><textarea class="textarea"></textarea><br /><span class="description_count"> 125</span>
</li></p>


<p><li class="buttons" style="float:right;"><a href="properties2_post.html"><input  type="submit" value="MODIFY" class="input_btn"/></a></li></p>

</ol>
</div>	

<a class="close" href="#close"></a>
</div>



<script src="../js/chosen.jquery.js" type="text/javascript"></script>
<script type="text/javascript"> $(".chzn-select").chosen(); $(".chzn-select-deselect").chosen({allow_single_deselect:true}); </script>
</body>
</html>
<?php } ?>