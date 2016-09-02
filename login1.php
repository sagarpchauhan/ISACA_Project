<?php
	require 'connect.php';
	if (isset($_POST['firstname'])&&isset($_POST['mobno'])){
	$fn=$_POST['firstname'];
	$mobno=$_POST['mobno'];
	$time=time();
	//$mobno=9673398847;
	
	if(!empty($fn)&&!empty($mobno))
	{
		$query_run=mysql_query("select firstname from reg_user where firstname='$fn' and mobile_number='$mobno'");
		if(mysql_num_rows($query_run)==0)
		{
				echo "<script>alert ('match not found...')</script>";
		}
		else{
			session_start();
			$_SESSION['firstname']=$fn;
			$_SESSION['mobilenumber']=$mobno;
			$_SESSION['starttime']=$time;
			
			 date_default_timezone_set('Asia/Calcutta');
			 $currentDateTime=date('d-m-Y h:i:s A');
			
    		 $newDateTime = date('h:i:s A', strtotime($currentDateTime));
			 //echo $newDateTime;
			
			mysql_query("update reg_user set time='$time',timea='$newDateTime',current_status='Active' where mobile_number='$mobno'");
			//$ltime=mysql_query("select time from reg_user where mobile_number=$mobno");
			//$_SESSION['ltime']=$ltime;
			header('Location:agenda.php');
		}
		
	}
	else
	{
		echo "<script>alert ('all fields required')</script>";
	}
	
	
?>


	
	<?php
	//movePage(301,"http://www.google.com/");

	}
	header("Location:/survey/index.php?survey=63e3031");
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
				background-image:url('image/blue.jpg');
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
				background-image:url('image/blue.jpg');
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
				background-color: #3b5998;
				color: #EAF0F3;
				padding: 3% 25%;
				margin: 2% 0;
				border: none;
				border-radius: 2%;
				cursor: pointer;
			}			
			
			
			
			
			input[id=email],[id=lpassword],select{
				padding: 12px 20px;
				margin: 8px 0;
				border: 1px solid #ccc;
				border-radius: 4px;
			}
			
			input[id=firstname],[id=mobno], select {
				width: 95%;
				padding: 12px 20px;
				margin: 8px 0;
				display: inline-block;
				border: 1px solid #ccc;
				border-radius: 4px;
				
            }
			
			#mypdu,#agenda,#feedback {
			  background-color: #EAF0F3;
				color: #3b5998;
				padding: 5% 35%;
				margin: 1% 0;
				border: none;
				border-radius: 2%;
				cursor: pointer;
				box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
			}
			#mypdu:hover,#agenda:hover,#feedback:hover {
			  background-color:#3b5998;
			  color:#EAF0F3
			}
			
			a{
				color:#ffffff;
			}
			
			X{
				color:#3b5998;
			};
		</style>
	</head>
	<body>

		<div class="header">
		<h1>LOGIN<?php 
					$query=mysql_query('select img from image');
					$img_db=mysql_fetch_assoc($query);
					//echo $img_db['img']; 
					$imgname=$img_db['img'];
					
					
		            echo "<image src=\"image/$imgname\" width=\"150\" height=\"60\" style=\"float:right\"></h1>"; ?>
		</div>

		<div class="row">

			<div class="col-1 menu">
			
			<form action="login.php">
				<input type="submit" value="Agenda   " id="agenda">
			</form>
			
			<form action="login.php">
				<input type="submit" value="Feedback" id="feedback">
			</form>
			
			<form action="login.php">
				<input type="submit" value="Mypdu    " id="mypdu">
			</form>
			
			
								
			</div>


			<div class="col-2 aside">
			<h1><x>SIGN IN</x></h1>
								<hr style="height:2px;border-width:0;background-color:gray">

								<form action="login1.php" method="POST">
									<label for="fname"><x>First Name</x></label>
									<input type="text" id="firstname" name="firstname">
									
									<label for="mobno"><x>Mobile Number</x></label>
									<input type="text" id="mobno" name="mobno">
									 
									<input type="submit" value="SIGN IN" id="signin" >
									<hr style="height:2px;border-width:0;background-color:grey">

									<br><br>
									<x>New USER</x>
									<br>
								</form>
								<form action="register.php">	
									<input type="submit" value="SIGN UP" id="signup" >
								</form>	
			</div>

		</div>

		<div class="footer">
			Powered by <a href="http://www.blueradianz.com" target="blank">RMASH technologies</a> © 2015-2016.
		</div>

	</body>
</html>

