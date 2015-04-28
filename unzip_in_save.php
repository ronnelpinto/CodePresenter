<?php

/**
 * Open the save folder
 * Unzip the tar file and display the contents in the data folder
 */

if ($handle = opendir('./save_folder/')) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
            echo "$entry\n";
			$out_file_name = str_replace('.tar.gz', '', $entry);
			
			unlinkRecursive('./data/', false);

			$phar          = new PharData("./data/" . $entry);
			$phar->extractTo('./data/' . $out_file_name);
			//get the book file from the directory
			$dir_path_for_bookfile = './data/' . $out_file_name;
			$bookfile              = getBookFile($dir_path_for_bookfile); 
			//echo the contents of the file
			echo file_get_contents($dir_path_for_bookfile . '/' . $bookfile);
    
        }
    }
    closedir($handle);
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
