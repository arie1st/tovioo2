<?php

$id_task = $_GET['id'];
$sel = "select * from tov_tasklist where id_task =$id_task";
$res = mysql_query($sel);


while($x = mysql_fetch_array($res)){
$e_id_user = $x['id_user'];
$e_id_task = $x['id_task'];
$e_task_date = $x['task_date'];
$e_task_detail = $x['task_detail'];
$e_post_date = $x['post_date'];
$e_public = $x['public'];
$e_status = $x['status'];
}

?>