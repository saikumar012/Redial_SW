<?php 
include("../include/session.php");
	global $database;
if(!$session->logged_in){
		header("Location:index.php");
}else{

$query = $database->getCityList();
if(isset($_POST['submit']))
{
$cityname = $_POST['cityname'];
$citysno = $_POST['citysno'];
$query = $database->query("update city set city = '$cityname' where sno = '$citysno'");
header("Location:citylist.php");
exit;
}
if(isset($_GET['city_delete']))
{
 $id1=$_GET['city_delete'];
   $database->query("delete from city  where sno = '$id1'");	
   header("location:citylist.php");
   	
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
    var  url = "?city_delete="+id;
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

<span style="float:right; font-size:11px; padding-top:3px; ">&nbsp;&nbsp;&nbsp; Admin &nbsp;&nbsp;|&nbsp;&nbsp; <a href="changeps.html">Change Password</a> &nbsp;&nbsp;|&nbsp;&nbsp; <a href="#">Logout</a></span>

<div class="r_menu2"><a href="city.html">Add City</a><a href="citylist.html" class="active">City's List</a><a href="whereincity.html">Where in City</a><a href="whereincitylist.html">Where in City List</a></div>

<div style="width:100%; float:left;">

<div class="main_hed2"><img src="../images/p_sicon.png" align="absmiddle" /> &nbsp; City List</div>


<table class="CVGridView" rules="all" border="1" cellspacing="0" style="margin:10px 0 0 0; width:950px; float:left;" >
<tbody>
<tr class="CVGridHeader">
<th scope="col">City Name</th><th scope="col">Edit</th><th scope="col">Delete</th>
</tr>
<?php while($result = mysql_fetch_array($query)) { ?>
<tr class="CVGridItem" id = "showRow<?php echo $result['sno']?>">
<td><?=$result['city']?></td>
<td><a onclick="showRow('<?php echo $result['sno'] ?>')">Edit</a></td>
<td><a onclick="deletee('<?php echo $result['sno'] ?>')"><img src="../images/close.png" /></a></td>
</tr>
<tr class="CVGridItem" id ="hideRow<?php echo $result['sno'] ?>" style="display:none" >
<form action="" method="post">
<td><input type="text" value="<?php echo $result['city'] ?>" name="cityname" class="input" /></td>
<td><input type="hidden" value="<?php echo $result['sno'] ?>" name="citysno"  /><input type="submit" value="Update" name="submit" /></td>
<td><a onclick="deletee('<?php echo $result['sno']; ?>');" ><img src="../images/close.png" /></a></td>
</form>
</tr>
<?php } ?>
</tbody></table>

</div>

</div>


<script src="../js/chosen.jquery.js" type="text/javascript"></script>
<script type="text/javascript"> $(".chzn-select").chosen(); $(".chzn-select-deselect").chosen({allow_single_deselect:true}); </script>
</body>
</html>
<?php } ?>
