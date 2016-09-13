<?php
	require'connect.php';
	if(isset($_POST['start_time']) && isset($_POST['duration']))
	{
		$start_time=$_POST['start_time'];
		$sduration=$_POST['duration']*60;
		$time=time();
		
		
		if(!empty($start_time)&&!empty($sduration))
		{
			date_default_timezone_set('Asia/Calcutta');
			$currentDateTime=date('d-m-Y h:i:s A');
			$newDateTime = date('d-m-Y', strtotime($currentDateTime));
			$d = date('d', strtotime($currentDateTime));
			$m=date('m', strtotime($currentDateTime));
			$y=date('Y', strtotime($currentDateTime));
			//$h=date('h', strtotime($currentDateTime));
			//$i=date('i', strtotime($currentDateTime));
			$h=substr("$start_time",0,2);
			$min=substr("$start_time",3,2);
			$start_time_epo=mktime($h,$min,0, $m, $d, $y);
			$cduration=$time-$start_time_epo;
			
			//echo $h." ".$min;
			//echo $time."<br>".$start_time."<br>".$cduration."<br>".$sduration."<br>".$newDateTime;
			mysql_query("update formactivate set cur_time='$time',set_time='$start_time_epo',duration='$cduration',set_duration='$sduration',cur_date='$newDateTime',set_time_hr_min='$start_time'");
			//header("Location:adminreport.php");
		}
		
		
	}
	/*$query=mysql_query("select event from eventtable where starttime='10:15'");
	$qres=mysql_fetch_assoc($query);
	echo $qres['event'];*/
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
				margin:2% 0;
				padding: 10%;
				
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

			.col-1 {width: 45%;}
			.col-2 {width: 55%;}

			@media only screen and (max-width: 768px) {
				/* For mobile phones: */
				[class*="col-"] {
					width: 100%;
				}
			}

			#update{
				background-color: #061f2d;
				color: #EAF0F3;
				padding: 3% 25%;
				margin: 2% 0;
				border: none;
				border-radius: 2%;
				cursor: pointer;
			}	
			
			input[id=start_time],[id=duration],select{
				width: 95%;
				padding: 12px 20px;
				margin: 8px 0;
				display: inline-block;
				border: 1px solid #ccc;
				border-radius: 4px;
			}
			
			        input[value]{
				color:#A9A9A9;
			}
			
						
			
			
			#back {
			  background-color: #EAF0F3;
				color: #061f2d;
				padding: 5% 35%;
				margin: 1% 0;
				border: none;
				border-radius: 2%;
				cursor: pointer;
				box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
			}
			#back:hover {
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
		<h1>SURVEY<br>SETTING<?php 
					$query=mysql_query('select img from image');
					$img_db=mysql_fetch_assoc($query);
					//echo $img_db['img']; 
					$imgname=$img_db['img'];
					
		            echo "<image src=\"image/$imgname\" width=\"120\" height=\"60\" style=\"float:right\"></h1>"; ?>
		</div>

		<div class="row">

			<div class="col-1">
			
				<form action="adminreport.php">
				  <input type="submit" id="back" value="<<Back  ">
			    </form>
			
			</div>


			<div class="col-2 aside">
				
				 <form action="surveysetting.php" method="POST">
					<label for="start_time"><x>Feedback Start Time </x></label>
					<input type="time" id="start_time" name="start_time">
					<label for="duration"><x>Duration (in minutes)</x></label>
					<input type="text" id="duration" name="duration">
					<input type="submit" value="UPDATE" id="update">
				</form>		
					
						
			</div>
			
		</div>

		<div class="footer">
		
			Powered by <a href="http://www.blueradianz.com" target="blank">RMASH technologies</a> © 2015-2016.
			
		</div>
		
		

	</body>
</html>

