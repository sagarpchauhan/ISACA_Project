<?php 
require 'connect.php';
session_start();

$time=time();
$mobilenumber=$_SESSION['mobilenumber'];
$name=$_SESSION['firstname'];
$starttime=$_SESSION['starttime'];
$duration=floor(($time-$starttime)/60);
$qrun=mysql_query("select totaltime from reg_user where mobile_number='$mobilenumber'");
$qrow=mysql_fetch_assoc($qrun);
$prevtime=$qrow['totaltime'];
//echo "previous time was $prevtime";
$updatetime=$duration+$prevtime;
mysql_query("update reg_user set duration='$duration',totaltime='$updatetime' where mobile_number='$mobilenumber'");

$query1=mysql_query("select totaltime from reg_user where mobile_number='$mobilenumber'");
$qres1=mysql_fetch_assoc($query1);
$num=$qres1['totaltime'];

/*$query2=mysql_query("select pdu from reg_user where mobile_number='$mobilenumber'");
$qres2=mysql_fetch_assoc($query2);
$pdu=$qres2['pdu'];*/
$quo=floor($num/15);
$rem=$quo%2;		

if($rem!=0)
		{
			$ntimes=($quo/2)+0.5;
			$pdu=$ntimes*0.5;
		}
else{
	$pdu=($quo/2)*0.5;
}		
date_default_timezone_set('Asia/Calcutta');
	$currentDateTime=date('d-m-Y h:i:s A');
			
    $newDateTime = date('h:i:s A', strtotime($currentDateTime));
mysql_query("update reg_user set pdu='$pdu',current_status='$newDateTime' where mobile_number='$mobilenumber'");

session_destroy();
header("Location:/survey/index.php?survey=4a42aef");
//echo $updatetime;
//echo "Duration:$duration";
?>