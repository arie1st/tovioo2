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
	<script src="ui/jquery.ui.tabs.js"></script>
	<link rel="stylesheet" href="demos.css">
	<script>
    $(function() {
    $( "#tabs" ).tabs();
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
<div class="clearfix"></div>

<div class="task-tab">
<div id="tabs">
	<ul>
		<li><a href="#tabs-1"><img src="images/LatestPost.png" /></a></li>
		<li><a href="#tabs-2"><img src="images/ThisWeek.png" /></a></li>
		<li><a href="#choose"><img src="images/Choose.png" /></a></li>
     </ul>
	<div id="tabs-1">
		<h2>Your latest post</h2>
        <br />
<br />

            <h3></h3>
			<?php include("sql_timeline.php"); ?>
	</div>
	<div id="tabs-2">
		<h2>This week</h2>

			<?php include("this_week.php"); ?>
	</div>
	<div id="choose">
		<h2>Select</h2>

          	<form action="timeline.php?<? echo $_POST['month']; ?>#choose"><h3>Select month : <select name="month" class="dashed">
            <option value="<? echo date("Y"); ?>-01">January <? echo date("Y"); ?></option>
            <option value="<? echo date("Y"); ?>-02">February <? echo date("Y"); ?></option>
            <option value="<? echo date("Y"); ?>-03">March <? echo date("Y"); ?></option>
            <option value="<? echo date("Y"); ?>-04">April <? echo date("Y"); ?></option>
            <option value="<? echo date("Y"); ?>-05">May <? echo date("Y"); ?></option>
            <option value="<? echo date("Y"); ?>-06">June <? echo date("Y"); ?></option>
            <option value="<? echo date("Y"); ?>-07">July <? echo date("Y"); ?></option>
            <option value="<? echo date("Y"); ?>-08">August <? echo date("Y"); ?></option>
            <option value="<? echo date("Y"); ?>-09">September <? echo date("Y"); ?></option>
            <option value="<? echo date("Y"); ?>-10">October <? echo date("Y"); ?></option>
            <option value="<? echo date("Y"); ?>-11">November <? echo date("Y"); ?></option>
            <option value="<? echo date("Y"); ?>-12">December <? echo date("Y"); ?></option>
            </select>
            <input type="submit" value="GO" class="submitshout" /></h3></form><br />
<br />

            
            <?php include("sql_timeline_choose.php"); ?>
            
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



</div>
</body>
</html>