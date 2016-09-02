<?php
	require 'connect.php';
	session_start();
	$time=time();
	$starttime=$_SESSION['starttime'];
	$mobilenumber=$_SESSION['mobilenumber'];
	$duration=floor(($time-$starttime)/60);
	mysql_query("update reg_user set duration='$duration' where mobile_number=$mobilenumber");
	
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
				margin:1% 0;
				
			}
									
			.footer {
				background-image:url('image/grey.jpg');
				color: #ffffff;
				text-align: center;
				margin:2% 0;
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

			
						
			#mypdu,#agenda,#feedback,#logout,#pmi,#adminreport {
			  background-color: #EAF0F3;
				color: #061f2d;
				padding: 5% 35%;
				margin: 3% 0;
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
			  margin:3% 0;
			}
			
			tr:nth-of-type(odd) { 
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
		<h1>AGENDA <?php 
					$query=mysql_query('select img from image');
					$img_db=mysql_fetch_assoc($query);
					//echo $img_db['img']; 
					$imgname=$img_db['img'];
					
		            echo "<image src=\"image/$imgname\" width=\"130\" height=\"60\" style=\"float:right\"></h1>"; ?>
		</div>

		<div class="row">

			<div class="col-1 aside">
			
					<form action="feedback.php">
						<input type="submit" value="Feedback " id="feedback">
					</form>
				
					<form action="mypdu.php">
						<input type="submit" id="mypdu" value="CPE         ">
					</form>
					
					<form action="http://www.isaca.org" target="blank">
						<input type="submit" value="ISACA     " id="pmi">
					</form>
					
					<?php
						
						$name=$_SESSION['firstname'];
						$query_button=mysql_query("select firstname from reg_user where firstname='$name'");
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
						<input type="submit" value="Logout     " id="logout">
					</form>
			
			</div>


			<div class="col-2 aside" style="overflow-x:auto;">
				
				<?php
						require 'connect.php';
						$query=mysql_query("select * from eventtable");
						echo "<table>
										<tr>
											<th rowspan=2>
												EVENT
											</th>
											<th rowspan=2>
											SPEAKER
											</th>
											<th colspan=2>
												TIME
											</th>
										</tr>
										<tr>
											<th>from</th>
											<th>to</th>
										</tr>";
									
						while($query_res=mysql_fetch_assoc($query))
						{
							$event=$query_res['event'];
							$speaker=$query_res['speaker'];
							$starttime=$query_res['starttime'];
							$endtime=$query_res['endtime'];
							
							echo "<tr>
									<td>$event</td>
									<td>$speaker</td>
									<td>$starttime</td>
									<td>$endtime</td>	
								  </tr>";
						}
							echo "</table>";
							//echo $query_res['event'].$query_res['starttime']."-->".$query_res['endtime']."<br>";	
							
						
				    ?>
				
			</div>
			
		</div>
		
		<div class="row">
			<image src="image/nc.jpg" width="100%" height="45%">
		</div>
		
		<div class="footer">
		
			Powered by <a href="http://www.blueradianz.com" target="blank">RMASH technologies</a> © 2015-2016.
			
		</div>
		
		

	</body>
</html>

