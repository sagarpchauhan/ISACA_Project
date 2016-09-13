<?php
$servername="localhost";
$username="root";
$password="";

$connect=@mysql_connect("localhost","root","") or die("check your server connrction.");

mysql_select_db ("pmi") or die ("No such database");

?>