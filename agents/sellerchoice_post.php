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
<link href="../css/modal.css" rel="stylesheet" type="text/css" />

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

<!--<div class="sub_menu">
<a href="agents_new.php" class="active">Add New</a>|
<a href="agents_existing.php">Add to Existing</a>|
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</div>-->

<div style="width:100%; float:left;">

<div class="main_hed">Bulk > Agents  > Add New Set > <span>View Set</span> <div class="inner_menu"><a href="agents_new.php">Add New</a>|<a href="agents_existing.php">Add to Existing</a></div></div>


<div class="left_body">

<div class="search_results2" style="margin-bottom:25px;">
<div style="position:absolute; right:0"><input type="checkbox" /></div>
<div class="div userid">RE 01</div>
<a href="#history"><div class="div more">History</div></a>
<img src="../images/rd.png" align="left" style="margin:5px 0 0 10px;" />
<br /><br />
<div class="div requirment">3 BHK, Konark Towers, Dilsukhnagr, Hyderabad 500 060.</div>
<div style="float:left;">
<div class="div propertytype">Name</div>
<div class="div area">Phone Number</div>
</div>
<div style="float:left;">
<div class="div propertytype" style="width:360px;">Email-ID</div>
</div>

<div style="float:left;">
<div class="div city">Hyderabad</div>
<div class="div whareincity">Dilsukhnagar</div>
</div>

<a href="sellerchoice.php"><img src="../images/new_set.png" style=" position:absolute; bottom:-25px; right:120px;" /></a>
<a href="sellerchoice_post.php"><img src="../images/view_set.png" style=" position:absolute; bottom:-25px; right:70px;" /></a>
<!--<a href="properties2.php" target="_blank"><img src="../images/pr_add.png" style=" position:absolute; bottom:-25px; right:70px;" /></a>-->
<a href="all_properties.php"><img src="../images/pr_view.png" style=" position:absolute; bottom:-25px; right:20px;" /></a>

</div>


<div class="search_results" style="margin-bottom:25px;">
<div style="position:absolute; right:0"><input type="checkbox" /></div>
<div class="div userid">Set 01</div>
<div class="div userid">04-06-2013</div>
<div class="div userid">20</div>
<a href="#history2"><div class="div more">History</div></a>
<br /><br />
<div style="float:left;">
<div class="div propertytype">Total Amount</div>
<div class="div area">Payment Type</div>
<div class="div area">20 of 18 added</div>
</div>
<a href="properties2.php"><img src="../images/pr_add.png" style=" position:absolute; bottom:-25px; right:70px;" /></a>
<a href="properties2_post.php"><img src="../images/pr_view.png" style=" position:absolute; bottom:-25px; right:20px;" /></a>

</div>


<div class="search_results">
<div style="position:absolute; right:0"><input type="checkbox" /></div>
<div class="div userid">Set 02</div>
<div class="div userid">04-06-2013</div>
<div class="div userid">20</div>
<a href="#history2"><div class="div more">History</div></a>
<br /><br />
<div style="float:left;">
<div class="div propertytype">Total Amount</div>
<div class="div area">Payment Type</div>
<div class="div area">20 of 18 added</div>
</div>
<a href="projects2.php"><img src="../images/pr_add.png" style=" position:absolute; bottom:-25px; right:70px;" /></a>
<a href="projects2_post.php"><img src="../images/pr_view.png" style=" position:absolute; bottom:-25px; right:20px;" /></a>

</div>

<div class="pagination" style="float:left;">
<a href="#" class="numbers">Prev</a>
<a href="#" class="numbers active">1</a>
<a href="#" class="numbers">2</a>
<a href="#" class="numbers">3</a>
<a href="#" class="numbers">4</a>
<a href="#" class="numbers">Next</a>
</div>


</div>



</div>

</div>

<a href="#x" class="overlay" id="history"></a>
<div class="popup">
<div class="search_results3" style="margin:0px;">
<div style="float:left;">
<p>Total Properties - 36<br />
Properties - 12<br />
Projects - 8<br />
Properties in Projects -  16
</p>

</div>
</div>

<a class="close" href="#close"></a>
        </div>
        
        
<a href="#x" class="overlay" id="history2"></a>
<div class="popup">
<div class="search_results3" style="margin:0px;">
<div style="float:left;">
<p>Total Properties - 18<br />
Properties - 6<br />
Projects - 4<br />
Properties in Projects -  8
</p>

</div>
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
