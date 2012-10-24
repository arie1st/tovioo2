<?php
session_start();
include('nyambungterus.php');
include('sql_userdata.php');
include("sql_profile.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tovioo - Do it, Done it!</title>
<link href="main.css" rel="stylesheet" type="text/css" />

<!--JQUERY DATEPICKER-->
	<link rel="stylesheet" href="themes/smoothness/jquery.ui.all.css">
	<script src="jquery-1.5.1.js"></script>
	<script src="ui/jquery.ui.core.js"></script>
	<script src="ui/jquery.ui.widget.js"></script>
	<script src="ui/jquery.ui.tabs.js"></script>
	<link rel="stylesheet" href="demos.css">
	<script>
    $(function() {
       	$( "#tabs" ).tabs();
		$( "#tabs-kanan" ).tabs();
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

<div class="clearfix"></div>

<div class="task-tab" style="margin-top:20px;">
<div id="tabs">
	<ul>
		<li><a href="#tabs-1"><img src="images/tab-today-100x30.png" /></a></li>
		<li><a href="#tabs-2"><img src="images/tab-tomorrow-100x30.png" /></a></li>
		<li><a href="#tabs-3"><img src="images/tab-goals-100x30.png" /></a></li>
        <li><a href="#tabs-4"><img src="images/tab-check-100x30.png" /></a></li>
	</ul>
	<div id="tabs-1">
		<h2>Today</h2>
            <h3><? echo date("l, d F Y"); ?></h3>
			<?php include("sql_p_today.php"); ?>
	</div>
	<div id="tabs-2">
		<h2>Tomorrow</h2>
            <h3><?php $tomorrow = mktime(0, 0, 0, date("m"), date("d")+1, date("y"));
echo date("l, d F Y", $tomorrow); ?></h3>

			<?php include("sql_p_tomorrow.php"); ?>
	</div>
	<div id="tabs-3">
		<h2>Goals</h2>
          	
            <?php include("sql_p_goal.php"); ?>
	</div>
    <div id="tabs-4">
		<h2>Things you've done</h2>
        <?php include("sql_p_done.php"); ?>
          	
            
	</div>
</div>
</div>
     </div>
<!--right content-->
<div class="right-content">
<div class="userprofile"><ul><? include("sql_p_msgbutton.php"); ?></ul></div>
<div class="userprofile"><div class=" userphoto"><img src="userdata/picture/<?php echo $pr_userimage ?>" width="100px" height="100px;"/></div>
<div class="userdetail"><p><h1><?php echo $pr_first_name." ".$pr_last_name; ?></h1></p><p><h2><?php echo $pr_city.", ".$pr_country; ?></h2></p><p></p><p><?php echo "<i class=\"palatino12\">$pr_biography</i>"; ?></p><p class="userweb"><a href="<?php echo $pr_website; ?>"><?php echo $pr_website; ?></a></p></div>
</div>
<div class="clearfix"></div>
<div class="network-tab">
<div id="tabs-kanan">
	<ul>
				<li><a href="#tabs-y"><img src="images/network-100x30.png"/></a></li>
		
	</ul>
	<div id="tabs-y">
		<h2>Friends (<? include("pcountfriend.php");?>)</h2><br />

           

			<?php include("sql_p_friendlist.php"); ?>
	</div>

</div>
</div>


</div>
</body>
</html>