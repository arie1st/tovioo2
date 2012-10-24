<?php
session_start();
$iduser = $_SESSION['iduser'];
include("nyambungterus.php");

if(empty($_FILES['pictures']['name'])){
	
	
	$firstname = mysql_real_escape_string($_POST['firstname']);
	$lastname = mysql_real_escape_string($_POST['lastname']);
	$website = mysql_real_escape_string($_POST['website']);
	$city = mysql_real_escape_string($_POST['city']);
	$country = mysql_real_escape_string($_POST['country']);
	$birthday = mysql_real_escape_string($_POST['birthday']);
	$gender = $_POST['gender'];
	$bio = mysql_real_escape_string($_POST['bio']);
	
	$tgl = $birthday;
	$dd=substr($tgl, 0,2); 
	$mm=substr($tgl, 3,2); 
	$yy=substr($tgl, -4);
	$newbirthday = $yy."-".$mm."-".$dd;
	
	$sql =" update tov_userdata set first_name='$firstname', last_name='$lastname', website = '$website', city='$city', country = '$country', birthdate = '$newbirthday', gender = '$gender', biography = '$bio' where id_user = $iduser";
	$res = mysql_query($sql);
	
	if(!$res){
		echo mysql_error();
		echo "<br/>". $sql;
		
	}
	else{
		
		header("Location: setting.php?s=100&$birthday");	
		exit;
	}
	
}

else{
	// This is the temporary file created by PHP
$uploadedfile = $_FILES['pictures']['tmp_name'];

// Create an Image from it so we can do the resize
$src = imagecreatefromjpeg($uploadedfile);

// Capture the original size of the uploaded image
list($width,$height)=getimagesize($uploadedfile);

// For our purposes, I have resized the image to be
// 600 pixels wide, and maintain the original aspect
// ratio. This prevents the image from being "stretched"
// or "squashed". If you prefer some max width other than
// 600, simply change the $newwidth variable
$newwidth=100;
$newheight=($height/$width)*100;
$tmp=imagecreatetruecolor($newwidth,$newheight);

// this line actually does the image resizing, copying from the original
// image into the $tmp image
imagecopyresampled($tmp,$src,0,0,0,0,$newwidth,$newheight,$width,$height);

// now write the resized image to disk. I have assumed that you want the
// resized, uploaded image file to reside in the ./images subdirectory.
$rand = rand(1505,10000);
$newname = $rand.$_FILES['pictures']['name'];
$filename = "userdata/picture/".$newname;
imagejpeg($tmp,$filename,100);

imagedestroy($src);
imagedestroy($tmp); // NOTE: PHP will clean up the temp file it created when the request
// has completed.

	$firstname = mysql_real_escape_string($_POST['firstname']);
	$lastname = mysql_real_escape_string($_POST['lastname']);
	$website = mysql_real_escape_string($_POST['website']);
	$city = mysql_real_escape_string($_POST['city']);
	$country = mysql_real_escape_string($_POST['country']);
	$birthday = mysql_real_escape_string($_POST['birthday']);
	$gender = $_POST['gender'];
	$bio = mysql_real_escape_string($_POST['bio']);
	
	$tgl = $birthday;
	$dd=substr($tgl, 0,2); 
	$mm=substr($tgl, 3,2); 
	$yy=substr($tgl, -4);
	$newbirthday = $yy."-".$mm."-".$dd;
	
	$sql =" update tov_userdata set first_name='$firstname', last_name='$lastname', website = '$website', city='$city', country = '$country', birthdate = '$newbirthday', gender = '$gender', biography = '$bio', userimage='$newname' where id_user = $iduser";
	$res = mysql_query($sql);
	
	if(!$res){
		echo mysql_error();
		echo "<br/>". $sql;
		
	}
	else{
		
		header("Location: setting.php?s=100");	
		exit;
	}

}

?>