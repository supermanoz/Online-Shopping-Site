<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Search - Everest Fashion Hub</title>	
	<link rel="icon" href="image/logo.png" type="image/icon">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://use.fontawesome.com/releases/v5.14.0/js/all.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>
	<link href="css/style.css" rel="stylesheet">
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body oncontextmenu="return false">

<!-- Navigation-->
<?php include 'php/navigation.php'; ?>

<!-- Search Result -->
<?php
	include "php/conn.php";
	$key=$_GET["keyword"];
	$keywd=str_replace("%","",$key);
?>
<div class="container">
	<div class="row">
		<div class="col-12">
 			<h6>Search result for <i class="keyword"><?php echo $keywd; ?></i> :</h6>
 			<hr class="light-100">
 		</div>
 	</div>
 </div>

<div class="container padding margin">
	<div class="row">
		<?php
			$sql=$conn->prepare("select * from products where is_deleted=0 and tags like ?");
			$sql->bind_param("s",$keyword);
			$keyword=$_GET["keyword"];
			$sql->execute();
			$res=$sql->get_result();
			$num=mysqli_num_rows($res);
			if($num>0)
			{
				while($row=mysqli_fetch_assoc($res))
				{
		?>
		<div class="col-lg-3 col-md-6 col-sm-6 col-xs-6">
			<a href="<?php echo "product.php?prod_code=".$row['prod_code']; ?>">
				<div class="card card-alt card-product">
					<img class="card-img-top img-fluid" src="image/products/<?php echo $row['prod_code'];?>.jpg" alt="Card image cap">
					<div class="card-body card-body-alt">
						<a href="<?php if($row['out_of_stock']==0) echo "php/add_cart.php?prod_code=".$row['prod_code']; else echo "product.php?prod_code=".$row['prod_code']; ?>"><i class="fa fa-cart-plus card-icon"></i></a>
						<a href="<?php echo "product.php?prod_code=".$row['prod_code']; ?>"><i class="fa fa-ellipsis-h card-icon"></i></a>
						<h6><?php echo $row["prod_name"]; ?></h6>
						<p class="card-text card-text-alt"><?php echo "Rs. ".$row["marked_price"]; ?></p>
						<p><span style="text-decoration: line-through;"><?php echo "Rs. ".$row["offer_price"]; ?></span>
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
		<?php }} else{ ?>
		<div class="col-12">
			<p>Sorry! No products found for <em class="keyword"><?php echo $keywd; ?></em>. Try searching something like t-shirt, black, women etc.</p>
			</div>
		<?php } ?>
	</div>
</div>

<?php mysqli_close($conn); ?>
<!--- Footer -->
<?php include 'php/footer.php'; ?>

</body>
	<script>
		document.onkeydown=function(e)
		{
			if(event.keyCode==123)
			{
				return false;
			}
			if(e.ctrlKey && e.shiftKey && e.keyCode=='I'.charCodeAt(0))
			{
				return false;
			}
			if(e.ctrlKey && e.shiftKey && e.keyCode=='J'.charCodeAt(0))
			{
				return false;
			}
			if(e.ctrlKey && e.keyCode=='U'.charCodeAt(0))
			{
				return false;
			}
		}
	</script>
</html>

