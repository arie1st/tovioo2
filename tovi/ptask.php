<?php
session_start();
include('nyambungterus.php');

$id_user = $_SESSION['iduser'];
$day = $_POST['day'];
//changedate format dd-mm-yyyy//
$tgl = $_POST['tanggal'];
$dd=substr($tgl, 0,2); 
$mm=substr($tgl, 3,2); 
$yy=substr($tgl, -4);
$newdate = $yy."-".$mm."-".$dd;
///////////////////////////////
$shout = mysql_real_escape_string($_POST['shout']);
$publish_type = $_POST['publish_type'];


if($day!=0){
	$insertshout=" INSERT INTO `tov_tasklist` ( `id_user`, `task_date`, `task_detail`, `post_date`, `public`) VALUES ( '$id_user', '$newdate', '$shout', now() , '$publish_type')";
}
else{
	$insertshout=" INSERT INTO `tov_tasklist` (`id_user`,`task_date`, `task_detail`,`post_date`,`public`) VALUES('$id_user', '0000-00-00','$shout', now(),'$publish_type')";
}

$result = mysql_query($insertshout);

if(!$result){
	
	echo mysql_error($insertshout);
}

else{
	header('Location:home.php');
}

?>