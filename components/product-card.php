<?php
$res=mysqli_query($conn,$sql);
if(mysqli_num_rows($res)>0){
	while($row=mysqli_fetch_assoc($res))
	{
		?>
		<div class="item">
			<a href="<?php echo "product.php?prod_code=".$row['prod_code']; ?>">
				<div class="card card-alt card-product">
					<img class="card-img-top img-fluid overlying-image" src="image/products/<?php echo $row['prod_code'];?>.jpg" alt="Card image cap">
					<img class="card-img-top img-fluid" src=<?php if(file_exists('image/products/'.$row['prod_code'].'b.jpg')){
						echo "image/products/".$row['prod_code']."b.jpg";
					}
					else{
						echo "image/products/unavailable.jpg";
					}
				?> alt="Card image cap">
				<div class="card-body card-body-alt">
					<a href="<?php if($row['out_of_stock']==0) echo "php/add_cart.php?prod_code=".$row['prod_code']; else echo "product.php?prod_code=".$row['prod_code']; ?>"><i class="fa fa-cart-plus card-icon"></i></a>
					<a href="<?php echo "product.php?prod_code=".$row['prod_code']; ?>"><i class="fa fa-ellipsis-h card-icon"></i></a>
					<h6><?php echo $row["prod_name"]; ?></h6>
					<p class="card-text card-text-alt"><?php echo "Rs. ".$row["offer_price"]; ?></p>
					<p><span style="text-decoration: line-through;"><?php echo "Rs. ".$row["marked_price"]; ?></span>
						<?php
						$mp=$row['marked_price'];
						$op=$row['offer_price'];
						$off=($mp-$op)*100/$mp;
						echo " -".ceil($off)."%";
						?>
					</p>
				</div>
			</div>
		</a>
	</div>		
	<?php
}
}
?>