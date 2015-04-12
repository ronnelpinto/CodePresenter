<?php

$file = $_POST['input']; // don't forget to sanitize this

$indent_size = $_POST['indent-size'];
$line = $_POST['max_line_length'];
$data = file_get_contents("D:\\TEMP\\book\\".$file);

//echo "python indent.py " . "D:\\TEMP\\book\\".$file . " " . $config . " ". $indent_size." " . $line ;
$resource = popen("c:\\python27\\python.exe indent.py " . "D:\\TEMP\\book\\".$file . " ". $indent_size." " . $line . " 2>&1" , "r");
if (is_resource($resource))
{
	while( !feof($resource) )
	{
		echo fgets($resource);
	}
	return;
}
echo "Error";


?>