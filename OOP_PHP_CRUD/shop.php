<?php
include 'process.php';


$shop = new Database();

$products = $shop::all('products');








?>

<!DOCTYPE html>
<html>
<head>
	<title>Gadgets 4 U</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
		.product
		{
			height:300px;
			width: 200px;
			border:1px solid black;
			display: inline-block;
			margin:20px;
		}
		img
		{
			width:200px;
			height:200px;
			object-fit: cover;
		}
		.addtocart
		{
			height: 30px;
			width: 120px;
			background-color: blue;
			color: white;
			text-align: center;
			line-height: 30px;
			margin-left: 40px;
		}
		.product a
		{
			color:white;
			text-decoration: none;
			font-size: 18px;
			font-family: helvetica;
		}
		.icon_cart
		{
			position: relative;
			left: 900px;
		}

	</style>
</head>
<body>
<div id="main_container">
	<div class="icon_cart"><a href="viewcart.php" style="color:black;text-decoration:none;font-family: helvetica;"><i class="fa fa-shopping-cart" style="font-size:48px;color:#ff5252"></i>View Cart</a></div>
	<?php

	foreach($products as $product)
	{

		?>


			<div class="product">
				<div class="image">
				<img src="<?php  echo $product->product_image;     ?>">
			</div>
			<div class="product_name">
				<?php  echo $product->product_name; 
				echo '<br>';
				echo 'NRS '.$product->product_price;

				 ?>

			</div>
			<div class="addtocart">
				<a href="addtocart.php?id=<?php echo $product->product_id; ?>" >Add to Cart  </a>
			</div>
			</div>

		<?php


	}
	
	
     ?>
</div>
</body>
</html>