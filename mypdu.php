<?php
	require 'connect.php';
	session_start();
	$macp=$_SESSION['mac'];
	$q=mysql_query("select * from time1 where mac='$macp'");
	$r=mysql_fetch_assoc($q);
	$duration=$r['duration'];
	$totaltime=$r['totaltime_min'];
	$pdu=$r['pdu'];
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
			
												
			.footer {
				background-image:url('image/grey.jpg');
				color: #ffffff;
				text-align: center;
				font-size: 12px;
				padding: 15px;
			}
			/* For desktop: */

			.col-1 {width: 25%;}
			.col-2 {width: 75%;margin:5% 0;}

			@media only screen and (max-width: 768px) {
				/* For mobile phones: */
				[class*="col-"] {
					width: 100%;
				}
			}

				
			#mypdu,#agenda,#feedback,#logout,#pmi,#adminreport {
			  background-color: #EAF0F3;
				color: #061f2d;
				padding: 5% 35%;
				margin: 1% 0;
				border: none;
				border-radius: 2%;
				cursor: pointer;
				box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
			}
			#mypdu:hover,#agenda:hover,#feedback:hover,#logout,#pmi:hover,#adminreport:hover {
			  background-color:#061f2d;
			  color:#EAF0F3
			}
			
			table { 
			   
			  border-collapse: collapse; 
			}
			
			tr:nth-of-type(even) { 
			  background: #eee; 
			}
			th { 
			  background: #061f2d; 
			  color: white; 
			  font-weight: bold; 
			}
			td, th { 
			  padding: 6px; 
			  border: 1px solid #ccc; 
			  text-align: left; 
			}
			
			a{
				color:#ffffff;
				
			}
			
		</style>
	</head>
	<body>

		<div class="header">
		<h1>MYPDU<?php 
					$query=mysql_query('select img from image');
					$img_db=mysql_fetch_assoc($query);
					//echo $img_db['img']; 
					
					$imgname=$img_db['img'];
					
					
		            echo "<image src=\"image/$imgname\" width=\"130\" height=\"60\" style=\"float:right\"></h1>"; ?>
		</div>

		<div class="row">

			<div class="col-1">
			
			<form action="agenda.php">
				<input type="submit" value="Agenda    " id="agenda">
			</form>
			
			<form action="feedback.php">
				<input type="submit" value="Feedback " id="feedback">
			</form>
			
			<form action="mypdu.php">
				<input type="submit" value="CPE         " id="mypdu">
			</form>
			
			<form action="http://www.isaca.org" target="blank">
				<input type="submit" value="ISACA     " id="pmi">
			</form>
			
			<?php
				$name=$_SESSION['firstname'];
				$query_button=mysql_query("select firstname from user_info where firstname='$name'");
				$row=mysql_fetch_assoc($query_button);
				$res=$row['firstname'];
				if($res=='sagar967')
				{
					echo "<form action='adminreport.php'><input type='submit' value='Admin     ' id='adminreport'></form>";
				}
			?>	
			
			<form action="logout.php">
				<input type="submit" value="Logout     " id="logout">
			</form>
			
			</div>


			<div class="col-2" style="overflow-x:auto;">
				
				 	<table style="width:650">
						<tr>
							<th>Name</th>
							<th>CURRENT<br>SESSION<br>Duration (minutes)</th>
							<th>Total<br>Time (minutes)</th>
							<th>CPE</th>
						</tr>
						<tr>
							<td><?php echo $name;?></td>
							<td><?php echo $duration;?></td>
							<td><?php echo $totaltime;?></td>
							<td><?php echo $pdu;?></td>
						</tr>
					</table>		
					
						
			</div>
			
		</div>

		<div class="footer">
		
			Powered by <a href="http://www.blueradianz.com" target="blank">RMASH technologies</a> © 2015-2016.
			
		</div>
		
		

	</body>
</html>

