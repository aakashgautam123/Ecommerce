<?php
session_start();
if(!isset($_SESSION['valid']))
{
	header('Location:index.php');
}
include 'process.php';
include 'product.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>DashBoard</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
	 
		
		*

		{
			margin:0px;
			padding: 0px;
			box-sizing: border-box;
		}
		#container
		{
			width:100%; 
			height:100vh;
			

		}
		#sidebar
		{
			width:20%; 
			height:100vh;
			
			float: left;
			background-color: #0a6f75;
		}
		#image
		{
			text-align: center;
			margin-bottom: 20px;
		}
		#image img

		{
			border-radius: 50%;
		}

		#imagetitle	
		{

		}
		#show_case

		{
			width: 80%;
			height: 100vh;
			
			float: right;
		}
		#main_show
		{

		}
		#topbar
		{
			height: 70px;
			width: 100%;
			
			background-color:#2cabb2;	
			text-align: center;
			color:white;
			font-family: helvetica;
		}
		#topbar h2
		{
			line-height: 70px;
		}
		#menus

		{
			text-align: center;
		}
		#menus ul
		{
			list-style: none;
		}
		#menus ul li
		{
			font-size: 16px;
			font-family: helvetica;
			height: 60px;
			color: #aaa;
			padding: 20px;
			border-bottom: 2px solid white;
			background-color:#0a6f75;
			color:white;

		}
		#menus ul li:hover
		{
			color: purple;
			cursor: pointer;
		}
		#imagetitle
		{
			font-size: 16px;
			font-family: helvetica;
			color: #aaa;
		}
		
		

		#num_products
		{
			
			background-color: #f45042;
			color:white;
			border:1px solid red;
			border-radius: 2px;
			font-size: 18px;

		}
		input,textarea,select
		{
			display:block;
			margin:20px;
		}
		input,select
		{
			width: 300px;
			height: 40px;

		}
		input[type='submit']
		{
			background-color: #42d4f4;
			color:white;
			border:1px solid #42d4f4;
			border-radius: 8px;
			font-weight: bold;
		}
		input[placeholder],
		{
			font-weight: bold;

		}
		textarea:focus
		{
			box-shadow:0px 4px 10px #42d4f4;
			outline: none;
			border:transparent;
			z-index: 1;
		}
		input:focus
		{
			box-shadow:0px 4px 10px #42d4f4;
			outline: none;
			border:transparent;
			z-index: 1;
		}
		a

		{
			color: white;
			text-decoration:none;

		}
		a:hover
		{
			color: purple;
		}
		
		table
		{
			height: auto;
			width: 75%;
			margin:0 auto;


		}
		.edit
		{
			border:1px solid #0e1168;
			color: white;
			background: #0e1168;
			padding: 10px;
			border-radius: 4px;


		}
		.delete
		{
			border:1px solid #ff5252;
			color: white;
			background: #ff5252;
			padding: 10px;
			border-radius: 4px;
		}
		.heading


		{
			color:#0e1168;
			font-weight: bold;
			font-family: helvetica;
		}
		td{
			color:black;
			font-size: 16px;
			font-family: helvetica;


		}
		.thumbnail

		{

    border: 1px solid #ddd; /* Gray border */
    border-radius: 4px;  /* Rounded border */
    padding: 5px; /* Some padding */
    
		}
		.thumbnail:hover
		{
			box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
		}
		td,tr
		{
			font-family:helvetica;
		}
		

		

	</style>
</head>
<body>
	 
	 <div id="container">
	 		
	 		<div id="sidebar">
	 			<div id="image">
	 				<img src="public/images/admin.png" height="100" width="100">
	 				<div id="imagetitle">
	 					<span style="color:black;">Aakash Gautam</span><br>
	 					Admin
	 				</div>
	 			</div>

	 			<div id="menus">
	 				<ul>
	 					<i class="fas fa-pencil" id="pencil"></i>
	 					<li><a href="dashboard.php?parameter=addproduct">Add Products</a></li>
	 					<li><a href="dashboard.php?parameter=editproduct">Edit Product
	 						&nbsp;&nbsp;
	 						<span  style=" display:inline-block;color:white; background-color:#0e1168;width: 30px;border-radius: 3px;">
	 						<?php  
	 						 $db = new Database();

	 						 echo $db::num_rows('products'); 

	 						 ?>
	 						</span>
	 					</a>
	 					</li>
	 					<li><a href="dashboard.php?parameter=addcategory">Add Category </a></li>
	 					<li><a href="dashboard.php?parameter=vieworders">View Orders</a></li>
	 					<li><a href="dashboard.php?parameter=salesanalysis">Sales Analytics</a></li>
	 					<li><a href="logout.php">Logout</a></li>
	 					
	 				</ul>
	 			</div>

	 		</div>

	 		<div id="show_case">
	 			<div id="topbar">
	 				<h2>ADMIN DASHBOARD</h2>
	 			</div>
	 			<div id="main_show">
	 				<?php 

	 			if(isset($_GET['parameter']))
	 			{
	 				$parameter = $_GET['parameter'];

                     	if($parameter == 'addproduct')
                     	{
                     		?>
                     			<h2 style="color:black;font-family: helvetica;margin-left:40px;margin-top:10px;">Add Product</h2>
                     			<form action="dashboard.php" method="POST"  autocomplete="off" enctype="multipart/form-data">
                     				<input type="text" name="product_name" placeholder="Enter Prdduct name" required="required">
                     				<select name ="category">
                     					<?php   $objnew = new Database();
                     							$categories =  $objnew::all('category');

                     							
                     							foreach($categories as $category)
                     							{
                     								?>
                     									<option value="<?=  $category->cat_name;   ?>"><?=  $category->cat_name;   ?></option>
                     								<?php

                     							}

                     					   ?>
                     					<option value=""></option>
                     				

                     				</select>
                     				<input type="number"  name="product_price" placeholder="Enter Price in Rs." required="required" id="price">
                     				<textarea name="desc" rows="10" cols="40" placeholder="Write something about Product" required="required"></textarea>
                     				<input type="file" name="image" required="required">
                     				<input type="submit" name="submit" value="Add Product">
                     			</form>

                     		<?php
                     	} 
                     	elseif($parameter ==  'editproduct')
	 					{

	 				
	 				$db = new Database();
	 			    $products = $db::all('products');
	 			    ?>
	 			    <table>



	 			    	<tr>
	 			    		<td class="heading">Product_ID</td>
	 			    		<td class="heading" >Product_Name</td>
	 			    		<td class="heading">Product_Price</td>
	 			    		<td class="heading">Product_Image</td>
	 			    		<td class="heading">Actions</td>
	 			    	</tr>

	 			    <?php
	 			    foreach($products as $product)
	 			    {
	 			    	?>
	 			    		<tr>
	 			    			<td><?php echo $product->product_name; ?></td>
	 			    			<td><?php echo $product->product_category; ?></td>
	 			    			<td><?php echo $product->product_price
	 			    			; ?></td>
	 			    			<td><img class="thumbnail" src="<?php echo $product->product_image;?>" height="100" width="100"></td>
	 			    			<td ><a href="dashboard.php?edit=<?php echo  $product->product_id;  ?>" class="edit">Edit <i class="fa fa-pencil"></i></a></td>
	 			    			<td ><a href="dashboard.php?delete=<?php echo $product->product_id; ?>" class="delete"><i class="fa fa-trash"></i> Delete</a></td>

	 			    		</tr>

	 			    	<?php
	 			    }

	 					}
	 					elseif($parameter == 'addcategory')
	 					{
	 						?>

	 							<form action="addcategory.php" method="POST">
	 								<input type="text" name="category" placeholder="Add New Category" required="required">
	 								<input type="submit" name="submitcategory" value="Add Category">
	 							</form>

	 						<?php
	 					}
	 					elseif($parameter == 'vieworders')
	 					{		
	 						$orders = new Database();
	 						$totalorders = $orders::all('orders');
	 						?>		<h2 style="font-family:helvetica;color:brown;">Filter By</h2>
	 								<select name="filter">
	 									<option>Latest Date</option>
	 									<option>Maximum Order Price</option>
	 									<option>Oldest Orders</option>
	 								</select>
	 							<table style="text-align:justify;padding:10px;">	
	 								<tr>
	 									<th>Order ID</th>
	 									<th>User ID</th>
	 									<th>Product ID</th>
	 									
	 									<th>Ordered Date</th>
	 									<th>Product Quantity</th>
	 									<th>Order Status</th>
	 									<th>Actions</th>
	 								</tr>

	 						<?php
	 						foreach($totalorders as $order)

	 						{
	 							?>
	 								<tr style="height:60px;">
	 									<td><?=   $order->order_id;   ?></td>
	 									<td><?=   $order->user_id;   ?></td>
	 									<td><?=   $order->product_id;   ?></td>
	 									<td><?=   $order->product_date;   ?></td>
	 									<td><?=   $order->product_quantity;   ?></td>
	 									<td><?=   $order->order_status; ?></td>
	 									<td ><a href="dashboard.php?approveorder=<?php echo  $order->order_id;  ?>" class="edit">Approve
	 			    					<td ><a href="dashboard.php?cancelorder=<?php echo $order->order_id; ?>" class="delete"><i class="fa fa-trash"></i> Cancel</a></td>
	 								</tr>

	 							<?php
	 						}
	 						?>
	 								</table>
	 						<?php
	 					}
	 					elseif($parameter == 'salesanalysis')
	 					{
	 						$object = new Database();
	 						$totalsales = $object::num_rows('orders');
	 						$revenue = $object::sum('subtotal_price','orders');

	 						?>
	 							<div id="top">
		<div id="revenue">

			<img src="https://png.icons8.com/android/50/000000/fund-accounting.png"><p class="vertical">REVENUE<br><?=  $revenue['SUM(subtotal_price)'];  ?></p><br>
		</div>
		<div id="sales">
			<img src="https://png.icons8.com/android/50/000000/checkout.png"><p class="vertical">SALES<br><?= $totalsales;    ?></p>
			
		</div>
		<div id="neworder">
			<img src="https://png.icons8.com/android/40/000000/purchase-order.png"><p class="vertical">TODAY ORDERS<br> </p>
			
		</div>
		<div id="visits">
			<img src="https://png.icons8.com/android/40/000000/business-contact.png"><p class="vertical">VISITS<br> 2000</p>
			
		</div>
	</div>
								<?php
									$date = new Database();
									$res = $date::ordergroup();
									$labels = array();
									$data = array();
									
									for($i=0; $i<count($res);$i++)
									{

										array_push($labels,$res[$i]['EXTRACT(YEAR_MONTH FROM product_date)']);
										array_push($data,$res[$i]['COUNT(product_id)']);
									}
									
									$encoded = json_encode($data,JSON_NUMERIC_CHECK);
									$encodedlabels = json_encode($labels);


								?>
	 							<div id="chartcontainer">

										<h3 style="font-family:helvetica;">Monthly Sales</h3>
										<canvas id="linechart" width="300" height="200" >
			
										</canvas>
								</div>
	 						<?php


	 					}
	 				


	 				
	 			}
	 			
	 			?>
	 			</div>
	 		</div>


	 </div>

 
 		 
 	
<script type="text/javascript">
	var can = document.getElementById('linechart').getContext('2d');
	let chart = new Chart(can,{
	  type: 'line',
    data: {
        labels: <?php  echo $encodedlabels;  ?>,
        datasets: [{
            label: 'Monthly Sales Analysis',
            data: <?php  echo $encoded;   ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
   
	});

</script>
</body>
</html>


<?php



if(isset($_POST['submit']))
{	

	include 'file.php';
	$db = new Database();
	$product = new products();
	$file = new File();
	$product->product_name = htmlspecialchars($_POST['product_name']);

	$product->product_category = htmlspecialchars($_POST['category']);
	$product->product_desc = htmlspecialchars($_POST['desc']);
	$product->product_image =  'public/images/'.$_FILES['image']['name'];
	
	$file->upload($_FILES['image']);
	if(filter_var(htmlspecialchars($_POST['product_price']),FILTER_VALIDATE_INT))
	{
		$product->product_price = $_POST['product_price'];
		$message = $db->insert($product);
		
	}
	else
	{
	
		header('Location:dashboard.php?parameter=addproduct');
		
	}
	


	




}
elseif(isset($_GET['edit']))

{
	// $id = $_GET['edit'];
	// $dbedit = new Database();
	// $prod = new Product();
	// $prod->product_name = 'HP';
	// $prod->product_category = 'Laptop';
	// $prod->product_price = 1000;
	// $prod->product_desc = 'BAD';
	// $prod->product_image = 'images/new.jpg';

	// $dbedit::update($prod,$id);
	$dbedit = new  Database();
	$id = $_GET['edit'];
	$result = $dbedit::find('products',$id,'product_id');
	

	?>
<script type="text/javascript">
	var title = document.createElement('h1');
	title.innerHTML = 'Edit Post';
	document.getElementById('show_case').appendChild(title);
	var form = document.createElement('form');
	form.action = "update.php";
	form.method = "post"
	form.enctype = "multipart/form-data";
	image = document.createElement('input');
	image.name = 'old_image';
	image.type='hidden';
	image.value = <?php echo json_encode($result->product_image); ?>;
	postid = document.createElement('input');
	postid.name = 'product_id';
	postid.type = 'hidden';
	postid.value = <?php  echo json_encode($_GET['edit']) ;      ?>

    
	inputbox = document.createElement('input');
	inputbox.name = "product_name";
	inputbox.value = <?php     echo json_encode($result->product_name);      ?>;

	var select = document.createElement('select');
	select.name = 'category';
	option = document.createElement('option');

	option.value = 'mobile';
	option.innerHTML = 'Mobile';
	select.appendChild(option);
	option1 = document.createElement('option');

	option1.value = 'electronics';
	option1.innerHTML = 'ELectronics';
	select.appendChild(option1);

	option2 = document.createElement('option');
	option2.value = 'Laptop';
	option2.innerHTML = 'Laptop';
	select.appendChild(option2);


	pricebox = document.createElement('input');
	pricebox.type = 'number';
	pricebox.name = "product_price";
	pricebox.value =  <?php     echo json_encode($result->product_price);      ?>;

	description = document.createElement('textarea');
	description.name = "product_desc";
	description.rows = 6;
	description.cols = 70;
	description.value =  <?php     echo json_encode($result->product_desc);      ?>

	file  = document.createElement('input');
	file.type  = 'file';
	file.name = 'product_image';




	button = document.createElement('input');

	button.type = 'submit';
	button.name = 'update'
	form.appendChild(postid);
	form.appendChild(inputbox);
	form.appendChild(description);


	form.appendChild(pricebox);
	
	form.appendChild(select);
	form.appendChild(file);

	form.appendChild(button);
	form.appendChild(image);


	document.getElementById('show_case').appendChild(form);

    

	
	
</script>


	<?php



}
elseif(isset($_GET['delete']))
{
	$id = $_GET['delete'];
	$db = new Database();
	$item = array(
		'product_id'=>$id,
		'table_name' => 'products'
	);
	$db::delete($item);

}
elseif(isset($_GET['approveorder']))
{
	include 'orders.php';
	$id = $_GET['approveorder'];
	$up = new Database();
	$result = $up::find('orders',$id,'order_id');
	

	$order = new orders();
	$order->user_id = $result->user_id;
	$order->product_id = $result->product_id;
	$order->product_quantity = $result->product_quantity;
	$order->product_date = $result->product_date;
	$order->subtotal_price = $result->subtotal_price;
	$order->order_status = 1;

	$up::update($order,$id,'order_id');
	header('Location: index.php');


}

elseif(isset($_GET['cancelorder']))
{

	$id = $_GET['cancelorder'];
	$obj = new Database();
	$query = "DELETE FROM orders WHERE order_id= $id";
	$obj->link->query($query);
}

?>






