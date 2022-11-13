<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cart - Everest Fashion Hub</title>	
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
<body oncontextmenu="return true">

<?php
	if(!isset($_SESSION['user_id'])){
		header('location:index.php');
	}
	include 'php/conn.php';
?>

<?php
  if(isset($_GET['task']))
  {
    if($_GET['task']=="unsuccessful_order")
    {
?>
  <script language="javascript">
      swal({
        title: "Order Unsuccessful!",
        text: "Not enough of <?php echo $_GET['item']; ?>, please remove it from cart.",
        icon: "error",
        button: "Okay",
        timer:6000
      });
  </script>
<?php
 	 }
	}	
?>
<!-- Navigation-->
<?php include 'php/navigation.php'; ?>

<!-- Cart -->

<div class="container">
	<div class="row">
		<div class="col-12">
 			<h5 class="keyword">My Cart</h5>
 			<hr class="light-100">
 		</div>
 	</div>
 </div>

 <!-- Cart -->
 <div class="container padding">
 	<div class="row padding">
 			<div class="col-lg-8">
 				<div class="card text-white bg-dark mb-3">
 					<h5 class="card-header info-color text-center white-text py-4">
 						<?php echo $_SESSION['fname']; ?>'s Cart
 					</h5>
 					<div class="card-body px-lg-5 pt-0">
 						<div class="container-fluid">
 							<?php
 								$sql="select orders.order_id,carts.cart_id,(products.offer_price*carts.qty)AS total,products.prod_name,carts.prod_code,products.offer_price,carts.color,carts.size,carts.qty,products.description FROM products JOIN carts ON carts.prod_code=products.prod_code LEFT JOIN orders ON carts.cart_id=orders.cart_id WHERE orders.order_id IS NULL AND carts.user_id=".$_SESSION['user_id'];
 								$res=mysqli_query($conn,$sql);
 								if(mysqli_num_rows($res)>0)
 								{
 									while($row=mysqli_fetch_assoc($res))
 									{
 							?>

 							<div class="row">
 								<div class="col-3">
 									<img src="image/products/<?php echo $row['prod_code']; ?>.jpg" class="img-fluid">
 								</div>
 								<div class="col-9 lil-space">
 									<h5><?php echo $row['prod_name']; ?><span class="keyword">.</span></h5>
 									<p>Color: <em><?php echo $row['color']; ?></em></p>
 									<p>Size: <em><?php echo $row['size']; ?></em></p>
 									<p>Quantity: <em><?php echo $row['qty']; ?></em></p>
 									<p>Total: <em><?php echo "Rs. ".$row['total']; ?></em></p>
 									<a href="php/remove_cart.php?cart_id=<?php echo $row['cart_id']; ?>"><button type='button' class='btn btn-outline-light btn-sm' style="float:right"> Remove </button></a>
 								</div>
 							</div>

 							<?php
 									}
 								}
 								else echo "<p><span class='keyword'>Nothing in cart!</span> <em>Please add something in the cart before veiwing it.</em></p>";
 							?>
 							<hr class='my-4 light-100'>
 							<div class="row">
 								<div class="col-3">
 									<p style="text-align:right"><b>Sub-total</b></p>
 								</div>
 								<div class="col-9">
 									<p style='text-align:right'>
 										<?php 
 											$sql1="select SUM(total)AS subtotal FROM (SELECT (products.offer_price*carts.qty)AS total FROM carts JOIN products ON carts.prod_code=products.prod_code LEFT JOIN orders ON carts.cart_id=orders.cart_id WHERE orders.order_id IS NULL AND carts.user_id=".$_SESSION['user_id'].")A;";
 											$res1=mysqli_query($conn,$sql1);
 											$row=mysqli_fetch_assoc($res1);
 											$subtotal=$row['subtotal'];
 											echo "Rs. ".$subtotal;
 										?>
 									</p>
 								</div>
 							</div>
 							<div class="row padding">
 								<div class="col">
 									<a href="index.php"><button type='button' class='btn btn-dark btn-sm' style="float:right"> <i class="fas fa-arrow-left"></i> Shop More </button></a>
 								</div>
 							</div>
 						</div>
 					</div>
 				</div>
 			</div>
 			<div class="col-lg-4">
 				<div class="card text-white bg-dark mb-3">
 					<h5 class="card-header info-color white-text py-4">
 						Total
 					</h5>
 					<div class="card-body px-lg-5">
 						<div class="row">
 							<div class="col-6">
 								<p style='text-align:left'><b>Sub-total</b></p>
 							</div>
 							<div class="col-6">
 								<p style='text-align:right'><?php echo "Rs. ".$subtotal; ?></p>
 							</div>
 						</div>
 						<div class="row">
 							<div class="col-6">
 								<p><b>Delivery</b></p>
 								<p style="font-size:10px"> (Standard Delivery) </p>
 							</div>
 							<div class="col-6">
 								<p style='text-align:right'> Rs. 100 </p>
 							</div>
 						</div>
 						<div class="row">
 							<div class="col-6">
 								<p><b>Discount</b></p>
 								<p style="font-size:10px"></p>
 							</div>
 							<div class="col-6">
 								<p style='text-align:right'> Rs. - </p>
 							</div>
 						</div>
 						<form method="post" action="php/place_order.php">
 							<div class="row">
 								<div class="col">
 									<textarea placeholder=" Remarks..." name="remarks" cols="28"></textarea>
 								</div>
 							</div>
 						<hr class="my-4 light-100">
 						<div class="row">
 							<div class="col-6">
 								<button type='submit' class='btn btn-dark btn-sm'> Order Now </button>
 							</div>
 							<div class="col-6">
 								<p style='text-align:right'> <?php echo "Rs. ".$subtotal+100; ?></p>
 							</div>
 						</div>
 						</form>
 						<div class="row">
 							<div class="col">
 								<center><p> We accept <em> Cash On Delivery! </em> </p></center>
 							</div>
 						</div>
 					</div>
 				</div>

 				<div class="card text-white bg-dark mb-3">
 					<h5 class="card-header info-color white-text py-4">
 						Scan to pay
 					</h5>
 					<img class="card-img-top" src="image/qr.jpg">
 				</div>
 			</div>

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

