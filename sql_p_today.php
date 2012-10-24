<?php 
$p_id_user = $_GET['id'];
//$id_user = $_SESSION['iduser'];
$today = date("Y-m-d");
$tasks = "select * from tov_tasklist where id_user='".$p_id_user."' and task_date='".$today."' and public='1'";
$tres = mysql_query($tasks);

while($row=mysql_fetch_array($tres)){
	
$ptd_id_user = $row['id_user'];
$ptd_id_task = $row['id_task'];
$ptd_task_date = $row['task_date'];
$ptd_task_detail = $row['task_detail'];
$ptd_post_date = $row['post_date'];
$ptd_public = $row['public'];
$ptd_status = $row['status'];

if($ptd_status=="UND"){
echo"<div class=\"task\"><div class=\"taskdetail\">$ptd_task_detail</div></div>
            <div class=\"clearfix\"></div>";
}
else
{
echo"<div class=\"task\"><div class=\"taskdetail tov-blue\">$ptd_task_detail</div></div>
            <div class=\"clearfix\"></div>";	
}

}


?>