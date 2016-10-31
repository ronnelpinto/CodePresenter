<?php
$file = $_GET['file']; // don't forget to sanitize this!
$img_data = file_get_contents("./data/".$file);
header("Content-type: image/jpeg");
echo $img_data;
?>
