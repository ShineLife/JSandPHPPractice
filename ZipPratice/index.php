<?php
    $zip = new ZipArchive;
    if($zip->open('jQueryDemo8.zip') == true){
        $zip->extractTo('test/');
        $zip->close();
        print_r(scandir('test/'));
    }