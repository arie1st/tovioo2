<?

$allmsg = "select distinct msg_from from tov_messages where msg_to=$iduser";
$resall = mysql_query($allmsg);

while($x =mysql_fetch_array($resall)){

$sid = $x['msg_from'];
$sidd = "select * from tov_userdata where id_user=$sid";
$residd = mysql_query($sidd);

while($y =mysql_fetch_array($residd)){
//data user
$id_user = $y['id_user'];
$first_name = $y['first_name'];
$last_name = $y['last_name'];
$userimage = $y['userimage'];
}

$lastmsg = "select * from tov_messages where msg_from=$sid and msg_to=$iduser order by id_messages desc limit 0,1";
$reslm=mysql_query($lastmsg);
while($z =mysql_fetch_array($reslm)){
//data msg terakhir
$id_messages = $z['id_messages'];
$messages = $z['messages'];
$sent_date = $z['sent_date'];

$tgnya = $sent_date;
$pdd =  substr($tgnya,-2);
$pmm =	substr($tgnya,5,2);
$pyy =	substr($tgnya,0,4);

$newtg= $pdd."-".$pmm."-".$pyy;
$tgnih = date('d F Y', strtotime($newtg));
}


//echo all data
echo"<a href=\"messages.php?to=$id_user\" style=\"text-decoration:none;\"><div class=\"sender\"><div class=\"sender-pict\"><img src=\"userdata/picture/$userimage\" width=\"80px\" height=\"80px\" /></div><div class=\"sender-info\"><h1>$first_name $last_name</h1><br /><h2>$tgnih</h2><br />
<h3>$messages</h3>
</div></div></a>
<div class=\"clearfix\"></div>";

}

?>