<?php 
include("include/session.php");
	global $database;
if($session->logged_in){
 	if($session->isAdmin()){
		header("Location:admin/home.html");
	}else {
		header("Location:index_properties.php");
	}
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

<div class="logo"><a href="#"><img src="images/logo.png" alt="Redail Logo" align="left" /></a></div>


<div class="login_bg">
<div class="login_inner">
<div class="login_form">
<form action="process.php" method="post">
<ol>
<li><input type="text" name="Firstname" class="input" onfocus="if(this.value =='User name' ) this.value=''" onblur="if(this.value=='') this.value='User name'" value="User name" /></li>
<li><input type="password" name="Password" class="input" onfocus="if(this.value =='Password' ) this.value=''" onblur="if(this.value=='') this.value='Password'" value="Password" /></li>
<li class="buttons" style="float:right;">
<input type="hidden" name="sublogin" value="1" />
<input  type="submit" value="LOGIN" class="login_btn"/></li>
<p class="forgot"><a href="forgotps.html">forgot password</a></p><p class="error"><?php echo $form->error("Fristname"); ?><?php echo $form->error("Password"); ?></p>
</ol>
</form>
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