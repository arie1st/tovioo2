<?php
session_start();
if(!isset($_SESSION['iduser'])){
//	header("Location: index.php");
}
else{
	header("Location: home.php");
	exit;	
}

 include("nyambungterus.php");

 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tovioo - Done it!</title>
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
		$sql = "select printable_name from country";
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
<div class="right"><input type="submit" name="submit" value="Sign In" class="bgbut" tabindex="4"/></div>
<div class="right"> <input type="password" name="password" id="password" class="dashed" value="Password" onfocus="if(value=='Password'){value='';}" onblur="if(value==''){value='Password';}" tabindex="2"/><br /> <div style="margin:6px 5px;;"><a class="tov-blue" href="fpass.php">Forgot password?</a></div></div>
<div class="right"><input type="text" name="username" id="username" class="dashed" value="Your email" onfocus="if(value=='Your email'){value='';}" onblur="if(value==''){value='Your email';}" tabindex="1"/><br /> <div style="margin:2px 0px;;"><input type="checkbox" name="remember" tabindex="3"/><span class="tov-blue">Remember me</span></div></form></div></div>
</div>

<div class="clearfix"></div>

<div class="content">
<div class="content-kiri"><div class="isikiri"><p><h2><span class="tov-blue">Tovioo</span> help you to finish your to-do-list, activities<br />
 and achieve your goals. Plus you can connect and <br />
share them with your network.</h2></p></div>
<div class="clearfix"></div>

<div class="index-kiri"><div class="img-index-kiri"><img src="images/pen2.png" /></div><div class="tulisan-index-kiri"><h2>Write It</h2></p><p></p>Write your to-do-list and your goals</div></div>
<div class="clearfix"></div>
<div class="index-kiri"><div class="img-index-kiri"><img src="images/check.png" /></div><div class="tulisan-index-kiri"><h2>Done It</h2></p><p></p>Once you have done it, Tick</div></div>
<div class="clearfix"></div>
<div class="index-kiri"><div class="img-index-kiri"><img src="images/share.png" /></div><div class="tulisan-index-kiri"><h2>Share It</h2></p><p></p>Share your achievement together with your network</div></div>
</div>
<div class="content-kanan"><p><h2>Join Tovioo Today.</h2></p><p><h1>It's always free</h1><br />
</p>
<p><form action="preg.php" method="post"><ul><li><h3><? include ("p_index_notice.php"); ?></h3></li>
<li><input type="text" name="firstname" class="dashed"  value="FIRST NAME" size="35" onfocus="if(value=='FIRST NAME'){value='';}" onblur="if(value==''){value='FIRST NAME';}"/></li>
<li><input type="text" name="lastname" class="dashed" value="LAST NAME" size="35" onfocus="if(value=='LAST NAME'){value='';}" onblur="if(value==''){value='LAST NAME';}" /></li>
<li><input type="text" name="email" class="dashed"  value="EMAIL" size="35" onfocus="if(value=='EMAIL'){value='';}" onblur="if(value==''){value='EMAIL';}"/></li>
<li><input type="password" name="password" class="dashed" value="PASSWORD" size="35" onfocus="if(value=='PASSWORD'){value='';}" onblur="if(value==''){value='PASSWORD';}"/></li>
<li><input type="text" name="city"  class="dashed" value="CITY" size="35" onfocus="if(value=='CITY'){value='';}" onblur="if(value==''){value='CITY';}"/></li>
<li><input type="text" name="country"  id="country"  size="35" class="dashed" value="COUNTRY" onfocus="if(value=='COUNTRY'){value='';}" onblur="if(value==''){value='COUNTRY';}" /></li>

<li>Birthday : <br /><br />

<select name="month" id="month" class="dashed">
    <option value="00">Month</option>
    <option value="01">Jan</option>
    <option value="02">Feb</option>
    <option value="03">Mar</option>
    <option value="04">Apr</option>
    <option value="05">May</option>
    <option value="06">Jun</option>
    <option value="07">Jul</option>
    <option value="08">Aug</option>
    <option value="09">Sept</option>
    <option value="10">Oct</option>
    <option value="11">Nov</option>
    <option value="12">Dec</option>
  </select> 
  <select name="day" id="day" class="dashed">
    <option value="Day">Day</option>
    <? $i = 1;
		while($i<=31){
		echo "<option value=$i>$i</option>";
		$i++;
		}
	?>
  </select>
  <select name="year" id="year" class="dashed">
    <option value="Year">Year</option>
       <? $i = date("Y");
		while($i>=1905){
		echo "<option value=$i>$i</option>";
		$i--;
		}
	?>
  </select>
  </li>
  <li><h3>	Why do I need to provide my date of birth?</h3></li>
<li>Gender :<br /><br />

<input type="radio" name="gender" value="M" class="dashed" />Male <input type="radio" name="gender" value="F" class="dashed"/>Female</li>
<li><h3><input type="checkbox" name="agree" />I agree with terms and condition</h3></li>

<li><input type="submit" value="Submit" class="bgbut" /></li>

</ul></form></p></div></div>

</body>
</html>