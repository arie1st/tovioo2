<?php 

//$id_user = $_SESSION['iduser'];

$goal = "select * from tov_tasklist where id_user='".$p_id_user."' and task_date='0000-00-00' and public='1'";
$gres = mysql_query($goal);

while($row=mysql_fetch_array($gres)){
	
$ptg_id_user = $row['id_user'];
$ptg_id_task = $row['id_task'];
$ptg_task_date = $row['task_date'];
$ptg_task_detail = $row['task_detail'];
$ptg_post_date = $row['post_date'];
$ptg_public = $row['public'];
$ptg_status = $row['status'];

if($ptg_status=="UND"){
echo"<div class=\"task\"><div class=\"taskdetail\">$ptg_task_detail</div></div>
            <div class=\"clearfix\"></div>";
}
else{
echo"<div class=\"task\"><div class=\"taskdetail tov-blue\">$ptg_task_detail</div></div>
            <div class=\"clearfix\"></div>";	
}
}
?>