<?php
	require 'connect.php';
	// Count for number of messages.
	$q=mysql_query("select * from message");
	$count=mysql_num_rows($q);
	
	//Count for read and unread in messagestatus.
	$ip=$_SERVER['REMOTE_ADDR'];
	$mac = shell_exec('arp -a '.escapeshellarg(trim($ip)));
	$find="Physical";
	$pos=strpos($mac,$find);
	$macp=substr($mac,($pos+42),26);
	//echo $macp;
	//$q=mysql_query("select * from messagestatus where macid='$macp'");
	//$num=mysql_num_rows($q);
	//echo $num;
	
	
	mysql_query("insert ignore into messagestatus values('$macp','0','0','false')");
	
	
	$q1=mysql_query("select read_count,unread_count,flag from messagestatus where macid='$macp'");
	$res1=mysql_fetch_assoc($q1);
	$rcount=$res1['read_count'];
	$urcount=$res1['unread_count'];
	$flag=$res1['flag'];
	
	session_start();
	$_SESSION['msgcount']=$count;
	$_SESSION['rcount']=$rcount;
	$_SESSION['urcount']=$urcount;
	$_SESSION['flag']=$flag;

	
	if($flag=='false')
	{
		$count1=$count-$rcount;
		mysql_query("update messagestatus set unread_count='$count1',flag='true' where macid='$macp'");
			
	}
	$q2=mysql_query("select unread_count from messagestatus where macid='$macp'");
	$res2=mysql_fetch_assoc($q2);
	echo $res2['unread_count'];
	
?>