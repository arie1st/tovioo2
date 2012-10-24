<?
include("nyambungterus.php");

$xid = $_GET['id'];
$task = mysql_real_escape_string($_POST['shout']);
$upd = "update tov_tasklist set task_detail ='$task'  where id_task ='$xid' ";
$res = mysql_query($upd);

if(!$res){
	echo mysql_error();
	echo"<br>".$upd;
}

else{
	header("location:home.php");
	exit;	
}

?>