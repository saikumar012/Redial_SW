<?php
include("function.php");
include("../include/session.php");
	global $database;
if(!$session->logged_in){
		header("Location:index.php");
}else{

if(isset($_POST['update']))
{
 $department = $_POST['department'];
 $sno = $_POST['sno'];
 $query = $database->query("update department set department = '$department' where sno = '$sno' ");

}
if(isset($_GET['em_delete']))
{
  $id1=$_GET['em_delete'];
  $database->query("delete from department where sno = '$id1'");	
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
    var  url = "?em_delete="+id;
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
</head>

<body>
<div id="warp">

<div class="logo"><a href="home.html"><img src="../images/logo.png" alt="Redail Logo" /></a></div>

<span style="float:right; font-size:11px; padding-top:3px; width:700px; text-align:right;">&nbsp;&nbsp;&nbsp; Admin &nbsp;&nbsp;|&nbsp;&nbsp; <a href="changeps.html">Change Password</a> &nbsp;&nbsp;|&nbsp;&nbsp; <a href="#">Logout</a></span>

<div class="r_menu2"><a href="employee.html">Create Employe</a><a href="employeelist.html">Employees List</a><a href="employee_department.html">Create Department</a><a href="employee_department_list.html" class="active">Department List</a></div>

<div style="width:100%; float:left;">

<div class="main_hed2"><img src="../images/p_sicon.png" align="absmiddle" /> &nbsp; Add Department</div>

<?php
$sql = "select * from department order by division ASC ";
if(isset($_GET['submit']))
{
$division = $_GET['division'];
$sql = "select * from department where division = '$division' order by division ASC ";
}
if(isset($_GET['d']))
{
$division = $_GET['d'];
$sql = "select * from department where division = '$division' order by division ASC ";
}
$result = $database->query($sql);
?>
<form action="" method="get">
<div id="form">
<ol>
<p><li><label>Division</label>
<select data-placeholder="Division" name="division" class="chzn-select" tabindex="2" style="width:315px;">
          <option value=""></option> 
          <option value="1" <?php if(isset($_GET['submit']))
{ if($_GET['division'] == 1) echo "selected = 'selected'"; } else if(isset($_GET['d'])) { if($_GET['d'] == 1) echo "selected = 'selected'"; } else { } ?> >Indoor</option> 
          <option value="2" <?php if(isset($_GET['submit']))
{ if($_GET['division'] == 2) echo "selected = 'selected'"; } else if(isset($_GET['d'])) { if($_GET['d'] == 2) echo "selected = 'selected'"; } else { } ?> >Outdoor</option>
        </select></li>
</p>
<!--<p><li><label>Department</label><input type="text" class="input" /></li>-->
</p>


<p><li class="buttons" style="float:right;"><input type="submit" name="submit" value="SEARCH" class="input_btn"/></li></p>
</ol>
</div>
</form>
<table class="CVGridView" rules="all" border="1" cellspacing="0" style="margin:10px 0 0 0; width:950px; float:left;" >
<tbody>
<tr class="CVGridHeader">
<th scope="col">Department</th><th scope="col">Edit</th><th scope="col">Delete</th>
</tr>
<?php while($row = mysql_fetch_array($result)) { ?>
<tr class="CVGridItem" id = "showRow<?php echo $row['sno']?>" >
<td><?=$row['department']?></td>
<td><a  onclick="showRow('<?php echo $row['sno']?>')">Edit</a></td>
<td><a onclick="deletee('<?php echo $row['sno']?>')"><img src="../images/close.png" /></a></td>
</tr>
<tr class="CVGridItem" id ="hideRow<?php echo $row['sno'] ?>" style="display:none" >
<form method="post" action="">
<td><input type="text" value="<?php echo $row['department'] ?>" name="department" class="input" /></td>
<td>
<input type="hidden" value="<?php echo $row['sno'] ?>" name="sno"  />
<input type="submit" value="Update" name="update" /></td>
<td>
<a onclick="deletee('<?php echo $row['sno'] ?>')" ><img src="../images/close.png" /></a></td>
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