<?php
session_start();
$_SESSION['uname'] = $_POST['email'];
$_SESSION['upass'] = $_POST['password'];
include("nyambungterus.php");

//tangkap/////////////////////////////////////////////////////////////
$firstname = mysql_real_escape_string($_POST['firstname']);
$lastname = mysql_real_escape_string($_POST['lastname']);
$email = mysql_real_escape_string($_POST['email']);
$password = md5($_POST['password']);
$city = mysql_real_escape_string($_POST['city']);
$country = mysql_real_escape_string($_POST['country']);
$gender = $_POST['gender'];
$birthday = $_POST['year']."-".$_POST['month']."-".$_POST['day'];
$password2 =mysql_real_escape_string($_POST['password']);
/////////////////////////////////////////////////////////////////////
if(strlen($_POST['password'])<8){
	
	header("Location:index.php?s=103");
	exit;
}

if(eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email)){
	
	header("Location:index.php?s=102");
	exit;
}


if($_POST['firstname'] == "" || $_POST['lastname'] == "" || $_POST['email'] == "" || $_POST['password'] == "" || $_POST['city'] == "" || $_POST['country'] == "" || $_POST['year'] == "" || $_POST['month'] == "" || $_POST['day'] == "" || !isset($_POST['agree']) || $_POST['firstname'] == "FIST NAME" || $_POST['lastname'] == "LAST NAME" || $_POST['email'] == "EMAIL" || $_POST['password'] == "PASSWORD" || $_POST['city'] == "CITY" || $_POST['country'] == "COUNTRY" || !isset($_POST['gender']) || $_POST['year'] == "YEAR" || $_POST['month'] == "00" || $_POST['day'] == "DAY"){
	
header("Location:index.php?s=101");
exit;
}




//ever register before?//////////////////////////////////////////////
$checkmail="SELECT `email` FROM `tov_userdata` WHERE `email`='$email'";
//$checkresult = mysql_num_rows($checkmail);
$res=mysql_query($checkmail);
$total=mysql_num_rows($res);
//print $total;
/////////////////////////////////////////////////////////////////////
if($total > 0 ){
	header('Location:fpass.php');
	}
else{
	$regis = "INSERT INTO tov_userdata (`first_name`, `last_name`, `email`, `urpassword`, `gender`, `birthdate`,`userimage`,`city`,`country`,`background_image`,`premium`) values ('$firstname', '$lastname', '$email', '$password', '$gender', '$birthday','default.png', '$city', '$country','default_background.jpg','0')";	
	//echo $regis;
	$regisresult = mysql_query($regis);
	
	if(!$regisresult){
		echo mysql_error($regis);
	}
	else{
		header('Location:creg.php?p='.$password.'');	
	}
	
		
}


?>
