<?php
require 'connect.php';
session_start();
$time=time();
$mobilenumber=$_SESSION['mobilenumber'];
$name=$_SESSION['firstname'];
$starttime=$_SESSION['starttime'];

//echo "Welcome $name<br/>";
//echo $starttime;

$duration=floor(($time-$starttime)/60);
mysql_query("update reg_user set duration='$duration' where mobile_number=$mobilenumber");
$qrun=mysql_query("select totaltime from reg_user where mobile_number='$mobilenumber'");
$qrow=mysql_fetch_assoc($qrun);
$prevtime=$qrow['totaltime'];
//echo "previous time was $prevtime";
$updatetime=$duration+$prevtime;

$num=$updatetime;

/*$query2=mysql_query("select pdu from reg_user where mobile_number='$mobilenumber'");
$qres2=mysql_fetch_assoc($query2);
$pdu=$qres2['pdu']*/;
$quo=floor($num/15);
$rem=$quo%2;

if($rem!=0)
		{
			$ntimes=($quo/2)+0.5;
			$pdu=$ntimes*0.5;
			//echo "pdu:$pdu";	
		}
else{
	$pdu=($quo/2)*0.5;
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


			<div class="col-2" style="overflow-x:auto;">
				
				 	<table style="width:650">
						<tr>
							<th>Name</th>
							<th>CURRENT<br>SESSION<br>Duration</th>
							<th>Total<br>Time</th>
							<th>CPE</th>
						</tr>
						<tr>
							<td><?php echo $name;?></td>
							<td><?php echo "$duration min";?></td>
							<td><?php echo "$updatetime min";?></td>
							<td><?php echo "$pdu";?></td>
						</tr>
					</table>		
					
						
			</div>
			
		</div>

		<div class="footer">
		
			Powered by <a href="http://www.blueradianz.com" target="blank">RMASH technologies</a> © 2015-2016.
			
		</div>
		
		

	</body>
</html>

