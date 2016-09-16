<?php 
require 'connect.php';
session_destroy();
session_start();
$macp=$_SESSION['mac'];
mysql_query("update time1 set status='Non-Active' where mac='$macp'");
header("Location:index.php");

?>