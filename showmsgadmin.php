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
			
			#animation{
				width: 55px;
				height: 38px;
				color:#ffffff;
				border-radius:9px;
				font-size:14px;
				animation-name: new_message;
				animation-duration: 2s;
				animation-iteration-count: infinite;
			}
			
			@keyframes new_message {
				0%   {background-color: red;}
				100%  {background-color: #cc0000;}
				
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
		<h1>MESSAGE<?php 
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
					
					$q1=mysql_query("select status from messagestatus where macid='$macp'");
					$r1=mysql_fetch_assoc($q1);
					$status=$r1['status'];
					if($status=='unread')
					{
						
						$q2=mysql_query("select * from message where recipient='admin' order by id desc");
						
						//unread messages count in $r3.
						$q3=mysql_query("select unread_count from messagestatus where macid='$macp'");
						$r3=mysql_fetch_assoc($q3);
						$num_unread=$r3['unread_count'];
						while($num_unread!=0)
						{
							//echo $num_unread;
							$r2=mysql_fetch_assoc($q2);
							$id=$r2['id'];
							$message=$r2['message'];
							mysql_query("update message set status='unread' where id='$id'");
							//echo $r2['id']."-->".$r2['message']."<br>";
							$id--;
							$num_unread--;
							
						}
					}
					
					$count=$_SESSION['msgcount'];
					$rcount=$_SESSION['rcount'];
					$urcount=$_SESSION['urcount'];
					$flag=$_SESSION['flag'];
					
					mysql_query("update messagestatus set read_count='$count',unread_count=0 where macid='$macp'");
					
					$q=mysql_query("select * from message where recipient='admin' and status='unread' order by id desc");
					echo "<table>
							<tr>
								<th>Message</th>
								<th>Time</th>
								<th>Date</th>
							</tr>";		
					
					while($row=mysql_fetch_assoc($q))
					{
						$message=$row['message'];
						$time=$row['time'];
						$date=$row['date'];
						echo "<tr>
								<td>$message <span id=\"animation\">NEW</span></td>
								<td>$time</td>
								<td>$date</td>
							  </tr>";
					}
					
					$q=mysql_query("select * from message where recipient='admin' and status='read' order by id desc");
					
					while($row=mysql_fetch_assoc($q))
					{
						$message=$row['message'];
						$time=$row['time'];
						$date=$row['date'];
						echo "<tr>
								<td>$message</td>
								<td>$time</td>
								<td>$date</td>
							  </tr>";
					}
					echo "</table>";
					
					mysql_query("update message set status='read' where recipient='admin'");
					mysql_query("update messagestatus set status='read' where macid='$macp'");
				?>
				
			</div>
			
		</div>
		
		<div class="footer">
		
			Powered by <a href="http://www.blueradianz.com" target="blank">RMASH technologies</a> © 2015-2016.
			
		</div>
		

	</body>
</html>

