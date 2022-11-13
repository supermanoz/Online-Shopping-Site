 <!-- Order Details-->
 <h5 class="keyword">Registered Customers</h5>
 <hr class="light-100">
 <div style="float:right">
 	<form method="post" action="admin.php?display=customers">
 		<input type="text" name="search_input" placeholder=" Search Input" class="search-form my-1">
 		<select name="filter">
 			<option value="fname">Filter</option>
 			<option value="fname">First Name</option>
 			<option value="lname">Last Name</option>
 			<option value="email">Email</option>
 			<option value="phone">Phone</option>
 			<option value="address">Address</option>
 		</select>
 		<button class="btn btn-outline-light btn-sm" type="submit"><i class="fas fa-search icon"></i></button>
 	</form>
 </div>
 <table class="table table-striped text-center admin-table"><thead class="thead-dark"><tr><th scope="col">S.N.</th><th scope="col">Name</th><th scope="col">Email</th><th scope="col">Phone</th><th scope="col">Address</th><th scope="col">Active</th></tr></thead>
 	<?php
 	$concat="";
 	$filter="fname";
 	if($_SERVER['REQUEST_METHOD']=='POST'){
 		$text=$_POST['search_input'];
 		$filter=$_POST['filter'];
 		$concat=" and ".$filter." like '%".$text."%'";
 	}
 	$sql="select user_id,concat_ws(' ',fname,lname) as name,email,phone,address,is_blocked from users where role='customer'".$concat;
 	$res=mysqli_query($conn,$sql);
 	if(mysqli_num_rows($res)>0)
 	{
 		echo "<tbody>";
 		$sn=1;
 		while($row=mysqli_fetch_assoc($res))
 		{

 			?>
 			<tr><td><?php echo $sn; ?></td><td><?php echo $row['name']; ?></td><td><?php echo $row['email']; ?></td><td><?php echo $row['phone']; ?></td><td><?php echo $row['address']; ?></td><td><?php if($row['is_blocked']==1){ ?>
 				<a href="php/activate_account.php?user_id=<?php echo $row['user_id']; ?>"><button class="btn btn-outline-light btn-sm btn-rounded" style="background-color: #455A71;">Activate</button></a>
 			<?php } else{?>
 				<a href="php/deactivate_account.php?user_id=<?php echo $row['user_id']; ?>"><button class="btn btn-outline-light btn-sm btn-rounded" style="background-color: #b30000;">Deactivate</button></a><?php } ?>
 			</td>
 		</tr>
 		<?php
 		$sn++;
 	}
 	echo "</tbody>";
 }
 echo "</table>";
?>