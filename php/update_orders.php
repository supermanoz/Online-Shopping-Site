<?php
	include 'conn.php';
	$remarks=$_POST['remarks'];
	$order_id=$_POST['order_id'];
	$for_all=$_POST['for_all'];
	$bill_no=$_POST['bill_no'];
	if($for_all=="on"){
		$sql="update orders set remarks='".$remarks."', is_delivered=1 where bill_no=".$bill_no;
	}
	else{
		$sql="update orders set remarks='".$remarks."', is_delivered=1 where order_id=".$order_id;
	}
	$res=mysqli_query($conn,$sql);
	header('location:../admin.php?display=orders');
?>