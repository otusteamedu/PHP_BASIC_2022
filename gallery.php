<?php
require_once 'resize.php';

function gallery()
{

    $dir1 = dirname(__FILE__) . '/public/img/';
    $dir2 = dirname(__FILE__) . '/public/mini/';

    $files = array_diff(scandir($dir1), array('..', '.'));

    foreach ($files as $value) {
        $file = "$dir1" . "$value";
        $image = resizeImage($file, 100, 100);

        imagejpeg($image, "$dir2" . "$value");

        echo '<a href="' . './public/img/' . $value . '" target = "_blank"><img src="' . './public/mini/' . $value . '"></a>';

    }
}
