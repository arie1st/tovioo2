<?php
session_start();
include("nyambungterus.php");
$xid = $_GET['id'];
$del = "delete from tov_friends where isfriend =$xid ";
//$del ="delete from tov_friends where(isuser=$iduser and isfriend=$_GET['id']) or (isuser=$_GET['id'] and isfriend=$iduser)";
$rdel = mysql_query($del);

if(!$rdel){
	echo mysql_error();
	echo"<br>".$del;
}

else{
	header("location:profile.php?id=$xid");
	exit;	
}

?>