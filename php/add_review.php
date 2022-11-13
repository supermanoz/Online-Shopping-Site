<?php
	session_start();
	include 'conn.php';
	$rating=5;
	if(isset($_POST['rate'])){
		$rating=$_POST['rate'];
	}
	$rev=$_POST['review'];
	$review=str_replace("'","\'",$rev);
	$user_id=$_SESSION['user_id'];
	$prod_code=$_POST['prod_code'];
	$sql="insert into reviews (prod_code,user_id,review,rating) values ($prod_code,$user_id,'$review',$rating)";
	$res=mysqli_query($conn,$sql);
	if($res)
	{
		header("location:../product.php?prod_code=$prod_code&task=review_successful");
	}
?>