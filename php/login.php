<?php
	session_start();
	include "conn.php";
	$email=$_POST['email'];
	$password=md5($_POST['password']);
	$sql="select * from users where email='".$email."' and password='".$password."' and is_blocked=0";
	$res=mysqli_query($conn,$sql);
	if(mysqli_num_rows($res)==1){
		$row=mysqli_fetch_assoc($res);
		$_SESSION['user_id']=$row['user_id'];
		$_SESSION['fname']=$row['fname'];
		$_SESSION['lname']=$row['lname'];
		$_SESSION['phone']=$row['phone'];
		$_SESSION['address']=$row['address'];
		$_SESSION['email']=$row['email'];
		$_SESSION['role']=$row['role'];
		if($_SESSION['role']=="admin"){
			header('location:../admin.php?display=orders');
		}
		else{
			header('location:../index.php?task=successful_login');		
		}
	}
	else{
		header('location:../login.php?task=unsuccessful_login');	
	}
?>