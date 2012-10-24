<? 
$iduser = $_SESSION['iduser'];
$all = "select * from `tov_userdata` where `id_user`='".$iduser."'";
$allresult = mysql_query($all) or die (mysql_error($all));

while($row = mysql_fetch_array($allresult)){
$id_user = $row['id_user'];
$first_name = $row['first_name'];
$last_name = $row['last_name'];
$urpassword = $row['urpassword'];
$email = $row['email'];
$city = $row['city'];
$country = $row['country'];
$gender = $row['gender'];
$birthdate = $row['birthdate'];
$biography= $row['biography'];
$website= $row['website'];
$userimage = $row['userimage'];
$lastlogin= $row['lastlogin'];
$background_image = $row['background_image'];
$premium  = $row['premium'];
if($premium =="1"){
	$imgpremium= "<img src=\"img/premium.png\" title=\"PREMIUM MEMBER\" />";
}
else{
	$imgpremium= "<img src=\"img/nonpremium.png\" />";	
}
}
?>