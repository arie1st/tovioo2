<? 
if(!isset($_GET['month'])){
	echo"";
}
else
{
	$bln = $_GET['month'];

$monthly = "select * from tov_tasklist where id_user =$iduser and task_date like '$bln%' order by task_date asc";
$mres = mysql_query($monthly);

while($ro = mysql_fetch_array($mres)){
		$choose_id_user = $ro['id_user'];
		$choose_id_task = $ro['id_task'];
		$choose_task_date = $ro['task_date'];
		$choose_task_detail = $ro['task_detail'];
		$choose_post_date = $ro['post_date'];
		$choose_public = $ro['public'];
		$choose_status = $ro['status'];
		
$tgnya = $ro['task_date'];
$pdd =  substr($tgnya,-2);
$pmm =	substr($tgnya,5,2);
$pyy =	substr($tgnya,0,4);

$newtg= $pdd."-".$pmm."-".$pyy;
$tgnih = date('l - d F Y', strtotime($newtg));

if($choose_public=="1"){
		$choose_public = "Set private";
		}
		else{
		$choose_public = "Show to public";	
		}
		
	if($choose_status=='UND'){
	echo "<div class=\"task\"><div class=\"taskdetail\"><h3>$tgnih</h3><h1>$choose_task_detail</h1><br />
<ul>
<li><a href=\"p_task_edit.php?id=$choose_id_task\">Edit</a></li>
<li></a><a href=\"p_task_delete.php?id=$choose_id_task\">Delete</a></li>
<li><a href=\"p_task_status.php?id=$choose_id_task\">$choose_public</a></li>
</ul>
</div><div class=\"managetask\"><a href=\"p_task_done.php?id=$choose_id_task\"><img src=\"images/grey-tick.png\" /></a></div></div>
            <div class=\"clearfix\"></div>";
}

else{
	echo "<div class=\"task\"><div class=\"taskdetail tov-blue\"><h3>$tgnih</h3><h1>$choose_task_detail</h1><br />
<ul>
<li><a href=\"p_task_edit.php?id=$choose_id_task\">Edit</a></li>
<li></a><a href=\"p_task_delete.php?id=$choose_id_task\">Delete</a></li>
<li><a href=\"p_task_status.php?id=$choose_id_task\">$choose_public</a></li>
</ul>
</div><div class=\"managetask\"><a href=\"p_task_undone.php?id=$choose_id_task\"><img src=\"images/bluetick.png\" /></a></div></div>
            <div class=\"clearfix\"></div>";
}

}

}
?>