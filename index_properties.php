<?php 
include("include/session.php");
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
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/tabs_style.css" />
 
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {

	//Default Action
	$(".graphictab_content").hide(); //Hide all content
	$("ul.graphic_tabs li:first").addClass("active").show(); //Activate first tab
	$(".graphictab_content:first").show(); //Show first tab content
	
	//On Click Event
	$("ul.graphic_tabs li").click(function() {
		$("ul.graphic_tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".graphictab_content").hide(); //Hide all tab content
		var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active content
		return false;
	});

});
</script>
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/execute.js"></script>

<link rel="stylesheet" href="css/chosen.css" />
<script src="js/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="js/oodomimagerollover.js"></script>
</head>

<link rel="stylesheet" type="text/css" href="css/pop_style.css" media="screen">
<script type="text/javascript" src="js/jquery_003.js"></script>
<script type="text/javascript">
				$(document).ready(function() {
						$('#modal').reveal({ // The item which will be opened with reveal
							animation: 'fade',                   // fade, fadeAndPop, none
							animationspeed: 600,                       // how fast animtions are
							closeonbackgroundclick: true,              // if you click background will modal close?
							dismissmodalclass: 'close'    // the class of a button or element that will close an open modal
						});
					return false;
				});
</script>

<script type="text/javascript" src="js/jquery1.4.js"></script>
<script type="text/javascript">
/* accessible */
	$(document).ready(function() {
		$('.faqs2 h3').each(function() {
			var tis = $(this), state = false, answer = tis.next('div').slideUp();
			tis.click(function() {
				state = !state;
				answer.slideToggle(state);
				tis.toggleClass('active',state);
			});
		});
	});
</script>


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

<div class="top_icons" style="margin-top:15px; margin-right:0px; float:right;">
<a href="properties_add.php"><img src="images/list_property.png" alt="List Property" /><br />List property</a>
</div>

<div class="search_bg" style="float:right; margin:-30px 100px 0 0;">
<input type="text" class="src_input" onfocus="if(this.value =='Search ID, Phone & Name' ) this.value=''" onblur="if(this.value=='') this.value='Search ID, Phone & Name'" value="Search ID, Phone & Name" />
<input type="button" class="src_btn" />
</div>


<!--<div class="connect_people">Connecting properties & people in one dial <br />
<a href="call.php">040 - 22222224</a></div>-->

<ul id="nav-reflection">
<li><a href="index_properties.php" class="active">Properties</a></li>
<li class="button-color-1"><a href="index_projects.php">Projects</a></li>		
</ul>

<div class="tabs_bg">
<ul class="graphic_tabs">
<li class="active"><a href="#tab1"><span class="graph_icon1">Residential</span></a></li>
<li class=""><a href="#tab2"><span class="graph_icon2">Commercial</span></a></li>
<li class=""><a href="#tab3"><span class="graph_icon3">Agriculture</span></a></li>
</ul>

<div class="graphictab_container">
<div style="display: none;" id="tab1" class="graphictab_content">
<div class="search_form faqs2">
<ul>
<div class="graphictab_content2">
<li style="float:right; margin:-43px 0 0 0;"><input type="radio" name="residencial_type" />Buy <input type="radio" name="residencial_type" />Rent</li>
<li>
<select data-placeholder="Property type" class="chzn-select" multiple style="width:125px;" tabindex="4">
<option value="0"></option>
<?php
$propertyTypeList = $database->getPropertyList();
while($propertListRow = mysql_fetch_array($propertyTypeList)){
?>
    <option value="<?php echo $propertyTypeList['id']; ?>"><?php echo $propertyTypeList['type']; ?></option>

<?php
}
?>
</select>
        
        
</li>
<li style="vertical-align:top"><!--<input type="text" value="Price Min" name="residencial_pricemin" onfocus="if(this.value =='Price Min' ) this.value=''" onblur="if(this.value=='') this.value='Price Min'" class="input_box input_box2" />-->
    <select data-placeholder="Price Min" class="chzn-select" tabindex="2" style="width:90px;">
          <option value="0"></option>
          <?php
            $minpriceList = $database->getMinPrice();
            while($minpriceRow = mysql_fetch_array($minpriceList)){
                $pricetype = $minpriceRow['Type'];
                ?>
                <option value="<?php echo $minpriceRow['sno'] ?>"><?php echo $minpriceRow['min'].' '.$pricetype; ?></option>

            <?php
            }
          ?>

</select> <span style="font-size:9px;">&nbsp;To&nbsp;</span>
<select data-placeholder="Price Max" class="chzn-select" tabindex="2" style="width:90px;">
          <option value="0"></option>
          <?php
            $maxpriceList = $database->getMaxprice();
            while($maxpriceRow = mysql_fetch_array($minpriceList)){
            $pricetype = $maxpriceRow['Type'];
          ?>
            <option value="<?php echo $maxpriceRow['sno'] ?>"><?php echo $maxpriceRow['max'].' '.$pricetype; ?></option>
          <?php
            }
          ?>

</select>
<!--<input type="text" name="residencial_pricemax" value="Price Max" onfocus="if(this.value =='Price Max' ) this.value=''" onblur="if(this.value=='') this.value='Price Max'" class="input_box input_box2" />--></li>



<li style="position:absolute; top:-310px; left:-202px;">        
<select data-placeholder="Select City" name="residencial_city" class="chzn-select" tabindex="" style="width:120px;">
          <option value="0"></option>
         <?php 
		 $cityList = $database->getCityList();
		 while($cityrow = mysql_fetch_array($cityList)){
		 ?>
		  <option value="<?php echo $cityrow['sno'] ?>" <?php if($cityrow['sno'] == "1") echo "selected" ?>><?php echo $cityrow['city']; ?></option>
		 <?php 
		 }
		 ?>	
         
</select>
</li>
<li style="vertical-align:top; margin-right:0px;">

<select data-placeholder="Where in City" class="chzn-select" multiple style="width:120px;" tabindex="4">
<option value="0"></option> 
<option value="6">A C guards</option>
<option value="8">Ambarpet</option>
<option value="9">Asman gadh</option>
<option value="11">Adarsh nagar</option>
<option value="12">Alliabad</option>
<option value="13">A S rao nagar</option>
<option value="14">Alwal</option>
<option value="15">Ashok nagar</option>
<option value="16">Attapur</option>
<option value="17">Airport road</option>
<option value="18">Ameerpet</option>
<option value="19">Aanad nagar colony</option>
<option value="20">Asif nagar</option>
<option value="21">Almas guda</option>
<option value="22">B N reddy nagar</option>
</select>

</li>
</div>

<div style="margin-left:31px;"><h3>Advanced Search </h3>
<div style="display: none;">
<div class="special_cond2">
<li><label style="width:120px; float:left;">VERIFIED PROPERTIES </label>
<select data-placeholder="Select" class="chzn-select" style="width:115px;" tabindex="4">
<option value=""></option> 
<option value="">Select</option>
<option value="">Yes</option>
<option value="">No</option>
</select>
</li>

<li><label style="width:120px; float:left;">AUCTION </label>
<select data-placeholder="Select" class="chzn-select" style="width:115px;" tabindex="4">
<option value=""></option> 
<option value="">Select</option>
<option value="">Yes</option>
<option value="">No</option>
</select>
</li>

<li><label style="width:120px; float:left;">GATED COMMUNITY </label>
<select data-placeholder="Select" class="chzn-select" style="width:115px;" tabindex="4">
<option value=""></option>
<option value="">Select</option>
<option value="">Yes</option>
<option value="">No</option>
</select>
</li>

<li><label style="width:120px; float:left;">RENTAL PURPOSE </label>
<select data-placeholder="Select" class="chzn-select" style="width:115px;" tabindex="4">
<option value=""></option>
<option value="">Select</option>
<option value="">Yes</option>
<option value="">No</option>
</select>
</li>

<li><label style="width:120px; float:left;">TRANSACTION TYPE</label>
<select data-placeholder="Select" class="chzn-select" style="width:115px;" tabindex="4">
<option value=""></option>
<option value="">Select</option>
<option value="">New Property</option>
<option value="">Resale</option>
</select>
</li>

<li><label style="width:120px; float:left;">POSSESSION STATUS </label>
<select data-placeholder="Select" class="chzn-select" style="width:115px;" tabindex="4">
<option value=""></option>
<option value="">Select</option>
<option value="">Under Construction</option>
<option value="">Ready to Occupy</option>
</select>
</li>

</div>

<li style="margin-top:3px;"><select data-placeholder="Bed Rooms" class="chzn-select" multiple style="width:217px;" tabindex="4">
          <option value=""></option> 
          <option value="">1</option>
<option value="">2</option>
<option value="">3</option>
<option value="">4</option>
<option value="">5</option>
<option value="">6</option>
<option value="">6+</option>
        </select></li>

<li>
<input type="text" class="input_box input_box2" value="Area Min" onfocus="if(this.value =='Area Min' ) this.value=''" onblur="if(this.value=='') this.value='Area Min'" style="width:45px;"  />
To <input type="text" class="input_box input_box2" value="Area Max" onfocus="if(this.value =='Area Max' ) this.value=''" onblur="if(this.value=='') this.value='Area Max'" style="width:48px;"  />
<select data-placeholder="Units" class="chzn-select" tabindex="2" style="width:80px;">
          <option value=""></option> 
          <option value="2">Sft</option> 
          <option value="2">Sq. yards</option> 
          <option value="2">Acres</option>
          
</select>
<li><textarea class="textarea" onfocus="if(this.value =='Key Words' ) this.value=''" onblur="if(this.value=='') this.value='Key Words'">Key Words</textarea></li>
<li style="margin-bottom:23px;"><input type="checkbox" />Owners &nbsp;&nbsp; <input type="checkbox" />Agents &nbsp;&nbsp; <input type="checkbox" />Builders</li>

</div>
</div>

<a href="properties_search.php"><input type="submit" value="Search" class="input_button" /></a>

</ul>
</div>
</div>


<div style="display: none;" id="tab2" class="graphictab_content">
<div class="search_form faqs2">
<ul>
<div class="graphictab_content2">
<li style="float:right; margin:-43px 0 0 0;"><input type="radio" name="residencial_type" />Buy <input type="radio" name="residencial_type" />Rent</li>
<li>
<select data-placeholder="Property type" class="chzn-select" multiple style="width:125px;" tabindex="4">
          <option value="Property type"></option> 
          <option value="">Independent House</option>
<option value="">Flat</option>
<option value="">Duplex House</option>
<option value="">Villa</option>
<option value="">Farm House</option>
        </select>
        
        
</li>
<li style="vertical-align:top"><!--<input type="text" value="Price Min" name="residencial_pricemin" onfocus="if(this.value =='Price Min' ) this.value=''" onblur="if(this.value=='') this.value='Price Min'" class="input_box input_box2" />--><select data-placeholder="Price Min" class="chzn-select" tabindex="2" style="width:90px;">
          <option value=""></option> 
          <option value="2">1 Lakh(s)</option> 
          <option value="2">2 Lakh(s)</option> 
          <option value="2">3 Cr(s)</option> 
           <option value="2">4 Cr(s)</option>  
          
</select> <span style="font-size:9px;">&nbsp;To&nbsp;</span>
<select data-placeholder="Price Max" class="chzn-select" tabindex="2" style="width:90px;">
          <option value=""></option> 
          <option value="2">1 Lakh(s)</option> 
          <option value="2">2 Lakh(s)</option> 
          <option value="2">3 Cr(s)</option> 
           <option value="2">4 Cr(s)</option>  
          
</select> 
<!--<input type="text" name="residencial_pricemax" value="Price Max" onfocus="if(this.value =='Price Max' ) this.value=''" onblur="if(this.value=='') this.value='Price Max'" class="input_box input_box2" />--></li>



<li style="position:absolute; top:-310px; left:-202px;">        
<select data-placeholder="Select City" name="residencial_city" class="chzn-select" tabindex="" style="width:120px;">
          <option value=""></option>
          <option value="Hyderabad">Hyderabad</option>
</select>
</li>
<li style="vertical-align:top; margin-right:0px;">
<select data-placeholder="Where in City" class="chzn-select" multiple style="width:120px;" tabindex="4">
          <option value=""></option> 
<option value="6">A C guards</option>
<option value="8">Ambarpet</option>
<option value="9">Asman gadh</option>
<option value="11">Adarsh nagar</option>
<option value="12">Alliabad</option>
<option value="13">A S rao nagar</option>
<option value="14">Alwal</option>
<option value="15">Ashok nagar</option>
<option value="16">Attapur</option>
<option value="17">Airport road</option>
<option value="18">Ameerpet</option>
<option value="19">Aanad nagar colony</option>
<option value="20">Asif nagar</option>
<option value="21">Almas guda</option>
<option value="22">B N reddy nagar</option>
        </select>
</li>
</div>

<div style="margin-left:31px;"><h3>Advanced Search </h3>
<div style="display: none;">
<div class="special_cond2">
<li><label style="width:120px; float:left;">VERIFIED PROPERTIES </label>
<select data-placeholder="Select" class="chzn-select" style="width:115px;" tabindex="4">
<option value=""></option> 
<option value="">Select</option>
<option value="">Yes</option>
<option value="">No</option>
</select>
</li>

<li><label style="width:120px; float:left;">AUCTION </label>
<select data-placeholder="Select" class="chzn-select" style="width:115px;" tabindex="4">
<option value=""></option> 
<option value="">Select</option>
<option value="">Yes</option>
<option value="">No</option>
</select>
</li>

<li><label style="width:120px; float:left;">GATED COMMUNITY </label>
<select data-placeholder="Select" class="chzn-select" style="width:115px;" tabindex="4">
<option value=""></option>
<option value="">Select</option>
<option value="">Yes</option>
<option value="">No</option>
</select>
</li>

<li><label style="width:120px; float:left;">RENTAL PURPOSE </label>
<select data-placeholder="Select" class="chzn-select" style="width:115px;" tabindex="4">
<option value=""></option>
<option value="">Select</option>
<option value="">Yes</option>
<option value="">No</option>
</select>
</li>

<li><label style="width:120px; float:left;">TRANSACTION TYPE</label>
<select data-placeholder="Select" class="chzn-select" style="width:115px;" tabindex="4">
<option value=""></option>
<option value="">Select</option>
<option value="">New Property</option>
<option value="">Resale</option>
</select>
</li>

<li><label style="width:120px; float:left;">POSSESSION STATUS </label>
<select data-placeholder="Select" class="chzn-select" style="width:115px;" tabindex="4">
<option value=""></option>
<option value="">Select</option>
<option value="">Under Construction</option>
<option value="">Ready to Occupy</option>
</select>
</li>

</div>

<li style="margin-top:3px;"><select data-placeholder="Bed Rooms" class="chzn-select" multiple style="width:217px;" tabindex="4">
          <option value=""></option> 
          <option value="">1</option>
<option value="">2</option>
<option value="">3</option>
<option value="">4</option>
<option value="">5</option>
<option value="">6</option>
<option value="">6+</option>
        </select></li>

<li>
<input type="text" class="input_box input_box2" value="Area Min" onfocus="if(this.value =='Area Min' ) this.value=''" onblur="if(this.value=='') this.value='Area Min'" style="width:45px;"  />
To <input type="text" class="input_box input_box2" value="Area Max" onfocus="if(this.value =='Area Max' ) this.value=''" onblur="if(this.value=='') this.value='Area Max'" style="width:48px;"  />
<select data-placeholder="Units" class="chzn-select" tabindex="2" style="width:80px;">
          <option value=""></option> 
          <option value="2">Sft</option> 
          <option value="2">Sq. yards</option> 
          <option value="2">Acres</option>
          
</select>
<li><textarea class="textarea" onfocus="if(this.value =='Key Words' ) this.value=''" onblur="if(this.value=='') this.value='Key Words'">Key Words</textarea></li>
<li style="margin-bottom:23px;"><input type="checkbox" />Owners &nbsp;&nbsp; <input type="checkbox" />Agents &nbsp;&nbsp; <input type="checkbox" />Builders</li>

</div>
</div>

<a href="properties_search.php"><input type="submit" value="Search" class="input_button" /></a>

</ul>
</div>
</div>


<div style="display: none;" id="tab3" class="graphictab_content">
<div class="search_form faqs2">
<ul>
<div class="graphictab_content2">
<li style="float:right; margin:-43px 0 0 0;"><input type="radio" name="residencial_type" />Buy <input type="radio" name="residencial_type" />Rent</li>
<li>
<select data-placeholder="Property type" class="chzn-select" multiple style="width:125px;" tabindex="4">
          <option value="Property type"></option> 
          <option value="">Independent House</option>
<option value="">Flat</option>
<option value="">Duplex House</option>
<option value="">Villa</option>
<option value="">Farm House</option>
        </select>
        
        
</li>
<li style="vertical-align:top"><!--<input type="text" value="Price Min" name="residencial_pricemin" onfocus="if(this.value =='Price Min' ) this.value=''" onblur="if(this.value=='') this.value='Price Min'" class="input_box input_box2" />--><select data-placeholder="Price Min" class="chzn-select" tabindex="2" style="width:90px;">
          <option value=""></option> 
          <option value="2">1 Lakh(s)</option> 
          <option value="2">2 Lakh(s)</option> 
          <option value="2">3 Cr(s)</option> 
           <option value="2">4 Cr(s)</option>  
          
</select> <span style="font-size:9px;">&nbsp;To&nbsp;</span>
<select data-placeholder="Price Max" class="chzn-select" tabindex="2" style="width:90px;">
          <option value=""></option> 
          <option value="2">1 Lakh(s)</option> 
          <option value="2">2 Lakh(s)</option> 
          <option value="2">3 Cr(s)</option> 
           <option value="2">4 Cr(s)</option>  
          
</select> 
<!--<input type="text" name="residencial_pricemax" value="Price Max" onfocus="if(this.value =='Price Max' ) this.value=''" onblur="if(this.value=='') this.value='Price Max'" class="input_box input_box2" />--></li>



<li style="position:absolute; top:-310px; left:-202px;">        
<select data-placeholder="Select City" name="residencial_city" class="chzn-select" tabindex="" style="width:120px;">
          <option value=""></option>
          <option value="Hyderabad">Hyderabad</option>
</select>
</li>
<li style="vertical-align:top; margin-right:0px;">
<select data-placeholder="Where in City" class="chzn-select" multiple style="width:120px;" tabindex="4">
          <option value=""></option> 
<option value="6">A C guards</option>
<option value="8">Ambarpet</option>
<option value="9">Asman gadh</option>
<option value="11">Adarsh nagar</option>
<option value="12">Alliabad</option>
<option value="13">A S rao nagar</option>
<option value="14">Alwal</option>
<option value="15">Ashok nagar</option>
<option value="16">Attapur</option>
<option value="17">Airport road</option>
<option value="18">Ameerpet</option>
<option value="19">Aanad nagar colony</option>
<option value="20">Asif nagar</option>
<option value="21">Almas guda</option>
<option value="22">B N reddy nagar</option>
        </select>
</li>
</div>

<div style="margin-left:31px;"><h3>Advanced Search </h3>
<div style="display: none;">
<div class="special_cond2">
<li></li>
<li></li>
<li><label style="width:120px; float:left;">VERIFIED PROPERTIES </label>
<select data-placeholder="Select" class="chzn-select" style="width:115px;" tabindex="4">
<option value=""></option> 
<option value="">Select</option>
<option value="">Yes</option>
<option value="">No</option>
</select>
</li>

<li><label style="width:120px; float:left;">AUCTION </label>
<select data-placeholder="Select" class="chzn-select" style="width:115px;" tabindex="4">
<option value=""></option> 
<option value="">Select</option>
<option value="">Yes</option>
<option value="">No</option>
</select>
</li>
<li></li>
<li></li>
<li></li>

<!--<li><label style="width:120px; float:left;">GATED COMMUNITY </label>
<select data-placeholder="Select" class="chzn-select" style="width:115px;" tabindex="4">
<option value=""></option>
<option value="">Select</option>
<option value="">Yes</option>
<option value="">No</option>
</select>
</li>

<li><label style="width:120px; float:left;">RENTAL PURPOSE </label>
<select data-placeholder="Select" class="chzn-select" style="width:115px;" tabindex="4">
<option value=""></option>
<option value="">Select</option>
<option value="">Yes</option>
<option value="">No</option>
</select>
</li>

<li><label style="width:120px; float:left;">TRANSACTION TYPE</label>
<select data-placeholder="Select" class="chzn-select" style="width:115px;" tabindex="4">
<option value=""></option>
<option value="">Select</option>
<option value="">New Property</option>
<option value="">Resale</option>
</select>
</li>

<li><label style="width:120px; float:left;">POSSESSION STATUS </label>
<select data-placeholder="Select" class="chzn-select" style="width:115px;" tabindex="4">
<option value=""></option>
<option value="">Select</option>
<option value="">Under Construction</option>
<option value="">Ready to Occupy</option>
</select>
</li>-->
</div>
<li>
<input type="text" class="input_box input_box2" value="Area Min" onfocus="if(this.value =='Area Min' ) this.value=''" onblur="if(this.value=='') this.value='Area Min'" style="width:45px;"  />
To <input type="text" class="input_box input_box2" value="Area Max" onfocus="if(this.value =='Area Max' ) this.value=''" onblur="if(this.value=='') this.value='Area Max'" style="width:48px;"  />
<select data-placeholder="Units" class="chzn-select" tabindex="2" style="width:80px;">
          <option value=""></option> 
          <option value="2">Sft</option> 
          <option value="2">Sq. yards</option> 
          <option value="2">Acres</option>
          
</select>
<li><textarea class="textarea" onfocus="if(this.value =='Key Words' ) this.value=''" onblur="if(this.value=='') this.value='Key Words'">Key Words</textarea></li>
<li style="margin-bottom:23px;"><input type="checkbox" />Owners &nbsp;&nbsp; <input type="checkbox" />Agents <!--&nbsp;&nbsp; <input type="checkbox" />Builders--></li>

</div>
</div>

<a href="properties_search_ag.php"><input type="submit" value="Search" class="input_button" /></a>

</ul>
</div>
</div>


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