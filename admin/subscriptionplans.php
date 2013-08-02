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

<div class="r_menu2"><a href="subscriptionplans.html" class="active">Add plan</a><a href="subscriptionplans_view.html">View plans</a><a href="subscriptionplans_discount.html">Discount</a></div>

<div style="width:100%; float:left;">

<div class="main_hed2"><img src="../images/p_sicon.png" align="absmiddle" /> &nbsp; Add Subscription Plan</div>
<?php 
if(isset($_POST['submit'])){
	
	$planname = trim($_POST['planname']);
	$priority = trim($_POST['priority']);
	$amount = trim($_POST['amount']);
	
$sql = $database->query("select * from subcriptionplanes where amount='$amount' ");
    if(mysql_num_rows($sql)) {
    echo "Amount Already exist.";
    }
else {
$query = $database->query("insert into subcriptionplanes values('','$planname','$priority','$amount')");
header("Location:subscriptionplans_view.php?p=$planname");
}

}
?>
<form action="" method="post">
<div id="form">
<ol>
<!--<p><li><label>Medium</label>
<select data-placeholder="Medium" class="chzn-select" tabindex="2" style="width:315px;">
          <option value=""></option> 
          <option value="2">Phone</option> 
          <option value="2">Internet</option> 
          <option value="2">Print</option> 
          <option value="2">Electronic</option>
        </select></li>
</p>-->
<p><li><label>Plan Name</label><input class="input" name="planname"/></li></p>
<p><li><label>Priority</label><input class="input" name="priority" /> (1, 2, 3, 4, 5, 6, 7, 8, 9, 10)</li></p>

<p><li><label>Amount</label><input class="input" name="amount"/></li></p>

<!--<p><li><label>Discount For Bulk</label>(0 - 10) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input class="input2" /> %</li></p>
<p><li><label></label>(11 - 50) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input class="input2" /> %</li></p>
<p><li><label></label>(51 - 100) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input class="input2" /> %</li></p>
<p><li><label></label>(101 - 200) &nbsp;&nbsp;&nbsp; <input class="input2" /> %</li></p>
<p><li><label></label>(201 - 500) &nbsp;&nbsp;&nbsp; <input class="input2" /> %</li></p>
<p><li><label></label>(501 - 1000) &nbsp; <input class="input2" /> %</li></p>-->

<li class="buttons" style="float:right;"><a href="#"><input type="submit" name="submit" value="ADD" class="input_btn"/></a></li>
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