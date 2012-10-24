<?php 

//$id_user = $_SESSION['iduser'];

$goal = "select * from tov_tasklist where id_user='".$id_user."' and task_date='0000-00-00' order by id_task DESC";
$gres = mysql_query($goal);
$nres_goal = mysql_num_rows($gres);

if($nres_goal>0){
while($row=mysql_fetch_array($gres)){
	
$goal_id_user = $row['id_user'];
$goal_id_task = $row['id_task'];
$goal_task_date = $row['task_date'];
$goal_task_detail = $row['task_detail'];
$goal_post_date = $row['post_date'];
$goal_public = $row['public'];
$goal_status = $row['status'];

if($goal_public=="1"){
$goal_public = "Set private";
}
else{
$goal_public = "Show to public";	
}

if($goal_status=="UND"){
	echo "<div class=\"task\"><div class=\"taskdetail\"><h1>$goal_task_detail</h1><br />
<ul>
<li><a href=\"p_task_edit.php?id=$goal_id_task\">Edit</a></li>
<li></a><a href=\"p_task_delete.php?id=$goal_id_task\">Delete</a></li>
<li><a href=\"p_task_status.php?id=$goal_id_task\">$goal_public</a></li>
</ul>
</div><div class=\"managetask\"><a href=\"p_task_done.php?id=$goal_id_task\"><img src=\"images/grey-tick.png\" /></a></div></div>
            <div class=\"clearfix\"></div>";
}

else{
	echo "<div class=\"task\"><div class=\"taskdetail tov-blue\"><h1>$goal_task_detail</h1><br />
<ul>
<li><a href=\"p_task_edit.php?id=$goal_id_task\">Edit</a></li>
<li></a><a href=\"p_task_delete.php?id=$goal_id_task\">Delete</a></li>
<li><a href=\"p_task_status.php?id=$goal_id_task\">$goal_public</a></li>
</ul>
</div><div class=\"managetask\"><a href=\"p_task_undone.php?id=$goal_id_task\"><img src=\"images/bluetick.png\" /></a></div></div>
            <div class=\"clearfix\"></div>";
}
}
}

else{
	echo "Tell us what your goals or what you want to achieve. Start writing now!";
}
?>