<?php
function extension($files)
{
    $valid_extentions = ['jpg', 'jpeg', 'png'];
    $result_arr = [];
    foreach ($files as $file) {
        $file_extension = pathinfo($file, PATHINFO_EXTENSION);
        if (in_array(strtolower($file_extension), $valid_extentions)) {
            $result_arr[] = $file;
        }
    }
    return $result_arr;
}


function resize_image($files, $w, $h, $crop = FALSE)
{
    list($width, $height) = getimagesize($files);
    $r = $width / $height;
    if ($crop) {
        if ($width > $height) {
            $width = ceil($width - ($width * abs($r - $w / $h)));
        } else {
            $height = ceil($height - ($height * abs($r - $w / $h)));
        }
        $newwidth = $w;
        $newheight = $h;
    } else {
        if ($w / $h > $r) {
            $newwidth = $h * $r;
            $newheight = $h;
        } else {
            $newheight = $w / $r;
            $newwidth = $w;
        }
    }
    $src = imagecreatefromjpeg($files);
    $dst = imagecreatetruecolor($newwidth, $newheight);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

    return $dst;
}
