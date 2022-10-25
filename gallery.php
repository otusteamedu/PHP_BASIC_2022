<?php

function gallery()
{
    $dir = './img';
    $files = array_diff(scandir($dir), array('..', '.'));

    foreach ($files as $value) {
        $file = "./img/$value";
        $image = resizeImage($file, 100, 100);

        imagejpeg($image, "./mini/$value");

        echo '<a href="' . $file . '" target = "_blank"><img src="' . './mini/' . $value . '"></a>';

    }

}
