<?php
session_start();
include('nyambungterus.php');
include('sql_userdata.php');

if(!isset($_POST['search'])){

}
else{
$string = $_POST['search'];
$searchkey= str_replace(" ","%", $string);
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tovioo - Do it, Done it!</title>
<link href="main.css" rel="stylesheet" type="text/css" />
</head>

<body background="<? echo "userdata/wallpaper/".$background_image; ?>" STYLE="background-repeat:no-repeat;background-attachment:fixed" >
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
    
<div class="search right"><form method="post" action="result.php"><input type="text" name="search" size="20" value="Search" onfocus="if(value=='Search'){value='';}" onblur="if(value==''){value='Search';}"/><input type="submit" value="" class="btnarrow"/></form></div>
</div>
</div>
<div class="clearfix"></div>
<!--CONTENT-->
<div class="content">
<!--left content-->
<div class="left-content"><br />
<div style="margin-top:20px;"></div>
<? include("result_kiri.php");?>
<!--<div class="sender"><div class="sender-pict"><img src="userdata/picture/cosmogirl.png" width="80px" height="80px" /></div><div class="sender-info"><h1>$first_name $last_name</h1><br /><h2>$sent_date</h2><br />
<h3>One of Australia's most sought after female DJ's. Has her international career as a full time DJ residency at Barasti Beach Bar, Dubai.</h3>
</div></div>-->
<div class="clearfix"></div>


     </div>
<!--right content-->
<div class="right-content">

<div style="margin-top:30px;"></div>
<? include("result_kanan.php");?>

<!--<div class="msg-kanan"><div class="msg-kanan-pict"><img src=\"userdata/picture/$userimage\" width=\"80px\" height=\"80px\" /></div>
<div class="msg-kanan-detail">$nama_pengirim $nama_pengirim2 <br />$messages</div></div>
<div class="clearfix"></div>-->


</div>
</body>
</html>