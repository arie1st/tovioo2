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

<!--JQUERY DATEPICKER-->
	<link rel="stylesheet" href="themes/smoothness/jquery.ui.all.css">
	<script src="jquery-1.5.1.js"></script>
	<script src="ui/jquery.ui.core.js"></script>
	<script src="ui/jquery.ui.widget.js"></script>
	<script src="ui/jquery.ui.datepicker.js"></script>
	<script src="ui/jquery.ui.tabs.js"></script><br />
	<link rel="stylesheet" href="demos.css">
	<script>
    $(function() {
        $("#birthday").datepicker({
			dateFormat: "dd-mm-yy",
			changeMonth: true,
			changeYear: true,
			yearRange: '1900:2012'
		});
		$( "#tabs" ).tabs();
		$( "#tabs-kanan" ).tabs();
	
    });
</script>

<!--script buat max char-->
<script type="text/javascript"?>
$(document).ready(function(){
    $('#bio').keyup(function(){ var limit = $(this).attr('maxlength'); ($(this).val().length < limit) ? $('.charsLeft').html(limit-$(this).val().length) : $(this).val($(this).val().substr(0,limit)) + $('.charsLeft').html('<span style="color:#ff0000;">0</span>');});
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

<div class="task-tab">
<div id="tabs">
	<ul>
		<li><a href="#tabs-1"><img src="images/Profile.png" /></a></li>
		<li><a href="#tabs-2"><img src="images/Account.png" /></a></li>
		<li><a href="#tabs-3"><img src="images/Background.png" /></a></li>
        
	</ul>
	<div id="tabs-1">
		<div class="setting"><form enctype="multipart/form-data" action="p_profile.php" method="post"><ul>
        <li><label>Pictures</label><img src="userdata/picture/<? echo $userimage; ?>" width="80px" height="80px" /><br /><br />

            <div style="float:left;margin-left:200px; "><a href="deletepicture.php?id=<? echo $iduser; ?>" class="bluelink">Delete this image</a></div></li>
        <li><label>&nbsp;</label><input type="file" name="pictures" class="dashed" size="30" /><br />
<div style="float:left;margin-left:200px; ">Recommended size 100px x 100px of<br />
 maximum size of 800k<br />
JPG, GIF or PNG.</div><div class="clearfix"></div></li>
        <li><label>First name</label><input type="text" name="firstname" class="dashed" size="36" value="<? echo $first_name;?>" /></li>
        <li><label>Last name</label><input type="text" name="lastname" class="dashed" size="36" value="<? echo $last_name?>" /></li>
        <li><label>Website</label><input type="text" name="website" class="dashed" size="36" value="<? echo $website; ?>" /></li>
        <li><label>City</label><input type="text" name="city" class="dashed" size="36" value="<? echo $city; ?>" /></li>
        <li><label>Country</label><input type="text" name="country" id ="country" class="dashed" size="36" value="<? echo $country; ?>" /></li>
        <li><label>Birthday</label><input type="text" name="birthday" id="birthday" class="dashed" size="36" value="<? $tgl = $birthdate;
$pdd =  substr($tgl,-2);
$pmm =	substr($tgl,5,2);
$pyy =	substr($tgl,0,4);

$newtg= $pdd."-".$pmm."-".$pyy;

echo $newtg; ?>" /></li>
        <li><label>Gender</label><input type="radio" name="gender" value="M" checked="checked" />Male<input type="radio" name="gender" value="F" />Female</li>
        <li><label>Bio</label><textarea name="bio" id="bio" class="dashed"  rows="3" cols="33" wrap="virtual" maxlength="160"><? echo $biography; ?></textarea><br />

<span class="charsLeft" style="float:left; margin-left:205px; margin-top:2px;">160</span></li>
        <li><label>&nbsp;</label><input type="submit" name="submit" value="UPDATE"  class="bgbut"/></li>
        </ul></form></div>
	</div>
	<div id="tabs-2">
		<div class="setting"><form method="post" action="p_account.php"><ul>
        <li><?php include ("p_account_notice.php"); ?> </li>
        <li><span class="tov-blue">Change Password</span></li>
        <li><label>Old Password</label><input type="password" name="oldpass" class="dashed" size="36"/></li>
        <li><label>New Password</label><input type="password" name="newpass" class="dashed" size="36"/></li>
 		<li><span class="tov-blue">Change Email</span></li>
        <li><label>Old Email</label><input type="text" name="oldemail" class="dashed" size="36"/></li>
        <li><label>New Email</label><input type="text" name="newemail" class="dashed" size="36"/></li>
        <li><a href="deactivate.php" style="text-decoration:none;"><span class="tov-blue">Deactivate account?</span></a></li>
        <li><label>&nbsp;</label><input type="submit" name="submit" value="UPDATE"  class="bgbut"/></li>
        </ul></form></div>
	</div>
	<div id="tabs-3">
		<h2>Choose your own background</h2>
          	
            <div class="setting" style="margin-top:20px;"><form enctype="multipart/form-data" method="post" action="p_background.php"><ul><li><input type="file" name="bgpicture" class="dashed"/><br />
            Recommended size more than 1024px x 768px of<br />
 maximum size of 800k<br />
JPG, GIF or PNG.
			</li>
            <li>Or</li>
            <li>Use our background</li>
            <li><div style="float:left; text-align:center; width:100px; height:150px; margin-right:20px; "><img src="userdata/wallpaper/default_wallpaper.jpg" width="100" height="100" /><input type="radio" name="wp" value="default_wallpaper.jpg" /></div>
            
            <div style="float:left; text-align:center; width:100px; height:150px; margin-right:20px;"><img src="userdata/wallpaper/default_wallpaper.png" width="100" height="100" /><input type="radio" name="wp" value="default_wallpaper.png" /></div>
            
            <div style="float:left; text-align:center; width:100px; height:150px; margin-right:20px;"><img src="userdata/wallpaper/default_wallpaper2.jpg" width="100" height="100" /><input type="radio" name="wp" value="default_wallpaper2.jpg" /></div>
            
            <div class="clearfix"></div></li>
            <li><input type="submit" name="submit" value="Save"  class="bgbut"/></li>
            
            </ul></form></div>
	</div>

</div>
</div>
     </div>
<!--right content-->
<div class="right-content">
<div class="userprofile"><div class=" userphoto"><img src="userdata/picture/<?php echo $userimage ?>" width="100px" height="100px;"/></div>
<div class="userdetail"><p><h1><?php echo $first_name." ".$last_name; ?></h1></p><p><h2><?php echo $city.", ".$country; ?></h2></p><p></p><p><?php echo "<i class=\"palatino12\">$biography</i>"; ?></p><p class="userweb"><a href="<?php echo $website; ?>"><?php echo $website; ?></a></p></div>
</div>
<div class="clearfix"></div>
<div class="network-tab">

</div>


</div>
</body>
</html>