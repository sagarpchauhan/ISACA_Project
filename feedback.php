<?php
	require 'connect.php';
	session_start();
	$name=$_SESSION['firstname'];
	/*$q=mysql_query("select current_status from reg_user where firstname='$name'");
	$qr=mysql_fetch_assoc($q);
	if($qr['current_status']!='Active')
	{
		header("Location:index.php");
	}*/
	$time=time();
	$starttime=$_SESSION['starttime'];
	$mobilenumber=$_SESSION['mobilenumber'];
	$duration=floor(($time-$starttime)/60);
	mysql_query("update reg_user set duration='$duration' where mobile_number=$mobilenumber");

	//feedback time set 
	
	mysql_query("update formactivate set cur_time=$time where code='4404f82'");
	$queryf=mysql_query("select set_time from formactivate where code='4404f82'");
	$settime=mysql_fetch_assoc($queryf);
	$durationf=$time-$settime['set_time'];
	mysql_query("update formactivate set duration=$durationf where code='4404f82'");
	//echo $durationf;
	
	
?>
<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="myscript.js" type="text/javascript"></script>
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
				margin:5% 0;
				padding: 10%;
				color:#014262;
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

			.col-1 {width: 25%;}
			.col-2 {width: 75%;}

			@media only screen and (max-width: 768px) {
				/* For mobile phones: */
				[class*="col-"] {
					width: 100%;
				}
			}

		
			
			#mypdu,#agenda,#logout,#pmi,#adminreport {
			  background-color: #EAF0F3;
				color: #061f2d;
				padding: 6% 35%;
				margin: 3% 0;
				border: none;
				border-radius: 2%;
				cursor: pointer;
				box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
			}
			#mypdu:hover,#agenda:hover,#logout,#pmi:hover,#adminreport:hover {
			  background-color:#061f2d;
			  color:#EAF0F3
			}
			
			.aa{
				color:#ffffff;
				
			}
			
			h5{
				color:red;
			}
			
		</style>
	</head>
	<body>

		<div class="header">
		<h2>FEEDBACK<?php 
					$query=mysql_query('select img from image');
					$img_db=mysql_fetch_assoc($query);
					//echo $img_db['img']; 
					$imgname=$img_db['img'];
					
					
		            echo "<image src=\"image/$imgname\" width=\"115\" height=\"60\" style=\"float:right\"></h1>"; ?>
		
		</div>

		<div class="row">

			<div class="col-1 menu">
			
			<form action="agenda.php">
				<input type="submit" value="Agenda   " id="agenda">
			</form>
			
			<form action="mypdu.php">
				<input type="submit" value="CPE        " id="mypdu">
			</form>
			
			<form action="http://www.isaca.org" target="blank">
				<input type="submit" value="ISACA     " id="pmi">
			</form>
			
			<?php
				
				
				$query_button=mysql_query("select firstname from user_info where firstname='$name'");
				$row=mysql_fetch_assoc($query_button);
				$res=$row['firstname'];
				//echo $res;
				if($res=='sagar967')
				{
					//echo "this is not sagar";
					echo "<form action='adminreport.php'><input type='submit' value='Admin     ' id='adminreport'></form>";
				}
			?>	
			
			<form action="logout.php">
				<input type="submit" value="Logout    " id="logout">
			</form>
			
			</div>


			<div class="col-2 aside">
				<?php
					
					$qdur=mysql_query('select set_duration,set_time_hr_min from formactivate');
					$qdur_res=mysql_fetch_assoc($qdur);
					$sduration=$qdur_res['set_duration'];
					$time_hr_min=$qdur_res['set_time_hr_min'];
					if($time>=$settime['set_time'] && $durationf<$sduration)
					{
						echo "<a href=\"logout1.php\"><h4>Click Here</h4>(Fill Feedback at the end of the session)</a>";
					}
					else if($durationf<$sduration)
					{
						echo "<h5> Feedback Form will be activated at $time_hr_min  </h5>";
					}
					else
					{
						echo "<h5> Feedback Form is Expired.";
					}
				?>
					
	   		</div>

		</div>
		
		<div class="footer">
			Powered by <a class="aa" href="http://www.blueradianz.com" target="blank">RMASH technologies</a> © 2015-2016.
		
		</div>

	</body>
</html>

