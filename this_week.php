<? 
$week_number = date("W");
$year = date("Y");
for($day=1; $day<=7; $day++)
{
	//echo date('Y-m-d', strtotime($year."W".$week_number.$day))."<br/>";
    $tw_tanggal = date('Y-m-d', strtotime($year."W".$week_number.$day));
	$sql = "select * from tov_tasklist where task_date ='$tw_tanggal' and id_user=$iduser";
	//echo $sql."<br/>";
	$res = mysql_query($sql);
	while($this_week = mysql_fetch_array($res)){
		$tw_id_user = $this_week['id_user'];
		$tw_id_task = $this_week['id_task'];
		$tw_task_date = $this_week['task_date'];
		$tw_task_detail = $this_week['task_detail'];
		$tw_post_date = $this_week['post_date'];
		$tw_public = $this_week['public'];
		$tw_status = $this_week['status'];
		
		$tgnya = $this_week['task_date'];
		$pdd =  substr($tgnya,-2);
		$pmm =	substr($tgnya,5,2);
		$pyy =	substr($tgnya,0,4);
		
		$newtg= $pdd."-".$pmm."-".$pyy;
		$tgnih = date('l - d F Y', strtotime($newtg));

		if($tw_public=="1"){
		$tw_public = "Set private";
		}
		else{
		$tw_public = "Show to public";	
		}
		
	if($tw_status=='UND'){
	echo "<div class=\"task\"><div class=\"taskdetail\"><h3>$tgnih</h3><h1>$tw_task_detail</h1><br />
<ul>
<li><a href=\"p_task_edit.php?id=$tw_id_task\">Edit</a></li>
<li></a><a href=\"p_task_delete.php?id=$tw_id_task\">Delete</a></li>
<li><a href=\"p_task_status.php?id=$tw_id_task\">$tw_public</a></li>
</ul>
</div><div class=\"managetask\"><a href=\"p_task_done.php?id=$tw_id_task\"><img src=\"images/grey-tick.png\" /></a></div></div>
            <div class=\"clearfix\"></div>";
}

else{
	echo "<div class=\"task\"><div class=\"taskdetail tov-blue\"><h3>$tgnih</h3><h1>$tw_task_detail</h1><br />
<ul>
<li><a href=\"p_task_edit.php?id=$tw_id_task\">Edit</a></li>
<li></a><a href=\"p_task_delete.php?id=$tw_id_task\">Delete</a></li>
<li><a href=\"p_task_status.php?id=$tw_id_task\">$tw_public</a></li>
</ul>
</div><div class=\"managetask\"><a href=\"p_task_undone.php?id=$tw_id_task\"><img src=\"images/bluetick.png\" /></a></div></div>
            <div class=\"clearfix\"></div>";
}
	}
}
?>