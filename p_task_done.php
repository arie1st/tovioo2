<?php
include("nyambungterus.php");
$upd = "update tov_tasklist set status='DON' where id_task='".$_GET['id']."'";
$resupd = mysql_query($upd);

if(!$resupd){
	echo mysql_error();	
}

else{
	header("location:home.php");
	exit;
}


?>