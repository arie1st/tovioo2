<?php

if (!isset($_GET['to'])) {
	$_GET['to'] = 0;
}

$xid = $_GET['to'];
if (!isset($xid)) {
	$xid = 0;
	
}

else{
	
$upd_status = "update tov_messages set status='R' where msg_from =$xid and msg_to=$iduser";
$rupd = mysql_query($upd_status);

if(!$rupd){
	echo mysql_error();
}
else{

$sql = "SELECT a.*,b.*,  b. first_name AS nama_pengirim, b.last_name AS nama_pengirim2, c.first_name AS nama_penerima 
FROM tov_messages a, tov_userdata b, tov_userdata c 
WHERE  a.msg_from = b.id_user AND a.msg_to = c.id_user 
AND (a.msg_from = $iduser  OR  a.msg_from = '$xid') 
AND (a.msg_to = $iduser OR a.msg_to = '$xid')  order by id_messages ASC ";
$res = mysql_query($sql);
//$cek = mysql_num_rows($res);
//if($cek>0){

while($kanan = mysql_fetch_array($res)){
	$id_messages = $kanan['id_messages'];
	$msg_from = $kanan['msg_from'];
	$msg_to = $kanan['msg_to'];
	$messages = $kanan['messages'];
	$sent_date = $kanan['sent_date'];
	$status = $kanan['status'];

	$tgnya = $sent_date;
	$pdd =  substr($tgnya,-2);
	$pmm =	substr($tgnya,5,2);
	$pyy =	substr($tgnya,0,4);
	$newtg= $pdd."-".$pmm."-".$pyy;
	$tgnih = date('d F Y', strtotime($newtg));
	//
	$id_user = $kanan['id_user'];
	$first_name = strtoupper($kanan['first_name']);
	$last_name = strtoupper($kanan['last_name']);
	$urpassword = $kanan['urpassword'];
	$email = $kanan['email'];
	$city = $kanan['city'];
	$country = $kanan['country'];
	$gender = $kanan['gender'];
	$birthdate = $kanan['birthdate'];
	$userimage = $kanan['userimage'];
	$lastlogin= $kanan['lastlogin'];
	
	
	$nama_pengirim  = strtoupper($kanan['nama_pengirim']);
	$nama_pengirim2  = strtoupper($kanan['nama_pengirim2']);
	echo "<div class=\"msg-kanan\"><div class=\"msg-kanan-pict\"><img src=\"userdata/picture/$userimage\" width=\"80px\" height=\"80px\" /></div>
<div class=\"msg-kanan-detail\"><h1>$nama_pengirim $nama_pengirim2</h1> <br /><h2>$messages</h2></div></div>
<div class=\"clearfix\"></div>
";
	
	
}
}
//echo $sql;
//}
}
?>