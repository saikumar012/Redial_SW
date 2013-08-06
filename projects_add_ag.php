<?php 
include("include/session.php");
	global $database;
if(!$session->logged_in){
		header("Location:index.php");
}else{
    if(isset($_POST['submit'])){
        // property details
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

        //special conditions
        if($_POST['auction']) $auction = 1;
        else $auction = 0;
        if($_POST['gc']) $gc = 1; // gated community
        else $gc = 0;
        if($_POST['rental']) $rental = 1;
        else $rental =0;
        if($_POST['TRANSACTIONTYPE']) $tran_type =1;  // transaction type
        else $tran_type = 0;
        if($_POST['POSSESION']) $possession_status = 1;
        else $possession_status = 0;

        //contact Detals
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $areyou = $_POST['areyou'];

        //seller choice
        $plan = $_POST['plan'];
        $months = $_POST['months'];
        $referrance = $_POST['referrance'];
        // if user clicks customize then amount will be customized and taken from those fields.
        if(!$_POST['customized']){
            $customized = 0;
            $amount = $_POST['amount'];
            $amount_type = $_POST['amount_type'];
        }else{
            $customized = 1;
            $amount = $_POST['custom_amount']; // customized amount
            $amount_type = $_POST['custom_amount_type']; // customized amount type
        }
        $payment_type = $_POST['payment_type'];
        if($_POST['paid']) $paid = 1;
        else $paid = 0;
        if($_POST['verified']) $verified = 1;
        else $verified = 0;
        $assign = $_POST['assign']; // remember to add assign in html part by retrive with php.

        // dynamically created values
        $property_id = $session->generateRandStr(6);
        $dateadded = date('d/m/Y-H:i:s');
        $type = '3'; // remember 1 is for residential, check in db for new value if needs to change.
        $expirydate = $database->getExpiryDate($months);
        $addedby = $session->username;
        // query to insert into properties

        /* echo $want.','.$property_type.','.$bedrooms.','.$area.','.$area_type.','.$price.','.$price_type.','.$city.','.$location.','
               .$description.','.$name.','.$phone.','.$email.','.$areyou.','.$auction.','.$gc,$rental.','.$tran_type.','
               .$possession_status.','.$customized.','.$plan.','.$months.','.$amount.','.$amount_type.','.$referrance.','.$payment_type.','
               .$paid.','.$verified.','.$assign.','.$property_id.','.$dateadded.','.$type.','.$expirydate.','.$addedby;*/
        $insert_query = "INSERT INTO `projects`
                            (`id`, `want`, `property_type`, `area`, `area_type`, `city`,
                            `location`, `description`, `name`, `mobile`, `email`, `areyou`, `isAution`, `isGC`, `isRental`,
                            `transactionType`, `possession`, `customized`, `plan`, `months`, `amount`, `amount_type`, `reffered`,
                            `payment_type`, `paid`, `status`, `assignedto`, `project_id`, `dateadded`, `type`, `expirydate`,
                            `addedby`)
                     VALUES ('','$want','$property_type','$area','$area_type','$city','$location',
                             '$description','$name','$phone','$email','$areyou','$auction',null ,null ,null ,
                             null ,'$customized','$plan','$months','$amount','$amount_type','$referrance','$payment_type',
                             '$paid','$verified','$assign','$property_id','$dateadded','$type','$expirydate','$addedby')";
        //echo $insert_query;
        $insert = $database->query($insert_query);
        // $insert_id = mysql_insert_id();
        $database->addToVerifyHistory($property_id,$verified);
        header("Location:projects_addpost_ag.php");
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

<div class="main_hed" style="margin-top:9px;">List property > Projects > <span>Agriculture</span> <div class="inner_menu"><a href="projects_add.php">Residential</a>|<a href="projects_add_comm.php">Commercial</a>|<a href="projects_add_ag.php" style="padding-right:0px;" class="active">Agriculture</a>
</div></div>

<div id="form" style="width:750px;" class="faqs">
    <form method="POST">
        <ol>
            <!--
            sell = 1;
            rent = 2;
            -->
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
            <div class="special_cond" style="float:right; width:260px; margin-top:0px; margin-right:15px;">
                <h4>Special Conditions</h4>
                <p><li><input type="checkbox" id="auction" name="auction"  /> AUCTION </li></p>
            </div>

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

            <h1>Contact Details</h1>

            <p><li><label>Name <span class="star">*</span></label><input type="text" id="name" name="name" class="input" /></li></p>
            <p><li><label>Phone Number <span class="star">*</span></label><input type="text" id="phone" name="phone" class="input" /></li></p>
            <p><li><label>Email Id</label><input type="text" id="email" name="email" class="input" /></li></p>
            <p><li><label>Are You <span class="star">*</span></label><input type="radio" name="areyou" value="1" />Owner &nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" name="areyou" value="2" />Agent &nbsp;&nbsp;&nbsp;&nbsp; <input type="radio" value="3" name="areyou" />Builder</li></p>

            <div><h3>Seller Choice</h3>
                <div style="display: none; ">

                    <table border="0" cellpadding="10" cellspacing="0" style="border:1px solid #c5c5c5;">
                        <tr>
                            <td>
                                <select data-placeholder="Plan" id="plan" name="plan" class="chzn-select" style="width:150px;">
                                    <option value="0"></option>
                                    <?php
                                    $planList = $database->getPlanList();
                                    while($plansRow = mysql_fetch_array($planList)){ ?>
                                        <option value="<?php echo $plansRow['id']  ?>"><?php echo $plansRow['name']; ?></option>

                                    <?php } ?>
                                </select>
                            </td>
                            <td width="230px"><label>No. of months</label><li>
                                    <select data-placeholder="Months" id="months" name="months" class="chzn-select" style="width:100px;">
                                        <option value="0"></option>
                                        <?php
                                        $monthList = $database->getMonthsList();
                                        while($monthsRow = mysql_fetch_array($monthList)){ ?>
                                            <option value="<?php echo $monthsRow['id']; ?>"><?php echo $monthsRow['display']; ?></option>
                                        <?php } ?>
                                    </select>
                                </li></td>
                            <td><input type="text" class="input2" value="Amount" name="amount" id="amount" onfocus="if(this.value =='Amount' ) this.value=''" onblur="if(this.value=='') this.value='Amount'" />
                                <select data-placeholder="Select" id="amount_type" name="amount_type" class="chzn-select" style="width:80px;">
                                    <option value="0"></option>
                                    <?php
                                    $priceTypeList = $database->getPriceType();
                                    while($priceTypeRow = mysql_fetch_array($priceTypeList)){ ?>
                                        <option value="<?php echo $priceTypeRow['sno']; ?>"><?php echo $priceTypeRow['py'];  ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" style="border-top:1px solid #c5c5c5;">
                                &nbsp;&nbsp;<input type="checkbox" id="customized" name="customized" />Customized<br />

                                <li style="margin:10px 10px 0 0; float:left;">Referred by: &nbsp; <input type="text" id="referrance" name="referrance" class="input2" /></li>

                                <li style="margin:10px 0 0 0px; float:left;">Customized Amount: &nbsp; <input type="text" id="custom_amount" name="custom_amount" class="input2" />
                                    <select data-placeholder="Select" name="custom_amount_type" id="custom_amount_type" class="chzn-select" style="width:90px;">
                                        <option value="0"></option>
                                        <?php
                                        $priceTypeList = $database->getPriceType();
                                        while($priceTypeRow = mysql_fetch_array($priceTypeList)){ ?>
                                            <option value="<?php echo $priceTypeRow['sno']; ?>"><?php echo $priceTypeRow['py'];  ?></option>
                                        <?php } ?>
                                    </select></li>

                                <li style="float:left; margin-top:15px; margin-right:10px;">Payment Type <span class="star">*</span>
                                    <select data-placeholder="Payment Type" id="payment_type" name="payment_type" class="chzn-select" tabindex="2" style="width:150px;">
                                        <option value="0"></option>
                                        <?php
                                        $paymentTypeList = $database->getPaymentTypesList();
                                        while($paymentTypeRow = mysql_fetch_array($paymentTypeList)){ ?>
                                            <option value="<?php echo $paymentTypeRow['id']; ?>"><?php echo $paymentTypeRow['type']; ?></option>
                                        <?php } ?>
                                    </select> &nbsp;<input type="checkbox" id="paid" name="paid" /> Paid &nbsp;&nbsp;<input type="checkbox" id="verified" name="verified" /> Verified</li>

                                <li style="margin-top:15px; float:left;"><label>Assign Job to Exe <span class="star">*</span></label>
                                    <select data-placeholder="Executives" id="assign" name="assign" class="chzn-select" tabindex="2" style="width:150px;">
                                        <option value=""></option>
                                        <option value="2">EMP 01</option>
                                        <option value="2">EMP 02</option>
                                    </select></li>

                                <!--<li style="margin-top:15px; float:left;"></li>-->

                            </td>
                        </tr>
                    </table>

                </div>
            </div>

            <p><li class="buttons" style="float:right;"><input  type="submit" name="submit" value="POST" class="input_btn"/></li></p>

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