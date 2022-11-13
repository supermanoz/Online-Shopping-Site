<?php
	$key=$_POST['search_item'];
	$keyword="%".$key."%";
	header('location:../search.php?keyword='.$keyword);
?>