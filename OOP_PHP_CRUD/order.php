<?php 
session_start();
include 'process.php';

include 'orders.php';

$database = new Database();
$orderdata = new orders();

$userid = 3;


for($i = 0; $i < count($_SESSION['products_id']); $i++) {
	$prod = $database::find('products',$_SESSION['products_id'][$i],'product_id');
	$eachprice = $prod->product_price;
	$prodcut_id = $_SESSION['products_id'][$i];
	 $quan = $_SESSION['products_quantity'][$i];

	$orderdata->user_id = $userid;
	$orderdata->product_id = $prodcut_id;
    $orderdata->product_quantity =  $quan;
    $orderdata->subtotal_price = $eachprice*$quan;
	$orderdata->product_date = date('Y-m-d');

	$database->insert($orderdata);

}

