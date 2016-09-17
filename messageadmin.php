<?php
	require 'connect.php';
	date_default_timezone_set('Asia/Calcutta');
	$time=date('h:i:s A');
	$date=date('d-m-y l');
	//echo $date;
	if(isset($_POST['message'])&&!empty($_POST['message']))
	{
		$msg=mysql_real_escape_string($_POST['message']);
		
		mysql_query("insert into message values('','$msg','$time','$date','admin','unread')");
		//mysql_query("update messagestatus set flag='false'");
		mysql_query("update messagestatus inner join user_info on messagestatus.macid=user_info.mac set messagestatus.status='unread',messagestatus.flag='false' where user_info.usertype='admin'");	
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

			#send{
				background-color: #061f2d;
				color: #EAF0F3;
				padding: 3% 25%;
				margin: 2% 0;
				border: none;
				border-radius: 2%;
				cursor: pointer;
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
		<h1>MESSAGE<?php 
					$query=mysql_query('select img from image');
					$img_db=mysql_fetch_assoc($query);
					//echo $img_db['img']; 
					$imgname=$img_db['img'];
					
		            echo "<image src=\"image/$imgname\" width=\"120\" height=\"60\" style=\"float:right\"></h1>"; ?>
		</div>

		<div class="row">

			<div class="col-1">
			
				<form action="agenda.php">
				  <input type="submit" id="back" value="<<Back  ">
			    </form>
			
			</div>


			<div class="col-2 aside">
			
			<form action="messageadmin.php" method="post">
				<textarea id="message" name="message" rows="8" cols="25"></textarea><br>
				<input type="submit" id="send" value="send">
			</form>
			
			</div>
			
		</div>

		<div class="footer">
		
			Powered by <a href="http://www.blueradianz.com" target="blank">RMASH technologies</a> © 2015-2016.
			
		</div>
		
		

	</body>
</html>

