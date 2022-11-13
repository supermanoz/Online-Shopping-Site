<?php session_start(); 
	if(isset($_SESSION['user_id'])){
		header('location:index.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login - Everest Fashion Hub</title>	
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
	if(isset($_SESSION['user_id']))
	{
		header('location:index.php');
	}

  if(isset($_GET['task']))
  {
    if($_GET['task']=="unsuccessful_carting")
    {
?>
  <script language="javascript">
      swal({
        title: "Couldn't Add to Cart!",
        text: "You must login first.",
        icon: "error",
        button: "Okay",
        timer:3000
      });
  </script>
<?php
 	 }
 	 else if($_GET['task']=="successful_signup")
 	 {
?>
  <script language="javascript">
      swal({
        title: "Account Activated!",
        text: "Use your credentials to login.",
        icon: "success",
        button: "Okay",
        timer:10000
      });
  </script>
<?php
 	 }
 	 else if($_GET['task']=="unsuccessful_login"){
 	 	?>
  <script language="javascript">
      swal({
        title: "Login Failed!",
        text: "Please enter correct credentials.",
        icon: "error",
        button: "Okay",
        timer:10000
      });
  </script>	 	
<?php
 	 }
 	 else if($_GET['task']=="successful_update"){
 	 	?>
 	<script language="javascript">
      swal({
        title: "Details Updated!",
        text: "Please re-login to your account.",
        icon: "success",
        button: "Okay",
        timer:10000
      });
  </script>	 	
<?php
		}
		else{}
	}
?>

<!-- Navigation-->
<?php include 'php/navigation.php'; ?>

<?php
	if(isset($_GET['user'])){
		$user=$_GET['user'];
	}
	else{
		$user="";
	}
	if($user=="admin")
	{

?>

<section class="form my-4 mx-5">
	<div class="container">
		<div class="row no-gutters">
			<div class="col-lg-2"></div>
			<div class="col-lg-5">
				<img src="image/login-model.jpg" class="img-fluid login-img">
			</div>
			<div class="col-lg-5 px-5 pt-5">
				<h4 class="font-weight-bold py-2">Admin account<span class="keyword">.</span></h4>
				<form method="post" action="php/login.php">
					<div class="form-row">
						<div class="col-lg-8">
							<input type="email" name="email" placeholder="Email" class="form-control my-1" required>
						</div>
					</div>
					<div class="form-row">
						<div class="col-lg-8">
							<input type="password" name="password" placeholder="Password" class="form-control my-1" required>
						</div>
					</div>
					<div class="form-row">
						<div class="col-lg-8">
							<button type="submit" class="button login-btn mt-3 mb-5">Login</button>
						</div>
					</div>
					Not an Admin?
					<p><a href="login.php" class="bot-link">Customer Login</a></p>
				</form>
			</div>
		</div>
	</div>
</section>

<?php
	} else{
?>
<section class="form my-4 mx-5">
	<div class="container">
		<div class="row no-gutters">
			<div class="col-lg-2"></div>
			<div class="col-lg-5">
				<img src="image/login-model.jpg" class="img-fluid login-img">
			</div>
			<div class="col-lg-5 px-5 pt-5">
				<h4 class="font-weight-bold py-2">Sign into your account<span class="keyword">.</span></h4>
				<form method="post" action="php/login.php">
					<div class="form-row">
						<div class="col-lg-7">
							<input type="email" name="email" placeholder="Email" class="form-control my-1" required>
						</div>
					</div>
					<div class="form-row">
						<div class="col-lg-7">
							<input type="password" name="password" placeholder="Password" class="form-control my-1" required>
						</div>
					</div>
					<div class="form-row">
						<div class="col-lg-7">
							<button type="submit" class="button login-btn mt-3 mb-5">Login</button>
						</div>
					</div>
					Don't have an account?
					<p><a href="signup.php" class="bot-link">Register Here</a></p>
				</form>
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

