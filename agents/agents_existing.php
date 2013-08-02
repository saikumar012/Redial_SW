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


<div class="main_hed">Bulk > Agents  > <span>Search Existing</span> <div class="inner_menu"><a href="agents_new.php">Add New</a>|<a href="agents_existing.php" class="active">Add to Existing</a></div></div>

<div id="form" class="faqs">
<ol>

<p><li><label>Name</label><input type="text" class="input" /></li></p>
<p><li><label>Phone Number</label><input type="text" class="input" /></li></p>
<p><li><label>Agent ID</label><input type="text" class="input" /></li></p>



<p><li class="buttons" style="float:right;"><a href="agents_existing_search.php"><input  type="submit" value="SEARCH" class="input_btn"/></a></li></p>

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
