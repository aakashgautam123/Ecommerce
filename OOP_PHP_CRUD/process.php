<?php
class Database
{
	public $host = "localhost";
	public $user = "root";
	public $password = "";
	public $db_name = "sunrise";

	public $link;
	public $error;
	public function __construct()
	{
		$this->connect();
	}
	private function connect()
	{
		$this->link = new mysqli($this->host,$this->user,$this->password,$this->db_name);
		if(!$this->link)
	{
		$this->error = "Connection Failed";
	}

	}
	

	public function insert($parameter)
	{
		$classname = get_class($parameter);
		$parameter = (array)$parameter;
		$keys = array_keys($parameter);

		 $num_keys = count($keys);
		$values = array();

		for($i=0;$i<$num_keys-1;$i++)
		{
			array_push($values,$parameter[$keys[$i]]);
		}

		

		
		 $sql = "INSERT INTO ".$classname;
		 $sql.= "(";
		 for($x=0;$x<$num_keys-1;$x++)

		 {
		 	if($x < $num_keys-2)
		 	{
		 	$sql.= $keys[$x] . ',';
		 	}
		 	else
		 	{
		 		$sql.= $keys[$x];
		 	}


		 }
		 $sql.= ") VALUES (";

		 for($y=0;$y<$num_keys-1;$y++)
		 {
		 	if($y < $num_keys -2)
		 	{
		 	$sql.= " ' ".$values[$y] . " ' " ." , ";
			 }
			 else
			 {
			 		$sql.= " ' ".$values[$y] . " ' " ;
			 }
		 }
		 $sql.= ")";

		;

		 
		echo $sql;
		 $result = $this->link->query($sql);
		 
		 if($result)
		 {
		 	$msg = 'Operation Successful';
		 	return $msg;
		 }



		

		

}
public  static function all($parameter)
{	 $db = new Database();
	 $query = "SELECT * FROM ".$parameter;
	 $result =  $db->link->query($query);
	 $products = array();
	 while($object = $result->fetch_object())
	 {
	 	array_push($products,$object);
	 }
	    return $products;


}
public static function num_rows($parameter)
{
	$db = new Database();
	$query = "SELECT * FROM ". $parameter;
	$number = mysqli_num_rows($db->link->query($query));
	return $number;
}
public static function delete($parameter)
{	 $db = new Database();
	 echo $query = "DELETE FROM ".$parameter['table_name']." WHERE product_id = ".$parameter['product_id'];
	 $res = $db->link->query($query);
	 header('Location:dashboard.php?parameter=editproduct');

	
}

public static function update($product,$id,$column_name)
{
	$classname = get_class($product);
	$product = (array)$product;
	unset($product['tablename']);
	$keys = array_keys($product);
	echo '<pre>';
	print_r($keys);
	$sql = "UPDATE " .$classname." SET ";

	foreach($keys as $key)
	{
		$sql.= " ".$key ." = ". " ' " .$product[$key] . " ' "." , "; 
	}


	$sql = rtrim($sql," , ");
    $sql.= " WHERE " .$column_name." = ". $id;

	
	$dbup = new Database();
	$res = $dbup->link->query($sql);

	var_dump($res);

}
public static function find($parameter,$id,$column_name)
{
	$db = new Database();
     $query = "SELECT * FROM ".$parameter." WHERE ".$column_name . "=". $id;
	$result =  $db->link->query($query);
	 
	$products =  $result->fetch_object();
	 
	 return $products;

}
public static function sum($columnname,$tablename)
{
	$tem = new Database();
	$query = "SELECT SUM($columnname) FROM $tablename";
	$result = $tem->link->query($query);
	$result = mysqli_fetch_assoc($result);
	return $result;
}
public static function ordergroup()
{
	$xyza = new Database();
	$items = array();
	$query = "SELECT COUNT(product_id), EXTRACT(YEAR_MONTH FROM product_date) FROM orders GROUP BY EXTRACT(YEAR_MONTH FROM product_date)";
	$res = $xyza->link->query($query);

	 while($object = $res->fetch_assoc())
	 {
	 	array_push($items,$object);
	 }
	    return $items;
}
}


