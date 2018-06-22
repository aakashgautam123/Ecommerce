<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action = "select.php" method="POST">
	<select name='gender'>
		<option value="m">Male</option>
		<option value ="f">Female</option>
	</select>
	<input type="submit" name="submit">
</form>
</body>
</html>

<?php

if(isset($_POST['submit']))
{
	echo $_POST['gender'];

}



?>