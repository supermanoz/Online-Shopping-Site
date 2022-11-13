<?php
	session_start();
	//require_once __DIR__ . '/vendor/autoload.php';
	//$mpdf = new \Mpdf\Mpdf();
	include "php/conn.php";
	$user_id=$_GET["user_id"];
	$bill_no=$_GET["bill_no"];
	if($user_id==$_SESSION['user_id'] || $_SESSION['user_id']==1){
	$data='
<html>
	<head>
		<title>Bill - Everest Fashion Hub</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
		<link href="css/bill-style.css" rel="stylesheet">
		<script src="https://use.fontawesome.com/releases/v5.14.0/js/all.js"></script>
	</head>
	<body>
		<div class="container-fluid" id="printableElement">
			<div class="row top">
				<div class="col-4">
					<img src="image/logo.png" class="logo height="100px" width="100px" img-fluid">
				</div>
				<div class="col-8">
					<h1 class="logo-text">Everest Fashion Hub<span class="keyword">.</span></h1>
 					<p> Phone: +977 986-008-1869 </p>
 					<p> weverestfc@gmail.com </p>
 					<p> Kathmandu-05, Nepal </p>	
				</div>
			</div>';
?>
			<?php
				$sql="select * from users where is_blocked=0 and user_id=".$user_id;
				$res=mysqli_query($conn,$sql);
				$row=mysqli_fetch_assoc($res);
				date_default_timezone_set('Asia/Kathmandu');
				$date = date('d-m-y');
			?>
			<?php $data.='<div class="row body">
				<div class="col-6">
					<h6 class="mt-4">Bill To:</h6>
					<p class="my-1">Name: <em>'.$row["fname"].' '.$row["lname"].'</em></p>
					<p>Phone: <em>'.$row["phone"].'</em></p>
					<p style="margin-top:-0.8em">Email: <em>'.$row["email"].'</em></p>
				</div>
				<div class="col-6 date my-4">
					<h6>Bill No: '.$bill_no.'</h6>
					<p class="my-1">Date: <em>'.$date.'</em></p>
					<p>Address: <em>'.$row["address"].'</em></p>
					<button onClick="printBill()" class="btn btn-light"><i class="fas fa-print"></i></button>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<table class="table">
					  <thead class="thead-dark">
					    <tr class="text-center">
					      <th scope="col">#</th>
					      <th scope="col">Product Name</th>
					      <th scope="col">Size</th>
					      <th scope="col">Qty</th>
					      <th scope="col">Price</th>
					      <th scope="col">Line Total</th>
					    </tr>
					  </thead>
					  <tbody>';
					  ?>
					  	<?php
					  		$sql1="select carts.qty,carts.size,products.prod_name,products.offer_price FROM orders JOIN carts ON carts.cart_id=orders.cart_id JOIN products ON carts.prod_code=products.prod_code WHERE bill_no=$bill_no AND user_id=".$user_id;
					  		$res1=mysqli_query($conn,$sql1);
					  		$sn=1;
					  		$subtotal=0;
					  		if(mysqli_num_rows($res1)>0){
					  			while($row1=mysqli_fetch_assoc($res1))
					  			{
					  				$subtotal=$subtotal+($row1["qty"]*$row1["offer_price"]);
					  				?>
					  				<?php $data.='
					  				<tr class="text-center"><th scope="row">'.$sn.'</th><td>'.$row1["prod_name"].'</td><td>'.$row1["size"].'</td><td>'.$row1["qty"].'</td><td>Rs. '.$row1["offer_price"].'</td><td>Rs. '.$row1["qty"]*$row1["offer_price"].'</td></tr>';

					  				$sn++;
					  				}
					  				?>
					  				<?php
					  				$data.='
					      			<tr><td colspan="4"></td><th scope="row" style="text-align:right">Subtotal</th><td  class="text-center">Rs. '.$subtotal.'</td></tr>
					      			<tr><td colspan="4"></td><th scope="row" style="text-align:right">Discount</th><td  class="text-center">Rs. - </td></tr>
					      			<tr><td colspan="4"></td><th scope="row" style="text-align:right">Shipment Charge</th><td  class="text-center">Rs. 100 </td></tr>
					      			<tr><td colspan="4"></td><th scope="row" style="text-align:right">Total Due</th><td  class="text-center">Rs. '.($subtotal+100).'</td></tr>';
					      		?>
					  			
					  	<?php
					  		}
					  		mysqli_close($conn);
					  	?>
					  	<?php
					  	$data.='
					  </tbody>
					</table>
				</div>
			</div>
			<div class="row top">
				<div class="col">
					<p class="text-center bot-text">Thank you for your business<span class="keyword">!</span></p>
				</div>
			</div>
		</div>
	</body>
</html>';
}
else{
	$data="<h3>Unauthorized Access Denied!</h3>";
}
?>

<?php
	//$mpdf->WriteHTML($data);
	//$mpdf->Output('bill.pdf','D');
	echo $data;
?>

 <script type="text/javascript">
 	function printBill(){		
       var divToPrint = document.getElementById('printableElement');
       var popupWin = window.open('', '_blank', 'width=900,height=600');
       popupWin.document.open();
       popupWin.document.write('<html><head><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"><link href="css/bill-style.css" rel="stylesheet"></head><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
       popupWin.document.close();
 	}
 </script>