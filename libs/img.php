<?php
declare(strict_types=1);

function resizeAndSaveImage(string $filename):GdImage
{
    list($width, $height, $type) = getimagesize($filename);
    $newWidth = $width;
    $newHeight = $height;
    if($height > MAX_HEIGHT){
        $newWidth = (int)($width * (MAX_HEIGHT / $height));
        $newHeight = MAX_HEIGHT;
    }
    $GDImage = imagecreatetruecolor($newWidth, $newHeight);
    $source = match($type){
        IMAGETYPE_JPEG => imagecreatefromjpeg($filename),
        IMAGETYPE_GIF => imagecreatefromgif($filename),
        IMAGETYPE_PNG => imagecreatefrompng($filename),
        IMAGETYPE_BMP => imagecreatefrombmp($filename)
    };
    imagecopyresized($GDImage, $source, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
    return $GDImage;
}
