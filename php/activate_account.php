<?php
	include 'conn.php';
	$user_id=$_GET['user_id'];
	$sql="update users set is_blocked=0 where user_id=".$user_id;
	$res=mysqli_query($conn,$sql);
	if($res)
	{
		header('location:../login.php?task=successful_signup');
	}
?>