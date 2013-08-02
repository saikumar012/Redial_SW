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
<script type="text/javascript">
function showRow(val){
document.getElementById('showRow'+val).style.display = 'none';
document.getElementById('hideRow'+val).style.display = '';
}
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
    var  url = "?msli_delete="+id;
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

<div class="r_menu2"><a href="msms.html">Add Template</a><a href="msmslist.html" class="active">View Template</a></div>

<div style="width:100%; float:left;">

<div class="main_hed2"><img src="../images/p_sicon.png" align="absmiddle" /> &nbsp; View Template</div>

<!--<table class="CVGridView" rules="all" border="1" cellspacing="0" style="margin:10px 0 0 0; width:950px; float:left;" >
<tbody>
<tr class="CVGridHeader">
<th scope="col">M-SMS</th><th scope="col">Edit</th><th scope="col">Delete</th>
</tr>

<tr class="CVGridItem">
<td>3 BHK, Konark Towers, Dilsukhnagr, Hyderabad 500 060. 3 BHK, Konark Towers, Dilsukhnagr, Hyderabad 500 060.
3 BHK, Konark Towers, Dilsukhnagr, Hyderabad 500 060. 3 BHK, Konark Towers, Dilsukhnagr, Hyderabad 500 060.</td>
<td><a  href="#">Edit</a></td>
<td><a href="#"><img src="../images/close.png" /></a></td>
</tr>



</tbody></table>-->
<?php
$sql = "select * from template";
$query = $database->query($sql);
if(isset($_POST['Update']))
{
$description = $_POST['description'];
$sno = $_POST['sno'];
$query = $database->query("update template set description = '$description' where sno = '$sno' ");
  header("location:msmslist.php");
}
if(isset($_GET['msli_delete']))
{
  $id1=$_GET['msli_delete'];
  $database->query("delete from template where sno = '$id1'");	
  header("location:typelist.php");
}
?>

<table class="CVGridView" rules="all" border="1" cellspacing="0" style="margin:10px 0 0 0; width:950px; float:left;">

<tbody>
<tr class="CVGridHeader">
<th scope="col">S.NO</th><th scope="col">SMS Template</th><th scope="col">Edit</th><th scope="col">Delete</th></tr>
<?php 
$i=1;
while($row = mysql_fetch_array($query)) { ?>
<tr class="CVGridAltItem"  id = "showRow<?php echo $row['sno']?>"><td><?=$i?>.</td><td><?=$row['description']?></td><td><a onclick="showRow('<?php echo $row['sno'] ?>')">Edit</a></td><td><a onclick="deletee('<?php echo $row['sno'] ?>')"><img src="../images/close.png" /></a></td></tr>
<tr class="CVGridItem" id ="hideRow<?php echo $row['sno'] ?>" style="display:none" >
<form method="post" action="">
<td><?=$i?></td><td><textarea class="input" name="description" cols="100"><?php echo $row['description'] ?>
</textarea></td>
<td>
<input type="hidden" name="sno" value="<?php echo $row['sno'] ?>" />
<input type="submit" value="Update" name="Update" /></td>
<td>
<a onclick="deletee('<?php echo $row['sno'] ?>')" ><img src="../images/close.png" /></a></td>
</form>
</tr>
<?php $i++; } ?>
</tbody></table>

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