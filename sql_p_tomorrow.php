<?php

$besok = mktime(0, 0, 0, date("m"), date("d")+1, date("y"));
$tomorrow=  date("Y-m-d", $besok);

$tasks = "select * from tov_tasklist where id_user='".$p_id_user."' and task_date='".$tomorrow."' and public='1'";
$tres = mysql_query($tasks);

while($row=mysql_fetch_array($tres)){
	
$ptm_id_user = $row['id_user'];
$ptm_id_task = $row['id_task'];
$ptm_task_date = $row['task_date'];
$ptm_task_detail = $row['task_detail'];
$ptm_post_date = $row['post_date'];
$ptm_public = $row['public'];
$ptm_status = $row['status'];

if($ptm_status=="UND"){
echo"<div class=\"task\"><div class=\"taskdetail\">$ptm_task_detail</div></div>
            <div class=\"clearfix\"></div>";
}

else{
	echo"<div class=\"task\"><div class=\"taskdetail tov-blue\">$ptm_task_detail</div></div>
            <div class=\"clearfix\"></div>";
}
}
?>