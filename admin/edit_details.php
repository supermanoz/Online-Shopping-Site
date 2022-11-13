<!-- Edit Product -->
<?php
$prod_code=1;
if(isset($_GET['prod_code'])){
	$prod_code=$_GET['prod_code'];
?>
<div class="container">
	<div class="row no-gutters">
		<div class="col-lg-7">
			<img src="image/add-product.jpg" class="img-fluid login-img">
		</div>
		<div class="col-lg-5 px-5 pt-3">
			<h4 class="font-weight-bold py-2">Edit product<span class="keyword">.</span></h4>
			<form id="form" method="post" action="php/edit_product.php" enctype="multipart/form-data">
				<div class="form-row">
					<div class="col-lg-10">
						<div class="verify-form">
							<?php
							$sql="select * from products where is_deleted=0 and prod_code=".$prod_code;
							$res=mysqli_query($conn,$sql);
							$row=mysqli_fetch_assoc($res);
							?>
							<input type="text" placeholder="Product Code: <?php echo $prod_code; ?>" class="form-control my-1" disabled>
							<input type="text" name="prod_code" value="<?php echo $prod_code; ?>" hidden>
							<i class="fas fa-check-circle"></i>
							<i class="fas fa-exclamation-circle"></i>
							<small>Error Message</small>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col-lg-10">
						<div class="verify-form">
							<input type="text" name="prod_name" id="prod_name" placeholder="Product Name" class="form-control my-1" required value="<?php echo $row['prod_name']; ?>">
							<i class="fas fa-check-circle"></i>
							<i class="fas fa-exclamation-circle"></i>
							<small>Error Message</small>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col-lg-10">
						<div class="verify-form">
							<input type="text" name="color" id="color" placeholder="Color" class="form-control my-1" required value="<?php echo $row['color']; ?>">
							<i class="fas fa-check-circle"></i>
							<i class="fas fa-exclamation-circle"></i>
							<small>Error Message</small>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col-lg-5">
						<div class="verify-form">
							<input type="text" name="marked_price" id="marked_price" placeholder="Marked Price" class="form-control my-1" required value="<?php echo $row['marked_price']; ?>">
							<i class="fas fa-check-circle"></i>
							<i class="fas fa-exclamation-circle"></i>
							<small>Error Message</small>
						</div>
					</div>
					<div class="col-lg-5">
						<div class="verify-form">
							<input type="text" name="offer_price" id="offer_price" placeholder="Offer Price" class="form-control my-1" required value="<?php echo $row['offer_price']; ?>">
							<i class="fas fa-check-circle"></i>
							<i class="fas fa-exclamation-circle"></i>
							<small>Error Message</small>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col-lg-10">
						<div class="verify-form">
							<textarea name="description" id="description" placeholder="Description" class="form-control my-1"><?php echo $row['description']; ?></textarea>
							<i class="fas fa-check-circle"></i>
							<i class="fas fa-exclamation-circle"></i>
							<small>Error Message</small>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col-lg-10">
						<div class="verify-form">
							<textarea name="tags" id="tags" placeholder="Tags" class="form-control my-1"><?php echo $row['tags']; ?></textarea>
							<i class="fas fa-check-circle"></i>
							<i class="fas fa-exclamation-circle"></i>
							<small>Error Message</small>
						</div>
						<small>Use hashtag (#) to mention a tag.</small>
					</div>
				</div>
				<div class="form-row">
					<div class="col-lg-10">
						<div class="verify-form">
							<input type="number" name="stock" id="stock" placeholder="Stock" class="form-control my-1" required value="<?php echo $row['stock']; ?>">
						</div>
					</div>
				</div>
        				<div class="file-field">
        					<a class="btn-floating peach-gradient mt-0 multiple">
        						<label>Product Pictures </label><br>
        						<i class="fas fa-paperclip" aria-hidden="true"></i>
        						<input type="file" name="image">
        					</a>
        					<a class="btn-floating peach-gradient mt-0 multiple">
        						<i class="fas fa-paperclip" aria-hidden="true"></i>
        						<input type="file" name="image2">
        					</a>
        					<a class="btn-floating peach-gradient mt-0 multiple">
        						<i class="fas fa-paperclip" aria-hidden="true"></i>
        						<input type="file" name="image3">
        					</a>
        				</div>
        				<div class="form-row">
        					<div class="col-lg-10">
        						<button type="submit" class="button login-btn mt-1 mb-5"><i class="fa fa-pen"></i> EDIT</button>
        					</div>
        				</div>
        			</form>
        			<script src="js/product.js"></script>
        		</div>
        	</div>
        </div>
<?php } ?>