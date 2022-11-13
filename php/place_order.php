<?php
	session_start();
	include 'conn.php';
	$sql1="select max(bill_no) as maxbill from orders";
	$res1=mysqli_query($conn,$sql1);
	$row=mysqli_fetch_assoc($res1);
	$billno=$row['maxbill']+1;
	$user_id=$_SESSION['user_id'];
	$remarks=$_POST['remarks'];
	$failed=true;
	$sql2="select carts.cart_id,products.prod_name,carts.qty AS ordered_qty,products.stock AS stock_qty FROM carts JOIN products ON carts.prod_code=products.prod_code LEFT JOIN orders ON orders.cart_id=carts.cart_id WHERE order_id IS NULL and user_id=".$user_id;
	$res2=mysqli_query($conn,$sql2);
	$sql3="";
	while($row=mysqli_fetch_assoc($res2)){
		if($row['ordered_qty']>$row['stock_qty'])
		{
			header('location:../cart.php?task=unsuccessful_order&item='.$row['prod_name']);
		}
		else{
			$sql3=$sql3."insert INTO orders(cart_id,bill_no,remarks) VALUES (".$row['cart_id'].",$billno,'$remarks');";
			$sql3=$sql3."update products JOIN carts ON products.prod_code=carts.prod_code SET products.stock=(products.stock-carts.qty) WHERE carts.cart_id=".$row['cart_id'].";";
			$failed=false;
		}
	}
	if($failed==false){
			$sql3=$sql3."update products SET out_of_stock=1 WHERE stock=0;";
			$res3=mysqli_multi_query($conn,$sql3);
			if($res3)
			{
				$to='weverestfc@gmail.com';
				$subject='Everest Fashion Hub New Order';
				$message="Click to view new orders: everestfc.com.np/login.php?user=admin";
				$headers="From: Everest Fashion Hub";

				mail($to,$subject,$message,$headers);
				mysqli_close($conn);
				header('location:../index.php?task=successful_order');
			}
		}
?>