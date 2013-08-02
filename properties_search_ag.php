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

<link rel="stylesheet" href="css/chosen.css" />
<script src="js/jquery-1.8.0.min.js"></script>


<link href="css/modal.css" rel="stylesheet" type="text/css" />

</head>

<body>
<div id="warp">

<div class="logo"><a href="index_properties.html"><img src="images/logo.png" alt="Redail Logo" /></a></div>

<span style="float:right; font-size:11px; padding-top:3px;">&nbsp;&nbsp;&nbsp; Naresh &nbsp;&nbsp;|&nbsp;&nbsp; <a href="#">Logout</a></span>
<div class="top_menu">
<a href="messagehistory.html">S & S History</a>|
<a href="appointments.html">Appointments</a>|
<a href="agents/agents_new.html">Bulk</a>|
<a href="buyers.html">Buyers</a>|
<a href="complaintbox.html">Complaints</a>|
<a href="domods.html">Do-Mod's</a>|
<a href="msms.html">M-SMS</a>
</div>

<div class="top_icons" style="float:left; margin:40px 0 0 250px;">
<a href="properties_add.html"><img src="images/list_property.png" alt="List Property" /><br />List property</a>
</div>

<!--<div class="connect_people">Connecting properties & people in one dial <br />
<a href="#">040 - 22222224</a></div>-->

<ul id="nav-reflection2">
<li><a href="index_properties.html" class="active">Properties</a></li>
<li class="button-color-1"><a href="index_projects.html">Projects</a></li>		
</ul>

<div style="width:100%; float:left;">

<div class="main_hed" style="margin-top:0px;">Properties > Agriculture > <span>Search List</span> <!--<div class="inner_menu"><a href="#" class="active">Residential</a>|<a href="#">Commercial</a>|<a href="#" style="padding-right:0px;">Agriculture</a>
</div>--></div>



<div class="right_body2">
<!--<div class="search_bg" style="float:left;">
<input type="text" class="src_input" onfocus="if(this.value =='Search ID, Phone & Name' ) this.value=''" onblur="if(this.value=='') this.value='Search ID, Phone & Name'" value="Search ID, Phone & Name" />
<input type="button" class="src_btn" />
</div>-->


<div class="search_form" style="margin-top:0px; padding:0px; width:235px; float:left;">
<ul>
<!--<h5 style="margin-top:0px;">Refine Search</h5>-->

<li>
<select data-placeholder="Property type" class="chzn-select" multiple style="width:225px;" tabindex="4">
          <option value="Property type"></option> 
          <option value="">Independent House</option>
<option value="">Flat</option>
<option value="">Duplex House</option>
<option value="">Villa</option>
<option value="">Farm House</option>
        </select>
</li>

<!--<li style="margin-top:3px;"><select data-placeholder="Bed Rooms" class="chzn-select" multiple style="width:225px;" tabindex="4">
          <option value="Property type"></option> 
          <option value="">1</option>
<option value="">2</option>
<option value="">3</option>
<option value="">4</option>
<option value="">5</option>
<option value="">6</option>
<option value="">6+</option>
        </select></li>-->
<li style="vertical-align:top"><select data-placeholder="Price Min" class="chzn-select" tabindex="2" style="width:102px;">
          <option value=""></option> 
          <option value="2">1 Lakh(s)</option> 
          <option value="2">2 Lakh(s)</option> 
          <option value="2">3 Cr(s)</option> 
           <option value="2">4 Cr(s)</option>  
          
</select> <span style="font-size:9px;">&nbsp;To&nbsp;</span>
<select data-placeholder="Price Max" class="chzn-select" tabindex="2" style="width:102px;">
          <option value=""></option> 
          <option value="2">1 Lakh(s)</option> 
          <option value="2">2 Lakh(s)</option> 
          <option value="2">3 Cr(s)</option> 
           <option value="2">4 Cr(s)</option>  
          
</select>

<li style="vertical-align:top; margin-right:0px;">

<select data-placeholder="Where in City" class="chzn-select" multiple style="width:225px;" tabindex="4">
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

<li>
<input type="text" class="input_box input_box2" value="Area Min" onfocus="if(this.value =='Area Min' ) this.value=''" onblur="if(this.value=='') this.value='Area Min'" style="width:55px;"  />
To <input type="text" class="input_box input_box2" value="Area Max" onfocus="if(this.value =='Area Max' ) this.value=''" onblur="if(this.value=='') this.value='Area Max'" style="width:55px;"  />
<select data-placeholder="Units" class="chzn-select" tabindex="2" style="width:70px;">
          <option value=""></option> 
          <option value="2">Sft</option> 
          <option value="2">Sq. yards</option> 
          <option value="2">Acres</option>
          
</select>

</li>

<div class="special_cond3" style="margin-bottom:10px;">
<li><label style="width:105px; float:left;">VERIFIED PROPERTIES</label>
<select data-placeholder="Select" class="chzn-select" style="width:110px;" tabindex="4">
<option value=""></option>
<option value="">Select</option>
<option value="">Yes</option>
<option value="">No</option>
</select>
</li>
<li><label style="width:105px; float:left;">AUCTION</label>
<select data-placeholder="Select" class="chzn-select" style="width:110px;" tabindex="4">
<option value=""></option>
<option value="">Select</option>
<option value="">Yes</option>
<option value="">No</option>
</select>
</li>

<!--<li><label style="width:105px; float:left;">GATED COMMUNITY</label>
<select data-placeholder="Select" class="chzn-select" style="width:110px;" tabindex="4">
<option value=""></option>
<option value="">Select</option>
<option value="">Yes</option>
<option value="">No</option>
</select>
</li>

<li><label style="width:105px; float:left;">RENTAL PURPOSE</label>
<select data-placeholder="Select" class="chzn-select" style="width:110px;" tabindex="4">
<option value=""></option>
<option value="">Select</option>
<option value="">Yes</option>
<option value="">No</option>
</select>
</li>

<li><label style="width:105px; float:left;">TRANSACTION TYPE</label>
<select data-placeholder="Select" class="chzn-select" style="width:110px;" tabindex="4">
<option value=""></option>
<option value="">Select</option>
<option value="">New Property</option>
<option value="">Resale</option>
</select>
</li>

<li><label style="width:105px; float:left;">POSSESSION STATUS</label>
<select data-placeholder="Select" class="chzn-select" style="width:110px;" tabindex="4">
<option value=""></option>
<option value="">Select</option>
<option value="">Under Construction</option>
<option value="">Ready to Occupy</option>
</select>
</li>-->

</div>

<li><input type="checkbox" />Owners &nbsp;&nbsp; <input type="checkbox" />Agents</li>

<li><textarea class="textarea" onfocus="if(this.value =='Key Words' ) this.value=''" onblur="if(this.value=='') this.value='Key Words'" style="width:220px; height:30px;">Key Words</textarea></li>
<input type="submit" value="Search" class="input_button" style="margin:0px;" />

</ul>
</div>



</div>

<div class="left_body">

<div class="search_results">
<div style="position:absolute; right:0"><input type="checkbox" /></div>
<div class="div star">***</div>
<div class="div userid">RE 01</div>
<a href="#history"><div class="div more">History</div></a>
<a href="#edit"><div class="div more">more</div></a>
<img src="images/rd.png" align="left" style="margin:5px 0 0 10px;" />
<img src="images/icon_1.png" align="left" style="margin:5px 0 0 10px;" />
<img src="images/icon_2.png" align="left" style="margin:5px 0 0 10px;" />
<img src="images/icon_3.png" align="left" style="margin:5px 0 0 10px;" />
<img src="images/icon_4.png" align="left" style="margin:5px 0 0 10px;" />
<img src="images/icon_5.png" align="left" style="margin:5px 0 0 10px;" />
<br /><br />
<div class="div requirment">3 BHK, Konark Towers, Dilsukhnagr, Hyderabad 500 060.</div>
<div style="float:left;">
<div class="div propertytype">Independent house</div>
<div class="div area">250 Sq. yards</div>
</div>
<div style="float:left;">
<div class="div city">Hyderabad</div>
<div class="div whareincity">Dilsukhnagar</div>
</div>
<div style="float:left;">
<div class="div price">18 Lakh(s)</div>
<div class="div contactno">9705774932</div>
</div>

</div>
<div class="search_results">
<div style="position:absolute; right:0"><input type="checkbox" /></div>
<div class="div star">***</div>
<div class="div userid">RE 01</div>
<a href="#history"><div class="div more">History</div></a>
<a href="#edit"><div class="div more">more</div></a>
<img src="images/rd.png" align="left" style="margin:5px 0 0 10px;" />
<img src="images/icon_1.png" align="left" style="margin:5px 0 0 10px;" />
<img src="images/icon_2.png" align="left" style="margin:5px 0 0 10px;" />
<img src="images/icon_3.png" align="left" style="margin:5px 0 0 10px;" />
<img src="images/icon_4.png" align="left" style="margin:5px 0 0 10px;" />
<img src="images/icon_5.png" align="left" style="margin:5px 0 0 10px;" />
<br /><br />
<div class="div requirment">3 BHK, Konark Towers, Dilsukhnagr, Hyderabad 500 060.</div>
<div style="float:left;">
<div class="div propertytype">Independent house</div>
<div class="div area">250 Sq. yards</div>
</div>
<div style="float:left;">
<div class="div city">Hyderabad</div>
<div class="div whareincity">Dilsukhnagar</div>
</div>
<div style="float:left;">
<div class="div price">18 Lakh(s)</div>
<div class="div contactno">9705774932</div>
</div>

</div>
<div class="search_results">
<div style="position:absolute; right:0"><input type="checkbox" /></div>
<div class="div star">***</div>
<div class="div userid">RE 01</div>
<a href="#history"><div class="div more">History</div></a>
<a href="#edit"><div class="div more">more</div></a>
<img src="images/rd.png" align="left" style="margin:5px 0 0 10px;" />
<img src="images/icon_1.png" align="left" style="margin:5px 0 0 10px;" />
<img src="images/icon_2.png" align="left" style="margin:5px 0 0 10px;" />
<img src="images/icon_3.png" align="left" style="margin:5px 0 0 10px;" />
<img src="images/icon_4.png" align="left" style="margin:5px 0 0 10px;" />
<img src="images/icon_5.png" align="left" style="margin:5px 0 0 10px;" />
<br /><br />
<div class="div requirment">3 BHK, Konark Towers, Dilsukhnagr, Hyderabad 500 060.</div>
<div style="float:left;">
<div class="div propertytype">Independent house</div>
<div class="div area">250 Sq. yards</div>
</div>
<div style="float:left;">
<div class="div city">Hyderabad</div>
<div class="div whareincity">Dilsukhnagar</div>
</div>
<div style="float:left;">
<div class="div price">18 Lakh(s)</div>
<div class="div contactno">9705774932</div>
</div>

</div>
<div class="search_results">
<div style="position:absolute; right:0"><input type="checkbox" /></div>
<div class="div star">***</div>
<div class="div userid">RE 01</div>
<a href="#history"><div class="div more">History</div></a>
<a href="#edit"><div class="div more">more</div></a>
<img src="images/rd.png" align="left" style="margin:5px 0 0 10px;" />
<img src="images/icon_1.png" align="left" style="margin:5px 0 0 10px;" />
<img src="images/icon_2.png" align="left" style="margin:5px 0 0 10px;" />
<img src="images/icon_3.png" align="left" style="margin:5px 0 0 10px;" />
<img src="images/icon_4.png" align="left" style="margin:5px 0 0 10px;" />
<img src="images/icon_5.png" align="left" style="margin:5px 0 0 10px;" />
<br /><br />
<div class="div requirment">3 BHK, Konark Towers, Dilsukhnagr, Hyderabad 500 060.</div>
<div style="float:left;">
<div class="div propertytype">Independent house</div>
<div class="div area">250 Sq. yards</div>
</div>
<div style="float:left;">
<div class="div city">Hyderabad</div>
<div class="div whareincity">Dilsukhnagar</div>
</div>
<div style="float:left;">
<div class="div price">18 Lakh(s)</div>
<div class="div contactno">9705774932</div>
</div>

</div>

<div class="pagination" style="float:left;">
<a href="#" class="numbers">Prev</a>
<a href="#" class="numbers active">1</a>
<a href="#" class="numbers">2</a>
<a href="#" class="numbers">3</a>
<a href="#" class="numbers">4</a>
<a href="#" class="numbers">Next</a>
</div>

<div style="margin:15px 28px 0 0; float:right;"><a href="properties_search_result_ag.html"><input type="submit" value="Go" class="search_btn" name="Go"/></a> </div>
<p style="float:right; font-size:13px; margin-top:16px;">&nbsp; <input type="checkbox" /> 8 PR &nbsp;&nbsp; <input type="checkbox" />12 PR &nbsp;</p>


<!--<div id="form">
<ol>
<div class="search_notfound">
<div class="errormsg2">Search Not Found</div><br /><br />

<p><li><label style="width:150px;">Mobile Number</label><input type="text" class="input" /></li></p>
<p><li><label style="width:150px;">Name</label><input type="text" class="input" /></li></p>
<p><li><label style="width:150px;">Email Id</label><input type="text" class="input" /></li></p>
<p><li class="buttons" style="float:right; margin-right:35px; margin-top:-10px;"><a href="#"><input  type="submit" value="SAVE" class="input_btn"/></a></li></p>

</div>
</ol>
</div>-->
</div>


</div>

</div>


<a href="#x" class="overlay" id="edit"></a>
<div class="popup">
<div class="search_results" style="margin:0px;">
<div class="div star">***</div>
<div class="div userid">PRRSod190</div>
<img src="images/rd.png" align="left" style="margin:5px 0 0 10px;" />
<img src="images/icon_1.png" align="left" style="margin:5px 0 0 10px;" />
<img src="images/icon_2.png" align="left" style="margin:5px 0 0 10px;" />
<img src="images/icon_3.png" align="left" style="margin:5px 0 0 10px;" />
<img src="images/icon_4.png" align="left" style="margin:5px 0 0 10px;" />
<img src="images/icon_5.png" align="left" style="margin:5px 0 0 10px;" />
<br /><br />
<div class="div requirment">redial65</div>
<div style="float:left;">
<div class="div propertytype">DuplexHouse</div>
<div class="div area">880 Sq.yrds</div>
</div>
<div style="float:left;">
<div class="div city">Hyderabad</div>
<div class="div whareincity">Champapet</div>
</div>
<div style="float:left;">
<div class="div price">1.6 Lakh(s)</div>
<div class="div contactno">5 Bed rooms</div>
</div>
<div style="float:left;"><div class="div price">Naresh</div>
<div class="div whareincity">9705774932</div>
</div>
<div style="float:left;"><div class="div price" style="width:360px;">naresh.bond997@gmail.com</div></div>
<div style="float:left;"><div class="div whareincity">Owner</div><div class="div price">1500 Rs</div></div>
<div style="float:left;"><div class="div contactno">Cash</div><div class="div price">123456</div></div>
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