
<html>
	<head>
		<style>
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
		</style>
	</head>
	<body>
		<?php
			require 'connect.php';
			$query=mysql_query("select * from eventtable");
			echo "<table>
							<tr>
								<th rowspan=2>
									EVENT
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
				$starttime=$query_res['starttime'];
				$endtime=$query_res['endtime'];
				echo "<tr>
						<td>$event</td>
						<td>$starttime</td>
						<td>$endtime</td>	
					  </tr>";
			}
				echo "</table>";
				//echo $query_res['event'].$query_res['starttime']."-->".$query_res['endtime']."<br>";	
				
			
		?>
	</body>
</html>
