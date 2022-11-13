<nav class="navbar navbar-expand-sm navbar-dark shadow-5-strong gradient-navbar sticky-top">
	<div class="container-fluid">
		<a class="navbar-brand" href="index.php"> <img class="logo" src="image/logo.png"> </a>
		<h1 class="logo-text"><a href="index.php">Everest Fashion<span>.</span></a></h1>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
			<span class="navbar-toggler-icon"> </span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav ml-auto">
				<?php if(isset($_SESSION['user_id'])){ ?>
				<li class="nav-active"><a class="nav-link" href="cart.php?user=<?php echo $_SESSION['user_id']; ?>"> Track Order </a></li>
				<li class="nav-active dropdown"><a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#" id="navbarDropdown"><?php echo $_SESSION['fname']; ?><img src="image/user.png" class="img-fluid admin-pic"></a>
	       			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
	       				<a class="dropdown-item" href="signup.php">Edit Details</a>
	      				<a class="dropdown-item" href="php/logout.php">Logout</a>
	       			</div>
         		</li>
         		<?php } else{ ?>	
				<li class="nav-active"><a class="nav-link" href="signup.php"> Sign Up  </a></li>
				<li class="nav-active"><a class="nav-link" href="login.php"> Login </a></li>
				<?php } ?>
				<li class="nav-item">
					<form action="php/search.php" method="post">
						<input type="text" name="search_item" class="search-form-alt" placeholder=" Search...">
						<button class="btn btn-outline-light btn-sm" type="submit"><i class="fas fa-search icon"></i></button>
					</form>
				</li>
			</ul>
		</div>
	</div>
</nav>