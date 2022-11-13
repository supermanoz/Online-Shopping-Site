<!-- Add Product -->
<div class="container">
	<div class="row no-gutters">
		<div class="col-lg-7">
			<img src="image/add-product.jpg" class="img-fluid login-img">
		</div>
		<div class="col-lg-5 px-5 pt-3">
			<h4 class="font-weight-bold py-2">Add new product<span class="keyword">.</span></h4>
			<form class="form" id="form" method="post" action="php/insert_product.php" enctype="multipart/form-data">
				<div class="form-row">
					<div class="col-lg-10">
						<div class="verify-form">
							<?php
							$sql="select * from products";
							$res=mysqli_query($conn,$sql);
							$num=mysqli_num_rows($res);
							?>
							<input type="text" name="prod_code" id="prod_code" placeholder="Product Code: <?php echo $num+1; ?>" class="form-control my-1" disabled>
							<i class="fas fa-check-circle"></i>
							<i class="fas fa-exclamation-circle"></i>
							<small>Error Message</small>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col-lg-10">
						<div class="verify-form">
							<input type="text" name="prod_name" id="prod_name" placeholder="Product Name" class="form-control my-1" required>
							<i class="fas fa-check-circle"></i>
							<i class="fas fa-exclamation-circle"></i>
							<small>Error Message</small>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col-lg-10">
						<div class="verify-form">
							<input type="text" name="color" id="color" placeholder="Color" class="form-control my-1" required>
							<i class="fas fa-check-circle"></i>
							<i class="fas fa-exclamation-circle"></i>
							<small>Error Message</small>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col-lg-5">
						<div class="verify-form">
							<input type="text" name="marked_price" id="marked_price" placeholder="Marked Price" class="form-control my-1" required>
							<i class="fas fa-check-circle"></i>
							<i class="fas fa-exclamation-circle"></i>
							<small>Error Message</small>
						</div>
					</div>
					<div class="col-lg-5">
						<div class="verify-form">
							<input type="text" name="offer_price" id="offer_price" placeholder="Offer Price" class="form-control my-1" required>
							<i class="fas fa-check-circle"></i>
							<i class="fas fa-exclamation-circle"></i>
							<small>Error Message</small>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col-lg-10">
						<div class="verify-form">
							<textarea name="description" id="description" placeholder="Description" class="form-control my-1"></textarea>
							<i class="fas fa-check-circle"></i>
							<i class="fas fa-exclamation-circle"></i>
							<small>Error Message</small>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col-lg-10">
						<div class="verify-form">
							<textarea name="tags" id="tags" placeholder="Tags" class="form-control my-1"></textarea>
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
							<input type="number" name="stock" id="stock" placeholder="Stock" class="form-control my-1" required min=1>
						</div>
					</div>
				</div>
				<div class="file-field">
					<a class="btn-floating peach-gradient mt-0 multiple">
						<label>Product Pictures </label><br>
						<i class="fas fa-paperclip" aria-hidden="true"></i>
						<input type="file" name="image" required>
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
						<button type="submit" class="button login-btn mt-1 mb-5"><i class="fa fa-plus"></i> ADD</button>
					</div>
				</div>
			</form>
			<script src="js/product.js"></script>
		</div>
	</div>
</div>