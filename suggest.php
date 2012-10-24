<?
for($i=1; $i<=5; $i++){

$sql = "select * from tov_userdata";
$res = mysql_query($sql);
$all = mysql_num_rows($res);

$rand = rand(1,$all);
if($rand == $iduser){
$rand = rand(1,$all);
}
else{

$cek = "select * from tov_friends where isuser=$iduser and isfriend =$rand ";
$rcek = mysql_query($cek);
$ncek = mysql_num_rows($rcek);

if($ncek>0){
	echo "";
}

else{
	$sgst = "select * from tov_userdata where id_user=$rand";
	$rsgst = mysql_query($sgst);
	
	while($sg = mysql_fetch_array($rsgst)){
		
		$s_id_user = $sg['id_user'];
		$s_first_name = strtoupper($sg['first_name']);
		$s_last_name = strtoupper($sg['last_name']);
		$s_urpassword = $sg['urpassword'];
		$s_email = $sg['email'];
		$s_city = $sg['city'];
		$s_country = $sg['country'];
		$s_gender = $sg['gender'];
		$s_birthdate = $sg['birthdate'];
		$s_userimage = $sg['userimage'];
		$s_lastlogin= $sg['lastlogin'];
		$s_biography= $sg['biography'];
		$s_website= $sg['website'];
		
		echo"<div class=\"n-userprofile\"><div class=\"userphoto\"><a href=\"profile.php?id=$s_id_user\"><img src=\"userdata/picture/$s_userimage\" width=\"100px\" height=\"100px;\"/></a></div>
<div class=\"userdetail\"><p><h1><a href=\"profile.php?id=$s_id_user\">$s_first_name $s_last_name</a></h1></p><p><h3>$s_city, $s_country</h3></p><p></p><p><i class=\"palatino12\">$s_biography</i></p><p style=\"padding-top:10px;\"></p><p class=\"userweb\"><a href=\"$s_website\">$s_website</a></p></div>
</div>
<div class=\"clearfix\"></div>";
		
	}
}
}
}
?>