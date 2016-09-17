<?php
	require 'connect.php';
	
	$ip=$_SERVER['REMOTE_ADDR'];
    $mac = shell_exec('arp -a '.escapeshellarg(trim($ip)));
	$find="Physical";
	$pos=strpos($mac,$find);
	$macp=substr($mac,($pos+42),26);
	/*
	$q=mysql_query("select * from messagestatus where macid='$macp'");
	$r=mysql_fetch_assoc($q);
	$uncount=$r['unread_count'];
	
	//Fetch from user_info see that which macid is admin
	//then at messagestatus see the unread count attached with macid
	//now change the status of message to unread according to the number of unread count order by id desc
	*/
	
	$q=mysql_query("update messagestatus inner join user_info on messagestatus.macid=user_info.mac set messagestatus.status='unread' where user_info.usertype='user'");
	
?>