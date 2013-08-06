<?php 
include("include/session.php");
	global $database;
if(!$session->logged_in){
		header("Location:index.php");
}else{
    if(isset($_POST['submit']))
    {
        $want = $_POST['Want'];
        $property_type = $_POST['property_type'];
        $bedrooms = $_POST['bedrooms'];
        $area = $_POST['area'];
        $area_type = $_POST['area_type'];
        $price = $_POST['price'];
        $price_type = $_POST['price_type'];
        $city = $_POST['city'];
        $location = $_POST['location'];
        $description = $_POST['description'];
        $type = '2'; // remember 1 is for residential, check in db for new value if needs to change.
        $expirydate = $database->getExpiryDate($months);
        $property_id = $_GET['projectid'];
        $addedby = $session->username;
        $dateadded = date('d/m/Y-H:i:s');
        // query to insert into properties

        $insert_query = "INSERT INTO `sub_projects`
                            (`id`, `want`, `property_type`, `bedrooms`, `area`, `area_type`, `price`, `price_type`, `city`,
                            `location`, `description`,`property_id`, `dateadded`, `type`, `expirydate`,
                            `addedby`)
                     VALUES ('','$want','$property_type',null ,'$area','$area_type','$price','$price_type','$city','$location',
                             '$description','$property_id','$dateadded','$type','$expirydate','$addedby')";
         // echo $insert_query;

        $insert = $database->query($insert_query);
        // $insert_id = mysql_insert_id();
        $database->addToVerifyHistory($property_id,$verified);
       header("Location:projects_addpost2_ag.php?projectid=".$property_id);
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
</head>

<body>
<div id="warp">

<div class="logo"><a href="index_properties.php"><img src="images/logo.png" alt="Redail Logo" /></a></div>

<span style="float:right; font-size:11px; padding-top:3px;">&nbsp;&nbsp;&nbsp; Naresh &nbsp;&nbsp;|&nbsp;&nbsp; <a href="#">Logout</a></span>
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
<li><a href="properties_add.php">Properties</a></li>
<li class="button-color-1"><a href="projects_add.php" class="active">Projects</a></li>		
</ul>

<div style="width:100%; float:left;">

<div class="main_hed" style="margin-top:9px;">List property > Projects > Agriculture > <span>Add Properties</span> <div class="inner_menu"><a href="projects_add.php">Residential</a>|<a href="projects_add_comm.php">Commercial</a>|<a href="projects_add_ag.php" style="padding-right:0px;" class="active">Agriculture</a>
</div></div>

<div id="form" class="faqs">
    <div id="form" class="faqs">
        <form method="post">
            <ol>

                <p><li><label>I Want to <span class="star">*</span></label><input type="radio" name="Want" value="1" /> Sell <input type="radio" name="Want" value="2" />Rent</li></p>
                <p><li><label>Property Type <span class="star">*</span></label>

                    <select data-placeholder="Select Your Type" id="property_type" name="property_type" class="chzn-select" style="width:315px;" tabindex="4">
                        <option value="0"></option>
                        <?php
                        $type = '1'; // for residential
                        $propertyList = $database->getPropertyList($type);
                        while($propertyRow = mysql_fetch_array($propertyList)){ ?>
                            <option value="<?php echo $propertyRow['sno'] ?>"><?php echo $propertyRow['type'] ?></option>
                        <?php }  ?>
                    </select>
                </li></p>

                <p><li><label>Area</label><input type="text" class="input" id="area" name="area" style="margin-top:-15px;" />

                    <select data-placeholder="Select" id="areat_type" name="area_type" class="chzn-select" style="width:100px;">
                        <option value="0"></option>
                        <?php
                        $areaTypeList = $database->getAreaType();
                        while($areaTypeRow = mysql_fetch_array($areaTypeList)){ ?>
                            <option value="<?php echo $areaTypeRow['sno']; ?>"><?php echo $areaTypeRow['atype'];  ?></option>
                        <?php } ?>


                    </select>
                </li></p>

                <p><li><label>Price</label><input type="text" id="price" name="price" class="input" style="margin-top:-15px;" />

                    <select data-placeholder="Select" id="price_type" name="price_type" class="chzn-select" style="width:100px;">
                        <option value="0"></option>
                        <?php
                        $priceTypeList = $database->getPriceType();
                        while($priceTypeRow = mysql_fetch_array($priceTypeList)){ ?>
                            <option value="<?php echo $priceTypeRow['sno']; ?>"><?php echo $priceTypeRow['py'];  ?></option>
                        <?php } ?>

                    </select>
                </li></p>
                <p><li><label>City <span class="star">*</span></label>

                    <select data-placeholder="Select City" id="city" name="city" class="chzn-select" tabindex="2" style="width:315px;">
                        <option value="0"></option>
                        <?php
                        $cityList = $database->getCityList();
                        while($cityRow = mysql_fetch_array($cityList)){ ?>
                            <option value="<?php echo $cityRow['sno'] ?>"><?php echo $cityRow['city']; ?></option>
                        <?php } ?>

                    </select>
                </li></p>

                <p><li><label>Where in City <span class="star">*</span></label>
                    <select data-placeholder="Select Where in City" id="location" name="location" class="chzn-select" tabindex="2" style="width:315px;">
                        <option value="0"></option>
                        <?php
                        $defaultCity = "1"; // make sure 1 is for hyderabad all the time.
                        $locationList = $database->getLocationList($defaultCity);
                        while($locationRow = mysql_fetch_array($locationList)){ ?>
                            <option value="<?php echo $locationRow['sno']; ?>"><?php echo $locationRow['location'] ?></option>
                        <?php } ?>
                    </select>
                </li></p>
                <p><li><label>Description <span class="star">*</span></label><textarea id="description" name="description" class="textarea"></textarea><br /><span class="description_count"> 125</span>
                </li></p>
                <p><li class="buttons" style="float:right;"><input  type="submit" value="POST" name="submit" class="input_btn"/></a></li></p>
                <a href="projects_addpost2_ag.php">
            </ol>
        </form>
</div>


</div>

</div>




<script src="js/chosen.jquery.js" type="text/javascript"></script>
<script type="text/javascript"> $(".chzn-select").chosen(); $(".chzn-select-deselect").chosen({allow_single_deselect:true}); </script>
</body>
</html>
<?php
}
?>