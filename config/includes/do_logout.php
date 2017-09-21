<?php 
session_start();
session_unset();
session_destroy(); 
header("Location:" .$SERVER['DOCUMENT_ROOT']."/absenon/login.php");
exit();
?>
