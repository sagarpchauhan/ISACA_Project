<?php
	$servername="localhost";
	$username="root";
	$password="";

	$connect=@mysqli_connect("localhost","root","") or die("check your server connrction.");

	mysqli_select_db ($connect,"test") or die ("No such database");
	
	
		
		$query2=mysqli_query($connect,"select firstname from reg_user where firstname='sagar'");	
 		$res=mysqli_fetch_array($query2);
		echo $res['firstname'];
		/*while($query2_row=mysql_fetch_assoc($query2))
        {
			$fname=$query2_row['fname'];
			$age=$query2_row['age'];
			$query1=mysql_query("select * from table1");
					
			while($query1_row=mysql_fetch_assoc($query1))
			{
				$fname1=$query1_row['fname'];
				$age1=$query1_row['age'];
				
				echo $fname."-->".$fname1."<br>";
				if($fname==$fname1){
					mysql_query("update table1 set fname=$fname,age=$age");
				}
				else{
					mysql_query("insert into table1 values($fname,$age)");
				}
			}
		}*/
	
?>