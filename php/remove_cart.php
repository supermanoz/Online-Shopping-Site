<?php
	include 'conn.php';
	$cart_id=$_GET['cart_id'];
	$sql="delete from carts where cart_id=".$cart_id;
	$res=mysqli_query($conn,$sql);
	header('location:../cart.php');
?>