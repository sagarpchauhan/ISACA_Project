<?php
	require 'connect.php';
	session_start();
	$macp=$_SESSION['mac'];
	$fn=$_SESSION['firstname'];
	$mobno=$_SESSION['mobilenumber'];
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
		<script src="script.js" type="text/javascript"></script>
		<script src="script1.js" type="text/javascript"></script>
		<script type="text/javascript" charset="utf-8">
 
			function addmsg(type, msg){
			 
			$('#notification_count').html(msg);
			 
			}
			
			function print2( msg1){
	 
			$('#pdu').html(msg1);
			 
			}
			
			function print( msg1){
	 
			$('#duration').html(msg1);
			 
			}
			
			function print1(msg1){
			$('#totaltime').html(msg1);	
			}	
						
		</script>
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
			
			#notification_count
			{
			padding: 0px 5px 5px 12px;
			background: #cc0000;
			color: #ffffff;
			font-weight: bold;
			font-size:12px;
			margin-left: 85px;
			border-radius:9px;
			-moz-border-radius: 9px;
			-webkit-border-radius: 9px;
			position:relative;
			left:-10%;
			}

			#notification{
						  background-color: #ffffff;
							color: #061f2d;
							padding: -1% 1%;
							border: none;
							border-radius: 2%;
							cursor: pointer;
							box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
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
	
			#messageadmin{
			  background-color: #EAF0F3;
				color: #061f2d;
				padding: 5% 28%;
				margin: 3% 0;
				border: none;
				border-radius: 2%;
				cursor: pointer;
				box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
			}
		
			#messageadmin:hover,#mypdu:hover,#agenda:hover,#feedback:hover,#logout,#pmi:hover,#adminreport:hover {
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
		
	<?php
				$query_user=mysql_query("select usertype from user_info where firstname='$fn' and mobile_number='$mobno'");
				$row_user=mysql_fetch_assoc($query_user);
				$user=$row_user['usertype'];
				if($user=='admin')
				{
					echo "<div class=\"row\">
					<div class=\"col-1 aside\">
						<form action=\"showmsgadmin.php\">
							<span id=\"notification_count\"></span><br>
							<input type=\"image\" id=\"notification\" src=\"bell.png\" alt=\"Submit\" width=\"50\" height=\"50\">
						</form>
					</div>	
					</div>";
				}
				else{
					echo "<div class=\"row\">
					<div class=\"col-1 aside\">
						<form action=\"showmsg.php\">
							<span id=\"notification_count\"></span><br>
							<input type=\"image\" id=\"notification\" src=\"bell.png\" alt=\"Submit\" width=\"50\" height=\"50\">
						</form>
					</div>	
					</div>";
					
				}
			

		?>

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
				
				if($user=='admin')
				{
					echo "<form action='adminreport.php'><input type='submit' value='Admin     ' id='adminreport'></form>";
				}
				
				else
				{
					echo "<form action='messageadmin.php'><input type='submit' value='Message Admin' id='messageadmin'></form>";
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
							<td><?php echo $fn;?></td>
							<td id="duration"></td>
							<td id="totaltime"></td>
							<td id="pdu"></td>
						</tr>
					</table>		
					
						
			</div>
			
		</div>

		<div class="footer">
		
			Powered by <a href="http://www.blueradianz.com" target="blank">RMASH technologies</a> © 2015-2016.
			
		</div>
		
		

	</body>
</html>

