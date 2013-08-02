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

<div class="r_menu2"><a href="subscriptionplans.html">Add plan</a><a href="subscriptionplans_view.html">View plans</a><a href="subscriptionplans_discount.html" class="active">Discount</a></div>
<div class="r_menu2"><a href="subscriptionplans_discount.html" class="active">Bulk</a><a href="subscriptionplans_discount3.html">Multiple Months</a></div>

<div style="width:100%; float:left;">

<div class="main_hed2"><img src="../images/p_sicon.png" align="absmiddle" /> &nbsp; Bulk Discount</div>
<?php
$sql = "select * from discunt where sno = 1";
if(isset($_POST['submit']))
{
$disc_first = $_POST['disc_first'];
$disc_secn = $_POST['disc_secn'];
$disc_third = $_POST['disc_third'];
$disc_fourth = $_POST['disc_fourth'];
$disc_fifth = $_POST['disc_fifth'];
$disc_six = $_POST['disc_six'];
$sql = "select * from discunt where sno = 1";
$database->query("update discunt set disc_first = '$disc_first',disc_first = '$disc_first',disc_secn = '$disc_secn',disc_third = '$disc_third',disc_fourth = '$disc_fourth',disc_fifth = '$disc_fifth',disc_six = '$disc_six',category = 'bulk' where sno = 1 ");
header("location:subscriptionplans_discount.php");
}
$query = $database->query($sql);
?>
<form action="" method="post">
<?php $row=mysql_fetch_array($query); ?>
<div id="form">
<ol>
<p><li><label>Discount For Bulk</label>(2 - 10) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" class="input2" name="disc_first" value="<?=$row['disc_first']?>"/> %</li></p>
<p><li><label></label>(11 - 50) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" class="input2" name="disc_secn" value="<?=$row['disc_secn']?>" /> %</li></p>
<p><li><label></label>(51 - 100) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" class="input2" name="disc_third" value="<?=$row['disc_third']?>"/> %</li></p>
<p><li><label></label>(101 - 200) &nbsp;&nbsp;&nbsp; <input type="text" class="input2" name="disc_fourth" value="<?=$row['disc_fourth']?>"/> %</li></p>
<p><li><label></label>(201 - 500) &nbsp;&nbsp;&nbsp; <input type="text" class="input2" name="disc_fifth" value="<?=$row['disc_fifth']?>"/> %</li></p>
<p><li><label></label>(501 - 1000) &nbsp; <input type="text" class="input2" name="disc_six" value="<?=$row['disc_six']?>"/> %</li></p>
<input type="hidden" class="input2" name="category" value="bulk" />
<li class="buttons" style="float:right;"><input type="submit" name="submit" value="SAVE" class="input_btn"/></li>
</ol>
</div>
</form>
</div>

</div>


<a href="#x" class="overlay" id="Modify"></a>
<div class="popup" style="padding:10px 20px;">		

<div id="form" class="faqs">
<ol>
<p><li><label>Medium</label>
<select data-placeholder="Medium" class="chzn-select" tabindex="2" style="width:315px;">
          <option value=""></option> 
          <option value="2">Phone</option> 
          <option value="2">Internet</option> 
          <option value="2">Print</option> 
          <option value="2">Electronic</option>
        </select></li>
</p>
<p><li><label>Plan Name</label><input class="input" /></li></p>
<p><li><label>Priority</label><input class="input" /> (1, 2, 3, 4, 5, 6, 7, 8, 9, 10)</li></p>

<p><li><label>Amount</label><input class="input" /></li></p>

<p><li><label>Discount For Bulk</label>(0 - 10) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input class="input2" /> %</li></p>
<p><li><label></label>(11 - 50) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input class="input2" /> %</li></p>
<p><li><label></label>(51 - 100) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input class="input2" /> %</li></p>
<p><li><label></label>(101 - 200) &nbsp;&nbsp;&nbsp; <input class="input2" /> %</li></p>
<p><li><label></label>(201 - 500) &nbsp;&nbsp;&nbsp; <input class="input2" /> %</li></p>
<p><li><label></label>(501 - 1000) &nbsp; <input class="input2" /> %</li></p>

<li class="buttons" style="float:right;"><a href="#"><input  type="submit" value="UPDATE" class="input_btn"/></a></li>
</ol>
</div>	

<a class="close" href="#close"></a>
</div>




<script src="../js/chosen.jquery.js" type="text/javascript"></script>
<script type="text/javascript"> $(".chzn-select").chosen(); $(".chzn-select-deselect").chosen({allow_single_deselect:true}); </script>
</body>
</html>
<?php } ?>