<?php
	include 'conn.php';
	$review_id=$_GET['review_id'];
	$sql='update reviews set is_deleted=1 where review_id='.$review_id;
	$res=mysqli_query($conn,$sql);
	header('location:../product.php?task=report&prod_code='.$_GET['prod_code']);
?>