<?php
	require 'connect.php';
	session_start();
	$macp=$_SESSION['mac'];
	$fn=$_SESSION['firstname'];
	$mobno=$_SESSION['mobilenumber'];
	$query_user=mysql_query("select usertype from user_info where firstname='$fn' and mobile_number='$mobno'");
	$row_user=mysql_fetch_assoc($query_user);
	$user=$row_user['usertype'];
	
	mysql_query("insert ignore into messagestatus values('$macp','0','0','false','unread')");
	
	if($user=='admin')
	{
		// Count for number of messages.
		$q=mysql_query("select * from message where recipient='admin'");
		$count=mysql_num_rows($q);
		//Count for read and unread in messagestatus.
		$q1=mysql_query("select read_count,unread_count,flag from messagestatus where macid='$macp'");
		$res1=mysql_fetch_assoc($q1);
		$rcount=$res1['read_count'];
		$urcount=$res1['unread_count'];
		$flag=$res1['flag'];
		
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
	}
	
	else{
		// Count for number of messages.
		$q=mysql_query("select * from message where recipient='user'");
		$count=mysql_num_rows($q);
		//Count for read and unread in messagestatus.
		$q1=mysql_query("select read_count,unread_count,flag from messagestatus where macid='$macp'");
		$res1=mysql_fetch_assoc($q1);
		$rcount=$res1['read_count'];
		$urcount=$res1['unread_count'];
		$flag=$res1['flag'];
		
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
	}
?>