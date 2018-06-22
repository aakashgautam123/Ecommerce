<?php 
include 'process.php';
class Login extends Database
{
	public $username;
	public $password;
	public $table;
	public $db;

	


	public function check($credentials = array())
	{
		 
		 $this->username = $credentials['username'] ?? '';
		 $this->password =  $credentials['password'] ?? '';
		 $this->table = $credentials['table'] ?? '';

		 echo  $sql = "SELECT * FROM ".$this->table. " WHERE username=". " '".$this->username." ' "." AND userpassword="." '".$this->password." ' "; 

		 $result = $this->link->query($sql);

		 $count = mysqli_num_rows($result);
		 if($count == 1)
		 {
		 	return True;
		 }
		 else
		 {
		 	return False;
		 }
		 
		 


	}
}