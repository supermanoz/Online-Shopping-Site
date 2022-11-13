<?php
	include 'conn.php';
	$sql="update products set is_deleted=1 where prod_code=".$_GET['prod_code'];
	$res=mysqli_query($conn,$sql);
	if($res)
	{
		header('location:../admin.php?display=edit');
	}
?>