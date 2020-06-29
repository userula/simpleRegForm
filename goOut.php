<?php 
session_start();
unset($_SESSION['user']);
session_unset();
session_destroy();
$_SESSION = array();
header("Location: authorization.php");
 ?>