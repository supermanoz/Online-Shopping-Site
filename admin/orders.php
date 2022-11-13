 <!-- Orders-->
 <h5 class="keyword">Orders</h5>
 <hr class="light-100">
 <div style="float:right">
 	<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
 		<input type="text" name="search_input" placeholder=" Search Input" class="search-form my-1">
 		<select name="filter">
 			<option value="prod_name">Filter</option>
 			<option value="order_id">Order No.</option>
 			<option value="fname">First Name</option>
 			<option value="lname">Last Name</option>
 			<option value="email">Email</option>
 			<option value="phone">Phone</option>
 			<option value="address">Address</option>
 			<option value="prod_name">Product</option>
 			<option value="order_date">Date</option>
 		</select>
 		<button class="btn btn-outline-light btn-sm" type="submit"><i class="fas fa-search icon"></i></button>
 	</form>
 </div>
 <table class="table table-striped text-center admin-table"><thead class="thead-dark"><tr><th scope="col">S.N.</th><th scope="col">Name</th><th scope="col">Email</th><th scope="col">Phone</th><th scope="col">Address</th><th>Product</th><th>Delivered</th><th scope="col">Details</th></tr></thead>
 	<?php
 	$concat=" order by orders.order_date desc";
 	$filter="prod_name";
 	if($_SERVER['REQUEST_METHOD']=='POST'){
 		$text=$_POST['search_input'];
 		$filter=$_POST['filter'];
 		$concat=" where ".$filter." like '%".$text."%' order by orders.order_date desc";
 	}
 	$sql="select orders.order_id,products.prod_name,orders.is_delivered,CONCAT_WS(' ',users.fname,users.lname) AS name, users.email,users.phone,users.address FROM orders JOIN carts ON orders.cart_id=carts.cart_id JOIN products ON products.prod_code=carts.prod_code JOIN users ON users.user_id=carts.user_id".$concat;
 	$res=mysqli_query($conn,$sql);
 	if(mysqli_num_rows($res)>0)
 	{
 		echo "<tbody>";
 		$sn=1;
 		while($row=mysqli_fetch_assoc($res))
 		{

 			?>
 			<tr><td><?php echo $sn; ?></td><td><?php echo $row['name']; ?></td><td><?php echo $row['email']; ?></td><td><?php echo $row['phone']; ?></td><td><?php echo $row['address']; ?></td><td><?php echo $row['prod_name']; ?></td><td>
 				<?php if($row['is_delivered']==1) echo '<i class="far fa-check-circle"></i>'; else echo '<i class="far fa-times-circle"></i>'; ?></td><td><a href="admin.php?display=order_details&order_id=<?php echo $row['order_id']; ?>" class="bot-link">...</a></td></tr>
 				<?php
 				$sn++;
 			}
 			echo "</tbody>";
 		}
 		echo "</table>";
 	?>