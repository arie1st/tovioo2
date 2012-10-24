<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<? $week_number = 40;
$year = 2008;
for($day=1; $day<=7; $day++)
{
    $tanggal = date('Y-m-d', strtotime($year."W".$week_number.$day));
	$sql = "select * from tov_tasklist where task_date ='$tanggal' and id_user=$iduser";
	$res = mysql_query($sql);
	while($this_week = mysql_fetch_array($res)){
		$tw_id_user = $this_week['id_user'];
		$tw_id_task = $this_week['id_task'];
		$tw_task_date = $this_week['task_date'];
		$tw_task_detail = $this_week['task_detail'];
		$tw_post_date = $this_week['post_date'];
		$tw_public = $this_week['public'];
		$tw_status = $this_week['status'];
		
	if($tw_status=="UND"){
	echo "<div class=\"task\"><div class=\"taskdetail\">$tw_task_detail</div><div class=\"managetask\"><a href=\"p_task_done.php?id=$tw_id_task\"><img src=\"images/grey-tick.png\" /></a><br /><a href=\"p_task_edit.php?id=$tw_id_task\"><img src=\"images/pen.png\" /></a>&nbsp;<a href=\"p_task_delete.php?id=$tw_id_task\"><img src=\"images/bin.png\" /></a></a>&nbsp;<a href=\"p_task_status.php?id=$tw_id_task\"><img src=\"images/unlock.png\" /></a></div></div>
            <div class=\"clearfix\"></div>";
}

else{
	echo "<div class=\"task\"><div class=\"taskdetail tov-blue\">$tw_task_detail</div><div class=\"managetask\"><a href=\"p_task_done.php?id=$tw_id_task\"><img src=\"images/bluetick.png\" /></a><br /><a href=\"p_task_edit.php?id=$tw_id_task\"><img src=\"images/pen.png\" /></a>&nbsp;<a href=\"p_task_delete.php?id=$tw_id_task\"><img src=\"images/bin.png\" /></a></a>&nbsp;<a href=\"p_task_status.php?id=$tw_id_task\"><img src=\"images/unlock.png\" /></a></div></div>
            <div class=\"clearfix\"></div>";	
}
	}
}
?>

</body>
</html>