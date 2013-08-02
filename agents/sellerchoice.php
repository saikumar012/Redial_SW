<?php 
include("../include/session.php");
	global $database;
if(!$session->logged_in){
		header("Location:../index.php");
}else{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to Redial</title>
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<link href="../css/modal2.css" rel="stylesheet" type="text/css" />

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

<span style="float:right; font-size:11px; padding-top:3px;">&nbsp;&nbsp;&nbsp; <?php echo $_SESSION['username'] ?> &nbsp;&nbsp;|&nbsp;&nbsp; <a href="../process.php">Logout</a></span>
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
<a href="../owners/agents_new.php" >Owners</a>
<a href="agents_new.php" class="active">Agents</a>
<a href="../builders/agents_new.php" style="border:none;">Builders</a>
</div>


<div style="width:100%; float:left;">
<div class="main_hed">Bulk > Agents  > <span>Add New Set</span> 
<div class="inner_menu"><a href="agents_new.php">Add New</a>|<a href="agents_existing.php">Add to Existing</a></div>
</div>


<div id="form" class="faqs">
<ol>
<p><li><label></label><input type="checkbox" /> <a href="#properties_choice" class="a_hover">Properties</a> &nbsp;&nbsp;&nbsp; <input type="checkbox" /> <a href="#projects_choice" class="a_hover">Projects</a></li></p>
<p><li><label>Total No. of &nbsp; Pr & Pj <span class="star">*</span></label><input type="text" class="input" /></li></p>
<p><li><label>Total Amount <span class="star">*</span></label><input type="text" class="input" /> <input type="checkbox" /> Customized</li></p>
<p><li><label>Customized Amount</label><input type="text" class="input" /></li></p>
<p><li><label>Referred by</label><input type="text" class="input" /></li></p>
<p><li><label>Payment Type <span class="star">*</span></label><select data-placeholder="Payment Type" class="chzn-select" tabindex="2" style="width:315px;">
<option value=""></option>
<option value="C"  >Cash</option>
<option value="BT" >Bank Transfer</option>
<option value="CH" >Cheque</option>
<option value="D" >Deposit</option>
</select> &nbsp; <input type="checkbox" /> Paid &nbsp; <input type="checkbox" /> Verified</li></p>

<p><li><label>Assign Job to Exe <span class="star">*</span></label>
<select data-placeholder="Executives" class="chzn-select" tabindex="2" style="width:315px;">
          <option value=""></option> 
          <option value="2">EMP 01</option> 
          <option value="2">EMP 02</option>
        </select></li>
</p>

<p><li class="buttons" style="float:right;"><a href="sellerchoice_post.php"><input  type="submit" value="POST" class="input_btn"/></a></li></p>

</ol>
</div>



</div>

</div>


<a href="#x" class="overlay" id="properties_choice"></a>
<div class="popup" style="padding:10px;">
<div id="form" style="width:1020px; height:500px; overflow:auto;">
<ol>
<table border="0" cellpadding="0" cellspacing="0" class="bulkGridView" style="margin-top:10px; width:1000px;">

<tr class="bulkGridHeader">
<th colspan="11" style="padding:8px 0;"><span style="float:left;">&nbsp;&nbsp; Total no. of Properties:&nbsp;&nbsp; <input type="text" class="input2" /></span></th>
</tr>

<tr><td rowspan="3">Platinum</td><td>1 Month</td><td>2 Month</td><td>Qtr</td><td>Half yr</td><td>Year</td><td>Total</td></tr>
<tr><td><input type="text" class="input3" /></td><td><input type="text" class="input3" /></td><td><input type="text" class="input3" /></td><td><input type="text" class="input3" /></td><td><input type="text" class="input3" /></td><td>50</td></tr>
<tr><td>Rs 8000 /-</td><td>Rs 8000 /-</td><td>Rs 8000 /-</td><td>Rs 8000 /-</td><td>Rs 8000 /-</td><td>Rs 40000 /-</td></tr>


<tr><td rowspan="3">Premium</td><td>1 Month</td><td>2 Month</td><td>Qtr</td><td>Half yr</td><td>Year</td><td>Total</td></tr>
<tr><td><input type="text" class="input3" /></td><td><input type="text" class="input3" /></td><td><input type="text" class="input3" /></td><td><input type="text" class="input3" /></td><td><input type="text" class="input3" /></td><td>50</td></tr>
<tr><td>Rs 8000 /-</td><td>Rs 8000 /-</td><td>Rs 8000 /-</td><td>Rs 8000 /-</td><td>Rs 8000 /-</td><td>Rs 40000 /-</td></tr>

<tr><td rowspan="3">Basic</td><td>1 Month</td><td>2 Month</td><td>Qtr</td><td>Half yr</td><td>Year</td><td>Total</td></tr>
<tr><td><input type="text" class="input3" /></td><td><input type="text" class="input3" /></td><td><input type="text" class="input3" /></td><td><input type="text" class="input3" /></td><td><input type="text" class="input3" /></td><td>50</td></tr>
<tr><td>Rs 8000 /-</td><td>Rs 8000 /-</td><td>Rs 8000 /-</td><td>Rs 8000 /-</td><td>Rs 8000 /-</td><td>Rs 40000 /-</td></tr>


</table>
<div>
<p><li><label>Free</label><input type="text" class="input" /></li></p>
<p><li><label>Total Amount</label><input type="text" class="input" /> <!--&nbsp;&nbsp;<input type="checkbox" />Customized--></li></p>
<!--<li style="margin:10px 0 0 0px; float:left;">Customized Amount: &nbsp; <input type="text" class="input2" /> <select data-placeholder="Select" class="chzn-select" style="width:90px;">
<option value=""></option> 
<option value="">Rs</option> 
<option value="2">Lakh(s)</option>
<option value="">Cr(s)</option>
</select></li>
<li style="margin:10px 10px 0 10px;  float:left;">Referred by: <input type="text" class="input2" /></li>
<br /><br /><br />
<p><li style=""><label>Payment Type</label>
<select data-placeholder="Payment Type" class="chzn-select" tabindex="2" style="width:150px;">
<option value=""></option>
<option value="C"  >Cash</option>
<option value="BT" >Bank Transfer</option>
<option value="CH" >Cheque</option>
<option value="D" >Deposit</option>
</select></li>-->
</p>
</div>
<li class="buttons" style="float:right;"><input  type="submit" value="ADD" class="input_btn"/></li>
</ol>
</div>
<a class="close" href="#close"></a>
</div>
        

<a href="#x" class="overlay" id="projects_choice"></a>
<div class="popup" style="padding:10px;">
<div id="form" style="width:1020px; height:500px; overflow:auto;">
<ol>
<table border="0" cellpadding="0" cellspacing="0" class="bulkGridView" style="margin-top:10px; width:1000px;">

<tr class="bulkGridHeader">
<th colspan="11" style="padding:8px 0;"><span style="float:left;">&nbsp;&nbsp; Total no. of Projects:&nbsp;&nbsp; <input type="text" class="input2" /></span></th>
</tr>

<tr><td rowspan="3">Platinum</td><td>1 Month</td><td>2 Month</td><td>Qtr</td><td>Half yr</td><td>Year</td><td>Total</td></tr>
<tr><td><input type="text" class="input3" /></td><td><input type="text" class="input3" /></td><td><input type="text" class="input3" /></td><td><input type="text" class="input3" /></td><td><input type="text" class="input3" /></td><td>50</td></tr>
<tr><td>Rs 8000 /-</td><td>Rs 8000 /-</td><td>Rs 8000 /-</td><td>Rs 8000 /-</td><td>Rs 8000 /-</td><td>Rs 40000 /-</td></tr>


<tr><td rowspan="3">Premium</td><td>1 Month</td><td>2 Month</td><td>Qtr</td><td>Half yr</td><td>Year</td><td>Total</td></tr>
<tr><td><input type="text" class="input3" /></td><td><input type="text" class="input3" /></td><td><input type="text" class="input3" /></td><td><input type="text" class="input3" /></td><td><input type="text" class="input3" /></td><td>50</td></tr>
<tr><td>Rs 8000 /-</td><td>Rs 8000 /-</td><td>Rs 8000 /-</td><td>Rs 8000 /-</td><td>Rs 8000 /-</td><td>Rs 40000 /-</td></tr>

<tr><td rowspan="3">Basic</td><td>1 Month</td><td>2 Month</td><td>Qtr</td><td>Half yr</td><td>Year</td><td>Total</td></tr>
<tr><td><input type="text" class="input3" /></td><td><input type="text" class="input3" /></td><td><input type="text" class="input3" /></td><td><input type="text" class="input3" /></td><td><input type="text" class="input3" /></td><td>50</td></tr>
<tr><td>Rs 8000 /-</td><td>Rs 8000 /-</td><td>Rs 8000 /-</td><td>Rs 8000 /-</td><td>Rs 8000 /-</td><td>Rs 40000 /-</td></tr>


</table>
<div>
<p><li><label>Free</label><input type="text" class="input" /></li></p>
<p><li><label>Total Amount</label><input type="text" class="input" /> <!--&nbsp;&nbsp;<input type="checkbox" />Customized--></li></p>
<!--<li style="margin:10px 0 0 0px; float:left;">Customized Amount: &nbsp; <input type="text" class="input2" /> <select data-placeholder="Select" class="chzn-select" style="width:90px;">
<option value=""></option> 
<option value="">Rs</option> 
<option value="2">Lakh(s)</option>
<option value="">Cr(s)</option>
</select></li>

<li style="margin:10px 10px 0 10px;  float:left;">Referred by: <input type="text" class="input2" /></li>
<br /><br /><br />
<p><li style=""><label>Payment Type</label>
<select data-placeholder="Payment Type" class="chzn-select" tabindex="2" style="width:150px;">
<option value=""></option>
<option value="C"  >Cash</option>
<option value="BT" >Bank Transfer</option>
<option value="CH" >Cheque</option>
<option value="D" >Deposit</option>
</select></li>-->
</p>
</div>
<li class="buttons" style="float:right;"><input  type="submit" value="ADD" class="input_btn"/></li>
</ol>
</div>
<a class="close" href="#close"></a>
</div>

<script src="../js/chosen.jquery.js" type="text/javascript"></script>
<script type="text/javascript"> $(".chzn-select").chosen(); $(".chzn-select-deselect").chosen({allow_single_deselect:true}); </script>
</body>
</html>
<?php
}
?>