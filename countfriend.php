<?
$count = "select count(*) from tov_friends where isuser=$iduser";
$resc = mysql_query($count);
//$nres = mysql_num_rows($resc);
$x = mysql_fetch_array($resc);
$row = $x['count(*)'];

echo $row;

?>