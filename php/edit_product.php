<?php
	include 'conn.php';
	$prod_code=$_POST['prod_code'];
	$prodn=$_POST['prod_name'];
	$prod_name=str_replace("'","\'",$prodn);
	$color=$_POST['color'];
	$marked_price=$_POST['marked_price'];
	$offer_price=$_POST['offer_price'];
	$desc=$_POST['description'];
	$description=str_replace("'","\'",$desc);
	$tags=$_POST['tags'];
	$stock=$_POST['stock'];
	$success=true;
	if($stock==0){
		$out_of_stock=1;
	}
	else{
		$out_of_stock=0;
	}
	$sql="update products set prod_name='$prod_name',color='$color',marked_price=$marked_price,offer_price=$offer_price,description='$description',tags='$tags',stock='$stock',out_of_stock=$out_of_stock where prod_code=".$prod_code;
	$res=mysqli_query($conn,$sql);
	if($res){
		if(isset($_FILES['image'])){
			if($_FILES['image']['type']=="image/jpeg" || $_FILES['image']['type']=="image/jpg"){
				move_uploaded_file($_FILES['image']['tmp_name'],"../image/products/".$prod_code.".jpg");
			}
			else{
				$success=false;
			}
		}
		if(isset($_FILES['image2'])){
			if($_FILES['image2']['type']=="image/jpeg" || $_FILES['image2']['type']=="image/jpg"){
				move_uploaded_file($_FILES['image2']['tmp_name'],"../image/products/".$prod_code."b.jpg");
			}
			else{
				$success=false;
			}
		}
		if(isset($_FILES['image3'])){
			if($_FILES['image3']['type']=="image/jpeg" || $_FILES['image3']['type']=="image/jpg"){
				move_uploaded_file($_FILES['image3']['tmp_name'],"../image/products/".$prod_code."c.jpg");
			}
			else{
				$success=false;
			}
		}
		mysqli_close($conn);
	}
	if($success==true){
		header('location:../admin.php?display=edit&task=successful_updation');
	}
	else{
		header('location:../admin.php?display=edit&task=unsuccessful_insertion');
	}
?>