<?php
	require 'connect.php';
	session_start();
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

			#notification_count
			{
			padding: 0px 3px 3px 7px;
			background: #cc0000;
			color: #ffffff;
			font-weight: bold;
			margin-left: 80%;
			border-radius:9px;
			-moz-border-radius: 9px;
			-webkit-border-radius: 9px;
			position: absolute;
			margin-top: 5px;
			font-size: 10px;
			}		
						
			#notification,#mypdu,#agenda,#feedback,#logout,#pmi,#adminreport{
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
			
			.footer a{
				color:#ffffff;
				
			}
			
			
		</style>
	</head>
	<body>

		<div class="header">
		<h1>AGENDA <?php 
					$query=mysql_query('select img from image');
					$img_db=mysql_fetch_assoc($query);
					$imgname=$img_db['img'];
					
		            echo "<image src=\"image/$imgname\" width=\"130\" height=\"60\" style=\"float:right\"></h1>"; ?>
		</div>
		
		<div class="row">

			<div class="col-1 aside">
			
					<form action="agenda.php">
						<input type="submit" value="<<Back   " id="feedback">
					</form>
			</div>


			<div class="col-2 aside" style="overflow-x:auto;">
				
				<?php
					$ip=$_SERVER['REMOTE_ADDR'];
					$mac = shell_exec('arp -a '.escapeshellarg(trim($ip)));
					$find="Physical";
					$pos=strpos($mac,$find);
					$macp=substr($mac,($pos+42),26);
					
					
					$count=$_SESSION['msgcount'];
					$rcount=$_SESSION['rcount'];
					$urcount=$_SESSION['urcount'];
					$flag=$_SESSION['flag'];
					
					mysql_query("update messagestatus set read_count='$count',unread_count=0 where macid='$macp'");
					
					$q=mysql_query("select * from message order by id desc");
					echo "<table>
							<tr>
								<th>Message</th>
								<th>Time</th>
							</tr>";		
					
					while($row=mysql_fetch_assoc($q))
					{
						$message=$row['message'];
						$time=$row['time'];
						echo "<tr>
								<td>$message</td>
								<td>$time</td>
							  </tr>";
					}
					echo "</table>";
				?>
				
			</div>
			
		</div>
		
		<div class="footer">
		
			Powered by <a href="http://www.blueradianz.com" target="blank">RMASH technologies</a> © 2015-2016.
			
		</div>
		
		

	</body>
</html>

