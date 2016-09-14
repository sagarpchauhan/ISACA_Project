<?php
	
	
		if(empty($_POST['kind']))
		{
			
			$kind="track Req";
			
		}
		
		else{
			$kind=$_POST['kind'];
			
		}
		
	    if(isset($_POST['kind']))
		{
			session_start();
			$_SESSION['track']=$_POST['kind'];
			header("Location:notification_check.php");
		}
?>


<span style="color:red"><?php echo " $kind";?></span><br>
<form action="" method="POST">
	<input type="radio" name="kind" value="track1">Track-1 
	<input type="radio" name="kind" value="track2">Track-2<br>
	<input type="submit" name="submit">
</form>