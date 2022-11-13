<?php
	include 'conn.php';
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$phone=$_POST['phone'];
	$address=$_POST['address'];
	$email=$_POST['email'];
	$password=md5($_POST['password']);
	$sql="select * from users where email='".$email."'";
	$res=mysqli_query($conn,$sql);
	if(mysqli_num_rows($res)>0)
	{
		header('location:../signup.php?task=reenter_email');
	}
	else{
		$sql="insert into users (fname,lname,phone,address,email,password,is_blocked) values ('$fname','$lname','$phone','$address','$email','$password',1)";
		$res=mysqli_query($conn,$sql);
		$id=mysqli_insert_id($conn);
		if($res)
		{
			$to=$email;
			$subject='Everest Fashion Hub Account Activation';
			$message="Name: $fname $lname  Email: $email Phone: $phone everestfc.com.np/php/activate_account.php?user_id=$id";
			$headers="From: $id";

			mail($to,$subject,$message,$headers);

			header('location:../index.php?task=successful_signup');
		}
	}
?>