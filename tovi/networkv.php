<?
$friends= "select * from tov_friends where isuser='".$id_user."'";
$resf = mysql_query($friends);
$nresf = mysql_num_rows($resf);

if($nresf>0){
$today = date("Y-m-d");
$search = "select * from tov_tasklist a , tov_friends b where a.task_date ='$today' and (b.isuser=$iduser and b.isfriend = a.id_user) and public=1 order by a.id_task desc";
$resultnya = mysql_query($search);
$jumlah_result = mysql_num_rows($resultnya);

if($jumlah_result>0){
	echo"<h2>Your network activity today:</h2><br /><br>";
	while($cek = mysql_fetch_array($resultnya)){
		$cek_id_task = $cek['id_task'];
		$cek_id_user= $cek['id_user'];
		$cek_task_date = $cek['task_date'];
		$cek_task_detail= $cek['task_detail'];
		$cek_status= $cek['status'];
		
			$cekteman = "select * from tov_friends where isuser=$iduser and isfriend=$cek_id_user";
			$adakah = mysql_query($cekteman);
			$baris = mysql_num_rows($adakah);
			
			if($baris>0){
				
				$getdatateman =  "select * from tov_userdata where id_user = $cek_id_user";
				$resget = mysql_query($getdatateman);
				
				while($get = mysql_fetch_array($resget)){
					$get_id_user = $get['id_user'];
					$get_first_name = strtoupper($get['first_name']);
					$get_last_name = strtoupper($get['last_name']);
					$get_urpassword = $get['urpassword'];
					$get_email = $get['email'];
					$get_city = $get['city'];
					$get_country = $get['country'];
					$get_gender = $get['gender'];
					$get_birthdate = $get['birthdate'];
					$get_biography= $get['biography'];
					$get_website= $get['website'];
					$get_userimage = $get['userimage'];
					$get_lastlogin= $get['lastlogin'];
					$get_background_image = $get['background_image'];
					
				}
				if($cek_status=="UND"){
				echo"<div class=\"n-userprofile\"><div class=\"userphoto\"><a href=\"profile.php?id=$get_id_user\"><img src=\"userdata/picture/$get_userimage\" width=\"100px\" height=\"100px;\"/></a></div>
<div class=\"userdetail\"><p><h1><a href=\"profile.php?id=$get_id_user\">$get_first_name $get_last_name</a></h1></p><p>$cek_task_detail</p></div>
</div>
<div class=\"clearfix\"></div>";
				}
				else{
					echo"<div class=\"n-userprofile\"><div class=\"userphoto\"><a href=\"profile.php?id=$get_id_user\"><img src=\"userdata/picture/$get_userimage\" width=\"100px\" height=\"100px;\"/></a></div>
<div class=\"userdetail\"><p><h1><a href=\"profile.php?id=$get_id_user\">$get_first_name $get_last_name</a></h1></p><p class=\"tov-blue\">$cek_task_detail</p></div>
</div>
<div class=\"clearfix\"></div>";
				}
				
			}
	
			else{
				echo"";
			}
		
		
	}


}

else{
	//echo $today;
	echo "<h1 style=\" font-family:Tahoma, Geneva, sans-serif; font-size:14px; color:#000; font-weight:bold;\"><strong>There are no activity on your network today</strong></h1><br />
<h2 style=\" font-family:Tahoma, Geneva, sans-serif; font-size:12px; color:#000; \">Click network for network suggestion.</h2><br />
<br />
";

//include("suggest2.php");

}
}

else{
	echo "<h3> When you add network, you will see their activities and what they have done today.</h3>";	
}


?>