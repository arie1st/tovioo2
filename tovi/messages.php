<?php
session_start();
include('nyambungterus.php');
include('sql_userdata.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tovioo - Do it, Done it!</title>
<link href="main.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="jquery-latest.pack.js"></script>
<script type="text/javascript" src="thickbox.js"></script>
<link rel="stylesheet" href="thickbox.css" type="text/css" media="screen" />



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
<div class="left-content"><br />
<div style="margin-top:20px;"></div>
<? include("sql_msg_kiri.php");?>
<!--<div class="sender"><div class="sender-pict"><img src="userdata/picture/cosmogirl.png" width="80px" height="80px" /></div><div class="sender-info"><h1>$first_name $last_name</h1><br /><h2>$sent_date</h2><br />
<h3>One of Australia's most sought after female DJ's. Has her international career as a full time DJ residency at Barasti Beach Bar, Dubai.</h3>
</div></div>-->
<div class="clearfix"></div>


     </div>
<!--right content-->
<div class="right-content">
<div style="float:left;margin-top:30px"><a href="newmessage.php?height=220&width=400" class="thickbox" title="" ><img src="images/newmsg.png" /></a> &nbsp;&nbsp;&nbsp;
<?
if (!isset($_GET['s'])) {
    echo "";
}
else{
	if($_GET['s']=="101"){
		echo"<br/><br/><span class=\"tov-blue \" style=\"margin-left:5px;font-family:Tahoma, Geneva, sans-serif; font-size:12px;\" >Message sent!!</span>";
	}
	elseif($_GET['s']=="100"){
	echo"<br/><br/><div class=\"width:400px; margin:0 auto;\"><p style=\"margin-left:5px; margin-bottom:5px;font-family:Tahoma, Geneva, sans-serif; font-size:12px; color:red;line-height:1.2em;\" >Error!! :Your message cannot be sent.</p>

<p style=\"margin-left:5px;font-family:Tahoma, Geneva, sans-serif; font-size:12px; color:red;line-height:1.2em;\" >It could because the user is not exist or you are not on their network.</p></div><div class=\"clearfix\"></div>";	
	}
}
?>
</div>
<div class="clearfix"></div>
<?
//$dest = 
if (!isset($_GET['to'])) {
    echo "";
}
else{
echo"
<!--form--><form action=\"p_send_message.php?to=$_GET[to]\" method=\"post\">
    <div class=\"taskform\"><textarea class=\"shout\" id =\"shout\" name=\"msgform\" maxlength=\"160\" wrap=\"virtual\" cols=\"42\" rows=\"2\"></textarea><br /><!--<p class=\"charsRemaining\"></p>--><span class=\"charsLeft\" style=\"float:left; color:#ccc; font-size:22px; text-align:right; padding-top:5px;\">160</span></div>
	<div style=\"position:relative;float:right; padding: 7px 10px 0 0;\" class=\"tahoma10\"><input type=\"submit\" value=\"Submit\" class=\"submitshout\"/></div></form>
<!-- end form -->
<div class=\"clearfix\"></div>";
}
?>
<div style="margin-top:20px;"></div>

<? include("sql_message_kanan.php"); ?>
<!--<div class="msg-kanan"><div class="msg-kanan-pict"><img src=\"userdata/picture/$userimage\" width=\"80px\" height=\"80px\" /></div>
<div class="msg-kanan-detail">$nama_pengirim $nama_pengirim2 <br />$messages</div></div>
<div class="clearfix"></div>-->


</div>
</body>
</html>