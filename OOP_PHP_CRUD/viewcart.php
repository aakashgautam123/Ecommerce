<?php
session_start();

$connection = mysqli_connect('localhost','root','','sunrise');
$total = count($_SESSION['products_id']);
$i = 0;
$query = "SELECT * FROM products WHERE product_id IN (";
foreach($_SESSION['products_id'] as $key=>$value)
{	

	if(++$i == $total )
	{
		$query .= $value.')';
	}
	else
	{
		$query .= $value.',';
	}
}

$result = mysqli_query($connection,$query);

$cart_items = array();

while($object  = mysqli_fetch_object($result))

{
	array_push($cart_items,$object);

	

}





?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style type="text/css">
	body
	{
		font-family: helvetica;
	}
		table
		{
			width: 80%;
			background-color: white;
			font-family: helvetica;
			text-align: justify;
			border:1px solid #DEDEDE;
		}
		body
		{
			background-color: #F7F7F7;
		}
	
		#total
		{
			height: 400px;
			width: 300px;
			border:1px solid #DEDEDE;
			position: relative;
			left: 910px;
		}

	
	</style>
</head>
<body>
	<h2>CART</h2>
	<center>
<table>
	<tr id="heading">
		<th>Item</th>
		<th>Quantity</th>
		<th>Unit Price</th>
		<th>Sub Total</th>
	</tr>

	<?php


	for($i=0;$i<count($cart_items);$i++)
	{
		
		?>
			<tr style="text-align: justify;">
				<td><img src="<?=  $cart_items[$i]->product_image;  ?>" height="100" width="100"><?= $cart_items[$i]->product_name;   ?></td>
				<td>
					<form>
					<select onchange="updatetotal(<?php echo $cart_items[$i]->product_id; ?>,<?php echo $cart_items[$i]->product_price; ?>)">
					<option value="1">1</option>
						<option value="2">2</option>
							<option value="3">3</option>
								<option value="4">4</option>

				</select>
			</form>
			</td>
				<td><?= $cart_items[$i]->product_price;  ?></td>
				<td id="<?=  $cart_items[$i]->product_id;  ?>" class="prices"> 
                   
					<?= $cart_items[$i]->product_price;  ?>
					
				</td>
			</tr>
		<?php
		
	}

	?>
</table>

</center>
<div id="total">
	<div>
		<span style="font-size:18px;color:red;font-weight:bold">Total:</span>
		<h4 id="totalamount"></h4>
	</div>

	<a href="order.php" style="color:white;background:green;border: 1px solid green;padding:10px;margin-top:100px;">Proceed To Checkout</a><br><br>
	<a href="shop.php" style="width:120px;height:30px;padding:10px;background-color:blue
	;color:white;text-decoration: none;margin-left:100px;box-shadow:4px 4px 5px grey;">Continue Shopping</a>
	
</div>


<script type="text/javascript">
	function updatetotal(productid,productprice)
	{
		var amt = event.target.value;
		//console.log(productid);
		var product_id = productid;
		var xhr = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	    xhr.open('GET', "updatequantity.php?quan="+amt+"&id="+productid+"&price="+productprice);
	    xhr.onreadystatechange = function() {
	        if (xhr.readyState>3 && xhr.status==200) {
	        	document.getElementById(productid).innerHTML = xhr.responseText;	
	        	var prices = document.getElementsByClassName('prices');
	        	console.log(prices);
	        	total = 0;
	        	for(i=0;i<prices.length;i++)
	        	{
	        	total = total + parseInt(prices[i].innerText);
	        	}
	        	document.getElementById('totalamount').innerHTML = total;

	        }
	    };
	    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest');
	    xhr.send();
	}
</script>
</body>
</html>


