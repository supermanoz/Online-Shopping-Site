<?php
	session_start();
	include 'conn.php';
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$phone=$_POST['phone'];
	$address=$_POST['address'];
	$password=md5($_POST['password']);
	$sql="update users set fname='$fname',lname='$lname',phone='$phone',address='$address',password='$password' where user_id=".$_SESSION['user_id'];
	$res=mysqli_query($conn,$sql);
	$id=mysqli_insert_id($conn);
	if($res)
	{
		session_unset();
		session_destroy();
		header('location:../login.php?task=successful_update');
	}
?>