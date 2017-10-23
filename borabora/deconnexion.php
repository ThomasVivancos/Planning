<?php
session_start();
unset($_SESSION);
$res=session_destroy();
header('location: index.php');
exit();
?>