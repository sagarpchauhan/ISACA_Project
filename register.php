<?php
	require 'connect.php';
		
	$fn=$mobno=$email=$memid="";
	
	if(empty($_POST['firstname']))
	{
		$nameerr="Name is Required";
	}
	
	else{
		$fn=$_POST['firstname'];
		$nameerr="";
	}
	
	if(empty($_POST['mobno']))
	{
		$mobnoerr="Mobile Number is required";
	}
	
	else{
		$mobno=$_POST['mobno'];
		$mobnoerr="";
	}
	
	if(empty($_POST['email']))
	{
		$email="";
	}
	
	else{
		$email=$_POST['email'];
	}
	
	if(empty($_POST['memid']))
	{
		$memid="";
	}
	
	else{
		$memid=$_POST['memid'];
	}
	
	if(empty($_POST['kind']))
	{
		$kind="";
	}
	
	else{
		$kind=$_POST['kind'];
		
	}
	
	
	
	$ip=$_SERVER['REMOTE_ADDR'];
    $mac = shell_exec('arp -a '.escapeshellarg(trim($ip)));
	$find="Physical";
	$pos=strpos($mac,$find);
	$macp=substr($mac,($pos+42),26);
	$time=time();
	date_default_timezone_set('Asia/Calcutta');
	$currentDateTime=date('d-m-Y h:i:s A');
		
    $ip=$_SERVER['REMOTE_ADDR'];
	$mac = shell_exec('arp -a '.escapeshellarg(trim($ip)));
	$find="Physical";
	$pos=strpos($mac,$find);
	$macp=substr($mac,($pos+42),26);
		
	if(!empty($fn)&&!empty($mobno)){
		
		$query1=mysql_query("select mobile_number from user_info where mobile_number='$mobno'");
		$query2=mysql_query("select mac from user_info where mac='$macp'");
		$num1=mysql_num_rows($query1);
		$num2=mysql_num_rows($query2);
		if($num1!=0 || $num2!=0)
		{
			if($num1!=0)
			{
				echo "<script>alert ('username already exist...')</script>";
			}
			else{
				echo"<script>alert ('Only one user can be registered from your device')</script>";
			}
			
		}
		else
		{
		mysql_query("insert into user_info values('$fn','$mobno','$email','$memid','$kind','$macp','$currentDateTime')")or die(mysql_error());
		session_start();
		$_SESSION['firstname']=$fn;
		$_SESSION['mobilenumber']=$mobno;
		$_SESSION['starttime']=$time;
		mysql_query("insert into time1 values(0,0,'$time','$time',0,0,0,'Active','$macp')");
		header('Location:agenda.php');
		}
	}
	
	
?>


<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<style>
			* {
				box-sizing: border-box;
			}
			.row::after {
				content: "";
				clear: both;
				display: block;
			}
			[class*="col-"] {
				float: left;
				padding: 15px;
			}
			html {
				font-family: "Lucida Sans", sans-serif;
			}
			.header {
				background-image:url('image/grey.jpg');
				color: #ffffff;
				padding: 15px;
			}
			
			.aside {
				background-color: #EAF0F3;
				padding: 15px;
				
				text-align: center;
				font-size: 14px;
				box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
			}
			.footer {
				background-image:url('image/grey.jpg');
				color: #ffffff;
				text-align: center;
				font-size: 12px;
				padding: 15px;
			}
			/* For desktop: */

			.col-1 {width: 50%;}
			.col-2 {width: 50%;}

			@media only screen and (max-width: 768px) {
				/* For mobile phones: */
				[class*="col-"] {
					width: 100%;
				}
			}

			#signin,#signup{
				background-color: #061f2d;
				color: #EAF0F3;
				padding: 3% 25%;
				margin: 2% 0;
				border: none;
				border-radius: 2%;
				cursor: pointer;
			}			
			
			    input[value]{
				color:#A9A9A9;
			}
			
						
			input[id=firstname],[id=mobno],[id=email],[id=memid], select {
				width: 95%;
				padding: 12px 20px;
				margin: 8px 0;
				display: inline-block;
				border: 1px solid #ccc;
				border-radius: 4px;
				
            }
			
			#mypdu,#feedback,#agenda {
			  background-color: #EAF0F3;
				color: #061f2d;
				padding: 5% 35%;
				margin: 1% 0;
				border: none;
				border-radius: 2%;
				cursor: pointer;
				box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
			}
			#mypdu:hover,#agenda:hover,#feedback:hover {
			  background-color:#061f2d;
			  color:#EAF0F3
			}
			
			a{
				color:#ffffff;
			}
						
			X{
				color:#061f2d;
			};
			
		</style>
	</head>
	<body>

		<div class="header">
		<h1>SIGNUP<?php 
					$query=mysql_query('select img from image');
					$img_db=mysql_fetch_assoc($query);
					//echo $img_db['img']; 
					$imgname=$img_db['img'];
					
					
		            echo "<image src=\"image/$imgname\" width=\"140\" height=\"60\" style=\"float:right\"></h1>"; ?>
		</div>
				
		<div class="row">

			<div class="col-1">
			
			<form action="register.php">	
				<input type="submit" value="Agenda   " id="agenda">
			</form>

			<form action="register.php">	
				<input type="submit" value="Feedback" id="feedback">
			</form>
			
			<form action="register.php">
				<input type="submit" value="CPE        " id="mypdu">
			</form>
			
			<form action="login.php">
				<input type="submit" value="Sign In    " id="mypdu">
			</form>
									
			</div>


			<div class="col-2 aside">
				<h1><x>SIGN UP</x></H1>
					
					<form action="register.php" method="post">
						<label for="firstname"><x>First Name *</x></label><span style="color:red"><?php echo " $nameerr";?></span>
						<input type="text" id="firstname" name="firstname" value="<?php echo "$fn";?>">
						
						<label for="mobno"><x>Mobile Number *</x></label><span style="color:red"><?php echo " $mobnoerr";?></span>
						<input type="text" id="mobno" name="mobno" value="<?php echo "$mobno";?>">
						
						<label for="email"><x>Email-Id</x></label>
						<input type="email" id="email" name="email" value="<?php echo "$email";?>">
						 
						<label for="memid"><x>Member-Id</x></label>
						<input type="text" id="memid" name="memid" value="<?php echo "$memid";?>">
						
						<input type="radio" name="kind" value="member"><x>Member</x>
						<input type="radio" name="kind" value="non-member"><x>Non-Member</x>
						<input type="radio" name="kind" value="invitee"><x>Invitee</x>
						<input type="radio" name="kind" value="speaker"><x>Speaker	</x><br>
	
						<input type="submit" value="SIGN UP" id="signup" >
					</form>
								
			</div>

		</div>

		<div class="footer">
			Powered by <a href="http://www.blueradianz.com" target="blank">RMASH technologies</a> © 2015-2016.
		</div>

	</body>
</html>

