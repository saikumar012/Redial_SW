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

<div class="r_menu2"><a href="city.html" class="active">Add City</a><a href="citylist.html">City's List</a><a href="whereincity.html">Where in City</a><a href="whereincitylist.html">Where in City List</a></div>

<div style="width:100%; float:left;">

<div class="main_hed2"><img src="../images/p_sicon.png" align="absmiddle" /> &nbsp; City</div>
<?php 
if(isset($_POST['submit'])){
$city = $_POST['city'];
$query = $database->query("select * from city where city='$city'");
if(mysql_num_rows($query) > 0){
echo "City name already exist.";
} else {
$query = $database->query("insert into city(city) values('$city')");
header("Location:citylist.php");
}
}
?>
<form action="" method="post">
<div id="form">
<ol>
<p><li><label>City</label><input type="text" class="input" name="city" /></li></p>
<p><li class="buttons" style="float:right;"><input  type="submit" value="ADD" name="submit" class="input_btn"/></li></p>
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