<?php
	require 'connect.php';
	$q=mysql_query("select * from reg_user");
	$n=mysql_num_rows($q);
	$n1=$n-2;
	echo $n1;	
	?>