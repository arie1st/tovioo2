<?
$p_id_user = $_GET['id'];
if($p_id_user==$iduser){
	echo "";
}
else{
$sq = "select * from tov_friends where isuser='$iduser' and isfriend = '$p_id_user'";
$res = mysql_query($sq);
$res2 = mysql_num_rows($res);

if($res2==1){
	$sq2 = "select * from tov_friends where isuser= '$p_id_user' and isfriend ='$iduser'";
	$has = mysql_query($sq2);
	$has2 = mysql_num_rows($has);
	
	if($has2==1){
	
		echo "<li><img src=\"images/newmsg.png\" /></li><li><a href=\"unfriend.php?id=$p_id_user\"><img src=\"images/rem-network.png\" /></a></li>";
	}

	else {
	echo"<li><a href=\"unfriend.php?id=$p_id_user\"><img src=\"images/rem-network.png\" /></a></li>";
	}
}
else{
	echo"<li><a href=\"addfriend.php?id=$p_id_user\"><img src=\"images/add-network.png\" /></a></li>";
}
}
?>