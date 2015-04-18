<?php

//the code file url passed by parsing the .book file
$codefile_url = $file = $_GET['filename']; 
echo file_get_contents("./data/book/".$codefile_url);

?>