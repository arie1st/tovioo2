<?
$count = "select count(*) from tov_messages where msg_to=$iduser and status='N'";
$resc = mysql_query($count);
//$nres = mysql_num_rows($resc);
$x = mysql_fetch_array($resc);
$newmsg = $x['count(*)'];
if($newmsg!="0"){
echo "($newmsg)";
}
else{
echo "";	
}

?>