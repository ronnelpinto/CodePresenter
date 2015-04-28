<?php

//reads only the tar files in the directory
if ($handle = opendir('./save_folder/')) {
	

    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
			if (strpos($entry,'tar.gz') !== false) {
				echo "$entry\n";
			}
		}
    }
    closedir($handle);
}
?>