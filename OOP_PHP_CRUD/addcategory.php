<?php
include 'process.php';
include 'category.php';
if(isset($_POST['submitcategory']))
{
$cat_name = $_POST['category'];

$new = new Database();
$cat = new Category();
$cat->cat_name = $cat_name;


$new->insert($cat);
header('Location:dashboard.php?parameter=addproduct');

}