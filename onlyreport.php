
<?php
	require 'connect.php';
	
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
				margin:1% 0;
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
			
			#mypdu,#addevent {
			  background-color: #EAF0F3;
				color: #3b5998;
				padding: 5% 35%;
				margin: 1% 0;
				border: none;
				border-radius: 2%;
				cursor: pointer;
				box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
			}
			#mypdu:hover,#addevent:hover {
			  background-color:#3b5998;
			  color:#EAF0F3
			}
			
			table { 
			  width: 100%; 
			  border-collapse: collapse; 
			}
			
			tr:nth-of-type(odd) { 
			  background: #eee; 
			}
			th { 
			  background: #3b5998; 
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
			
			
			x{
				color: red;
				margin:1% 0;
				text-align: center;
				font-size: 25px;
				padding: 15px;
			};
			
			
    	</style>
	</head>
	<body>
		
		
				
		<div class="row">
		
		<div class="col-2" ">	
				<?php
										
					
						
					$query=mysql_query("select firstname,mobile_number,timea,duration,totaltime,pdu,current_status from reg_user");
					$num=mysql_num_rows($query);
					
					if($num > 0){
						echo "<table><tr><th>Name</th><th>Mobile<br> Number</th><th>Current<br>Session(minutes)<br>Duration</th><th>Total Time(minutes)</th><th>PDU</th><th>Start<br> Time</th><th>End<br>Time</th></tr>";
						
						while($row=mysql_fetch_assoc($query)){
							$fn=$row['firstname'];
							$mobno=$row['mobile_number'];
							$time=$row['timea'];
							$duration=$row['duration'];
							$totaltime=$row['totaltime'];
							$pdu=$row['pdu'];
							$status=$row['current_status'];
							echo "<tr><td>$fn</td><td>$mobno</td><td>$duration</td><td>$totaltime</td><td>$pdu</td><td>$time</td><td>$status</td></tr>";
						}
						echo "</table>";
					}
				

				
				?>
		</div>	
		</div>
				
		<div class="footer">
			Powered by <a href="http://www.blueradianz.com" target="blank">RMASH technologies</a> © 2015-2016.
		</div>

	</body>
</html>

