<?php
						if(isset($_POST['export_excel']))
						{	
							header("Content-Type:application/vnd.ms-excel");
							header("Content-Disposition:attachment;filename=report.xls");
						}
?>
<?php
	require 'connect.php';
	session_start();
	$mobilenumber=$_SESSION['mobilenumber'];
	$name=$_SESSION['firstname'];
	
	
	
	if(isset($_FILES['file']['name']))
		{
			$name = $_FILES['file']['name'];
			$tmp_name  = $_FILES['file']['tmp_name'];
			
			move_uploaded_file($tmp_name, "image/".$name);
			mysql_query("update image set img='$name'");
			
		}
		
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
				padding: 15px;
				
				text-align: center;
				font-size: 14px;
				box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
			}
			.footer {
				background-image:url('image/grey.jpg');
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
			
			#mypdu,#addevent,#survey_setting,#export_excel,#sendmessage {
			  background-color: #EAF0F3;
				color: #061f2d;
				padding: 5% 35%;
				margin: 1% 0;
				border: none;
				border-radius: 2%;
				cursor: pointer;
				box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
			}
			#mypdu:hover,#addevent:hover,#survey_setting:hover,#export_excel:hover,#sendmessage:hover {
			  background-color:#061f2d;
			  color:#EAF0F3;
			}
			
			table { 
			  width: 100%; 
			  border-collapse: collapse; 
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
		
		<div class="header">
			<h1>ADMIN <?php 
			$query=mysql_query('select img from image');
			$img_db=mysql_fetch_assoc($query);
			$imgname=$img_db['img'];
			echo "<image src=\"image/$imgname\" width=\"150\" height=\"60\" style=\"float:right\"></h1>"; ?>
		</div>
				
		<div class="row">
			<div class="col-1">
				<form action="mypdu.php">
					<input type="submit" id="mypdu" value="<<Back          ">
				</form>
				
				<form action="updateagenda.php">
					<input type="submit" id="addevent" value="Add Events    ">
				</form>

				<form action="message.php">
					<input type="submit" id="sendmessage" value="Send Message">
				</form>	
				
				<form action="surveysetting.php">
					<input type="submit" id="survey_setting" value="Survey Setting">
				</form>
				
				<form action="adminreport.php" method="POST">
					<input type="submit" value="Export to Excel" name="export_excel" id="export_excel">
				</form>
				
				<form action="adminreport.php" method="post" enctype="multipart/form-data">
				   <input type="file" name="file">
				   <input type="submit" value="upload">
				</form>

			</div>
			<div class="col-2" style="overflow-x:auto;">	
					<?php
						$quer=mysql_query("select * from user_info where usertype='admin'");
						if(mysql_num_rows($quer)>0){
							
						$query=mysql_query("select * from user_info");
						$num=mysql_num_rows($query);
						
						if($num > 0){
							echo "<table><tr><th>Name</th><th>Mobile<br>Number</th><th>Mac<br> ID</th></tr>";
							
							while($row=mysql_fetch_assoc($query)){
								$fn=$row['firstname'];
								$macid=$row['mac'];
								$mobno=$row['mobile_number'];
								echo "<tr><td>$fn</td><td>$mobno</td><td>$macid</td></tr>";
							}
							echo "</table>";
						}
					}
					
					else{
						echo "<x>You are not admin.</x>";
					}	
						
						
					?>
			</div>	
		</div>
				
		<div class="footer">
			Powered by <a href="http://www.blueradianz.com" target="blank">RMASH technologies</a> © 2015-2016.
		</div>

	</body>
</html>

