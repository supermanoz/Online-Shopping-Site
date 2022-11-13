<?php session_start();?>
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

<?php
	include "php/conn.php";
	if($_SESSION['role']!="admin"){
		header('location:index.php');
	}
	$display='orders';
	if(isset($_GET['display']))
	{
		$display=$_GET['display'];
	}
	if(isset($_GET['task']))
  {
    if($_GET['task']=="successful_insertion")
    {
?>
  <script language="javascript">
      swal({
        title: "Product Added!",
        text: "You can edit the details later, if necessary.",
        icon: "success",
        button: "Okay",
        timer:3000
      });
  </script>
<?php
 	 }
 	  if($_GET['task']=="unsuccessful_insertion")
    {
?>
  <script language="javascript">
      swal({
        title: "Updated Without Image!",
        text: "Product added without image, insert image later.",
        icon: "success",
        button: "Okay",
        timer:3000
      });
  </script>
<?php
 	 }
 	  if($_GET['task']=="successful_updation")
    {
?>
  <script language="javascript">
      swal({
        title: "Product Details Updated!",
        text: "Details changed.",
        icon: "success",
        button: "Okay",
        timer:3000
      });
  </script>
<?php
 	 }
	}
?>
<!-- Navigation-->
<nav class="navbar navbar-expand-sm navbar-dark shadow-5-strong gradient-navbar sticky-top">
	<div class="container-fluid">
		<a class="navbar-brand" href="index.php"> <img class="logo" src="image/logo.png"> </a>
		<h1 class="logo-text"><a href="">Everest Fashion<span>.</span></a></h1>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
			<span class="navbar-toggler-icon"> </span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item dropdown"><a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#" id="navbarDropdown">Admin <img src="image/user.png" class="img-fluid admin-pic"> </a>
	       	<div class="dropdown-menu" aria-labelledby="navbarDropdown">
	      		<a class="dropdown-item" href="php/logout.php">Logout</a>
	       	</div>
         </li>
			</ul>
		</div>
	</div>
</nav>

<!-- Search Result -->

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-2 col-md-3 col-sm-4">
 			<div class="container-fluid admin-side">
 				<div class="row">
 						<div class="col"><i class="icon fa fa-calendar"></i> Dashboard</div>
 						<hr class="light-100">
 				</div>
 				<div class="row">
 					<a href="admin.php?display=orders" class="bot-link">
 						<div class="col"><i class="icon fa fa-eye"></i> View Orders</div>
 					</a>
 				</div>
 				<div class="row">
 					<a href="admin.php?display=add" class="bot-link">
 						<div class="col"><i class="icon fa fa-plus"></i> Add Products</div>
 					</a>
 				</div>
 				<div class="row">
 					<a href="admin.php?display=edit" class="bot-link">
 						<div class="col"><i class="icon fa fa-pen"></i> Edit Products</div>
 					</a>
 				</div>
 				<div class="row">
 					<a href="admin.php?display=customers" class="bot-link">
 						<div class="col"><i class="icon fa fa-user"></i> View Customers</div>
 					</a>
 				</div>
 			</div>
 		</div>
 		<div class="col-lg-10 col-md-9 col-sm-8">

 		<?php if($display=="orders"){
 			include "admin/orders.php";
 		} ?>

		<?php
		if($display=="order_details"){
				include "admin/order_details.php";
    } ?>

    <?php if($display=='add'){
     		include "admin/add_product.php";
    } ?>

    <?php if($display=='edit_details'){
   	  	include "admin/edit_details.php";
    } ?>

    <?php if($display=="edit"){
      	include "admin/edit_product.php";
    } ?>
		
		<?php if($display=="customers"){
			include "admin/customers.php";
   	} ?>

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

