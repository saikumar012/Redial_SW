<?php
include("../include/session.php");
global $database;
if(!$session->logged_in){
    header("Location:index.php");
}else{
if(isset($_POST['modify']))
{
$planname=trim($_POST['planame']);
$priority=trim($_POST['priority']);
$amount=trim($_POST['amount']);
$id1 = trim($_POST['id']);
$q = "UPDATE subcriptionplanes set planame='$planname',priority='$priority',amount='$amount' where id='$id1' ";
$database->query($q);
header("location:subscriptionplans_view.php?id=$id1");
}
if(isset($_GET['subplan_delete']))
{
 $id1=$_GET['subplan_delete'];
  $database->query("delete from subcriptionplanes where id = '$id1'");	
  header("location:subscriptionplans_view.php");
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to Redial</title>
<link rel="stylesheet" type="text/css" href="../css/style.css" />

<link rel="stylesheet" href="../css/chosen2.css" />
<script src="../js/jquery-1.8.0.min.js"></script>
<script type="text/javascript">

function get_XmlHttp() {
  // create the variable that will contain the instance of the XMLHttpRequest object (initially with null value)
  var xmlHttp = null;

  if(window.XMLHttpRequest) {		// for Forefox, IE7+, Opera, Safari, ...
    xmlHttp = new XMLHttpRequest();
  }
  else if(window.ActiveXObject) {	// for Internet Explorer 5 or 6
    xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
  }

  return xmlHttp;
}
function deletee(id)
{
	var request =  get_XmlHttp();
	if (confirm("Are you sure you want to delete"))
{
    var  url = "?subplan_delete="+id;
	request.open("GET", url, true);			// define the request
    request.send(null);
	request.onreadystatechange = function() {
    if (request.readyState == 4) {
     // var k = request.responseText;
	 location.reload();	
  }	
}
	 }
}

</script>
<link href="../css/modal.css" rel="stylesheet" type="text/css" />

</head>

<body>
<div id="warp">

<div class="logo"><a href="home.html"><img src="../images/logo.png" alt="Redail Logo" /></a></div>

<span style="float:right; font-size:11px; padding-top:3px; width:700px; text-align:right;">&nbsp;&nbsp;&nbsp; Admin &nbsp;&nbsp;|&nbsp;&nbsp; <a href="changeps.html">Change Password</a> &nbsp;&nbsp;|&nbsp;&nbsp; <a href="#">Logout</a></span>

<div class="r_menu2"><a href="subscriptionplans.html">Add plan</a><a href="subscriptionplans_view.html" class="active">View plans</a><a href="subscriptionplans_discount.html">Discount</a></div>


<div style="width:100%; float:left;">

<div class="main_hed2"><img src="../images/p_sicon.png" align="absmiddle" /> &nbsp; Subscription Plans List</div>
<?php 
$query = "select * from subcriptionplanes order by priority DESC";
if(isset($_GET['submit']))
{
$planname=trim($_GET['planname']);
$priority=trim($_GET['priority']);
$query = "select * from subcriptionplanes where ";
if(isset($_GET['planname']) && ($_GET['priority']==null))
{
    $planname=trim($_GET['planname']);
	$query .= " planame = '$planname' order by priority DESC ";
}
if(isset($_GET['priority']) && ($_GET['planname']==null))
{
    $priority=trim($_GET['priority']);
	$query .= " priority = '$priority' order by priority DESC ";
}
if(isset($_GET['planname']) && ($_GET['planname']))
{
 $planname=trim($_GET['planname']);
 $priority=trim($_GET['priority']);
	$query .= " planame = '$planname' and priority = '$priority' order by priority DESC ";

}
}
if(isset($_GET['p']))
{
$plan = $_GET['p'];
$query = "select * from subcriptionplanes where planame = '$plan' order by priority DESC";
}
$result = $database->query($query);
?>

<form action="" method="get">
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
<p><li><label>Plan Name</label><input class="input" name="planname"  value="<?php if(isset($_GET['p'])) { echo $_GET['p']; } ?>"/></li></p>
<p><li><label>Priority</label><input class="input" name="priority" /> </li></p>

<li class="buttons" style="float:right;"><a href="#"><input type="submit" name="submit" value="SEARCH" class="input_btn"/></a></li>
</ol>
</div>
</form>
<table class="CVGridView" rules="all" border="1" cellspacing="0" style="margin:; float:left; width:100%">

<tbody>
<tr class="CVGridHeader">
<th scope="col">Plan</th><th scope="col">Priority</th><th scope="col">Subscription Type</th><th scope="col">Amount</th><th scope="col">Modify</th><th scope="col">Delete</th></tr>
<?php while($row = mysql_fetch_array($result)) { ?>
<tr class="CVGridItem"><td><?=$row['planame']?></td><td><?=$row['priority']?></td><td>Active</td><td><?=$row['amount']?>/-</td><td><a href="?id=<?=$row['id']?>&#Modify">Modify</a></td><td><a onclick="deletee('<?=$row['id']?>')"><img src="../images/close.png" /></a></td></tr>
<?php } ?>
</tbody></table>



</div>

</div>
<?php
$id='';
if(isset($_GET['id']))
$id = $_GET['id'];
$query = "select * from subcriptionplanes where id='$id'";
$result_get = $database->query($query);
?>
<a href="#x" class="overlay" id="Modify"></a>
<div class="popup" style="padding:10px 20px;">		

<form action="" method="post">
<?php $row_get=mysql_fetch_array($result_get); ?>
<div id="form" class="faqs">
<ol>
<p><li><label>Plan Name</label><input class="input" name="planame" value="<?=$row_get['planame']?>"/></li></p>
<p><li><label>Priority</label><input class="input" name="priority" value="<?=$row_get['priority']?>" /> (1, 2, 3, 4, 5, 6, 7, 8, 9, 10)</li></p>

<p><li><label>Amount</label><input class="input" name="amount" value="<?=$row_get['amount']?>" /></li></p>
<input type="hidden" name="id" value="<?=$row_get['id']?>" />
<li class="buttons" style="float:right;"><input type="submit" name="modify" value="UPDATE" class="input_btn"/></li>
</ol>
</div>	

<a class="close" href="#close"></a>
</form>
</div>

<script src="../js/chosen.jquery.js" type="text/javascript"></script>
<script type="text/javascript"> $(".chzn-select").chosen(); $(".chzn-select-deselect").chosen({allow_single_deselect:true}); </script>
</body>
</html>
<?php } ?>