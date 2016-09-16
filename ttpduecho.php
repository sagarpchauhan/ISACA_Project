<?php
	require 'connect.php';
	session_start();
	$macp=$_SESSION['mac'];
	$fn=$_SESSION['firstname'];
	$mobno=$_SESSION['mobilenumber'];
	$q=mysql_query("SELECT duration,totaltime_min,pdu from time1 INNER JOIN user_info on time1.mac=user_info.mac where user_info.firstname='$fn' and user_info.mobile_number='$mobno'");
	$r=mysql_fetch_assoc($q);
	$duration=$r['duration'];
	$totaltime=$r['totaltime_min'];
	$pdu=$r['pdu'];
	echo json_encode(array($duration, $totaltime, $pdu));
?>