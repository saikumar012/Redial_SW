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

<script type="text/javascript" src="../js/jquery1.4.js"></script>
<script type="text/javascript">
/* accessible */
	$(document).ready(function() {
		$('.faqs h3').each(function() {
			var tis = $(this), state = false, answer = tis.next('div').slideUp();
			tis.click(function() {
				state = !state;
				answer.slideToggle(state);
				tis.toggleClass('active',state);
			});
		});
	});
</script>

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

<div class="r_menu2">
<a href="agents_new.php" class="active">Owners</a>
<a href="../agents/agents_new.php">Agents</a>
<a href="../builders/agents_new.php" style="border:none;">Builders</a>
</div>




<div style="width:100%; float:left;">
<div class="main_hed">Bulk > Owners  > <span>Add New Set</span> <div class="inner_menu"><a href="agents_new.php">Add New</a>|<a href="agents_existing.php">Add to Existing</a></div></div>




<div id="form" class="faqs">
<ol>

<table border="0" cellpadding="0" cellspacing="0" class="bulkGridView" style="margin-top:10px;">

<tr class="bulkGridHeader">
<th colspan="11" style="padding:8px 0;"><span style="float:left;">&nbsp;&nbsp; Total no. of Properties:&nbsp;&nbsp; <input type="text" class="input2" /></span> <span style="float:right;">Total no. of Projects: &nbsp;&nbsp;<input type="text" class="input2" /> &nbsp;&nbsp;</span></th>
</tr>

<tr class="bulkGridHeader">
<th></th>
<th colspan="2"><input type="checkbox" /> Phone</td>
<th colspan="2"><input type="checkbox" />Internet</td>
<th colspan="2"><input type="checkbox" />Print</td>
<th colspan="2"><input type="checkbox" />Electronic</td>
<th>Total no. of Properties</td>
<th>Total Amount</td>
</tr>

<tr class="bulkGridItem">
<td rowspan="2">How many months</td>
<td colspan="2">Basic</td>
<td colspan="2">Basic</td>
<td colspan="2">Basic</td>
<td colspan="2">Basic</td>
<td></td>
<td></td>
</tr>

<tr class="bulkGridItem">
<td>no. of properties</td>
<td>Amount</td>
<td>no. of properties</td>
<td>Amount</td>
<td>no. of properties</td>
<td>Amount</td>
<td>no. of properties</td>
<td>Amount</td>
<td></td>
<td></td>
</tr>

<tr class="bulkGridItem">
<td>1</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td>40</td>
<td>Rs 6000/-</td>
</tr>

<tr class="bulkGridItem">
<td>2</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td>40</td>
<td>Rs 6000/-</td>
</tr>

<tr class="bulkGridItem">
<td>Qtr</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td>40</td>
<td>Rs 6000/-</td>
</tr>

<tr class="bulkGridItem">
<td>Half yr</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td>40</td>
<td>Rs 6000/-</td>
</tr>

<tr class="bulkGridItem">
<td>Year</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td>40</td>
<td>Rs 6000/-</td>
</tr>
<tr class="bulkGridItem">
<td>Total</td>
<td>TNP</td>
<td>TA</td>
<td>TNP</td>
<td>TA</td>
<td>TNP</td>
<td>TA</td>
<td>TNP</td>
<td>TA</td>
<td></td>
<td></td>
</tr>

<tr class="bulkGridItem">
<td rowspan="2">How many months</td>
<td colspan="2">Premium</td>
<td colspan="2">Premium</td>
<td colspan="2">Premium</td>
<td colspan="2">Premium</td>
<td></td>
<td></td>
</tr>

<tr class="bulkGridItem">
<td>no. of properties</td>
<td>Amount</td>
<td>no. of properties</td>
<td>Amount</td>
<td>no. of properties</td>
<td>Amount</td>
<td>no. of properties</td>
<td>Amount</td>
<td></td>
<td></td>
</tr>

<tr class="bulkGridItem">
<td>1</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td>40</td>
<td>Rs 6000/-</td>
</tr>

<tr class="bulkGridItem">
<td>2</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td>40</td>
<td>Rs 6000/-</td>
</tr>

<tr class="bulkGridItem">
<td>Qtr</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td>40</td>
<td>Rs 6000/-</td>
</tr>

<tr class="bulkGridItem">
<td>Half yr</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td>40</td>
<td>Rs 6000/-</td>
</tr>

<tr class="bulkGridItem">
<td>Year</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td>40</td>
<td>Rs 6000/-</td>
</tr>
<tr class="bulkGridItem">
<td>Total</td>
<td>TNP</td>
<td>TA</td>
<td>TNP</td>
<td>TA</td>
<td>TNP</td>
<td>TA</td>
<td>TNP</td>
<td>TA</td>
<td>TNP</td>
<td>TA</td>
</tr>

<tr class="bulkGridItem">
<td rowspan="2">How many months</td>
<td colspan="2">Platinum</td>
<td colspan="2">Platinum</td>
<td colspan="2">Platinum</td>
<td colspan="2">Platinum</td>
<td></td>
<td></td>
</tr>

<tr class="bulkGridItem">
<td>no. of properties</td>
<td>Amount</td>
<td>no. of properties</td>
<td>Amount</td>
<td>no. of properties</td>
<td>Amount</td>
<td>no. of properties</td>
<td>Amount</td>
<td></td>
<td></td>
</tr>

<tr class="bulkGridItem">
<td>1</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td>40</td>
<td>Rs 6000/-</td>
</tr>

<tr class="bulkGridItem">
<td>2</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td>40</td>
<td>Rs 6000/-</td>
</tr>

<tr class="bulkGridItem">
<td>Qtr</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td>40</td>
<td>Rs 6000/-</td>
</tr>

<tr class="bulkGridItem">
<td>Half yr</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td>40</td>
<td>Rs 6000/-</td>
</tr>

<tr class="bulkGridItem">
<td>Year</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td><input type="text" class="input3" /></td>
<td>Rs 1500 /-</td>
<td>40</td>
<td>Rs 6000/-</td>
</tr>


<tr class="bulkGridItem">
<td>Total</td>
<td>TNP</td>
<td>TA</td>
<td>TNP</td>
<td>TA</td>
<td>TNP</td>
<td>TA</td>
<td>TNP</td>
<td>TA</td>
<td>TNP</td>
<td>TA</td>
</tr>

<tr class="bulkGridItem">
<td colspan="9">Total</td>

<td>TNP</td>
<td>TA</td>
</tr>


</table>
<div>

<p><li><label>Payment Type</label><select data-placeholder="Payment Type" class="chzn-select" tabindex="2" style="width:315px;">
<option value=""></option>
<option value="C"  >Cash</option>
<option value="BT" >Bank Transfer</option>
<option value="CH" >Cheque</option>
<option value="D" >Deposit</option>
</select></li></p>

<p><li><label>Free</label><input type="text" class="input" /></li></p>


</div>

<p><li class="buttons" style="float:right;"><a href="agents_newpost.php"><input  type="submit" value="SAVE" class="input_btn"/></a></li></p>

</ol>
</div>



</div>

</div>


<script src="../js/chosen.jquery.js" type="text/javascript"></script>
<script type="text/javascript"> $(".chzn-select").chosen(); $(".chzn-select-deselect").chosen({allow_single_deselect:true}); </script>
</body>
<?php
}
?>
