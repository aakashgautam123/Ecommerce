<?php
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login System</title>
	<link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="public/css/style.css">

</head>
<body>
<div id="container">
	
<div id="cart">
	
</div>	
<div id="form">
	<div id="formarea">
		<form action="index.php" method="POST" autocomplete="off">
		<center></center>
		
		<label>Username</label>
		<input type="text" name="username" placeholder="Enter username" required="required">
		<label>Password:</label>
		<input type="Password" name="password" placeholder="Enter password" required="required">
		<input type="submit" name="submit" value="Login">
		<a href="reset.php">Forgot Password</a>

	</form>
	</div>
	
</div>


</div>



<script src="public/js/jquerymin.js"></script>

<script type="text/javascript">

</script>
</body>
</html>

<?php

date_default_timezone_set("Asia/Kathmandu");
if(isset($_POST['submit']))
{

	$connection = mysqli_connect('localhost','root','','sunrise');
	$username = $_POST['username'];
	$password = $_POST['password'];
	$query = "SELECT * FROM user WHERE username='$username' and userpassword='$password'";
	$res = mysqli_query($connection,$query);
	$count = mysqli_num_rows($res);
	if($count == 1)
	{
		$_SESSION['valid'] = 1;
		header('Location:dashboard.php');
	}

}





?>