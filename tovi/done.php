<?php 

//$id_user = $_SESSION['iduser'];

$goal = "select * from tov_tasklist where id_user='".$id_user."' and public='1' and status='DON' order by id_task DESC";
$gres = mysql_query($goal);
$gres_done = mysql_num_rows($gres);

if($gres_done>0){

while($row=mysql_fetch_array($gres)){
	
$done_id_user = $row['id_user'];
$done_id_task = $row['id_task'];
$done_task_date = $row['task_date'];
$done_task_detail = $row['task_detail'];
$done_post_date = $row['post_date'];
$done_public = $row['public'];
$done_status = $row['status'];

if($done_public=="1"){
$done_public = "Set private";
}
else{
$done_public = "Show to public";	
}

if($done_status=="UND"){
	echo "<div class=\"task\"><div class=\"taskdetail\"><h1>$done_task_detail</h1><br />
<ul>
<li><a href=\"p_task_edit.php?id=$done_id_task\">Edit</a></li>
<li></a><a href=\"p_task_delete.php?id=$done_id_task\">Delete</a></li>
<li><a href=\"p_task_status.php?id=$done_id_task\">$done_public</a></li>
</ul>
</div><div class=\"managetask\"><a href=\"p_task_done.php?id=$done_id_task\"><img src=\"images/grey-tick.png\" /></a></div></div>
<div class=\"clearfix\"></div>";
}

else{
	echo "<div class=\"task\"><div class=\"taskdetail tov-blue\"><h1>$done_task_detail</h1><br />
<ul>
<li><a href=\"p_task_edit.php?id=$done_id_task\">Edit</a></li>
<li></a><a href=\"p_task_delete.php?id=$done_id_task\">Delete</a></li>
<li><a href=\"p_task_status.php?id=$done_id_task\">$done_public</a></li>
</ul>
</div><div class=\"managetask\"><a href=\"p_task_undone.php?id=$done_id_task\"><img src=\"images/bluetick.png\" /></a></div></div>
            <div class=\"clearfix\"></div>";
}
}
}

else{
	echo "Not done anything? Done your task now!";	
}
?>