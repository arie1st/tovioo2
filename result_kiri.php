<?

$find = "select a.*, b.* from tov_tasklist a, tov_userdata b where  a.id_user = b.id_user and a.task_detail like '%$searchkey%' order by a.task_date desc";
$res = mysql_query($find);
$num = mysql_num_rows($res);
if($num>0){

while($kanan = mysql_fetch_array($res)){
	$id_task = $kanan['id_task'];
	$task_detail= $kanan['task_detail'];
	$task_date = $kanan['task_date'];
	

	$tgnya = $task_date;
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

echo"<div class=\"search_kiri\"><div class=\"search_kiri-pict\"><img src=\"userdata/picture/$userimage\" width=\"80px\" height=\"80px\" /></div><div class=\"search_kiri-info\"><h1>$first_name $last_name</h1><br /><h2>$tgnih</h2><br />
<h3>$task_detail</h3>
</div></div>
<div class=\"clearfix\"></div>";
}

}

else
{
echo "<h1 style=\" font-family:Tahoma, Geneva, sans-serif; font-size:14px; color:#000; font-weight:bold;\"><strong>No results found for $searchkey.</strong></h1><br />
<h2 style=\" font-family:Tahoma, Geneva, sans-serif; font-size:12px; color:#000; \">Check your spelling or try another term.</h2>";
	
}
?>