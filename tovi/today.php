<?php 

//$id_user = $_SESSION['iduser'];
$today = date("Y-m-d");
$tasks = "select * from tov_tasklist where id_user='".$id_user."' and task_date='".$today."'";
$tres = mysql_query($tasks);
$nres = mysql_num_rows($tres);

if($nres>0){

while($row=mysql_fetch_array($tres)){
	
$today_id_user = $row['id_user'];
$today_id_task = $row['id_task'];
$today_task_date = $row['task_date'];
$today_task_detail = $row['task_detail'];
$today_post_date = $row['post_date'];
$today_public = $row['public'];
$today_status = $row['status'];

if($today_public=="1"){
$today_public = "Set private";
}
else{
$today_public = "Show to public";	
}

if($today_status=='UND'){
	echo "<div class=\"task\"><div class=\"taskdetail\"><h1>$today_task_detail</h1><br />
<ul>
<li><a href=\"p_task_edit.php?id=$today_id_task\">Edit</a></li>
<li></a><a href=\"p_task_delete.php?id=$today_id_task\">Delete</a></li>
<li><a href=\"p_task_status.php?id=$today_id_task\">$today_public</a></li>
</ul>
</div><div class=\"managetask\"><a href=\"p_task_done.php?id=$today_id_task\"><img src=\"images/grey-tick.png\" /></a></div></div>
<div class=\"clearfix\"></div>";
}

else{
	echo "<div class=\"task\"><div class=\"taskdetail tov-blue\"><h1>$today_task_detail</h1><br />
<ul>
<li><a href=\"p_task_edit.php?id=$today_id_task\">Edit</a></li>
<li></a><a href=\"p_task_delete.php?id=$today_id_task\">Delete</a></li>
<li><a href=\"p_task_status.php?id=$today_id_task\">$today_public</a></li>
</ul></div>
<div class=\"managetask\"><a href=\"p_task_undone.php?id=$today_id_task\"><img src=\"images/bluetick.png\" /></a></div></div>
<div class=\"clearfix\"></div>";
}
}

}

else{
echo "Nothing to do? Start writing your task today";
	
}
?>