<?
session_start();
$iduser = $_SESSION['iduser'];
include("nyambungterus.php");
$oldpassword = md5($_POST['oldpass']);
$newpassword = md5($_POST['newpass']);
//$newpasslenght =strlen($_POST['newpass']);
$oldemail = $_POST['oldemail'];
$newemail = $_POST['newemail'];



//ganti password
if($oldemail=="" and $newemail==""){
	
	if($oldpassword == $newpassword){
		
		header("Location: setting.php?s=102#tabs-2");
		exit;
	}
	
	else{
		
		if(strlen($_POST['newpass'])<8){
		header("Location: setting.php?s=103#tabs-2");
		exit;
		}
		else{
	$sq = "select * from tov_userdata where id_user=$iduser and urpassword='$oldpassword'";
	$sr = mysql_query($sq);
	$sn = mysql_num_rows($sr);

	if($sn!=1){
		header("Location: setting.php?s=101#tabs-2");
		exit;
	}

	else{
		$upd="update tov_userdata set urpassword='$newpassword' where id_user=$iduser";
		$ru = mysql_query($upd);
		
		if(!$ru){
			echo mysql_error();
		}
		else{
			header("Location: setting.php?s=100#tabs-2");
			exit;
		}
	}
	}
	}
}

//ganti email
else{	
	if($oldemail == $newemail){
			
			header("Location: setting.php?s=102#tabs-2");
			exit;
	}
	
	else{
	
	if(eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $newemail)) {

	$sq = "select * from tov_userdata where id_user='$iduser' and email='$oldemail'";
	$sr = mysql_query($sq);
	$sn = mysql_num_rows($sr);

	if($sn!=1){
		header("Location: setting.php?s=101e#tabs-2");
		exit;
	}
	
	else{
		$upd="update tov_userdata set email='$newemail' where id_user='$iduser'";
		$ru = mysql_query($upd);
		
		if(!$ru){
			echo mysql_error();
		}
	else{
			header("Location: setting.php?s=100#tabs-2");
			exit;
	}
	}
	}
	
	else {
	header("Location: setting.php?s=104#tabs-2");
	exit;
	}
	}
}
?>