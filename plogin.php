<?
include("nyambungterus.php");
$email = mysql_real_escape_string($_POST['username']);
$password = md5($_POST['password']);

//echo $email." dan ". $password;

$sql="select * from tov_userdata where email='$email' and urpassword='$password'";
$res = mysql_query($sql);
$total = mysql_num_rows($res);
$row=mysql_fetch_array($res);
$userid = $row['id_user'];


if($total!=1){
	
	//echo "Ya ngga bisa laah...";
	header('Location:fpass.php');
}
else{

	$log ="update tov_userdata set lastlogin=now() where email='$email'";
	$upd = mysql_query($log);
	
	if(!$upd){
		echo mysql_error($log);
	}
	else{

	
	//set cookie
	if(isset($_POST['remember'])){
	$expire=time()+60*60*24*30;
	setcookie("user", "$userid", $expire);
	}
	session_start();
	//session_register("iduser");\
	$_SESSION['iduser'] = $userid;
	header('Location:home.php?uid='.$userid);
	}
}

?>