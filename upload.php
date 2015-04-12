<?php
// check if file name has extension tar.gz
if (strpos($_FILES['file_input']['name'], '.tar.gz') !== false) {
    
    //move file to server
    $ret = move_uploaded_file($_FILES['file_input']['tmp_name'], "D:\\TEMP\\" . $_FILES['file_input']['name']);
    if ($ret != 0) {
        //echo "<h2>Successfully uploaded";
    }
    
    
    foreach ($_FILES['file_input'] as $key2 => $value2) {
        //echo "<h2>$key2............$value2</h2>";
    }
    
    //decompress the tar file and store in the same folder
    
    // decompress from gz
    //$p = new PharData('files.tar.gz');
    //$p->decompress(); // creates files.tar
    
    $out_file_name = str_replace('.tar.gz', '', $_FILES['file_input']['name']);
    $phar          = new PharData("D:\\TEMP\\" . $_FILES['file_input']['name']);
    $phar->extractTo('D:\\TEMP\\' . $out_file_name);
    //get the book file from the directory
    $dir_path_for_bookfile = 'D:\\TEMP\\' . $out_file_name;
    $bookfile              = getBookFile($dir_path_for_bookfile);
    
    
    //echo the contents of the file
    echo file_get_contents($dir_path_for_bookfile . '\\' . $bookfile);
    
    
} else {
    echo "<h2>Not a Tar file. Please uplaod a tar file!!!";
}

function getBookFile($dir_path)
{
    $files = '';
    $dir   = opendir($dir_path);
    while (($currentFile = readdir($dir)) !== false) {
        if (endsWith($currentFile, '.book')) {
            $files = $currentFile;
            break;
        }
    }
    closedir($dir);
    return $files;
}

function endsWith($haystack, $needle)
{
    return substr($haystack, -strlen($needle)) == $needle;
}
?>