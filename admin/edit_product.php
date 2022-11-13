 <!-- Product Details-->
 <h5 class="keyword">Products</h5>
 <hr class="light-100">
 <div style="float:right">
 	<form method="post" action="admin.php?display=edit">
 		<input type="text" name="search_input1" placeholder=" Search Input" class="search-form my-1">
 		<select name="filter1">
 			<option value="prod_name">Filter</option>
 			<option value="prod_code">Product No.</option>
 			<option value="prod_name">Name</option>
 			<option value="color">Color</option>
 			<option value="offer_price">Price</option>
 			<option value="added_date">Date</option>
 		</select>
 		<button class="btn btn-outline-light btn-sm" type="submit"><i class="fas fa-search icon"></i></button>
 	</form>
 </div>
 <table class="table table-striped text-center admin-table"><thead class="thead-dark"><tr><th scope="col">Product Code</th><th scope="col">Name</th><th scope="col">Stock</th><th scope="col">Out of Stock</th><th scope="col">Operation</th></tr></thead>
 	<?php
 	$concat=" where is_deleted=0";
 	$filter="prod_name";
 	if($_SERVER['REQUEST_METHOD']=='POST'){
 		$text=$_POST['search_input1'];
 		$filter=$_POST['filter1'];
 		$concat=" where is_deleted=0 and ".$filter." like '%".$text."%'";
 	}
 	$sql="select * from products".$concat;
 	$res=mysqli_query($conn,$sql);
 	if(mysqli_num_rows($res)>0)
 	{
 		echo "<tbody>";
 		while($row=mysqli_fetch_assoc($res))
 		{
 			?>
 			<tr><td><?php echo $row['prod_code']; ?></td><td><?php echo $row['prod_name']; ?></td><td><?php echo $row['stock']; ?></td><td><?php if($row['out_of_stock']==true){ echo '<i class="fa fa-exclamation-triangle"></i> <em>Out of stock!</em>'; } else echo "<em>In stock</em>" ?></td><td>
 				<a href="admin.php?display=edit_details&prod_code=<?php echo $row['prod_code']; ?>"><button class="btn btn-outline-light btn-sm btn-rounded" style="background-color: #455A71;">Edit</button></a>
 				<a href="php/delete_product.php?prod_code=<?php echo $row['prod_code']; ?>"><button class="btn btn-outline-light btn-sm btn-rounded" style="background-color: #b30000;">Delete</button></a></td></tr>

 			<?php } 
 			echo "</tbody>";
 		}?>
 	</table>