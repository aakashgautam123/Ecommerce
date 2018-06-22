<?php
session_start();




if(empty($_SESSION['products_id']))

{
	$_SESSION['products_id'] = array();
	$_SESSION['products_quantity'] = array();
}
array_push($_SESSION['products_id'],$_GET['id']);
array_push($_SESSION['products_quantity'],1);



header('Location: shop.php');






?>
