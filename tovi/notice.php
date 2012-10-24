<?php include("nyambungterus.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tovioo - Do it, Done it!</title>
<link href="onlyindex.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="themes/base/jquery.ui.all.css">
	<script src="jquery-1.5.1.js"></script>
	<script src="ui/jquery.ui.core.js"></script>
	<script src="ui/jquery.ui.widget.js"></script>
	<script src="ui/jquery.ui.position.js"></script>
	<script src="ui/jquery.ui.autocomplete.js"></script>
	<link rel="stylesheet" href="demos.css">
    <script>
	$(function() {
		var availableTags = [
		<? 
		$sql = "select printable_name from country;";
		$res = mysql_query($sql);
		
		while($c = mysql_fetch_array($res)){
			
			$country = $c['printable_name'];
			
			echo "\"$country\",";
			
		}
		?>
			];
		$( "#country" ).autocomplete({
			source: availableTags
		});
	});
	</script>
</head>
<body>
<div class="header">
<div class="logo"><img src="images/logo.png" /></div>
<div class="login"><form action="plogin.php" method="post">
<div class="right"><input type="submit" name="submit" value="Submit" class="bgbut" tabindex="4"/></div>
<div class="right"> <input type="password" name="password" class="dashed" value="Password" onfocus="if(value=='Password'){value='';}" onblur="if(value==''){value='Password';}" tabindex="2"/><br /> <div style="margin:5px 5px;;">Forgot password?</div></div>
<div class="right"><input type="text" name="username" class="dashed" value="Your email" onfocus="if(value=='Your email'){value='';}" onblur="if(value==''){value='Your email';}" tabindex="1"/><br /><input type="checkbox" name="remember" tabindex="3"/>Remember me</div></form></div>
</div>

<div class="clearfix"></div>

<div class="content">
<div class="content-kiri"><div style="width:110px; margin:200px auto 0;"><img src="images/mail.png" /></div>
</div>
<div class="content-kanan"><div style="margin-top:210px; text-align:center;"><p><h2>Check Your Email</h2><br />
<h3>Please check your email to retrieve your password.</h3>
<br />
</p>


</body>
</html>