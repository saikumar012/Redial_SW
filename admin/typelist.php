<?php
include("function.php");
include("../include/session.php");
	global $database;
if(!$session->logged_in){
		header("Location:index.php");
}else{
if(isset($_POST['update']))
{
$ptype = $_POST['ptype'];
$sno = $_POST['sno'];

$database->query("update propertytype set type = '$ptype' where sno = '$sno'");
header("location:typelist.php");

}
if(isset($_GET['typelist_delete']))
{
   $id1=$_GET['typelist_delete'];
  $database->query("delete from propertytype where sno = '$id1'");	
  header("location:typelist.php");
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
<?php
if(isset($_GET['submit']))
{
if(isset($_GET['starting'])&& isset($_REQUEST['submit'])){
				$starting=$_GET['starting'];
			}else{
				$starting=0;
			}
?>
<script>
function pagination(page)
{
window.location="?category=<?=$_GET['category']?>&submit=Search&starting="+page;
}
</script>
<?php
} else if(isset($_GET['property'])) {
if(isset($_GET['starting'])&& !isset($_REQUEST['submit'])){
				$starting=$_GET['starting'];
			}else{
				$starting=0;
			}
?>
<script>
function pagination(page)
{
window.location="?property=<?=$_GET['property']?>&starting="+page;
}
</script>
<?php } else {  
if(isset($_GET['starting'])&& !isset($_REQUEST['submit'])){
				$starting=$_GET['starting'];
			}else{
				$starting=0;
			}
?>
<script>
function pagination(page)
{
window.location="?starting="+page;
}
</script>

<?php } ?>
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
    var  url = "?typelist_delete="+id;
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

<div class="r_menu2"><a href="type.html">Add Property Type</a><a href="typelist.html" class="active">Properties List</a></div>

<div style="width:100%; float:left;">

<div class="main_hed2"><img src="../images/p_sicon.png" align="absmiddle" /> &nbsp; Properties Type List</div>
<?php 
 $sql = "select * from propertytype where category = 'Residential' ";
 if(isset($_GET['submit']))
 {
 $category = $_GET['category'];
 $sql = "select * from propertytype where category = '$category' ";
 }
 if(isset($_GET['property']))
 {
 $property = $_GET['property'];
 $sql = "select * from propertytype where category = '$property' ";
 }
 //$query = $database->query($sql);
?>
<form action="" method="get">
<div id="form">
<ol>

<p><li><label>Category </label>
<select data-placeholder="Select Category" name="category" class="chzn-select" tabindex="2" style="width:315px;">
          <option value=""></option> 
          <option value="Residential" <?php if(isset($_GET['submit']))
{ if($_GET['category'] == 'Residential') echo "selected = 'selected'"; } else if(isset($_GET['property'])) { if($_GET['property'] == 'Residential') echo "selected = 'selected'"; } else { } ?>>Residential</option> 
          <option value="Commercial" <?php if(isset($_GET['submit']))
{ if($_GET['category'] == 'Commercial') echo "selected = 'selected'"; } else if(isset($_GET['property'])) { if($_GET['property'] ==' Commercial') echo "selected = 'selected'"; } else { } ?>>Commercial</option> 
          <option value="Agriculture" <?php if(isset($_GET['submit']))
{ if($_GET['category'] == 'Agriculture') echo "selected = 'selected'"; } else if(isset($_GET['property'])) { if($_GET['property'] == 'Agriculture') echo "selected = 'selected'"; } else { } ?>>Agriculture</option> 
          
        </select></li></p>

<p><li class="buttons" style="float:right;"><input type="submit" name="submit" value="Search" class="input_btn"/></li></p>
</ol>
</div>
</form>
<table class="CVGridView" rules="all" border="1" cellspacing="0" style="margin:10px 0 0 0; width:950px; float:left;" >
<tbody>
<tr class="CVGridHeader">
<th scope="col">Type</th><th scope="col">Edit</th><th scope="col">Delete</th>
</tr>
<?php 
            $recpage = 15;//number of records per page
			$page_num = ceil($starting/$recpage);
			$obj = new pagination_class($sql,$starting,$recpage);		
			$result = $obj->result;
			if(mysql_num_rows($result)>0) {
			$counter = $page_num + 1;
while($row = mysql_fetch_array($result)) { ?>
<tr class="CVGridItem" id = "showRow<?php echo $row['sno']?>">
<td><?=$row['type']?></td>
<td><a onclick="showRow('<?php echo $row['sno']; ?>')">Edit</a></td>
<td><a onclick="deletee('<?php echo $row['sno'] ?>')"><img src="../images/close.png" /></a></td>
</tr>
<tr class="CVGridItem" id="hideRow<?php echo $row['sno']; ?>" style="display:none">
<form action="" method="post">
<td><input type="text" value="<?php echo $row['type'] ?>" name="ptype" /></td>
<td>
<input type="hidden" value="<?php echo $row['sno']; ?>" name="sno" />
<input type="submit" value="Update" name="update" /></td>
<td><a onclick="deletee('<?php echo $row['sno'] ?>')" ><img src="../images/close.png"  /></a></td>
</form>
</tr>
<tr class="CVGridItem"><td colspan="3">
<?php   $counter ++; }  echo $obj->anchors; }?></td></tr>
</tbody></table>


</div>

</div>



<script src="../js/chosen.jquery.js" type="text/javascript"></script>
<script type="text/javascript"> $(".chzn-select").chosen(); $(".chzn-select-deselect").chosen({allow_single_deselect:true}); </script>
</body>
</html>
<?php } ?>