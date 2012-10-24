<?
session_start();
include("nyambungterus.php");
$iduser = $_SESSION['iduser'];
$fullname =$_POST['send_to'];
$name = explode(" ",$fullname,2);
$nama_dpn = $name[0];
$nama_blkg = $name[1];
$msg = mysql_real_escape_string($_POST['message']);
$today = date("Y-m-d");

$cari = "select * from tov_userdata where first_name like '%$nama_dpn%' and last_name like '%$nama_blkg%'";
$rcari = mysql_query($cari);
$ncari = mysql_num_rows($rcari);

if($ncari>0){
$kn = mysql_fetch_array($rcari);
$msg_to = $kn['id_user'];


	$cek1 = "select * from tov_friends where isfriend = $msg_to and isuser=$iduser";
	$rcek1 = mysql_query($cek1);
	$ncek1 = mysql_num_rows($rcek1);
	if($ncek1>0){
		
		$cek2 = "select * from tov_friends where isfriend =$iduser  and isuser=$msg_to";
		$rcek2 = mysql_query($cek1);
		$ncek2 = mysql_num_rows($rcek1);
		if($ncek2>0){
		
		$ins = "insert into tov_messages (msg_from, msg_to, messages, sent_date, status) values ('$iduser','$msg_to','$msg','$today','N')";
$resend= mysql_query($ins);

		if(!$resend){
			mysql_error();
			echo $ins."<br/>";
			echo "<br/>".$nama_dpn."<br/>".$nama_blkg;
		}
		
		else{
			header("Location:messages.php?s=101");
			exit;
		}
	}
	
	else{
		header("Location:messages.php?s=100");
		exit;
	}
	}
	else{
		header("Location:messages.php?s=100");
		exit;
	}
}

else{
	header("Location:messages.php?s=100");
	exit;
}
?>