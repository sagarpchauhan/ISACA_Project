<?php
	require'connect.php';
	if(isset($_POST['event']) && isset($_POST['starttime']) && isset($_POST['endtime']))
	{
		//$track=$_POST['track'];
		$event=$_POST['event'];
		$starttime=$_POST['starttime'];
		$endtime=$_POST['endtime'];
		$speaker="";
		if(!empty($_POST['speaker']))
		{
			$speaker=$_POST['speaker'];
		}
		if(!empty($event)&&!empty($starttime)&&!empty($endtime))
		{
			$query=mysql_query("insert into eventtable values ('$event','$speaker','$starttime','$endtime')");
			header("Location:adminreport.php");
		}
		
		
	}
	/*$query=mysql_query("select event from eventtable where starttime='10:15'");
	$qres=mysql_fetch_assoc($query);
	echo $qres['event'];*/
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
			
			input[id=event],[id=speaker],[id=starttime],[id=endtime],select{
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
		<h1>SESSION<?php 
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
				
				 <form action="updateagenda.php" method="POST">
					<label for="event"><x>Session </x></label>
					<input type="text" id="event" name="event">
					<label for="speaker"><x>Speaker</x></label>
					<input type="text" id="speaker" name="speaker">
					<label for="starttime"><x>Starttime</x></label>
					<input type="text" id="starttime" name="starttime">
					<label for="endtime"><x>Endtime</x></label>
					<input type="text" id="endtime" name="endtime">
					<input type="submit" value="UPDATE" id="update">
				</form>		
					
						
			</div>
			
		</div>

		<div class="footer">
		
			Powered by <a href="http://www.blueradianz.com" target="blank">RMASH technologies</a> © 2015-2016.
			
		</div>
		
		

	</body>
</html>

