<? 

$last5 = "select * from tov_tasklist where id_user =$iduser order by id_task desc limit 0,10";
$res = mysql_query($last5);

while($row = mysql_fetch_array($res)){
		$time_id_user = $row['id_user'];
		$time_id_task = $row['id_task'];
		$time_task_date = $row['task_date'];
		$time_task_detail = $row['task_detail'];
		$time_post_date = $row['post_date'];
		$time_public = $row['public'];
		$time_status = $row['status'];
		
if($time_task_date=="0000-00-00"){
	$tgnih="Your GOAL";
}
else{
$tgnya = $row['task_date'];
$pdd =  substr($tgnya,-2);
$pmm =	substr($tgnya,5,2);
$pyy =	substr($tgnya,0,4);

$newtg= $pdd."-".$pmm."-".$pyy;
$tgnih = date('l - d F Y', strtotime($newtg));
}
if($time_public=="1"){
$time_public = "Set private";
}
else{
$time_public = "Show to public";	
}

if($time_status=='UND'){
	echo "<div class=\"task\"><div class=\"taskdetail\"><h3>$tgnih</h3>
<h1>$time_task_detail</h1><br />
<ul>
<li><a href=\"p_task_edit.php?id=$time_id_task\">Edit</a></li>
<li></a><a href=\"p_task_delete.php?id=$time_id_task\">Delete</a></li>
<li><a href=\"p_task_status.php?id=$time_id_task\">$time_public</a></li>
</ul>
</div><div class=\"managetask\"><a href=\"p_task_done.php?id=$time_id_task\"><img src=\"images/grey-tick.png\" /></a></div></div>
            <div class=\"clearfix\"></div>";
}

else{
	echo "<div class=\"task\"><div class=\"taskdetail tov-blue\"><h3>$tgnih</h3>
<h1>$time_task_detail</h1><br />
<ul>
<li><a href=\"p_task_edit.php?id=$time_id_task\">Edit</a></li>
<li></a><a href=\"p_task_delete.php?id=$time_id_task\">Delete</a></li>
<li><a href=\"p_task_status.php?id=$time_id_task\">$time_public</a></li>
</ul>
</div><div class=\"managetask\"><a href=\"p_task_undone.php?id=$time_id_task\"><img src=\"images/bluetick.png\" /></a></div></div>
            <div class=\"clearfix\"></div>";
}

}
?>