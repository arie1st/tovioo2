<?php
session_start();
setcookie("user", "$iduser",time()-3600);
session_destroy();
header('Location: index.php');
exit;

?>