<?php
	$db="ef";
	$server="localhost";
	$pass="";
	$user="root";
	// $db="everestf_ef";
	// $server="localhost";
	// $pass="passwordisP@ssw0rd";
	// $user="everestf_root";
	$conn=mysqli_connect($server,$user,$pass,$db);
	if(!$conn)
	{
		die("Connection Failed!".mysqli_connect_error());
	}
?>