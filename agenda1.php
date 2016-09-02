
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
			
			
			.footer {
				background-image:url('image/blue.jpg');
				color: #ffffff;
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

			#signin,#signup{
				background-color: #3b5998;
				color: #EAF0F3;
				padding: 3% 25%;
				margin: 2% 0;
				border: none;
				border-radius: 2%;
				cursor: pointer;
			}			
			
			    input[value]{
				color:#A9A9A9;
			}
			
						
			input[id=firstname],[id=mobno],[id=email],[id=memid], select {
				width: 95%;
				padding: 12px 20px;
				margin: 8px 0;
				display: inline-block;
				border: 1px solid #ccc;
				border-radius: 4px;
				
            }
			
			#mypdu,#feedback,#agenda,#pmi,#logout,#adminreport {
			  background-color: #EAF0F3;
				color: #3b5998;
				padding: 5% 35%;
				margin: 1% 0;
				border: none;
				border-radius: 2%;
				cursor: pointer;
				box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
			}
			#mypdu:hover,#agenda:hover,#feedback:hover,#pmi:hover,#logout:hover,#adminreport:hover {
			  background-color:#3b5998;
			  color:#EAF0F3
			}
			
			a{
				color:#ffffff;
			}
						
			X{
				color:#3b5998;
			};
			
		</style>
	</head>
	<body>

		<div class="header">
		<h1>AGENDA<image src="image/PMI.jpg" width="150" height="60" style="float:right"></h1>
		</div>
		
		<div class="row">

			<div class="col-1">
			
				<form action="agenda.php">	
					<input type="submit" value="Agenda   " id="agenda">
				</form>

				<form action="feedback.php">	
					<input type="submit" value="Feedback" id="feedback">
				</form>
				
				<form action="mypdu.php">
					<input type="submit" value="Mypdu    " id="mypdu">
				</form>
				
				<form action="http://www.pmipunechapter.org" target="blank">
					<input type="submit" value="PMI Pune" id="pmi">
				</form>
			
				<?php
				    require 'connect.php';
					session_start();
					$name=$_SESSION['firstname'];
					$query_button=mysql_query("select firstname from reg_user where firstname='$name'");
					$row=mysql_fetch_assoc($query_button);
					$res=$row['firstname'];
					//echo $res;
					if($res=='sagar')
					{
						//echo "this is not sagar";
						echo "<form action='adminreport.php'><input type='submit' value='Report     ' id='adminreport'></form>";
					}
				?>
			
				<form action="logout.php">
					<input type="submit" value="Logout     " id="logout">
				</form>
									
			</div>		
		
			<div class="col-2">
				<table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0 width=645
				 style='width:483.75pt;border-collapse:collapse;mso-yfti-tbllook:1184;
				 mso-padding-alt:0in 0in 0in 0in'>
				 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes;height:11.25pt'>
				  <td width=264 rowspan=2 valign=top style='width:197.8pt;border:solid windowtext 1.0pt;
				  mso-border-alt:solid windowtext .5pt;background:#ACB9CA;mso-background-themecolor:
				  text2;mso-background-themetint:102;padding:0in 5.4pt 0in 5.4pt;height:11.25pt'>
				  <p class=MsoNormal style='mso-margin-top-alt:auto'><b><span style='font-size:
				  8.0pt;mso-fareast-font-family:"Times New Roman"'>Activity</span></b><span
				  style='mso-fareast-font-family:"Times New Roman"'><o:p></o:p></span></p>
				  </td>
				  <td width=239 rowspan=2 valign=top style='width:179.0pt;border:solid windowtext 1.0pt;
				  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
				  solid windowtext .5pt;background:#ACB9CA;mso-background-themecolor:text2;
				  mso-background-themetint:102;padding:0in 5.4pt 0in 5.4pt;height:11.25pt'>
				  <p class=MsoNormal style='mso-margin-top-alt:auto'><b><span style='font-size:
				  8.0pt;mso-fareast-font-family:"Times New Roman"'>Who</span></b><span
				  style='mso-fareast-font-family:"Times New Roman"'><o:p></o:p></span></p>
				  </td>
				  <td width=143 colspan=2 valign=top style='width:107.1pt;border:solid windowtext 1.0pt;
				  border-left:none;mso-border-left-alt:solid windowtext .5pt;mso-border-alt:
				  solid windowtext .5pt;background:#ACB9CA;mso-background-themecolor:text2;
				  mso-background-themetint:102;padding:0in 5.4pt 0in 5.4pt;height:11.25pt'>
				  <p class=MsoNormal style='mso-margin-top-alt:auto'><b><span style='font-size:
				  8.0pt;mso-fareast-font-family:"Times New Roman"'>Time line</span></b><span
				  style='mso-fareast-font-family:"Times New Roman"'><o:p></o:p></span></p>
				  </td>
				 </tr>
				 <tr style='mso-yfti-irow:1;height:11.25pt'>
				  <td width=71 valign=top style='width:53.55pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;background:#ACB9CA;mso-background-themecolor:
				  text2;mso-background-themetint:102;padding:0in 5.4pt 0in 5.4pt;height:11.25pt'>
				  <p class=MsoNormal style='mso-margin-top-alt:auto'><b><span style='font-size:
				  8.0pt;mso-fareast-font-family:"Times New Roman"'>From</span></b><span
				  style='mso-fareast-font-family:"Times New Roman"'><o:p></o:p></span></p>
				  </td>
				  <td width=71 valign=top style='width:53.55pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;background:#ACB9CA;mso-background-themecolor:
				  text2;mso-background-themetint:102;padding:0in 5.4pt 0in 5.4pt;height:11.25pt'>
				  <p class=MsoNormal style='mso-margin-top-alt:auto'><b><span style='font-size:
				  8.0pt;mso-fareast-font-family:"Times New Roman"'>To</span></b><span
				  style='mso-fareast-font-family:"Times New Roman"'><o:p></o:p></span></p>
				  </td>
				 </tr>
				 <tr style='mso-yfti-irow:2;height:45.0pt'>
				  <td width=264 valign=top style='width:197.8pt;border:solid windowtext 1.0pt;
				  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
				  padding:0in 5.4pt 0in 5.4pt;height:45.0pt'>
				  <p class=MsoNormal style='mso-margin-top-alt:auto'><span style='font-size:
				  8.0pt;mso-fareast-font-family:"Times New Roman"'>Registration and networking</span><span
				  style='mso-fareast-font-family:"Times New Roman"'><o:p></o:p></span></p>
				  </td>
				  <td width=239 valign=top style='width:179.0pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:45.0pt'>
				  <p class=MsoNormal style='mso-margin-top-alt:auto'><span style='font-size:
				  8.0pt;mso-fareast-font-family:"Times New Roman"'>All</span><span
				  style='mso-fareast-font-family:"Times New Roman"'><o:p></o:p></span></p>
				  </td>
				  <td width=71 valign=top style='width:53.55pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:45.0pt'>
				  <p class=MsoNormal style='mso-margin-top-alt:auto'><span style='font-size:
				  8.0pt;mso-fareast-font-family:"Times New Roman"'>2:00 PM</span><span
				  style='mso-fareast-font-family:"Times New Roman"'><o:p></o:p></span></p>
				  </td>
				  <td width=71 valign=top style='width:53.55pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:45.0pt'>
				  <p class=MsoNormal style='mso-margin-top-alt:auto'><span style='font-size:
				  8.0pt;mso-fareast-font-family:"Times New Roman"'>2:10 PM</span><span
				  style='mso-fareast-font-family:"Times New Roman"'><o:p></o:p></span></p>
				  </td>
				 </tr>
				 <tr style='mso-yfti-irow:3;height:56.25pt'>
				  <td width=264 valign=top style='width:197.8pt;border:solid windowtext 1.0pt;
				  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
				  padding:0in 5.4pt 0in 5.4pt;height:56.25pt'>
				  <p class=MsoNormal style='mso-margin-top-alt:auto'><span style='font-size:
				  8.0pt;mso-fareast-font-family:"Times New Roman"'>Assemble</span><span
				  style='mso-fareast-font-family:"Times New Roman"'><o:p></o:p></span></p>
				  </td>
				  <td width=239 valign=top style='width:179.0pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:56.25pt'>
				  <p class=MsoNormal style='mso-margin-top-alt:auto'><span style='font-size:
				  8.0pt;mso-fareast-font-family:"Times New Roman"'>All</span><span
				  style='mso-fareast-font-family:"Times New Roman"'><o:p></o:p></span></p>
				  </td>
				  <td width=71 valign=top style='width:53.55pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:56.25pt'>
				  <p class=MsoNormal style='mso-margin-top-alt:auto'><span style='font-size:
				  8.0pt;mso-fareast-font-family:"Times New Roman"'>2:10 PM</span><span
				  style='mso-fareast-font-family:"Times New Roman"'><o:p></o:p></span></p>
				  </td>
				  <td width=71 valign=top style='width:53.55pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:56.25pt'>
				  <p class=MsoNormal style='mso-margin-top-alt:auto'><span style='font-size:
				  8.0pt;mso-fareast-font-family:"Times New Roman"'>2:15 PM</span><span
				  style='mso-fareast-font-family:"Times New Roman"'><o:p></o:p></span></p>
				  </td>
				 </tr>
				 <tr style='mso-yfti-irow:4;height:11.25pt'>
				  <td width=264 valign=top style='width:197.8pt;border:solid windowtext 1.0pt;
				  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
				  padding:0in 5.4pt 0in 5.4pt;height:11.25pt'>
				  <p class=MsoNormal style='mso-margin-top-alt:auto'><span style='font-size:
				  8.0pt;mso-fareast-font-family:"Times New Roman"'>Introduction and Welcome
				  address</span><span style='mso-fareast-font-family:"Times New Roman"'><o:p></o:p></span></p>
				  </td>
				  <td width=239 valign=top style='width:179.0pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:11.25pt'>
				  <p class=MsoNormal style='mso-margin-top-alt:auto'><span style='font-size:
				  8.0pt;mso-fareast-font-family:"Times New Roman"'>Girish Kadam, President -
				  PMI Pune Chapter</span><span style='mso-fareast-font-family:"Times New Roman"'><o:p></o:p></span></p>
				  </td>
				  <td width=71 valign=top style='width:53.55pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:11.25pt'>
				  <p class=MsoNormal style='mso-margin-top-alt:auto'><span style='font-size:
				  8.0pt;mso-fareast-font-family:"Times New Roman"'>2:15 PM</span><span
				  style='mso-fareast-font-family:"Times New Roman"'><o:p></o:p></span></p>
				  </td>
				  <td width=71 valign=top style='width:53.55pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:11.25pt'>
				  <p class=MsoNormal style='mso-margin-top-alt:auto'><span style='font-size:
				  8.0pt;mso-fareast-font-family:"Times New Roman"'>2:25 PM</span><span
				  style='mso-fareast-font-family:"Times New Roman"'><o:p></o:p></span></p>
				  </td>
				 </tr>
				 <tr style='mso-yfti-irow:5;height:45.0pt'>
				  <td width=264 valign=top style='width:197.8pt;border:solid windowtext 1.0pt;
				  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
				  padding:0in 5.4pt 0in 5.4pt;height:45.0pt'>
				  <p class=MsoNormal style='mso-margin-top-alt:auto'><span style='font-size:
				  8.0pt;mso-fareast-font-family:"Times New Roman"'>Key Note Speech - Using
				  Project<br>
				  Management Skills to Improve<br>
				  Efficiency in Manufacturing sector</span><span style='mso-fareast-font-family:
				  "Times New Roman"'><o:p></o:p></span></p>
				  </td>
				  <td width=239 valign=top style='width:179.0pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:45.0pt'>
				  <p class=MsoNormal style='mso-margin-top-alt:auto'><span style='font-size:
				  8.0pt;mso-fareast-font-family:"Times New Roman"'>Mr. Partha S. Ghose -<br>
				  President &amp; Chief of<br>
				  Projects, KALYANI STEELS<br>
				  LIMITED.</span><span style='mso-fareast-font-family:"Times New Roman"'><o:p></o:p></span></p>
				  </td>
				  <td width=71 valign=top style='width:53.55pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:45.0pt'>
				  <p class=MsoNormal style='mso-margin-top-alt:auto'><span style='font-size:
				  8.0pt;mso-fareast-font-family:"Times New Roman"'>2:25 PM</span><span
				  style='mso-fareast-font-family:"Times New Roman"'><o:p></o:p></span></p>
				  </td>
				  <td width=71 valign=top style='width:53.55pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:45.0pt'>
				  <p class=MsoNormal style='mso-margin-top-alt:auto'><span style='font-size:
				  8.0pt;mso-fareast-font-family:"Times New Roman"'>3:10 PM</span><span
				  style='mso-fareast-font-family:"Times New Roman"'><o:p></o:p></span></p>
				  </td>
				 </tr>
				 <tr style='mso-yfti-irow:6;height:56.25pt'>
				  <td width=264 valign=top style='width:197.8pt;border:solid windowtext 1.0pt;
				  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
				  padding:0in 5.4pt 0in 5.4pt;height:56.25pt'>
				  <p class=MsoNormal style='mso-margin-top-alt:auto'><span style='font-size:
				  8.0pt;mso-fareast-font-family:"Times New Roman"'>Elevator pitch talk on the
				  theme by<br>
				  invited guests</span><span style='mso-fareast-font-family:"Times New Roman"'><o:p></o:p></span></p>
				  </td>
				  <td width=239 valign=top style='width:179.0pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:56.25pt'>
				  <p class=MsoNormal style='mso-margin-top-alt:auto'><span style='font-size:
				  8.0pt;mso-fareast-font-family:"Times New Roman"'>Mr. Girish Kelkar Founder<br>
				  Director at V3C3E3<br>
				  Consultants Pvt. Limited</span><span style='mso-fareast-font-family:"Times New Roman"'><o:p></o:p></span></p>
				  </td>
				  <td width=71 valign=top style='width:53.55pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:56.25pt'>
				  <p class=MsoNormal style='mso-margin-top-alt:auto'><span style='font-size:
				  8.0pt;mso-fareast-font-family:"Times New Roman"'>3:10 PM</span><span
				  style='mso-fareast-font-family:"Times New Roman"'><o:p></o:p></span></p>
				  </td>
				  <td width=71 valign=top style='width:53.55pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:56.25pt'>
				  <p class=MsoNormal style='mso-margin-top-alt:auto'><span style='font-size:
				  8.0pt;mso-fareast-font-family:"Times New Roman"'>3:30 PM</span><span
				  style='mso-fareast-font-family:"Times New Roman"'><o:p></o:p></span></p>
				  </td>
				 </tr>
				 <tr style='mso-yfti-irow:7;height:22.5pt'>
				  <td width=264 valign=top style='width:197.8pt;border:solid windowtext 1.0pt;
				  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
				  padding:0in 5.4pt 0in 5.4pt;height:22.5pt'>
				  <p class=MsoNormal style='mso-margin-top-alt:auto'><span style='font-size:
				  8.0pt;mso-fareast-font-family:"Times New Roman"'>Elevator pitch talk on the
				  theme by<br>
				  invited guest</span><span style='mso-fareast-font-family:"Times New Roman"'><o:p></o:p></span></p>
				  </td>
				  <td width=239 valign=top style='width:179.0pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:22.5pt'>
				  <p class=MsoNormal style='mso-margin-top-alt:auto'><span style='font-size:
				  8.0pt;mso-fareast-font-family:"Times New Roman"'>Prakash Avchat, Ex General<br>
				  Manager, Tata Motors</span><span style='mso-fareast-font-family:"Times New Roman"'><o:p></o:p></span></p>
				  </td>
				  <td width=71 valign=top style='width:53.55pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:22.5pt'>
				  <p class=MsoNormal style='mso-margin-top-alt:auto'><span style='font-size:
				  8.0pt;mso-fareast-font-family:"Times New Roman"'>3:30 PM</span><span
				  style='mso-fareast-font-family:"Times New Roman"'><o:p></o:p></span></p>
				  </td>
				  <td width=71 valign=top style='width:53.55pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:22.5pt'>
				  <p class=MsoNormal style='mso-margin-top-alt:auto'><span style='font-size:
				  8.0pt;mso-fareast-font-family:"Times New Roman"'>3:50 PM</span><span
				  style='mso-fareast-font-family:"Times New Roman"'><o:p></o:p></span></p>
				  </td>
				 </tr>
				 <tr style='mso-yfti-irow:8;height:33.75pt'>
				  <td width=264 valign=top style='width:197.8pt;border:solid windowtext 1.0pt;
				  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
				  padding:0in 5.4pt 0in 5.4pt;height:33.75pt'>
				  <p class=MsoNormal style='mso-margin-top-alt:auto'><span style='font-size:
				  8.0pt;mso-fareast-font-family:"Times New Roman"'>Connect the Dots (Part1) -<br>
				  Innovative Session (Tea/Coffee will<br>
				  be served)</span><span style='mso-fareast-font-family:"Times New Roman"'><o:p></o:p></span></p>
				  </td>
				  <td width=239 valign=top style='width:179.0pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:33.75pt'>
				  <p class=MsoNormal style='mso-margin-top-alt:auto'><span style='font-size:
				  8.0pt;mso-fareast-font-family:"Times New Roman"'>All</span><span
				  style='mso-fareast-font-family:"Times New Roman"'><o:p></o:p></span></p>
				  </td>
				  <td width=71 valign=top style='width:53.55pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:33.75pt'>
				  <p class=MsoNormal style='mso-margin-top-alt:auto'><span style='font-size:
				  8.0pt;mso-fareast-font-family:"Times New Roman"'>3:50 PM</span><span
				  style='mso-fareast-font-family:"Times New Roman"'><o:p></o:p></span></p>
				  </td>
				  <td width=71 valign=top style='width:53.55pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:33.75pt'>
				  <p class=MsoNormal style='mso-margin-top-alt:auto'><span style='font-size:
				  8.0pt;mso-fareast-font-family:"Times New Roman"'>4:20 PM</span><span
				  style='mso-fareast-font-family:"Times New Roman"'><o:p></o:p></span></p>
				  </td>
				 </tr>
				 <tr style='mso-yfti-irow:9;height:22.5pt'>
				  <td width=264 valign=top style='width:197.8pt;border:solid windowtext 1.0pt;
				  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
				  padding:0in 5.4pt 0in 5.4pt;height:22.5pt'>
				  <p class=MsoNormal style='mso-margin-top-alt:auto'><span style='font-size:
				  8.0pt;mso-fareast-font-family:"Times New Roman"'>Introduction to the upcoming<br>
				  National Conference</span><span style='mso-fareast-font-family:"Times New Roman"'><o:p></o:p></span></p>
				  </td>
				  <td width=239 valign=top style='width:179.0pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:22.5pt'>
				  <p class=MsoNormal style='mso-margin-top-alt:auto'><span style='font-size:
				  8.0pt;mso-fareast-font-family:"Times New Roman"'>Rajarama Rao B, VP-Programs
				  - PMI Pune Chapter</span><span style='mso-fareast-font-family:"Times New Roman"'><o:p></o:p></span></p>
				  </td>
				  <td width=71 valign=top style='width:53.55pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:22.5pt'>
				  <p class=MsoNormal style='mso-margin-top-alt:auto'><span style='font-size:
				  8.0pt;mso-fareast-font-family:"Times New Roman"'>4:20 PM</span><span
				  style='mso-fareast-font-family:"Times New Roman"'><o:p></o:p></span></p>
				  </td>
				  <td width=71 valign=top style='width:53.55pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:22.5pt'>
				  <p class=MsoNormal style='mso-margin-top-alt:auto'><span style='font-size:
				  8.0pt;mso-fareast-font-family:"Times New Roman"'>4:35 PM</span><span
				  style='mso-fareast-font-family:"Times New Roman"'><o:p></o:p></span></p>
				  </td>
				 </tr>
				 <tr style='mso-yfti-irow:10;height:56.25pt'>
				  <td width=264 valign=top style='width:197.8pt;border:solid windowtext 1.0pt;
				  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
				  padding:0in 5.4pt 0in 5.4pt;height:56.25pt'>
				  <p class=MsoNormal style='mso-margin-top-alt:auto'><span style='font-size:
				  8.0pt;mso-fareast-font-family:"Times New Roman"'>Panel Discussion &#8211;
				  Make in India,<br>
				  Smart Cities, Digital India -<br>
				  opportunities for Manufacturing</span><span style='mso-fareast-font-family:
				  "Times New Roman"'><o:p></o:p></span></p>
				  </td>
				  <td width=239 valign=top style='width:179.0pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:56.25pt'>
				  <p class=MsoNormal style='mso-margin-top-alt:auto'><span style='font-size:
				  8.0pt;mso-fareast-font-family:"Times New Roman"'>Panel<br>
				  Ms. <span class=SpellE>Sushma</span> <span class=SpellE>Bhayani</span><br>
				  Mr. <span class=SpellE>Mangesh</span> <span class=SpellE>Ashtekar</span><br>
				  Mr. Mohan Nair<br>
				  Ms. <span class=SpellE>Neelam</span> Pathak</span><span style='mso-fareast-font-family:
				  "Times New Roman"'><o:p></o:p></span></p>
				  </td>
				  <td width=71 valign=top style='width:53.55pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:56.25pt'>
				  <p class=MsoNormal style='mso-margin-top-alt:auto'><span style='font-size:
				  8.0pt;mso-fareast-font-family:"Times New Roman"'>4:35 PM</span><span
				  style='mso-fareast-font-family:"Times New Roman"'><o:p></o:p></span></p>
				  </td>
				  <td width=71 valign=top style='width:53.55pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:56.25pt'>
				  <p class=MsoNormal style='mso-margin-top-alt:auto'><span style='font-size:
				  8.0pt;mso-fareast-font-family:"Times New Roman"'>5:20 PM</span><span
				  style='mso-fareast-font-family:"Times New Roman"'><o:p></o:p></span></p>
				  </td>
				 </tr>
				 <tr style='mso-yfti-irow:11;height:33.75pt'>
				  <td width=264 valign=top style='width:197.8pt;border:solid windowtext 1.0pt;
				  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
				  padding:0in 5.4pt 0in 5.4pt;height:33.75pt'>
				  <p class=MsoNormal style='mso-margin-top-alt:auto'><span style='font-size:
				  8.0pt;mso-fareast-font-family:"Times New Roman"'>Key Note Speech &#8211;
				  Embracing new generation technologies for effective project management in
				  Manufacturing sector</span><span style='mso-fareast-font-family:"Times New Roman"'><o:p></o:p></span></p>
				  </td>
				  <td width=239 valign=top style='width:179.0pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:33.75pt'>
				  <p class=MsoNormal style='mso-margin-top-alt:auto'><span style='font-size:
				  8.0pt;mso-fareast-font-family:"Times New Roman"'>Mr. <span class=SpellE>Dipak</span>
				  <span class=SpellE>Wani</span> - MD, <span class=SpellE>Wani</span>
				  Technologies</span><span style='mso-fareast-font-family:"Times New Roman"'><o:p></o:p></span></p>
				  </td>
				  <td width=71 valign=top style='width:53.55pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:33.75pt'>
				  <p class=MsoNormal style='mso-margin-top-alt:auto'><span style='font-size:
				  8.0pt;mso-fareast-font-family:"Times New Roman"'>5:20 PM</span><span
				  style='mso-fareast-font-family:"Times New Roman"'><o:p></o:p></span></p>
				  </td>
				  <td width=71 valign=top style='width:53.55pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:33.75pt'>
				  <p class=MsoNormal style='mso-margin-top-alt:auto'><span style='font-size:
				  8.0pt;mso-fareast-font-family:"Times New Roman"'>6:05 PM</span><span
				  style='mso-fareast-font-family:"Times New Roman"'><o:p></o:p></span></p>
				  </td>
				 </tr>
				 <tr style='mso-yfti-irow:12;height:22.5pt'>
				  <td width=264 valign=top style='width:197.8pt;border:solid windowtext 1.0pt;
				  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
				  padding:0in 5.4pt 0in 5.4pt;height:22.5pt'>
				  <p class=MsoNormal style='mso-margin-top-alt:auto'><span style='font-size:
				  8.0pt;mso-fareast-font-family:"Times New Roman"'>Elevator pitch talk on the
				  theme by invited guests</span><span style='mso-fareast-font-family:"Times New Roman"'><o:p></o:p></span></p>
				  </td>
				  <td width=239 valign=top style='width:179.0pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:22.5pt'>
				  <p class=MsoNormal style='mso-margin-top-alt:auto'><span style='font-size:
				  8.0pt;mso-fareast-font-family:"Times New Roman"'>Dr. <span class=SpellE>Abhay</span>
				  Kulkarni, Director<br>
				  IICMR</span><span style='mso-fareast-font-family:"Times New Roman"'><o:p></o:p></span></p>
				  </td>
				  <td width=71 valign=top style='width:53.55pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:22.5pt'>
				  <p class=MsoNormal style='mso-margin-top-alt:auto'><span style='font-size:
				  8.0pt;mso-fareast-font-family:"Times New Roman"'>6:05 PM</span><span
				  style='mso-fareast-font-family:"Times New Roman"'><o:p></o:p></span></p>
				  </td>
				  <td width=71 valign=top style='width:53.55pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:22.5pt'>
				  <p class=MsoNormal style='mso-margin-top-alt:auto'><span style='font-size:
				  8.0pt;mso-fareast-font-family:"Times New Roman"'>6:20 PM</span><span
				  style='mso-fareast-font-family:"Times New Roman"'><o:p></o:p></span></p>
				  </td>
				 </tr>
				 <tr style='mso-yfti-irow:13;height:22.5pt'>
				  <td width=264 valign=top style='width:197.8pt;border:solid windowtext 1.0pt;
				  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
				  padding:0in 5.4pt 0in 5.4pt;height:22.5pt'>
				  <p class=MsoNormal style='mso-margin-top-alt:auto'><span style='font-size:
				  8.0pt;mso-fareast-font-family:"Times New Roman"'>Vote of Thanks</span><span
				  style='mso-fareast-font-family:"Times New Roman"'><o:p></o:p></span></p>
				  </td>
				  <td width=239 valign=top style='width:179.0pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:22.5pt'>
				  <p class=MsoNormal style='mso-margin-top-alt:auto'><span style='font-size:
				  8.0pt;mso-fareast-font-family:"Times New Roman"'>Rajarama Rao B, VP-Programs
				  - PMI Pune Chapter</span><span style='mso-fareast-font-family:"Times New Roman"'><o:p></o:p></span></p>
				  </td>
				  <td width=71 valign=top style='width:53.55pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:22.5pt'>
				  <p class=MsoNormal style='mso-margin-top-alt:auto'><span style='font-size:
				  8.0pt;mso-fareast-font-family:"Times New Roman"'>6:20 PM</span><span
				  style='mso-fareast-font-family:"Times New Roman"'><o:p></o:p></span></p>
				  </td>
				  <td width=71 valign=top style='width:53.55pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:22.5pt'>
				  <p class=MsoNormal style='mso-margin-top-alt:auto'><span style='font-size:
				  8.0pt;mso-fareast-font-family:"Times New Roman"'>6:30 PM</span><span
				  style='mso-fareast-font-family:"Times New Roman"'><o:p></o:p></span></p>
				  </td>
				 </tr>
				 <tr style='mso-yfti-irow:14;mso-yfti-lastrow:yes;height:33.75pt'>
				  <td width=264 valign=top style='width:197.8pt;border:solid windowtext 1.0pt;
				  border-top:none;mso-border-top-alt:solid windowtext .5pt;mso-border-alt:solid windowtext .5pt;
				  padding:0in 5.4pt 0in 5.4pt;height:33.75pt'>
				  <p class=MsoNormal style='mso-margin-top-alt:auto'><span style='font-size:
				  8.0pt;mso-fareast-font-family:"Times New Roman"'>Connect the Dots (Part-2) -<br>
				  Innovative Session (High Tea will be served)</span><span style='mso-fareast-font-family:
				  "Times New Roman"'><o:p></o:p></span></p>
				  </td>
				  <td width=239 valign=top style='width:179.0pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:33.75pt'>
				  <p class=MsoNormal style='mso-margin-top-alt:auto'><span style='font-size:
				  8.0pt;mso-fareast-font-family:"Times New Roman"'>All</span><span
				  style='mso-fareast-font-family:"Times New Roman"'><o:p></o:p></span></p>
				  </td>
				  <td width=71 valign=top style='width:53.55pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:33.75pt'>
				  <p class=MsoNormal style='mso-margin-top-alt:auto'><span style='font-size:
				  8.0pt;mso-fareast-font-family:"Times New Roman"'>6:30 PM</span><span
				  style='mso-fareast-font-family:"Times New Roman"'><o:p></o:p></span></p>
				  </td>
				  <td width=71 valign=top style='width:53.55pt;border-top:none;border-left:
				  none;border-bottom:solid windowtext 1.0pt;border-right:solid windowtext 1.0pt;
				  mso-border-top-alt:solid windowtext .5pt;mso-border-left-alt:solid windowtext .5pt;
				  mso-border-alt:solid windowtext .5pt;padding:0in 5.4pt 0in 5.4pt;height:33.75pt'>
				  <p class=MsoNormal style='mso-margin-top-alt:auto'><span style='font-size:
				  8.0pt;mso-fareast-font-family:"Times New Roman"'>7:00 PM</span><span
				  style='mso-fareast-font-family:"Times New Roman"'><o:p></o:p></span></p>
				  </td>
				 </tr>
				</table>
			</div>	
		</div>	
		
		<div class="footer">
			Powered by <a href="http://www.blueradianz.com" target="blank">RMASH technologies</a> © 2015-2016.
		</div>

	</body>
</html>

