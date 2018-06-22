<?php

// $zip = new ZipArchive();

// $zip->open('example.zip',ZipArchive::CREATE);

// $files = scandir('./public/images');
// unset($files[0],$files[1]);
// echo '<pre>';
// print_r($files);
// foreach($files as $file)
// {
// 	$zip->addFile('./public/images/'.$file);
// }
// $zip->close();
$im = imagecreatefromjpeg('./public/images/admin.jpg');
imageresolution($im,200,300);


