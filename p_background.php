<?
session_start();
$iduser = $_SESSION['iduser'];
include("nyambungterus.php");

if(empty($_FILES['bgpicture']['name'])){
	$background = $_POST['wp'];
	$sql = "update tov_userdata set background_image='$background' where id_user = $iduser";
	$res = mysql_query($sql);
	
	if(!$res){
		echo mysql_error();
		echo "<br/>".$sql;	
	}
	
	else{
		header("Location: setting.php?s=100&#tabs-3");	
		exit;
	}
}

else{
	$file_name = $_FILES['bgpicture']['name'];

// random 4 digit to add to our file name
// some people use date and time in stead of random digit
$random_digit=rand(1505,10000);

//combine random digit to you file name to create new file name
//use dot (.) to combile these two variables

$background=$random_digit.$file_name;

//set where you want to store files
//in this example we keep file in folder upload
//$new_file_name = new upload file name
//for example upload file name cartoon.gif . $path will be upload/cartoon.gif
$path= "userdata/wallpaper/".$background;
if($ufile !=none)
{
if(copy($_FILES['bgpicture']['tmp_name'], $path))
{
$sql = "update tov_userdata set background_image='$background' where id_user = $iduser";
	$res = mysql_query($sql);
	
	if(!$res){
		echo mysql_error();
		echo "<br/>".$sql;	
	}
	
	else{
		header("Location: setting.php?a=$background&s=100&#tabs-3");	
		exit;
	}
}
else
{
echo "Error";
}
}
}
?>