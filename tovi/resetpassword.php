<?
include("nyambungterus.php");
$email = $_POST['email'];

//check email//////////////////////////////////////////////
$checkmail="SELECT `email` FROM `tov_userdata` WHERE `email`='$email'";
//$checkresult = mysql_num_rows($checkmail);
$res=mysql_query($checkmail);
$total=mysql_num_rows($res);
//print $total;
/////////////////////////////////////////////////////////////////////
if($total > 0 ){

function rand_string( $length ) {
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";	

	$size = strlen( $chars );
	$str ="";
	for( $i = 0; $i < $length; $i++ ) {
		$str .= $chars[ rand( 0, $size - 1 ) ];
	}

	return $str;
}

$my_string = rand_string( 10 );
$mdstring = md5($my_string);

$sql = "update tov_userdata set urpassword='$mdstring' where email='$email'";
$resmail = mysql_query($sql);

if(!$resmail){
	echo mysql_error();
}

else{
//define the receiver of the email
$to = $email;
//define the subject of the email
$subject = 'Your Password at Tovioo.com';
//create a boundary string. It must be unique
//so we use the MD5 algorithm to generate a random hash
$random_hash = md5(date('r', time()));
//define the headers we want passed. Note that they are separated with \r\n
$headers = "From: webmaster@tovioo.com\r\nReply-To: webmaster@tovioo.com";
//add boundary string and mime type specification
$headers .= "\r\nContent-Type: multipart/alternative; boundary=\"PHP-alt-".$random_hash."\"";
//define the body of the message.
ob_start(); //Turn on output buffering
?>
--PHP-alt-<?php echo $random_hash; ?> 
Content-Type: text/html; charset="iso-8859-1"
Content-Transfer-Encoding: 7bit

<h2>Hello</h2>
<p>Your new password on tovioo.com is :<?php echo $my_string; ?> </p>
<p>You can change the password after you're log in</p>
<p></p>
<p></p>
<p></p>
<p>Thank You,</p>
<p></p>
<p><a href="tovioo.com">Tovioo.com</a></p>

--PHP-alt-<?php echo $random_hash; ?>--
<?
//copy current buffer contents into $message variable and delete current output buffer
$message = ob_get_clean();
//send the email
$mail_sent = @mail( $to, $subject, $message, $headers );

header("Location: notice.php");
exit;

}


	}
else{
	header('Location:fpass.php?r=101');
}

?>