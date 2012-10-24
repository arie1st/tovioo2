<?php

$friends= "select * from tov_friends where isuser='".$id_user."'";
$resf = mysql_query($friends);
$nresf = mysql_num_rows($resf);

if($nresf>0){

while($row = mysql_fetch_array($resf)){

$id_friend = $row['id_friend'];	
$id_ku = $row['isuser'];
$id_mu = $row['isfriend'];

	$dfriend = "select * from `tov_userdata` where `id_user`='".$id_mu."'";
	$rdf = mysql_query($dfriend); 	
	 while($fd= mysql_fetch_array($rdf) ){ //friend data\
		$f_id_user = $fd['id_user'];
		$f_first_name = strtoupper($fd['first_name']);
		$f_last_name = strtoupper($fd['last_name']);
		$f_urpassword = $fd['urpassword'];
		$f_email = $fd['email'];
		$f_city = $fd['city'];
		$f_country = $fd['country'];
		$f_gender = $fd['gender'];
		$f_birthdate = $fd['birthdate'];
		$f_userimage = $fd['userimage'];
		$f_lastlogin= $fd['lastlogin'];
		$f_biography= $fd['biography'];
		$f_website= $fd['website'];
		
		echo"<div class=\"n-userprofile\"><div class=\"userphoto\"><a href=\"profile.php?id=$f_id_user\"><img src=\"userdata/picture/$f_userimage\" width=\"100px\" height=\"100px;\"/></a></div>
<div class=\"userdetail\"><p><h1><a href=\"profile.php?id=$f_id_user\">$f_first_name $f_last_name</a></h1></p><p><h3>$f_city, $f_country</h3></p><p></p><p><i class=\"palatino12\">$f_biography</i></p><p style=\"padding-top:10px;\"></p><p class=\"userweb\"><a href=\"$f_website\">$f_website</a></p></div>
</div>
<div class=\"clearfix\"></div>";

	 }
}
include("suggest2.php");	
}

else{
	echo" <h3> It's still empty right now. When you add network they will appear here</h3><br>";
	include("suggest2.php");
}
?>