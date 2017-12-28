<?php
	$host="localhost";
	  $user="root";
	  $password="";
	  $dbname="au_db";
	  
	  $con1= mysqli_connect($host, $user, $password) or die("Not Connected");
	  $conn = mysqli_select_db($con1,$dbname) or die("Not Connected");
 ?>
