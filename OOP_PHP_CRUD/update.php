<?php
include 'product.php';
include 'process.php';
include 'file.php';
$id = $_POST['product_id'];
	$dbedit = new Database();
	$prod = new Product();
	$prod->product_name = $_POST['product_name'];
	$prod->product_category = $_POST['category'];
	$prod->product_price = $_POST['product_price'];
	$prod->product_desc = $_POST['product_desc'];

	if($_FILES['product_image']['size'] > 0 )
	{
		
	echo $prod->product_image = 'public/images/'.$_FILES['product_image']['name'];
	$temp = $_FILES['product_image'];

	$file = new File();
	$file->upload($temp);
	}
	else
	{

		 echo $prod->product_image  = $_POST['old_image'];
	

	}
	
	

	$dbedit::update($prod,$id);
	header('Location:dashboard.php?parameter=editproduct');