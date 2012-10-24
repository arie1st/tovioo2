<?php

$besok = mktime(0, 0, 0, date("m"), date("d")+1, date("y"));
$tomorrow=  date("Y-m-d", $besok);

$tasks = "select * from tov_tasklist where id_user='".$id_user."' and task_date='".$tomorrow."'";
$tres_tomo = mysql_query($tasks);
$nres_tomo = mysql_num_rows($tres_tomo);

if($nres>1){

while($row=mysql_fetch_array($tres_tomo)){
	
$tomo_id_user = $row['id_user'];
$tomo_id_task = $row['id_task'];
$tomo_task_date = $row['task_date'];
$tomo_task_detail = $row['task_detail'];
$tomo_post_date = $row['post_date'];
$tomo_public = $row['public'];
$tomo_status = $row['status'];

if($tomo_public=="1"){
$tomo_public = "Set private";
}
else{
$tomo_public = "Show to public";	
}

if($tomo_status=="UND"){
	echo "<div class=\"task\"><div class=\"taskdetail\"><h1>$tomo_task_detail</h1><br />
<ul>
<li><a href=\"p_task_edit.php?id=$tomo_id_task\">Edit</a></li>
<li></a><a href=\"p_task_delete.php?id=$tomo_id_task\">Delete</a></li>
<li><a href=\"p_task_status.php?id=$tomo_id_task\">$tomo_public</a></li>
</ul></div><div class=\"managetask\"><a href=\"p_task_done.php?id=$tomo_id_task\"><img src=\"images/grey-tick.png\" /></a></div></div>
            <div class=\"clearfix\"></div>";
}

else{
	echo "<div class=\"task\"><div class=\"taskdetail tov-blue\"><h1>$tomo_task_detail</h1><br />
<ul>
<li><a href=\"p_task_edit.php?id=$tomo_id_task\">Edit</a></li>
<li></a><a href=\"p_task_delete.php?id=$tomo_id_task\">Delete</a></li>
<li><a href=\"p_task_status.php?id=$tomo_id_task\">$tomo_public</a></li>
</ul></div><div class=\"managetask\"><a href=\"p_task_undone.php?id=$tomo_id_task\"><img src=\"images/bluetick.png\" /></a></div></div>
            <div class=\"clearfix\"></div>";	
}
}
}

else{
	echo "What your plan for tommorow? Start writing now!";
}
?>