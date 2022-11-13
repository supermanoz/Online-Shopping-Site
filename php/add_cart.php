<?php
	session_start();
	include 'conn.php';
	if(isset($_SESSION['user_id'])){
		if($_SERVER['REQUEST_METHOD']=='POST'){
			$color=$_POST['color'];
			$qty=$_POST['qty'];
			$size=$_POST['size'];
			$prod_code=$_POST['prod_code'];
		}
		else{
			$color="Unspecified";
			$qty=1;
			$size="Unspecified";
			$prod_code=$_GET['prod_code'];
		}
		$user_id=$_SESSION['user_id'];
		$sql="insert into carts (prod_code,user_id,color,qty,size) values ($prod_code,$user_id,'$color',$qty,'$size');";
		$res=mysqli_query($conn,$sql);
		if($res)
		{
			header('location:../cart.php');
		}
	}
	else{
		header('location:../login.php?task=unsuccessful_carting');
	}
?>