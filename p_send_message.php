<?php
session_start();

include("nyambungterus.php");

$to = $_GET['to'];
$id_user = $_SESSION['iduser'];
$message = mysql_real_escape_string($_POST['msgform']);
$today= date("Y-m-d");
$status = "N";
$sendmsg = "insert into tov_messages (msg_from, msg_to, messages, sent_date, status) values ('$id_user','$to','$message','$today','$status')";
$resend= mysql_query($sendmsg);

if(!$resend){
	echo $sendmsg;
}

else{
	header("Location:messages.php?to=$to&id=101");
	exit;
}
?>