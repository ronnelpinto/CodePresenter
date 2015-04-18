<?php
// check if file name has extension tar.gz
if (strpos($_FILES['file_input']['name'], '.tar.gz') !== false) {
    
	//First delete all the contents in the 'data' folder
	unlinkRecursive('./data/', false);
	
	//mkdir('./data/')
    //move file to server
    $ret = move_uploaded_file($_FILES['file_input']['tmp_name'], "./data/" . $_FILES['file_input']['name']);
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
    $phar          = new PharData("./data/" . $_FILES['file_input']['name']);
    $phar->extractTo('./data/' . $out_file_name);
    //get the book file from the directory
    $dir_path_for_bookfile = './data/' . $out_file_name;
    $bookfile              = getBookFile($dir_path_for_bookfile);
    
    
    //echo the contents of the file
    echo file_get_contents($dir_path_for_bookfile . '/' . $bookfile);
    
    
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

/**
 * Recursively delete a directory
 *
 * @param string $dir Directory name
 * @param boolean $deleteRootToo Delete specified top-level directory as well
 */
function unlinkRecursive($dir, $deleteRootToo)
{
    if(!$dh = @opendir($dir))
    {
        return;
    }
    while (false !== ($obj = readdir($dh)))
    {
        if($obj == '.' || $obj == '..')
        {
            continue;
        }

        if (!@unlink($dir . '/' . $obj))
        {
            unlinkRecursive($dir.'/'.$obj, true);
        }
    }

    closedir($dh);

    if ($deleteRootToo)
    {
        @rmdir($dir);
    }

    return;
}
?>