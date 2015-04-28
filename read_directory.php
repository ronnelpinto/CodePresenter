<?php
if ($handle = opendir('./save_folder/')) {
    while (false !== ($entry = readdir($handle))) {
        if ($entry != "." && $entry != "..") {
            echo "$entry\n";
        }
    }
    closedir($handle);
}
?>