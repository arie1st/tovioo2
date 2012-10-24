<?
session_start();
include("nyambungterus.php");
if(!isset($_GET['id'])){
	echo "";
}
else{
$uid = $_GET['id'];
$del = "update tov_userdata set userimage='default.png' where id_user=$uid";
$res = mysql_query($del);

if(!$res){
	echo mysql_error();	
}
else
{
	header("Location: setting.php");
	exit;
}
}
?>