<?php
if ($handle = opendir('./data/')) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
		
		if (strpos($entry,'tar.gz') !== false) {
			//echo "$entry";
			
			// this will move it and it won't be present in old location
			//rename("./data/".$entry, "./save_folder/".$entry);
			
			// if you want it to be in the new and old location use
			copy("./data/".$entry, "./save_folder/".$entry);
		}
		else{
			//echo 'false';
		}
        }
    }
    closedir($handle);
	echo 'done';
}
?>