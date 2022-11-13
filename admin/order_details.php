<?php
$order_id=$_GET['order_id'];
$sql="select carts.user_id,orders.bill_no,orders.remarks,carts.color,carts.size,carts.qty,DATE_FORMAT(orders.order_date,'%M %d %Y')AS order_date,orders.order_id,products.prod_name,products.offer_price,orders.is_delivered,CONCAT_WS(' ',users.fname,users.lname) AS name, users.email,users.phone,users.address FROM orders JOIN carts ON orders.cart_id=carts.cart_id JOIN users ON carts.user_id=users.user_id JOIN products ON carts.prod_code=products.prod_code WHERE order_id=".$order_id;
$res=mysqli_query($conn,$sql);
if(mysqli_num_rows($res)>0)
{
	$row=mysqli_fetch_assoc($res);
	?>
	<!-- Detail -->
	<div class="card bg-dark">
		<img class="card-img-top card-image" src="image/admin-panel.png" alt="">
		<div class="card-body">
			<h5 class="keyword">Quotation Detail</h5>
			<hr class="light-100">
			<span class="card-text"><strong>Bill No.:</strong> <?php echo $row['bill_no']; ?> </span>
			<a href="bill.php?user_id=<?php echo $row['user_id']; ?>&bill_no=<?php echo $row['bill_no']; ?>" target="_blank"><i class="fas fa-print"></i></a>
			<div class="container">
				<div class="row">
					<div class="col-6">
						<p class="card-text"><strong>Name:</strong> <?php echo $row['name']; ?> </p>
						<p class="card-text"><strong>Email:</strong> <?php echo $row['email']; ?> <p>
							<p class="card-text"><strong>Phone:</strong> <?php echo $row['phone']; ?> </p>
							<p class="card-text"><strong>Address:</strong> <?php echo $row['address']; ?> </p>
							<p class="card-text"><strong>Due:</strong> <?php echo $row['qty']*$row['offer_price']; ?> </p>
						</div>
						<div class="col-6">
							<p class="card-text"><strong>Product:</strong> <?php echo $row['prod_name']; ?> </p>
							<p class="card-text"><strong>Color:</strong> <?php echo $row['color']; ?> </p>
							<p class="card-text"><strong>Size:</strong> <?php echo $row['size']; ?> </p>
							<p class="card-text"><strong>Quantity:</strong> <?php echo $row['qty']; ?> </p>
							<p class="card-text"><strong>Date:</strong> <?php echo $row['order_date']; ?> </p>
						</div>
					</div>
				</div>
			</div>
			<ul type="none">
				<?php if($row['is_delivered']==1){?>
					<p><i class="far fa-check-circle"></i> Already Delivered</p>
					<p><strong>Remarks:</strong> <?php echo $row['remarks']; ?> </p>
				<?php } else{ ?>
					<p><i class="far fa-times-circle"></i> Not Delivered Yet!</p>
					<p><strong>Remarks:</strong> <?php echo $row['remarks']; ?> </p>
				<?php } ?>
			</ul>
			<div class="card-body">
				<form method="post" action="php/update_orders.php">
					<div class="form-row">
						<div class="col-lg-4">
							<input type="text" name="order_id" value="<?php echo $order_id; ?>" hidden>
							<input type="text" name="bill_no" value="<?php echo $row['bill_no']; ?>" hidden>
							<textarea class="form-control" name="remarks" placeholder="Write Remarks..."></textarea>
							<br>
							<label class="switch">
								<input type="checkbox" checked name="for_all">
								<span class="slider round"></span>
							</label>
							<label><h6><em>Do this for all items in the bill.</em></h6></label>
							<br>
							<button class="btn btn-outline-light btn-rounded btn-sm" type="submit">Delivered</button>
							<a href="admin.php?display=orders" class="bot-link"><small> Back to Quotations</small></a>
						</div>
					</div>
				</form>
			</div>
		</div>
	<?php } ?>
