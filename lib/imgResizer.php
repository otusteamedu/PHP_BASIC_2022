<?php

function SetImgSize($img, $width, $height, $AspectRatio, $minImg) {
    switch (strtolower(strrchr($img, '.'))) {
        case ".jpg":
            $srcImage = @ImageCreateFromJPEG($img);
            break;
        case ".jpeg":
            $srcImage = @ImageCreateFromJPEG($img);
            break;
        case ".gif":
            $srcImage = @ImageCreateFromGIF($img);
            break;
        case ".png":
            $srcImage = @ImageCreateFromPNG($img);
            break;
        default:
            return -1;
    }
    $srcWidth = ImageSX($srcImage);
    $srcHeight = ImageSY($srcImage);
    if (($width < $srcWidth) || ($height > $srcHeight)) {
        if ($AspectRatio) {
            $ratioWidth = $srcWidth / $width;
            $ratioHeight = $srcHeight / $height;
            if ($ratioWidth < $ratioHeight) {
                $destWidth = intval($srcWidth / $ratioHeight);
                $destHeight = $height;
            } else {
                $destWidth = $width;
                $destHeight = intval($srcHeight / $ratioWidth);
            }
        } else {
            $destHeight = $height;
            $destWidth = $width;
        }
        $resImage = ImageCreateTrueColor($destWidth, $destHeight);
        ImageCopyResampled($resImage, $srcImage, 0, 0, 0, 0, $destWidth, $destHeight, $srcWidth, $srcHeight);
        switch (strtolower(strrchr($minImg, '.'))) {
            case ".jpg":
                ImageJPEG($resImage, $minImg, 100); // 100 - максимальное качество
                break;
            case ".jpeg":
                ImageJPEG($resImage, $minImg, 100); // 100 - максимальное качество
                break;
            case ".gif":
                ImageGIF($resImage, $minImg);
                break;
            case ".png":
                ImagePNG($resImage, $minImg);
                break;
        }
        ImageDestroy($srcImage);
        ImageDestroy($resImage);
    }

    return false;
}
?>