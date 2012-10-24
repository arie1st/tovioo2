<? 
$p_id_user = $_GET['id'];
$iduser = $_SESSION['iduser'];
$all = "select * from `tov_userdata` where `id_user`='".$p_id_user."'";
$allresult = mysql_query($all) or die (mysql_error($all));

while($row = mysql_fetch_array($allresult)){
$pr_id_user = $row['id_user'];
$pr_first_name = strtoupper($row['first_name']);
$pr_last_name = strtoupper($row['last_name']);
$pr_urpassword = $row['urpassword'];
$pr_email = $row['email'];
$pr_city = $row['city'];
$pr_country = $row['country'];
$pr_gender = $row['gender'];
$pr_birthdate = $row['birthdate'];
$pr_biography= $row['biography'];
$pr_website= $row['website'];
$pr_userimage = $row['userimage'];
$pr_lastlogin= $row['lastlogin'];
}
?>