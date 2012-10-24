<?php
session_start();
include('nyambungterus.php');
include('sql_userdata.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tovioo - Done it!</title>
<link href="main.css" rel="stylesheet" type="text/css" />

<!--JQUERY DATEPICKER-->
	<link rel="stylesheet" href="themes/smoothness/jquery.ui.all.css">
	<script src="jquery-1.5.1.js"></script>
	<script src="ui/jquery.ui.core.js"></script>
	<script src="ui/jquery.ui.widget.js"></script>
	<script src="ui/jquery.ui.datepicker.js"></script>
	<script src="ui/jquery.ui.tabs.js"></script>
	<link rel="stylesheet" href="demos.css">
	<script>
    $(function() {
        $("#tanggal").datepicker({
			dateFormat: "dd-mm-yy"
		});
		$( "#tabs" ).tabs();
		$( "#tabs-kanan" ).tabs();
    });
</script>

<!--script buat max char-->
<script type="text/javascript"?>
$(document).ready(function(){
    $('#shout').keyup(function(){ var limit = $(this).attr('maxlength'); ($(this).val().length < limit) ? $('.charsLeft').html(limit-$(this).val().length) : $(this).val($(this).val().substr(0,limit)) + $('.charsLeft').html('<span style="color:#ff0000;">0</span>');});
});
</script>
</head>

<body style="background:url(<? echo "userdata/wallpaper/".$background_image; ?>);background-repeat:repeat;" >
<!-- Header-->
<div class="header">
<div class="menu">
<div class="logo"><a href="home.php"><img src="images/logo2.png" border="0"/></a></div>
<div class="tanggal"><? echo date("l, d F Y"); ?></div>

<script language="JavaScript">
	window.onload = function()
	{
		var lis = document.getElementById('cssdropdown').getElementsByTagName('li');
		for(i = 0; i < lis.length; i++)
		{
			var li = lis[i];
			if (li.className == 'headlink')
			{
				li.onmouseover = function() { this.getElementsByTagName('ul').item(0).style.display = 'block'; }
				li.onmouseout = function() { this.getElementsByTagName('ul').item(0).style.display = 'none'; }
			}
		}
	}
	/* or with jQuery:
	$(document).ready(function(){
		$('#cssdropdown li.headlink').hover(
			function() { $('ul', this).css('display', 'block'); },
			function() { $('ul', this).css('display', 'none'); });
	});
	*/
</script>

<div class="links right"><ul id="cssdropdown">
		<li class="headlink">
			<a href="home.php">HOME</a>
		</li>
        <li class="headlink">
			<a href="timeline.php">TIMELINE</a>
		</li>
        <li class="headlink">
			<a href="messages.php">MESSAGES<? include("countmsg.php");?></a>
		</li>
		<li class="headlink">
			<a href="#"><!--<?php echo $first_name." ".$last_name; ?>-->ACCOUNT</a>

			<ul>
				<li><a href="setting.php">Setting</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</li>

	</ul></div>
    
<div class="search right"><form method="post" action="result.php"><input type="text" name="search" size="20" value="Search" onfocus="if(value=='Search'){value='';}" onblur="if(value==''){value='Search';}"/>&nbsp;<input type="submit" value="GO" class="submitshout" style="border:1px #FFF solid;"/></form></div>
</div>
</div>
<div class="clearfix"></div>
<!--CONTENT-->
<div class="content">
<!--left content-->
<div class="left-content">
<!--form--><form action="ptask.php" method="post">
<div class="taskform"><input type="radio" name="day" checked="checked"  value="1"/>My activity on <input type="text" name="tanggal" id="tanggal" value="<?php echo date("d-m-Y"); ?>"  /> &nbsp;  &nbsp;or <input type="radio" name="day" value="0"/>My Goal</div>
    <div class="taskform"><textarea class="shout" id ="shout" name="shout" maxlength="160" wrap="virtual" cols="62" rows="2"></textarea><br /><!--<p class="charsRemaining"></p>--><span class="charsLeft" style="float:left; color:#ccc; font-size:22px; text-align:right; padding-top:5px;">160</span></div>
	<div style="position:relative;float:right; padding: 7px 40px 0 0;" class="tahoma10"><input type="radio" name="publish_type" value="1" checked="checked" />Share with network&nbsp;&nbsp;<input type="radio" name="publish_type" value="0"/>Don't share&nbsp;&nbsp;<input type="submit" value="Submit" class="submitshout"/></div></form>
<!-- end form -->
<div class="clearfix"></div>

<div class="task-tab">
<div id="tabs">
	<ul>
		<li><a href="#tabs-1"><img src="images/tab-today-100x30.png" /></a></li>
		<li><a href="#tabs-2"><img src="images/tab-tomorrow-100x30.png" /></a></li>
		<li><a href="#tabs-3"><img src="images/tab-goals-100x30.png" /></a></li>
        <li><a href="#tabs-4"><img src="images/tab-check-100x30.png" /></a></li>
	</ul>
	<div id="tabs-1">
		<h2>Today</h2>
            <h3><? echo date("l, d F Y"); ?></h3><br />
<br />

			<?php include("today.php"); ?>
	</div>
	<div id="tabs-2">
		<h2>Tomorrow</h2>
            <h3><?php $tomorrow = mktime(0, 0, 0, date("m"), date("d")+1, date("y"));
echo date("l, d F Y", $tomorrow); ?></h3><br /><br />

			<?php include("tomorrow.php"); ?>
	</div>
	<div id="tabs-3">
		<h2>Goals</h2><br /><br />


          	
            <?php include("goals.php"); ?>
	</div>
    <div id="tabs-4">
		<h2>Things you've done</h2><br /><br />


        <?php include("done.php"); ?>
          	
            
	</div>
</div>
</div>
     </div>
<!--right content-->
<div class="right-content">
<div class="userprofile"><div class=" userphoto"><a href="setting.php"><img src="userdata/picture/<?php echo $userimage ?>" width="100px" height="100px;" border="0"/></a></div>
<div class="userdetail"><p><h1><a href="setting.php"><?php echo $first_name." ".$last_name; ?></a>&nbsp;<? echo $imgpremium; ?></h1></p><p><h2 class="tov-blue"><?php echo $city.", ".$country; ?></h2></p><p></p><p><?php echo "<i class=\"palatino12\">$biography</i>"; ?></p><p class="userweb"><a href="<?php echo $website; ?>"><?php echo $website; ?></a></p></div>
</div>
<div class="clearfix"></div>
<div class="network-tab">
<div id="tabs-kanan">
	<ul>
		<li><a href="#tabs-x">Share With You</a></li>
		<li><a href="#tabs-y">Network</a></li>
		
	</ul>
	<div id="tabs-x">         
			<?php include("networkv.php"); ?>
	</div>
	<div id="tabs-y">
		<h2>Network (<? include("countfriend.php");?>)</h2><br /><br />

           

			<?php include("sql_friendlist.php"); ?>
            
<!--			<? include("suggest2.php"); ?>-->
	</div>

</div>
</div>


</div>
</body>
</html>