<?php
include("nyambungterus.php");
$sel= "select * from tov_tasklist where id_task='".$_GET['id']."'";
$resupd = mysql_query($sel);

while($pub = mysql_fetch_array($resupd)){
	$public = $pub['public'];
	$id_task = $pub['id_task'];
}

if($public=="1"){
	$upd = "update tov_tasklist set public='0' where id_task=$id_task";
	$ru = mysql_query($upd);
	if(!ru){
		echo mysql_error();	
	}
	else{
		header("location:home.php");
		exit;
	}
}

else{
	$upd = "update tov_tasklist set public='1' where id_task=$id_task";
	$ru = mysql_query($upd);
	if(!ru){
		echo mysql_error();	
	}
	else{
		header("location:home.php");
		exit;
	}
}


?>