<?php
include("function.php");
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

</head>

<body>
<div id="warp">

<div class="logo"><a href="home.html"><img src="../images/logo.png" alt="Redail Logo" /></a></div>

<span style="float:right; font-size:11px; padding-top:3px; width:700px; text-align:right;">&nbsp;&nbsp;&nbsp; Admin &nbsp;&nbsp;|&nbsp;&nbsp; <a href="changeps.html">Change Password</a> &nbsp;&nbsp;|&nbsp;&nbsp; <a href="#">Logout</a></span>

<div class="r_menu2"><a href="employee.html">Create Employe</a><a href="employeelist.html">Employees List</a><a href="employee_department.html" class="active">Create Department</a><a href="employee_department_list.html">Department List</a></div>

<div style="width:100%; float:left;">

<div class="main_hed2"><img src="../images/p_sicon.png" align="absmiddle" /> &nbsp; Add Department</div>

<?php
if(isset($_POST['submit'])) {
$division=$_POST['division'];
$department = $_POST['department'];
$sql = $database->query("select * from department where division = '$division' and department = '$department' ");
if(mysql_num_rows($sql)>0)
{
echo "<p style='color:#FF0000'>Department Name already exist</p>";
} else {
$database->query("insert into department values('','$division','$department')");
header("location:employee_department_list.php?d=$division");
}
}
?>
<form action="" method="post">
<div id="form">
<ol>
<p><li><label>Division</label>
<select data-placeholder="Division" name="division" class="chzn-select" tabindex="2" style="width:315px;">
          <option value=""></option> 
          <option value="1">Indoor</option> 
          <option value="2">Outdoor</option>
        </select></li>
</p>
<p><li><label>Department</label><input type="text" name="department" class="input" /></li>
</p>


<p><li class="buttons" style="float:right;"><input type="submit" name="submit" value="ADD" class="input_btn"/></li></p>
</ol>
</div>
</form>

<!--<table class="CVGridView" rules="all" border="1" cellspacing="0" style="margin:10px 0 0 0; width:950px; float:left;" >
<tbody>
<tr class="CVGridHeader">
<th scope="col">Department</th><th scope="col">Edit</th><th scope="col">Delete</th>
</tr>

<tr class="CVGridItem">
<td>CEO</td>
<td><a  href="#">Edit</a></td>
<td><a href="#"><img src="../images/close.png" /></a></td>
</tr>



</tbody></table>-->



</div>


</div>


<script src="../js/chosen.jquery.js" type="text/javascript"></script>
<script type="text/javascript"> $(".chzn-select").chosen(); $(".chzn-select-deselect").chosen({allow_single_deselect:true}); </script>
</body>
</html>
<?php } ?>