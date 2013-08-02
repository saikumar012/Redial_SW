<?php
include("function.php");
include("../include/session.php");
	global $database;
if(!$session->logged_in){
		header("Location:index.php");
}else{

if(isset($_GET['starting'])&& !isset($_REQUEST['submit'])){
				$starting=$_GET['starting'];
			}else{
				$starting=0;
			}
			
if(isset($_GET['max_delete']))
{
   $id1=$_GET['max_delete'];
   $sql=$database->query("delete from maximum where id='$id1'");
   header("location:minprice.php");
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
<script>
function pagination(page)
{
window.location="?starting="+page;
}
</script>
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
    var  url = "?max_delete="+id;
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

<div class="r_menu2"><a href="minprice.html">Min Price Range</a><a href="maxprice.html" class="active">Max Price Range</a></div>

<div style="width:100%; float:left;">

<div class="main_hed2"><img src="../images/p_sicon.png" align="absmiddle" /> &nbsp; Max Price Range</div>
<?php
$query = "select * from maximum ORDER BY Price, Type DESC";
if(isset($_POST['submit']))
{
$price		= $_POST['Price'];
$price_type	= $_POST['Type'];
/*if($price == '' || $price == null) 
{
echo "<p style='color:#FF0000'>Please Enter Minimun Price Value</p>";
}
if($price_type == '0')
{
echo "<p style='color:#FF0000'>Please Enter Minimun Price Value</p>";
}*/
$query_comp = $database->query("select * from maximum where Price = '$price' and Type = '$price_type' ");
if(mysql_num_rows($query_comp)>0)
{
echo "<p style='color:#FF0000'>price range already exist</p>";
} else { 
$sql=$database->query("insert into maximum values('','$price','$price_type')");
header("location:maxprice.php");
exit;
}
}
?>
<form action="" method="post">
<div id="form">
<ol>
<p><li><label>Min Price</label><input class="input" name="Price" value=""/></li></p>

<p><li><label>Price Type</label>
<select data-placeholder="Price Type" name="Type" class="chzn-select" tabindex="2" style="width:315px;">
          <option value="0"></option>
          <option value="R">Rs</option>
          <option value="L">Lakh(s)</option>
          <option value="C">Cr(s)</option>
        </select></li>
</p>

<li class="buttons" style="float:right;"><input type="submit" name="submit" value="ADD" class="input_btn"/></li>
</ol>
</div>
</form>
<table class="CVGridView" rules="all" border="1" cellspacing="0" style="margin:10px 0 0 0; width:600px; float:left;" >
<tbody>
<tr class="CVGridHeader">
<th scope="col">Min Price</th><th scope="col">Price Type</th><th scope="col">Delete</th>
</tr>
<?php
            $recpage = 20;//number of records per page
			$page_num = ceil($starting/$recpage);
			$obj = new pagination_class($query,$starting,$recpage);		
			$result = $obj->result;
		if(mysql_num_rows($result)>0) {
		$counter = $starting + 1;
 while($row = mysql_fetch_array($result)) { 
$price_type = $row['Type'];
if($price_type == 'R') { $type = 'Rs'; }
if($price_type == 'L') { $type = 'Lakh(s)'; }
if($price_type == 'C') { $type = 'Cr(s)'; } 
?>
<tr class="CVGridItem">
<td><?=$row['Price']?></td>
<td><?=@$type?></td>
<td><a onclick="deletee('<?=$row['id']?>')"><img src="../images/close.png" /></a></td>
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