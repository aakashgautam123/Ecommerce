<?php
class File
{

	public function upload($file)
	{

		echo '<pre>';

		print_r($file);
		$file_name = $file['name']; 
		$file_type = $file['type'];
		$file_type_info = explode('/',$file_type);
		$file_tmp_name = $file['tmp_name'];
		echo $file_size = $file['size'];
		$destination = 'public/images/'.$file_name;
		if($file_size < 5242880)
		{
		$res = move_uploaded_file($file_tmp_name, $destination);
		
		
		}
		
	}
		
}