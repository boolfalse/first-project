<?php
session_start();
//$_SESSION['login'] = "";
$_SESSION['password'] = "";
unset($_SESSION['isUserLogin']);
unset($_SESSION['id']);
//session_destroy();
unset($_GET['logout']);
header("Location: index.php");
exit;
?>