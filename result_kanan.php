<?

$cari= "select * from tov_userdata where concat_ws('',first_name,last_name) like '%$searchkey%' and id_user != $iduser";
$rcari = mysql_query($cari);
$ncari = mysql_num_rows($rcari);

if($ncari>0){
while($res = mysql_fetch_array($rcari)){
	$rk_id_user = $res['id_user'];
	$rk_first_name = strtoupper($res['first_name']);
	$rk_last_name = strtoupper($res['last_name']);
	$rk_urpassword = $res['urpassword'];
	$rk_email = $res['email'];
	$rk_city = $res['city'];
	$rk_country = $res['country'];
	$rk_gender = $res['gender'];
	$rk_birthdate = $res['birthdate'];
	$rk_biography= $res['biography'];
	$rk_website= $res['website'];
	$rk_userimage = $res['userimage'];
	$rk_lastlogin= $res['lastlogin'];
	$rk_background_image = $res['background_image'];
	
	echo"<div class=\"search-kanan\"><div class=\"msg-kanan-pict\"><a href=\"profile.php?id=$rk_id_user\" \><img src=\"userdata/picture/$rk_userimage\" width=\"80px\" height=\"80px\" /></a></div>
<div class=\"search-kanan-detail\"><a href=\"profile.php?id=$rk_id_user\" class=\"tov-blue\" \><h1>$rk_first_name $rk_last_name</h1></a><br /><h2>$rk_biography</h2></div></div>
<div class=\"clearfix\">";
	
}
}
else{
	echo "<h1 style=\" font-family:Tahoma, Geneva, sans-serif; font-size:14px; color:#000; font-weight:bold;\"><strong>No results found for your search.</strong></h1><br />
<h2 style=\" font-family:Tahoma, Geneva, sans-serif; font-size:12px; color:#000; \">Check your spelling or try another term.</h2>";
}

?>