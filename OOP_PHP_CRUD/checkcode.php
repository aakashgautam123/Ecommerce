<?php
$connection = mysqli_connect('localhost','root','','sunrise');
if(isset($_POST['submit']))
{

$pincode = $_POST['pincode'];
$email = $_POST['useremail'];

$query = "SELECT *  FROM user WHERE resetkey = '$pincode' and useremail = '$email'  ";
$res = mysqli_query($connection,$query);

if(mysqli_num_rows($res) == 1)
{

	?>


	<form action="checkcode.php" method="POST">
		<input type="hidden" name = "useremail" value="<?php  echo $email;   ?>" >
		<input type="text" name="password" placeholder="Enter New Password">
		<input type="password" name="confirmpass" placeholder="Confirm your Password" id="confirmpass">
		<input type="submit" name="updatepassword">

	</form>


	<?php

}






}
if(isset($_POST['updatepassword']))

{
	$password = $_POST['password'];
	$email = $_POST['useremail'];
	$confirmpass = $_POST['confirmpass'];

	 $query = "UPDATE user SET userpassword = '$password' WHERE useremail = '$email'";
	if($password == $confirmpass){
		$resultx = mysqli_query($connection,$query);
		if($resultx)
		{
			header('Location:  index.php');
		}

	}
	else{
		
		?>

		<form action="checkcode.php" method="POST">
		<input type="hidden" name = "useremail" value="<?php  echo $email;   ?>" >
		<input type="text" name="password" placeholder="Enter New Password">
		<input type="password" name="confirmpass" placeholder="Confirm your Password" id="confirmpass"><span style="color:red;">*Password Don't Match</span>
		<input type="submit" name="updatepassword">

	</form>

		<?php
	}
	
}