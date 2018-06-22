<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		#myform{

			width: 300px;
			
			position: absolute;
			left: 50%;
			top:50%;
			transform: translate(-50%,-50%);

		}
		input[type='text']
		{
			height: 35px;
			width: 250px;
		}
		input[type='submit']
		{
			height: 30px;
			width: 100px;
			margin-left: 60px;
			margin-top:20px;
			background-color: blue;
			color:white;
			border:1px solid blue;
		}

	</style>
	<title></title>
</head>
<body>

</body>
</html>
<?php
ini_set('display_errors',1);
include 'vendor/autoload.php';
include  'usersunrise.php';
include  'process.php';

if(isset($_POST['submit']))
{	
		$secret = "6LevDl0UAAAAAJQbt8usAMYjptkHAkRL6uBhbUzo";
$remoteip = $_SERVER['REMOTE_ADDR'];
$response = $_POST['g-recaptcha-response'];
$url = "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip";

$response = file_get_contents($url);
$response = json_decode($response);

if($response->success)
{
	 $email = $_POST['useremail'];
	$key = uniqid();
 
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465,'ssl'))
  ->setUsername('aakashgautam107@gmail.com')
  ->setPassword('hello123321')
;

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);


$message = (new Swift_Message('Wonderful Subject'))
  ->setFrom(['aakashgautam107@gmail.com' => 'ADMIN'])
  ->setTo($email)
  ->setBody($key)
  ;

// Send the message
$result = $mailer->send($message);



$connection = mysqli_connect('localhost','root','','sunrise');

$query = "UPDATE user SET resetkey = '$key' WHERE useremail = '$email' ";

$res = mysqli_query($connection,$query);
if ($result == 1) {
			?>  
			<div id='myform'>
				<img src="public/images/download.png">
				<span style="color:#aaa; display: block;">Enter Pin Code</span>
         <form action="checkcode.php" method="POST">
         	<input type="hidden" name= "useremail" value="<?php echo $email; ?>">
         	<input type="text" name="pincode" placeholder="Enter your pin code">
         	<input type="submit" name="submit">
         </form>
			</div>

		  <?php
}

}


	
 





else
{
	echo 'Robot';
}























}





?>