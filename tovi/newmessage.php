<?
session_start();
$iduser = $_SESSION['iduser'];
include("nyambungterus.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="main.css" rel="stylesheet" type="text/css" />
<title>Send Message</title>
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
		$sql = "select * from tov_friends a, tov_userdata b where a.isuser = $iduser and a.isfriend = b.id_user";
		$res = mysql_query($sql);
		
		while($c = mysql_fetch_array($res)){
			
			$firstname = strtoupper($c['first_name']);
			$lastname= strtoupper($c['last_name']);
			
			echo "\"$firstname $lastname\",";
			
		}
		?>
			];
		$( "#send_to" ).autocomplete({
			source: availableTags
		});
	});
	</script>



    
<!--script buat max char-->

<script type="text/javascript"?>
$(document).ready(function(){
    $('#message').keyup(function(){ var limit = $(this).attr('maxlength'); ($(this).val().length < limit) ? $('.charsLeft').html(limit-$(this).val().length) : $(this).val($(this).val().substr(0,limit)) + $('.charsLeft').html('<span style="color:#ff0000;">0</span>');});
});
</script>

</head>

<body>
<div style="margin:20px auto 0; width:400px;">
Send new message<br />
<div style="margin-top:10px;"></div>

<form method="post" action="sendnewmessage.php"><input type="text" name="send_to" id="send_to" class="dashed" size="63"/><br /><br />
<textarea name="message" id="message" class="dashed" cols="47" rows="3" maxlength="160" wrap="virtual"></textarea><br /><br />

<input type="submit" class="submitshout" value="SEND" /><span class="charsLeft" style="float:right; color:#ccc; font-size:22px; text-align:right; padding-top:5px;">160</span></form>
</div>
</body>
</html>