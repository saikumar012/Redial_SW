<?php 
include("include/session.php");
	global $database;
if(!$session->logged_in){
		header("Location:index.php");
}else{
    $type = 1;
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else{
        $page = 1;
    }
    $propertiesList = $database->getPropertiesList($type,$page);
    $count = mysql_num_rows($propertiesList); //to make pagination numbers at bottom
    function setCurrentId($currentId){
        global $id;
        $id = $currentId;
    }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Welcome to Redial</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />

<link rel="stylesheet" href="css/chosen2.css" />
<script src="js/jquery-1.8.0.min.js"></script>

<script type="text/javascript" src="js/jquery1.4.js"></script>
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

<link href="css/modal.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="warp">

<div class="logo"><a href="index_properties.php"><img src="images/logo.png" alt="Redail Logo" /></a></div>

<span style="float:right; font-size:11px; padding-top:3px;">&nbsp;&nbsp;&nbsp; <?php echo $session->username; ?> &nbsp;&nbsp;|&nbsp;&nbsp; <a href="process.php">Logout</a></span>
<div class="top_menu">
<a href="messagehistory.php">S & S History</a>|
<a href="appointments.php">Appointments</a>|
<a href="agents/agents_new.php">Bulk</a>|
<a href="buyers.php">Buyers</a>|
<a href="complaintbox.php">Complaints</a>|
<a href="domods.php">Do-Mod's</a>|
<a href="msms.php">M-SMS</a>
</div>

<div class="top_icons" style="float:left; margin:40px 0 0 250px;">
<a href="properties_add.php" class="active"><img src="images/list_property.png" alt="List Property" /><br />List property</a>
</div>

<!--<div class="connect_people">Connecting properties & people in one dial <br />
<a href="#">040 - 22222224</a></div>-->

<ul id="nav-reflection2">
<li><a href="properties_add.php" class="active">Properties</a></li>
<li class="button-color-1"><a href="projects_add.php">Projects</a></li>		
</ul>

<div style="width:100%; float:left;">

<div class="main_hed" style="margin-top:9px;">List property > Properties > Residential > <span>Properties List</span> <div class="inner_menu"><a href="properties_add.php" class="active">Residential</a>|<a href="properties_add_comm.php">Commercial</a>|<a href="properties_add_ag.php" style="padding-right:0px;">Agriculture</a>
</div></div>


<div class="left_body">

<?php while($propertiesRows = mysql_fetch_array($propertiesList)){ ?>
<div class="search_results">
<div style="position:absolute; right:0"><input type="checkbox" /></div>
<div class="div star">***</div>
<div class="div userid"><?=$propertiesRows['property_id'] ?></div>
<a href="?id=<?=$propertiesRows['property_id'];?>&#history"  id=<?=$propertiesRows['property_id'];?>><div class="div more">History</div></a>
<a href="?id=<?=$propertiesRows['property_id'];?>&#edit"><div class="div more">more</div></a>
<img src="images/rd.png" align="left" style="margin:5px 0 0 10px;" />
<img src="images/icon_1.png" align="left" style="margin:5px 0 0 10px;" />
<img src="images/icon_2.png" align="left" style="margin:5px 0 0 10px;" />
<img src="images/icon_3.png" align="left" style="margin:5px 0 0 10px;" />
<img src="images/icon_4.png" align="left" style="margin:5px 0 0 10px;" />
<img src="images/icon_5.png" align="left" style="margin:5px 0 0 10px;" />
<br /><br />
<div class="div requirment"><?=$propertiesRows['description'] ?></div>
<div style="float:left;">
<div class="div propertytype"><?=$database->getPropertyTypeById($propertiesRows['property_type']) ?></div>
<div class="div area"><?=$propertiesRows['area'] ?> <?=$database->getAreaTypeById($propertiesRows['area_type']) ?></div>
</div>
<div style="float:left;">
<div class="div city"><?=$database->getCityById($propertiesRows['city']) ?></div>
<div class="div whareincity"><?=$database->getLocationById($propertiesRows['location']) ?></div>
</div>
<div style="float:left;">
<div class="div price"><?=$propertiesRows['price'] ?> <?=$database->getPriceTypeById($propertiesRows['price_type']) ?></div>
<div class="div contactno"><?=$propertiesRows['mobile'] ?></div>
</div>

</div>

<?php
}
?>


<div class="pagination" style="float:left;">
    <a href="#" class="numbers">Prev</a>
    <?php
    for($i = 0;$i<$count; $i++){ ?>
        <a href="#" onclick="<?php header('Location:properties_addpost.php?'.$i+1); ?>" class="numbers active"><?=$i+1;?></a>
    <?php }   ?>

<a href="#" class="numbers">Next</a>
</div>
</div>


</div>

</div>

<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $historyMoreList = $database->getPropertyRowById($id);
    $historyMoreRow = mysql_fetch_array($historyMoreList);
}
?>


<a href="#x" class="overlay" id="edit"></a>
<div class="popup">


<div class="search_results" style="margin:0px;">

<div class="div star">***</div>
<div class="div userid"><?=$historyMoreRow['property_id'] ?></div>
<img src="images/rd.png" align="left" style="margin:5px 0 0 10px;" />
<img src="images/icon_1.png" align="left" style="margin:5px 0 0 10px;" />
<img src="images/icon_2.png" align="left" style="margin:5px 0 0 10px;" />
<img src="images/icon_3.png" align="left" style="margin:5px 0 0 10px;" />
<img src="images/icon_4.png" align="left" style="margin:5px 0 0 10px;" />
<img src="images/icon_5.png" align="left" style="margin:5px 0 0 10px;" />
<br /><br />
<div class="div requirment"><?=$historyMoreRow['description']; ?></div>
<div style="float:left;">
<div class="div propertytype"><?=$database->getPropertyTypeById($historyMoreRow['property_type']); ?></div>
<div class="div area"><?php echo $historyMoreRow['area'].' '.$database->getAreaTypeById($historyMoreRow['area_type']); ?> </div>
</div>
<div style="float:left;">
<div class="div city"><?=$database->getCityById($historyMoreRow['city']) ?></div>
<div class="div whareincity"><?=$database->getLocationById($historyMoreRow['location']); ?></div>
</div>
<div style="float:left;">
<div class="div price"><?php echo $historyMoreRow['price'].' '.$database->getPriceTypeById($historyMoreRow['price_type']); ?></div>
<div class="div contactno"><?=$historyMoreRow['bedrooms'].' Bed room(s)'; ?></div>
</div>
<div style="float:left;"><div class="div price"><?=$historyMoreRow['name']; ?></div>
<div class="div whareincity"><?=$historyMoreRow['mobile']; ?></div>
</div>
<div style="float:left;"><div class="div price" style="width:360px;"><?=$historyMoreRow['email']; ?></div></div>
<div style="float:left;"><div class="div whareincity"><?=$database->getOwnerShipById($historyMoreRow['areyou']); ?></div><div class="div price"><?php echo $historyMoreRow['amount'].' '.$database->getPriceTypeById($historyMoreRow['amount_type']); ?></div></div>
<div style="float:left;"><div class="div contactno"><?=$database->getPaymentTypeById($historyMoreRow['payment_type']); ?></div><div class="div price">Need to Add</div></div>


</div>

<a class="close" href="#close"></a>
        </div>



<a href="#x" class="overlay" id="history"></a>
<div class="popup">

<div class="search_results3" style="margin:0px;">
<div style="float:left;">
<p>Hold for verification - 01/02/12 - 10:50 AM<br />
verified - 02/02/12 - 3:00 PM<br />
Active(paid) - 05/02/12 -  11:00 AM<br />
De active(paid) -  05/03/12 - 10:00 AM
</p>

</div>
</div>

<a class="close" href="#close"></a>
</div>

<script src="js/chosen.jquery.js" type="text/javascript"></script>
<script type="text/javascript"> $(".chzn-select").chosen(); $(".chzn-select-deselect").chosen({allow_single_deselect:true}); </script>
</body>
</html>
<?php
}
?>