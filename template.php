<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tovioo - Do it, Done it!</title>

<link href="main.css" rel="stylesheet" type="text/css" />
</head>

<body background="images/adam.jpg" STYLE="background-repeat:no-repeat;background-attachment:fixed" >
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
			<a href="messages.php">MESSAGES</a>
		</li>
		<li class="headlink">
			<a href="#"><!--<?php echo $first_name." ".$last_name; ?>-->ACCOUNT</a>

			<ul>
				<li><a href="setting.php">Setting</a></li>
				<li><a href="logout.php">Logout</a></li>
			</ul>
		</li>

	</ul></div>
    
<div class="search right"><form><input type="text" name="search" size="20" value="Search" onfocus="if(value=='Search'){value='';}" onblur="if(value==''){value='Search';}"/><input type="submit" value="GO" /></form></div>
</div>
</div>
<div class="clearfix"></div>
<!--CONTENT-->
<div class="content">
<!--left content-->
<div class="left-content">aaaaaaaaaaa </div>
<!--right content-->
<div class="right-content">aaaaaaaaaaa </div>

</div>
</body>
</html>