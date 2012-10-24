<?php
session_start();
include("nyambungterus.php");
$iduser = $_SESSION['iduser'];
$id_teman = $_GET['id'];

$sql = "INSERT INTO tov_friends(isuser, isfriend) VALUES ('$iduser', '$id_teman')";

$result = mysql_query($sql);

if(!$result){
		echo mysql_error();
		echo"<br>".$sql;
}

else{
	
	header('location: profile.php?id='.$id_teman);
	exit;
}
?>