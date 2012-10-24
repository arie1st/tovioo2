<?php 
$p_id_user = $_GET['id'];
//$id_user = $_SESSION['iduser'];
$today = date("Y-m-d");
$tasks = "select * from tov_tasklist where id_user='".$p_id_user."' and public='1' and status='DON' order by id_task DESC ";
$tres = mysql_query($tasks);

while($row=mysql_fetch_array($tres)){
	
$pdn_id_user = $row['id_user'];
$pdn_id_task = $row['id_task'];
$pdn_task_date = $row['task_date'];
$pdn_task_detail = $row['task_detail'];
$pdn_post_date = $row['post_date'];
$pdn_public = $row['public'];
$pdn_status = $row['status'];

echo"<div class=\"task\"><div class=\"taskdetail tov-blue\">$pdn_task_detail</div></div>
            <div class=\"clearfix\"></div>";

}


?>