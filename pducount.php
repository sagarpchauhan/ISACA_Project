<?php
	
	require 'connect.php';
	
	//Getting macp.
	session_start();
	$macp=$_SESSION['mac'];
	
	//Calculating totaltime	
	$q=mysql_query("select * from time1 where mac='$macp'");
	$r=mysql_fetch_assoc($q);
	$curtime=$r['curtime'];
	$status=$r['status'];
	$totaltime=$r['totaltime'];
	$tmpcurtime=$r['tmpcurtime'];
	
	if($status=="Active")
	{
		$duration=strtotime('now')-$curtime;
		$tmpduration=strtotime('now')-$tmpcurtime;
		$totaltime=$totaltime+$tmpduration;
		$duration_min=floor($duration/60);
		//Updating duration and totaltime into database.
		mysql_query("update time1 set duration='$duration_min',totaltime='$totaltime',totaltime_min='$totaltime' where mac='$macp'");
		$tmpcurtime=strtotime('now');
				
		//Calculating PDU.
		$q1=mysql_query("select * from time1 where mac='$macp'");
		$row1=mysql_fetch_assoc($q1);
		$totaltime_min=floor($row1['totaltime']/60);
		$duration1=$totaltime_min;
		$quo=floor($duration1/15);
		$rem=$quo%2;		

		if($rem!=0)
				{
					$ntimes=($quo/2)+0.5;
					$pdu=$ntimes*0.5;
				}
		else{
			$pdu=($quo/2)*0.5;
		}
		//Updating PDU into database.
		mysql_query("update time1 set tmpduration=0,tmpcurtime='$tmpcurtime',pdu=$pdu,totaltime_min=$totaltime_min where mac='$macp'");
	}

?>