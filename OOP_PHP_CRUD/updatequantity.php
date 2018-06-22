<?php session_start(); ?>
<?php 
	$productquantity = $_GET['quan'];
	$productid = $_GET['id'];
	$productprice = $_GET['price'];

	$index = array_search($productid, $_SESSION['products_id']);

	$_SESSION['products_quantity'][$index] = $productquantity;
	echo $total = $productprice * $_SESSION['products_quantity'][$index];


 ?>