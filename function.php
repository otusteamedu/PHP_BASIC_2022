<?php
function isImage($file)
{
    $valid_type = ['image/png', 'image/jpeg'];
    if (in_array(mime_content_type($file), $valid_type)) {

        return $file;
    }
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
