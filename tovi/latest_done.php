<?php 

//$id_user = $_SESSION['iduser'];
$today = date("Y-m-d");
$latest = "SELECT *
FROM tov_tasklist
WHERE id_user = $iduser
AND STATUS = 'DON'
ORDER BY id_task DESC
LIMIT 0 , 1";
$tres = mysql_query($latest);

//$cek_row = mysql_num_rows($latest);

//if($cek_row > 0){
$row=mysql_fetch_array($tres);
$ld_id_user = $row['id_user'];
$ld_id_task = $row['id_task'];
$ld_task_date = $row['task_date'];
$ld_task_detail = $row['task_detail'];
$ld_post_date = $row['post_date'];
$ld_public = $row['public'];
$ld_status = $row['status'];

echo "<i style=\"font-size:12px;\">$ld_task_detail</i>";
//}

//else{
// echo "You done nothing yet!";
//}
?>