<?php session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Signup - Everest Fashion Hub</title>	
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
  if(isset($_GET['task']))
  {
    if($_GET['task']=="reenter_email")
    {
?>
  <script language="javascript">
      swal({
        title: "Email ALready Registered!",
        text: "Please use a different email address.",
        icon: "error",
        button: "Okay",
        timer:3000
      });
  </script>
<?php
 	 }
	}
?>

<!-- Navigation-->
<?php include 'php/navigation.php'; ?>

<?php if(isset($_SESSION['user_id'])){
	include 'php/conn.php';
	$sql='select * from users where is_blocked=0 and user_id='.$_SESSION['user_id'];
	$res=mysqli_query($conn,$sql);
	$row=mysqli_fetch_assoc($res);
?>
<section class="form my-4 mx-5">
	<div class="container">
		<div class="row no-gutters">
			<div class="col-lg-6 px-5 pt-5">
				<h4 class="font-weight-bold py-2" style="text-align:right">Update personal details<span class="keyword">.</span></h4>
				<form class="form" id="form" method="post" action="php/update_user.php">
					<div class="form-row">
						<div class="col-lg-6">
							<div class="verify-form">
							<input type="text" id="fname" name="fname" placeholder="First Name" class="form-control my-1" required value="<?php echo $row['fname']; ?>">
		                    <i class="fas fa-check-circle"></i>
		                    <i class="fas fa-exclamation-circle"></i>
		                    <small>Error Message</small>
		          </div>
						</div>
						<div class="col-lg-6">
							<div class="verify-form">
							<input type="text" id="lname" name="lname" placeholder="Last Name" class="form-control my-1" required value="<?php echo $row['lname']; ?>">
		                    <i class="fas fa-check-circle"></i>
		                    <i class="fas fa-exclamation-circle"></i>
		                    <small>Error Message</small>
		          </div>
						</div>
					</div>
					<div class="form-row">
						<div class="col-lg-6">
							<div class="verify-form">
							<input type="text" id="phone" name="phone" placeholder="Phone" class="form-control my-1" required value="<?php echo $row['phone']; ?>">
		                    <i class="fas fa-check-circle"></i>
		                    <i class="fas fa-exclamation-circle"></i>
		                    <small>Error Message</small>
		                	</div>
						</div>
						<div class="col-lg-6">
							<div class="verify-form">
							<input type="text" id="address" name="address" placeholder="Address" class="form-control my-1" required value="<?php echo $row['address']; ?>">
		                    <i class="fas fa-check-circle"></i>
		                    <i class="fas fa-exclamation-circle"></i>
		                    <small>Error Message</small>
		                	</div>
						</div>
					</div>
					<div class="form-row">
						<div class="col-lg-4"></div>
						<div class="col-lg-8">
						<div class="verify-form">
							<input type="email" class="form-control my-1" disabled value="<?php echo $row['email']; ?>">
		                    <i class="fas fa-check-circle"></i>
		                    <i class="fas fa-exclamation-circle"></i>
		                    <small>Error Message</small>
						</div>
						</div>
					</div>
					<div class="form-row">
						<div class="col-lg-4"></div>
						<div class="col-lg-8">
							<div class="verify-form">
							<input type="password" id="password" name="password" placeholder="Enter Password" class="form-control my-1" required>
		                    <i class="fas fa-check-circle"></i>
		                    <i class="fas fa-exclamation-circle"></i>
		                    <small>Error Message</small>
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="col-lg-4"></div>
						<div class="col-lg-8">
							<div class="verify-form">
							<input type="password" id="repassword" name="repassword" placeholder="Confirm Password" class="form-control my-1" required>
		                    <i class="fas fa-check-circle"></i>
		                    <i class="fas fa-exclamation-circle"></i>
		                    <small>Error Message</small>
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="col-lg-5"></div>
						<div class="col-lg-7">
							<button type="submit" name="submit" class="button login-btn mt-2">Update</button>
						</div>
					</div>
					<div style="text-align:right">
						<p>By signing in, you agree to our
						<a href="others.php?show=terms" class="bot-link">terms and policies</a>.</p>
					</div>
				</form>
            	<script src="js/form-alt.js"></script>
			</div>
			<div class="col-lg-6">
				<img src="image/signup-model.jpg" class="img-fluid login-img-alt">
			</div>
		</div>
	</div>
</section>

<?php mysqli_close($conn); } else{ ?>
<section class="form my-4 mx-5">
	<div class="container">
		<div class="row no-gutters">
			<div class="col-lg-6 px-5 pt-5">
				<h4 class="font-weight-bold py-2" style="text-align:right">Register yourself<span class="keyword">.</span></h4>
				<form id="form" class="form" method="post" action="php/insert_user.php">
					<div class="form-row">
						<div class="col-lg-6">
							<div class="verify-form">
							<input type="text" id="fname" name="fname" placeholder="First Name" class="form-control my-1" required>
		                    <i class="fas fa-check-circle"></i>
		                    <i class="fas fa-exclamation-circle"></i>
		                    <small>Error Message</small>
		                	</div>
						</div>
						<div class="col-lg-6">
							<div class="verify-form">
							<input type="text" id="lname" name="lname" placeholder="Last Name" class="form-control my-1" required>
		                    <i class="fas fa-check-circle"></i>
		                    <i class="fas fa-exclamation-circle"></i>
		                    <small>Error Message</small>
		                	</div>
						</div>
					</div>
					<div class="form-row">
						<div class="col-lg-6">
							<div class="verify-form">
							<input type="text" id="phone" name="phone" placeholder="Phone" class="form-control my-1" required>
		                    <i class="fas fa-check-circle"></i>
		                    <i class="fas fa-exclamation-circle"></i>
		                    <small>Error Message</small>
		                	</div>
						</div>
						<div class="col-lg-6">
							<div class="verify-form">
							<input type="text" id="address" name="address" placeholder="Address" class="form-control my-1" required>
		                    <i class="fas fa-check-circle"></i>
		                    <i class="fas fa-exclamation-circle"></i>
		                    <small>Error Message</small>
		                	</div>
						</div>
					</div>
					<div class="form-row">
						<div class="col-lg-4"></div>
						<div class="col-lg-8">
						<div class="verify-form">
							<input type="email" id="email" name="email" placeholder="Email" class="form-control my-1" required>
		                    <i class="fas fa-check-circle"></i>
		                    <i class="fas fa-exclamation-circle"></i>
		                    <small>Error Message</small>
						</div>
						</div>
					</div>
					<div class="form-row">
						<div class="col-lg-4"></div>
						<div class="col-lg-8">
							<div class="verify-form">
							<input type="password" id="password" name="password" placeholder="Password" class="form-control my-1" required>
		                    <i class="fas fa-check-circle"></i>
		                    <i class="fas fa-exclamation-circle"></i>
		                    <small>Error Message</small>
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="col-lg-4"></div>
						<div class="col-lg-8">
							<div class="verify-form">
							<input type="password" id="repassword" name="repassword" placeholder="Confirm Password" class="form-control my-1" required>
		                    <i class="fas fa-check-circle"></i>
		                    <i class="fas fa-exclamation-circle"></i>
		                    <small>Error Message</small>
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="col-lg-5"></div>
						<div class="col-lg-7">
							<button type="submit" class="button login-btn mt-2">Sign Up</button>
						</div>
					</div>
					<div style="text-align:right">
						<p>By signing in, you agree to our
						<a href="others.php?show=terms" class="bot-link">terms and policies</a>.</p>
					</div>
				</form>
            	<script src="js/form.js"></script>
			</div>
			<div class="col-lg-6">
				<img src="image/signup-model.jpg" class="img-fluid login-img-alt">
			</div>
		</div>
	</div>
</section>

<?php } ?>
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

