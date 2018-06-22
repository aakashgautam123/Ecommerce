<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
	*{
		font-family: helvetica;
	}
		input[type='email']{
			width: 300px;
			height: 40px;
			display: inline-block;
			border-radius: 4px;
			border:2px solid #aaa;
		}
		input[type='submit']
		{
			height: 40px;
			width: 100px;
			border-radius: 4px;

		}
		#title{
			font-size: 24px;
			color:blue;
		}
		#box
		{
			
			width: 600px;
			position: absolute;
			top:50%;
			left: 50%;
			transform: translate(-50%,-50%);
		}
		p
		{
			font-family: helvetica;
			color:#aaa;
			font-weight: lighter;
			margin-top:50px;
		}
	</style>
	<title></title>
</head>
<body>
	
<center>
	<div id="box">
		<img src="public/images/download.png">
	<h2>Forgot Your Password ?</h2>
	<form action="sendcode.php" method="post">
	 
	<input type="email" name="useremail" autofocus="yes" placeholder="Email address" required="required">
	<input type="submit" name="submit" value="sendcode">
	<div class="g-recaptcha" data-sitekey="6LevDl0UAAAAABXYZTc3BOelwjoTRDefl8omNtVJ"></div>
</form>
<p>Locked out? We will send you instruction to reset your  password .</p>
</div>
</center>
<script src='https://www.google.com/recaptcha/api.js'></script>
</body>
</html>



