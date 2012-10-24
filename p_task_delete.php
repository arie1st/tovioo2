<?php
include("nyambungterus.php");
$upd = "delete from tov_tasklist where id_task='".$_GET['id']."'";
$resupd = mysql_query($upd);

if(!$resupd){
	echo mysql_error();	
	echo "<br />".$upd;
}

else{
	header("location:home.php");
	exit;
}


?>