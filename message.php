<?php
	require 'connect.php';
	date_default_timezone_set('Asia/Calcutta');
	$time=date('h:i:s A');
	if(isset($_POST['message'])&&!empty($_POST['message']))
	{
		$msg=$_POST['message'];
		
		mysql_query("insert into message values('','$msg','$time')");
		mysql_query("update messagestatus set flag='false'");
		
	}
?>

<form action="message.php" method="post">
	<textarea id="message" name="message" rows="4" cols="25"></textarea><br>
	<input type="submit" value="send">
</form>